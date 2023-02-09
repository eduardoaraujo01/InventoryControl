<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use App\Models\UnitOfMeasurement;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create(Product $product)
    {
        $product = Product::all();
        $users = User::all();
        $categories = Category::all();
        $unitOfMeasurements = UnitOfMeasurement::all();
        $providers = Provider::all();
        return view('products.create', compact('product', 'providers', 'unitOfMeasurements', 'categories', 'users'));
    }

    public function store(Request $request)
    {
        $product = $request->only(['name', 'description', 'bar_code', 'price', 'cost', 'provider_id','category_id','unit_of_measurement_id','min_amount']);;
        $product['user_id'] = auth()->id();
        $dbproduct = Product::create($product);
        return redirect(route('products.show', [$dbproduct]));
        }

    public function edit(Product $product)
    {
        $users = User::all();
        $categories = Category::all();
        $unitOfMeasurements = UnitOfMeasurement::all();
        $providers = Provider::all();
        return view('products.edit', compact('product', 'providers', 'unitOfMeasurements', 'categories', 'users'));
    }

    /**
     * @param Product $product
     * @return View|Factory|Redirector|RedirectResponse|Application
     */
    public function show(Product $product): View|Factory|Redirector|RedirectResponse|Application
    {
        return view('products.view', compact('product'));
    }

    public function update(Request $request)
    {

        $request_data = $request->only(['name', 'description', 'unit_of_measurement_id', 'bar_code', 'price', 'cost', 'provider_id', 'min_amount']);

        $product = Product::find($request->id);
        if (!$product) {
            return '[ERROR] Product não existente';
        }
        $product->update($request_data);
        $product->save();
        return redirect()->back();
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return response()->json(['error' => false, 'data' => $product]);
        } catch (\Exception) {
            return response()->json(['error' => true]);
        }
    }
}
