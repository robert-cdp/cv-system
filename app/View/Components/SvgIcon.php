<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SvgIcon extends Component
{
    public string $name;
    public string $class;

    public function __construct($name, $class = '')
    {
        $this->name = $name;
        $this->class = $class;
    }

    public function render()
    {
        return view('components.svg-icon');
    }
}