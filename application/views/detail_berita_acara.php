<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center"><b>BERITA ACARA PENGISIAN DIBAWAH KAPASITAS KOMPARTEMEN MOBIL
                        TANGKI <br>
                        <?= $ba['nomor_surat'] ?>
                    </b></h4>
                <p class="card-title-desc mb-2">
                    Pada hari ini
                    <?= $ba['created_at'] ?>, telah dilakukan serah terima BBM/BBK dari PT.Pertamina Patra Niaga – Fuel
                    Terminal Pulau Baai kepada Konsumen SPBU / Pertashop dan dikirim menggunakan MT dengan data sebagai
                    berikut :
                </p>
                <ul>
                    <li>Nama Supir :
                        <?= $ba['nama_supir'] ?>
                    </li>
                    <li>Nama Kernet :
                        <?= $ba['nama_kernet'] ?>
                    </li>
                    <li>Nomor Polisi :
                        <?= $ba['nomor_polisi'] ?>
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
                            <th rowspan="2">Jam Gate Out</th>
                            <th rowspan="2">Kapasitas MT (KL)</th>
                            <th rowspan="2">Tujuan / Nomor (SPBU/Pertashop)</th>
                            <th rowspan="2">Nomor LO</th>
                            <th rowspan="2">Produk</th>
                            <th rowspan="2">Volume LO (KL)</th>
                            <th colspan="4">Hasil Pengukuran T2 Level cairan (mm)</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>SPBU 1 (Sebelum Bongkar)</th>
                            <th>SPBU 1 (Setelah Bongkar)</th>
                            <th>SPBU 1 (Sebelum Bongkar)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="2">
                                <?= $ba['jam_gate_out'] ?>
                            </td>
                            <td rowspan="2">
                                <?= $ba['kapasitas_mt'] ?>
                            </td>
                            <td>
                                <?= $ba['spbu_1']['tujuan'] ?>
                            </td>
                            <td>
                                <?= $ba['spbu_1']['nomor_lo'] ?>
                            </td>
                            <td>
                                <?= $ba['spbu_1']['produk'] ?>
                            </td>
                            <td>
                                <?= $ba['spbu_1']['volume_lo'] ?>
                            </td>
                            <td>
                                <?= $ba['pengukuran_tbbm'] ?>
                            </td>
                            <td>
                                <?= $ba['spbu_1']['pengukuran_spbu_sebelum'] ?>
                            </td>
                            <td>
                                <?= $ba['spbu_1']['pengukuran_spbu_setelah'] ?>
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?= $ba['spbu_2']['tujuan'] ?>
                            </td>
                            <td>
                                <?= $ba['spbu_2']['nomor_lo'] ?>
                            </td>
                            <td>
                                <?= $ba['spbu_2']['produk'] ?>
                            </td>
                            <td>
                                <?= $ba['spbu_2']['volume_lo'] ?>
                            </td>
                            <td>
            
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                <?= $ba['spbu_2']['pengukuran_spbu_sebelum'] ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-end">
                <?php
                if($profile->role == 0):
                if($ba['status'] < 1) : 
                    $nomor = str_replace("/" , "-" ,$ba['nomor_surat']);

                ?>
                <a href="<?= base_url('admin/berita-acara/approve/' . $nomor) ?>" class="btn btn-primary">Approve</a>
                <?php endif;endif; ?>
            </div>
        </div>

    </div>
</div>