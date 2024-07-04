<h2>Tampilkan Barang</h2> 
<?php 
$s = "SELECT * FROM tb_barang"; 
$q = mysqli_query($cn, $s) or die(mysqli_error($cn)); 

$jumlah_barang = mysqli_num_rows($q); 

if ($jumlah_barang > 0) { 
    echo 'Stock Barang Tersedia sebanyak ' . $jumlah_barang; 

    while ($d = mysqli_fetch_assoc($q)) { 
        echo " 
        <div class='card'> 
            <div>{$d['nama_barang']}</div> 
            <img src='{$d['gambar']}' class='gambar' /> 
            <div>{$d['harga_jual']}</div> 
            <a href='order.php?kode_barang={$d['kode_barang']}'> 
                <button>Beli</button> 
            </a> 
            <button>Edit</button> 
            <button>Delete</button> 
        </div>"; 
    } 

    echo " 
    <div class='card form-add'> 
        <h3>Tambah Barang</h3> 
        <form method='post' action='tambah_barang.php' enctype='multipart/form-data'> 
            <input type='text' name='nama_barang' placeholder='Nama barang' required> 
            <input type='file' name='gambar' accept='.jpg,.png' required> 
            <input type='text' name='harga_jual' placeholder='Harga jual' required> 
            <input type='text' name='harga_beli' placeholder='Harga beli' required> 
            <input type='text' name='satuan' placeholder='Satuan' required> 
            <input type='text' name='kategori' placeholder='Kategori' required> 
            <input type='text' name='stock' placeholder='Stock' required> 
            <br> 
            <button type='submit'>Add</button> 
        </form> 
    </div>"; 
} else { 
    echo 'Stock Barang Habis'; 
} 

mysqli_close($cn); 
?>
