<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Susenas2020;
use App\Models\NamaWilayah;
class Bappenas extends Component
{
    public $susenas;
    public $wilayah;
    public $prov;
    public $selected_prov;
    public $allProv;
    public function mount(){
        // $susenas = Susenas2020::with('wilayah')->take(10)->get()->toArray();
        $this->refreshData();
    }

    public function refreshData(){
        $this->prov = $this->selected_prov; 
        $prov = $this->selected_prov;
        $allProv = Susenas2020::with('wilayah')->select('r101')->get()->toArray();
        $allProv = collect($allProv)->groupBy('r101');
        $this->allProv = $allProv;
        
        $susenas = Susenas2020::with('wilayah')->select('weind','poor','r101')->when($this->prov, function($q) use($prov){
            return $q->where('r101',$prov);
        })->get()->toArray();
        
        $susenas = collect($susenas);
        $susenas = $susenas->groupBy('r101');

        $this->susenas = $susenas;
    }

    public function render()
    {
        return view('livewire.bappenas');
    }
}
