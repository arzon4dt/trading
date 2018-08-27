<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DataImportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.data-import', ['js' => 'data-import']);
    }

    public function importFile(Request $request){

        if($request->hasFile('sample_file')){

            $path = $request->file('sample_file')->getRealPath();

            $data = \Excel::load($path)->get();

            if($data->count()){
                //dd($data);
                $count100 = 1;
                $i = 1;
                foreach ($data as $key => $value) {
                    $arr[] = ['id_currency' => 1,
                              'trade_date' => $value->trade_date,
                              'open_bid' => $value->open_bid,
                              'high_bid' => $value->high_bid,
                              'low_bid' => $value->low_bid,
                              'close_bid' => $value->close_bid,
                              'volume' => $value->volume,
                            ];
                    if($i >= 1000){
                        break;
                    }
                    $i++;
                }

                if(!empty($arr)){

                    DB::table('trade_data')->insert($arr);

                    dd('Insert Recorded successfully.');

                }

            }

        }

        dd('Request data does not have any files to import.');

    }
}
