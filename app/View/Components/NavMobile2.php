<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavMobile2 extends Component
{
    public $title;
    public $backUrl;
    /**
     * Create a new component instance.ddd
     */
    public function __construct($title,$backUrl=null)
    {
        $this->title = $title;
        $this->backUrl = $backUrl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-mobile2');
    }
}
