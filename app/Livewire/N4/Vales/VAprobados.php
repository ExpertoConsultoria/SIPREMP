<?php

namespace App\Livewire\N4\Vales;

use Livewire\Component;

class VAprobados extends Component
{
    public function render()
    {
        return view('livewire.n4.vales.v-aprobados');
    }
    public function getView()
    {
    return redirect()->to(route("vales.view"));
    }
    public function getAdd()
    {
    return redirect()->to(route("vales.agregar"));
    }
    public function getPrint()
    {
    return redirect()->to(route("vales.imprimir"));
    }
    public function getExpe()
    {
    return redirect()->to(route("vales.expediente"));
    }
}
