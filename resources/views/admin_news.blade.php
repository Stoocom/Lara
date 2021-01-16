@extends('layouts.main')
@section('content')
@include('blocks.admin_menu')
@forelse ($news as $item)
    @php
    //dd($item->id);
    $routeName = route('news::news-one', $item->id);
    $routeNameUpdate = route('admin_news_update', $item->id);
    //dd($routeNameUpdate);
    @endphp
        <div class="row ml-5">
            <div class="ml-2">
                <a href="{{$routeName}}">{{$item->title}}</a>
             </div>
            <div class="ml-2">
                <a href="{{$routeNameUpdate}}">Редактировать</a>
            </div>
        </div>
    @empty
        <p>Категорий нет</p>
    @endforelse
    <div class="row justify-content-center">
        {{$news->links()}}
    </div>
@endsection
 
@section('title')
    Админка новостей
@endsection