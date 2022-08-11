$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // $("#sort").on('change' , function (){

    //     this.form.submit();
    // });

    //relaoad the products using ajax
    $(document).on("change", "#sort", function () {

        // $("#sort").on('change' , function (){
        var sort = $(this).val();
        var category_url = $('#category_url').val();
        //alert(url);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: category_url,
            method: "get",
            data: { sort: sort, url: category_url },
            success: function (data) {

                $('.filter_products').html(data);
            }
        });

    });

    //change price when click on size
    $("#getPrice").change(function () {
        var size = $(this).val();
        if (size=="") {
            alert("Please select size");
            return false;
        }
        var product_id = $(this).attr("product-id");
        $.ajax({
            url: '/get-product-price',
            data: { size: size, product_id: product_id },
            type: 'post',
            success: function (resp) {
                // alert(resp['product_price']);
                //  alert(resp['discounted_price']);
                // return false;
                if (resp['discount'] > 0) {
                    $(".getAttrPrice").html("<del>Rs." + resp['product_price'] + "</del> Rs." + resp['final_price']);
                } else {
                    $(".getAttrPrice").html("Rs." + resp['product_price']);
                }
                // $(".getAttrPrice").html("Rs." +resp);

            },
            error: function () {
                //alert("Error");
            }
        });

    });


    // //update cart items
    $(document).on('click', '.btnItemUpdate', function () {

        if ($(this).hasClass('increment-btn')) {
            // e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var qty = parseInt(incre_value, 10);
            qty = isNaN(qty) ? 0 : qty;
            if (qty < 10) {
                qty++;
                $(this).parents('.quantity').find('.qty-input').val(qty);
            }
        }

        if ($(this).hasClass('decrement-btn')) {
            // e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var qty = parseInt(decre_value, 10);
            qty = isNaN(qty) ? 0 : qty;
            if (qty > 1) {
                qty--;
                $(this).parents('.quantity').find('.qty-input').val(qty);
            }
        }
        var cartid = $(this).data('cartid');
        // alert("quantity value" +qty);
        // alert("cart id" +cartid);
        $.ajax({
            data: { "cartid": cartid, "qty": qty },
            url: "/update-cart-item-qty",
            type: "post",
            success: function(resp) {
                // alert(resp);
                // if (resp.status == false) {
                //     alert(resp.message);
                // }
                $("#AppendCartItems").html(resp.view);
            },
            error: function () {
                alert("Error");
            }
        });
    });

    //update cart items
    // $(document).on('click', '.btnItemUpdate', function () {
    //     if($(this).hasClass('qtyMinus')){
    //         var quantity = $(this).prev.val();
    //         alert(quantity);
    //         return false;
    //     }
    // });


    //Delete cart items
    $(document).on('click', '.cartItemDelete', function () {
        var cartid = $(this).data('cartid');
        var result = confirm("Want to delete item from cart ? ");
        //alert(cartid);
        if (result) {
            $.ajax({
                data: { "cartid": cartid },
                url: "/delete-cart-item",
                type: "post",
                success: function (resp) {
                    $("#AppendCartItems").html(resp.view);
                },
                error: function () {
                    alert("Error");
                }
            });
        }

    });

    // $(document).on("click" , ".cartItemDelete" , function() {
    //     var module = $(this).attr('module');
    //     var cartid = $(this).attr('cartid');
    // //    alert(cartid);
    // //    alert(module);

    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, delete it!'
    //       }).then((result) => {
    //         if (result.isConfirmed) {
    //           Swal.fire(
    //             'Deleted!',

    //             'success'
    //           )
    //           window.location= "/delete-cart-item/"+module+"/"+cartid;
    //         }
    //       });
    // });


    // validate register form on keyup and submit
    $("#registerForm").validate({
        rules: {
            name: "required",
            mobile: {
                required: true,
                minlength: 10,
                maxlength: 10,
                digits : true
            },
            email: {
                required: true,
                email: true,
                remote: "check-email"
            },
            password: {
                required: true,
                minlength: 6
            },

        },
        messages: {
            name: "Please enter your Name",

            mobile: {
                required: "Please enter a mobile",
                minlength: "Your mobile must consist of at least 10 numbers"
            },
            password: {
                required: "Please enter a password",
                minlength: "Your password must be at least 6 characters long"
            },

            email:{
            required : "Please enter your Email Address",
            email: "Please enter a valid email address",
            remote: "Email already exists"
            }
        }
    });


    // validate login form on keyup and submit
    $("#loginForm").validate({
        rules: {

            email: {
                required: true,
                email: true,

            },
            password: {
                required: true,
                minlength: 6
            },

        },
        messages: {
            email:{
            required : "Please enter your Email Address",
            email: "Please enter a valid email address",
            remote: "Email already exists"
            } ,
            password: {
                required: "Please enter a password",
                minlength: "Your password must be at least 6 characters long"
            }
        }
    });

});
