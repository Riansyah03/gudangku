<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="/" class="navbar-brand navbar-brand-autodark">
            <h3 class="font-weight-bold">FJBC</h3>
        </a>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url({{ Auth::user()->avatar }})"></span>
                    <div class="d-none d-xl-block pl-2">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="mt-1 small text-muted">{{ Auth::user()->email }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <path d="M7 6a7.75 7.75 0 1 0 10 0"></path>
                            <line x1="12" y1="4" x2="12" y2="12"></line>
                        </svg>
                        Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
                <div class="hr-text hr-text-left ml-2 mb-2 mt-2">Dashboard</div>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('backoffice.dashboard') ? 'active' : '' }}"
                        href="{{ route('backoffice.dashboard') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-tabler"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8 9l3 3l-3 3"></path>
                                <line x1="13" y1="15" x2="16" y2="15"></line>
                                <rect x="4" y="4" width="16" height="16" rx="4"></rect>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Dashboard
                        </span>
                    </a>
                </li>
                @role('admin')
                    <div class="hr-text hr-text-left ml-2 mb-2 mt-2">Master Data</div>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('backoffice.category*') ? 'active' : '' }}"
                            href="{{ route('backoffice.category.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 4h6v6h-6z"></path>
                                    <path d="M4 14h6v6h-6z"></path>
                                    <circle cx="17" cy="17" r="3"></circle>
                                    <circle cx="7" cy="7" r="3"></circle>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Kategori
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('backoffice.supplier*') ? 'active' : '' }}"
                            href="{{ route('backoffice.supplier.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-truck-delivery" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="7" cy="17" r="2"></circle>
                                    <circle cx="17" cy="17" r="2"></circle>
                                    <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                                    <line x1="3" y1="9" x2="7" y2="9"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Supplier
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('backoffice.product*') ? 'active' : '' }}"
                            href="{{ route('backoffice.product.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                                    <path d="M4 6v6a8 3 0 0 0 16 0v-6"></path>
                                    <path d="M4 12v6a8 3 0 0 0 16 0v-6"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Produk
                            </span>
                        </a>
                    </li>
                @endrole
                @role('admin')
                    <div class="hr-text hr-text-left ml-2 mb-2 mt-2">Management Stok</div>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('backoffice.stock*') ? 'active' : '' }}"
                            href="{{ route('backoffice.stock.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-database-import" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                                    <path d="M4 6v8m5.009 .783c.924 .14 1.933 .217 2.991 .217c4.418 0 8 -1.343 8 -3v-6">
                                    </path>
                                    <path
                                        d="M11.252 20.987c.246 .009 .496 .013 .748 .013c4.418 0 8 -1.343 8 -3v-6m-18 7h7m-3 -3l3 3l-3 3">
                                    </path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Stok
                            </span>
                        </a>
                    </li>
                @endrole
                <div class="hr-text hr-text-left ml-2 mb-2 mt-2">Permintaan Produk</div>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('backoffice.transaction*') ? 'active' : '' }}"
                        href="{{ route('backoffice.transaction') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-database-export" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
                                <path d="M4 6v6c0 1.657 3.582 3 8 3a19.84 19.84 0 0 0 3.302 -.267m4.698 -2.733v-6">
                                </path>
                                <path
                                    d="M4 12v6c0 1.599 3.335 2.905 7.538 2.995m8.462 -6.995v-2m-6 7h7m-3 -3l3 3l-3 3">
                                </path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            {{ Auth::user()->hasRole('admin') ? 'Produk Keluar' : 'Transaksi' }}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('backoffice.order*') ? 'active' : '' }}"
                        href="{{ route('backoffice.order.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-database"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <ellipse cx="12" cy="12.75" rx="4" ry="1.75"></ellipse>
                                <path d="M8 12.5v3.75c0 .966 1.79 1.75 4 1.75s4 -.784 4 -1.75v-3.75"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                </path>
                            </svg>
                        </span>
                        <span class="nav-link-title">
                            Permintaan Produk
                        </span>
                    </a>
                </li>
                @role('admin')
                    <div class="hr-text hr-text-left ml-2 mb-2 mt-2">Management User</div>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('backoffice.permission*') ? 'active' : '' }}"
                            href="{{ route('backoffice.permission.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-search"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h1"></path>
                                    <circle cx="16.5" cy="17.5" r="2.5"></circle>
                                    <path d="M18.5 19.5l2.5 2.5"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Permission
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('backoffice.role*') ? 'active' : '' }}"
                            href="{{ route('backoffice.role.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M16 11l2 2l4 -4"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Role
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('backoffice.user*') ? 'active' : '' }}"
                            href="{{ route('backoffice.user.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <circle cx="12" cy="10" r="3"></circle>
                                    <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                User
                            </span>
                        </a>
                    </li>
                    <div class="hr-text hr-text-left ml-2 mb-2 mt-2">Laporan</div>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('backoffice.report*') ? 'active' : '' }}"
                            href="{{ route('backoffice.report.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path>
                                    <path d="M18 14v4h4"></path>
                                    <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2"></path>
                                    <rect x="8" y="3" width="6" height="4" rx="2">
                                    </rect>
                                    <circle cx="18" cy="18" r="4"></circle>
                                    <path d="M8 11h4"></path>
                                    <path d="M8 15h3"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Laporan
                            </span>
                        </a>
                    </li>
                @endrole
            </ul>
        </div>
    </div>
</aside>
