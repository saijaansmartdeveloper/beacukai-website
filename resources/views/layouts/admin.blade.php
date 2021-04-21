@include('layouts.includes.header')

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{ url('home') }}">
                    <span class="align-middle">BEACUKAI</span>
                </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Menu
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ url('home') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#cms-beacukai" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="settings"></i> <span class="align-middle">CMS Beacukai</span>
                        </a>
                        <ul id="cms-beacukai" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('banners') }}">
                                    Banner
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('pages') }}">
                                    Page
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('posts') }}">
                                    Post
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('testimonis') }}">
                                    Testimoni
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#menu-beacukai" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Menu Beacukai</span>
                        </a>
                        <ul id="menu-beacukai" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="{{ url('sirings') }}">Siring</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('layanans') }}">Janji Layanan</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('surveys') }}">Hasil Survey</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('kurs') }}">Kurs</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('directories') }}">Direktori Peraturan</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('kotabaru_links') }}">BC Kotabaru Link</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('socials') }}">Sosial Media</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('footers') }}">Profile Instansi</a></li>

                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#setting" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Setting</span>
                        </a>
                        <ul id="setting" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Profile</a></li>
                        </ul>
					</li>
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
                    <i class="hamburger align-self-center"></i>
                </a>

				<div class="navbar-collapse collapse">
				    <ul class="navbar-nav navbar-align">

						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <img src="{{ asset('img/logo_kckotabaru.jpg') }}" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">{{ Auth::user()->name ?? '' }}</span>
                            </a>
							<div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
							</div>
						</li>
					</ul>
				</div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    {{-- Title Section --}}
					<div class="row mb-2 mb-xl-3">
                        {{-- Title --}}
                        <div class="col-auto d-none d-sm-block">
							<h3>@yield('title')</h3>
                        </div>
                        {{-- Breadcumb --}}
                        <div class="col-auto ms-auto text-end mt-n1">
							@yield('button-create')
                        </div>

                    </div>

                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </main>
                @include('layouts.includes.footer')
            </div>
        </div>

        @include('layouts.includes.js')
        @yield('js')
    </body>

</html>
