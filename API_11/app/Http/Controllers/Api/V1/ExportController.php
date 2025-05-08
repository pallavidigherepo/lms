<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

class ExportController extends Controller
{
    private $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filename = $request->data['fileName'];
        $modelName = $request->data['modelName'];

        // This is done to make exports class dynamic and can be used by any ExportClass 
        $exportClass = "App\\Exports\\".$modelName.'Export';
        
        if (isset($request->data['selectedItem']) && !$request->data['demo']) {
            $class = new $exportClass($request->data['selectedItem']);
        } else if ($request->data['demo']) {
            $class = new $exportClass(1, true);
        } else{
            $class = new $exportClass;
        }

        if ($filename != null) {
            $extensionArray = explode('.', $filename);
            $extension = $extensionArray[1];
            
            if ($extension == "xlsx") {
                return $this->excel->download($class, $filename, Excel::XLSX);
            } 
            if ($extension == "csv") {
                return $this->excel->download($class, $filename, Excel::CSV);
            }
            if ($extension == "pdf") {
                return $this->excel->download($class, $filename, Excel::DOMPDF);
            }
            
        }
    }

}
