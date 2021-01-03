<div class="menu row ml-5">
    @foreach($menu as $item)
    <div class="ml-2 mr-2 mt-3">
        <a href="{{route($item['alias'])}}">{{$item['title']}}</a>
    </div>
    @endforeach
</div>
<hr/>