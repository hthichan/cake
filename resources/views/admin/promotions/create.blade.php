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
                            <div class="dashboard_breadcam text-end">
                                <p>
                                    <a href="index.html">Dashboard</a>
                                    <i class="fas fa-caret-right"></i>
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
                        <div class="col-lg-6">
                            <div class="modal-content cs_modal">
                                <div class="modal-header justify-content-center theme_bg_1">
                                    <h5 class="modal-title text_white">
                                        Thêm mới
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('promotions.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <div class>
                                                <label for="" style="font-size: 16px">Tên khuyến mãi</label>
                                                <input type="text" class="form-control" name="name" />
                                                @error('name')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class>
                                                <label for="" style="font-size: 16px">Ngày bắt đầu</label>
                                                <input type="date" class="form-control" name="start_date" />
                                                @error('start_date')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class>
                                                <label for="" style="font-size: 16px">Ngày kết thúc</label>
                                                <input type="date" class="form-control" name="end_date" />
                                                @error('end_date')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class>
                                                <label for="" style="font-size: 16px">Mức khuyến mãi</label>
                                                <input type="text" class="form-control" name="discount_percentage" />
                                                @error('discount_percentage')
                                                    <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class>
                                            <button type="submit" class="btn_1 text-center">
                                                Thêm
                                            </button>
                                            <p>
                                                <a href="{{ route('product.index') }}"> Quay về</a>
                                            </p>

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