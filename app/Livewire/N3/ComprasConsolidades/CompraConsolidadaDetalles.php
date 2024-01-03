<?php

namespace App\Livewire\N3\ComprasConsolidades;

use Livewire\Component;

use App\Models\compra_consolidada;
use App\Models\item_compra_consolidada;

use App\Models\proveedores_temporales;

// * proveedores
use App\Models\Empresa;

use App\Helpers\Helper;
use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;
use App\Models\PptoDeEgreso;


use stdClass;
class CompraConsolidadaDetalles extends Component
{
    public $compra;
    public $proveedor;
    public $folio;
    public $MIR;
    public $partidas_data = [];
    public $partidas_presupuestales = [];
    public $compraElementos = [];

    public function render()
    {
        return view('livewire.n3.compras-consolidades.compra-consolidada-detalles');
    }

    public function mount() {
        
        $this -> compra = compra_consolidada::where('folio', $this -> folio) -> first();
        if ( $this -> compra -> tipo_proveedor == 'Temporal' ) {
            $this -> proveedor = proveedores_temporales::find($this -> compra -> id_proveedor);
        } else if ( $this -> compra -> tipo_proveedor == 'Fijo' ) {
            $this -> proveedor = Empresa::find($this -> compra -> id_proveedor);
        }
        // dd($this -> proveedor);

        // Forge Mir
        $fin = Plan1Fin::where('id',$this -> compra -> mir_id_fin)->first();
        $proposito = Plan2Proposito::where('id',$this -> compra -> mir_id_proposito)->first();
        $componente = Plan3Componente::where('id',$this -> compra -> mir_id_componente)->first();
        $actividad = Plan4Actividad::where('id',$this -> compra -> mir_id_actividad)->first();

        $this -> MIR =$fin->NoFin.'-'.$proposito->NoProposito.'-'.$componente->NoComponente.'-'.$actividad->NoActividad;

                
        $this -> compraElementos = item_compra_consolidada::where('compra_consolidada_id', $this->compra->id)->get();

        $this->partidas_presupuestales = PptoDeEgreso::all();

        $this->partidas_data = [];

        foreach ($this->partidas_presupuestales as $partida) {

            $dataPartida = new stdClass;
            $dataPartida->nombre = $partida->CvePptal;

            // Obtenemos los elementos que concuerden con esta partida
            $dataPartida->elementos = [];
            foreach ($this->compraElementos as $item) {
                if($item->partida_presupuestal === $partida->CvePptal){
                    array_push($dataPartida->elementos,$item);
                }
            }

            // Obtenemos los totales
            $dataPartida->subtotal = 0;
            foreach ($dataPartida->elementos as $elemnto) {
                $dataPartida->subtotal += $elemnto->importe;
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
}
