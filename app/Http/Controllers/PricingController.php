<?php

namespace App\Http\Controllers;

use App\Http\Requests\PricingStoreRequest;
use App\Http\Requests\PricingUpdateRequest;
use App\Http\Resources\PricingCollection;
use App\Http\Resources\PricingResource;
use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\PricingCollection
     */
    public function index(Request $request)
    {
        $pricings = Pricing::all();

        return response()->json($pricings);
    }

    /**
     * @param \App\Http\Requests\PricingStoreRequest $request
     * @return \App\Http\Resources\PricingResource
     */
    public function store(PricingStoreRequest $request)
    {
        $pricing = Pricing::create($request->validated());

        return response()->json($pricing);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pricing $pricing
     * @return \App\Http\Resources\PricingResource
     */
    public function show(Request $request, $pricingId)
    {
        $pricing = Pricing::find($pricingId);
        return response()->json($pricing);
    }

    /**
     * @param \App\Http\Requests\PricingUpdateRequest $request
     * @param \App\Models\Pricing $pricing
     * @return \App\Http\Resources\PricingResource
     */
    public function update(PricingUpdateRequest $request, $pricingId)
    {
        $pricing = Pricing::find($pricingId);
        
        $pricing->update($request->validated());

        return response()->json($pricing);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pricing $pricing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $pricingId)
    {
        $pricing = Pricing::find($pricingId);
        $pricing->delete();

        return response()->noContent();
    }
}
