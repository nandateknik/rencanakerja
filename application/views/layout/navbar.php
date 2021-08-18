<nav class="navbar navbar-expand-xl">
    <div class="container h-100">
        <a class="navbar-brand" href="index.html">
            <h1 class="tm-site-title mb-0">PT. GMCP BWI</h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
                <li class="nav-item">
                    <a class="nav-link <?= $this->uri->segment(1) == ('dashboard') ? 'active' : ''; ?>" href="<?= base_url('dashboard') ?>">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">

                    <a class="nav-link <?= $this->uri->segment(1) == ('mission') ? 'active' : ''; ?> dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-file-alt"></i>
                        <span>
                            Mission <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url('mission/tambah') ?>">Tambah Mission</a>
                        <a class="dropdown-item" href="<?= base_url('mission/data') ?>">Data Mission</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $this->uri->segment(1) == ('agenda') ? 'active' : ''; ?>" href="<?= base_url('agenda') ?>" href="<?= base_url('agenda') ?>">
                        <i class="fas fa-book"></i>
                        Agenda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $this->uri->segment(1) == ('account') ? 'active' : ''; ?>" href="<?= base_url('account') ?>">
                        <i class="far fa-user"></i>
                        Accounts
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link  <?= $this->uri->segment(1) == ('setting') ? 'active' : ''; ?> dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                        <span>
                            Settings <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url('setting/manajemen') ?>">Manajemen</a>
                        <a class="dropdown-item" href="<?= base_url('setting/user') ?>">User</a>
                        <a class="dropdown-item" href="<?= base_url('setting/perusahaan') ?>">Perusahaan</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link d-block" onclick="logout()" href="javascript:()">
                        Admin, <b>Logout</b>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>