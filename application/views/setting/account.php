<?php $this->load->view('layout/head') ?>

<body id="reportsPage">
    <div class="" id="home">
        <?php $this->load->view('layout/navbar') ?>
        <div class="container mt-5">
            <!-- row -->
            <div class="row tm-content-row">
                <div class="tm-block-col tm-col-avatar">
                    <div class="tm-bg-primary-dark tm-block tm-block-avatar">
                        <h2 class="tm-block-title">Foto Profil</h2>
                        <form method="post" enctype="multipart/form-data" action="<?= base_url('account/update_foto/') ?>">
                            <div class="tm-avatar-container">
                                <img id='avatar' src="<?= base_url('assets/upload/') . $account->foto ?>" alt="Avatar" class="tm-avatar img-fluid mb-4" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tm-block-col tm-col-account-settings">
                    <div class="tm-bg-primary-dark tm-block tm-block-settings">
                        <h2 class="tm-block-title">Profil Akun</h2>
                        <form method="post" action="<?= base_url('setting/update_account/' . $this->uri->segment(3)) ?>" class="tm-signup-form row">
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
                                <select name="role_id" id="role" class="custom-select">
                                    <?php foreach ($role as $opt) : ?>
                                        <option <?= $opt->id == ($account->role_id) ? 'selected' : ''; ?> value="<?= $opt->id ?>"><?= $opt->role ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="is_active">Status</label>
                                <select name="is_active" id="is_active" class="custom-select">
                                    <option <?= $account->is_active == (1) ? 'selected' : ''; ?> value="1">Aktif</option>
                                    <option <?= $account->is_active == (0) ? 'selected' : ''; ?> value="0">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="divisi">Divisi</label>
                                <select name="divisi" id="divisi" class="custom-select">
                                    <?php foreach ($divisi as $list2) : ?>
                                        <option <?= $list2->divisi == ($account->divisi) ? 'selected' : ''; ?> value="<?= $list2->divisi ?>"><?= $list2->divisi ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                    Perbarui
                                </button>
                            </div>
                            <div class="col-12 mt-3">
                                <a href="javascript:()" onclick="reset()" class="btn btn-primary btn-block text-uppercase">
                                    Reset Password
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
            function reset() {
                swal({
                        title: "Reset password ?",
                        text: "Kamu akan reset password menjadi user",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Berhasil reset!", {
                                icon: "success",
                            });
                            setInterval(function() {
                                window.location.replace("<?= base_url('setting/resetpassword/') . $account->id ?>");
                            }, 1500);
                        } else {
                            swal("Batal reset!");
                        }
                    });
            }
        </script>
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

    </div>
</body>

</html>