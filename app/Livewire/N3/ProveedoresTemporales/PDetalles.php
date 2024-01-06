<?php

namespace App\Livewire\N3\ProveedoresTemporales;

use App\Models\Empresa;
use App\Models\proveedores_temporales;
use App\Models\Vales_compra;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PDetalles extends Component
{
    public $id_proveedor;
    public $proveedor;
    public $valesByProveedor;
    public $proveedoresList;

    public function render()
    {
        return view('livewire.n3.proveedores-temporales.p-detalles');
    }

    public function mount()
    {
        $this->proveedor = proveedores_temporales::find($this->id_proveedor);
        $this->valesByProveedor = Vales_compra::where('id_proveedor', $this->id_proveedor)->get();
        $this->valesByProveedor->load('solicitante');
        $this->proveedoresList = Empresa::where('RFC', $this->proveedor->RFC)->get();
    }

    protected $listeners = ['deleteProveedor'];

    public function autorizarProveedor()
    {
        if (count($this->proveedoresList)) {
            $this->dispatch('alertCRUD',
                'Proveedor ya registrado!',
                'Este proveedor ya se encuentra registrado en la lista oficial del sistema',
                'error'
            );
            return;
        }

        $proveedorFijo = Empresa::create([
            'RFC' => $this->proveedor->RFC,
            'RazonSocial' => $this->proveedor->RazonSocial,
            'Persona' => $this->proveedor->Persona,
            'Nombre' => $this->proveedor->Nombre,
            'Telefono' => $this->proveedor->Telefono,
            'Regimen' => $this->proveedor->Regimen,
            'Direccion' => $this->proveedor->Direccion,
            'CodigoPostal' => $this->proveedor->CodigoPostal,
            'DatosContacto' => $this->proveedor->DatosContacto,
            'DatosBanco' => $this->proveedor->DatosBanco,
            'userId' => Auth::user()->id,
        ]);

        foreach ($this->valesByProveedor as $vale) {
            $vale->update([
                'tipo_proveedor' => 'Fijo',
                'id_proveedor' => $proveedorFijo->id,
            ]);
            $vale->save();
        }

        $this->proveedor->delete();

        $this->dispatch('alertCRUD',
            'Proveedor Añadido!',
            'El proveedor ha sido Añadido al registro oficial',
            'success'
        );

        sleep(1);
        return redirect()->route('proveedores.pendientes');
    }

    public function reasignarProveedor()
    {
        if (count($this->valesByProveedor) == 0) {
            $this->dispatch('alertCRUD',
                'No hay vales registrados!',
                'No existen vales registrados con este proveedor',
                'error'
            );
            return;
        }
        foreach ($this->valesByProveedor as $vale) {
            $vale->update([
                'tipo_proveedor' => 'Fijo',
                'id_proveedor' => $this->proveedoresList[0]->id,
                'pending_review' => 1,
            ]);
            $vale->save();
            $this->proveedor->delete();
        }
        $this->dispatch('alertCRUD',
            'Proveedor Actualizadao!',
            'Los Vales han sido actualizado',
            'success'
        );

        sleep(1);
        return redirect()->route('proveedores.pendientes');
    }

    #[On('deleteProveedor')]
    public function deleteProveedor()
    {
        $this->dispatch('alertCRUD',
            'Proveedor Eliminado!',
            'El registro temporal ha sido eliminado',
            'success'
        );
        // dd($this->proveedor);
        foreach ($this->valesByProveedor as $vale) {
            $vale->update([
                'creation_status' => 'Borrador',
                'id_proveedor' => null,
            ]);
            $vale->save();
        }
        $this->proveedor->delete();

        sleep(1);
        return redirect()->route('proveedores.pendientes');
    }
}
