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
                                    <h3>Chi tiết</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                
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
                                            Chi tiết loại bánh
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('category.update', $category->id) }}">
                                            @csrf @method('PUT')
                                            <div class = "form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="" name="name" value="{{ $category->name }}">
                                                <label for="floatingInput">Tên loại sản phẩm</label>
                                            </div>
                                            <p>
                                                <a href="{{ route('category.index') }}"> Quay về</a>
                                            </p>
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
