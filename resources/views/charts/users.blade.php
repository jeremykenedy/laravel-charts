@extends('layouts.app')

@section('head_includes')

        {!! Charts::assets() !!}

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-body">

                    {!! $chart->render() !!}

                 </div>
            </div>
        </div>
    </div>
</div>
@endsection