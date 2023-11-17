<style type="text/css">
	#slider{
		margin-top: -20px;
	}
	.item img{
		width: 1400px !important;
		height: 400px !important; 
	}
	.item h1{
		color: white;
	}
	.carousel-caption{
		background: rgba(34,139,34,0.8);
		border-radius: 20px;
	}
</style>
<div class="row well-sm" align="center">
  <div class="col-sm-12" align="center">
    <img src ="<?= base_url('assets/img') ?>/logo-unsri-Copy.png" style="align-items: center;max-width:8%; float:center; margin-right:10px; margin-bottom:10px;" class="img"/>
  <h3>Program Studi Agribisnis<br>Fakultas Pertanian<br> Universitas Sriwijaya</h3>
  </div>
</div>
<br>
<section id="slider">
	<div class="row">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		  	<?php 
		  		$i = 0; foreach ($data_slider as $col): 
		  		if ($i == 0) { 
		  	?>
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<?php } else { ?>
					<li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>"></li>
				<?php } ?>
				<?php $i++; ?>
			<?php endforeach; ?>
		  </ol>

		  <div class="carousel-inner" role="listbox">
		  	<?php $i = 1; foreach ($data_slider as $col):
		  		if ($i == 1) { ?>
				    <div class="item active">
					      <img src="<?= base_url("assets/img/slider/").$col->id_slider.'.jpg' ?>" alt="Agribisnis Pertanian">
				      <div class="carousel-caption" style="color:white;opacity: 20%; background-color: transparent;">
				        <h1>JURUSAN SOSIAL EKONOMI PERTANIAN
FAKULTAS PERTANIAN UNIVERSITAS SRIWIJAYA
</h1>
				      </div>
				    </div>
				    <?php $i++; ?>
				<?php } else { ?>
					<div class="item">
				      <img src="<?= base_url("assets/img/slider/").$col->id_slider.'.jpg' ?>" alt="Agribisnis Pertanian">
				      <!-- <div class="carousel-caption">
				        <h1><?= $col->nama ?></h1>
				      	<p style="color:black;">
				      		<?php
				      			$detailp = substr($col->penjelasan, 0, 300);
				      			echo $detailp.'...';
				      		?>
				      	</p>
				      </div> -->
				    </div>
				    <?php $i++; ?>
				<?php } ?>
			<?php endforeach; ?>
		  </div>

		  <!-- Wrapper for slides -->
<!-- 		  <div class="carousel-inner" role="listbox">
		  	<?php foreach($data_slider as $col): ?>
		    <div class="item">
		    	<a href="">
		    		<img src="<?= base_url("assets/img/dummy3.jpg") ?>" alt="Agribisnis Pertanian">
		    	</a>
		    </div>
		  	<?php endforeach; ?>
		  </div>

 -->
		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="fa fa-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="fa fa-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
</section>

<hr>
		<div class="row">
			<div class="col-md-9">
				<div style="margin-bottom: 2%;">
					<ul class="breadcrumb">
					  <li class="active">Home</li>
					</ul>
				</div>
		<h4 align="left"><b>Berita dan Pengumuman</b></h4>
	    <hr>

	    <div class="list-group">
	    <?php foreach ($blog as $key): ?>
	      <div class="row list-group-item">
	      	<div class="col-md-4">
	      		<img src="<?=base_url('assets/img/blog/').$key->header.'.jpg' ?>" class="img img-responsive img-thumbnail">
	      	</div>
	      	<div class="col-md-8">
	      		<h3 class="list-group-item-heading">List group item heading</h3>
	      		<small><i>Posted by <?= $key->penerbit ?> at <?= $this->tanggal->convert_date($key->post_date, true) ?> &nbsp; /  <?= $this->kategori_m->get_row(['id_kategori' => $key->id_kategori])->nama ?></i></small>
	        	<p class="list-group-item-text"><?= substr($key->isi, 0,100) ?></p>
	        	<a href="<?=base_url('home/artikel/').$key->id_blog ?>" class="btn btn-primary pull-right">Read More</a>
	      	</div>
	      </div>
	      <br>
	    <?php endforeach ?>
	    </div>
	    <hr>