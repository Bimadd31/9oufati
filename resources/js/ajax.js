const { find } = require("lodash");


$(function(){

    
    //     $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });


    //  $('#form-shop-add-product #submit').on("click",function(e){
    //     e.preventDefault();

    //             let thisbutton = $(this);
    //             form = thisbutton.closest('form');

    //             $.ajax({
    //                 url: "/cart",
    //                 type: "POST",
    //                 data: form.serialize(),
    //                 success: function(response) {
    //                     console.log(response);
    //                 }            
    //             });
    //         });



  $('#header-product-form #submit').on("click",function(e){
            e.preventDefault();
                let thisbutton = $(this);
                
                let product_id = thisbutton.closest('form').find("#product_id").val();
                
                $.ajax({
                    url: "/cart/"+product_id,
                    type: "DELETE",

                    success: function(response) {
                        console.log(response);
                    }            
                });
            });
});