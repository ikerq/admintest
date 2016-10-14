@extends('admin.layouts.login_template')

@section('content')
<body class="hold-transition register-page">

  <div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Registrarse en el sistema</p>

      <form action="{{ url('/register') }}" method="POST" role="form">
      	{!! csrf_field() !!}

        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} has-feedback">
          <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="Nombre">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          @if ($errors->has('first_name'))
              <span class="help-block">
                  <strong>{{ $errors->first('first_name') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} has-feedback">
          <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Apellido">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          @if ($errors->has('last_name'))
              <span class="help-block">
                  <strong>{{ $errors->first('last_name') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
          <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Contraseña">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
          <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          @if ($errors->has('password_confirmation'))
              <span class="help-block">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
              </span>
          @endif
        </div>
        
        <div class="row">
          <!-- <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-xs-6 col-xs-offset-3">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->
  <!-- _endsection -->
@endsection