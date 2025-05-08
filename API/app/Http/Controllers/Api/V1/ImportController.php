<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('import_file')->store('import');
        $modelName = $request->modelName;
        $importClass = "App\\Imports\\".$modelName."Import";

        if (isset($request->selectedItem)) {
            $import = new $importClass($request->selectedItem);
        } else {
            $import = new $importClass;
        }
        try {
            $importResponse = Excel::import($import, $file);
            $response = [
                'success' => true,
                'message' => 'All the '.$modelName.'(s) are successfully imported.',
                'failures' => null,
                'errors' => $importResponse,
            ];
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();
             $response = [
                'success' => false,
                'message' => $modelName.'(s) are not imported.',
                'failures' => $failures,
             ];
        }
        return response()->json($response);
    }
}
