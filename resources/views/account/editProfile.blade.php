@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cambiar perfil</div>
                    <div class="panel-body">

                        @include('partials.errors')
                        @include('partials.success')

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('updateProfile') }}">

                        {{ csrf_field() }} <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"  > -->

                            {{ method_field('PUT') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" readonly value="{{ $user->first_name }}" class="form-control" name="first_name" >

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" readonly value="{{ $user->last_name }}" class="form-control" name="last_name" >

                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">User Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{ $user->username }}" class="form-control" name="username" required autofocus>

                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" readonly type="email" value="{{ $user->email }}" class="form-control" name="email" >

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Aceptar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
