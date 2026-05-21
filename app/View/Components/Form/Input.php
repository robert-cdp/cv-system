<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public string $name;
    public string $label;
    public string $type;
    public string $icon;
    public string $placeholder;
    public bool $required;
    public $value;
    public $step;

    public function __construct(
        string $name,
        string $label,
        string $type = 'text',
        string $icon = '',
        string $placeholder = '',
        bool $required = false,
        $value = null,
        $step = null
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->icon = $icon;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->value = $value ?? old($name);
        $this->step = $step;
    }

    public function render()
    {
        return view('components.form.input');
    }
}
