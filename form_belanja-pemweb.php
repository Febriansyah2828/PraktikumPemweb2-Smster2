<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Belanja Online</h2>
        <form method="POST" action="form_belanja.php">
            <div class="mb-3">
                <label class="form-label">Customer</label>
                <input type="text" name="customer" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Pilih Produk</label><br>
                <input type="radio" name="produk" value="TV" required> TV - Rp4.200.000 <br>
                <input type="radio" name="produk" value="Kulkas" required> Kulkas - Rp3.100.000 <br>
                <input type="radio" name="produk" value="Mesin Cuci" required> Mesin Cuci - Rp3.800.000
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Beli</label>
                <input type="number" name="jumlah" class="form-control" min="1" required>
            </div>
            <button type="submit" name="proses" class="btn btn-success">Kirim</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $customer = $_POST['customer'];
            $produk = $_POST['produk'];
            $jumlah = $_POST['jumlah'];
            $harga = 0;

            switch ($produk) {
                case "TV": $harga = 4200000; break;
                case "Kulkas": $harga = 3100000; break;
                case "Mesin Cuci": $harga = 3800000; break;
            }

            $total_belanja = $harga * $jumlah;

            echo "<hr>";
            echo "<h4>Detail Belanja</h4>";
            echo "Nama Customer: <b>$customer</b><br>";
            echo "Produk Pilihan: <b>$produk</b><br>";
            echo "Jumlah Beli: <b>$jumlah</b><br>";
            echo "Total Belanja: <b>Rp" . number_format($total_belanja, 0, ',', '.') . "</b>";
        }
        ?>
    </div>
</body>
</html>