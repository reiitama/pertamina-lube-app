<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use App\Models\Oil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class OilController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
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
                'condem.*' // Menambahkan semua kolom dari tabel "condem" ke dalam select
            )
            ->get();

        return view('oil.index', ['result' => $result]);
    }


    /**
     * Display the specified resource.
     */
    public function show($condemID)
    {
        // Menggunakan model Condemning dengan tabel condem
        $oil = Oil::findOrFail($condemID);

        if (!$oil) {
            return abort(404);
        }

        $columns = [
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
            'Pl min',
            'Pl max',
            'Pl border',
            'Pl per',
            'Pl ket',
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
        ];


        $categories = [
            'Vk 40' => 5,
            'Vk 100' => 5,
            'Oxi' => 5,
            'P' => 5,
            'Wt' => 5,
            'Zn' => 5,
            'Soot' => 5,
            'Nit' => 5,
            'TAN' => 5,
            'Ca' => 5,
            'Fu' => 5,
            'TBN' => 5,
            'Ag' => 5,
            'Sn' => 5,
            'Pb' => 5,
            'Fe' => 5,
            'Cu' => 5,
            'Cr' => 5,
            'Al' => 5,
            'Si' => 5,
            'Na' => 5,
            'PI' => 5,
            'PL' => 5,
            'TI' => 5,
            'Sulf' => 5,
            'Mg' => 5,
            'Mo' => 5,
            'NAS 1638' => 5,
            'V' => 5,
            'FP COC' => 5,
            'Wt D 95' => 5,
            'Wt KF' => 5,
            'Gly' => 5,
            'TBN_D4739' => 5,
            'PP' => 5,
            'NI' => 5,
            'B' => 5,
        ];

        return view('oil.show', compact('oil', 'columns', 'categories'));
    }

    public function edit($id)
    {
        // Using model Oil with table oil
        $oil = Oil::find($id);

        if (!$oil) {
            return abort(404);
        }

        $columns = [
            ['name' => 'Vk 40 min', 'type' => 'string'],
            ['name' => 'Vk 40 max', 'type' => 'string'],
            ['name' => 'Vk 40 border', 'type' => 'string'],
            ['name' => 'Vk 40 per', 'type' => 'string'],
            ['name' => 'Vk 40 ket', 'type' => 'string'],
            ['name' => 'Vk 100 min', 'type' => 'string'],
            ['name' => 'Vk 100 max', 'type' => 'string'],
            ['name' => 'Vk 100 border', 'type' => 'string'],
            ['name' => 'Vk 100 per', 'type' => 'string'],
            ['name' => 'Vk 100 ket', 'type' => 'string'],
            ['name' => 'Oxi min', 'type' => 'string'],
            ['name' => 'Oxi max', 'type' => 'string'],
            ['name' => 'Oxi border', 'type' => 'string'],
            ['name' => 'Oxi per', 'type' => 'string'],
            ['name' => 'Oxi ket', 'type' => 'string'],
            ['name' => 'P min', 'type' => 'string'],
            ['name' => 'P max', 'type' => 'string'],
            ['name' => 'P border', 'type' => 'string'],
            ['name' => 'P per', 'type' => 'string'],
            ['name' => 'P ket', 'type' => 'string'],
            ['name' => 'Wt min', 'type' => 'string'],
            ['name' => 'Wt max', 'type' => 'string'],
            ['name' => 'Wt border', 'type' => 'string'],
            ['name' => 'Wt per', 'type' => 'string'],
            ['name' => 'Wt ket', 'type' => 'string'],
            ['name' => 'Zn min', 'type' => 'string'],
            ['name' => 'Zn max', 'type' => 'string'],
            ['name' => 'Zn border', 'type' => 'string'],
            ['name' => 'Zn per', 'type' => 'string'],
            ['name' => 'Zn ket', 'type' => 'string'],
            ['name' => 'Soot min', 'type' => 'string'],
            ['name' => 'Soot max', 'type' => 'string'],
            ['name' => 'Soot border', 'type' => 'string'],
            ['name' => 'Soot per', 'type' => 'string'],
            ['name' => 'Soot ket', 'type' => 'string'],
            ['name' => 'Nit min', 'type' => 'string'],
            ['name' => 'Nit max', 'type' => 'string'],
            ['name' => 'Nit border', 'type' => 'string'],
            ['name' => 'Nit per', 'type' => 'string'],
            ['name' => 'Nit ket', 'type' => 'string'],
            ['name' => 'TAN min', 'type' => 'string'],
            ['name' => 'TAN max', 'type' => 'string'],
            ['name' => 'TAN border', 'type' => 'string'],
            ['name' => 'TAN per', 'type' => 'string'],
            ['name' => 'TAN ket', 'type' => 'string'],
            ['name' => 'Ca min', 'type' => 'string'],
            ['name' => 'Ca max', 'type' => 'string'],
            ['name' => 'Ca border', 'type' => 'string'],
            ['name' => 'Ca per', 'type' => 'string'],
            ['name' => 'Ca ket', 'type' => 'string'],
            ['name' => 'Fu min', 'type' => 'string'],
            ['name' => 'Fu max', 'type' => 'string'],
            ['name' => 'Fu border', 'type' => 'string'],
            ['name' => 'Fu per', 'type' => 'string'],
            ['name' => 'Fu ket', 'type' => 'string'],
            ['name' => 'TBN min', 'type' => 'string'],
            ['name' => 'TBN max', 'type' => 'string'],
            ['name' => 'TBN border', 'type' => 'string'],
            ['name' => 'TBN per', 'type' => 'string'],
            ['name' => 'TBN ket', 'type' => 'string'],
            ['name' => 'Ag min', 'type' => 'string'],
            ['name' => 'Ag max', 'type' => 'string'],
            ['name' => 'Ag border', 'type' => 'string'],
            ['name' => 'Ag per', 'type' => 'string'],
            ['name' => 'Ag ket', 'type' => 'string'],
            ['name' => 'Sn min', 'type' => 'string'],
            ['name' => 'Sn max', 'type' => 'string'],
            ['name' => 'Sn border', 'type' => 'string'],
            ['name' => 'Sn per', 'type' => 'string'],
            ['name' => 'Sn ket', 'type' => 'string'],
            ['name' => 'Pb min', 'type' => 'string'],
            ['name' => 'Pb max', 'type' => 'string'],
            ['name' => 'Pb border', 'type' => 'string'],
            ['name' => 'Pb per', 'type' => 'string'],
            ['name' => 'Pb ket', 'type' => 'string'],
            ['name' => 'Fe min', 'type' => 'string'],
            ['name' => 'Fe max', 'type' => 'string'],
            ['name' => 'Fe border', 'type' => 'string'],
            ['name' => 'Fe per', 'type' => 'string'],
            ['name' => 'Fe ket', 'type' => 'string'],
            ['name' => 'Cu min', 'type' => 'string'],
            ['name' => 'Cu max', 'type' => 'string'],
            ['name' => 'Cu border', 'type' => 'string'],
            ['name' => 'Cu per', 'type' => 'string'],
            ['name' => 'Cu ket', 'type' => 'string'],
            ['name' => 'Cr min', 'type' => 'string'],
            ['name' => 'Cr max', 'type' => 'string'],
            ['name' => 'Cr border', 'type' => 'string'],
            ['name' => 'Cr per', 'type' => 'string'],
            ['name' => 'Cr ket', 'type' => 'string'],
            ['name' => 'Al min', 'type' => 'string'],
            ['name' => 'Al max', 'type' => 'string'],
            ['name' => 'Al border', 'type' => 'string'],
            ['name' => 'Al per', 'type' => 'string'],
            ['name' => 'Al ket', 'type' => 'string'],
            ['name' => 'Si min', 'type' => 'string'],
            ['name' => 'Si max', 'type' => 'string'],
            ['name' => 'Si border', 'type' => 'string'],
            ['name' => 'Si per', 'type' => 'string'],
            ['name' => 'Si ket', 'type' => 'string'],
            ['name' => 'Na min', 'type' => 'string'],
            ['name' => 'Na max', 'type' => 'string'],
            ['name' => 'Na border', 'type' => 'string'],
            ['name' => 'Na per', 'type' => 'string'],
            ['name' => 'Na ket', 'type' => 'string'],
            ['name' => 'PI min', 'type' => 'string'],
            ['name' => 'PI max', 'type' => 'string'],
            ['name' => 'PI border', 'type' => 'string'],
            ['name' => 'PI per', 'type' => 'string'],
            ['name' => 'PI ket', 'type' => 'string'],
            ['name' => 'TI min', 'type' => 'string'],
            ['name' => 'TI max', 'type' => 'string'],
            ['name' => 'TI border', 'type' => 'string'],
            ['name' => 'TI per', 'type' => 'string'],
            ['name' => 'TI ket', 'type' => 'string'],
            ['name' => 'Sulf min', 'type' => 'string'],
            ['name' => 'Sulf max', 'type' => 'string'],
            ['name' => 'Sulf border', 'type' => 'string'],
            ['name' => 'Sulf per', 'type' => 'string'],
            ['name' => 'Sulf ket', 'type' => 'string'],
            ['name' => 'Mg min', 'type' => 'string'],
            ['name' => 'Mg max', 'type' => 'string'],
            ['name' => 'Mg border', 'type' => 'string'],
            ['name' => 'Mg per', 'type' => 'string'],
            ['name' => 'Mg ket', 'type' => 'string'],
            ['name' => 'Mo min', 'type' => 'string'],
            ['name' => 'Mo max', 'type' => 'string'],
            ['name' => 'Mo border', 'type' => 'string'],
            ['name' => 'Mo per', 'type' => 'string'],
            ['name' => 'Mo ket', 'type' => 'string'],
            ['name' => 'NAS 1638 min', 'type' => 'string'],
            ['name' => 'NAS 1638 max', 'type' => 'string'],
            ['name' => 'NAS 1638 border', 'type' => 'string'],
            ['name' => 'NAS 1638 per', 'type' => 'string'],
            ['name' => 'NAS 1638 ket', 'type' => 'string'],
            ['name' => 'V min', 'type' => 'string'],
            ['name' => 'V max', 'type' => 'string'],
            ['name' => 'V border', 'type' => 'string'],
            ['name' => 'V per', 'type' => 'string'],
            ['name' => 'V ket', 'type' => 'string'],
            ['name' => 'FP COC min', 'type' => 'string'],
            ['name' => 'FP COC max', 'type' => 'string'],
            ['name' => 'FP COC border', 'type' => 'string'],
            ['name' => 'FP COC per', 'type' => 'string'],
            ['name' => 'FP COC ket', 'type' => 'string'],
            ['name' => 'Wt D 95 min', 'type' => 'string'],
            ['name' => 'Wt D 95 max', 'type' => 'string'],
            ['name' => 'Wt D 95 border', 'type' => 'string'],
            ['name' => 'Wt D 95 per', 'type' => 'string'],
            ['name' => 'Wt D 95 ket', 'type' => 'string'],
            ['name' => 'Wt KF min', 'type' => 'string'],
            ['name' => 'Wt KF max', 'type' => 'string'],
            ['name' => 'Wt KF border', 'type' => 'string'],
            ['name' => 'Wt KF per', 'type' => 'string'],
            ['name' => 'Wt KF ket', 'type' => 'string'],
            ['name' => 'Gly min', 'type' => 'string'],
            ['name' => 'Gly max', 'type' => 'string'],
            ['name' => 'Gly border', 'type' => 'string'],
            ['name' => 'Gly per', 'type' => 'string'],
            ['name' => 'Gly ket', 'type' => 'string'],
            ['name' => 'TBN_D4739 min', 'type' => 'string'],
            ['name' => 'TBN_D4739 max', 'type' => 'string'],
            ['name' => 'TBN_D4739 border', 'type' => 'string'],
            ['name' => 'TBN_D4739 per', 'type' => 'string'],
            ['name' => 'TBN_D4739 ket', 'type' => 'string'],
            ['name' => 'PP min', 'type' => 'string'],
            ['name' => 'PP max', 'type' => 'string'],
            ['name' => 'PP border', 'type' => 'string'],
            ['name' => 'PP per', 'type' => 'string'],
            ['name' => 'PP ket', 'type' => 'string'],
            ['name' => 'Ni min', 'type' => 'string'],
            ['name' => 'Ni max', 'type' => 'string'],
            ['name' => 'Ni border', 'type' => 'string'],
            ['name' => 'Ni per', 'type' => 'string'],
            ['name' => 'Ni ket', 'type' => 'string'],
            ['name' => 'B min', 'type' => 'string'],
            ['name' => 'B max', 'type' => 'string'],
            ['name' => 'B border', 'type' => 'string'],
            ['name' => 'B per', 'type' => 'string'],
            ['name' => 'B ket', 'type' => 'string']
        ];

        // Assuming you have $columns available, pass them to the view
        return view('oil.edit', compact('oil', 'columns'));
    }

    public function update(Request $request, $id)
    {
        // Cari data berdasarkan ID
        $oil = Oil::find($id);
        $requestData = $request->all();
        $requestData = array_map(function ($value) {
            return is_null($value) ? '' : $value;
        }, $requestData);
        // var_dump($requestData);
        $transformedData = collect($requestData)->mapWithKeys(function ($value, $key) {
            $newKey = str_replace('_', ' ', $key);
            return [$newKey => $value];
        })->toArray();
        $oil->update($transformedData);
        $oil->save();
        return redirect()->route('oil')->with('success', 'Condem updated successfully');
    }

    public function exportCsv($condemIDs)
    {
        $selectedRowIds = explode(',', $condemIDs);

        if (empty($selectedRowIds)) {
            return response()->json(['message' => 'No rows selected for export'], 400);
        }

        $columns = [
            'Vk 40' => ['min', 'max', 'border', 'per', 'ket'],
            'Vk 100' => ['min', 'max', 'border', 'per', 'ket'],
            'Oxi' => ['min', 'max', 'border', 'per', 'ket'],
            'P' => ['min', 'max', 'border', 'per', 'ket'],
            'Wt' => ['min', 'max', 'border', 'per', 'ket'],
            'Zn' => ['min', 'max', 'border', 'per', 'ket'],
            'Soot' => ['min', 'max', 'border', 'per', 'ket'],
            'Nit' => ['min', 'max', 'border', 'per', 'ket'],
            'TAN' => ['min', 'max', 'border', 'per', 'ket'],
            'Ca' => ['min', 'max', 'border', 'per', 'ket'],
            'Fu' => ['min', 'max', 'border', 'per', 'ket'],
            'TBN' => ['min', 'max', 'border', 'per', 'ket'],
            'Ag' => ['min', 'max', 'border', 'per', 'ket'],
            'Sn' => ['min', 'max', 'border', 'per', 'ket'],
            'Pb' => ['min', 'max', 'border', 'per', 'ket'],
            'Fe' => ['min', 'max', 'border', 'per', 'ket'],
            'Cu' => ['min', 'max', 'border', 'per', 'ket'],
            'Cr' => ['min', 'max', 'border', 'per', 'ket'],
            'Al' => ['min', 'max', 'border', 'per', 'ket'],
            'Si' => ['min', 'max', 'border', 'per', 'ket'],
            'Na' => ['min', 'max', 'border', 'per', 'ket'],
            'PI' => ['min', 'max', 'border', 'per', 'ket'],
            'TI' => ['min', 'max', 'border', 'per', 'ket'],
            'Sulf' => ['min', 'max', 'border', 'per', 'ket'],
            'Mg' => ['min', 'max', 'border', 'per', 'ket'],
            'Mo' => ['min', 'max', 'border', 'per', 'ket'],
            'NAS 1638' => ['min', 'max', 'border', 'per', 'ket'],
            'V' => ['min', 'max', 'border', 'per', 'ket'],
            'FP COC' => ['min', 'max', 'border', 'per', 'ket'],
            'Wt D 95' => ['min', 'max', 'border', 'per', 'ket'],
            'Wt KF' => ['min', 'max', 'border', 'per', 'ket'],
            'Gly' => ['min', 'max', 'border', 'per', 'ket'],
            'TBN_D4739' => ['min', 'max', 'border', 'per', 'ket'],
            'PP' => ['min', 'max', 'border', 'per', 'ket'],
            'Ni' => ['min', 'max', 'border', 'per', 'ket'],
            'B' => ['min', 'max', 'border', 'per', 'ket'],

        ];

        $selectedColumns = [];
        foreach ($columns as $column => $subColumns) {
            foreach ($subColumns as $subColumn) {
                $selectedColumns[] = $column . ' ' . $subColumn;
            }
        }

        $data = DB::table('condem')
            ->whereIn('condemID', $selectedRowIds)
            ->select($selectedColumns)
            ->get()
            ->toArray();

        if (empty($data)) {
            return response()->json(['message' => 'No data found for export'], 400);
        }

        // Define the CSV file name
        $fileName = 'oil_data.csv';

        // Set response headers for CSV download
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');

            // Write CSV header
            $headerRow = [];
            foreach ($columns as $column => $subColumns) {
                foreach ($subColumns as $subColumn) {
                    $headerRow[] = $column . ' ' . $subColumn;
                }
            }
            // fputcsv($file, $headerRow);
            fwrite($file, implode(",", $headerRow) . "\n");  

            // Write CSV rows
            foreach ($data as $row) {
                $rowData = [];
                foreach ($columns as $column => $subColumns) {
                    foreach ($subColumns as $subColumn) {
                        $rowData[] = $row->{$column . ' ' . $subColumn}; // Ambil nilai dari subkolom
                    }
                }
                fputcsv($file, $rowData);
                // fwrite($file, implode(",", $rowData) . "\n");
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }



    public function exportPdf($condemIDs)
    {
        $selectedRowIds = explode(',', $condemIDs);

        if (empty($selectedRowIds)) {
            return response()->json(['message' => 'No rows selected for export'], 400);
        }

        $data = [];

        foreach ($selectedRowIds as $key => $id) {

            $result = DB::table('model')
                ->where('condem.condemID', '=', $id)
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

                ->first();

            $condems = DB::table('condem')
                ->where('condemID', '=', $id)
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
                ->get();
            $data[$key] = [
                'manufacture_date' => $result->manufac,
                'application' => $result->applicationName,
                'component' => $result->compoName,
                'model' => $result->modelType,
                'condems' => $condems
            ];
        }

        // Inisialisasi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        // Render PDF
        $html = view('oil.pdf', compact('data')); // Gantilah 'pdf_template' dengan nama template HTML Anda
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait'); // Atur ukuran kertas dan orientasi

        $dompdf->render();

        // Simpan PDF atau kirim sebagai respons
        $pdfFileName = 'oil_data.pdf';
        $pdfFilePath = storage_path('app/' . $pdfFileName);
        file_put_contents($pdfFilePath, $dompdf->output());

        return response()->json(['message' => 'PDF data has been generated', 'pdf_file' => $pdfFileName]);
    }



    public function downloadPdf(Request $request)
    {
        $pdfFile = $request->input('pdf_file');
        $pdfFilePath = storage_path('app/' . $pdfFile);

        if (file_exists($pdfFilePath)) {
            return response()->file($pdfFilePath);
        } else {
            abort(404);
        }
    }
}
