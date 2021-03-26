<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class SearchInput extends Component
{
    public $label;
    public function __construct($label)
    {
        $this->label = $label;
    }
    
    public function render()
    {
        return view('components.form.search-input');
    }
}
