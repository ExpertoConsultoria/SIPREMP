<?php

namespace App\Livewire\Shared\Components;

use LivewireUI\Modal\ModalComponent;
use stdClass;

class TemporaryProviders extends ModalComponent
{

    // ? ATRIBUTOS PROVEEDOR_TEMPORAL
    public $new_nombre;
    public $new_telefono;
    public $new_persona;
    public $new_direccion;
    public $new_codigo_postal;
    public $new_razon_social;
    public $new_RFC;
    public $new_regimen;
    public $new_datos_banco;
    public $new_datos_contacto;

    protected function rules() {
        return [
            'new_nombre' => 'required',
            'new_telefono' => 'required',
            'new_persona' => 'required',
            'new_direccion' => 'required',
            'new_codigo_postal' => 'required',
            'new_razon_social' => 'required',
            'new_RFC' => 'required',
            'new_regimen' => 'required',
            'new_datos_banco' => 'required',
            'new_datos_contacto' => 'required',
        ];
    }

    protected $messages = [
        'new_nombre.required' => 'El nombre campo es Obligatorio',
        'new_telefono.required' => 'El telefono campo es Obligatorio',
        'new_persona.required' => 'El tipo de persona campo es Obligatorio',
        'new_direccion.required' => 'La direccion campo es Obligatorio',
        'new_codigo_postal.required' => 'El codigo postal campo es Obligatorio',
        'new_razon_social.required' => 'La razon social campo es Obligatorio',
        'new_RFC.required' => 'El RFC campo es Obligatorio',
        'new_regimen.required' => 'El regimen campo es Obligatorio',
        'new_datos_banco.required' => 'Los datos del banco campo es Obligatorio',
        'new_datos_contacto.required' => 'Los datos de contacto campo es Obligatorio',
    ];

    public function render()
    {
        return view('livewire.shared.components.temporary-providers');
    }

    public function addNewProveedorTemp() {
        try {
            //code...
            $validatedData = $this->validate([
                'new_razon_social' => 'required|string',
                'new_RFC' => 'required|string',
                'new_persona' => 'required',
                'new_nombre' => 'required',
                'new_telefono' => 'required',
                'new_regimen' => 'required',
                'new_direccion' => 'required',
                'new_codigo_postal' => 'required',
                'new_datos_banco' => 'required',
                'new_datos_contacto' => 'required',
            ]);
            $proveedor = new stdClass;
            $proveedor->new_nombre = $this->new_nombre;
            $proveedor->new_telefono = $this->new_telefono;
            $proveedor->new_persona = $this->new_persona;
            $proveedor->new_direccion = $this->new_direccion;
            $proveedor->new_codigo_postal = $this->new_codigo_postal;
            $proveedor->new_razon_social = $this->new_razon_social;
            $proveedor->new_RFC = $this->new_RFC;
            $proveedor->new_regimen = $this->new_regimen;
            $proveedor->new_datos_banco = $this->new_datos_banco;
            $proveedor->new_datos_contacto = $this->new_datos_contacto;
            $this->dispatch('loadProveedor', $proveedor);
        } catch (\Exception $th) {
            //throw $th;
            $validatedData = $this->validate([
                'new_razon_social' => 'required|string',
                'new_RFC' => 'required|string',
                'new_persona' => 'required',
                'new_nombre' => 'required',
                'new_telefono' => 'required',
                'new_regimen' => 'required',
                'new_direccion' => 'required',
                'new_codigo_postal' => 'required',
                'new_datos_banco' => 'required',
                'new_datos_contacto' => 'required',
            ]);
            dd($th);
        }

    }
}
