<nav class="navbar navbar-expand-lg navbar-dark bg-light bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/home">Menú</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('perfil') }}">Perfil</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Usuarios
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('usuario.create') }}">Crear usuario</a>
              <a class="dropdown-item" href="{{ route('usuario.index') }}">Ver usuarios</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Clientes
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('cliente.create') }}">Crear cliente</a>
              <a class="dropdown-item" href="{{ route('cliente.index') }}">Ver clientes</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('calendario.index') }}">Calendario</a>
        </li>
    </ul>
  </div>
</nav>