        <nav class="app-header navbar navbar-expand bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <x-svg-icon name="list" />
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @include('partials.header.user')
                </ul>
            </div>
        </nav>