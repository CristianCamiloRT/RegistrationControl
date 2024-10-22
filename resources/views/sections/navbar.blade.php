<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/img/logo.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex me-2">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Habilitar modo oscuro" data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <i class="ti ti-moon icon"></i>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Habilitar modo claro" data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <i class="ti ti-sun-high icon"></i>
                </a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url({{ asset('assets/img/avatar.png') }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->name . ' ' . Auth::user()->lastname }}</div>
                        <div class="mt-1 small text-muted">
                            {{ Auth::user()->name }}
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">{{ __('Perfil') }}</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-a class="dropdown-item" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <x-nav-item :active="request()->routeIs('dashboard')">
                        <x-nav-link :href="route('dashboard')" class="nav-link" :icon="'ti ti-home icon'">
                            Home
                        </x-nav-link>
                    </x-nav-item>
                    <x-nav-item :active="request()->routeIs('roles.*')">
                        <x-nav-link :href="route('roles.index')" class="nav-link" :icon="'ti ti-user-shield icon'">
                            Roles
                        </x-nav-link>
                    </x-nav-item>
                </ul>
            </div>
        </div>
    </div>
</header>
