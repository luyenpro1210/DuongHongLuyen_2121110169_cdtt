@if (count($list_category)>0)
<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>Danh mục sản phẩm</span>
    </div>
    <ul>
    @foreach($list_category as $category)
    <li><a href="{{ route('site.slug', ['slug' =>$category->slug]) }}">{{$category->name}}</a></li>
    @endforeach
    </ul>

</div>
@endif
