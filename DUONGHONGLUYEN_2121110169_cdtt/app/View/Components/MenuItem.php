<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\menu;

class MenuItem extends Component
{
    public $menu_item = null;
    public function __construct($rowmenu)
    {
        $this->menu_item = $rowmenu;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu = $this->menu_item;
        $args=[['status', '=', '1'], ['position', '=', 'mainmenu'], ['parent_id','=',$menu->id]];
        $list_menu = Menu::where($args)->orderBy('sort_order','ASC')->get();
        $menusub = false;
        if(count($list_menu)>0){
            $menusub = true;
        }
        return view('components.menu-item', compact('menu','list_menu','menusub'));
    }
}
