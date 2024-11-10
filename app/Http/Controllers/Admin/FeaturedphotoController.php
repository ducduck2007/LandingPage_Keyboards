<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Featuredphoto;
use App\Http\Requests\FeaturedphotoRequest;


class FeaturedphotoController extends Controller
{
    public function index(Request $request)
    {
        $data=Featuredphoto::all();
    
        return view('admin.featured_photo.featured_photo_index',compact('data'));
    }
    public function create(Request $request)
    {
       
        return view('admin.featured_photo.featured_photo_create');
    }
    public function postCreate(Request $req)
    {
        $model =new Featuredphoto;
        
        $model->fill($req->all());
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $fileName = uniqid() . "-" . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName);
            $model->image = 'uploads/' . $fileName;
            
        }
        if($model->save()){
        return redirect()->route('featured_photo.index')->withErrors('Tạo thành công!' ); 
        }
        
    }
    public function update($id)
    {
   
        try{  
            $model = Featuredphoto::find($id);
        // $model->fill($req->all());
            if (!$model) {
            return Redirect::back()->withErrors('Không tìm thấy user!' );
            }
            return view('admin.featured_photo.featured_photo_update', compact('model'));
        }catch (\Exception $e) {
            
        }
        
    }
    public function postUpdate(Request $req)
    {
        $model = Featuredphoto::find((int)$req->id);
            
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
                return redirect()->route('featured_photo.index')->withErrors('Cập nhật thành công!' ); 
            }
        }
    }
    public function delete(Request $req)
    {
        if($req->ajax()){
        
            try{
                $pr = Featuredphoto::find((int)$req->id);
            
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