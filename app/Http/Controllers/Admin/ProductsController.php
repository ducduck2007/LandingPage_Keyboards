<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB; // Thêm dòng này
use App\Products;
use App\Http\Requests\ProductsRequest;

class ProductsController extends Controller
{

    public function index(Request $req)
    {
        $data = DB::select("SELECT a.*, b.status FROM deal_sale a LEFT JOIN products b ON a.name_product = b.name_product");
        return view('admin.products.products_index', compact('data'));
    }

    public function postUpdate($id)
    {
        // Lấy sản phẩm từ bảng deal_sale
        $deal = DB::table('deal_sale')->where('id', $id)->first();
    
        if (!$deal) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
    
        // Kiểm tra và cập nhật hoặc thêm mới trong bảng products
        $existingProduct = DB::table('products')
            ->where('name_product', $deal->name_product)
            ->first();
    
        if ($existingProduct) {
            // Kiểm tra nếu có sự thay đổi so với dữ liệu hiện tại
            $updateData = [];
    
            // Kiểm tra từng trường để xác định nếu có thay đổi
            if ($existingProduct->price != $deal->price) {
                $updateData['price'] = $deal->price;
            }
            if ($existingProduct->promotion != $deal->promotion) {
                $updateData['promotion'] = $deal->promotion;
            }
            if ($existingProduct->image != $deal->image) {
                $updateData['image'] = $deal->image;
            }
            if ($existingProduct->parameter != $deal->parameter) {
                $updateData['parameter'] = $deal->parameter;
            }
            if ($existingProduct->mo_ta != $deal->mo_ta) {
                $updateData['mo_ta'] = $deal->mo_ta;
            }
            if ($existingProduct->endow != $deal->endow) {
                $updateData['endow'] = $deal->endow;
            }
            if ($existingProduct->evaluate != $deal->evaluate) {
                $updateData['evaluate'] = $deal->evaluate;
            }
    
            // Nếu có dữ liệu thay đổi, tiến hành update
            if (!empty($updateData)) {
                DB::table('products')
                    ->where('id', $existingProduct->id)
                    ->update($updateData);
            }
        }
        else {
            // Nếu sản phẩm chưa tồn tại, insert mới
            DB::table('products')->insert([
                'name_product' => $deal->name_product,
                'price' => $deal->price,
                'promotion' => $deal->promotion,
                'image' => $deal->image,
                'parameter' => $deal->parameter,
                'mo_ta' => $deal->mo_ta,
                'endow' => $deal->endow,
                'evaluate' => $deal->evaluate,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
        return redirect()->back()->with('success', 'Sản phẩm đã được cập nhật.');
    }
    
}
