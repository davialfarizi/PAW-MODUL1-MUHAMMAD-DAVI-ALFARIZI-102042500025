<?php
$products = [
    [
        'nama' => 'Monitor 24 Inch',
        'kategori' => 'Display',
        'harga' => 1800000,
        'stok' => 4
    ],
    [
        'nama' => 'Laptop Gaming',
        'kategori' => 'computers',
        'harga' => 8500000,
        'stok' => 0
    ],
    [
        'nama' => 'Mouse Wireless',
        'kategori' => 'Accesories',
        'harga' => 250000,
        'stok' => 15
    ],
    [
        'nama' => 'Mechanical Keyboard',
        'kategori' => 'Accessories',
        'harga' => 1200000,
        'stok' => 0
    ],
    [
        'nama' => 'Headset Gaming',
        'kategori' => 'Accessories',
        'harga' => 1200000,
        'stok' => 3
    ],
    [
        'nama' => 'Webcam HD 1080p',
        'kategori' => 'Camera',
        'harga' => 1100000,
        'stok' => 2
    ],
];

$total_produk = count($products);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 0px;
            padding: 120px;
        }
        .productGrid{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        .card{
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
        }
        .badgeDiskon{
            background-color: red;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
        }
        .hargaLama{
            text-decoration: line-through;
            color: #888;
        }
        .statusStok{
            color: green;
            font-weight: bold;
        }
        .statusStok.kosong{
            color: red;
            font-weight: bold;
        }
        .btnBeli{
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btnBeli:disabled{
            background-color: #ccc;
            cursor: not-allowed;
        }   
        @media (max-width: 600px) {
            .productGrid{
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Cia Store</h1>
</header>

<main>
    <h2>Katalog Produk</h2>
    <p>Total Produk: <?php echo $total_produk; ?></p>
    <div class="ProductGrid">
        <?php foreach ($products as $item):
            $hargaAwal = $item['harga'];
            $diskon = $hargaAwal >= 1000000;
            if ($diskon) {
                $hargaDiskon = 0.10 * $hargaAwal;
                $hargaAkhir = $hargaAwal - $hargaDiskon;
            } else {
                $hargaAkhir = $hargaAwal;
            }
            ?>
            <div class="card">
                <?php if  ($diskon) : ?>
                    <span class="bandageDiskon">Diskon 10%</span>
                <?php endif; ?>
                <p style="color: #888; font-size: 12px; margin: 5px 0;"><?php echo $item['kategori']; ?></p></p>
                <h3 style="margin: 5px 0;"><?php echo $item['nama']; ?></h3>

                <div style="marin: 10px">
                    <?php if ($diskon) : ?>
                        <span class="hargaLama">Rp <?php echo number_format($hargaAwal, 0, ',', '.'); ?></span><br>
                        <?php endif; ?>
                        <strong style="color: #007bff; font-size: 16px;">Rp <?php echo number_format($hargaAkhir, 0, ',', '.'); ?></strong>
                </div>

                <p style="font-family: 14px; margin-bottom: 10px;">Stok: <?php echo $item['stok']?></p>

                <?php if ($item['stok'] > 0) : ?>
                    <span style="color: green; font-weight: bold;">Tersedia</span><br><br>
                    <button style="background: #28a745; color: white; border: none; padding: 8px; width: 100%; border-radius: 4px; cursor: pointer;">Beli Sekarang</button>
                <?php else : ?>
                    <span style="color: red; font-weight: bold;">Stok Habis</span><br><br>
                    <button style="background: #ccc; color: #666; border: none; padding: 8px; width: 100%; border-radius: 4px; cursor: not-allowed;" disabled>Stok Habis</button>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</main>

</body>
</html>