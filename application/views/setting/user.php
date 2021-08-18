<?php $this->load->view('layout/head') ?>

<body id="reportsPage">
    <div class="" id="home">
        <?php $this->load->view('layout/navbar') ?>

        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">
                        <a class="badge badge-primary p-3" href="javascript:()" data-toggle="modal" data-target="#adduser">
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
                                            <a href=" <?= $list->is_active == (1) ? '' . base_url('setting/nonaktif/' . $list->id) . '' : '' . base_url('setting/aktif/' . $list->id) . '' ?>" title="menu account" class="badge  <?= $list->is_active == (1) ? 'badge-danger' : 'badge-success' ?>"><i class="fa fa-user"></i> <?= $list->is_active == (1) ? 'Nonaktifkan' : 'Aktifkan' ?></a>
                                            <a href="<?= base_url('setting/profile_account/' . $list->id) ?> " class="badge badge-primary"><i class="fa fa-user"></i> Profile</a>

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

    <!-- Modal -->
    <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-body">
                    <div class="tm-block-cols">
                        <div class="tm-bg-primary-dark tm-block tm-block-settings">
                            <form method="post" action="<?= base_url('setting/register') ?>" class="tm-signup-form row">
                                <div class="form-group col-lg-12">
                                    <label for="nama">Nama</label>
                                    <input id="nama" name="nama" type="text" class="form-control validate" />
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="username">Username</label>
                                    <input id="ussername" name="username" type="text" class="form-control validate" />
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="password">Password</label>
                                    <input id="password" name="password" type="password" class="form-control validate" />
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="confpw">Confirm Password</label>
                                    <input id="confpw" name="passconf" type="password" class="form-control validate" />
                                </div>
                                <div class="form-group col-lg-12">
                                    <label for="role_id">Hak Akses</label>
                                    <select name="role_id" id="role_id" class="custom-select">
                                        <option value="2">Admin</option>
                                        <option value="3">User</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <button type="button" href="javascript:()" data-dismiss="modal" data-toggle="modal" data-target="#modelId" class="btn btn-primary btn-block text-uppercase">
                                        Close
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                        REGISTER
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>