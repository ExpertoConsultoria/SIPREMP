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
        ];
    }

    protected $messages = [
        'new_nombre.required' => 'Este campo es Obligatorio',
        'new_telefono.required' => 'Este campo es Obligatorio',
        'new_persona.required' => 'Este campo es Obligatorio',
        'new_direccion.required' => 'Este campo es Obligatorio',
        'new_codigo_postal.required' => 'Este campo es Obligatorio',
        'new_razon_social.required' => 'Este campo es Obligatorio',
        'new_RFC.required' => 'Este campo es Obligatorio',
        'new_regimen.required' => 'Este campo es Obligatorio',
        'new_datos_banco.required' => 'Este campo es Obligatorio',
    ];



    public function render()
    {
        return view('livewire.shared.components.temporary-providers');
    }

    public function addNewProveedorTemp() {
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
        ]);
        $proveedor = new stdClass;
        $proveedor -> new_nombre = $this -> new_nombre;
        $proveedor -> new_telefono = $this -> new_telefono;
        $proveedor -> new_persona = $this -> new_persona;
        $proveedor -> new_direccion = $this -> new_direccion;
        $proveedor -> new_codigo_postal = $this -> new_codigo_postal;
        $proveedor -> new_razon_social = $this -> new_razon_social;
        $proveedor -> new_RFC = $this -> new_RFC;
        $proveedor -> new_regimen = $this -> new_regimen;
        $proveedor -> new_datos_banco = $this -> new_datos_banco;

        $this->dispatch('loadProveedor', $proveedor);
    }
}
