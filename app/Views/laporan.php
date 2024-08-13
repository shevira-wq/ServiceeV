<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Laporan Pemesanan</h3>
            </div>
        </div>
    </div>

    <section id="print-options">
        <div class="row match-height">
            <!-- Print Options -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Print Options</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="awal">Tanggal Awal</label>
                                            <input type="date" class="form-control" id="awal" name="tanggal1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="akhir">Tanggal Akhir</label>
                                            <input type="date" class="form-control" id="akhir" name="tanggal2" required>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" formaction="<?= base_url('home/printpdf') ?>" class="btn btn-primary me-1 mb-1">Print PDF</button>
                                        <button type="submit" formaction="<?= base_url('home/printexcel') ?>" class="btn btn-primary me-1 mb-1">Print Excel</button>
                                        <button type="submit" formaction="<?= base_url('home/printwindows') ?>" target='_blank' class="btn btn-primary me-1 mb-1 print-windows-btn">Print Windows</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
