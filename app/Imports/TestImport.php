<?php

namespace App\Imports;

use App\Models\Province;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class TestImport implements ToModel, WithChunkReading, ShouldQueue
{
    public function model(array $row)
    {
        try {
            $data = [
                'code' => uniqid() . '_' . $row[0],
                'name' => $row[1],
                'slug' => uniqid() . '_' . $row[2],
                'level' => 1,
                'sort' => 1
            ];
            Province::create($data);
        } catch(\Exception $e) {
            info($e->getMessage());
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
