@extends('admin.index')

@section('main')

<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_50">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3>Thêm mới loại sản phẩm</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div
                                class="dashboard_breadcam text-end"
                            >
                                <p>
                                    <a href="index.html"
                                        >Dashboard</a
                                    >
                                    <i
                                        class="fas fa-caret-right"
                                    ></i>
                                    login
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="modal-content cs_modal">
                                <div
                                    class="modal-header justify-content-center theme_bg_1"
                                >
                                    <h5
                                        class="modal-title text_white"
                                    >
                                        Thêm mới
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-lg-12 row">
                                            <div class="col-lg-4">
                                                <div class>
                                                    <label for="" style="font-size: 16px">Tên sản phẩm</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        name="name"
                                                    />
                                                    @error('name')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class>
                                                    <label for="" style="font-size: 16px">Giá tiền</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        name="price"
                                                    />
                                                    @error('price')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class style="margin:0 0 21px">
                                                    <label for="" style="font-size: 16px">Loại loại phẩm</label>
                                                    <select class="form-control" name="category_id">
                                                        <option value="">--Chọn loại sản phẩm--</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class>
                                                    <label for="" style="font-size: 16px">Hình ảnh</label>
                                                    <input
                                                        id="prod_img"
                                                        type="file"
                                                        class="form-control"
                                                        name="product_img"
                                                        onchange="loadImg(event)"
                                                    />
                                                    @error('product_img')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                    <img id="img_file" src="" alt="ảnh" width="100" height="100"
                                                        style="min-height: 100px; min-width: 100px; border: 1px solid black">
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <label for="" style="font-size: 16px">Mô tả</label>
                                                <textarea name="description" id="" cols="30" rows="10"></textarea>
                                                <div class="col-lg-4" style="margin:0 0 21px">
                                                    <label for="" style="font-size: 16px">Khuyến mãi</label>
                                                    <select id="promotion_id" class="form-control" name="promotion_id">
                                                        <option value="">--Khuyến mãi--</option>
                                                        @foreach ($promotions as $promotion)
                                                            <option value="{{ $promotion->id }}">
                                                                {{ $promotion->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('promotion_id')
                                                        <span style="color: red">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                <button type="submit"
                                                    class="btn_1 text-center">
                                                    Thêm
                                                </button>
                                                <p>
                                                    <a href="{{ route('product.index') }}"> Quay về</a>
                                                </p>
                                                
                                            </div>

                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop()