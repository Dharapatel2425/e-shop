$(document).ready(function(){
    loadcart();
    loadwishlist();

    $(document).on('click','.increment_btn', function (e) {   

        e.preventDefault();
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value,10);
        value = isNaN(value) ? 0 : value;
        if(value < 10){
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $(document).on('click','.decrement_btn', function (e) {   

        e.preventDefault();
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value,10);
        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    $('.addtocart').click(function(e){
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var prod_qty = $(this).closest('.product_data').find('.qty-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url : "/add-to-cart",
            data: {
                'prod_id':prod_id,
                'prod_qty':prod_qty,
            },
            success : function (response){
                swal(response.status);
            }
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(document).on('click','.delete-cart-item', function (e) {   
        
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: 'POST',
            url : "/delete-cart-item",
            data: {
                'prod_id':prod_id,
            },
            success : function (response){                
                loadcart();    
                $('.cartitems').load(location.href + " .cartitems");
                swal("",response.status,"success");
            }
        });
    });
  
       
    $(document).on('click','.changequantity', function (e) { 
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var prod_qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id':prod_id,
            'prod_qty':prod_qty,
        };        
        $.ajax({
            method: 'POST',
            url : "update-cart",
            data: data,
            success : function (response){
                $('.cartitems').load(location.href + " .cartitems");
                swal(response.status);
            }
        });
    });


    //add to wishlist

    $('.addtowishlist').click(function(e){
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url : "/add-to-wishlist",
            data: {
                'prod_id':prod_id,
            },
            success : function (response){
                swal(response.status);
            }
        });
    });

    $(document).on('click','.delete-wishlist-item', function (e) {  
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: 'POST',
            url : "/delete-wishlist-item",
            data: {
                'prod_id':prod_id,
            },
            success : function (response){
                loadwishlist();
                $('.wishlistitems').load(location.href + " .wishlistitems");
                swal("",response.status,"success");
            }
        });
    });

    //count for cart and wishlist

    function loadcart(){
        $.ajax({
            method: 'GET',
            url : "/load-cart-data",            
            success : function (response){
                $('.cart-count').html(''); 
                $('.cart-count').html(response.count);              
            }
        });
    }
    function loadwishlist(){
        $.ajax({
            method: 'GET',
            url : "/load-wishlist-data",            
            success : function (response){
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);              
            }
        });
    }

    

    
});