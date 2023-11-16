<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductItem extends Component
{
    public $row_product = null;
    public function __construct($rowproduct)
    {
        $this->row_product = $rowproduct;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $product = $this->row_product;
        return view('components.product-item', compact('product'));
    }
}
