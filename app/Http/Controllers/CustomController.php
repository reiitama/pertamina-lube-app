<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use App\Models\Custom;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CustomController extends Controller
{
    public function index()
    {
        
        $result = DB::table('equip')
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
                'custo_condem.*' // Menambahkan semua kolom dari tabel "custo_condem" ke dalam select
            )
            ->get();
            return view('custom.custom', ['result' => $result]);
    }


    public function showcustom($conID)
    {
        $custom = Custom::findOrFail($conID);

        if (!$custom) {
            return abort(404);
        }

        $columns = [
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
        ];

        $categories = [
            'Vk 40' => 4,
            'Vk 100' => 4,
            'Oxi' => 4,
            'P' => 4,
            'Wt' => 4,
            'Zn' => 4,
            'Soot' => 4,
            'Nit' => 4,
            'TAN' => 4,
            'Ca' => 4,
            'Fu' => 4,
            'TBN' => 4,
            'Ag' => 4,
            'Sn' => 4,
            'Pb' => 4,
            'Fe' => 4,
            'Cu' => 4,
            'Cr' => 4,
            'Al' => 4,
            'Si' => 4,
            'Na' => 4,
            'PI' => 4,
            'PL' => 4,
            'TI' => 4,
            'Sulf' => 4,
            'Mg' => 4,
            'Mo' => 4,
            'NAS 1638' => 4,
            'V' => 4,
            'FP COC' => 4,
            'Wt D 95' => 4,
            'Wt KF' => 4,
            'Gly' => 4,
            'TBN_D4739' => 4,
            'PP' => 4,
            'NI' => 4,
            'B' => 4,
        ];

        return view('custom.showcustom', compact('custom','columns', 'categories'));
    }

    public function exportCsv($condemIDs)
    {

        $selectedRowIds = explode(',', $condemIDs);

        if (empty($selectedRowIds)) {
            return response()->json(['message' => 'No rows selected for export'], 400);
        }

        $data = DB::table('condem')
            ->whereIn('condemID', $selectedRowIds)
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
            ->get()
            ->toArray();

        if (empty($data)) {
            return response()->json(['message' => 'No data found for export'], 400);
        }

        // Define the CSV file name
        $csvFileName = 'oil_data.csv';

        // Set response headers for CSV download
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        // Create a CSV file
        $handle = fopen('php://output', 'w');

        // Write the CSV header row with column names
        fputcsv($handle, array_keys((array) $data[0]));

        // Write each data row to the CSV file
        foreach ($data as $row) {
            fputcsv($handle, (array) $row);
        }

        // Close the CSV file
        fclose($handle);

        // Return the CSV file as a response
        return Response::make(rtrim(ob_get_clean()), 200, $headers);
    }

    public function exportPdf($condemIDs)
    {
        $selectedRowIds = explode(',', $condemIDs);

        if (empty($selectedRowIds)) {
            return response()->json(['message' => 'No rows selected for export'], 400);
        }

        $data = [];

        foreach ($selectedRowIds as $key => $id) {
            
            $result = DB::table('equip')
                ->where('custo_condem.conID','=', $id)
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
            
            $condems = DB::table('custo_condem')
                ->where('conID', '=',$id)
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
                ->get();
            $data[$key] = [
                'customer_name' => $result->customerName,
                'area' => $result->areaName,
                'city' => $result->cityName,
                'equip' => $result->equipCode,
                'equip_engine' => $result->engineNumber,
                'model' => $result->modelType,
                'custo_condem' => $condems
            ];
        }

        



        // Inisialisasi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        // Render PDF
        $html = view('custom.pdf', compact('data')); // Gantilah 'pdf_template' dengan nama template HTML Anda
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait'); // Atur ukuran kertas dan orientasi

        $dompdf->render();

        // Simpan PDF atau kirim sebagai respons
        $pdfFileName = 'custom_data.pdf';
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
