<?php $this->load->view('layout/head') ?>


<body id="reportsPage">
    <div class="" id="home">
        <?php $this->load->view('layout/navbar') ?>
        <div class="container mt-5">
            <!-- row -->
            <div class="row tm-content-row">
                <div class="tm-block-col tm-col-avatar">
                    <div class="tm-bg-primary-dark tm-block tm-block-avatar">
                        <h2 class="tm-block-title">Mission Detail</h2>
                        <div class="tm-signup-form row">
                            <div class="form-group col-lg-12">
                                <label for="name">Nama Misi</label>
                                <input id="name" value="<?= $mission->mission ?>" name="nama" type="text" class="form-control validate" />
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="name">Deskripsi</label>
                                <textarea name="" class="form-control" id="" cols="10" rows="3"><?= $mission->deskripsi ?></textarea>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="name">Start</label>
                                <input id="name" value="<?= $mission->start ?>" name="nama" type="text" class="form-control validate" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="name">End</label>
                                <input id="name" value="<?= $mission->end ?>" name="nama" type="text" class="form-control validate" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tm-block-col tm-col-account-settings">
                    <div class="tm-bg-primary-dark tm-block tm-block-settings">
                        <h2 class="tm-block-title">Progres Agenda</h2>
                        <form method="post" action="<?= base_url('agenda/insert_progres/' . $this->uri->segment(3)) ?>" class="tm-signup-form row">
                            <div class="form-group col-lg-12">
                                <textarea name="progres" id="progres" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                    Perbarui
                                </button>
                            </div>
                        </form>
                        <hr>

                        <?php foreach ($progres as $update) : ?>

                            <div class="media tm-notification-item mt-3">
                                <div class="tm-gray-circle"><img width="80px" height="80px" src="<?= base_url('assets/upload/' . $update->foto) ?>" alt="Avatar Image" class="rounded-circle"></div>
                                <div class="media-body">
                                    <p class="mb-2"><b><?= $update->nama ?></b> <span class="badge badge-primary"><?= $update->status ?></span></p>
                                    <p><?= $update->progres ?></p>
                                    <span class="tm-small tm-text-color-secondary"><?= $update->tanggal ?> | <?= $update->jam ?></span>
                                </div>
                            </div>

                        <?php endforeach; ?>
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