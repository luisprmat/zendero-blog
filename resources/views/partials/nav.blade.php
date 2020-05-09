<nav class="custom-wrapper" id="menu">
    <div class="pure-menu">
        <a href="#" class="custom-toggle btn-bar" id="toggle"></a>
    </div>
    <ul class="container-flex list-unstyled">
        <li>
            <a href="{{ route('pages.home') }}"
                class="c-gris-2 text-uppercase {{ setActiveRoute('pages.home') }}">
                Inicio
            </a>
        </li>
        <li>
            <a href="{{ route('pages.about') }}"
                class="c-gris-2 text-uppercase {{ setActiveRoute('pages.about') }}">
                Nosotros
            </a>
        </li>
        <li>
            <a href="{{ route('pages.archive') }}"
                class="c-gris-2 text-uppercase {{ setActiveRoute('pages.archive') }}">
                Archivo
            </a>
        </li>
        <li>
            <a href="{{ route('pages.contact') }}"
                class="c-gris-2 text-uppercase {{ setActiveRoute('pages.contact') }}">
                Contacto
            </a>
        </li>
    </ul>
</nav>
