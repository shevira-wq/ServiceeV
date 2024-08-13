<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teknisi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h6 {
            color: #007bff;
        }
        .form-container .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .form-container .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h6 class="mb-4 text-center">Tambah Teknisi</h6>
                    <form action="<?= base_url('home/aksitteknisi') ?>" method="post">
                        <!-- Nama -->
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama">  
                        </div>
                        <div class="form-group">
                            <label for="nama">No. Telp</label>
                            <input type="text" class="form-control" name="notelp">  
                        </div>
                        <!-- Alamat -->
                        <div class="form-group">
                            <label for="alamat">Email</label>
                            <input type="text" class="form-control" name="email">  
                        </div>




                        <!-- Sistem Pemesanan -->
                        <!-- <fieldset class="form-group"> -->
                            <!-- <legend>Sistem Pemesanan</legend> -->
                            <!-- <div class="form-check"> -->
                                <!-- <input class="form-check-input" type="radio" name="sistemPemesanan" id="sistemOnline" value="online"> -->
                                <!-- <label class="form-check-label" for="sistemOnline"> -->
                                    <!-- Pick Up -->
                                <!-- </label> -->
                            <!-- </div> -->
                            <!-- <div class="form-check"> -->
                                <!-- <input class="form-check-input" type="radio" name="sistemPemesanan" id="sistemOffline" value="offline"> -->
                                <!-- <label class="form-check-label" for="sistemOffline"> -->
                                   <!-- On the Spot/Langsung ditempat -->
                                <!-- </label> -->
                            <!-- </div> -->
                        <!-- </fieldset> -->

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-block">Add Teknisi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>