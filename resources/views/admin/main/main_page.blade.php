<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка</title>
</head>

<body>
    <div class="header">
        @extends('layouts.main')
    </div>
    @section('content_2')
    <div class="new">
        @include('blocks.admin_menu')
    </div>
    @endsection
    @section('content')

    <!-- <div class="row justify-content-center">
        <div class="col-md-6">
            {!! Form::open(array('route' => 'create_action')) !!}
            <h3 class="mb-3 mb-4">Создание новых новостей</h3>
            <div class="ml-2 mr-2 mt-3 mb-4 row">
                <p class="mr-3">Выбор категории</p>
                {!! Form::select('news[category]', $categories) !!}
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
    </div> -->
    @endsection

    @section('title')
    Документ
    @endsection


</body>

</html>