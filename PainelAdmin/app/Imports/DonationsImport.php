<?php

namespace App\Imports;

use App\Donation;
use Maatwebsite\Excel\Concerns\ToModel;

class DonationsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Donation([
            'value'     => $row[0],
            'document'    => $row[1], 
            'name'    => $row[2], 
            'contact'    => $row[3], 
        ]);
    }
}
