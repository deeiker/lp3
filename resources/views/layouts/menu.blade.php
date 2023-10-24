<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('departamentos.index') }}" class="nav-link {{ Request::is('departamentos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Departamentos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('entidadEmisoras.index') }}" class="nav-link {{ Request::is('entidadEmisoras*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Entidad Emisora</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('Marca.index') }}" class="nav-link {{ Request::is('Marcas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Marcas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('clientes.index') }}" class="nav-link {{ Request::is('clientes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Clientes</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('ciudads.index') }}" class="nav-link {{ Request::is('Ciudad*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Ciudad</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('articulos.index') }}" class="nav-link {{ Request::is('articulos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Articulos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('Formapagos.index') }}" class="nav-link {{ Request::is('Formapagos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Forma de pagos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('sucursal.index') }}" class="nav-link {{ Request::is('sucursal*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Sucursales</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('ventas.index') }}" class="nav-link {{ Request::is('Ventas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Ventas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('apertura_cierre.index') }}" class="nav-link {{ Request::is('AperturaDeCierre*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-plus"></i>
        <p>Apertura de cierre</p>
    </a>
</li>
