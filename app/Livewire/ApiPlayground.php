<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Apimeta;

class ApiPlayground extends Component
{
    public $apiDetail;

    public function mount($api)
    {
        $this->apiDetail = Apimeta::where('name', $api)->first();
    }
    public function render()
    {
        return view('livewire.api-playground', ['apiDetail' => $this->apiDetail]);
    }
}
