<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    
    {
        if (isset($this->store_id)){
            $store = $this->store;    
        }
        if (isset($this->commune_id)){
            $commune = $this->commune; 
            $wilaya= $commune->wilaya;  
        }
        if (isset($this->delivery_type_id)){
            $dlv_type = $this->delivery_type;     
        }
        if (isset($this->status_id)){
            $status = $this->status;     
        }

        return [
            "tracking_code"=> $this->tracking_code, //"TRK-7968-FEB",
            "store_name"=> $store->name?? null, //"ADN DZ STORE",
            "package_name"=> $this->name, //"Lunnette",
            "client_full_name"=> $this->client_first_name." ".$this->client_last_name , //"Adnan Sematel",
            "phone"=> $this->client_phone, //"0549131355",
            "wilaya"=> $wilaya->name?? null,
            "commune"=>  $commune->name?? null, //"Dely Brahim",
            "delivery_type"=> $dlv_type->name?? null, //"Same Day",
            "status"=> $status->name?? null, //"Pending",
        ];
    }
}
