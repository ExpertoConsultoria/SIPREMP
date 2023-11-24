<?php

namespace App\Livewire\N4\Vales;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Helpers\Helper;
use stdClass;

use App\Models\Memorandum;
use App\Models\MemorandumList;

use App\Models\Vales_compra;
use App\Models\Elementos_Vale_compra;

use App\Models\proveedores_temporales;
use App\Models\Empresa;
use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;
use App\Models\PptoDeEgreso;

class VCreateFromMemo extends Component
{

    public $details_of_folio = '';

    public $memorandum_details;
    public $memoList = [];
    public $partidas_data = [];
    public $MIR;

    public $userSede;
    public $userSedeCode;

    public $vale_compra;
    public $vale_item_compra;

    // Fields
        public $folio;
        public $fecha;
        public $id_usuario;
        public $lugar;

        public $NoFin;
        public $NoProposito;
        public $NoComponente;
        public $NoActividad;

        public $id_proveedor = '';

        public $justificacion;
        public $lugar_entrega = '';
        public $fecha_entrega;

        public $subtotal = 0.00;
        public $iva = 0.00;
        public $total = 0.00;

    // Reactive

        public $buscar = '';
        //Almacena los datos para sugerencia
        public $resultados = [];
        // Muestra la lista de sugerencias de la busqueda
        public $showResults = false;
        //Almacena el Id del proveedor Seleccionado
        public $seleccionado;

        // Proveedor
        public $razon_social = '---';
        public $RFC = '---';
        public $telefono = '---';
        public $tipo_proveedor = 'Fijo';

        // ? ATRIBUTOS PROVEEDOR_TEMPORAL
        public $onAddProveedor = false;

        public $new_nombre;
        public $new_telefono;
        public $new_persona;
        public $new_direccion;
        public $new_codigo_postal;
        public $new_razon_social;
        public $new_RFC;
        public $new_regimen;
        public $new_datos_banco;


    protected function rules() {
        return [
            // 'id_proveedor' => 'required',
            'justificacion'   => 'required|string',
            'lugar_entrega'   => 'required|string',
            'fecha_entrega' => 'required|date',
        ];
    }

    protected $messages = [
        // 'id_proveedor.required' => 'No ha seleccionado ningún Proveedor.',

        'justificacion.required' => 'Este campo es Obligatorio.',
        'justificacion.string' => 'Texto Invalido.',

        'lugar_entrega.required' => 'Este campo es Obligatorio.',
        'lugar_entrega.string' => 'Texto Invalido.',

        'fecha_entrega.required' => 'Este campo es Obligatorio.',
        'fecha_entrega.date' => 'No es una fecha.',
    ];

    protected $listeners = ['loadProveedor'];


