<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\slider;

class Slidershow extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        $args=[['status', '=', '1'], ['position', '=', 'slideshow']];
        $list_slider = Slider::where($args)->orderBy('sort_order','ASC')->get();
        //var_dump($list_slider);
       return view('components.slidershow',compact('list_slider'));
    }
}
