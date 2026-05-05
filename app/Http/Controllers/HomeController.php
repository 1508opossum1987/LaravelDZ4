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

        if ($request->has('sort'))
        {
            switch ($request->get('sort')){
                case 'price_asc':
                    $query->orderBy('price');
                    break;
                case 'price_desc':
                    $query->orderByDesc('price');
                    break;
                case 'name_asc':
                    $query->orderBy('name');
                    break;
                case 'name_desc':
                    $query->orderByDesc('name');
                    break;
                case 'newest':
                    $query->orderByDesc('created_at');
                    break;
                case 'oldest':
                    $query->orderBy('created_at');
                    break;
            }
        }
        return view('home', ['products' => $query
            ->with(['category', 'brand', 'country'])
            ->paginate(self::ITEMS_PER_PAGE)
        ]);
    }
}
