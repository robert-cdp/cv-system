<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Textarea extends Component
{
    public string $name;
    public string $label;
    public int $rows;
    public string $placeholder;
    public string $icon;
    public $value;

    public function __construct(
        string $name,
        string $label,
        int $rows = 3,
        string $placeholder = '',
        string $icon = '',
        $value = null
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->rows = $rows;
        $this->placeholder = $placeholder;
        $this->icon = $icon;
        $this->value = $value ?? old($name);
    }

    public function render()
    {
        return view('components.form.textarea');
    }
}
