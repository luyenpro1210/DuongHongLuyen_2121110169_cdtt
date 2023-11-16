 <!-- Featured Section Begin -->
 <section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ $cat ->name }}</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".oranges">Oranges</li>
                        <li data-filter=".fresh-meat">Fresh Meat</li>
                        <li data-filter=".vegetables">Vegetables</li>
                        <li data-filter=".fastfood">Fastfood</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($list_product as $product)
            <x-product-item :rowproduct="$product" />
            @endforeach
        </div>
    </div>
    <div class="product-category-readmore text-center">
        <a href="{{ route('site.slug', ['slug' =>$cat->slug]) }}" class="btn btn-outline-success"> Xem them </a>
    </div>
</section>
<!-- Featured Section End -->

<!-- Latest Product Section End -->