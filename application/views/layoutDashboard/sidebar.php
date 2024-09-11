<style>
#accordionSidebar .nav-link,
#accordionSidebar .sidebar-heading,
#accordionSidebar .sidebar-brand-text,
#accordionSidebar .sidebar-divider,
#accordionSidebar .fas {
    color: #000 !important;
    /* Memastikan warna teks hitam */
}
</style>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink  text-gray-900"></i>
        </div>
        <div class="sidebar-brand-text mx-3  text-dark">E-Commerce</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider border border-1">

    <!-- Heading -->
    <div class="sidebar-heading">
        Dashboard
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="../home/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - My Profile -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="../kategori/kategori.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>My Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider  mt-2  border border-1">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="../kategori/kategori.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data User</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="../kategori/kategori.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Kategori</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="../kategori/kategori.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Produk</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-2  border border-1">

    <!-- Heading -->
    <div class="sidebar-heading">
        Logout
    </div>

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block  border border-1">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-1" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">