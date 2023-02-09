<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\stock;
use App\Http\Requests\StorestockRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $stocks = Stock::query()->paginate(10);

        return view('stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $products = Product::all();
        $stocks = Stock::all();

        return view('stocks.create', compact('products', 'stocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorestockRequest $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $stock = $request->only('amount','type', 'product_id');
        $stock['user_id'] = auth()->id();

        Stock::query()->create($stock);

        return redirect(route('stocks.index'));
    }
}
