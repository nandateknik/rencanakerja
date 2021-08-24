<?php $this->load->view('layout/head') ?>

<body id="reportsPage">
    <div class="" id="home">
        <?php $this->load->view('layout/navbar') ?>
        <div class="container mt-5">
            <div class="row tm-content-row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-products">
                        <div class="tm-product-table-container">
                            <h2 class="tm-block-title">Agenda Kerja</h2>
                            <table class="table table-hover tm-table-small tm-product-table">
                                <thead>
                                    <tr>
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Mision Name</th>
                                        <th scope="col">status</th>
                                        <th scope="col">Pelaksana</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($agenda as $list) : ?>
                                        <tr>
                                            <?php $tanggal = date('Y-m-d'); ?>
                                            <th scope="row"><input type="checkbox" /></th>
                                            <th>
                                                Start: <?= $list->start ?><br />End: <?= $list->end ?>
                                            </th>
                                            <td class="tm-product-name"><?= $list->mission ?></td>
                                            <td><?= $list->status ?> </td>
                                            <td><?= $list->nama ?> </td>
                                            <td>
                                                <?php if ($list->start <= $tanggal && $list->end >= $tanggal) : ?>
                                                    <a href="<?= base_url('agenda/progres/' . $list->id) ?>" class="tm-product-delete-link">
                                                        <i class="fa fa-wrench tm-product-delete-icon"></i>
                                                    </a>
                                                    <a href="<?= base_url('agenda/agendaSelesai/' . $list->id) ?>" class="tm-product-delete-link">
                                                        <i class="fa fa-check tm-product-delete-icon"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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