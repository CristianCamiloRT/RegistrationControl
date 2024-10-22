<x-guest-layout>
    <script>
		document.addEventListener('DOMContentLoaded', function(event) {
			@if (session('status'))
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
					title: "{{ session('status') }}"
				});
			@endif
		});
	</script>
    <h2 class="h3 text-center mb-5">
        Ingresa a tu cuenta
    </h2>
    <form action="{{ route('login') }}" method="POST" autocomplete="off" novalidate>
        @csrf
        <div class="mb-3">
            <label class="form-label">{{ __('Email') }}</label>
            <x-input-form id="email" name="email" :value="old('email')" :isInvalid="$errors->has('email')" type="email" class="form-control" placeholder="tucorreo@email.com" required autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="invalid-feedback" />
        </div>
        <div class="mb-2">
            <label class="form-label">
                {{ __('Password') }}
                <span class="form-label-description">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                    @endif
                </span>
            </label>
            <div class="input-group input-group-flat">
                <x-input-form id="password" name="password" type="password" class="form-control" :isInvalid="$errors->has('password')" placeholder="Tu contraseña" required autocomplete="current-password" onclick="quitClass()"/>
                <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                        </svg>
                    </a>
                </span>
            </div>
            <x-input-error :messages="$errors->get('password')" class="invalid-feedback"/>
        </div>
        <div class="mb-2">
            <label class="form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember"/>
                <span class="form-check-label">{{ __('Remember me') }}</span>
            </label>
        </div>
        <div class="form-footer">
            <x-button type="submit" class="btn btn-primary w-100">
                {{ __('Log in') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>