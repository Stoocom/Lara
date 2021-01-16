@extends('layouts.main')
@section('content')
@include('blocks.admin_menu')
@forelse ($categories as $item)
<?php phpinfo(); ?>
    @php
    
    $routeName = route('news::list', $item->id);
    //dd($routeName);
    @endphp
    <div class="row ml-5">
        <a class="text-success"href="{{$routeName}}">{{$item->title}}</a>
        <a class="ml-5 text-muted"href="{{route('admin_category', $item->id)}}">Редактировать</a>
    </div>
@empty
    <p>Категорий нет</p>
@endforelse
@endsection
 
@section('title')
    Админка
@endsection