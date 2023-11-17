<!-- <div class="container">
	<h2 class="page-title"><b>Data Mata Kuliah</b></h2>
	<div class="row">
		<div class="col-md-12"> -->
			<!-- TABLE NO PADDING -->
			<!-- <?= $this->session->flashdata('msg') ?>
			<div class="clearfix">
				<button class="btn btn-xs btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah</button>
			</div>
			<hr>
			<div class="panel">
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>ASDASD</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div> -->

    <h4 align="left"><b>FORM PENDAFTARAN UJIAN SKRIPSI </b></h4>
    <hr>


			<?=form_open_multipart('home/pendaftaran_sidang')?>

    		<div class="form-group">
				<label>Nama</label>
				<input class="form-control" type="text" name="nama" required>
			</div>
			<div class="form-group">
				<label>NIM</label>
				<input class="form-control" type="text" name="nim" required>
			</div>
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select name="jenis_sidang" class="form-control" data-live-search="true">
                    <option>-- Pilih --</option>
                    <?php foreach ($jenis_kelamin as $row):?>
                    <option value="<?=$row->id_jenis_kelamin?>"><?=$row->nama?></option>
                    <?php endforeach;?>
                </select>
			</div>
			<div class="form-group">
				<label>Angkatan</label>
				<select name="angkatan" class="form-control" required>
					<option>-- Pilih --</option>
					<?php for($i=date("Y"); $i>=2011; $i--): ?>
						<option value="<?= $i ?>"><?= $i ?></option>
					<?php endfor; ?>
				</select>
			</div>
			<div class="form-group">
				<label>Jenis Sidang</label>
				<select name="jenis_sidang" class="form-control" data-live-search="true">
                    <option>-- Pilih --</option>
                    <?php foreach ($jenis_seminar as $row):?>
                    <option value="<?=$row->id_jenis?>"><?=$row->nama?></option>
                    <?php endforeach;?>
                </select>
			</div>
			<div class="form-group">
				<label>Pembimbing 1</label>
				<select name="pembimbing1" class="form-control" data-live-search="true">
                    <option>-- Pilih --</option>
                    <?php foreach ($dosen as $row):?>
                    <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                    <?php endforeach;?>
                </select>
			</div>
			<div class="form-group">
				<label>Pembimbing 2</label>
				<select name="pembimbing2" class="form-control" data-live-search="true">
                    <option>-- Pilih --</option>
                    <?php foreach ($dosen as $row):?>
                    <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                    <?php endforeach;?>
                </select>
			</div>
			<div class="form-group">
				<label>Dosen Penguji 1</label>
				<select name="penguji1" class="form-control" data-live-search="true">
                    <option>-- Pilih --</option>
                    <?php foreach ($dosen as $row):?>
                    <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                    <?php endforeach;?>
                </select>
			</div>
			<div class="form-group">
				<label>Dosen Penguji 2</label>
				<select name="penguji2" class="form-control" data-live-search="true">
                    <option>-- Pilih --</option>
                    <?php foreach ($dosen as $row):?>
                    <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                    <?php endforeach;?>
                </select>				</div>
			<div class="form-group">
				<label>Dosen Penguji 3</label>
				<select name="penguji3" class="form-control" data-live-search="true">
                    <option>-- Pilih --</option>
                    <?php foreach ($dosen as $row):?>
                    <option value="<?=$row->NIP?>"><?=$row->nama?></option>
                    <?php endforeach;?>
                </select>
			</div>
			<div class="form-group">
				<label>Judul Makalah Seminar</label>
				<input class="form-control" type="text" name="judul_makalah" required>
			</div>
			<div class="form-group">
				<label>Upload File</label>
                <input type="file" id="upload_file" name="file">
            </div>
			<div class="form-group">
				<label>Hari</label>
				<select name="hari" class="form-control" data-live-search="true">
                    <option>-- Pilih --</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                </select>
			</div>
			<div class="form-group">
                <label for="tanggal">Tanggal</label>
                <div class="input-group date">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                      <input type="text" name="tanggal" class="form-control" placeholder="YYYY-MM-DD">
                </div>
          	</div>
			<div class="form-group">
				<label>Pukul</label>
				<input class="form-control" type="text" name="waktu" required>
			</div>
			<div class="form-group">
				<label>Tempat</label>
				<input class="form-control" type="text" name="tempat" required>
			</div>
			<input type="submit" name="tambah" value="Simpan" class="btn btn-primary">

			<?=form_close();?>