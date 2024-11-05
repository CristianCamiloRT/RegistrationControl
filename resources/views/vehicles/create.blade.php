<x-app-layout>
    <x-slot name="header">
        <x-slot name="pretitle">
            <div class="page-pretitle">
                {{ __('Vehiculos') }}
            </div>
        </x-slot>
        <x-slot name="title">
            <h2 class="page-title">
                {{ __('Registrar') }}
            </h2>
        </x-slot>
        <x-slot name="buttons">
            <x-a :href="route('vehicles.index')" class="btn btn-primary">
                Volver
            </x-a>
        </x-slot>
    </x-slot>
    <div class="col-12">
        <form class="card" method="POST" action="{{ route('vehicles.store') }}" role="form">
            @csrf
            <div class="card-header">
                <h3 class="card-title">Registrar Vehiculo</h3>
            </div>
            <div class="card-body">
                <div class="row row-cards">
                    <div class="card-header">
                        <h3 class="card-title" style="color: #307fdd;">Fechas - Horas</h3>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Fecha-Hora Entrada</x-label-form>
                            <x-input-form type="datetime-local" class="form-control" name="entry_date" :isInvalid="$errors->has('entry_date')" :value="old('entry_date', now()->format('Y-m-d\TH:i'))" readonly/>
                            @error('entry_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title" style="color: #307fdd;">Información</h3>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Interior</x-label-form>
                            <x-input-form type="number" class="form-control" name="interior" :isInvalid="$errors->has('interior')" :value="old('interior')"/>
                            @error('interior')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Apto - Casa</x-label-form>
                            <x-input-form type="number" class="form-control" name="house" :isInvalid="$errors->has('house')" :value="old('house')"/>
                            @error('house')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Placa</x-label-form>
                            <x-input-form type="text" class="form-control" name="plate" :isInvalid="$errors->has('plate')" :value="old('plate')" maxlength="8" style="text-transform: uppercase;"/>
                            @error('plate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Marca</x-label-form>
                            <x-input-form type="text" class="form-control" name="brand" :isInvalid="$errors->has('brand')" :value="old('brand')"/>
                            @error('brand')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title" style="color: #307fdd;">Estado General</h3>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Lateral Izq.</x-label-form>
                            <x-select-input class="form-select" name="left_state" :isInvalid="$errors->has('left_state')" :selected="old('left_state')" :options="collect(['Bueno' => 'Bueno', 'Regular' => 'Regular', 'Malo' => 'Malo'])->prepend('Seleccione un opción', '')" />
                            @error('left_state')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Lateral Der.</x-label-form>
                            <x-select-input class="form-select" name="right_state" :isInvalid="$errors->has('right_state')" :selected="old('right_state')" :options="collect(['Bueno' => 'Bueno', 'Regular' => 'Regular', 'Malo' => 'Malo'])->prepend('Seleccione un opción', '')" />
                            @error('right_state')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Anterior</x-label-form>
                            <x-select-input class="form-select" name="back_state" :isInvalid="$errors->has('back_state')" :selected="old('back_state')" :options="collect(['Bueno' => 'Bueno', 'Regular' => 'Regular', 'Malo' => 'Malo'])->prepend('Seleccione un opción', '')" />
                            @error('back_state')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Posterior</x-label-form>
                            <x-select-input class="form-select" name="front_state" :isInvalid="$errors->has('front_state')" :selected="old('front_state')" :options="collect(['Bueno' => 'Bueno', 'Regular' => 'Regular', 'Malo' => 'Malo'])->prepend('Seleccione un opción', '')" />
                            @error('front_state')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title" style="color: #307fdd;">Observaciones</h3>
                    </div>
                    <div class="col-md-12">
						<div class="mb-3 mb-0">
							<x-textarea-form name="observations" rows="10" class="form-control" placeholder="Deje aquí las observaciones" :isInvalid="$errors->has('observations')">{{ old('observations') }}</x-textarea-form>
							@error('observations')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
						</div>
					</div>
                    <div class="card-header">
                        <h3 class="card-title" style="color: #307fdd;">Radio - Elementos Varios</h3>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Radio (Antena)</x-label-form>
                            <x-select-input class="form-select" name="antenna" :isInvalid="$errors->has('antenna')" :selected="old('antenna')" :options="collect(['1' => 'Si', '0' => 'No'])->prepend('Seleccione un opción', '')" />
                            @error('antenna')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Radio (Frontal)</x-label-form>
                            <x-select-input class="form-select" name="frontal" :isInvalid="$errors->has('frontal')" :selected="old('frontal')" :options="collect(['1' => 'Si', '0' => 'No'])->prepend('Seleccione un opción', '')" />
                            @error('frontal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Repuesto</x-label-form>
                            <x-select-input class="form-select" name="spare_parts" :isInvalid="$errors->has('spare_parts')" :selected="old('spare_parts')" :options="collect(['1' => 'Si', '0' => 'No'])->prepend('Seleccione un opción', '')" />
                            @error('spare_parts')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Espejos</x-label-form>
                            <x-select-input class="form-select" name="mirrors" :isInvalid="$errors->has('mirrors')" :selected="old('mirrors')" :options="collect(['1' => 'Si', '0' => 'No'])->prepend('Seleccione un opción', '')" />
                            @error('mirrors')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Farolas</x-label-form>
                            <x-select-input class="form-select" name="lights" :isInvalid="$errors->has('lights')" :selected="old('lights')" :options="collect(['1' => 'Si', '0' => 'No'])->prepend('Seleccione un opción', '')" />
                            @error('lights')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Stops</x-label-form>
                            <x-select-input class="form-select" name="stops" :isInvalid="$errors->has('stops')" :selected="old('stops')" :options="collect(['1' => 'Si', '0' => 'No'])->prepend('Seleccione un opción', '')" />
                            @error('stops')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Vidrios</x-label-form>
                            <x-select-input class="form-select" name="glasses" :isInvalid="$errors->has('glasses')" :selected="old('glasses')" :options="collect(['1' => 'Si', '0' => 'No'])->prepend('Seleccione un opción', '')" />
                            @error('glasses')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <x-button type="submit" class="btn btn-primary">
                    {{ __('Crear') }}
                </x-button>
            </div>
        </form>
    </div>
    <script>
        document.querySelectorAll('input, select').forEach(function(input) {
            input.addEventListener('focus', function() {
                this.classList.remove('is-invalid');
                let feedback = this.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                    feedback.remove();
                }
            });
        });
    </script>
</x-app-layout>