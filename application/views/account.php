<?php $this->load->view('layout/head') ?>

<body id="reportsPage">
    <div class="" id="home">
        <?php $this->load->view('layout/navbar') ?>
        <div class="container mt-5">
            <!-- row -->
            <div class="row tm-content-row">
                <div class="tm-block-col tm-col-avatar">
                    <div class="tm-bg-primary-dark tm-block tm-block-avatar">
                        <h2 class="tm-block-title">Change Avatar</h2>
                        <form method="post" enctype="multipart/form-data" action="<?= base_url('account/update_foto/') ?>">
                            <div class="tm-avatar-container">
                                <img id='avatar' src="<?= base_url('assets/upload/') . $account->foto ?>" alt="Avatar" class="tm-avatar img-fluid mb-4" />
                                <a id="clickedit" href="javascript:()" class="tm-avatar-delete-link">
                                    <i class="far fa-edit tm-product-delete-icon"></i>
                                </a>
                                <input class="d-none" type="file" name="foto" id="foto">
                            </div>
                            <small class="text-white">Pastikan file berformat JPG, PNG dan GIF. Ukuran file harus kurang dari 1mb </small>
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                Upload New Photo
                            </button>
                        </form>
                    </div>
                </div>
                <div class="tm-block-col tm-col-account-settings">
                    <div class="tm-bg-primary-dark tm-block tm-block-settings">
                        <h2 class="tm-block-title">Profil Akun</h2>
                        <form method="post" action="<?= base_url('account/update_account') ?>" class="tm-signup-form row">
                            <div class="form-group col-lg-6">
                                <label for="name">Nama Lengkap</label>
                                <input id="name" value="<?= $account->nama ?>" name="nama" type="text" class="form-control validate" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="username">Username</label>
                                <input disabled id="username" value="<?= $account->username ?>" name="username" type="text" class="form-control validate" style="background-color:#e9ecef2e !important;" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="role_id">Hak Akses</label>
                                <select disabled name="role_id" id="role" class="custom-select">
                                    <?php foreach ($role as $opt) : ?>
                                        <option <?= $opt->id == ($account->role_id) ? 'selected' : ''; ?> value="<?= $opt->id ?>"><?= $opt->role ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="is_active">Status</label>
                                <select disabled name="is_active" id="is_active" class="custom-select">
                                    <option <?= $account->is_active == (1) ? 'selected' : ''; ?> value="1">Aktif</option>
                                    <option <?= $account->is_active == (0) ? 'selected' : ''; ?> value="0">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                    Perbarui
                                </button>
                            </div>
                            <div class="col-12 mt-3">
                                <a href="javascript:()" data-toggle="modal" data-target="#modelId" class="btn btn-primary btn-block text-uppercase">
                                    Update Password
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('layout/footer') ?>
        <?php $this->load->view('layout/js') ?>
        <script>
            $(document).on('click', '#clickedit', function() {
                $('#foto').click();
            })

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#avatar').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    alert('select a file to see preview');
                    $('#avatar').attr('src', '');
                }
            }

            $("#foto").change(function() {
                readURL(this);
            });
        </script>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="modal-body">
                        <div class="tm-block-cols">
                            <div class="tm-bg-primary-dark tm-block tm-block-settings">
                                <form method="post" action="<?= base_url('account/update_password') ?>" class="tm-signup-form row">
                                    <div class="form-group col-lg-12">
                                        <label for="password">Password Baru</label>
                                        <input id="password" name="password" type="password" class="form-control validate" />
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="passconf">Confirm Password</label>
                                        <input id="passconf" name="passconf" type="password" class="form-control validate" />
                                    </div>
                                    <div class="col-6">
                                        <button type="button" href="javascript:()" data-dismiss="modal" data-toggle="modal" data-target="#modelId" class="btn btn-primary btn-block text-uppercase">
                                            Close
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                            Perbarui
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>