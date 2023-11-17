
<div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="<?= base_url('admin') ?>" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li>
                            <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Profil Jurusan</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages" class="collapse ">
                                <ul class="nav">
                                    <?php foreach ($this->sub_menu_m->get(['id_menu' => 1]) as $key): ?>
                                        <li><a href="<?= base_url('admin/profil_jurusan/').$key->id_sub_menu ?>"><?= $key->judul ?></a></li>
                                    <?php endforeach ?>
                                    <li><a href="<?= base_url('admin/menu/2') ?>" class="">Prodi Agribisnis</a></li>
                                    <?php foreach ($this->sub_menu_m->get(['id_menu' => 3]) as $key): ?>
                                        <li><a href="<?= base_url('admin/profil_jurusan/').$key->id_sub_menu ?>"><?= $key->judul ?></a></li>
                                    <?php endforeach ?>

                                </ul>
                            </div>
                        </li>
                        <li><a href="<?= base_url('admin/dosen') ?>" class=""><i class="fa fa-user"></i> <span>Data Dosen</span></a></li>
                        <li>
                            <a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="fa fa-university"></i> <span>Akademik</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages1" class="collapse ">
                                <ul class="nav">
                                    <li><a href="<?= base_url('admin/profil_jurusan/7') ?>" class="">Profil Lulusan</a></li>
                                    <li><a href="<?= base_url('admin/profil_jurusan/8') ?>" class="">Capaian Pembelajaran</a></li>
                                    <li><a href="<?= base_url('admin/mata-kuliah') ?>" class="">Mata Kuliah</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fa fa-home"></i> <span>Laboratorium</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages2" class="collapse ">
                                <ul class="nav">
                                    <li><a href="<?= base_url('admin/profil_jurusan/12') ?>">Laboratorium Ekonometrika</a></li>
                                    <li><a href="<?= base_url('admin/profil_jurusan/13') ?>">Laboratorium Komunikasi Pembangunan Masyrakat</a></li>
                                    <li><a href="<?= base_url('admin/profil_jurusan/14') ?>">Klinik Agribisnis</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="<?= base_url('admin/berkas') ?>" class=""><i class="fa fa-files-o"></i> <span>Berkas</span></a></li>
                        <li>
                            <a href="#subPages8" data-toggle="collapse" class="collapsed"><i class="fa fa-files-o"></i> <span>Borang Akreditasi</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages8" class="collapse ">
                                <ul class="nav">
                                    <li><a href="<?= base_url('admin/borang') ?>" class="">Detail Borang</a></li>
                                    <li><a href="<?= base_url('admin/jenis_borang') ?>" class="">Jenis Borang</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="fa fa-file-o"></i> <span>Data Pendaftaran</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages3" class="collapse ">
                                <ul class="nav">
                                    <?php foreach ($this->jenis_seminar_m->get() as $key): ?>
                                    <li><a href="<?= base_url('admin/pendaftaran_sidang/').$key->id_jenis ?>" class=""><?= $key->nama ?></a></li>    
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </li>
                        <li><a href="<?= base_url('admin/artikel') ?>" class=""><i class="fa fa-newspaper-o"></i> <span>Artikel</span></a></li>
                        <li><a href="<?= base_url('admin/slider') ?>" class=""><i class="fa fa-file-image-o"></i> <span>Foto Depan</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
