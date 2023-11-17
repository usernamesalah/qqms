<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mt-4 mb-4">
                    
            <?= $this->session->flashdata('msg') ?>
                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Cari nomor
                        polisi</h5>

                    <div class="row row-cols-lg-auto gx-3 gy-2 align-items-center">
                        <div class="col-12">
                            <label class="visually-hidden" for="specificSizeInputName">Nomor Polisi </label>
                            <input type="text" id="searchInput" class="form-control" id="specificSizeInputName"
                                placeholder="BGXXXXP">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" onclick="searchData()">Cari</button>
                        </div>
                    </div>
                </div>
                <hr>
                <h4 class="card-title mb-4">Input Hasil Pengukuran</h4>
                <ol class="activity-feed mb-0 ps-2" id="result" style="text-decoration-color: black;">
                </ol>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<script>
    function searchData() {
        var searchTerm = $('#searchInput').val();

        $.ajax({
            type: 'GET',
            url: '<?= base_url('admin/search-ba') ?>',
            data: { q: searchTerm },
            success: function (response) {
                $('#result').html(response);
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    }
</script>