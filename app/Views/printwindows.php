<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
        @media print {
            @page {
                size: landscape; /* Mengatur ukuran halaman menjadi landscape */
                margin: 20mm; /* Margin halaman */
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
            }
            th {
                background-color: #f2f2f2;
                text-align: center;
            }
            td {
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <h3><?= 'Tanggal Awal: ' . $tanggal_mulai . ' - Tanggal Akhir: ' . $tanggal_akhir ?></h3>
    <table>
        <thead>
            <tr>
                <th>No. Transaksi</th> <!-- Ganti "No" dengan "No. Transaksi" -->
                <th>Nama Pemilik</th>
                <th>Jenis Service</th>
                <th>Harga</th>
                <th>Bayar</th>
                <th>Kembalian</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php if (is_array($satu) || $satu instanceof Traversable): ?>
                <?php
                $no = 1;
                foreach ($satu as $key) {
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($key->no_transaksi) ?></td> <!-- Ganti nomor urut dengan data transaksi -->
                        <td><?= htmlspecialchars($key->nama_pemilik) ?></td>
                        <td><?= htmlspecialchars($key->jenis_service) ?></td>
                        <td><?= number_format($key->harga, 2, ',', '.') ?></td>
                        <td><?= number_format($key->bayaran, 2, ',', '.') ?></td>
                        <td><?= number_format($key->kembalian, 2, ',', '.') ?></td>
                        <td><?= htmlspecialchars($key->tanggal) ?></td>
                    </tr>
                    <?php
                }
                ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No data available for the given date range.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script>
        window.onload = function() {
            window.print(); // Automatically trigger print dialog
        }
    </script>

</body>
</html>