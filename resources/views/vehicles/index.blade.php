<x-app-layout>
    <x-slot name="header">
		<x-slot name="pretitle">
			<div class="page-pretitle">
				{{ __('Vehiculos') }}
			</div>
		</x-slot>
		<x-slot name="title">
			<h2 class="page-title">
				{{ __('Panel') }}
			</h2>
		</x-slot>
		<x-slot name="buttons">
			<x-a :href="route('vehicles.create')" class="btn btn-primary">
				{{ __('Registrar Vehiculo') }}
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
			document.querySelectorAll('.btn-sucess').forEach((button) => {
				button.addEventListener('click', (event) => {
					var form = event.target.closest('form');
					event.preventDefault();
					Swal.fire({
						title: '¿Estas seguro de registrar la salida?',
						text: '¡No podrás revertir esto!',
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#d63939',
						cancelButtonColor: '#206bc4',
						confirmButtonText: 'Si, aceptar',
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
				<h3 class="card-title">Vehiculos Registrados</h3>
			</div>
			<div class="table-responsive">
				<table class="table card-table table-vcenter text-nowrap datatable">
					<thead>
						<tr>
							<th>Placa</th>
							<th>Marca</th>
                            <th>Interior</th>
                            <th>Apto</th>
							<th>Entrada</th>
							<th>Salida</th>
							<th>Minutos</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($vehicles as $vehicle)
							<tr>
								<td>{{ $vehicle->plate }}</td>
								<td>{{ $vehicle->brand }}</td>
								<td>{{ $vehicle->interior }}</td>
								<td>{{ $vehicle->house }}</td>
								<td>{{ $vehicle->entry_date }}</td>
								<td>{{ $vehicle->exit_date }}</td>
								<td>{{ $vehicle->minutes }}</td>
								<td class="text-end">
									<form action="{{ route('vehicles.exit', $vehicle->id) }}" method="POST">
										@csrf
										@method('POST')
										@if($vehicle->exit_date == null)
                                            <x-button type="submit" class="btn btn-outline-success btn-sucess">
                                                {{ __('Dar Salidar') }}
                                            </x-button>
										@endif
										<x-a :href="route('vehicles.show', $vehicle->id)" class="btn btn-outline-primary">
											{{ __('Ver Info') }}
										</x-a>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="card-footer d-flex align-items-center">
                {!! $vehicles->links() !!}
			</div>
		</div>
	</div>
</x-app-layout>