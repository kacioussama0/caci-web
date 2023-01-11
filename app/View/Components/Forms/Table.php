<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Table extends Component
{

    public $object ;


    public function __construct($object)
    {
        $this->object = $object;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.table');
    }
}
