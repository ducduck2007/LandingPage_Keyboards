<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Header;
use App\Http\Requests\HeaderRequest;


class HeaderController extends Controller
{
    public function index(Request $request)
    {
        $data=Header::all();
    
        return view('admin.header.header_index',compact('data'));
    }
    public function create(Request $request)
    {
       
        return view('admin.header.header_create');
    }
    public function postCreate(HeaderRequest $req)
    {
        $model =new Header;
        
        $model->fill($req->all());
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $fileName = uniqid() . "-" . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName);
            $model->image = 'uploads/' . $fileName;
            
        }
        if($model->save()){
        return redirect()->route('header.index')->withErrors('Tạo thành công!' ); 
        }
        
    }
    public function update($id)
    {
   
        try{  
            $model = Header::find($id);
        // $model->fill($req->all());
            if (!$model) {
            return Redirect::back()->withErrors('Không tìm thấy user!' );
            }
            return view('admin.header.header_update', compact('model'));
        }catch (\Exception $e) {
            
        }
        
    }
    public function postUpdate(Request $req)
    {
        $model = Header::find((int)$req->id);
            
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
                return redirect()->route('header.index')->withErrors('Cập nhật thành công!' ); 
            }
        }
    }
    public function delete(Request $req)
    {
        if($req->ajax()){
        
            try{
                $pr = Header::find((int)$req->id);
            
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