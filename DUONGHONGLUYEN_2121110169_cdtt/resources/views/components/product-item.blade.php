<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
    <div class="featured__item">
        <div class="featured__item__pic set-bg" data-setbg="{{ asset('images/product/'.$product->image) }}">
            <ul class="featured__item__pic__hover">
                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                <li><button onclick="AddCart({{$product->id}})"><i class="fa fa-shopping-cart"></i></button></li>
            </ul>
        </div>
        <div class="featured__item__text">
            <h6><a href="{{ route('site.slug', ['slug' =>$product->slug]) }}">{{$product->name}}</a></h6>
            <h5><del>{{ number_format($product->price)}}</del></h5>
            <h5>{{ number_format($product->pricesale)}}</h5>
        </div>
    </div>
</div>
@section('footer')
<script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
<script>
function AddCart(productid) {
    $(document).ready(function() {
        const urladdcart = '{{ route("site.cart.addcart") }}';
        $.ajax({
            type: 'GET',
            url: urladdcart,
            data: {
                productid: productid,
                qty: 1
            },
            dataType: 'json',
            success: function(data) {
                document.getElementById("count-cart").innerHTML = data.count_cart;
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
}
</script>
@endsection