<?php

namespace App\Http\Controllers;

use App\Models\Evaluate;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function comment()
    {
        if (auth()->guard('customer')->check()) {
            $comment = request('comment');
            $rating = request('rating');
            $product_id = request('product_id');
            $data = [
                'customer_id' => auth()->guard('customer')->user()->id,
                'product_id' => $product_id,
                'rating' => $rating,
                'comment' => $comment,
            ];

            if (Evaluate::create($data)) {
                $product = Product::where('id', $product_id)->first();
                $averageRating = $product->averageRating;
                $reviews = $product->evaluates()->paginate(5);
                $countReviews = $product->evaluates()->get()->count();
                $view = view('partials.comment', compact('reviews'))->render();
                return response()->json([
                    'html' => $view,
                    'averageRating' => $averageRating,
                    'countReviews' => $countReviews
                ], 200);
            } else {
                return response()->json(['error' => 'Lỗi khi đánh giá'], 403);
            }
        } else {
            return response()->json(['error' => 'Bạn chưa đăng nhập'], 403);
        }
    }

    public function delete(Evaluate $evaluate)
    {
        $evaluate->delete();
        return redirect()->back()->with('success', 'đã xóa bình luận');
    }
}
