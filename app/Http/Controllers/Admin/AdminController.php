<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
    public function login()
    {
        return view('admin.admin.login');
    }
    public function check_login(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:admins',
            'password' => 'required',
        ], [
            'username.required' => 'Tên đăng nhập không được để trống',
            'username.exists' => 'Tên đăng nhập không tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
        ]);

        $data = $request->only(['username', 'password']);
        $check = Auth::guard('admin')->attempt($data);

        if ($check) {
            return redirect()->route('admin.home');
        }
        return redirect()->back()->with('error', 'Không đăng nhập được');
    }

    public function check_logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.home');
    }

    public function users()
    {
        $users = Customer::orderBy('name', 'DESC')->paginate(10);
        return view('admin.users.index', compact('users'));
    }
    public function order_user($user_id)
    {
        $orders = Order::where('user_id', $user_id)->orderBy('created_at', 'DESC')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function orders()
    {
        $orders = order::orderBy('created_at', 'DESC')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function details(Order $order) {
        $details = Order_detail::where('order_id', $order->id)->orderBy('created_at', 'DESC')->get();

        return view('admin.orders.orderDetails' , compact('order', 'details'));
    }

    public function confirm_order(Order $order) 
    {
        if ($order->update(['status' => 'Đã xác nhận'])) {
            return redirect()->route('admin.orders')->with('success', 'Đã xác nhận đơn hàng');
        }
        return redirect()->back()->with('error', 'Xác nhận đơn hàng không thành công');
    }
}