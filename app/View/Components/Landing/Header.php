<?php

namespace App\View\Components\Landing;

use Illuminate\View\Component;

class Header extends Component
{
    public $title, $subtitle, $url;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $subtitle, $url)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.landing.header');
    }
}
