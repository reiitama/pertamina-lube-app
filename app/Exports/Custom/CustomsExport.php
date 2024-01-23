<?php

namespace App\Exports\Custom;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CustomsExport implements WithMultipleSheets
{
    private readonly array $condemIDs;

    public function __construct(string $condemIDs)
    {

        $this->condemIDs = explode(',', $condemIDs);
    }

    public function sheets(): array
    {
        $sheets = [];
        for ($i = 0; $i < count($this->condemIDs); $i++) {
            $sheets[] = new CustomPerIdSheet($this->condemIDs[$i]);
        }
        return $sheets;
    }
}
