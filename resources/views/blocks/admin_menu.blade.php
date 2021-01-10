

<h3 class="ml-2 text-center text-success">Страница администратора</h3>
<div class="menu row ml-5">

@foreach($admin_menu as $id => $item)
@php
//dd($admin_menu);
$routeName = route($item['alias']);
//dump($routeName);
@endphp
<div class="ml-2 mr-2 mt-3">
    <a href="{{$routeName}}">{{$item['title']}}</a>
</div>
@endforeach
</div>
<hr/>

 
