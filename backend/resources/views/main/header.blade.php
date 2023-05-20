<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-dark">Тесты</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Мои тесты</a></li>
                @if(auth()->user()->role == 1)
                    <li><a href="#" class="nav-link px-2 link-dark">Админитраторская</a></li>
                @endif
            </ul>

            <div class="dropdown text-end">
                <div class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{\auth()->user()->name }}
                </div>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                    <li><a class="dropdown-item" href="#">Создать новый тест</a></li>
                    <li><a class="dropdown-item" href="{{route('mainProfile.index')}}">Профиль</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary mx-3">
                                {{ __('Выход') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
