<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-title m-3">
                <?php
                $url = ($profile->role == 0) ? 'admin' : 'gatekeeper' . '/berita-acara/tambah';
                ?>
                <a href="<?= base_url($url) ?>" target="_blank" class="btn btn-success"><i class="fa fa-plus"></i>
                    Tambah
                    Data</a>
            </div>
            <div class="card-body">

                <?= $this->session->flashdata('msg') ?>
                <h4 class="card-title mb-4">Berita Acara Pengisian dibawah kapasitas kompartemen mobil tangki</h4>
                <div class="btn-group  mb-2" role="group" aria-label="Basic example">
                    <a href="<?= base_url('admin/berita-acara')?>" class="btn btn-primary">Lihat Semua</a>
                    <a href="<?= base_url('admin/berita-acara?status=1')?>" class="btn btn-primary">Approved</a>
                    <a href="<?= base_url('admin/berita-acara?status=0')?>" class="btn btn-primary">Menunggu</a>
                </div>
                <hr>
                <table id="datatable-buttons" class="table table-striped table-bordered table-responsive mt-4"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Mobil</th>
                            <th>Jam Gate Out</th>
                            <th>Kapasitas MT (KL)</th>
                            <th>Tujuan</th>
                            <th>Nomor LO</th>
                            <th>Produk</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        if(isset($ba)) :
                        foreach ($ba as $b): ?>
                            <tr>
                                <td>
                                    <ul>
                                        <li>
                                            <?= $b['nomor_polisi'] ?>

                                        </li>
                                        <li>
                                            <?= $b['nama_supir'] . " / " . $b['nama_kernet'] ?>

                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <?= $b['jam_gate_out'] ?>
                                </td>
                                <td>
                                    <?= $b['kapasitas_mt'] ?>
                                </td>
                                <td>
                                    <ul>
                                        <li>
                                            SPBU 1 :
                                            <?= $b['spbu_1']['tujuan'] ?>
                                        </li>
                                        <li>
                                            SPBU 2 :
                                            <?= $b['spbu_2']['tujuan'] ?>
                                        </li>
                                    </ul>

                                </td>
                                <td>

                                    <ul>
                                        <li>
                                            SPBU 1 :
                                            <?= $b['spbu_1']['nomor_lo'] ?>
                                        </li>
                                        <li>
                                            SPBU 2 :
                                            <?= $b['spbu_2']['nomor_lo'] ?>
                                        </li>
                                    </ul>
                                </td>
                                <td>

                                    <ul>
                                        <li>
                                            SPBU 1 :
                                            <?= $b['spbu_1']['produk'] ?>
                                        </li>
                                        <li>
                                            SPBU 2 :
                                            <?= $b['spbu_2']['produk'] ?>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <?php
                                    if ( $b['status'] == 0 )
                                    {
                                        echo '<span class="badge rounded-pill bg-warning">Menunggu Approval</span>';
                                    }
                                    else
                                    {
                                        echo '<span class="badge rounded-pill bg-success">Approved</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $nomor = str_replace("/", "-", $b['nomor_surat']);
                                    $role = ($profile->role == 0) ? 'admin' : 'gatekeeper';
                                    ?>
                                    <a class="btn btn-sm btn-primary"
                                        href="<?= base_url($role . '/berita-acara/detail/' . strtolower($nomor)) ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


<!-- Required datatable js -->
<script src="<?= base_url() ?>/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url() ?>/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script>
    $(document).ready(function () {
        $("#datatable").DataTable(),
            $("#datatable-buttons").DataTable({
                lengthChange: !1, buttons: [
                    {
                        extend: 'excel',
                        text: 'Export Excel',
                        className: 'btn btn-success',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'Export PDF',
                        className: 'btn btn-danger',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                ]
            })
                .buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"),
            $(".dataTables_length select").addClass("form-select form-select-sm")
    });
</script>