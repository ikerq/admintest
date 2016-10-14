@extends('admin.layouts.login_template')

@section('content')
<body class="hold-transition login-page">

  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Ingrese sus datos para iniciar sessión</p>

    <form action="{{ url('/login') }}" method="POST" role="form">
      {!! csrf_field() !!}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
          <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Correo o Usuario">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
          <input class="form-control" type="password" name="password" placeholder="Contraseña">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>

        <div class="row">
          <div class="col-xs-7">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Recordar mis datos
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-5">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <a href="{{ url('/password/reset') }}">He olvidado mi contraseña</a><br>
      <a href="{{ url('register') }}" class="text-center">Registrarse</a>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

@endsection
