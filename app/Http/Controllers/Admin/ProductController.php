<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Promotions;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $promotions = Promotions::orderBy('name', 'ASC')->get();
        return view('admin.product.create', compact('categories', 'promotions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required|numeric',
            'description' => 'required',
            'product_img' => 'file|mimes:jpg,jpeg,png,gif',
            'category_id' => 'required|exists:categories,id',
            'promotion_id' => 'exists:promotions,id'
        ], [
            'name.required' => 'Tên sản phẩm không được để trông',
            'name.unique' => 'Tên đã tồn tại',
            'price.required' => 'Cần nhập giá tiền của sản phẩm',
            'price.numeric' => 'Giá tiền bạn nhập không hợp lệ',
            'product_img.mimes' => 'Không phải là file ảnh',
            'product_img.file' => 'Ảnh phải là một file',
            'category_id.required' => 'Bạn cần chọn loại sản phẩm',
            'promotion_id.exists' => 'Không có khuyến mãi này',
        ]);

        $data = $request->only('name', 'description', 'price', 'category_id', 'promotion_id');
        $img_name = $request->product_img->hashName();
        if ($img_name) {
            $request->product_img->move(public_path('uploads/product/'), $img_name);
            $data['image'] = $img_name;
        }

        if ($product = Product::create($data)) {
            $data_img = [
                'url' => $img_name,
                'product_id' => $product->id,
            ];
            if (Image::create($data_img)) {
                return redirect()->route('product.index')->with('success', 'Thêm mới thành công');
            }
        }
        return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm mới');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $categories = category::orderBy('name', 'ASC')->get();
        $promotions = Promotions::orderBy('name', 'ASC')->get();
        return view('admin.product.show', compact('categories', 'product', 'promotions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|unique:products,name,' . $product->id,
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'promotion_id' => 'exists:promotions,id'

        ], [
            'name.required' => 'Tên sản phẩm không được để trông',
            'name.unique' => 'Tên đã tồn tại',
            'price.required' => 'Cần nhập giá tiền của sản phẩm',
            'price.numeric' => 'Giá tiền bạn nhập không hợp lệ',
            'category_id.required' => 'Bạn cần chọn loại sản phẩm',
            'promotion_id.exists' => 'Không có khuyến mãi này',
        ]);

        $data = $request->only('name', 'description', 'price', 'category_id', 'promotion_id');

        if ($request->has('product_img')) {
            $product_img = $product->image;
            $img_name = $product_img->url;
            $img_part = public_path('uploads/product') . '/' . $img_name;
            if (file_exists($img_part)) {
                unlink($img_part);
            }
            $new_img = $request->product_img->hashName();

            if ($new_img) {
                $request->product_img->move(public_path('uploads/product/'), $new_img);
                $data_img = [
                    'url' => $new_img
                ];
            }
            $product_img->update($data_img);
        }

        if ($product->update($data)) {

            return redirect()->route('product.index')->with('success', 'Sửa thành công');
        }
        return redirect()->back()->with('error', 'Không thể sửa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $img_name = $product->image->url;
        $img_part = public_path('uploads/product') . '/' . $img_name;
        if (file_exists($img_part)) {
            unlink($img_part);
        }
        if ($product->delete()) {
            return redirect()->route('product.index')->with('success', 'Xóa thành công');
        }
        return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm mới');
    }
}