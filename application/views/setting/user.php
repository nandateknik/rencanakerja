<?php $this->load->view('layout/head') ?>

<body id="reportsPage">
    <div class="" id="home">
        <?php $this->load->view('layout/navbar') ?>

        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">
                        <a class="badge badge-primary p-3" href="#">
                            <i class="fa fa-plus"></i> Add user
                        </a>
                    </p>
                </div>
            </div>
            <div class="row tm-content-row">
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Setting User</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">USERNAME</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">MENU</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($user as $list) : ?>
                                    <tr>
                                        <td>
                                            <img width="36px" src="<?= base_url('assets/upload/') . $list->foto ?>" class="mr-2" alt="image"> <?= $list->nama ?>
                                        </td>
                                        <td> <?= $list->username ?> </td>
                                        <td>
                                            <label class="badge <?= $list->is_active == (1) ? 'badge-success' : 'badge-danger' ?>">
                                                <?= $list->is_active == (1) ? 'Aktif' : 'Tidak Aktif' ?>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('setting/resetpassword/') . $list->id ?>" title="reset password" class="badge badge-warning"><i class="fa fa-eye"></i> RESET</a>
                                            <a href=" <?= $list->is_active == (1) ? '' . base_url('setting/nonaktif/' . $list->id) . '' : '' . base_url('setting/aktif/' . $list->id) . '' ?>" title="menu account" class="badge  <?= $list->is_active == (1) ? 'badge-danger' : 'badge-success' ?>"><i class="fa fa-user"></i> <?= $list->is_active == (1) ? 'Nonaktifkan' : 'Aktifkan' ?></a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('layout/footer') ?>
        <?php $this->load->view('layout/js') ?>
    </div>
</body>

</html>