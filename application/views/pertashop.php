<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-title m-3">
                <a href="<?= base_url('admin/ba-pertashop/tambah')?>" target="_blank" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
</div>
            <div class="card-body">

                <h4 class="card-title mb-5">Berita Acara Pengisian dibawah kapasitas kompartemen mobil tangki</h4>
                <table id="datatable-buttons" class="table table-striped table-bordered table-responsive"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th rowspan="2">Nomor Shipment</th>
                            <th rowspan="2">Nomor Polisi</th>
                            <th rowspan="2">Supir / Kernet</th>
                            <th rowspan="2">Jam Gate Out</th>
                            <th rowspan="2">Kapasitas MT (KL)</th>
                            <th rowspan="2">Tujuan</th>
                            <th rowspan="2">Nomor LO</th>
                            <th rowspan="2">Produk</th>
                            <th rowspan="2">Volume LO (KL)</th>
                            <th colspan="2">Hasil Pengukuran T2 Level cairan (mm)</th>
                            <th rowspan="2">Selisih</th>
                            <th rowspan="2">Status</th>
                        </tr>
                        <tr>
                            <th>Di TBBM</th>
                            <th>Diterima</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php foreach ($ba as $b): ?>
                            <tr>
                                <td>
                                    <?= $b->nomor_shipment ?>
                                </td>
                                <td>
                                    <?= $b->nomor_polisi ?>
                                </td>
                                <td>
                                    <?= $b->nama_supir . " / " . $b->nama_kernet ?>
                                </td>
                                <td>
                                    <?= $b->jam_gate_out ?>
                                </td>
                                <td>
                                    <?= $b->kapasitas_mt ?>
                                </td>
                                <td>
                                    <?= $b->tujuan ?>
                                </td>
                                <td>
                                    <?= $b->nomor_lo ?>
                                </td>
                                <td>
                                    <?= $b->produk ?>
                                </td>
                                <td>
                                    <?= $b->volume_lo ?>
                                </td>
                                <td>
                                    <?= $b->hasil_t2_tbbm ?>
                                </td>
                                <td>
                                    <?= $b->hasil_t2_diterima ?>
                                </td>
                                <td>
                                    <?= $b->hasil_t2_tbbm - $b->hasil_t2_diterima ?>
                                </td>
                                <td>
                                    <?= $b->status?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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