<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from demo.dashboardpack.com/directory-html/index_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Jul 2024 09:53:50 GMT -->

<head>
    <base href="\">
        <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Directory</title>
    <link rel="icon" href="admin_assets/img/logo.png" type="image/png" />

    <link rel="stylesheet" href="admin_assets/css/bootstrap1.min.css" />

    <link rel="stylesheet" href="admin_assets/vendors/themefy_icon/themify-icons.css" />

    <link rel="stylesheet" href="admin_assets/vendors/swiper_slider/css/swiper.min.css" />

    <link rel="stylesheet" href="admin_assets/vendors/select2/css/select2.min.css" />

    <link rel="stylesheet" href="admin_assets/vendors/niceselect/css/nice-select.css" />

    <link rel="stylesheet" href="admin_assets/vendors/owl_carousel/css/owl.carousel.css" />

    <link rel="stylesheet" href="admin_assets/vendors/gijgo/gijgo.min.css" />

    <link rel="stylesheet" href="admin_assets/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="admin_assets/vendors/tagsinput/tagsinput.css" />

    <link rel="stylesheet" href="admin_assets/vendors/datepicker/date-picker.css" />

    <link rel="stylesheet" href="admin_assets/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="admin_assets/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="admin_assets/vendors/datatable/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" href="admin_assets/vendors/text_editor/summernote-bs4.css" />

    <link rel="stylesheet" href="admin_assets/vendors/morris/morris.css" />

    <link rel="stylesheet" href="admin_assets/vendors/material_icon/material-icons.css" />

    <link rel="stylesheet" href="admin_assets/css/metisMenu.css" />

    <link rel="stylesheet" href="admin_assets/css/style1.css" />
    <link rel="stylesheet" href="admin_assets/css/colors/default.css" id="colorSkinCSS" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css"
        integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="crm_body_bg">
    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <a href="index.html"><img src="admin_assets/img/logo.png" alt /></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="{{ Request::path() === 'admin' ? 'mm-active' : '' }}">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="admin_assets/img/menu-icon/dashboard.svg" alt />
                    <span>Thống kê</span>
                </a>
                <ul>
                    <li>
                        <a class="{{ Request::path() === 'admin' ? 'active' : '' }}"
                            href="{{ route('admin.home') }}">Default</a>
                    </li>
                </ul>
            </li>
            <li class="{{ preg_match('/^admin\/category(\/.*)?$/', Request::path()) ? 'mm-active' : '' }}">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="admin_assets/img/menu-icon/dashboard.svg" alt />
                    <span>Loại sản phẩm</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('category.index') }}"
                            class="{{ Request::path() == 'admin/category' ? 'active' : '' }}">Danh sách</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="{{ route('category.create') }}"
                            class="{{ Request::path() == 'admin/category/create' ? 'active' : '' }}">Thêm mới</a>
                    </li>
                </ul>
            </li>
            <li class="{{ preg_match('/^admin\/product(\/.*)?$/', Request::path()) ? 'mm-active' : '' }}">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="admin_assets/img/menu-icon/dashboard.svg" alt />
                    <span>Sản phẩm</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('product.index') }}"
                            class="{{ Request::path() == 'admin/product' ? 'active' : '' }}">Danh sách</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="{{ route('product.create') }}"
                            class="{{ Request::path() == 'admin/product/create' ? 'active' : '' }}">Thêm mới</a>
                    </li>
                </ul>
            </li>
            <li class="{{ preg_match('/^admin\/users(\/.*)?$/', Request::path()) ? 'mm-active' : '' }}">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="admin_assets/img/menu-icon/dashboard.svg" alt />
                    <span>Khách hàng</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('admin.users') }}"
                            class="{{ preg_match('/^admin\/users(\/.*)?$/', Request::path()) ? 'active' : '' }}">Danh
                            sách</a>
                    </li>
                </ul>
            </li>
            <li class="{{ preg_match('/^admin\/orders(\/.*)?$/', Request::path()) ? 'mm-active' : '' }}">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="admin_assets/img/menu-icon/dashboard.svg" alt />
                    <span>Đơn hàng</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('admin.orders') }}"
                            class="{{ Request::path() == 'admin/orders' ? 'active' : '' }}">Danh sách</a>
                    </li>
                </ul>
            </li>
            <li class="{{ preg_match('/^admin\/promotions(\/.*)?$/', Request::path()) ? 'mm-active' : '' }}">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <img src="admin_assets/img/menu-icon/dashboard.svg" alt />
                    <span>Khuyến mãi</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('promotions.index') }}" class="{{ Request::path() == 'admin/promotions' ? 'active' : '' }}">
                            Khuyến mãi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('promotions.create') }}" class="{{ Request::path() == 'admin/promotions/create' ? 'active' : '' }}">
                            Tạo khuyến mãi
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <section class="main_content dashboard_part">
        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area">
                            <div class="search_inner">
                                
                            </div>
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="header_notification_warp d-flex align-items-center">
                                <li>
                                    <a class="bell_notification_clicker" href="#">
                                        <img src="admin_assets/img/icon/bell.svg" alt />
                                        <span>04</span>
                                    </a>

                                    <div class="Menu_NOtification_Wrap">
                                        <div class="notification_Header">
                                            <h4>Notifications</h4>
                                        </div>
                                        <div class="Notification_body">
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="admin_assets/img/staf/2.png"
                                                            alt /></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>
                                                            Cool Directory
                                                        </h5>
                                                    </a>
                                                    <p>
                                                        Lorem ipsum dolor
                                                        sit amet
                                                    </p>
                                                </div>
                                            </div>

                                            {{-- <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="admin_assets/img/staf/4.png"
                                                            alt /></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>
                                                            Awesome packages
                                                        </h5>
                                                    </a>
                                                    <p>
                                                        Lorem ipsum dolor
                                                        sit amet
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="admin_assets/img/staf/3.png"
                                                            alt /></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>
                                                            what a packages
                                                        </h5>
                                                    </a>
                                                    <p>
                                                        Lorem ipsum dolor
                                                        sit amet
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="admin_assets/img/staf/2.png"
                                                            alt /></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>
                                                            Cool Directory
                                                        </h5>
                                                    </a>
                                                    <p>
                                                        Lorem ipsum dolor
                                                        sit amet
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="admin_assets/img/staf/4.png"
                                                            alt /></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>
                                                            Awesome packages
                                                        </h5>
                                                    </a>
                                                    <p>
                                                        Lorem ipsum dolor
                                                        sit amet
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="admin_assets/img/staf/3.png"
                                                            alt /></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>
                                                            what a packages
                                                        </h5>
                                                    </a>
                                                    <p>
                                                        Lorem ipsum dolor
                                                        sit amet
                                                    </p>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="nofity_footer">
                                            <div class="submit_button text-center pt_20">
                                                <a href="#" class="btn_1">See More</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="CHATBOX_open" href="#">
                                        <img src="admin_assets/img/icon/msg.svg" alt />
                                        <span>01</span>
                                    </a>
                                </li>
                            </div>
                            <div class="profile_info">
                                <img src="admin_assets/img/client_img.png" alt="#" />
                                <div class="profile_info_iner">
                                    <div class="profile_author_name">
                                        <p>Neurologist</p>
                                        <h5>Dr. Robar Smith</h5>
                                    </div>
                                    <div class="profile_info_details">
                                        <a href="{{ route('admin.check_logout') }}">Log Out </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('main')

        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center">
                            <p>
                                2020 © Influence - Designed by
                                <a href="#"> <i class="ti-heart"></i> </a><a href="#"> Dashboard</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="CHAT_MESSAGE_POPUPBOX">
        <div class="CHAT_POPUP_HEADER">
            <div class="MSEESAGE_CHATBOX_CLOSE">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.09939 5.98831L11.772 10.661C12.076 10.965 12.076 11.4564 11.772 11.7603C11.468 12.0643 10.9766 12.0643 10.6726 11.7603L5.99994 7.08762L1.32737 11.7603C1.02329 12.0643 0.532002 12.0643 0.228062 11.7603C-0.0760207 11.4564 -0.0760207 10.965 0.228062 10.661L4.90063 5.98831L0.228062 1.3156C-0.0760207 1.01166 -0.0760207 0.520226 0.228062 0.216286C0.379534 0.0646715 0.578697 -0.0114918 0.777717 -0.0114918C0.976738 -0.0114918 1.17576 0.0646715 1.32737 0.216286L5.99994 4.889L10.6726 0.216286C10.8243 0.0646715 11.0233 -0.0114918 11.2223 -0.0114918C11.4213 -0.0114918 11.6203 0.0646715 11.772 0.216286C12.076 0.520226 12.076 1.01166 11.772 1.3156L7.09939 5.98831Z"
                        fill="white" />
                </svg>
            </div>
            <h3>Chat with us</h3>
            <div class="Chat_Listed_member">
                <ul>
                    <li>
                        <a href="#">
                            <div class="member_thumb">
                                <img src="admin_assets/img/staf/1.png" alt />
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="member_thumb">
                                <img src="admin_assets/img/staf/2.png" alt />
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="member_thumb">
                                <img src="admin_assets/img/staf/3.png" alt />
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="member_thumb">
                                <img src="admin_assets/img/staf/4.png" alt />
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="member_thumb">
                                <img src="admin_assets/img/staf/5.png" alt />
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="member_thumb">
                                <div class="more_member_count">
                                    <span>90+</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="CHAT_POPUP_BODY">
            <p class="mesaged_send_date">Sunday, 12 January</p>
            <div class="CHATING_SENDER">
                <div class="SMS_thumb">
                    <img src="admin_assets/img/staf/1.png" alt />
                </div>
                <div class="SEND_SMS_VIEW">
                    <p>Hi! Welcome . How can I help you?</p>
                </div>
            </div>
            <div class="CHATING_SENDER CHATING_RECEIVEr">
                <div class="SEND_SMS_VIEW">
                    <p>Hello</p>
                </div>
                <div class="SMS_thumb">
                    <img src="admin_assets/img/staf/1.png" alt />
                </div>
            </div>
        </div>
        <div class="CHAT_POPUP_BOTTOM">
            <div class="chat_input_box d-flex align-items-center">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Write your message"
                        aria-label="Recipient's username" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn" type="button">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.7821 3.21895C14.4908 -1.07281 7.50882 -1.07281 3.2183 3.21792C-1.07304 7.50864 -1.07263 14.4908 3.21872 18.7824C7.50882 23.0729 14.4908 23.0729 18.7817 18.7815C23.0726 14.4908 23.0724 7.50906 18.7821 3.21895ZM17.5813 17.5815C13.9525 21.2103 8.04773 21.2108 4.41871 17.5819C0.78907 13.9525 0.789485 8.04714 4.41871 4.41832C8.04752 0.789719 13.9521 0.789304 17.5817 4.41874C21.2105 8.04755 21.2101 13.9529 17.5813 17.5815ZM6.89503 8.02162C6.89503 7.31138 7.47107 6.73534 8.18131 6.73534C8.89135 6.73534 9.46739 7.31117 9.46739 8.02162C9.46739 8.73228 8.89135 9.30811 8.18131 9.30811C7.47107 9.30811 6.89503 8.73228 6.89503 8.02162ZM12.7274 8.02162C12.7274 7.31138 13.3038 6.73534 14.0141 6.73534C14.7241 6.73534 15.3002 7.31117 15.3002 8.02162C15.3002 8.73228 14.7243 9.30811 14.0141 9.30811C13.3038 9.30811 12.7274 8.73228 12.7274 8.02162ZM15.7683 13.2898C14.9712 15.1332 13.1043 16.3243 11.0126 16.3243C8.8758 16.3243 6.99792 15.1272 6.22834 13.2744C6.09642 12.9573 6.24681 12.593 6.56438 12.4611C6.64238 12.4289 6.72328 12.4136 6.80293 12.4136C7.04687 12.4136 7.27836 12.5577 7.37772 12.7973C7.95376 14.1842 9.38048 15.0799 11.0126 15.0799C12.6077 15.0799 14.0261 14.1836 14.626 12.7959C14.7625 12.4804 15.1288 12.335 15.4441 12.4717C15.7594 12.6084 15.9048 12.9745 15.7683 13.2898Z"
                                    fill="#707DB7" />
                            </svg>
                        </button>
                        <button class="btn" type="button">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 0.289062C4.92455 0.289062 0 5.08402 0 10.9996C0 16.9152 4.92455 21.7101 11 21.7101C17.0755 21.7101 22 16.9145 22 10.9996C22 5.08472 17.0755 0.289062 11 0.289062ZM11 20.3713C5.68423 20.3713 1.375 16.1755 1.375 10.9996C1.375 5.82371 5.68423 1.62788 11 1.62788C16.3158 1.62788 20.625 5.82371 20.625 10.9996C20.625 16.1755 16.3158 20.3713 11 20.3713ZM15.125 10.3302H11.6875V6.98314C11.6875 6.61363 11.3795 6.31373 11 6.31373C10.6205 6.31373 10.3125 6.61363 10.3125 6.98314V10.3302H6.875C6.4955 10.3302 6.1875 10.6301 6.1875 10.9996C6.1875 11.3691 6.4955 11.669 6.875 11.669H10.3125V15.016C10.3125 15.3855 10.6205 15.6854 11 15.6854C11.3795 15.6854 11.6875 15.3855 11.6875 15.016V11.669H15.125C15.5045 11.669 15.8125 11.3691 15.8125 10.9996C15.8125 10.6301 15.5045 10.3302 15.125 10.3302Z"
                                    fill="#707DB7" />
                            </svg>

                            <input type="file" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="admin_assets/js/jquery1-3.4.1.min.js"></script>

    <script src="admin_assets/js/popper1.min.js"></script>

    <script src="admin_assets/js/bootstrap1.min.js"></script>

    <script src="admin_assets/js/metisMenu.js"></script>

    <script src="admin_assets/vendors/count_up/jquery.waypoints.min.js"></script>

    <script src="admin_assets/vendors/chartlist/Chart.min.js"></script>

    <script src="admin_assets/vendors/count_up/jquery.counterup.min.js"></script>

    <script src="admin_assets/vendors/swiper_slider/js/swiper.min.js"></script>

    <script src="admin_assets/vendors/niceselect/js/jquery.nice-select.min.js"></script>

    <script src="admin_assets/vendors/owl_carousel/js/owl.carousel.min.js"></script>

    <script src="admin_assets/vendors/gijgo/gijgo.min.js"></script>

    {{-- <script src="admin_assets/vendors/datatable/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="admin_assets/vendors/datatable/js/dataTables.responsive.min.js"></script> --}}
    {{-- <script src="admin_assets/vendors/datatable/js/dataTables.buttons.min.js"></script> --}}
    {{-- <script src="admin_assets/vendors/datatable/js/buttons.flash.min.js"></script> --}}
    <script src="admin_assets/vendors/datatable/js/jszip.min.js"></script>
    <script src="admin_assets/vendors/datatable/js/pdfmake.min.js"></script>
    <script src="admin_assets/vendors/datatable/js/vfs_fonts.js"></script>
    {{-- <script src="admin_assets/vendors/datatable/js/buttons.html5.min.js"></script> --}}
    {{-- <script src="admin_assets/vendors/datatable/js/buttons.print.min.js"></script> --}}

    <script src="admin_assets/vendors/datepicker/datepicker.js"></script>
    <script src="admin_assets/vendors/datepicker/datepicker.en.js"></script>
    <script src="admin_assets/vendors/datepicker/datepicker.custom.js"></script>
    <script src="admin_assets/js/chart.min.js"></script>
    <script src="admin_assets/js/load_img.js"></script>

    <script src="admin_assets/vendors/progressbar/jquery.barfiller.js"></script>

    <script src="admin_assets/vendors/tagsinput/tagsinput.js"></script>

    <script src="admin_assets/vendors/text_editor/summernote-bs4.js"></script>
    <script src="admin_assets/vendors/am_chart/amcharts.js"></script>
    {{-- <script src="admin_assets/vendors/apex_chart/apexcharts.js"></script> --}}
    {{-- <script src="admin_assets/vendors/apex_chart/apex_realestate.js"></script> --}}

    <script src="admin_assets/vendors/chart_am/core.js"></script>
    <script src="admin_assets/vendors/chart_am/charts.js"></script>
    <script src="admin_assets/vendors/chart_am/animated.js"></script>
    <script src="admin_assets/vendors/chart_am/kelly.js"></script>
    <script src="admin_assets/vendors/chart_am/chart-custom.js"></script>

    <script src="admin_assets/js/custom.js"></script>
    <script src="admin_assets/vendors/apex_chart/bar_active_1.js"></script>
    <script src="admin_assets/vendors/apex_chart/apex_chart_list.js"></script>
</body>

<!-- Mirrored from demo.dashboardpack.com/directory-html/index_2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Jul 2024 09:53:50 GMT -->
<!-- Toast js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

{{-- Create category --}}
@if (Session::has('success'))
    <script>
        $.toast({
            heading: 'Thành công',
            text: "{{ Session::get('success') }}",
            showHideTransition: 'fade',
            position: 'top-center',
            icon: 'success'
        })
    </script>
@endif
@if (Session::has('error'))
    <script>
        $.toast({
            heading: 'Thành công',
            text: "{{ Session::get('error') }}",
            showHideTransition: 'fade',
            position: 'top-center',
            icon: 'error'
        })
    </script>
@endif

</html>
