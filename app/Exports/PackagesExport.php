<?php

namespace App\Exports;

use App\Models\Package;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class PackagesExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;
    public function query()
    {
        return Package::query();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Package::all();
    }

    /**
     * Map the data for each row.
     */
    public function map($package): array
    {

        return [
            $package->tracking_code,
            $package->store->name ??null ,
            $package->name,
            $package->client_first_name . " " . $package->client_last_name,
            $package->client_phone,
            $package->commune->wilaya->name??null, 
            $package->commune->name??null,
            $package->delivery_type->name??null,
            $package->status->name??null,
        ];
    }

    /**
     * Define the column headings.
     */
    public function headings(): array
    {
        return [
            'Tracking Code',
            'Store Name',
            'Package Name',
            'Client Full Name',
            'Phone',
            'Wilaya',
            'Commune',
            'Delivery Type',
            'Status',
        ];
    }
}
