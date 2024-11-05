<x-app-layout>
    <x-slot name="header">
		<x-slot name="pretitle">
			<div class="page-pretitle">
				{{ __('Visitantes') }}
			</div>
		</x-slot>
		<x-slot name="title">
			<h2 class="page-title">
				{{ __('Panel') }}
			</h2>
		</x-slot>
		<x-slot name="buttons">
			<x-a :href="route('visits.create')" class="btn btn-primary">
				{{ __('Registrar Visitante') }}
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
						title: '¿Estas seguro de eliminar el registro?',
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
				<h3 class="card-title">Visitantes Creados</h3>
			</div>
			<div class="table-responsive">
				<table class="table card-table table-vcenter text-nowrap datatable">
					<thead>
						<tr>
							<th>Visitante</th>
							<th>Documento</th>
                            <th>Interior</th>
                            <th>Apto</th>
							<th>Entrada</th>
							<th>Salida</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($visits as $visit)
							<tr>
								<td>{{ $visit->name }}</td>
								<td>{{ $visit->document }}</td>
								<td>{{ $visit->interior }}</td>
								<td>{{ $visit->house }}</td>
								<td>{{ $visit->entry_date }}</td>
								<td>{{ $visit->exit_date }}</td>
								<td class="text-end">
									<form action="{{ route('visits.exit', $visit->id) }}" method="POST">
										@csrf
										@method('POST')
										@if($visit->exit_date == null)
                                            <x-button type="submit" class="btn btn-outline-success btn-sucess">
                                                {{ __('Dar Salidar') }}
                                            </x-button>
										@endif
										<x-a :href="route('visits.show', $visit->id)" class="btn btn-outline-primary">
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
                {!! $visits->links() !!}
			</div>
		</div>
	</div>
</x-app-layout>