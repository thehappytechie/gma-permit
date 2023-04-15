<?php

namespace App\Imports;

use App\Models\Vessel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VesselsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Vessel([
            'name'     => $row['name'],
            'vessel_type'     => $row['vessel_type'],
            'flag'     => $row['flag'],
            'registry_port'     => $row['registry_port'],
            'gross_tonnage'     => $row['gross_tonnage'],
            'call_sign'     => $row['call_sign'],
            'owner_details'     => $row['owner_details'],
        ]);
    }
}
