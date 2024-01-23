<?php

namespace App\Exports\Condem;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CondemsExport implements WithMultipleSheets
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
            $sheets[] = new CondemPerIdSheet($this->condemIDs[$i]);
        }
        return $sheets;
    }
}
