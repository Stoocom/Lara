@extends('layouts.main')
@section('content')
@include('blocks.admin_menu')

<h4 class="ml-5 text-success">{{$html}}</h4>
@php
    //dd($category);
@endphp
<div class="row justify-content-center">
    <div class="col-md-6">
        {!! Form::open(array('route' => array('admin_category_action', $category->id))) !!}
        <h3 class="mb-3 mb-4">Изменение категории</h3>
        <div class="form-group">
        {!! Form::text("news[title]",'', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::submit("submit", ['class' => 'btn btn-success']) !!}
        </div>
        
        {!! Form::close() !!}       
    </div>
</div> 

@endsection
 
@section('title')
    Документ
@endsection