    public function mount()
    {

        // Data From Memo
        $this->memorandum_details = Memorandum::where('memo_folio', $this->details_of_folio)->first();
        $this->memorandum_details->load('solicitante');
        $this->memoList = MemorandumList::where('im_folio', $this->memorandum_details->memo_folio)->get();

        // Forge Mir
        $fin = Plan1Fin::where('id',$this->memorandum_details->mir_id_fin)->first();
        $proposito = Plan2Proposito::where('id',$this->memorandum_details->mir_id_proposito)->first();
        $componente = Plan3Componente::where('id',$this->memorandum_details->mir_id_componente)->first();
        $actividad = Plan4Actividad::where('id',$this->memorandum_details->mir_id_actividad)->first();

        $this->MIR =$fin->NoFin.'-'.$proposito->NoProposito.'-'.$componente->NoComponente.'-'.$actividad->NoActividad;

        // Data for Vale

            $this->userSedeCode = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->Serie;

            // Basic Data
            $this->folio = "MPEO-VCS-00000";
            $this->fecha = date('Y-m-d');
            $this->id_usuario = $this->memorandum_details->solicitante->id;
            $this->lugar = $this->memorandum_details->memo_sucursal;

            // Mir
            $this->NoFin = $this->memorandum_details->mir_id_fin;
            $this->NoProposito = $this->memorandum_details->mir_id_proposito;
            $this->NoComponente = $this->memorandum_details->mir_id_componente;
            $this->NoActividad = $this->memorandum_details->mir_id_actividad;

            // Entrega
            $this->justificacion = $this->memorandum_details->memo_asunto;
            $this->fecha_entrega = date('Y-m-d');

            // Totales
            $this->CalculateTotals();

            // Partidas Presupuestales desglosadas
            $partidas_presupuestales = PptoDeEgreso::all();

            foreach ($partidas_presupuestales as $partida) {

                $dataPartida = new stdClass;
                $dataPartida->nombre = $partida->CvePptal;

                // Obtenemos los elementos que concuerden con esta partida
                $dataPartida->elementos = [];
                foreach ($this->memoList as $item) {
                    if($item->im_partida_presupuestal === $partida->CvePptal){
                        array_push($dataPartida->elementos,$item);
                    }
                }

                // Obtenemos los totales
                $dataPartida->subtotal = 0;
                foreach ($dataPartida->elementos as $elemnto) {
                    $dataPartida->subtotal += $elemnto->im_importe;
                }

                $dataPartida->iva = $dataPartida->subtotal * 0.16;
                $dataPartida->iva = number_format($dataPartida->iva, 2, '.', '');

                $dataPartida->total_compra = $dataPartida->subtotal * 1.16;
                $dataPartida->total_compra = number_format($dataPartida->total_compra, 2, '.', '');

                // Definimos el estado a partir del total
                if ($dataPartida->total_compra <= 172000) {
                    $dataPartida->estado = 'DISPONIBLE';
                }else{
                    $dataPartida->estado = 'NO DISPONIBLE';
                }

                // Si hay algun elemento con esta partida
                if(count($dataPartida->elementos)){
                    array_push($this->partidas_data,$dataPartida);
                }

            }
    }

    public function render()
    {
        return view('livewire.n4.vales.v-create-from-memo');
    }

    // Get Totals
    public function CalculateTotals() {
        $this->subtotal = 0;
        $items = $this->memoList;
        $this->memoList = [];

        foreach ($items as $element) {
            $this->subtotal += $element->im_importe;
            array_push($this->memoList, $element);
        }

        $this->iva = $this->subtotal * 0.16;
        $this->iva = number_format($this->iva, 2, '.', '');

        $this->total_compra = $this->subtotal * 1.16;
        $this->total_compra = number_format($this->total_compra, 2, '.', '');
    }

    // Buscar Proveedor
    public function searchProveedor(){
        if(!empty($this->buscar)){
            $this->resultados = Empresa::orderby('RazonSocial', 'asc')
                ->where('RazonSocial', 'like', '%' . $this->buscar . '%')
                ->get();
            $this->showResults = true;
        }else{
            $this->showResults = false;
        }
    }

    public function getProvedor($id){

        if ( $this -> tipo_proveedor == 'Temporal') {
            $provedorTemp = proveedores_temporales::find($id);

            $this->id_proveedor = $provedorTemp->id;
            $this->razon_social = $provedorTemp->RazonSocial;
            $this->RFC = $provedorTemp->RFC;
            $this->telefono = $provedorTemp->Telefono ? $provedorTemp->Telefono : 'Ninguno';
            $this -> tipo_proveedor = 'Temporal';
            return;
        }


        $empresa = Empresa::find($id);
        $this -> tipo_proveedor = 'Fijo';
        //Reset Data
        $this->buscar = $empresa->RazonSocial;
        $this->seleccionado = $empresa;
        $this->showResults = false;

        // Set Provedor Data
        $this->id_proveedor = $empresa->id;
        $this->razon_social = $empresa->RazonSocial;
        $this->RFC = $empresa->RFC;
        $this->telefono = $empresa->Telefono ? $empresa->Telefono : 'Ninguno';
    }

