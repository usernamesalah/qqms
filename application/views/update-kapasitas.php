<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mt-4 mb-4">
                    <?= $this->session->flashdata('msg') ?>
                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Update Kapasitas
                    </h5>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <ul>
                                <li>
                                    <?= $ba->nomor_surat ?>
                                </li>
                                <li>
                                    <?= $ba->nomor_polisi ?>
                                </li>
                                <li>
                                    <?= $ba->nama_supir . " / " . $ba->nama_kernet ?>
                                </li>
                                <li>Tujuan
                                    <?= $ba->tujuan ?>
                                </li>
                                <li>SPBU Ke
                                    <?= $ba->urutan_spbu ?>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li>
                                    Nomor LO
                                    <?= $ba->nomor_lo ?>
                                </li>
                                <li>
                                    Volume LO
                                    <?= $ba->volume_lo ?>
                                </li>
                                <li>
                                    Pengukuran T2 level cairan TBBM
                                    <?= $ba->pengukuran_tbbm ?>
                                </li>
                                <li>
                                    Pengukuran T2 level cairan SPBU
                                    <?= $ba->urutan_spbu ?> (Sebelum dibongkar) :
                                    <?= $ba->pengukuran_spbu_sebelum ?>
                                </li>
                                <?php if ( $ba->urutan_spbu == 1 ): ?>

                                    <li>
                                        Pengukuran T2 level cairan SPBU
                                        <?= $ba->urutan_spbu ?> (Setelah dibongkar) :
                                        <?= $ba->pengukuran_spbu_setelah ?>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <?= form_open('pertashop/update-kapasitas-ba/' . $ba->id) ?>
                    <?php if ($ba->pengukuran_spbu_sebelum == 0): ?>

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">SPBU
                                <?= $ba->urutan_spbu ?> (Sebelum dibongkar)
                            </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" id="example-text-input"
                                    name="pengukuran_spbu_sebelum">
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if ($ba->pengukuran_spbu_setelah == 0): ?>

                        <?php if ( $ba->urutan_spbu == 1 ): ?>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">SPBU 1 (Setelah
                                    dibongkar)</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="example-text-input"
                                        name="pengukuran_spbu_setelah">
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endif ?>

                    <div class="col-12">
                        <input type="hidden" name="id" value="<?= $ba->id ?>">
                    </div>
                    <div class="col-12">
                        <input class="btn btn-primary" type="submit" name="update" value="Update">
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->