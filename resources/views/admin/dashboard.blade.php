@extends('adminlte::page')

@section('title', 'Congreso')

@section('content_header')
    <h1>Panel de administración</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>150</h3>
                    <p>Participantes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="small-box bg-light">
                <div class="inner">
                    <h3>50</h3>
                    <p>Ponentes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-tie"></i>
                </div>
            </div>
        </div>

    </div>
@stop

@section('css')
@stop

@section('js')
@stop
