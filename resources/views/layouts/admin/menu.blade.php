<!-- Sidebar Menu -->
<nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Principal
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview menu-open">
                <li class="nav-item">
                  <a href="#" class="nav-link active">
                    <i class="fas fa-address-card nav-icon"></i>
                    <p>Active Page</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.parametro') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Parametro</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.estado') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Estado</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.cidade') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Cidade</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.sistema') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Sistemas</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.grupoacesso') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Grupo Acesso</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.permissao') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Permissão</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ route('admin.usuariogrupo') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Usuario Grupo</p>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item">
              <a href="/logout" class="nav-link"><i class="nav-icon fas fa-arrow-alt-circle-left"></i>
                <p>Sair</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->