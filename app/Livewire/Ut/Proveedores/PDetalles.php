<?php

namespace App\Livewire\Ut\Proveedores;

use Livewire\Component;
use App\Models\proveedores_temporales;
use App\Models\Vales_compra;
use App\Models\Empresa;

use Illuminate\Support\Facades\Auth;

class PDetalles extends Component
{
    public $id_proveedor;
    public $proveedor;
    public $valesByProveedor;
    public $proveedoresList;

    public function render()
    {
        return view('livewire.ut.proveedores.p-detalles');
    }
    public function mount() {
        $this -> proveedor = proveedores_temporales::find($this -> id_proveedor);
        $this -> valesByProveedor = Vales_compra::where('id_proveedor', $this -> id_proveedor) -> get();
        $this -> valesByProveedor -> load('solicitante');
        $this -> proveedoresList = Empresa::where('RFC', $this -> proveedor -> RFC) -> get();
    }

    public function autorizarProveedor( ) {
        if ( count($this -> proveedoresList) ) {
            $this->dispatch('alertCRUD',
                'Este proveedor ya está registrado!',
                'El proveedor ya se encuentra registrado',
                'error'
            );
            return;
        }
        $proveedorFijo = Empresa::create([
            'RFC' => $this -> proveedor -> RFC,
            'RazonSocial' => $this -> proveedor -> RazonSocial,
            'Persona' => $this -> proveedor -> Persona,
            'Nombre' => $this -> proveedor -> Nombre,
            'Telefono' => $this -> proveedor -> Telefono,
            'Regimen' => $this -> proveedor -> Regimen,
            'Direccion' => $this -> proveedor -> Direccion,
            'CodigoPostal' => $this -> proveedor -> CodigoPostal,
            'DatosContacto' => $this -> proveedor -> DatosContacto,
            'DatosBanco' => $this -> proveedor -> DatosBanco,
            'userId' => Auth::user() -> id
        ]);
        foreach($this -> valesByProveedor as $vale) {
            $vale -> update([
                'tipo_proveedor' => 'Fijo',
                'id_proveedor' => $proveedorFijo -> id
            ]);
            $vale -> save();
        }
        $this -> proveedor -> delete();
        $this->dispatch('alertCRUD',
            'Se añadió al proveedor!',
            'Proveedor nuevo agregado al registro',
            'success'
        );
        return redirect()->route('proveedores.pendientes');
    }

    public function reasignarProveedor() {
        if ( count( $this -> valesByProveedor ) == 0 ){
            $this->dispatch('alertCRUD',
                'No hay vales registrados!',
                'No hay vales registrados con este proveedor',
                'error'
            );
            return;
        }
        foreach($this -> valesByProveedor as $vale) {
            $vale -> update([
                'tipo_proveedor' => 'Fijo',
                'id_proveedor' => $this -> proveedoresList[0] -> id,
                'pending_review' => 1
            ]);
            $vale -> save();
            $this -> proveedor -> delete();
        }
        $this->dispatch('alertCRUD',
            'Se añadió al proveedor!',
            'Proveedor nuevo agregado al registro',
            'success'
        );
        return redirect()->route('proveedores.pendientes');
    }

    // #[On('deleteP')]
    public function deleteProveedor( ) {
        $this->dispatch('alertCRUD',
            'Proveedor Eliminado!',
            'El proveedor temporal ha sido eliminado',
            'success'
        );
        // dd($this -> proveedor);
        foreach($this -> valesByProveedor as $vale) {
            $vale -> update([
                'creation_status' => 'Borrador',
                'id_proveedor' => null
            ]);
            $vale -> save();
        }
        $this -> proveedor -> delete();
        $this->dispatch('alertCRUD', 'Exito!', 'Borrador Generado Correctamente', 'success');
        return redirect()->route('proveedores.pendientes');
    }
}
