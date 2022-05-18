

$(function(){
    let startDate = new Date();
    let endDate = new Date();
    endDate.setMonth(endDate.getMonth()+1)
    jQuery('#datetimepicker').datetimepicker({
            timepicker: true,
            format: 'd.m.Y H:i',
            disabledWeekDays: [5,6],
            minDate: startDate,
            maxDate: endDate,
            minTime: '8:00',
            maxTime: '18:00',
          
    });
    $.datetimepicker.setLocale('fr');

    
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
        function missing_field_alert(message){
            $(".missing_field_alert").on("click",function(){
            $(".missing_field_alert").show()
            setTimeout(() => {
                $(".missing_field_alert").hide()
            }, 3000);
        })
        }
         
         




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