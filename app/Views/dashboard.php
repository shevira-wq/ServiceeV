<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .status-pending {
            color: red;
        }

        .status-on-going {
            color: green;
        }

        .status-done {
            color: blue;
        }
    </style>
</head>

<body>

    <main id="main" class="main">

    

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <h4>Selamat datang, <?= session()->get('username'); ?>!</h4>
            </div>
        </div>
        
    </section>

  </main><!-- End #main -->

    <!-- Sale & Revenue Start -->
    <?php if (session()->get('level') == 'Admin') { ?>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Jumlah Pesanan</p>
                            <h6 class="mb-0"><?= $totalOrders ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Sale & Revenue End -->

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Orders</h6>
                <a href="#">Show All</a>
            </div>
            <?php if (empty($darren)) { ?>
                <p>No orders found. Please add some orders to see them here.</p>
            <?php } else { ?>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col" class="hidden-th">Telp</th>
                                <th scope="col" class="hidden-th">Alamat</th>
                                <th scope="col">Merek Genset</th>
                                <th scope="col">Merek Mesin</th>
                                <th scope="col">Kapasitas Genset</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Sistem Pesanan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($darren as $key) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($key['nama_pemilik']) ?></td>
                                    <td class="hidden-td"><?= htmlspecialchars($key['no_telp']) ?></td>
                                    <td class="hidden-td"><?= htmlspecialchars($key['alamat']) ?></td>
                                    <td><?= htmlspecialchars($key['merk_genset']) ?></td>
                                    <td><?= htmlspecialchars($key['merk_mesin']) ?></td>
                                    <td><?= htmlspecialchars($key['kapasitas_genset']) ?></td>
                                    <td><?= htmlspecialchars($key['deskripsi_masalah']) ?></td>
                                    <td><?= htmlspecialchars($key['sistem_pesanan']) ?></td>
                                    <td class="<?= $key['status'] === 'Pending' ? 'status-pending' : ($key['status'] === 'On-Going' ? 'status-on-going' : 'status-done') ?>">
                                        <?= htmlspecialchars($key['status']) ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detailsModal"
                                            data-id="<?= $key['id_pesanan'] ?>"
                                            data-nama="<?= htmlspecialchars($key['nama_pemilik']) ?>"
                                            data-merk-genset="<?= htmlspecialchars($key['merk_genset']) ?>"
                                            data-merk-mesin="<?= htmlspecialchars($key['merk_mesin']) ?>"
                                            data-kapasitas="<?= htmlspecialchars($key['kapasitas_genset']) ?>"
                                            data-deskripsi="<?= htmlspecialchars($key['deskripsi_masalah']) ?>"
                                            data-sistem="<?= htmlspecialchars($key['sistem_pesanan']) ?>"
                                            data-status="<?= htmlspecialchars($key['status']) ?>"
                                            data-notelp="<?= htmlspecialchars($key['no_telp']) ?>"
                                            data-alamat="<?= htmlspecialchars($key['alamat']) ?>"
                                            data-id-teknisi="<?= htmlspecialchars($key['id_teknisi']) ?>">View Details</button>

                                        <button class="btn btn-sm btn-danger" onclick="confirmDelete('<?= base_url('home/hapusp/' . $key['id_pesanan']) ?>')">Delete</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Modal for Order Details -->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="detailsForm" action="<?= base_url('home/editdetail') ?>" method="POST">
                        <input type="hidden" id="orderId" name="orderId">
                        <div class="form-group">
                            <label for="namaPemilik">Nama Pemilik</label>
                            <input type="text" class="form-control" id="namaPemilik" name="nama" readonly>
                        </div>
                        <div class="form-group">
                            <label for="notelp">No. Telp</label>
                            <input type="text" class="form-control" id="notelp" name="notelp" readonly>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" readonly>
                        </div>
                        <div class="form-group">
                            <label for="merkGenset">Merek Genset</label>
                            <input type="text" class="form-control" id="merkGenset" name="merk_genset" readonly>
                        </div>
                        <div class="form-group">
                            <label for="merkMesin">Merek Mesin</label>
                            <input type="text" class="form-control" id="merkMesin" name="merk_mesin" readonly>
                        </div>
                        <div class="form-group">
                            <label for="kapasitas">Kapasitas Genset</label>
                            <input type="text" class="form-control" id="kapasitas" name="kapasitas" readonly>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" readonly></textarea>
                        </div>
                        <div class="form-group">
                            <label for="sistemPesanan">Sistem Pesanan</label>
                            <select class="form-control" id="sistemPesanan" name="sistem" required>
                                <option value="Pick Up">Pick Up</option>
                                <option value="Langsung">Langsung</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Pending">Pending</option>
                                <option value="On-Going">On-Going</option>
                                <option value="Done">Done</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="teknisi">Teknisi</label>
                            <select class="form-control" id="teknisi" name="teknisi">
                                <?php foreach ($technicians as $technician): ?>
                                    <option value="<?= $technician->id_teknisi ?>">
                                        <?= htmlspecialchars($technician->nama_teknisi) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="detailsForm">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Event handler for showing the details modal
        $('#detailsModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var nama = button.data('nama');
            var merkGenset = button.data('merk-genset');
            var merkMesin = button.data('merk-mesin');
            var kapasitas = button.data('kapasitas');
            var deskripsi = button.data('deskripsi');
            var sistem = button.data('sistem');
            var status = button.data('status');
            var notelp = button.data('notelp');
            var alamat = button.data('alamat');
            var teknisiId = button.data('id-teknisi');

            var modal = $(this);
            modal.find('#orderId').val(id);
            modal.find('#namaPemilik').val(nama);
            modal.find('#merkGenset').val(merkGenset);
            modal.find('#merkMesin').val(merkMesin);
            modal.find('#kapasitas').val(kapasitas);
            modal.find('#deskripsi').val(deskripsi);
            modal.find('#sistemPesanan').val(sistem);
            modal.find('#status').val(status);
            modal.find('#notelp').val(notelp);
            modal.find('#alamat').val(alamat);
            modal.find('#teknisi').val(teknisiId);

            var userLevel = '<?= session()->get('level') ?>'; // Assumes user level is available
            if (userLevel !== 'Admin') {
                modal.find('#sistemPesanan').prop('disabled', true);
                modal.find('#status').prop('disabled', true);
            } else {
                modal.find('#sistemPesanan').prop('disabled', false);
                modal.find('#status').prop('disabled', false);
            }
        });

        function confirmDelete(url) {
            if (confirm('Are you sure you want to delete this transaction?')) {
                window.location.href = url;
            }
        }
    </script>

</body>
</html>
