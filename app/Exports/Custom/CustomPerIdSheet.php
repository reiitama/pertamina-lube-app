<?php

namespace App\Exports\Custom;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class CustomPerIdSheet implements FromCollection, WithTitle
{
    private readonly int $condemID;

    public function __construct(int $condemID)
    {
        $this->condemID = $condemID;
    }

    public function title(): string
    {
        $result = DB::table('equip')
            ->where('custo_condem.conID', '=', $this->condemID)
            ->join('customer', 'customer.customerID', '=', 'equip.customerID')
            ->join('area', 'area.areaID', '=', 'equip.areaID')
            ->join('city', 'city.cityID', '=', 'area.cityID')
            ->join('model', 'model.modelID', '=', 'equip.modelID')
            ->join('custo_condem', 'custo_condem.equipID', '=', 'equip.equipID') // Mengganti nama tabel "condem" dengan "custo_condem"
            ->select(
                'customer.customerName',
                'area.areaName',
                'city.cityName',
                'equip.equipCode',
                'model.modelType',
                'equip.engineNumber',
            )
            ->first();
        return $result->customerName . ' - ' . $result->areaName . ' - ' . $result->cityName . ' - ' . $result->equipCode . ' - ' . $result->modelType . ' - ' . $result->engineNumber;
    }

    public function collection()
    {
        $data = DB::table('custo_condem')
            ->where('conID', '=', $this->condemID)
            ->select(
                'Vk 40 min',
                'Vk 40 max',
                'Vk 40 border',
                'Vk 40 per',
                'Vk 100 min',
                'Vk 100 max',
                'Vk 100 border',
                'Vk 100 per',
                'Oxi min',
                'Oxi max',
                'Oxi border',
                'Oxi per',
                'P min',
                'P max',
                'P border',
                'P per',
                'Wt min',
                'Wt max',
                'Wt border',
                'Wt per',
                'Zn min',
                'Zn max',
                'Zn border',
                'Zn per',
                'Soot min',
                'Soot max',
                'Soot border',
                'Soot per',
                'Nit min',
                'Nit max',
                'Nit border',
                'Nit per',
                'TAN min',
                'TAN max',
                'TAN border',
                'TAN per',
                'Ca min',
                'Ca max',
                'Ca border',
                'Ca per',
                'Fu min',
                'Fu max',
                'Fu border',
                'Fu per',
                'TBN min',
                'TBN max',
                'TBN border',
                'TBN per',
                'Ag min',
                'Ag max',
                'Ag border',
                'Ag per',
                'Sn min',
                'Sn max',
                'Sn border',
                'Sn per',
                'Pb min',
                'Pb max',
                'Pb border',
                'Pb per',
                'Fe min',
                'Fe max',
                'Fe border',
                'Fe per',
                'Cu min',
                'Cu max',
                'Cu border',
                'Cu per',
                'Cr min',
                'Cr max',
                'Cr border',
                'Cr per',
                'Al min',
                'Al max',
                'Al border',
                'Al per',
                'Si min',
                'Si max',
                'Si border',
                'Si per',
                'Na min',
                'Na max',
                'Na border',
                'Na per',
                'PI min',
                'PI max',
                'PI border',
                'PI per',
                'TI min',
                'TI max',
                'TI border',
                'TI per',
                'Sulf min',
                'Sulf max',
                'Sulf border',
                'Sulf per',
                'Mg min',
                'Mg max',
                'Mg border',
                'Mg per',
                'Mo min',
                'Mo max',
                'Mo border',
                'Mo per',
                'NAS 1638 min',
                'NAS 1638 max',
                'NAS 1638 border',
                'NAS 1638 per',
                'V min',
                'V max',
                'V border',
                'V per',
                'FP COC min',
                'FP COC max',
                'FP COC border',
                'FP COC per',
                'Wt D 95 min',
                'Wt D 95 max',
                'Wt D 95 border',
                'Wt D 95 per',
                'Wt KF min',
                'Wt KF max',
                'Wt KF border',
                'Wt KF per',
                'Gly min',
                'Gly max',
                'Gly border',
                'Gly per',
                'TBN_D4739 min',
                'TBN_D4739 max',
                'TBN_D4739 border',
                'TBN_D4739 per',
                'PP min',
                'PP max',
                'PP border',
                'PP per',
                'Ni min',
                'Ni max',
                'Ni border',
                'Ni per',
                'B min',
                'B max',
                'B border',
                'B per',
            )
            ->first();
        $data = get_object_vars($data);
        $raw_keys = array_keys($data);
        $keys = [''];
        $substrings = ['min', 'max', 'per'];
        foreach ($raw_keys as $key) {
            foreach ($substrings as $substring) {
                $substring = ' ' . $substring;
                if (str_contains($key, $substring)) {
                    $tempKey = str_replace($substring, '', $key);
                    if (!in_array($tempKey, $keys)) {
                        $keys[] = $tempKey;
                    }
                }
            }
        }
        $collection = collect([$keys]);
        $data_collection = collect($data);
        foreach ($substrings as $substring) {
            $tempArr = [$substring];
            foreach ($keys as $key) {
                if ($key == '') continue;
                $fullKey = $key . ' ' . $substring;
                if (!$data_collection->has($fullKey)) continue;
                if (str_contains($fullKey, 'per')) {
                    $tempArr[] = $data_collection[$fullKey] == "1" ? "Percent / %" : "Numeric";
                } else {
                    $tempArr[] = $data_collection[$fullKey];
                }
            }
            $collection->push($tempArr);
        }

        return $collection;
    }
}
