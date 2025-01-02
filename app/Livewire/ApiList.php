<?php

namespace App\Livewire;

use App\Models\ApiMeta;
use Livewire\Component;

class ApiList extends Component
{
    public $apilist;

    public function mount()
    {
        $this->apilist = ApiMeta::all();
    }

    public function render()
    {
        return view('livewire.api-list', ['apis' => $this->apilist]);
    }
}
