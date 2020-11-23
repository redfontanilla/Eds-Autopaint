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
                            <td class='center'>
                                <form action='/complete_paint_job' method='get'>
                                    <input type='hidden' name='complete_id' value='$progress->ctp_id'>
                                    <button type='submit' class='btn btn-complete'>Mark Complete</button>
                                </form>
                            </td>
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

    public function createPaintJob(Request $request){

        $request->validate([
            'plate_no' => 'required',
            'current_color' => 'required',
            'target_color' => 'required'
        ]);

        $plateNo = $request->input('plate_no');
        $current_color = $request->input('current_color');
        $target_color = $request->input('target_color');
        
        $countProgress = DB::select('select count(ctp_id) as countProgress from tbl_carToPaint where ctp_status = "progress" ');

        //$countProg = json_encode($countProgress[0]);

        if($countProgress[0]->countProgress < 5){

        DB::insert("insert into tbl_carToPaint (ctp_plateNo,ctp_currentColor,ctp_targetColor,ctp_status) values ('".$plateNo."','". $current_color."', '".$target_color."','progress')");

        } else{

        DB::insert("insert into tbl_carToPaint (ctp_plateNo,ctp_currentColor,ctp_targetColor,ctp_status) values ('".$plateNo."','". $current_color."', '".$target_color."','queue')");
        }

        return 1;

    }

    public function completePaintJob(Request $request){

        $id = $request->input("complete_id");
        DB::update('update tbl_carToPaint set ctp_status = "painted" where ctp_id = '.$id );
        DB::select('update tbl_carToPaint set ctp_status = "progress" where ctp_id = (select min(ctp_id) from tbl_cartopaint where ctp_status = "queue") ');

        return view('pages.paintJob');
    }
}
