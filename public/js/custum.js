
    // $('#contactForm').on('submit',function(event){
    //     event.preventDefault();

    //     let name = $('#name').val();
    //     let price = $('#price').val();
    //     let image = $('#image').val();
      

    //     $.ajax({
    //       url: "/store-product",
    //       type:"POST",
    //       data:{
    //         "_token": "{{ csrf_token() }}",
    //         name:name,
    //         price:price,
    //         image:image,
           
    //       },
    //       success:function(response){
    //         window.alart("asd");
    //       },
    //      });
    //     });

        function pro(){
          event.preventDefault();

          let name = $('#name').val();
          let price = $('#price').val();
          let image = $('#image').val();
        
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    
        });
          $.ajax({
            url: "/store-product",
            type:"POST",
            data:{
             _token: "{{ csrf_token() }}",
              name:name,
              price:price,
              image:image,
             
            },
            success:function(response){
              window.alart("asd");
            },
           });
        }

// Delete Product
function deleteProduct(id,url)
{
	event.preventDefault()
    swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url,
                type: 'get',
                data: {
                    id: id,
                },
                dataType: 'html',
                success: function (data) {
                    $("#cart-section").load(location.href+" #cart-section>*","");
                }
            });
          swal("Your Product  has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Product  is safe!");
        }
      });
	
}


//ADd To CART

function AddToCart(id,url)
{
	event.preventDefault()
    $.ajax({
        url: url,
        type: 'get',
        data: {
            id: id,
        },
        dataType: 'html',
        success: function (data) {
            $("#cart-section").load(location.href+" #cart-section>*","");
        }
    });
  swal("Your Product  Add into Cart!", {
    icon: "success",
  });
	
}

// Delete Order
function deleteOrder(id,url)
{
	event.preventDefault()
    swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url,
                type: 'get',
                data: {
                    id: id,
                },
                dataType: 'html',
                success: function (data) {
                    $("#order-section").load(location.href+" #order-section>*","");
                }
            });
          swal("Your Order  has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your Order  is safe!");
        }
      });
	
}


// Delete Cart Item
function deleteCart(id,url)
{
	event.preventDefault()
    swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url,
                type: 'get',
                data: {
                    id: id,
                },
                dataType: 'html',
                success: function (data) {
                    $("#cart-item-section").load(location.href+" #cart-item-section>*","");
                }
            });
          swal("Your cart item  has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your cart item  is safe!");
        }
      });
	
}


