@extends('layouts.main')
@section('content')
@include('blocks.admin_menu')

<h4 class="ml-5 text-success">{{$html}}</h4>
@php
    //dd($categories);
    $arrayTitles = $categories->toArray();
    $arrayTitlesNew = [];    
@endphp
@foreach($arrayTitles as $id => $item)
    @php
        //dd($item['title']);
        $arrayTitlesNew[] = $item['title'];
        //dd($arrayTitlesNew);
    @endphp
@endforeach

<div class="row justify-content-center">
    <div class="col-md-6">
        {!! Form::open(array('route' => 'news_create_action')) !!}
            <div class="ml-2 mr-2 mt-3 mb-4 row">
                <p class="mr-3">Выбор категории</p>
                {!! Form::select('news[category]', $arrayTitlesNew) !!}
            </div>
        <div class="form-group">
        {!! Form::text("news[title]",'', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::textarea("news[content]",'', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
        {!! Form::submit("submit", ['class' => 'btn btn-success']) !!}
        </div>
        
        {!! Form::close() !!}       
    </div>
</div> 
@endsection
 
@section('title')
    Создание новости
@endsection
  
</body>
</html>