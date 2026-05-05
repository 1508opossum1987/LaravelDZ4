<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    private const int ITEMS_PER_PAGE = 12;

    public function index(Request $request): View
    {
        $query = Product::query();

        if ($request->has('search') && $request->get('search') != '') {
            $query->where('name', 'like', '%' . $request->get('search') . '%')
            ->orWhere('description', 'like', '%' . $request->get('search') . '%');
        }

        return view('home', ['products' => $query
            ->with(['category', 'brand', 'country'])
            ->paginate(self::ITEMS_PER_PAGE)
        ]);
    }
}
