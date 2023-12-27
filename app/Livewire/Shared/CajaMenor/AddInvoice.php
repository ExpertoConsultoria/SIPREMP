<?php

namespace App\Livewire\Shared\CajaMenor;

use Livewire\Component;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\FacturaCM;
use App\Models\CompraMenor;
use Livewire\WithFileUploads;

class AddInvoice extends Component
{
    use WithFileUploads;

    public $details_of_folio;

    // Field
    public $factura_PDF;

    // Interactions
    public $is_loading_pdf;
    public $is_done;
    public $pdf_message = '';

    public $nombrePDF = '';
    public $extensionFile = '';

    public $factura;

    protected function rules() {
        return [
            'factura_PDF' => 'required | mimes:pdf|max:1024'
        ];
    }

    protected $messages = [
        'factura_PDF.required' => 'Este campo es Obligatorio'
    ];

    public function mount($details_of_folio)
    {
        $this->details_of_folio = $details_of_folio;
        $this->is_loading_pdf = false;
        $this->is_done = false;
    }

    public function render()
    {
        return view('livewire.shared.caja-menor.add-invoice');
    }

    public function SaveInvoice()
    {
        $factura_cm_id = CompraMenor::where('cm_folio', $this->details_of_folio)->value('factura_cm_id');
    
        if ($factura_cm_id) {
            $this->factura = FacturaCM::find($factura_cm_id);
    
            if ($this->factura_PDF) {
                $this->factura->fcm_pdf_ruta = 'storage/'.$this->factura_PDF->storeAs('files/FacturasCM/PDF', $this->details_of_folio.'.pdf', 'public');

                $this->factura->save();
            
                $this->is_loading_pdf = false;
                $this->is_done = true;
            
                $this->dispatch('simpleAlert', 'Archivo PDF Se Cargado Correctamente', 'success');
            } else {
                $this->dispatch('simpleAlert', 'El archivo PDF no se ha cargado', 'error');
            }
        }
        else {
            $this->dispatch('simpleAlert', 'La factura no se encontró', 'error');
        }
    }
    

}
