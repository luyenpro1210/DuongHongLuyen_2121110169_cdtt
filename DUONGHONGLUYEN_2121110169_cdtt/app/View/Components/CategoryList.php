<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\category;
class CategoryList extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $args = [
            ['status', '=', '1'],
            ['parent_id', '=', 0]
        ];
        $list_category = Category::where($args)
        ->orderBy('sort_order', 'ASC')
        ->get();
        return view('components.category-list', compact('list_category'));
    }
}
