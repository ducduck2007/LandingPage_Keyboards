<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Timesale;
use App\Http\Requests\TimesaleRequest;


class TimesaleController extends Controller
{
    public function index(Request $request)
    {
        $data=Timesale::all();
    
        return view('admin.time_sale.time_sale_index',compact('data'));
    }
    public function create(Request $request)
    {
       
        return view('admin.time_sale.time_sale_create');
    }
    public function postCreate(TimesaleRequest $req)
    {
        $model =new Timesale;
        
        $model->fill($req->all());
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $fileName = uniqid() . "-" . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName);
            $model->image = 'uploads/' . $fileName;
            
        }
        if($model->save()){
        return redirect()->route('time_sale.index')->withErrors('Tạo thành công!' ); 
        }
        
    }
    public function update($id)
    {
   
        try{  
            $model = Timesale::find($id);
        // $model->fill($req->all());
            if (!$model) {
            return Redirect::back()->withErrors('Không tìm thấy user!' );
            }
            return view('admin.time_sale.time_sale_update', compact('model'));
        }catch (\Exception $e) {
            
        }
        
    }
    public function postUpdate(Request $req)
    {
        $model = Timesale::find((int)$req->id);
            
        if(!$model)
            return Redirect::back()->withErrors('Không tìm thấy !' );
        else{
            
            $model->fill($req->all());
            if ($req->hasFile('image')) {
                $file = $req->file('image');
                $fileName = uniqid() . "-" . $file->getClientOriginalName();
                $file->storeAs('uploads', $fileName);
                $model->image = 'uploads/' . $fileName;
                
            }
            if($model->save()){
                return redirect()->route('time_sale.index')->withErrors('Cập nhật thành công!' ); 
            }
        }
    }
    public function delete(Request $req)
    {
        if($req->ajax()){
        
            try{
                $pr = Timesale::find((int)$req->id);
            
                if($pr->delete()){
            
                    return response(['message'=>'success']);
                }else{
                
                    return response(['message'=>'fail']);
                }
            }catch (\Exception $e) {
                
            
            }
        }
    }
}