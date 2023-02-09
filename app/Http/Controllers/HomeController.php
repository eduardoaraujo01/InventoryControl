<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $lowStock = DB::query()->from(
            Stock::query()->where('type', '=', 'DEBIT')->select(DB::raw('SUM(amount) as debit, 0 as credit, product_id'))->groupBy('product_id')
            ->union(
                Stock::query()->where('type', '=', 'CREDIT')->select(DB::raw('0 as debit, SUM(amount) as credit, product_id'))->groupBy('product_id')
            )
        , 'stock')
            ->join('products', 'products.id', '=', 'stock.product_id')
            ->select(DB::raw('SUM(credit - debit) as amount'), 'products.id', 'products.min_amount')
            ->groupBy('products.id', 'products.min_amount')
            ->havingRaw('products.min_amount >= amount AND amount > 0')
            ->get()
            ->map(function ($data) {
                $product = Product::query()->find($data->id);
                $product->amount = $data->amount;
                return $product;
            });

        $outOfStock = DB::query()->from(
            Stock::query()->where('type', '=', 'DEBIT')->select(DB::raw('SUM(amount) as debit, 0 as credit, product_id'))->groupBy('product_id')
                ->union(
                    Stock::query()->where('type', '=', 'CREDIT')->select(DB::raw('0 as debit, SUM(amount) as credit, product_id'))->groupBy('product_id')
                )
            , 'stock')
            ->join('products', 'products.id', '=', 'stock.product_id')
            ->select(DB::raw('SUM(credit - debit) as amount'), 'products.id', 'products.min_amount')
            ->groupBy('products.id', 'products.min_amount')
            ->having('amount', '=', 0)
            ->get()
            ->map(function ($data) {
                $product = Product::query()->find($data->id);
                $product->amount = $data->amount;
                return $product;
            });
        $products = Product::query()->count();
        return view('home', compact('lowStock', 'products', 'outOfStock'));
    }
}
