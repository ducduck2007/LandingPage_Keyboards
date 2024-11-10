<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Dealsale;
use App\Http\Requests\DealsaleRequest;


class DealsaleController extends Controller
{
    public function index(Request $request)
    {
        $data=Dealsale::all();
    
        return view('admin.deal_sale.deal_sale_index',compact('data'));
    }
    public function create(Request $request)
    {
       
        return view('admin.deal_sale.deal_sale_create');
    }
    public function postCreate(DealsaleRequest $req)
    {
        $model =new Dealsale;
        
        $model->fill($req->all());
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $fileName = uniqid() . "-" . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName);
            $model->image = 'uploads/' . $fileName;
            
        }
        if($model->save()){
        return redirect()->route('deal_sale.index')->withErrors('Tạo thành công!' ); 
        }
        
    }
    public function update($id)
    {
   
        try{  
            $model = Dealsale::find($id);
        // $model->fill($req->all());
            if (!$model) {
            return Redirect::back()->withErrors('Không tìm thấy user!' );
            }
            return view('admin.deal_sale.deal_sale_update', compact('model'));
        }catch (\Exception $e) {
            
        }
        
    }
    public function postUpdate(Request $req)
    {
        $model = Dealsale::find((int)$req->id);
            
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
                return redirect()->route('deal_sale.index')->withErrors('Cập nhật thành công!' ); 
            }
        }
    }
    public function delete(Request $req)
    {
        if($req->ajax()){
        
            try{
                $pr = Dealsale::find((int)$req->id);
            
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