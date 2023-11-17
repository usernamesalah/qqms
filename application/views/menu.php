<!-- <div class="container"> -->
	<h4 align="center"><b>
		<?php 
			if ($this->uri->segment(2) == 'menu') {
				echo $menu->nama;
			}
			else
				echo $menu->judul;
		?>
	</b></h4>
	<br>
	<div>
		<?php 
			if ($this->uri->segment(2) == 'menu') {
				echo $menu->detail_menu;
			}
			else
				echo $menu->isi;
		?>
		<?php if ($this->uri->segment(3) == 9): ?>
			<table class="table table-hover table-responsive table-bordered">
				<thead align="center">
					<tr align="center">
						
						<th>Semester	</th>
						<th>Kode Makul</th>
						<th>Mata Kuliah</th>
						<th>SKS</th>
						<th>Prasyarat</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($makul as $key): ?>
						<?php if ($key->kode_makul == null): ?>
						<?php continue; ?>
					<?php endif ?>
					<tr>	
						<td><?=$key->semester?></td>
						<td><?=$key->kode_makul?></td>
						<td><?=$key->nama_makul?></td>
						<td><?=$key->sks?></td>
						<td><?=$key->prasyarat?></td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		<?php elseif($this->uri->segment(3) == 10): ?>
			<table class="table table-hover table-responsive table-bordered">
				<tbody>
					<?php foreach ($makul as $value): ?>
					<?php if ($value->kode_makul == null): ?>
						<?php continue; ?>
					<?php endif ?>
					<tr>
						<td width="30%"><?=$value->nama_makul .' ('. $value->kode_makul .')'?></td>
						<td><?=$value->deskripsi?></td>
					</tr>
					<?php endforeach ?>
					
				</tbody>
			</table>
		<?php elseif($this->uri->segment(3) == 11): ?>
			<table class="table table-bordered" align="center" style="text-align: center;">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>Bidang Keahlian</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=0; foreach ($dosen as $key): ?>
					<tr>
						<td><?= ++$i ?></td>
						<td><?= $key->NIP ?></td>
						<td><?= $key->nama ?></td>
						<td>
							<ul>
								<?php foreach ($this->makul_ajar_m->get(['id_dosen' => $key->NIP]) as $v): ?>
									<li><?= $this->mata_kuliah_m->get_row(['kode_makul' => $v->id_makul])->nama_makul ?></li>
								<?php endforeach ?>
							</ul>
						</td>
					</tr>	
					<?php endforeach ?>
					
				</tbody>
			</table>
		<?php endif; ?>
	</div>
<!-- </div> -->
