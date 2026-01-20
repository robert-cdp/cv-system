<?php

namespace App\View\Components\Menu;

use Illuminate\View\Component;

class Group extends Component
{
    public string $icon;
    public string $label;
    public string $activeRoute;
    public bool $open;

    public function __construct(string $icon, string $label, string $activeRoute)
    {
        $this->icon = $icon;
        $this->label = $label;
        $this->activeRoute = $activeRoute;

        $this->open = request()->routeIs($activeRoute);
    }

    public function render()
    {
        return view('components.menu.group');
    }
}
