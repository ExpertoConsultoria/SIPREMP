<?php

namespace App\Livewire\Shared\Components;

use LivewireUI\Modal\ModalComponent;

use App\Helpers\Helper;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Archivos;

class AddQuote extends ModalComponent
{
    use WithFileUploads;

    // ?? Atributos de Archivos
        public $fecha_registro;
        public $lugar_registro;
        public $folio;
        public $arch_nombre;
        public $arch_descripcion;
        public $arch_extension;
        public $arch_ruta;

        public $archivo;
        public $userSedeCode;

        public $cotizacion;

    protected function rules() {
        return [
            'archivo' => 'required | mimes:jpg,jpeg,png,pdf,txt,webp|max:1024',
            'fecha_registro' => 'required|date',
            'lugar_registro' => 'required',
            'folio' => 'required|string',
            'arch_nombre' => 'required|string',
            'arch_descripcion' => 'required|string',
        ];
    }

    protected $messages = [
        'fecha_registro.required' => 'Este campo es Obligatorio',
        'fecha_registro.date' => 'No es una fecha.',

        'lugar_registro.required' => 'Este campo es Obligatorio',
        'archivo.required' => 'Este campo es Obligatorio',

        'folio.required' => 'Este campo es Obligatorio',
        'folio.string' => 'Texto Invalido.',
        'arch_nombre.required' => 'Este campo es Obligatorio',
        'arch_nombre.string' => 'Texto Invalido.',
        'arch_descripcion.required' => 'Este campo es Obligatorio',
        'arch_descripcion.string' => 'Texto Invalido.',
    ];

    public function mount() {
        $this->userSedeCode = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->Serie;

        $this->fecha_registro = date('Y-m-d');
        $this->lugar_registro = is_string(Helper::GetUserSede()) ? Helper::GetUserSede() : Helper::GetUserSede()->SedeNombre;
        $this->folio = "CTMM-0001";
        $this->arch_nombre = '';
        $this->arch_descripcion = '';
        $this->arch_extension = '';
        $this->arch_ruta = '';
    }

    public function render()
    {
        return view('livewire.shared.components.add-quote');
    }

    public function SaveQuote(){
        $this->validate();
        $this->arch_extension = $this->archivo->extension();

        $this->cotizacion = new Archivos();
        $this->cotizacion->fecha_registro = $this->fecha_registro;
        $this->cotizacion->lugar_registro = $this->lugar_registro;
        $this->cotizacion->folio = Helper::FileFolioGenerator(new Archivos,'folio', 5, 'CTMM', $this->userSedeCode);
        $this->cotizacion->arch_nombre = $this->arch_nombre;
        $this->cotizacion->arch_descripcion = $this->arch_descripcion;
        $this->cotizacion->arch_extension = $this->arch_extension;

        if ($this->arch_extension === 'jpg' || $this->arch_extension === 'jpeg' || $this->arch_extension === 'png' || $this->arch_extension === 'webp') {
            $this->cotizacion->arch_ruta = 'storage/'.$this->archivo->store('files/Quotes/Images','public');
        } elseif ($this->arch_extension === 'txt') {
            $this->cotizacion->arch_ruta = 'storage/'.$this->archivo->store('files/Quotes/TXT','public');
        } elseif ($this->arch_extension === 'pdf'){
            $this->cotizacion->arch_ruta = 'storage/'.$this->archivo->store('files/Quotes/PDF','public');
        }

        $this->cotizacion->save();

        $this->dispatch('AssignQuotation', $this->cotizacion->id);
    }

}
