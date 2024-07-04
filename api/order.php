<h2>Order Barang</h2> 

<?php 
include 'conn.php'; 
include 'style.php'; 

$kode_barang = $_GET['kode_barang'] ?? die('Page ini membutuhkan parameter kode barang.'); 

$kode_barang = mysqli_real_escape_string($cn, $kode_barang); 

$cn = mysqli_connect("localhost", "root", "", "db_tokoagni"); 
    if (!$cn) { 
        die('Koneksi database gagal: ' . mysqli_connect_error()); 
    } 
$s = "SELECT * FROM tb_barang WHERE kode_barang = '$kode_barang'"; 
$q = mysqli_query($cn, $s) or die(mysqli_error($cn)); 

$d = mysqli_fetch_assoc($q); 

if ($d) { 
    echo " 
    <form method='post' class='card form-order' action='order-handler.php'> 
        <div>{$d['nama_barang']}</div> 
        <img src='{$d['gambar']}' class='gambar'/> 
        <div>{$d['harga_jual']}</div> 
        <div class='card form-add'> 
            <input type='text' name='nama_pembeli' placeholder='Nama Pembeli' required minlength='3' maxlength='30'> 
            <input type='text' name='nomor_whatsapp' placeholder='No WhatsApp' required minlength='10' maxlength='14'> 
            <input type='number' name='jumlah_pesanan' placeholder='Jumlah Pesanan' required min='1' max='999' value='1'> 
            <input type='hidden' name='kode_barang' value='$kode_barang'>
            <button name='btn_order'>Order Via Whatsapp</button> 
        </div> 
    </form> 
    "; 
} else { 
    echo "Barang dengan kode '$kode_barang' tidak ditemukan."; 
} 
?>
