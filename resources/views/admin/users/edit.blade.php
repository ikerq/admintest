@extends('admin.layouts.template')

@section('title')
	<h4>
		<i class="fa fa-group"></i>
		Registro de Usuarios
		<small>{{ $page_description or null }}</small>
	</h4>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="box box-default">
				<div class="box-body">		
					{!! Form::open(['url' => 'admin/users/store', 'method' => 'post']) !!}
                    {!! Form::hidden('action', $action) !!}
                    {!! Form::hidden('id', isset($user->id)? $user->id : null) !!}
					<div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
						{!! Form::label('first_name', 'Nombre') !!}
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            {!! Form::text('first_name', isset($user->first_name)? $user->first_name : null , ['class' => 'form-control']) !!}
                        </div>
                        @if ($errors->has('first_name'))
                            <span class='help-block'>
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
						{!! Form::label('last_name', 'Apellido') !!}
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            {!! Form::text('last_name', isset($user->last_name)? $user->last_name : null, ['class' => 'form-control']) !!}
                        </div>
                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
					</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('birth_date') ? ' has-error' : '' }}">
                                {!! Form::label('birth_date', 'Fecha de nacimiento') !!}
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {!! Form::text('birth_date', isset($user->birth_date)? $user->birth_date : null, ['class' =>'form-control']) !!}
                                </div>
                                @if ($errors->has('birth_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('Sexo:') !!}
                                <div class="row">
                                    <div class="col-md-12" style="padding-top:5px;">
                                        <label style="margin-left:5px;">
                                            M
                                            <input type="radio" name="sex" class="iCheck" value="1" {{ (isset($user->sex) && $user->sex == 1)? 'checked' : 'checked' }}>
                                        </label>
                                        <label style="margin-left:3px;">
                                            F
                                            <input type="radio" name="sex" class="iCheck" value="2" {{ (isset($user->sex) && $user->sex == 2)? 'checked' : '' }}>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
						{!! Form::label('email', 'E-mail') !!}
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            {!! Form::text('email', isset($user->email)? $user->email : null, ['class' => 'form-control']) !!}
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
					</div>
                    <div class="row">
                        <div class="col-md-6"> 
                            <div class="form-group">                       
                                {!! Form::label('cellphone', 'Celular') !!}
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-mobile"></i>
                                    </div>
                                    {!! Form::text('cellphone', isset($user->cellphone)? $user->cellphone : null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">       
                                {!! Form::label('localphone', 'Teléfono Local') !!}
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    {!! Form::text('localphone', isset($user->localphone)? $user->localphone : null, ['class' => 'form-control']) !!}
                                </div>                        
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('profile', 'Perfil de  Usuario') !!}
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-sitemap"></i>
                                    </div>
                                    {!! Form::select('profile', $profiles, isset($user->id_profile)? $user->id_profile : '2', ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">      
                            <div class="form-group">                          
                                {!! Form::label('Estado:') !!}
                                <div class="row">
                                    <div class="col-md-12" style="padding-top:5px">
                                        <label style="margin-left:5px;">
                                            Activo
                                            <input type="radio" name="active" class="iCheck" value="1" {{ (isset($user->active) && $user->active == 1)? 'checked' : 'checked' }}>
                                        </label>
                                        <label style="margin-left:3px;">
                                            Inactivo
                                            <input type="radio" name="active" class="iCheck" value="0" {{ (isset($user->active) && $user->active == 0)? 'checked' : '' }}>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
						{!! Form::submit('Guardar',['class' => 'btn btn-success btn-flat']) !!}
					</div>
					{!! Form::close() !!}
				</div>			
			</div>			
		</div>
	</div>

	<!--<div class="row">
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="box box-default">
				<div class="box-body">	
    				<div class="container">
            			<div class="row"    >
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Dropzone
                                </div>
                                <div class="panel-body">
                                  {!! Form::open(['url'=> 'file.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                                    <div class="dz-message" style="height:200px;">
                                      Drop your files here
                                    </div>
                                    <div class="dropzone-previews"></div>
                                    <button type="submit" class="btn btn-success" id="submit">Save</button>
                                  {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div> -->
@endsection


@section('scripts-content')
    <script>
    $(function(){

        $('.iCheck').iCheck({
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

        //Datemask dd/mm/yyyy
        $('#birth_date').inputmask({"alias": "dd/mm/yyyy"});
        $('#cellphone').inputmask({"mask": "+569 99 99 99 99"});
        $('#localphone').inputmask({"mask": "+569 99 99 99 99"});

    });

    </script>
@endsection