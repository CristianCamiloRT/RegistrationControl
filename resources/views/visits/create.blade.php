<x-app-layout>
    <x-slot name="header">
        <x-slot name="pretitle">
            <div class="page-pretitle">
                {{ __('Visitantes') }}
            </div>
        </x-slot>
        <x-slot name="title">
            <h2 class="page-title">
                {{ __('Registrar') }}
            </h2>
        </x-slot>
        <x-slot name="buttons">
            <x-a :href="route('visits.index')" class="btn btn-primary">
                Volver
            </x-a>
        </x-slot>
    </x-slot>
    <div class="col-12">
        <form class="card" method="POST" action="{{ route('visits.store') }}" role="form">
            @csrf
            <div class="card-header">
                <h3 class="card-title">Registrar Visitante</h3>
            </div>
            <div class="card-body">
                <div class="row row-cards">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Nombre Visitante</x-label-form>
                            <x-input-form type="text" class="form-control" name="name" :isInvalid="$errors->has('name')" :value="old('name')"/>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Documento Visitante</x-label-form>
                            <x-input-form type="text" class="form-control" name="document" :isInvalid="$errors->has('document')" :value="old('document')"/>
                            @error('document')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
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
                    <div class="col-md-6">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Autorizado Por</x-label-form>
                            <x-input-form type="text" class="form-control" name="authorized_by" :isInvalid="$errors->has('authorized_by')" :value="old('authorized_by')"/>
                            @error('authorized_by')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
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
                    <div class="col-md-12">
						<div class="mb-3 mb-0">
                            <x-label-form class="form-label" :required="false">Observaciones</x-label-form>
							<x-textarea-form name="observations" rows="10" class="form-control" placeholder="Deje aquí las observaciones" :isInvalid="$errors->has('observations')">{{ old('observations') }}</x-textarea-form>
							@error('observations')
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
        document.querySelectorAll('input').forEach(function(input) {
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