<?php

namespace App\Http\Controllers;

use App\Http\Resources\PackageResource;
use App\Models\DeliveryType;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Store;
use App\Models\Commune;
use App\Models\PackageStatus;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        return PackageResource::collection(Package::paginate(5));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'client_first_name' => 'required|string',
            'client_last_name' => 'required|string',
            'client_phone' => 'required|string',
        ]);

        //adding profile data that will be handleded next ..
             $validated['uuid']=Str::uuid();
             $validated['tracking_code']= strtoupper(fake()->unique()->bothify('TRK-####-???'));
             $validated['store_id']=  Store::inRandomOrder()->first()->id;
             $validated['commune_id']= Commune::inRandomOrder()->first()->id;
             $validated['status_id']= PackageStatus::inRandomOrder()->first()->id;
             $validated['delivery_type_id']= DeliveryType::inRandomOrder()->first()->id;
             $validated['address' ]= fake()->address;
             $validated['can_be_opened'] = fake()->boolean();
             $validated['cod_to_pay'] = fake()->randomFloat(2, 0, 5000);
             $validated['commission'] = fake()->randomFloat(2, 0, 500);
             $validated['status_updated_at'] = now();
             $validated['delivered_at' ]= fake()->optional()->dateTimeThisYear();
             $validated['delivery_price'] = fake()->randomFloat(2, 100, 1000);
             $validated['extra_weight_price'] = fake()->numberBetween(0, 500);
             $validated['free_delivery' ]= fake()->boolean();
             $validated['packaging_price'] = fake()->numberBetween(0, 200);
             $validated['partner_cod_price' ]= fake()->randomFloat(2, 0, 500);
             $validated['partner_delivery_price'] = fake()->numberBetween(0, 1000);
             $validated['partner_return'] = fake()->randomFloat(2, 0, 1000);
             $validated['price'] = fake()->randomFloat(2, 1000, 5000);
             $validated['price_to_pay'] = fake()->randomFloat(2, 1000, 5000);
             $validated['return_price'] = fake()->numberBetween(0, 500);
             $validated['total_price'] = fake()->randomFloat(2, 1500, 8000);
             $validated['weight' ]= fake()->numberBetween(500, 5000);

        Package::create($validated);

        return redirect()->back()->with('success', 'Package created successfully.');
    }
}
