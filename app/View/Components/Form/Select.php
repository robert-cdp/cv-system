<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{
    public string $name;
    public string $label;
    public string $icon;
    public iterable $options;
    public ?string $optionValue;
    public ?string $optionLabel;
    public ?string $placeholder;
    public $value;

    public function __construct(
        string $name,
        string $label,
        string $icon = '',
        iterable $options = [],
        ?string $optionValue = null,
        ?string $optionLabel = null,
        ?string $placeholder = null,
        $value = null
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->icon = $icon;
        $this->options = $options;
        $this->optionValue = $optionValue;
        $this->optionLabel = $optionLabel;
        $this->placeholder = $placeholder;
        $this->value = old($name, $value);
    }

    public function render()
    {
        return view('components.form.select');
    }
}
