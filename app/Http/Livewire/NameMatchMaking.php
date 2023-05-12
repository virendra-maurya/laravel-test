<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NameMatchMaking extends Component
{

    public $search;

    public $phones = [
        8401105010,
        9123456789,
        9123456789,
    ];

    public $names = [
        'virendra',
        'xyz',
        'abc'
    ];

    public $resultText = '';

    public function findName()
    {
        $resultIndex = collect($this->phones)->filter(function ($item){
            return \Str::startsWith($item, $this->search);
        })->map(function ($item, $index){
            return ord($this->names[$index]);
        })->sort()->keys()->first();

        if (!is_null($resultIndex)){
            $this->resultText = $this->names[$resultIndex];
        }else{
            $this->resultText = '';
        }

    }

    public function render()
    {
        return view('livewire.name-match-making')->layout('components.layout');
    }
}
