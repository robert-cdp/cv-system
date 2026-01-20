<?php

namespace App\View\Components\Menu;

use Illuminate\View\Component;

class Item extends Component
{
    public string $route;
    public string $icon;
    public string $label;
    public bool $active;

    public function __construct(string $route, string $icon, string $label)
    {
        $this->route = $route;
        $this->icon  = $icon;
        $this->label = $label;

        $this->active = request()->routeIs($route);
    }

    public function render()
    {
        return view('components.menu.item');
    }
}
