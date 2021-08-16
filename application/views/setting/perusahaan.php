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
                        <form method="post" enctype="multipart/form-data" action="<?= base_url('setting/update_foto/') ?>">
                            <div class="tm-avatar-container">
                                <img id='avatar' src="<?= base_url('assets/upload/') . $perusahaan->foto ?>" alt="Avatar" class="tm-avatar img-fluid mb-4" />
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
                        <h2 class="tm-block-title">Perusahaan Settings</h2>
                        <form method="post" action="<?= base_url('setting/update_perusahaan') ?>" class="tm-signup-form row">
                            <div class="form-group col-lg-6">
                                <label for="name">Nama Perusahaan</label>
                                <input id="name" value="<?= $perusahaan->nama ?>" name="nama" type="text" class="form-control validate" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="email">No Telphone</label>
                                <input id="email" value="<?= $perusahaan->no_hp ?>" name="no_hp" type="text" class="form-control validate" />
                            </div>
                            <div class="form-group col-12">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $perusahaan->alamat ?> </textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                    Perbarui
                                </button>
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
    </div>
</body>

</html>