<x-app-layout>
    <x-slot name="header">
        <x-slot name="pretitle">
            <div class="page-pretitle">
                {{ __('Roles') }}
            </div>
        </x-slot>
        <x-slot name="title">
            <h2 class="page-title">
                {{ __('Editar') }}
            </h2>
        </x-slot>
        <x-slot name="buttons">
            <x-a :href="route('roles.index')" class="btn btn-primary">
                Volver
            </x-a>
        </x-slot>
    </x-slot>
    <div class="col-12">
        <form class="card" method="POST" action="{{ route('roles.update', $role->id) }}" role="form">
            {{ method_field('PATCH') }}
            @csrf
            <div class="card-header">
                <h3 class="card-title">Editar Rol</h3>
            </div>
            <div class="card-body">
                <div class="row row-cards">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <x-label-form class="form-label" :required="true">Nombre Rol</x-label-form>
                            <x-input-form type="text" class="form-control" name="name" :isInvalid="$errors->has('name')" :value="old('name') ? old('name') : $role->name"/>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <x-button type="submit" class="btn btn-primary">
                    {{ __('Guardar') }}
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