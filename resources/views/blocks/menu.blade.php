
<div class="menu row ml-5">

    @foreach($menu as $id => $item)
    @php
    //dd($menu);
    $routeName = route($item['alias']);
    //dump($routeName);
    @endphp
    <div class="ml-2 mr-2 mt-3">
        <a href="{{$routeName}}">{{$item['title']}}</a>
    </div>
    @endforeach
</div>
<hr>