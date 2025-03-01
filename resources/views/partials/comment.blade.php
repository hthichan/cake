@foreach ($reviews as $review)
    <!-- Review Details Start -->
    <div class="review_details ms-3 mb-5">
        <!-- Review Title & Date Start -->
        <div
            class="review-title-date d-flex"
        >
            <h5 class="title me-1">
                {{$review->customer->name}} 
            </h5>
            <span> - {{$review->created_at->format('d/m/Y h:i')}}</span>
        </div>
        <!-- Review Title & Date End -->
        <!-- Rating Start -->
        <div class="review-rating mb-2">
            <span class="review-rating-bg">
                <span
                    class="review-rating-active"
                    style="width: {{$review->rating/5*100}}%"
                ></span>
            </span>
        </div>
        <!-- Rating End -->
        <div >
            <p style="display: inline-block;">
                {{$review->comment}}
            </p>
            @if(auth()->guard('customer')->check() && auth()->guard('customer')->user()->can('delete', $review))
                <a href="{{ route('evaluate.delete', $review->id) }}" 
                    style="float: right; color: #f78181;"
                    onclick="return confirm('Bạn có muốn xóa đánh giá')" 
                    >Xóa</a>
            @endif
        </div>
    </div>
    <!-- Review Details End -->
@endforeach
<!-- Hiển thị liên kết phân trang -->
