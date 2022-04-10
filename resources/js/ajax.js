const { find } = require("lodash");


$(function(){

    
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
       
        $(".exist-alert").on("click",function(){
            $(".exist-alert").show()
            setTimeout(() => {
                $(".exist-alert").hide()
            }, 3000);
        })

          $(".success-alert").on("click",function(){
            $(".success-alert").show()
            setTimeout(() => {
                $(".success-alert").hide()
            }, 3000);
        })
         
         




//   $('.header-product-form .submit').on("click",function(e){
//             e.preventDefault();
//                 let thisbutton = $(this);
                
//                 let product_id = thisbutton.closest('form').find(".product_id").val();
                
//                 $.ajax({
//                     url: "/cart/"+product_id,
//                     type: "DELETE",

//                     success: function(response) {
//                         console.log(response);
//                     }            
//                 });
//             });
});