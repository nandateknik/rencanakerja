<?php $this->load->view('layout/head') ?>

<body id="reportsPage">
    <div class="" id="home">
        <?php $this->load->view('layout/navbar') ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">Latest Hits</h2>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tmd-bg-primary-dark tm-block tm-block-taller tm-block-overflow">
                        <h2 class="tm-block-title">Notification List</h2>
                        <div class="tm-notification-items">
                            <?php foreach ($log as $key) : ?>
                                <div class="media tm-notification-item">
                                    <div class="tm-gray-circle"><img height="80px" width="80px" src="<?= base_url('assets/upload/' . $key->foto) ?>" alt="Avatar Image" class="rounded-circle"></div>
                                    <div class="media-body">
                                        <p class="mb-2"><b><?= $key->nama ?></b> <?= $key->keterangan ?></p>
                                        <span class="tm-small tm-text-color-secondary"><?= $key->tanggal ?> | <?= $key->jam ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Data Pekerjaan</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Mission</th>
                                    <th scope="col">Pelaksana</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($mission as $dataMission) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $dataMission->start ?></td>
                                        <td><?= $dataMission->mission ?></td>
                                        <td><?= $dataMission->nama ?></td>
                                        <td><?= $dataMission->status ?></td>
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

        <script>
            var ctx = document.getElementById('lineChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        <?php foreach ($divisi as $data22) : ?> '<?= $data22->divisi ?>',
                        <?php endforeach; ?>
                    ],
                    datasets: [{
                        label: '# Pekerjaan Selesai',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            '#F7604D"',
                            '#4ED6B8',
                            '#A8D582',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
</body>

</html>