<?php

namespace App\Livewire\Shared\Components;

use LivewireUI\Modal\ModalComponent;

use App\Helpers\Helper;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Archivos;

class AddEvidence extends ModalComponent
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

        // Element for Create
        public $evidencia;

    protected function rules() {
        return [
            'archivo' => 'required | mimes:jpg,jpeg,png,webp|max:1024',
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
        $this->folio = "EVCS-0000";
        $this->arch_nombre = '';
        $this->arch_descripcion = '';
        $this->arch_extension = '';
        $this->arch_ruta = '';
    }

    public function render()
    {
        return view('livewire.shared.components.add-evidence');
    }

    public function SaveInvoice(){
        $this->validate();
        $this->arch_extension = $this->archivo->extension();

        $this->evidencia = new Archivos();
        $this->evidencia->fecha_registro = $this->fecha_registro;
        $this->evidencia->lugar_registro = $this->lugar_registro;
        $this->evidencia->folio = Helper::FileFolioGenerator(new Archivos,'folio', 5, 'EVCS', $this->userSedeCode);
        $this->evidencia->arch_nombre = $this->arch_nombre;
        $this->evidencia->arch_descripcion = $this->arch_descripcion;
        $this->evidencia->arch_extension = $this->arch_extension;

        $this->evidencia->arch_ruta = 'storage/'.$this->archivo->store('files/Evidences','public');

        $this->evidencia->save();

        $this->dispatch('AssignEvidence', $this->evidencia->id);
    }
}
