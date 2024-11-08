<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Jenssegers\Agent\Agent;
use App\ManageCount;
use DB;


class FunctionController extends Controller
{
    public function get_client_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function get_referer()
    {
        $_SERVER['HTTP_REFERER'];
    }

    public function uploadCK(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('uploads'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
    public function checkDevices()
    {
        $agent = new Agent();
        if ($agent->isiOS()) {
            $device = '1';
        } elseif ($agent->isAndroidOS()) {
            $device = '0';
        } else {
            $device = '2';
        }
        return  $device;
    }

    public function check_referer()
    {
        if(!empty($_SERVER['HTTP_REFERER'])){
            $referrer = $_SERVER['HTTP_REFERER']; 
        }else{
            $referrer = "Nguồn khác hoặc truy cập trực tiếp vào web"; 
        }
        return $referrer;
    }

    //type_join_table: 1:game,2:tin tức, 3:event
    // type: 1:view, 2 like, 3 download
    public function countDevice($id_join_table, $type_join_table, $type)
    {
        try {
            // $test_ref = $this->check_referer();
            // dd($test_ref);

            $model = new ManageCount(); 
            $ipDevice = $this->get_client_ip();
            // $curentDate = now()->toDateString();
            // $check = DB::select("SELECT * FROM manage_count WHERE id_join_table = $id_join_table AND DATE(created_at) = '$curentDate' AND ip = '$ipDevice' AND type_join_table = $type_join_table AND `type` = $type");
            // // dd(count($check));
            // if (count($check) == 0) {
            //     $model = new ManageCount();
            //     $model->id_join_table = $id_join_table;
            //     $model->type_join_table = $type_join_table;
            //     $model->type = $type;
            //     $model->ip = $this->get_client_ip();
            //     $model->type_device = $this->checkDevices();
            //     $model->referrer = $this->check_referer();
            //     $model->save();
            // }

            $model = new ManageCount();
            $model->id_join_table = $id_join_table;
            $model->type_join_table = $type_join_table;
            $model->type = $type;
            $model->ip = $this->get_client_ip();
            $model->type_device = $this->checkDevices();
            $model->referrer = $this->check_referer();
            $model->save();
        } catch (\Exception $e) {
        }
    }
    public function countDonwload($id_join_table, $type_join_table, $Devices)
    {
        try {
            $model = new ManageCount(); 
            $ipDevice = $this->get_client_ip();
            // $curentDate = now()->toDateString();
            // $check = DB::select("SELECT * FROM manage_count WHERE id_join_table = $id_join_table AND DATE(created_at) = '$curentDate' AND ip = '$ipDevice' AND type_join_table = $type_join_table AND `type` = 3");
            // // dd($check);
            // if (count($check) == 0) {
            //     $model = new ManageCount();
            //     $model->id_join_table = $id_join_table;
            //     $model->type_join_table = $type_join_table;
            //     $model->type = 3;
            //     $model->ip = $this->get_client_ip();
            //     $model->type_device = $Devices;
            //     $model->save();
            // }

            $model = new ManageCount();
                $model->id_join_table = $id_join_table;
                $model->type_join_table = $type_join_table;
                $model->type = 3;
                $model->ip = $this->get_client_ip();
                $model->type_device = $Devices;
                $model->save();
        } catch (\Exception $e) {
        }
    }
}