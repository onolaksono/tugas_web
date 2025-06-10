<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <!-- <img src="assets/images/logo.svg" alt="" srcset=""> -->
            <h2><strong>SMK MANDIRI</strong></h2>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>
                <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('calon-siswa') ? 'active' : '' }}">
                    <a href="/calon-siswa" class='sidebar-link'>
                        <i data-feather="user" width="20"></i>
                        <span>Calon Siswa</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('berkas') ? 'active' : '' }}">
                    <a href="/berkas" class='sidebar-link'>
                        <i data-feather="file" width="20"></i>
                        <span>Upload Nilai & Berkas</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
