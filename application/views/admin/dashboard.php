<section class="content">
    <div class="container-fluid">
        <!-- Hover Zoom Effect -->
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/blog') ?>">
                    <div class="info-box bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">picture_in_picture</i>
                        </div>
                        <div class="content">
                            <div class="text">ARTIKEL</div>
                            <div class="number"><?= count($artikel) ?></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/dosen') ?>">
                    <div class="info-box bg-blue hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="content">
                            <div class="text">DOSEN</div>
                            <div class="number"><?= count($dosen) ?></div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/karyawan') ?>">
                    <div class="info-box bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">group</i>
                        </div>
                        <div class="content">
                            <div class="text">KARYAWAN</div>
                            <div class="number"><?= count($karyawan) ?></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/penelitian') ?>">
                    <div class="info-box bg-cyan hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">book</i>
                        </div>
                        <div class="content">
                            <div class="text">PENELITIAN DOSEN</div>
                            <div class="number"><?= count($penelitian) ?></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/publikasi_artikel') ?>">
                    <div class="info-box bg-orange hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">book</i>
                        </div>
                        <div class="content">
                            <div class="text">PUBLIKASI ARTIKEL</div>
                            <div class="number"><?= count($publikasi_artikel) ?></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/buku') ?>">
                    <div class="info-box bg-light-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">library_books</i>
                        </div>
                        <div class="content">
                            <div class="text">BUKU</div>
                            <div class="number"><?= count($buku) ?></div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/prestasi') ?>">
                    <div class="info-box bg-purple hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">star</i>
                        </div>
                        <div class="content">
                            <div class="text">PRESTASI MAHASISWA</div>
                            <div class="number"><?= count($prestasi) ?></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/pengabdian') ?>">
                    <div class="info-box bg-grey hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">book</i>
                        </div>
                        <div class="content">
                            <div class="text">PENGABDIAN</div>
                            <div class="number"><?= count($pengabdian) ?></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- #END# Hover Zoom Effect -->

        <div class="card">
            <center>
                <h1>Grafik Penelitian</h1>
            </center>
            <div class="ct-chart ct-perfect-fourth" style="height: 400px;"></div>
        </div>
        <style type="text/css">
            .ct-label {
                font-size: 15px;
                color: black;
            }
            h1{padding: 5% 0% 2% 0%;}
        </style>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        var labels = [];
        var jumlahDana = {};
        for (var i = 2011; i <= <?= $year ?>; i++) {
            jumlahDana[i.toString()] = 0;
            labels.push(i);
        }
        var penelitianJson;
        $.get('<?= base_url('admin?json_request=true') ?>', function(response) {
            penelitianJson = JSON.parse(response);
            displayDataByYear(2011);
            for (var i = 0; i < penelitianJson.length; i++) {
                jumlahDana[penelitianJson[i].tahun_penelitian] += parseInt(penelitianJson[i].jumlah_dana);
            }
            var chartSeries = [];
            for (var i = 2011; i <= <?= $year ?>; i++) {
                chartSeries.push(jumlahDana[i.toString()]);
            }
            var chart = new Chartist.Line('.ct-chart', {
                labels: labels,
                series: [
                    chartSeries
                ]}, {
                    fullWidth: true,
                    chartPadding: {
                        right: 40,
                        left: 60,
                        bottom: 20
                    },
                    height: '400px',                    
                    plugins: [
                        Chartist.plugins.ctAxisTitle({
                          axisX: {
                            axisTitle: 'Tahun',
                            axisClass: 'ct-axis-title',
                            offset: {
                              x: 0,
                              y: 40
                            },
                            textAnchor: 'middle'
                          },
                          axisY: {
                            axisTitle: 'Jumlah Dana (Rp.)',
                            axisClass: 'ct-axis-title',
                            offset: {
                              x: 0,
                              y: -10
                            },
                            textAnchor: 'middle',
                            flipTitle: false
                          }
                        })
                      ]
                }
            );
        });

        function displayData(data) {
            var html = '';
            for (var i = 0; i < data.length; i++) {
                html += '<tr>' +
                    '<td>' + (i + 1) +'</td>' +
                    '<td>' + data[i].judul_penelitian +'</td>' +
                    '<td>' + data[i].id_user +'</td>' +
                    '<td>' + data[i].sumber_dana +'</td>' +
                    '<td>' + data[i].jumlah_dana +'</td>' +
                '</tr>';
            }
            $('#penelitian-list').html(html);
        }

        function displayDataByYear(year) {
            var penelitianList = penelitianJson.filter(function(row) {
                return row.tahun_penelitian == year;
            });
            displayData(penelitianList);
        }
    });
</script>
    