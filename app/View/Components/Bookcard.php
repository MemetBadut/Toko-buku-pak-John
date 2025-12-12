<?php

namespace App\View\Components;

use App\Models\ProdukBuku;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Bookcard extends Component
{
    /**
     * Create a new component instance.
     */
    public $data_produk;

    public function __construct($dataProduk = null)
    {

        $this->data_produk = $dataProduk;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.bookcard');
    }
}
