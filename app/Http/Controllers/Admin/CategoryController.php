<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ], [
            'name.required' => 'Tên loại sản phẩm không được để trông',
            'name.unique' => 'Tên đã tồn tại',
        ]);

        $data = $request->only('name');

        if (Category::create($data)) {
            return redirect()->route('category.index')->with('success', 'Thêm mới thành công');
        }

        return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm mới');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'description' => 'required',
        ], [
            'name.required' => 'Tên loại sản phẩm không được để trông',
            'name.unique' => 'Tên đã tồn tại',
            'description.required' => 'Mô tả không được để trông',
        ]);

        $data = $request->all('name', 'description');
        if ($category->update($data)) {
            return redirect()->route('category.index')->with('success', 'Sửa thành công');
        }
        return redirect()->back()->with('error', 'Không thể sửa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            if ($category->delete()) {
                return redirect()->route('category.index')->with('success', 'Xóa thành công');
            }
        } catch (\Exception $ex) {
            $error = $category->id;
            return redirect()->back()->with('error', "Không thể xóa loại sản phẩm có mã $error");
        }
    }
}
