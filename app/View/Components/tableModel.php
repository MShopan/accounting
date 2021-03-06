<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tableModel extends Component
{
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type="dark")
    {
        $this->type= $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-model');
    }
}
