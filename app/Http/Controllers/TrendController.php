<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TrendController extends Controller
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
        return view('backend.trend', ['js' => 'trend', 'menu' => 'Trend']);
    }

    public function getJsonData(){
        $result = DB::table('trade_data')->select('trade_date', 'open_bid', 'high_bid', 'low_bid', 'close_bid')->limit(1000)->get();
        $data = array();
        foreach($result as $item){
            $time = strtotime($item->trade_date);
            $utc_time = mktime( date("H", $time),
                                date("i", $time),
                                0,
                                date("d", $time),
                                date("m", $time),
                                date("Y", $time)
                        );
            $row = array($utc_time*1000,
                         $item->open_bid,
                         $item->high_bid,
                         $item->low_bid,
                         $item->close_bid
                        );
            $data[] = $row;
        }
        return response()->json($data);
    }

    function saveTrendLines(Request $request){
        $arr[] = ['id_currency' => 1,
                  'xAnchor' => $request->input('xAnchor')
        ];
        DB::table('trend_markers')->insert($arr);
        return response()->json(json_encode(array('staus'=>true)));
    }

    function getTrendLines(){
        $param = array( "enabled"=>true,
                        "type"=>"vertical-line",
                        "color"=>"#e06666",
                        "allowEdit"=>true,
                        "hoverGap"=>5,
                        "normal"=>array("markers"=>array(   "enabled"=>false,
                                                            "anchor"=>"center",
                                                            "offsetX"=>0,
                                                            "offsetY"=>0,
                                                            "type"=>"square",
                                                            "rotation"=>0,
                                                            "size"=>10,
                                                            "fill"=>"#ffff66",
                                                            "stroke"=>"#333333"
                                                    )
                                        ),
                        "hovered"=>array("markers"=>array("enabled"=>null)),
                        "selected"=>array("markers"=>array("enabled"=>true))
                        ,"xAnchor"=>0
                    );
        $data = array();
        $result = DB::table('trend_markers')->where("id_currency", 1)->get();
        foreach($result as $item){
            $row = $param;
            $row['xAnchor'] = $item->xAnchor;
            $data[] = $row;
        }
        return response()->json(json_encode(array("annotationsList"=>$data)));
    }


}
