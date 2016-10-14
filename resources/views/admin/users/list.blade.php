
@section('title')
	<h4>
		<i class="fa fa-group"></i>
		Usuarios
		<small>{{ $page_description or null }}</small>
	</h4>
@endsection

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Listado</h3>
				<div class="box-tools">
					<div class="input-group input-group-sm" style="width: 150px;">
						<input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-default" title="Buscar usuario" alt="Buscar usuario"><i class="fa fa-search"></i></button>
							<button id="userRegister"class="btn btn-success" title="Nuevo usuario" alt="Nuevo usuario"><i class="fa fa-plus-square"></i></button>
						</div>
					</div>
				</div>
			</div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
			<table class="table table-condensed table-hover">
				<tbody>
					<tr>
						<th>Nombre y Apellido</th>
						<th>Email</th>
						<th>Perfil</th>
						<th>Estado</th>
						<th></th>
					</tr>
			        @foreach ($users as $user)
		            <tr data-id="{{ $user->id }}" 
	            		data-user-object = "{{ $user }}"
	            		data-profile-object = "{{ $user->profile }}">
				        <td>{{ $user->name }}</td>
				        <td>{{ $user->email }}</td>
				        <td>{{ $user->profile->name }}</td>
				        <td>{!! $user->activelabel !!}</td>
						<td>
							<button class="btn btn-sm btn-primary btn-row" data-btn="view" title="Ver usuario" alt="Ver usuario"><i class="fa fa-search"></i></button>
							<button class="btn btn-sm btn-success btn-row" data-btn="edit" title="Editar usuario" alt="Editar usuario"><i class="fa fa-edit"></i></button>
							<button class="btn btn-sm btn-danger btn-row" data-btn="delete" title="Borrar usuario" alt="Borrar usuario"><i class="fa fa-trash"></i></button>
						</td>
			        </tr>
		    	    @endforeach
	          	</tbody>
			</table>
			<div class="box-footer clearfix">
				{!! $users->render() !!}
			</div>
		</div>
	<!-- /.box-body -->
	</div>
<!-- /.box -->
	</div>
</div>

<!-- Seccion de formularios ocultos -->
{!! Form::open(['url' => ['admin.users.view','USER_ID'], 'method' => 'post', 'id' => 'form-view']) !!}
{!! Form::close() !!}

<div class="modal fade" id="userDetails" tabindex="-1" role="dialog" aria-labelledby="modalUserDetails">
	<div class="modal-dialog modal-md">
		<div class="modal-content" style="background-color:transparent;">
				<div class="box box-widget widget-user">
					<div class="widget-user-header bg-aqua-active">
						<h3 class="widget-user-username" id="userName"></h3>
						<h3 class="widget-user-desc" id="userProfile"></h3>
					</div>
					<div class="widget-user-image">
						<img class="img-circle" src="http://admin.test.com/bower_resources/AdminLTE/dist/img/user2-160x160.jpg"/>
					</div>
					<div class="box-footer">
						<ul class="nav nav-stacked">
							<li><a href="#">
								Fecha de nacimiento
								<span class="pull-right" id="userBirthDate"></span></a>
							</li>
							<li><a href="#">
								E-mail
								<span class="pull-right" id="userEmail"></span></a>
							</li>
							<li><a href="#">
								Celular
								<span class="pull-right" id="userCellphone"></span></a>
							</li>
							<li><a href="#">
								Teléfono local
								<span class="pull-right" id="userLocalphone"></span></a>
							</li>
						</ul>
					</div>
				</div>
		</div>
	</div>
</div>
<div class="modal fade" id="userDelete" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fa fa-warning"></i> Alerta!</h4>
			</div>
			<div class="modal-body">
				<p>¿Está seguro de eliminar este usuario?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="confirmDeleteUser">Aceptar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	var rowUserList = '';

	$(document).ready(function(){

		$('.btn-row').click(function(){

			rowUserList = $(this).parents('tr');
			var btnRow = $(this).data('btn');
			var id = rowUserList.data('id');

			switch (btnRow){
				case 'view':
					viewUser(id);
				break;
				case 'edit':
					window.location.href = 'users/edit/' + id;
				break;
				case 'delete':
					deleteUser('confirm');
				break;
			}
		});

		$('#userRegister').on('click',function(){
			window.location.href = 'users/edit';
		});

		$('#confirmDeleteUser').on('click',function(){
			deleteUser('positive');
		});
	});

	function viewUser(id)
	{
		var rowUserObject = rowUserList.data('userObject');
		var rowProfileObject = rowUserList.data('profileObject');

		$('#userName').html(rowUserObject.first_name + ' ' +rowUserObject.last_name);
		$('#userProfile').html(rowProfileObject.name);
		$('#userBirthDate').html(rowUserObject.birth_date);
		$('#userEmail').html(rowUserObject.email);
		$('#userCellphone').html(rowUserObject.cellphone);
		$('#userLocalphone').html(rowUserObject.localphone);
		$("#userDetails").modal('toggle');
	};
	
	function deleteUser(action)
	{
		switch (action)
		{
			case 'confirm':
				$("#userDelete").modal('toggle');	
			break;
			case 'positive':
				var id = rowUserList.data('id');
				$.get('users/delete/' + id, function(response){
					$("#userDelete").modal('toggle');
					rowUserList.fadeOut();
				});
				
			break;
		}
	};

</script>
@endsection