// $(document).ready(function () {
//     cartload();

//     $('.increment-btn').click(function (e) {
//         e.preventDefault();
//         var incre_value = $(this).parents('.quantity').find('.qty-input').val();
//         var value = parseInt(incre_value, 10);
//         value = isNaN(value) ? 0 : value;
//         if(value<10){
//             value++;
//             $(this).parents('.quantity').find('.qty-input').val(value);
//         }
//     });

//     $('.decrement-btn').click(function (e) {
//         e.preventDefault();
//         var decre_value = $(this).parents('.quantity').find('.qty-input').val();
//         var value = parseInt(decre_value, 10);
//         value = isNaN(value) ? 0 : value;
//         if(value>1){
//             value--;
//             $(this).parents('.quantity').find('.qty-input').val(value);
//         }
//     });

// });

// function cartload()
// {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     $.ajax({
//         url: '/load-cart-data',
//         method: "GET",
//         success: function (response) {
//             $('.basket-item-count').html('');
//             var parsed = jQuery.parseJSON(response)
//             var value = parsed; //Single Data Viewing
//             $('.basket-item-count').append($('<span class="badge badge-pill red">'+ value['totalcart'] +'</span>'));
//         }
//     });
// }

// //add cart
// $(document).ready(function () {
//     $('.add-to-cart-btn').click(function (e) {
//         e.preventDefault();

//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });

//         var product2_id = $(this).closest('.product_data').find('.product2_id').val();
//         var quantity = $(this).closest('.product_data').find('.qty-input').val();

//         // alert(product_id);

//         $.ajax({
//             url: "/add-to-cart",
//             method: "POST",
//             data: {
//                 'quantity': quantity,
//                 'product2_id': product2_id,
//             },
//             success: function (response) {
//                 alertify.set('notifier','position','top-right');
//                 alertify.success(response.status);
//                 cartload()
//             },
//         });
//     });
// });

// $(document).ready(function () {

//     $('.increment-btn').click(function (e) {
//         e.preventDefault();
//         var incre_value = $(this).parents('.quantity').find('.qty-input').val();
//         var value = parseInt(incre_value, 10);
//         value = isNaN(value) ? 0 : value;
//         if(value<10){
//             value++;
//             $(this).parents('.quantity').find('.qty-input').val(value);
//         }
//     });

//     $('.decrement-btn').click(function (e) {
//         e.preventDefault();
//         var decre_value = $(this).parents('.quantity').find('.qty-input').val();
//         var value = parseInt(decre_value, 10);
//         value = isNaN(value) ? 0 : value;
//         if(value>1){
//             value--;
//             $(this).parents('.quantity').find('.qty-input').val(value);
//         }
//     });

// });

// // Update Cart Data
// $(document).ready(function () {

//     $('.changeQuantity').click(function (e) {
//         e.preventDefault();

//         var thisClick = $(this);
//         var quantity = $(this).closest(".cartpage").find('.qty-input').val();
//         var product2_id = $(this).closest(".cartpage").find('.product2_id').val();

//         var data = {
//             '_token': $('input[name=_token]').val(),
//             'quantity':quantity,
//             'product2_id':product2_id,
//         };

//         $.ajax({
//             url: '/update-to-cart',
//             type: 'POST',
//             data: data,
//             success: function (response) {
//                 // window.location.reload();
//                 // console.log(response.gtprice);
//                 thisClick.closest(".cartpage").find('.cart-grand-total-price').text(response.gtprice);
//                 $('#totalajaxcall').load(location.href + ' .totalpricingload');
//                 alertify.set('notifier','position','top-right');
//                 alertify.success(response.status);
//             }
//         });
//     });

// });

// // // Delete Cart Data
// $(document).ready(function () {

//     $('.delete_cart_data').click(function (e) {
//         e.preventDefault();
        
//         var thisDeletearea = $(this);
//         var product2_id = $(this).closest(".cartpage").find('.product2_id').val();
//         // alert (product_id);

//         var data = {
//             '_token': $('input[name=_token]').val(),
//             "product2_id": product2_id,
//         };

//         // $(this).closest(".cartpage").remove();

//         $.ajax({
//             url: '/delete-from-cart',
//             type: 'DELETE',
//             data: data,
//             success: function (response) {
//                 // window.location.reload();
//                 thisDeletearea.closest(".cartpage").remove();
//                 $('#totalajaxcall').load(location.href + ' .totalpricingload');

//                 alertify.set('notifier','position','top-right');
//                 alertify.success(response.status);
//             }
//         });
//     });
// });

// // Clear Cart Data
// $(document).ready(function () {

//     $('.clear_cart').click(function (e) {
//         e.preventDefault();

//         $.ajax({
//             url: '/clear-cart',
//             type: 'GET',
//             success: function (response) {
//                 window.location.reload();
//                 alertify.set('notifier','position','top-right');
//                 alertify.success(response.status);
//             }
//         });

//     });

// });