    //
    public function setTokenToMemo($token){
        $memorandum = Memorandum::where('memo_folio', $this->details_of_folio)->first();
        $memorandum->memo_creation_status = 'Aprobado';
        $memorandum->pending_review = 1;
        $memorandum->pass_filter = 1;
        $memorandum->token_aceptacion = $token;
        $memorandum->save();
    }

    // Ways for Save
    public function Save() {
        $this->validate();
        if (count($this->memoList)) {
            $this->folio = Helper::FolioGenerator(new Vales_compra, 'folio', 6, 'VCS', $this->userSedeCode);
            $token = strtoupper(Str::random(5));
            if ( $this -> onAddProveedor ) {
                $nuevoProveedor = new proveedores_temporales([
                    'Nombre' => $this->new_nombre,
                    'Telefono' => $this->new_telefono,
                    'Persona' => $this->new_persona,
                    'Direccion' => $this->new_direccion,
                    'CodigoPostal' => $this->new_codigo_postal,
                    'RazonSocial' => $this->razon_social,
                    'RFC' => $this->new_RFC,
                    'regimen' => $this->new_regimen,
                    'datosBanco' => $this->new_datos_banco,
                    'tipo_proveedor' => $this->tipo_proveedor,
                    'DatosContacto' => $this->telefono,
                ]);
                $nuevoProveedor->save();
                $this -> id_proveedor = $nuevoProveedor -> id;
            }

            $this->vale_compra = new Vales_compra();
            $this->vale_compra->folio = $this->folio;
            $this->vale_compra->fecha = $this->fecha;
            $this->vale_compra->id_usuario = $this->id_usuario;
            $this->vale_compra->lugar = $this->lugar;
            $this->vale_compra->NoFin = $this->NoFin;
            $this->vale_compra->NoProposito = $this->NoProposito;
            $this->vale_compra->NoComponente = $this->NoComponente;
            $this->vale_compra->NoActividad = $this->NoActividad;
            $this->vale_compra->id_proveedor = $this->id_proveedor;
            $this->vale_compra->justificacion = $this->justificacion;
            $this->vale_compra->lugar_entrega = $this->lugar_entrega;
            $this->vale_compra->fecha_entrega = $this->fecha_entrega;
            $this->vale_compra->subtotal = $this->subtotal;
            $this->vale_compra->iva = $this->iva;
            $this->vale_compra->total_compra = $this->total;
            $this->vale_compra->folio_solicitud = $this->details_of_folio;
            $this->vale_compra->token_solicitante = $token;
            $this->vale_compra->tipo_proveedor = $this -> tipo_proveedor;

            $this->vale_compra->creation_status = 'Enviado';
            $this->vale_compra->id_proveedor = $this -> id_proveedor;

            $this->vale_compra->save();

            $this->setTokenToMemo($token);

            foreach ($this->memoList as $item) {
                $this->vale_item_compra = new Elementos_Vale_compra();
                $this->vale_item_compra->vales_compra_id = $this->vale_compra->id;
                $this->vale_item_compra->cantidad = $item->im_cantidad;
                $this->vale_item_compra->unidad_medida = $item->im_unidad_medida;
                $this->vale_item_compra->concepto = $item->im_concepto;
                $this->vale_item_compra->partida_presupuestal = $item->im_partida_presupuestal;
                $this->vale_item_compra->precio_unitario = $item->im_precio_u;
                $this->vale_item_compra->importe = $item->im_importe;
                $this->vale_item_compra->save();
            }

            $this->dispatch('alertCRUD', 'Exito!', 'Generado Correctamente', 'success');
            return redirect()->route('vales.send-revised');

        } else {
            $this->dispatch('alertCRUD', 'Error!', 'No se puede generar una solicitud sin elementos de compra', 'error');
            return;
        }
    }

