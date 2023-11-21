<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-title m-3">
                <a href="<?= base_url('admin/sample-bbm/tambah') ?>" target="_blank" class="btn btn-success"><i
                        class="fa fa-plus"></i> Tambah Data</a>
            </div>
            <div class="card-body">

                <?= $this->session->flashdata('msg') ?>
                <h4 class="card-title mb-3">Daftar Stock Sample BBM</h4>

                
                <div class="btn-group  mb-2" role="group" aria-label="Basic example">
                    <a href="<?= base_url('admin/sample-bbm')?>" class="btn btn-primary">Lihat Semua</a>
                    <a href="<?= base_url('admin/sample-bbm?status=release')?>" class="btn btn-primary">Release</a>
                    <a href="<?= base_url('admin/sample-bbm?status=waiting')?>" class="btn btn-primary">Menunggu</a>
                </div>
                <table id="datatable-buttons" class="table table-responsive"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk / Jenis BBM</th>
                            <th>Asal Sample</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Pemusnahan</th>
                            <th>Quantity</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php $i = 0;
                        $total_quantity = 0;
                        foreach ($sample as $bbm):
                            $total_quantity += $bbm->quantity;
                            if ( $bbm->status != "release" )
                            {
                                if ( $bbm->df <= 1 )
                                {
                                    $cl = "class='badge bg-danger'";
                                }
                                elseif ( $bbm->df > 1 && $bbm->df < 5 )
                                {
                                    $cl = "class='badge bg-warning'";
                                }
                            }
                            else
                            {
                                $cl = "class='badge bg-success'";
                            }
                            ?>
                            <tr>
                                <td>
                                    <?= ++$i ?>
                                </td>
                                <td>
                                    <?= $bbm->jenis ?>
                                </td>
                                <td>
                                    <?= $bbm->asal ?>
                                </td>
                                <td>
                                    <?= $bbm->tanggal_masuk ?>
                                </td>
                                <td>
                                    <?= $bbm->tanggal_release ?>
                                </td>
                                <td>
                                    <?= $bbm->quantity ?>
                                </td>
                                <td>
                                    <?= $bbm->keterangan ?>
                                </td>
                                <td <?= $cl ?>>
                                    <?php
                                    if ( $bbm->status != "release" )
                                    {
                                        echo 'H ' . $bbm->df * -1;
                                    }
                                    else
                                    {
                                        echo "Released";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success"
                                        href="<?= base_url('admin/sample-bbm/release/' . $bbm->id) ?>">
                                        <i class="fa fa-checklist"></i> Update Release
                                    </a>
                                    <a class="btn btn-sm btn-danger"
                                        href="<?= base_url('admin/sample-bbm/delete/' . $bbm->id) ?>">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="6">Total :
                                <?= $total_quantity ?>
                            </th>
                        </tr>
                    </tfoot>
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