<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    private const int ITEMS_PER_PAGE = 12;

    public function index(): View
    {
        $products = Product::query()
            ->with(['category', 'brand', 'country'])
            ->paginate(self::ITEMS_PER_PAGE);

        return view('home', ['products' => $products]);
    }
}
