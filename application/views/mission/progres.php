<?php $this->load->view('layout/head') ?>

<body id="reportsPage">
    <div class="" id="home">
        <?php $this->load->view('layout/navbar') ?>
        <div class="container mt-5">
            <div class="row tm-content-row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-products">
                        <div class="tm-product-table-container">
                            <h2 class="tm-block-title">Agenda hari ini</h2>
                            <table class="table table-hover tm-table-small tm-product-table">
                                <thead>
                                    <tr>
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">Mision Name</th>
                                        <th scope="col">Prioritas</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($agenda as $list) : ?>
                                        <tr>
                                            <th scope="row"><input type="checkbox" /></th>
                                            <td class="tm-product-name"><?= $list->mission ?></td>
                                            <td>
                                                <?php if ($list->prioritas == 1) : ?>
                                                    <label class="badge badge-danger">TINGGI</label>
                                                <?php elseif ($list->prioritas == 2) : ?>
                                                    <label class="badge badge-warning">SEDANG</label>
                                                <?php else : ?>
                                                    <label class="badge badge-success">RENDAH</label>
                                                <?php endif; ?>

                                            </td>
                                            <td>
                                                <a href="#" class="tm-product-delete-link">
                                                    <i class="fa fa-wrench tm-product-delete-icon"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
                        <h2 class="tm-block-title">Product Categories</h2>
                        <div class="tm-product-table-container">
                            <table class="table tm-table-small tm-product-table">
                                <tbody>
                                    <tr>
                                        <td class="tm-product-name">Product Category 1</td>
                                        <td class="text-center">
                                            <a href="#" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tm-product-name">Product Category 2</td>
                                        <td class="text-center">
                                            <a href="#" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tm-product-name">Product Category 3</td>
                                        <td class="text-center">
                                            <a href="#" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tm-product-name">Product Category 4</td>
                                        <td class="text-center">
                                            <a href="#" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tm-product-name">Product Category 5</td>
                                        <td class="text-center">
                                            <a href="#" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tm-product-name">Product Category 6</td>
                                        <td class="text-center">
                                            <a href="#" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tm-product-name">Product Category 7</td>
                                        <td class="text-center">
                                            <a href="#" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tm-product-name">Product Category 8</td>
                                        <td class="text-center">
                                            <a href="#" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tm-product-name">Product Category 9</td>
                                        <td class="text-center">
                                            <a href="#" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tm-product-name">Product Category 10</td>
                                        <td class="text-center">
                                            <a href="#" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tm-product-name">Product Category 11</td>
                                        <td class="text-center">
                                            <a href="#" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- table container -->
                        <button class="btn btn-primary btn-block text-uppercase mb-3">
                            Add new category
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('layout/footer') ?>
        <?php $this->load->view('layout/js') ?>
    </div>
</body>

</html>