    public function SaveAsDraft(){

        $this->validateOnly($this->justificacion);


        $this->folio = Helper::FakeFolioGenerator(5,'DRAFT');
        $token = strtoupper(Str::random(5));

        $this->vale_compra = new Vales_compra();
        $this->vale_compra->folio = $this->folio;
        $this->vale_compra->fecha = $this->fecha;
        $this->vale_compra->id_usuario = $this->id_usuario;
        $this->vale_compra->lugar = $this->lugar;
        $this->vale_compra->NoFin = $this->NoFin;
        $this->vale_compra->NoProposito = $this->NoProposito;
        $this->vale_compra->NoComponente = $this->NoComponente;
        $this->vale_compra->NoActividad = $this->NoActividad;
        $this->vale_compra->id_proveedor = $this->id_proveedor;
        $this->vale_compra->justificacion = $this->justificacion;
        $this->vale_compra->lugar_entrega = $this->lugar_entrega;
        $this->vale_compra->fecha_entrega = $this->fecha_entrega;
        $this->vale_compra->subtotal = $this->subtotal;
        $this->vale_compra->iva = $this->iva;
        $this->vale_compra->total_compra = $this->total;
        $this->vale_compra->folio_solicitud = $this->details_of_folio;
        $this->vale_compra->token_solicitante = $token;

        $this->vale_compra->creation_status = 'Borrador';

        if ( $this -> onAddProveedor ) {
            $nuevoProveedor = new proveedores_temporales([
                'Nombre' => $this->new_nombre,
                'Telefono' => $this->new_telefono,
                'Persona' => $this->new_persona,
                'Direccion' => $this->new_direccion,
                'CodigoPostal' => $this->new_codigo_postal,
                'RazonSocial' => $this->razon_social,
                'RFC' => $this->new_RFC,
                'regimen' => $this->new_regimen,
                'datosBanco' => $this->new_datos_banco,
                'tipo_proveedor' => $this->tipo_proveedor,
                'DatosContacto' => $this->telefono,
            ]);
            $nuevoProveedor->save();
            $this -> id_proveedor = $nuevoProveedor -> id;
        }
        $this->vale_compra->id_proveedor = $this -> id_proveedor;

        $this->vale_compra->save();

        $this->setTokenToMemo($token);

        foreach ($this->memoList as $item) {
            $this->vale_item_compra = new Elementos_Vale_compra();
            $this->vale_item_compra->vales_compra_id = $this->vale_compra->id;
            $this->vale_item_compra->cantidad = $item->im_cantidad;
            $this->vale_item_compra->unidad_medida = $item->im_unidad_medida;
            $this->vale_item_compra->concepto = $item->im_concepto;
            $this->vale_item_compra->partida_presupuestal = $item->im_partida_presupuestal;
            $this->vale_item_compra->precio_unitario = $item->im_precio_u;
            $this->vale_item_compra->importe = $item->im_importe;
            $this->vale_item_compra->save();
        }

        $this->dispatch('alertCRUD', 'Exito!', 'Borrador Generado Correctamente', 'success');
        return redirect()->route('vales.borradores');
    }

    public function loadProveedor($data_proveedor) {
        $this -> onAddProveedor = true;
        $this -> tipo_proveedor = 'Temporal';

        $this -> new_nombre = $data_proveedor['new_nombre'];
        $this -> new_telefono = $data_proveedor['new_telefono'];
        $this -> new_persona = $data_proveedor['new_persona'];
        $this -> new_direccion = $data_proveedor['new_direccion'];
        $this -> new_codigo_postal = $data_proveedor['new_codigo_postal'];
        $this -> new_razon_social = $data_proveedor['new_razon_social'];
        $this -> new_RFC = $data_proveedor['new_RFC'];
        $this -> new_regimen = $data_proveedor['new_regimen'];
        $this -> new_datos_banco = $data_proveedor['new_datos_banco'];

        $this -> razon_social = $this -> new_razon_social;
        $this -> RFC = $this -> new_RFC;
        $this -> telefono = $this -> new_telefono;
        $this->dispatch('closeModal');
        $this->dispatch('simpleAlert', 'Se agregaron los datos del proveedor Correctamente', 'success');
    }
}
