<?php $this->load->view('layout/head') ?>

<body id="reportsPage">
    <div class="" id="home">
        <?php $this->load->view('layout/navbar') ?>
        <div class="container tm-mt-big tm-mb-big">
            <div class="row">
                <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="tm-block-title d-inline-block">Tambah Mission</h2>
                            </div>
                        </div>
                        <div class="row tm-edit-product-row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <form action="" method="post" class="tm-edit-product-form">
                                    <div class="form-group mb-3">
                                        <label for="name">Nama Mission
                                        </label>
                                        <input id="name" name="mission" type="text" class="form-control validate" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="start">Start Mission
                                        </label>
                                        <input id="start" name="start" type="date" class="form-control validate" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="end">End Mission
                                        </label>
                                        <input id="end" name="end" type="date" class="form-control validate" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control validate tm-small" rows="5" required></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="category">Kepada</label>
                                        <select name="id_user" class="custom-select tm-select-accounts" id="category">
                                            <?php foreach ($user as $data) : ?>
                                                <option value="<?= $data->id ?>"><?= $data->nama ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">Apply</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('layout/footer') ?>
        <?php $this->load->view('layout/js') ?>
    </div>
</body>

</html>