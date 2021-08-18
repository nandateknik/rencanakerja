<?php $this->load->view('layout/head') ?>

<body id="reportsPage">
    <div class="" id="home">
        <?php $this->load->view('layout/navbar') ?>
        <div class="container mt-5">
            <div class="row tm-content-row">
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
                        <h2 class="tm-block-title">Cari Data Pekerjaan</h2>
                        <form method="post" action="" class="tm-signup-form row">
                            <div class="form-group col-lg-12">
                                <label for="tanggal">Dari</label>
                                <input id="tanggal_dari" name="dari" type="date" class="form-control validate" />
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="tanggal_hingga">Hingga</label>
                                <input id="tanggal_hingga" name="hingga" type="date" class="form-control validate" />
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                    Perbarui
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-products">
                        <div class="tm-product-table-container">
                            <h2 class="tm-block-title">Agenda hari ini</h2>
                            <?php if (!empty($data)) : ?>
                                <table class="table table-hover tm-table-small tm-product-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">&nbsp;</th>
                                            <th scope="col">Mision Name</th>
                                            <th scope="col">status</th>
                                            <th scope="col">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $list) : ?>
                                            <tr>
                                                <th scope="row"><input type="checkbox" /></th>
                                                <td class="tm-product-name"><?= $list->mission ?></td>
                                                <td><?= $list->status ?> </td>
                                                <td>
                                                    <a target="_blank" href="<?= base_url('agenda/progres/' . $list->id) ?>" class="tm-product-delete-link">
                                                        <i class="fa fa-wrench tm-product-delete-icon"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
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