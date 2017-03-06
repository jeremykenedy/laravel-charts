@extends('layouts.app')

@section('head_includes')

        {!! Charts::assets() !!}

@endsection

@section('content')

<div class="container">
    <div class="row">
        @foreach ($data as $chart)
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! $chart->render() !!}
                     </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection