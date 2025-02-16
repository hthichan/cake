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
                                    <h3>Khuyến mãi</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div
                                    class="dashboard_breadcam text-end"
                                >
                                    <p>
                                        <a href="index.html"
                                            ></a
                                        >
                                        <i
                                            class="fas fa-caret-right"
                                        ></i>
                                        Sản phẩm
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="QA_section">
                        <div class="white_box_tittle list_header">
                            <h4>Bảng danh sách</h4>
                            <div class="box_right d-flex lms_block">
                                <div class="serach_field_2">
                                    <div class="search_inner">
                                        <form Active="#">
                                            <div class="search_field">
                                                <input
                                                    type="text"
                                                    placeholder="Search content here..."
                                                />
                                            </div>
                                            <button type="submit">
                                                <i
                                                    class="ti-search"
                                                ></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="add_button ms-2">
                                    <a
                                        href="{{ route('product.create')}}"
                                        class="btn_1"
                                        >Thêm mới</a
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="QA_table mb_30">
                            <table class="table lms_table_active">
                                <thead>
                                    <tr>
                                        <th scope="col">Số thứ tự</th>
                                        <th scope="col">Tên khuyến mãi</th>
                                        <th scope="col">Ngày bắt đầu</th>
                                        <th scope="col">Ngày kết thúc</th>
                                        <th scope="col">Mức khuyến mãi</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @php
$i = 1; 
                                    @endphp
                                    @foreach ($promotions as $promotion)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $promotion->name }}</td>
                                            <td>{{ $promotion->start_date->format('d/m/Y') }}</td>
                                            <td>{{ $promotion->end_date->format('d/m/Y') }}</td>
                                            <td>{{ $promotion->discount_percentage }}</td>

                                            <td>
                                                <form action="{{ route('promotions.destroy', $promotion->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('bạn có chắc muốn xóa sản phẩm có mã sản phẩm là {{$promotion->id}}')">
                                                    <a
                                                        href="{{ route('product.show', $promotion->id) }}"
                                                        class="status_btn"
                                                        >Chi tiết
                                                    </a>
                                                    @csrf @method('DELETE')
                                                    <button
                                                        class="status_btn"
                                                        style="background-color: red; 
                                                        font-weight: 400;
                                                        font-size: 14px;
                                                        border: none"
                                                        >Xóa
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop()
