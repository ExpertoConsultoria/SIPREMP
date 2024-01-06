<?php

namespace App\Livewire\N4\Inventario;

use Livewire\Component;
use App\Models\Vales_entrada_material;
use App\Models\Materiales_recibidos;

use App\Models\Plan1Fin;
use App\Models\Plan2Proposito;
use App\Models\Plan3Componente;
use App\Models\Plan4Actividad;

class IDetails extends Component
{
    public $folio = '';
    public $valeEntrada;
    public $items;

    public $MIR;
    public $subtotal;

    public function render()
    {
        return view('livewire.n4.inventario.i-details');
    }

    public function mount() {
        $this->valeEntrada = Vales_entrada_material::where('folio', $this->folio)->first();
        // dd($this->valeEntrada);
        $this->items = Materiales_recibidos::where('folio_vale_entrada', $this->folio)->get();

        foreach($this->items as $item) {
            $this->subtotal += $item->precio_unitario * $item->cantidad;
        }

        $fin = Plan1Fin::where('id',$this->valeEntrada->mir_id_fin)->first();
        $proposito = Plan2Proposito::where('id',$this->valeEntrada->mir_id_proposito)->first();
        $componente = Plan3Componente::where('id',$this->valeEntrada->mir_id_componente)->first();
        $actividad = Plan4Actividad::where('id',$this->valeEntrada->mir_id_actividad)->first();

        $mir = $fin->NoFin.'-'.$proposito->NoProposito.'-'.$componente->NoComponente.'-'.$actividad->NoActividad;
        $this->MIR = $mir;
    }
}
