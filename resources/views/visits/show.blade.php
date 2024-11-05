<x-app-layout>
    <x-slot name="header">
        <x-slot name="pretitle">
            <div class="page-pretitle">
                {{ __('Visitantes') }}
            </div>
        </x-slot>
        <x-slot name="title">
            <h2 class="page-title">
                {{ __('Ver Información') }}
            </h2>
        </x-slot>
        <x-slot name="buttons">
            <x-a :href="route('visits.index')" class="btn btn-primary">
                Volver
            </x-a>
        </x-slot>
    </x-slot>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Información de Visitante</h3>
            </div>
            <div class="card-body">
                <div class="row row-cards">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <x-label-form class="form-label">Nombre Visitante</x-label-form>
                            <x-input-form type="text" class="form-control" :value="$visit->name" readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <x-label-form class="form-label">Documento Visitante</x-label-form>
                            <x-input-form type="text" class="form-control" :value="$visit->document" readonly/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label">Interior</x-label-form>
                            <x-input-form type="number" class="form-control" :value="$visit->interior" readonly/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label">Apto - Casa</x-label-form>
                            <x-input-form type="number" class="form-control" :value="$visit->house" readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <x-label-form class="form-label">Autorizado Por</x-label-form>
                            <x-input-form type="text" class="form-control" :value="$visit->authorized_by" readonly/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label">Fecha-Hora Entrada</x-label-form>
                            <x-input-form type="datetime-local" class="form-control" :value="$visit->entry_date" readonly/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <x-label-form class="form-label">Fecha-Hora Salida</x-label-form>
                            @if($visit->exit_date)
                                <x-input-form type="datetime-local" class="form-control" :value="$visit->exit_date" readonly/>
                            @else
                                <x-input-form type="text" class="form-control" value="NO SE REGISTRA HORA DE SALIDA" readonly/>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 mb-0">
                            <x-label-form class="form-label" :required="false">Observaciones</x-label-form>
                            <x-textarea-form rows="10" class="form-control" placeholder="Deje aquí las observaciones"> {{ $visit->observations }}</x-textarea-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>