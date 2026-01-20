                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <li class="user-header text-bg-primary">
                                <p>
                                    {{ auth()->user()->name }}
                                </p>
                            </li>
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat float-end">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </li>