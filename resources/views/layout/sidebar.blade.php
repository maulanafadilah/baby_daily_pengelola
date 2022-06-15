<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      PPKM<span>Bandung</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Menu</li>
      <li class="nav-item {{ active_class(['umkm*']) }}">
        <a href="{{ url('/umkm') }}" class="nav-link">
          <i class="link-icon" data-feather="shopping-bag"></i>
          <span class="link-title">Umkm</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['kategori*']) }}">
        <a href="{{ url('/kategori') }}" class="nav-link">
          <i class="link-icon" data-feather="layers"></i>
          <span class="link-title">kategori</span>
        </a>
      </li>
    </ul>
  </div>
</nav>
