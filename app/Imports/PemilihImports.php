<?php

namespace App\Imports;

use App\Models\Pemilih;
use Maatwebsite\Excel\Concerns\ToModel;

class PemilihImports implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pemilih([
            'name' => $row[5],
            'username' => $row[31],
            'prodi' => substr($row[13], 3) ?? '',
            'tanggal_lahir' => date('Y-m-d', strtotime($row[9])) ?? ''
        ]);
    }
}
