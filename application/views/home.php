<div class="row">
    <div class="col-md-6">

        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Berita Acara</h4>
        </div>
        
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Berita Acara Menunggu di approve</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>No Surat</th>
                                <th>No Polisi</th>
                                <th>Tujuan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($ba_acc as $b) : ?>
                            <tr>
                                <td>
                                    <?= $b->nomor_surat ?>
                                </td>
                                <td><?= $b->nomor_polisi ?></td>
                                <td>
                                <?= $b->tujuan ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/berita-acara/detail/' .$b->id) ?>" class="btn btn-primary">detail</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
    <div class="col-md-6">

        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Sample BBM</h4>
        </div>

        <div class="card">
            <div class="card-body">
            <h4 class="card-title mb-4">Notifikasi sample bbm</h4>
                <ol class="activity-feed mb-0 ps-2" data-simplebar style="max-height: 50vh;">
                    <li class="feed-item">
                        <div class="feed-item-list">
                            <p class=" mb-1 font-size-13 text-danger">Today</p>
                            <p class="mb-0">Penyaluran Pertamax Memasuki masa tenggang <a href="#" class="text-primary">Lihat sekarang</a></p>
                        </div>
                    </li>
                    <li class="feed-item">
                        <p class=" mb-1 font-size-13 text-warning">2 Hari lagi</p>
                        <p class="mb-0">Penyaluran Pertamax Memasuki masa tenggang <a href="#" class="text-primary">Lihat sekarang</a></p>
                    </li>
                </ol>

            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <div id="total-revenue-chart"></div>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">10</span></h4>
                            <p class=" mb-0">BA Pertashop butuh approve</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <div id="growth-chart"></div>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1"><span data-plugin="counterup">5</span></h4>
                        </div>
                        <p class=" mt-3 mb-0"><span class="text-danger me-1">Sample BBM Memasuki masa
                                pemusnahan</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col-->
    <div class="col-md-6">
        
    </div>

</div> <!-- end row-->