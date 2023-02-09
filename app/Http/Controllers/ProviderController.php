<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Category;
use App\Models\Product;
use App\Models\UnitOfMeasurement;
use App\Models\User;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $providers = Provider::query()->paginate(10);
        return view('providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $provider = Provider::all();
        return view('providers.create', compact('provider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProviderRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $provider = $request->only('name', 'address', 'phone', 'email');
        $provider['user_id'] = auth()->id();
        $dbprovider = Provider::create($provider);
        return redirect(route('providers.show', [$dbprovider]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return View
     */
    public function show(Provider $provider)
    {
        return view('providers.view', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return View
     */
    public function edit(Provider $provider)
    {
        return view('providers.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProviderRequest  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Provider $provider)
    {
        $request_data = $request->only(['name', 'address', 'phone', 'email' ]);

        $provider = Provider::find($request->id);
        if (!$provider) {
            return '[ERROR] Product não existente';
        }
        $provider->update($request_data);
        $provider->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        try {
            $provider->delete();
            return response()->json(['error' => false, 'data' => $provider]);
        } catch (\Exception) {
            return response()->json(['error' => true]);
        }
    }

}
