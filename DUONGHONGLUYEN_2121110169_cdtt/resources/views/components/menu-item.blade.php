@if($menusub == true)
<li><a href="{{$menu->link}}">{{$menu->name}}</a>
    <ul class="header__menu__dropdown">
      @foreach ($list_menu as $item)
      <li><a href="{{$item->link}}">{{$item->name}}</a></li>
      @endforeach
 </ul>
</li>
@else
<li class="nav-item">
  <a class="nav-link" href="{{$menu->link}}">{{$menu->name}}</a>
</li>
@endif