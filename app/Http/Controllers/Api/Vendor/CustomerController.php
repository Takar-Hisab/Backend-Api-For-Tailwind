<?php

namespace App\Http\Controllers\Api\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class CustomerController extends Controller
{

    public function myCustomes()
    {
        $customes = Customer::query()
            ->with('user')
            ->where('vendor_id', Auth::user()->vendor?->id)
            ->whereLike(['user.name', 'user.email', 'user.phone'], request()->input('search'))
            ->sortBy()
            ->pagination();
        return CustomerResource::collection($customes)->additional(['queries' => request()->query()]);
    }

    public function singleCustomer(string $id)
    {
        $custmer = Customer::query()
            ->with(['user', 'plan'])
            ->findOrFail($id);
        return CustomerResource::make($custmer);
    }

    public function createCustomer(Request $request): CustomerResource
    {
        $data = $request->validate([
//            'userName' => ['nullable', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'unique:'.User::class, 'regex:/^(?:\+88|88)?(01[3-9]\d{8})$/'],
            'plan_id' => ['nullable', 'integer', Rule::exists('plans', 'id')]
        ]);
        $password = null;
        if(Auth::check() && Auth::user()->type == 'vendor'){
            $password = implode('', Arr::random(range(0, 9), 6));
        }else{
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $password = $request->input('password');
        }

        $user = User::create([
            'name' => $request->name,
            'user_name' => $request->userName,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($password),
        ])->assignRole('Customer');

        $plan = $request->input('plan_id') ? Plan::query()->findOrFail($request->input('plan_id')) : Plan::query()->first();

        $customer = Customer::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'plan_reg_date' => Carbon::now(),
            'plan_exp_date' => Carbon::now()->addMonths(intval($plan->duration))
        ]);

        return CustomerResource::make($customer->load('user'));

    }


}
