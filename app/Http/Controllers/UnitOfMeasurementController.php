<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UnitOfMeasurement;
use App\Http\Requests\StoreUnitOfMeasurementRequest;
use App\Http\Requests\UpdateUnitOfMeasurementRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;


class UnitOfMeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitOfMeasurements = UnitOfMeasurement::query()->paginate(10);

        return view('unitOfMeasurements.index', compact('unitOfMeasurements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unitOfMeasurements = UnitOfMeasurement::all();
        return view('unitOfMeasurements.create', compact('unitOfMeasurements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnitOfMeasurementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unitOfMeasurement = $request->only(['name']);;
        $unitOfMeasurement['user_id'] = auth()->id();
        $dbunitOfMeasurement = UnitOfMeasurement::create($unitOfMeasurement);
        return redirect(route('unitOfMeasurements.show', [$dbunitOfMeasurement]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function show(UnitOfMeasurement $unitOfMeasurement) : View|Factory|Redirector|RedirectResponse|Application
    {
        //

        return view('unitOfMeasurements.view', compact('unitOfMeasurement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitOfMeasurement $unitOfMeasurement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnitOfMeasurementRequest  $request
     * @param  \App\Models\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnitOfMeasurementRequest $request, UnitOfMeasurement $unitOfMeasurement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitOfMeasurement $unitOfMeasurement)
    {
        //
    }
}
