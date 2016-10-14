@extends('admin.layouts.login_template')

@section('content')
<body class="hold-transition register-page">

    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Cambio de contraseña</p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form role="form" method="POST" action="{{ url('/password/email') }}">
                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Direccion de correo electrónico">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>  
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            <i class="fa fa-btn fa-envelope"></i> Enviar correo de contraseña
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
