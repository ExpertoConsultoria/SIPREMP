<?php

namespace App\Livewire\Shared\CajaMenor;

use LivewireUI\Modal\ModalComponent;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\FacturaCM;
use App\Models\CompraMenor;

class AddPdf extends ModalComponent
{
    use WithFileUploads;

    // ?? Atributos de Archivos

        public $id_factura;
        public $id_ccm;

        public $archivo;

        public $factura;
        public $compra_menor;

    protected function rules() {
        return [
            'archivo' => 'required | mimes:pdf|max:2048',
        ];
    }

    protected $messages = [
        'archivo.required' => 'Este campo es Obligatorio',
    ];

    public function mount() {
        $this->factura = FacturaCM::findOrFail($this->id_factura);
        $this->compra_menor = CompraMenor::findOrFail($this->id_ccm);
    }

    public function render()
    {
        return view('livewire.shared.caja-menor.add-pdf');
    }

    public function SaveInvoice(){
        $this->validate();

        // $this->factura->fcm_pdf_ruta = 'storage/'.$this->archivo->store('files/FacturasCM/PDF','public');
        $this->factura->fcm_pdf_ruta = 'storage/'.$this->archivo->storeAs('files/FacturasCM/PDF', $this->compra_menor->cm_folio.'.pdf', 'public');
        $this->factura->save();

        $this->dispatch('AssignInvoice', true);
    }
}
