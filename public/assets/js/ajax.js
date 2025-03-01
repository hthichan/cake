

$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    //remove to cart
    $(document).on("click", ".btn_cart_remove", function () {
        if (
            confirm(
                "Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?"
            )
        ) {
            var itemCartId = $(this).data("item_cart_id");
            var removeToCartUrl = $(this).data("url");
            $.ajax({
                url: removeToCartUrl,
                type: "POST",
                data: {
                    _token: csrfToken,
                    item_cart_id: itemCartId,
                },
                success: function (response) {
                    alert(response.message);
                    var totalCart = parseInt($("#countItemCart").text()) - 1;
                    $("#cartList").html(response.html);
                    $("#countItemCart").text(totalCart);
                    $("#priceCart").text(response.price);
                }.bind(this),
                error: function (response) {
                    alert(response.responseJSON.error);
                }.bind(this),
            });
        }
    });

    //add to cart
    $(document).on("click", ".addToCart", function () {
        var productId = $(this).data("product_id");
        var url = $(this).data('url');
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: csrfToken,
                product_id: productId,
            },
            success: function (response) {
                alert(response.message);
                $("#cartList").html(response.html);
                $("#priceCart").text(response.price);
                if (response.count !== null) {
                    $("#countItemCart").text(response.count);
                }
            }.bind(this),
            error: function (response) {
                alert(response.responseJSON.error);
                console.log(response)

            }.bind(this),
        });
    });

    //favorite item
    // $(document).on("click", ".favorited", function () {
    //     var productId = $(this).data("product_id");
    //     var favoriteUrl = $(this).data("url");
    //     $.ajax({
    //         url: favoriteUrl,
    //         type: "POST",
    //         data: {
    //             _token: csrfToken,
    //             product_id: productId,
    //         },
    //         success: function (response) {
    //             if(isset(response.error) ) {
    //                 alert(response.error)
    //             } else {
    //                 if ($(this).css("background-color") === "rgb(188, 129, 87)") {
    //                     alert(response.message)
    //                     $(this).css("background-color", "#ffffff");
    //                 } else {
    //                     alert(response.message)
    //                     $(this).css("background-color", "#bc8157");
    //                 }
    //             }
    //         }.bind(this),
    //         error: function (response) {
    //             alert(response.responseJSON.error);
    //         }.bind(this),
    //     });
    // });

    //price filter
    $(document).on("click", ".price_filter", function () {
        var jsInputMin = $(".js-input-from").val();
        var jsInputMax = $(".js-input-to").val();
        var urlPriceFilter = $(this).data("price_filter");

        let url = window.location.pathname;
        let id = url.split("/shop/")[1];
        if (id) {
            $.ajax({
                url: urlPriceFilter,
                type: "POST",
                data: {
                    _token: csrfToken,
                    min_price: jsInputMin,
                    max_price: jsInputMax,
                    category_id: id,
                },
                success: function (response) {
                    $("#listItem").html(response.html);
                },
                error: function (response) {
                    alert(response.responseJSON.error);
                },
            });
        } else {
            $.ajax({
                url: urlPriceFilter,
                type: "POST",
                data: {
                    _token: csrfToken,
                    min_price: jsInputMin,
                    max_price: jsInputMax,
                },
                success: function (response) {
                    $("#listItem").html(response.html);
                },
                error: function (response) {
                    alert(response.responseJSON.error);
                },
            });
        }
    });

    //search items
    $(".sidebars_search").on("submit", function (e) {
        e.preventDefault(); // Chặn hành động mặc định của form
    });

    $(document).on("click", ".search_btn", function () {
        var searchValue = $(".name_item").val();
        var urlSearchName = $(this).data("search_name");
        $.ajax({
            url: urlSearchName,
            type: "POST",
            data: {
                _token: csrfToken,
                itemName: searchValue,
            },
            success: function (response) {
                $("#listItem").html(response.html);
            },
            error: function (response) {
                alert(response.responseJSON.error);
            },
        });
    });

    // SortBy
    $(document).on("change", "#SortBy", function () {
        var sortByValue = $(this).val();
        var urlSortBy = $(this).data("sort");
        $.ajax({
            url: urlSortBy,
            type: "POST",
            data: {
                _token: csrfToken,
                sort_by_value: sortByValue,
            },
            success: function (response) {
                $("#listItem").html(response.html);
            },
            error: function (response) {
                alert(response.responseJSON.error);
            },
        });
    });

    //comments
    $("#form-comments_prod").on("submit", function (e) {
        e.preventDefault(); // Chặn hành động mặc định của form
    });
    $(document).on("click", ".review_btn", function () {
        var selectedValue = $('input[name="star"]:checked').val();
        var cmt_content = $(".comment_content").val();
        var url = $(this).data("url");
        var product_id = $(this).data("product_id");
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: csrfToken,
                rating: selectedValue,
                comment: cmt_content,
                product_id: product_id,
            },
            success: function (response) {
                $("#comments_prod").html(response.html);
                // Làm trống ô nhập bình luận
                $(".comment_content").val("");

                // Bỏ chọn radio button (sao)
                $('input[name="star"]').prop('checked', false);
            }.bind(this),
            error: function (response) {
                alert(response.responseJSON.error);
            }.bind(this),
        });
    });

    //tab_list
    $(document).on("click", ".btn-tab_list", function () {
        var category_id = $(this).data('category_id') || 0;
        var url = $(this).data('url');
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: csrfToken,
                category_id: category_id,
            }, 
            success: function (response) {
                $(".tab-content").html(response.html)
                // alert(category_id)
            },
            error: function () {
                alert("Lỗi hệ thống");
            }
        })
    })
});
