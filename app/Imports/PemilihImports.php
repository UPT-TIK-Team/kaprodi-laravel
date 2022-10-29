<?php

namespace App\Imports;

use App\Models\Pemilih;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PemilihImports implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pemilih([
            'name' => $row['nama'],
            'username' => $row['username'],
            'prodi' => substr($row['jurusan'], 3) ?? '',
            'tanggal_lahir' => date('Y-m-d', strtotime($row['tanggallahir'])) ?? ''
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
