<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\VendorResource;
use App\Models\Customer;
use App\Models\User;
use App\Models\Vendor;
use App\Notifications\CustomerCreateNotificaiton;
use App\Notifications\VendorCreateNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'perPage'=>'nullable|integer|max:1000'
        ]);

        $vendors = User::query()
            ->whereType('vendor')
            ->with(['vendor'])
            ->search(['name', 'email','phone'], $request->input('search'));


        return UserResource::collection($vendors)->additional(['queries' => $request->query()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVendorRequest $request)
    {
        $user = User::create($request->validated());
        $vendor = Vendor::create([
           'user_id' => $user->id,
           'register_date' => Carbon::now('UTC'),
           'referal_code' => uniqueString(6)
        ]);

        $user->notify(new VendorCreateNotification($user));

        return VendorResource::make($vendor->load('user'));
    }

    /**
     * Display the vendor customes resource collections.
     */
    public function getVentorCustomers(string $vendorId)
    {
        $customes = Customer::query()
            ->with('user')
            ->where('vendor_id', $vendorId)
            ->whereLike(['user.name', 'user.email', 'user.phone'], request()->input('search'))
            ->sortBy()
            ->pagination();
        return CustomerResource::collection($customes)->additional(['queries' => request()->query()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vendor = Vendor::query()
            ->with('user')
            ->when(request()->input('withCustomers'), function ($query){
                $query->with('customers');
            })->findOrFail($id);

        return VendorResource::make($vendor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendorRequest $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
