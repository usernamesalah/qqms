<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mt-4">
                    <?= $this->session->flashdata('msg') ?>
                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Tambah Berita
                        Acara</h5>
                    <?= form_open('gatekeeper/berita-acara/tambah') ?>

                    <div class="row">
                        <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">Nomor Polisi</label>
                        <input type="text" class="form-control" id="formrow-firstname-input" name="nomor_polisi">
                    </div>
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Nama Supir</label>
                                <input type="text" class="form-control" id="formrow-email-input" name="nama_supir">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formrow-firstname-input">Jam Gate Out</label>
                                <input type="time" class="form-control" id="formrow-firstname-input"
                                    name="jam_gate_out">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-firstname-input">Tanggal Berita Acara</label>
                                <input type="datetime-local" class="form-control" id="formrow-firstname-input"
                                    name="created_at">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formrow-password-input">Nama Kernet</label>
                                <input type="text" class="form-control" id="formrow-password-input" name="nama_kernet">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Kapasitas MT (KL)</label>
                                <input type="text" class="form-control" id="formrow-email-input" name="kapasitas_mt">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Tujuan
                        Pengiriman SPBU / Pertashop 1</h5>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label" for="formrow-password-input">Produk</label>
                                <input type="text" class="form-control" id="formrow-password-input" name="produk">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Nomor LO</label>
                                <input type="text" class="form-control" id="formrow-email-input" name="nomor_lo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formrow-password-input">Hasil Pengukuran T2 Level Cairan
                                    (mm)</label>
                                <input type="number" class="form-control" id="formrow-password-input"
                                    name="hasil_t2_tbbm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-password-input">Tujuan / Nomor
                                    (SPBU/Pertashop)</label>
                                <input type="text" class="form-control" id="formrow-password-input" name="tujuan">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formrow-password-input">Volume LO (KL)</label>
                                <input type="number" class="form-control" id="formrow-password-input" name="volume_lo">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Tujuan
                        Pengirimam SPBU / Pertashop 2</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-password-input">Produk</label>
                                <input type="text" class="form-control" id="formrow-password-input" name="produk_2">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formrow-email-input">Nomor LO</label>
                                <input type="text" class="form-control" id="formrow-email-input" name="nomor_lo_2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="formrow-password-input">Tujuan / Nomor
                                    (SPBU/Pertashop)</label>
                                <input type="text" class="form-control" id="formrow-password-input" name="tujuan_2">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="formrow-password-input">Volume LO (KL)</label>
                                <input type="number" class="form-control" id="formrow-password-input"
                                    name="volume_lo_2">
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <input type="submit" class="btn btn-primary w-md" value="Simpan" name="create">
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->