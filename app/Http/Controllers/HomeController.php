<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_item;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $itemsList = Product::orderBy('name', 'ASC')
        ->take(8)
        ->get();
        return view('home.index', compact('itemsList'));
    }
    public function tabList()
    {
        $category_id = request("category_id");
        if ($category_id == 0) {
            $products = product::orderBy('name', 'ASC')->take(8)->get();
        } else {
            $products = product::where('category_id', $category_id)->take(8)->get();
        }
        $view = view('partials.tabList', compact('products'))->render();
        return response()->json(['html' => $view], 200);
    }
    public function contact()
    {
        return view('home.contact');
    }
    public function birthdat_cake()
    {
        return view('home.blog');
    }
    public function cart()
    {
        return view('home.cart');
    }
    public function add_to_cart(Request $request)
    {
        try {
            // Kiểm tra nếu user chưa đăng nhập
            if (!Auth::guard('customer')->check()) {
                return response()->json(['error' => 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng'], 403);
            }

            // Lấy hoặc tạo giỏ hàng của khách hàng
            $cart = Cart::firstOrCreate([
                'customer_id' => auth()->guard('customer')->id(),
            ]);

            // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng hay chưa
            $cartItem = Cart_item::where([
                'product_id' => $request->product_id,
                'cart_id' => $cart->id,
            ])->first();

            if ($cartItem) {
                $cartItem->quantity++;
                $cartItem->save();
            } else {
                Cart_item::create([
                    'product_id' => $request->product_id,
                    'cart_id' => $cart->id,
                    'quantity' => 1,
                ]);

                // Cập nhật số lượng sản phẩm trong giỏ
                $cart->increment('item_count');
            }

            // Tính lại tổng tiền và số lượng sản phẩm trong giỏ
            $price = $cart->items->sum(function ($item) {
                return $item->quantity * $item->product->promotionalPrice;
            });

            $count = $cart->item_count;

            // Render lại view giỏ hàng
            $view = view('partials.cartList', compact('cart'))->render();

            return response()->json([
                'message' => 'Sản phẩm đã được thêm vào giỏ hàng',
                'html' => $view,
                'count' => $count,
                'price' => $price,
            ], 200);
        } catch (\Exception $ex) {
            return response()->json(['error' => 'Có lỗi trong quá trình thêm vào giỏ hàng: ' . $ex->getMessage()], 500);
        }
    }
    public function delete_cart(Request $request)
    {
        $cartItem = Cart_item::where('id', $request->item_cart_id)->first();
        if ($cartItem->delete()) {
            $cart = Cart::where([
                'id' => $cartItem->cart_id,
                'customer_id' => auth()->guard('customer')->id()
            ])->first();
            $cart->item_count--;
            $cart->save();
            $price = 0;
            foreach ($cart->items as $item) {
                $price += $item->quantity * $item->product->price;
            }
            $view =  view('partials.cartList', compact('cart'))->render();
            return response()->json(['message' => 'Đã xóa khỏi giỏ hàng', 'html' => $view, 'price' => $price], 200);
        } else {
            return response()->json(['error' => 'Chưa thể xóa sản phẩm'], 403);
        }
    }
    public function clear_cart($cart_id)
    {
        $cart = Cart::where('id', $cart_id)->first();
        if($cart) {
            $cart->item_count = 0;
            $cart->save();
        }
        Cart_item::where([
            'cart_id' => $cart_id,
        ])->delete();
        return redirect()->back()->with('ok', 'Đã xóa giỏ hàng');
    }
    public function destroy_cartItem($cartItem_id) {
        $cart_item = Cart_item::where([
            'id' => $cartItem_id,
        ])->first();
        if($cart_item) {
            $cart = Cart::where('id', $cart_item->cart_id)->first();
            if($cart) {
                $cart->item_count--;
                $cart->save();
            }
            $cart_item->delete();
        }
        return redirect()->back()->with('ok', 'Đã xóa giỏ hàng');
    }
    public function checkout()
    {
        return view('home.checkout');
    }
    public function handle_checkout(Request $request)
    {
        $auth = auth()->guard('customer')->user();
        $orderData = $request->only(['payment_method', 'shipping_address']);
        $orderData['customer_id'] = $auth->id;
        $orderData['order_date'] = Carbon::now()->toDateString();
        if ($order = Order::create($orderData)) {
            foreach ($auth->cart->items as $item) {
                $dataDetail = [
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                ];
                Order_detail::create($dataDetail);
                $auth->cart->items()->delete();
                $auth->cart->item_count--;
                $auth->cart->save();
            }
            return redirect()->route('home')->with('ok', 'Đặt hàng thành công');
        }
        return redirect()->back()->with('error', 'Đặt hàng không thành công');
    }
    public function cancel_order($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        $orderDetails = Order_detail::where('order_id', $order_id)->get();
        if ($order && $order->status === "Đã đặt") {
            if ($orderDetails) {
                foreach ($orderDetails as $orderDetail) {
                    $orderDetail->delete();
                }
                $order->delete();
                return redirect()->back()->with('ok', 'Đơn hàng đã hủy');
            }
        }
        return redirect()->back()->with('error', 'Không thể hủy đơn hàng');
    }

    // public function favorited(Request $request)
    // {
    //     if (!Auth::check()) {
    //         return response()->json(['error' => 'Bạn chưa đăng nhập'], 404);
    //     } else {
    //         $data = [
    //             'product_id' => $request->product_id,
    //             'user_id' => auth()->id()
    //         ];
    //         $favorited = Favorited::where(['user_id' => auth()->id(), 'product_id' => $request->product_id])->first();
    //         if ($favorited) {
    //             $favorited->delete();
    //             return response()->json(['message' => 'Đã xóa khỏi danh sách yêu thích'], 200);
    //         }
    //         Favorited::create($data);
    //         return response()->json(['message' => 'Đã thêm vào danh sách yêu thích'], 200);
    //     }
    // }
}
