<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('frontend/script/script.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>



<script type="text/javascript">
    // Place Order
    $("#checkOut").click(function (e) {
        e.preventDefault();
        var name = $("#uName").val();
        var email = $("#uEmail").val();
        var phone = $("#uPhone").val();
        var address = $("#uAddress").val();
        
        $.ajax({
            url: '{{ route('place.order') }}',
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                user_name: name,
                user_email: email,
                user_phone: phone,
                user_address: address,
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });
    // var sprice = document.getElementById('singleProductPrice').innerText;
    // var sval = document.getElementById('singleProductVal').value;
    // document.getElementById("showProductPrice").innerHTML = sprice + sval;
        
    $('.quentity').change(function (e){
        var id = $(this).data('product_id');
        var qty = $(this).val();
        if(qty >= 1){
            
        var price = $('.price_' + id).val();
        console.log(id, qty, price);
        var cal = qty * price;
        $('.quentity_into_price_' + id).html(cal);
        
        
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('cart.update') }}',
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("rowId"), 
                quantity: ele.val(), 
            },
            success: function (response) {
                $('#total_price').html(response.total_price);
            }
        });
        }
        
        
    });
  
    // $(".quentity").change(function (e) {
        
    // });
  
    $(".delete-product").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Do you really want to delete?")) {
            $.ajax({
                url: '{{ route('cart.delete') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("rowId")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
  
</script>
@stack('scripts')