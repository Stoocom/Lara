<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание категории</title>
</head>
<body>
@extends('layouts.main')
@section('content')
@php
    //$routeName = route('create');
@endphp
<div class="row justify-content-center">
    <div class="col-md-6">
        {!! Form::open(array('route' => 'category_create_action')) !!}
        <h3 class="mb-3 mb-4">Создание новой категории</h3>
        <div class="form-group">
        {!! Form::text("news[title]",'', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::submit("Создаем", ['class' => 'btn btn-success']) !!}
        </div> 
        {!! Form::close() !!}       
    </div>
</div> 
@endsection
 
@section('title')
    Документ
@endsection
  

</body>
</html>