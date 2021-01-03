<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категории</title>
</head>
<body>
@include('blocks.menu')
    {{$html}}
@forelse ($categoriesOfNews as $item)
    @php
    //dd($item->id);
    $routeName = route('news::list', ['categoryId' => $item->id]);
    @endphp
    <div>
        <a href="{{$routeName}}">{{$item->title}}</a>
    </div>
@empty
    <p>Категорий нет</p>
@endforelse      
</body>
</html>