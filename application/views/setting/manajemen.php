<?php $this->load->view('layout/head') ?>

<body id="reportsPage">
    <div class="" id="home">
        <?php $this->load->view('layout/navbar') ?>
        <div class="container mt-5">
            <div class="row tm-content-row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
                        <h2 class="tm-block-title">Daftar Divisi</h2>
                        <div class="tm-product-table-container">
                            <table class="table tm-table-small tm-product-table">
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($divisi as $list) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <a href="#" class="text-white tm-product-delete-link">
                                                    <?= $i++ ?>
                                                </a>
                                            </td>
                                            <td class="tm-product-name"><?= $list->divisi ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-settings">
                        <h2 class="tm-block-title">Tambah Divisi</h2>
                        <form method="post" action="<?= base_url('setting/insertdivisi') ?>" class="tm-signup-form row">
                            <div class="form-group col-lg-12">
                                <label for="divisi">Divisi Baru</label>
                                <input id="divisi" name="divisi" type="text" class="form-control validate" />
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                    Add New Divisi
                                </button>
                            </div>
                        </form>
                        <!-- table container -->
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('layout/footer') ?>
        <?php $this->load->view('layout/js') ?>
    </div>
</body>

</html>