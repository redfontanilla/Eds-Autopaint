<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaintJobController extends Controller
{

    public function showPaintJob(Request $request){
        
        $all_progress = DB::select('select * from tbl_carToPaint where ctp_status = "progress"');
        $all_queue = DB::select('select * from tbl_carToPaint where ctp_status = "queue"');
        
        $data_html_progress = "";

        foreach($all_progress as $key => $progress){
            $data_html_progress .= "<tr>
                            <td>".$progress->ctp_plateNo."</td>
                            <td>".$progress->ctp_currentColor."</td>
                            <td>".$progress->ctp_targetColor."</td>
                            <td><a href='/markComplete'>Mark Complete</a></td>
                        </tr>";
        }

        $data_html_queue = "";

        foreach($all_queue as $key => $queue){
            $data_html_queue .= "<tr>
                            <td>".$queue->ctp_plateNo."</td>
                            <td>".$queue->ctp_currentColor."</td>
                            <td>".$queue->ctp_targetColor."</td>
                        </tr>";
        }
        
        return json_encode(array('progress' => $data_html_progress,'queue' => $data_html_queue));
        // return json_encode($all_progress);
    }

    public function showShopPerformance(){

        $all_painted = DB::select('select count(ctp_id) as count_all from tbl_carToPaint where ctp_status = "painted"');
        $all_painted_red = DB::select('select count(ctp_id) as count_red from tbl_carToPaint where ctp_status = "painted" and ctp_targetColor = "Red"');
        $all_painted_blue = DB::select('select count(ctp_id) as count_blue from tbl_carToPaint where ctp_status = "painted" and ctp_targetColor = "Blue"');
        $all_painted_green = DB::select('select count(ctp_id) as count_green from tbl_carToPaint where ctp_status = "painted" and ctp_targetColor = "Green"');

        return json_encode(array('all'=>$all_painted,'red'=>$all_painted_red,'blue'=>$all_painted_blue,'green'=>$all_painted_green));

    }

    public function createPaintJob(){

        // $request->validate([
        //     'plateNo' => 'required',
        //     'curColor' => 'required',
        //     'tarColor' => 'required'
        // ]);

        return 'eds';
    }
}
