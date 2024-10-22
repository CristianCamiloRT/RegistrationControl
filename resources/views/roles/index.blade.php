<x-app-layout>
    <x-slot name="header">
		<x-slot name="pretitle">
			<div class="page-pretitle">
				{{ __('Roles') }}
			</div>
		</x-slot>
		<x-slot name="title">
			<h2 class="page-title">
				{{ __('Panel') }}
			</h2>
		</x-slot>
		<x-slot name="buttons">
			<x-a :href="route('roles.create')" class="btn btn-primary">
				{{ __('Crear Rol') }}
			</x-a>
		</x-slot>
	</x-slot>
	<script>
		document.addEventListener('DOMContentLoaded', function(event) {
			@if ($message = Session::get('success'))
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000,
					timerProgressBar: true,
					didOpen: (toast) => {
						toast.onmouseenter = Swal.stopTimer;
						toast.onmouseleave = Swal.resumeTimer;
					}
				});
				Toast.fire({
					icon: 'success',
					title: '{{ $message }}'
				});
			@endif

            @if ($message = Session::get('failed'))
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000,
					timerProgressBar: true,
					didOpen: (toast) => {
						toast.onmouseenter = Swal.stopTimer;
						toast.onmouseleave = Swal.resumeTimer;
					}
				});
				Toast.fire({
					icon: 'error',
					title: '{{ $message }}'
				});
			@endif

			document.querySelectorAll('.btn-delete').forEach((button) => {
				button.addEventListener('click', (event) => {
					var form = event.target.closest('form');
					event.preventDefault();
					Swal.fire({
						title: '¿Estas seguro de eliminar el Rol?',
						text: '¡No podrás revertir esto!',
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#d63939',
						cancelButtonColor: '#206bc4',
						confirmButtonText: 'Si, eliminar',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							form.submit();
						}
					});
				});
			});
		});
	</script>
    <div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Roles Creados</h3>
			</div>
			<div class="table-responsive">
				<table class="table card-table table-vcenter text-nowrap datatable">
					<thead>
						<tr>
							<th>Nombre</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($roles as $role)
							<tr>
								<td>{{ $role->name }}</td>
								<td class="text-end">
									<form action="{{ route('roles.destroy', $role->id) }}" method="POST">
										<x-a :href="route('roles.edit', $role->id)" class="btn btn-outline-primary">
											{{ __('Editar') }}
										</x-a>
										@csrf
										@method('DELETE')
										<x-button type="submit" class="btn btn-outline-danger btn-delete">
											{{ __('Eliminar') }}
										</x-button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="card-footer d-flex align-items-center">
                {!! $roles->links() !!}
			</div>
		</div>
	</div>
</x-app-layout>