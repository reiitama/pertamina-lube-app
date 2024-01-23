<?php

namespace App\Exports\Condem;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class CondemPerIdSheet implements FromCollection, WithTitle
{
    private readonly int $condemID;

    public function __construct(int $condemID)
    {
        $this->condemID = $condemID;
    }

    public function title(): string
    {
        $result = DB::table('model')
            ->join('application', 'application.applicationID', '=', 'model.applicationID')
            ->join('manufacture', 'manufacture.manufacID', '=', 'model.manufacID')
            ->join('component', 'component.compoID', '=', 'model.compoID')
            ->join('condem', 'condem.modelID', '=', 'model.modelID') // Menambahkan join dengan tabel "condem"
            ->select(
                'application.applicationName',
                'manufacture.manufac',
                'component.compoName',
                'model.modelType',
            )
            ->where('condem.condemID', '=', $this->condemID)
            ->first();
        return $result->applicationName . ' ' . $result->manufac . ' ' . $result->compoName . ' ' . $result->modelType;
    }

    public function collection()
    {
        $data = DB::table('condem')
            ->where('condemID', '=', $this->condemID)
            ->select(
                'Vk 40 min',
                'Vk 40 max',
                'Vk 40 border',
                'Vk 40 per',
                'Vk 40 ket',
                'Vk 100 min',
                'Vk 100 max',
                'Vk 100 border',
                'Vk 100 per',
                'Vk 100 ket',
                'Oxi min',
                'Oxi max',
                'Oxi border',
                'Oxi per',
                'Oxi ket',
                'P min',
                'P max',
                'P border',
                'P per',
                'P ket',
                'Wt min',
                'Wt max',
                'Wt border',
                'Wt per',
                'Wt ket',
                'Zn min',
                'Zn max',
                'Zn border',
                'Zn per',
                'Zn ket',
                'Soot min',
                'Soot max',
                'Soot border',
                'Soot per',
                'Soot ket',
                'Nit min',
                'Nit max',
                'Nit border',
                'Nit per',
                'Nit ket',
                'TAN min',
                'TAN max',
                'TAN border',
                'TAN per',
                'TAN ket',
                'Ca min',
                'Ca max',
                'Ca border',
                'Ca per',
                'Ca ket',
                'Fu min',
                'Fu max',
                'Fu border',
                'Fu per',
                'Fu ket',
                'TBN min',
                'TBN max',
                'TBN border',
                'TBN per',
                'TBN ket',
                'Ag min',
                'Ag max',
                'Ag border',
                'Ag per',
                'Ag ket',
                'Sn min',
                'Sn max',
                'Sn border',
                'Sn per',
                'Sn ket',
                'Pb min',
                'Pb max',
                'Pb border',
                'Pb per',
                'Pb ket',
                'Fe min',
                'Fe max',
                'Fe border',
                'Fe per',
                'Fe ket',
                'Cu min',
                'Cu max',
                'Cu border',
                'Cu per',
                'Cu ket',
                'Cr min',
                'Cr max',
                'Cr border',
                'Cr per',
                'Cr ket',
                'Al min',
                'Al max',
                'Al border',
                'Al per',
                'Al ket',
                'Si min',
                'Si max',
                'Si border',
                'Si per',
                'Si ket',
                'Na min',
                'Na max',
                'Na border',
                'Na per',
                'Na ket',
                'PI min',
                'PI max',
                'PI border',
                'PI per',
                'PI ket',
                'TI min',
                'TI max',
                'TI border',
                'TI per',
                'TI ket',
                'Sulf min',
                'Sulf max',
                'Sulf border',
                'Sulf per',
                'Sulf ket',
                'Mg min',
                'Mg max',
                'Mg border',
                'Mg per',
                'Mg ket',
                'Mo min',
                'Mo max',
                'Mo border',
                'Mo per',
                'Mo ket',
                'NAS 1638 min',
                'NAS 1638 max',
                'NAS 1638 border',
                'NAS 1638 per',
                'NAS 1638 ket',
                'V min',
                'V max',
                'V border',
                'V per',
                'V ket',
                'FP COC min',
                'FP COC max',
                'FP COC border',
                'FP COC per',
                'FP COC ket',
                'Wt D 95 min',
                'Wt D 95 max',
                'Wt D 95 border',
                'Wt D 95 per',
                'Wt D 95 ket',
                'Wt KF min',
                'Wt KF max',
                'Wt KF border',
                'Wt KF per',
                'Wt KF ket',
                'Gly min',
                'Gly max',
                'Gly border',
                'Gly per',
                'Gly ket',
                'TBN_D4739 min',
                'TBN_D4739 max',
                'TBN_D4739 border',
                'TBN_D4739 per',
                'TBN_D4739 ket',
                'PP min',
                'PP max',
                'PP border',
                'PP per',
                'PP ket',
                'Ni min',
                'Ni max',
                'Ni border',
                'Ni per',
                'Ni ket',
                'B min',
                'B max',
                'B border',
                'B per',
                'B ket',
            )
            ->first();
        $data = get_object_vars($data);
        $raw_keys = array_keys($data);
        $keys = [''];
        $substrings = ['min', 'max', 'per', 'ket'];
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
