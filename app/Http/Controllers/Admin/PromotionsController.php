<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotions;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotions::orderBy('id', 'DESC')->paginate(10);
        return view('admin.promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:promotions',
            'start_date' => 'required',
            'end_date' => 'required',
            'discount_percentage' => 'required'
        ], [
            'name.required' => 'Tên khuyến mãi không được để trông',
            'name.unique' => 'Tên khuyến mãi đã tồn tại',
            'start_date.required' => 'Tên khuyến mãi không được để trông',
            'end_date.required' => 'Tên khuyến mãi không được để trông',
            'discount_percentage.required' => 'Tên khuyến mãi không được để trông',
        ]);

        $data = $request->only('name', 'start_date', 'end_date', 'discount_percentage');
        if (Promotions::create($data)) {
            return redirect()->route('promotions.index')->with('success', 'Thêm mới thành công');
        }
        return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm mới');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotions $promotions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotions $promotions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotions $promotions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotions $promotions)
    {
        //
    }
}
