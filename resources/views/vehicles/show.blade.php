<x-app-layout>
    <x-slot name="header">
        <x-slot name="pretitle">
            <div class="page-pretitle">
                {{ __('Vehiculos') }}
            </div>
        </x-slot>
        <x-slot name="title">
            <h2 class="page-title">
                {{ __('Ver Información') }}
            </h2>
        </x-slot>
        <x-slot name="buttons">
            <x-a :href="route('vehicles.index')" class="btn btn-primary">
                Volver
            </x-a>
        </x-slot>
    </x-slot>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Información del Vehiculo</h3>
            </div>
            <div class="card-body">
                <div class="row row-cards">
                    <div class="card-header">
                        <h3 class="card-title" style="color: #307fdd;">Fechas - Horas</h3>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label">Fecha-Hora Entrada</x-label-form>
                            <x-input-form type="datetime-local" class="form-control" :value="$vehicle->entry_date" readonly/>
                        </div>
                    </div>
                    @if($vehicle->exit_date)
                        <div class="col-md-3">
                            <div class="mb-3">
                                <x-label-form class="form-label">Fecha-Hora Salida</x-label-form>
                                <x-input-form type="datetime-local" class="form-control" :value="$vehicle->exit_date" readonly/>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <x-label-form class="form-label">Minutos en conjunto</x-label-form>
                                <x-input-form type="number" class="form-control"  :value="$vehicle->minutes" readonly/>
                            </div>
                        </div>
                    @endif
                    <div class="card-header">
                        <h3 class="card-title" style="color: #307fdd;">Información</h3>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label">Interior</x-label-form>
                            <x-input-form type="number" class="form-control" :value="$vehicle->interior" readonly/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label">Apto - Casa</x-label-form>
                            <x-input-form type="number" class="form-control" :value="$vehicle->house" readonly/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label">Placa</x-label-form>
                            <x-input-form type="text" class="form-control" :value="$vehicle->plate" maxlength="8" style="text-transform: uppercase;" readonly/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label">Marca</x-label-form>
                            <x-input-form type="text" class="form-control" :value="$vehicle->brand" readonly/>
                        </div>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title" style="color: #307fdd;">Estado General</h3>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label">Lateral Izq.</x-label-form>
                            <x-select-input class="form-select" :selected="$vehicle->left_state" :options="collect(['Bueno' => 'Bueno', 'Regular' => 'Regular', 'Malo' => 'Malo'])->prepend('Seleccione un opción', '')" disabled/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label">Lateral Der.</x-label-form>
                            <x-select-input class="form-select" :selected="$vehicle->right_state" :options="collect(['Bueno' => 'Bueno', 'Regular' => 'Regular', 'Malo' => 'Malo'])->prepend('Seleccione un opción', '')" disabled/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label">Anterior</x-label-form>
                            <x-select-input class="form-select" :selected="$vehicle->back_state" :options="collect(['Bueno' => 'Bueno', 'Regular' => 'Regular', 'Malo' => 'Malo'])->prepend('Seleccione un opción', '')" disabled/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label">Posterior</x-label-form>
                            <x-select-input class="form-select" :selected="$vehicle->front_state" :options="collect(['Bueno' => 'Bueno', 'Regular' => 'Regular', 'Malo' => 'Malo'])->prepend('Seleccione un opción', '')" disabled/>
                        </div>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title" style="color: #307fdd;">Observaciones</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 mb-0">
                            <x-textarea-form  rows="10" class="form-control" placeholder="Deje aquí las observaciones" :isInvalid="$errors->has('observations')" readonly>{{ $vehicle->observations }}</x-textarea-form>
                        </div>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title" style="color: #307fdd;">Radio - Elementos Varios</h3>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <x-label-form class="form-label">Radio (Antena)</x-label-form>
                            <x-select-input class="form-select" :selected="$vehicle->antenna" :options="collect(['1' => 'Si', '0' => 'No'])->prepend('Seleccione un opción', '')" disabled/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <x-label-form class="form-label">Radio (Frontal)</x-label-form>
                            <x-select-input class="form-select" :selected="$vehicle->frontal" :options="collect(['1' => 'Si', '0' => 'No'])->prepend('Seleccione un opción', '')" disabled/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <x-label-form class="form-label">Repuesto</x-label-form>
                            <x-select-input class="form-select" :selected="$vehicle->spare_parts" :options="collect(['1' => 'Si', '0' => 'No'])->prepend('Seleccione un opción', '')" disabled/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <x-label-form class="form-label">Espejos</x-label-form>
                            <x-select-input class="form-select" :selected="$vehicle->mirrors" :options="collect(['1' => 'Si', '0' => 'No'])->prepend('Seleccione un opción', '')" disabled/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <x-label-form class="form-label">Farolas</x-label-form>
                            <x-select-input class="form-select" :selected="$vehicle->lights" :options="collect(['1' => 'Si', '0' => 'No'])->prepend('Seleccione un opción', '')" disabled/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <x-label-form class="form-label">Stops</x-label-form>
                            <x-select-input class="form-select" :selected="$vehicle->stops" :options="collect(['1' => 'Si', '0' => 'No'])->prepend('Seleccione un opción', '')" disabled/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mb-3">
                            <x-label-form class="form-label">Vidrios</x-label-form>
                            <x-select-input class="form-select" :selected="$vehicle->glasses" :options="collect(['1' => 'Si', '0' => 'No'])->prepend('Seleccione un opción', '')" disabled/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>