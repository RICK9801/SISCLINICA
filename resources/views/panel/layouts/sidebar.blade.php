<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
  @php
      $permissionUser = App\Models\PermissionRoleModel::getPermission('User', Auth::user()->role_id);
      $permissionRole = App\Models\PermissionRoleModel::getPermission('Role', Auth::user()->role_id);
      $permissionCategory = App\Models\PermissionRoleModel::getPermission('Category', Auth::user()->role_id);
      $permissionSubCategory = App\Models\PermissionRoleModel::getPermission('Sub Category', Auth::user()->role_id);
      $permissionProduct = App\Models\PermissionRoleModel::getPermission('Product', Auth::user()->role_id);
      $permissionSetting = App\Models\PermissionRoleModel::getPermission('Setting', Auth::user()->role_id);
  @endphp
  
    <li class="nav-item">
      <a class="nav-link @if(Request::segment(2) != 'dashboard') collapsed @endif" href="{{ url('panel/dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    
    @if(!empty($permissionUser) || !empty($permissionRole) || !empty($permissionCategory))
<li class="nav-item">
  <a class="nav-link @if(!in_array(Request::segment(2), ['user', 'role', 'pacientes'])) collapsed @endif" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-person-lines-fill"></i><span>Administración</span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="user-nav" class="nav-content collapse @if(in_array(Request::segment(2), ['user', 'role', 'pacientes'])) show @endif" data-bs-parent="#sidebar-nav">

    @if(!empty($permissionUser))
    <li>
      <a href="{{ url('panel/user') }}" class="@if(Request::segment(2) == 'user') active @endif">
        <i class="bi bi-circle"></i><span>Usuarios</span>
      </a>
    </li>
    @endif

    @if(!empty($permissionRole))
    <li>
      <a href="{{ url('panel/role') }}" class="@if(Request::segment(2) == 'role') active @endif">
        <i class="bi bi-circle"></i><span>Roles</span>
      </a>
    </li>
    @endif

 

  </ul>
</li>
@endif

    @if(!empty($permissionSetting))
    <li class="nav-item">
      <a class="nav-link @if(Request::segment(2) != 'setting') collapsed @endif" href="{{ url('panel/pacientes') }}">
        <i class="bi bi-gear"></i>
        <span>pacientes</span>
      </a>
    </li>
    @endif
    
    @if(!empty($permissionSubCategory))
    <li class="nav-item">
      <a class="nav-link @if(Request::segment(2) != 'subcategory') collapsed @endif" href="{{ url('panel/odontologos') }}">
        <i class="ri-24-hours-fill"></i>
        <span>odontologos</span>
      </a>
    </li>
    @endif
  
    @if(!empty($permissionProduct))
    <li class="nav-item">
      <a class="nav-link @if(Request::segment(2) != 'product') collapsed @endif" href="{{ url('panel/tratamientos') }}">
        <i class="bi bi-box"></i>
        <span>tratamientos</span>
      </a>
    </li>
    @endif
  
    @if(!empty($permissionSetting))
    <li class="nav-item">
      <a class="nav-link @if(Request::segment(2) != 'setting') collapsed @endif" href="{{ url('panel/servicios') }}">
        <i class="bi bi-gear"></i>
        <span>servicios</span>
      </a>
    </li>
    @endif

     @if(!empty($permissionSetting))
    <li class="nav-item">
      <a class="nav-link @if(Request::segment(2) != 'setting') collapsed @endif" href="{{ url('panel/citas') }}">
        <i class="bi bi-gear"></i>
        <span>servicios</span>
      </a>
    </li>
    @endif

    

    <!-- <li class="nav-item">
      <a class="nav-link @if(Request::segment(2) != 'setting') collapsed @endif" href="{{ url('panel/perfil') }}">
        <i class="bi bi-gear"></i>
        <span>perfil</span>
      </a>
    </li> -->
  
  </ul>
  
  </aside><!-- End Sidebar -->
  