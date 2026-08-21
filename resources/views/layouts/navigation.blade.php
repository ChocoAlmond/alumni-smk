<aside class="admin-sidebar">
    <a href="{{ route('dashboard') }}" class="admin-brand"><span class="admin-brand-mark">R</span><span>ruang<br>alumni</span></a>
    <p class="admin-eyebrow">Pusat kendali</p>
    <nav class="admin-nav" aria-label="Navigasi admin">
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'is-active' : '' }}"><span>01</span> Ikhtisar</a>
        <a href="{{ route('alumni.index') }}" class="{{ request()->routeIs('alumni.*') ? 'is-active' : '' }}"><span>02</span> Data alumni</a>
        <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.*') ? 'is-active' : '' }}"><span>03</span> Profil saya</a>
    </nav>
    <div class="admin-sidebar-foot"><span class="status-dot"></span><span>Sistem aktif<br><small>SMK · {{ date('Y') }}</small></span></div>
</aside>
<header class="admin-topbar"><span class="topbar-context">Ruang alumni / {{ request()->routeIs('dashboard') ? 'Ikhtisar' : (request()->routeIs('alumni.*') ? 'Data alumni' : 'Profil') }}</span><span class="topbar-user">{{ Auth::user()->name }} <span class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span></span></header>