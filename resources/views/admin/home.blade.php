@extends('admin.index')

@section('main')

    <div class="main_content_iner">
        <div class="container-fluid p-0 sm_padding_15px">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="dashboard_header mb_50">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dashboard_header_title">
                                    <h3>Default Dashboard</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="dashboard_breadcam text-end">
                                    <p>
                                        <a href="index.html">Dashboard</a>
                                        <i class="fas fa-caret-right"></i>
                                        Address Book
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="list_counter_wrapper white_box mb_30 p-0 card_height_100">
                        <div class="single_list_counter">
                            <h3 class="green_color">
                                <span class="counter green_color">50</span>
                                +
                            </h3>
                            <p>Total categories</p>
                        </div>
                        <div class="single_list_counter">
                            <h3 class="blue_color">
                                <span class="counter blue_color">100</span>
                                +
                            </h3>
                            <p>Total Listing</p>
                        </div>
                        <div class="single_list_counter">
                            <h3 class="deep_blue">
                                <span class="counter deep_blue">20</span>
                                +
                            </h3>
                            <p>Claimed Listing</p>
                        </div>
                        <div class="single_list_counter">
                            <h3 class="red_color">
                                <span class="counter red_color">10</span>
                                +
                            </h3>
                            <p>Reported Listing</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


@stop()
