<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center"><b>BERITA ACARA PENGISIAN DIBAWAH KAPASITAS KOMPARTEMEN MOBIL
                        TANGKI <br>
                        <?= $ba->nomor_surat ?>
                    </b></h4>
                <p class="card-title-desc mb-2">
                    Pada hari ini
                    <?= $ba->created_at ?>, telah dilakukan serah terima BBM/BBK dari PT.Pertamina Patra Niaga – Fuel
                    Terminal Pulau Baai kepada Konsumen SPBU / Pertashop dan dikirim menggunakan MT dengan data sebagai
                    berikut :
                </p>
                <ul>
                    <li>Nama Supir :
                        <?= $ba->nama_supir ?>
                    </li>
                    <li>Nama Kernet :
                        <?= $ba->nama_kernet ?>
                    </li>
                    <li>Nomor Polisi :
                        <?= $ba->nomor_polisi ?>
                    </li>
                </ul>
                <p class="card-title-desc mb-2">
                    Dari data di atas dengan ini memberitahukan bahwa mobil tangki tersebut telah melakukan pengisian
                    BBM/BBK dengan quantity dibawah kapasitas kompartemen mobil tangki (Quantity LO kurang dari
                    kapasitas Mobil Tangki). Berikut hasil pengukurannya :
                </p>
                <table class="table table-bordered border-secondary">
                    <thead>
                        <tr>
                            <th rowspan="2">Nomor Shipment</th>
                            <th rowspan="2">Jam Gate Out</th>
                            <th rowspan="2">Kapasitas MT (KL)</th>
                            <th rowspan="2">Tujuan</th>
                            <th rowspan="2">Nomor LO</th>
                            <th rowspan="2">Produk</th>
                            <th rowspan="2">Volume LO (KL)</th>
                            <th colspan="2">Hasil Pengukuran T2 Level cairan (mm)</th>
                            <th rowspan="2">Selisih</th>
                        </tr>
                        <tr>
                            <th>Di TBBM</th>
                            <th>Diterima</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?= $ba->nomor_shipment ?>
                            </td>
                            <td>
                                <?= $ba->jam_gate_out ?>
                            </td>
                            <td>
                                <?= $ba->kapasitas_mt ?>
                            </td>
                            <td>
                                <?= $ba->tujuan ?>
                            </td>
                            <td>
                                <?= $ba->nomor_lo ?>
                            </td>
                            <td>
                                <?= $ba->produk ?>
                            </td>
                            <td>
                                <?= $ba->volume_lo ?>
                            </td>
                            <td>
                                <?= $ba->hasil_t2_tbbm ?>
                            </td>
                            <td>
                                <?= $ba->hasil_t2_diterima ?>
                            </td>
                            <td>
                                <?= $ba->hasil_t2_tbbm - $ba->hasil_t2_diterima ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-end">
                <?php if($ba->status < 1) : ?>
                <a href="<?= base_url('admin/berita-acara/approve/' . $ba->id) ?>" class="btn btn-primary">Approve</a>
                <?php endif ?>
            </div>
        </div>

    </div>
</div>