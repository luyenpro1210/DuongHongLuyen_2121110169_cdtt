@if (count($list_brand)>0)
<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>Thương Hiệu</span>
    </div>
    <ul>
    @foreach($list_brand as $brand)
    <li><a href="{{ route('site.slug', ['slug' =>$brand->slug]) }}">{{$brand->name}}</a></li>
    @endforeach
    </ul>

</div>
@endif
