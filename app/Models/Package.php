<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable= [
        'uuid',
        'name' ,
        'client_first_name' ,
        'client_last_name',
        'client_phone' ,
        'tracking_code',
        'store_id',
        'commune_id',
        'status_id',
        'delivery_type_id',
        'address',
        'can_be_opened',
        'cod_to_pay',
        'commission',
        'status_updated_at',
        'delivered_at',
        'delivery_price',
        'extra_weight_price',
        'free_delivery',
        'packaging_price',
        'partner_cod_price',
        'partner_delivery_price',
        'partner_return',
        'price',
        'price_to_pay',
        'return_price',
        'total_price',
        'weight',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }
    public function status()
    {
        return $this->belongsTo(PackageStatus::class);
    }
    public function delivery_type()
    {
        return $this->belongsTo(DeliveryType::class);
    }
}
