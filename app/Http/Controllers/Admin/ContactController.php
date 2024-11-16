<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Contact;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function index(Request $request)
    {
        $data=Contact::all();
    
        return view('admin.contact.contact_index',compact('data'));
    }
    public function create(Request $request)
    {
       
        return view('admin.contact.contact_create');
    }
    public function postCreate(ContactRequest $req)
    {
        $model =new Contact;
        
        $model->fill($req->all());
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $fileName = uniqid() . "-" . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName);
            $model->image = 'uploads/' . $fileName;
            
        }
        if($model->save()){
        return redirect()->route('contact.index')->withErrors('Tạo thành công!' ); 
        }
        
    }
    public function update($id)
    {
   
        try{  
            $model = Contact::find($id);
        // $model->fill($req->all());
            if (!$model) {
            return Redirect::back()->withErrors('Không tìm thấy user!' );
            }
            return view('admin.contact.contact_update', compact('model'));
        }catch (\Exception $e) {
            
        }
        
    }
    public function postUpdate(Request $req)
    {
        $model = Contact::find((int)$req->id);
            
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
                return redirect()->route('contact.index')->withErrors('Cập nhật thành công!' ); 
            }
        }
    }
    public function delete(Request $req)
    {
        if($req->ajax()){
        
            try{
                $pr = Contact::find((int)$req->id);
            
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