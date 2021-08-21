<script src="<?= base_url('assets/') ?>js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="<?= base_url('assets/') ?>js/moment.min.js"></script>
<!-- https://momentjs.com/ -->
<script src="<?= base_url('assets/') ?>js/Chart.js"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->

<?= $this->session->userdata('pesan'); ?>
<?php $this->session->unset_userdata('pesan');
?>
<script>
    function logout() {
        swal({
                title: "Are you sure?",
                text: "Yakin keluar aplikasi ?!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Berhasil logout!", {
                        icon: "success",
                    });
                    setInterval(function() {
                        window.location.replace("<?= base_url('welcome/logout') ?>");
                    }, 1500);
                } else {
                    swal("Batal logout!");
                }
            });
    }
</script>