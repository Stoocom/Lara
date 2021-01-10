<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости категории</title>
</head>
<body>

@include('blocks.menu')
    @foreach($news as $item)
    @php
        //dd($item);
        $routeName = route('news::news-one', $item->id);
    @endphp
    <div>
        <a href="{{$routeName}}">{{$item->title}}</a>
    </div>
    @endforeach
</body>
</html> 