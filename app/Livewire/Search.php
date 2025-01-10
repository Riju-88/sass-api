<?php

namespace App\Livewire;

use App\Models\ApiMeta;
use Livewire\Component;

class Search extends Component
{
    public $keyword = '';

    public $apiList = [];

    public function updatedKeyword()
    {
        // Update the list when the keyword changes
        $this->apiList = !empty($this->keyword)
            ? ApiMeta::where('name', 'like', '%' . $this->keyword . '%')->pluck('name')->toArray()
            : [];
    }

    public function render()
    {
        return view('livewire.search');
    }
}
