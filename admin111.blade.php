@extends('layouts.main')
@section('content')
@include('blocks.admin_menu')
@forelse ($categories as $item)
    @php
    //dd($item->id);
    $routeName = route('admin_category', $item->id);
    //dd($routeName);
    @endphp
    <div>
        <a href="{{$routeName}}">{{$item->title}}</a>
    </div>
@empty
    <p>Категорий нет</p>
@endforelse
@endsection
 
@section('title')
    Документ
@endsection