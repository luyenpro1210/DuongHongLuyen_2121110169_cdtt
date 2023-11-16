
<nav class="header__menu">
    <ul>
        @foreach($list_menu as $rowmenu)
        <x-menu-item :rowmenu="$rowmenu"/>
        @endforeach
       
    </ul>
</nav>
