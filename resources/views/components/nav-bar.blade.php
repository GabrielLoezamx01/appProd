  {{-- <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <button class="navbar-toggler border-0" style="color #8FC82D;" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <div class="menu-icon">
                    <i class="fas fa-bars"></i>
                </div>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item d-flex align-items-center nav-bg m-3 rounded-3">
                        <div class="m-2">
                            <i class="fas fa-home mr-2"></i>
                            <a class="p-3 xds" href="{{ url('home') }}">Inicio</a>
                        </div>
                    </li>
                    <li class="nav-item d-flex align-items-center nav-bg m-3 rounded-3">
                        <div class="m-2">
                            <i class="fas fa-user mr-2"></i>
                            <a class="p-3 xds" href="{{ url('perfil') }}">Mi Información</a>
                        </div>
                    </li>

                    @if (Auth::user()->role_id == 1)
                        <li class="nav-item d-flex align-items-center nav-bg m-3 rounded-3">
                            <div class="m-2">
                                <i class="fas fa-book mr-2"></i>
                                <a class="p-3 xds" href="{{ url('MisPublicaciones') }}">Mis Publicaciones</a>
                            </div>
                        </li>
                        <li class="nav-item d-flex align-items-center nav-bg m-3 rounded-3">
                            <div class="m-2">
                                <i class="fas fa-share-alt mr-2"></i><!-- Cambiado de "fa-shared" a "fa-share-alt" -->
                                <a class="p-3 xds" href="{{ url('PublicacionesCompartidas') }}"> Mis Compartidos</a>
                            </div>

                        </li>
                    @endif
                    @if (Auth::user()->role_id == 2)
                        <li class="nav-item d-flex align-items-center nav-bg m-3 rounded-3">
                            <div class="m-2">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <a class="p-3 xds" href="{{ url('seller/Myseller') }}">Mis Sucursales</a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="dropdown ms-auto p-3">
                <a class="navbar-brand fw-bold dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name ?? 'Actualizar Información' }}
                </a>

                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item nav-bg" href="#">Ajustes</a></li>
                    <li><a class="dropdown-item nav-bg" href="{{ url('closeUser') }}">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </nav> --}}


  <nav class="bg-white navbar navbar-expand-lg navbar-light navbar-custom fixed-top p-3">
      <div class="container-fluid">
          <!-- Navbar brand/logo (opcional) -->
          {{-- <a class="navbar-brand" href="#">Logo</a> --}}

          <!-- Navbar toggler (para dispositivos móviles) -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Navbar links -->
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <!-- Inicio -->
                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('home') }}"><i class="fas fa-home"></i> Inicio</a>
                  </li>
                  <!-- Perfil -->
                  <li class="nav-item">
                      <a class="nav-link" href="{{ url('perfil') }}"><i class="fas fa-user"></i> Perfil</a>
                  </li>
                  <!-- Sucursales -->
                  @if (Auth::user()->role_id == 2)
                      <li class="nav-item">
                          <a class="nav-link" href="{{ url('seller/Myseller') }}"><i class="fas fa-store"></i>
                              Sucursales</a>
                      </li>
                  @endif
                  @if (Auth::user()->role_id == 1)
                      <li class="nav-item">
                          <a class="nav-link" href="{{ url('MisPublicaciones') }}"><i class="fas fa-book "></i>
                              Mis Publicaciones</a>
                      </li>
                      {{-- <li class="nav-item d-flex align-items-center nav-bg m-3 rounded-3">
                            <div class="m-2">
                                <i class="fas fa-share-alt mr-2"></i><!-- Cambiado de "fa-shared" a "fa-share-alt" -->
                                <a class="p-3 xds" href="{{ url('PublicacionesCompartidas') }}"> Mis Compartidos</a>
                            </div>
                        </li> --}}
                  @endif
                  <!-- Más sesiones (en el futuro) -->
                  <!-- Ejemplo de sesión adicional -->
                  {{-- <li class="nav-item">
                      <a class="nav-link" href="#"><i class="fas fa-cog"></i> Configuración</a>
                  </li> --}}
              </ul>

              <!-- Dropdown del usuario -->
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="{{ url('closeUser') }}">Cerrar sesión</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
