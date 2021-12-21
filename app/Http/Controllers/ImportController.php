<?php

namespace App\Http\Controllers;

use App\Models\CsvData;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Imports\SallesImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use App\Http\Requests\CsvImportRequest;
use App\Http\Requests\StoreSalleRequest;

class ImportController extends Controller
{
    public function parseImport(CsvImportRequest $request)
    {
        if ($request->has('header')) {
            $headings = (new HeadingRowImport)->toArray($request->file('csv_file'));
            $data = Excel::toArray(new SallesImport, $request->file('csv_file'))[0];
        } else {
            $data = array_map('str_getcsv', file($request->file('csv_file')->getRealPath()));
        }

        if (count($data) > 0) {
            $csv_data = array_slice($data, 0, 2);

            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }

        return view('admin.import_fields', [
            'headings' => $headings ?? null,
            'csv_data' => $csv_data,
            'csv_data_file' => $csv_data_file
        ]);
    }

    public function processImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        foreach ($csv_data as $row) {
            $salle = new Salle();
            foreach (config('app.db_fields') as $index => $field) {
                if ($data->csv_header) {
                    $salle->$field = $row[$request->fields[$field]];
                } else {
                    $salle->$field = $row[$request->fields[$index]];
                }
            }
            $validator = Validator::make($salle->toArray(),[
                'batiment'     => [
                    'required',
                ],
                'etage'    => [
                    'required',
                    'numeric',
                ],
                'num' => [
                    'required',
                ],
                'nom'  => [
                    'required',
                ],
            ]);
            if ($validator->fails()) {
                return redirect()->route('importSalle')->withErrors($validator);
            }else{
                $salle->save();
            }
        }

        return redirect()->route('admin.gestionSalle')->with('success', 'Import finished.');
    }
}