@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido: {{ auth()->user()->email }}</div>

                <div class="panel-body">
                   Sistema Administrativo
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
