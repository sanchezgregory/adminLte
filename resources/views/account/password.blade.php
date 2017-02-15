@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $title }}</div>
                    @include('partials.errors')
                    <div class="panel-body"><p></p>
                        <form method="POST" action="{{ route('postPassword') }}" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="" class="col-sm-4">Password Actual</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="current_password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4">Password Nuevo</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4">Confirme password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control">Aceptar</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection