<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mt-4 mb-4">
            <?= $this->session->flashdata('msg') ?>
                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Update Kapasitas</h5>
                        <ul>
                            <li><?= $ba->nomor_surat ?></li>
                            <li><?= $ba->nomor_polisi ?></li>
                            <li><?= $ba->nama_supir . " / " . $ba->nama_kernet ?></li>
                            <li>Tujuan <?= $ba->tujuan ?></li>
                        </ul>
                        <?= form_open('pertashop/update-kapasitas-ba' , ['class'=> 'row row-cols-lg-auto gx-3 gy-2 align-items-center']) ?>
                        <div class="col-12">
                            <label class="visually-hidden" for="specificSizeInputName">Hasil Pengukuran T2 Level diterima</label>
                            <input type="number"class="form-control" id="specificSizeInputName"
                                name="hasil_t2_diterima">
                            <input type="hidden"  name="id" value="<?= $ba->id ?>">
                        </div>
                        <div class="col-12">
                            <input class="btn btn-primary" type="submit" name="cari" value="Update">
                        </div>
                        <?= form_close() ?>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
