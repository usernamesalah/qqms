
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mt-4">
                    <?= $this->session->flashdata('msg') ?>
                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Tambah Sample
                        BBM</h5>
                    <?= form_open('admin/sample-bbm/tambah') ?>

                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Asal</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="asal">
                                <?php foreach ($asal as $key => $value) : ?>
                                    <option value="<?= $key ?>"><?= $value ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Jenis</label>
                        <div class="col-sm-9">
                            <select class="form-select" name="jenis">
                                <option value="pertalite">Pertalite</option>
                                <option value="pertamax">Pertamax</option>
                                <option value="biosolar">Biosolar B35</option>
                                <option value="dexlite">Dexlite B35</option>
                                <option value="pertamina_dex">Pertamina Dex</option>
                                <option value="pertamax_turbo">Pertamax Turbo</option>
                                <option value="avtur">Avtur</option>
                                <option value="kerosine">Kerosine</option>

                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_masuk" class="form-control" id="horizontal-email-input">
                        </div>
                    </div>
                    <!-- <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Tanggal Pemusnahan</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal_release" class="form-control" id="horizontal-email-input">
                        </div>
                    </div> -->
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Quantity</label>
                        <div class="col-sm-9">
                            <input type="number" name="quantity" class="form-control" id="horizontal-email-input">
                        </div>
                    </div>

                    <div class="mt-4">
                        <input type="submit" class="btn btn-primary w-md" value="Simpan" name="tambah">
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->