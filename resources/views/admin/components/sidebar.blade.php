<div class="sidebar">
    <div class="logo">

    </div>
    <div class="profile">
        <div class="p-2 px-3">
            <span class="fw-semibold">{{ session('name') ?? '' }}</span>
            <small class="fs-6 text-muted">{{ session('email') ?? '' }}</small>
        </div>
    </div>
    <div class="menu">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="{{ route('budgets.index') }}"
                    class="nav-link {{ Route::currentRouteName() === 'budgets.index' ? 'text-primary' : '' }}
                    d-flex justify-content-between align-items-center">
                    <small>Orçamentos</small>
                    <small class="badge bg-primary rounded-pill">14</small>
                </a>
            </li>

            <li class="list-group-item">
                <a href="" class="nav-link {{ str_contains(url()->current(), 'catalog') ? 'text-primary' : '' }}"
                    data-bs-toggle="collapse" data-bs-target="#menu-catalogo">Catálogo</a>
            </li>

            <div class="collapse {{ str_contains(url()->current(), 'catalog') ? 'show' : '' }} ps-2" id="menu-catalogo">
                <ul class="list-group my-2">
                    <li class="list-group-item bg-light">
                        <a href="{{ route('categories.index') }}"
                            class="nav-link {{ Route::currentRouteName() === 'categories.index' ? 'text-primary' : '' }}
                            d-flex justify-content-between align-items-center">
                            <small>Categorias</small>
                            @if (count(getCategories()) > 0)
                                <small class="badge bg-primary rounded-pill">{{ count(getCategories()) }}</small>
                            @endif
                        </a>
                    </li>
                    <li class="list-group-item bg-light">
                        <a href="{{ route('products.index') }}"
                            class="nav-link {{ Route::currentRouteName() === 'products.index' ? 'text-primary' : '' }}
                            d-flex justify-content-between align-items-center">
                            <small>Produtos</small>
                            @if (count(getAllProducts()) > 0)
                                <small class="badge bg-primary rounded-pill">{{ count(getAllProducts()) }}</small>
                            @endif
                        </a>
                    </li>
                </ul>
            </div>

            <li class="list-group-item">
                <a href="{{ route('clients.index') }}"
                    class="nav-link {{ Route::currentRouteName() === 'clients.index' ? 'text-primary' : '' }}
                    d-flex justify-content-between align-items-center">
                    <small>Clientes</small>
                    <small class="badge bg-primary rounded-pill">14</small></a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('messages.index') }}"
                    class="nav-link {{ Route::currentRouteName() === 'messages.index' ? 'text-primary' : '' }}
                    d-flex justify-content-between align-items-center">
                    <small>Mensagens</small>
                    @if (count(getMessagesNotRead()) > 0)
                        <small class="badge bg-primary rounded-pill">{{ count(getMessagesNotRead()) }}</small>
                    @endif
                </a>

            </li>
            <li class="list-group-item">
                <a href="{{ route('login.logout') }}" class="nav-link">Sair</a>
            </li>
        </ul>
    </div>
</div>
