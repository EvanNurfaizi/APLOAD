<?php
session_start();

//koneksi db
$conn = mysqli_connect("localhost","root","", "stockbarang");

//menambah barang baru
if(isset($_POST['addnewbarang'])){

    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

    $addtotable = mysqli_query($conn,"insert into stock (namabarang, deskripsi, stock) values ('$namabarang',' $deskripsi',' $stock')");
    if($addtotable){
        header('location:index.php');
    }else{
        echo'gagal';
        header('location:index.php');
    }
}

//menambah barang masuk
if(isset($_POST['barangmasuk'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $QTY = $_POST['QTY'];

    $cekstoksekarang = mysqli_query($conn, "SELECT * FROM stock where idbarang='$barangnya' ");
    $ambildatanya = mysqli_fetch_array($cekstoksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstockbarangsekarangdenganqty = $stocksekarang+$QTY;

    $addtomasuk = mysqli_query($conn, "insert into masuk (idbarang, keterangan, QTY) values ('$barangnya','$penerima','$QTY')");
    $updatemasuk = mysqli_query($conn,"update stock set stock=' $tambahkanstockbarangsekarangdenganqty' where idbarang='$barangnya'");
    if($addtomasuk&&$updatestockmasuk){
        header('location:masuk.php');
    }else{
        echo'gagal';
        header('location:masuk.php');
    }
}

//menambah barang kelauar
if(isset($_POST['barangkeluar'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $QTY = $_POST['QTY'];

    $cekstoksekarang = mysqli_query($conn, "SELECT * FROM stock where idbarang='$barangnya' ");
    $ambildatanya = mysqli_fetch_array($cekstoksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstockbarangsekarangdenganqty = $stocksekarang-$QTY;

    $addtokeluar = mysqli_query($conn, "insert into keluar (idbarang, penerima, QTY) values ('$barangnya','$penerima','$QTY')");
    $updatemasuk = mysqli_query($conn,"update stock set stock=' $tambahkanstockbarangsekarangdenganqty' where idbarang='$barangnya'");
    if($addtokeluar&&$updatestockmasuk){
        header('location:keluar.php');
    }else{
        echo'gagal';
        header('location:keluar.php');
    }
}

//updatebarang
if(isset($_POST['updatebarang'])){
    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];

    $update = mysqli_query($conn, "update stock set namabarang='$namabarang', deskripsi='$deskripsi' where idbarang='$idb'");
    if($update){
        header('location:index.php');
    }else{
        echo'gagal';
        header('location:index.php');
    }

}


//MENGHAPUSBARANG
if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idb'];

    $hapus = mysqli_query($conn, "delete from stock where idbarang='$idb'");
    if($hapus){
        header('location:index.php');
    }else{
        echo'gagal';
        header('location:index.php');
    }

    };

    //MENGUBAH DATA BARANG MASUK
    if(isset($_POST['updatebarangmasuk'])){
        $idb = $_POST['idb'];
        $idm = $_POST['idm'];
        $keterangan = $_POST['keterangan'];
        $QTY = $_POST['QTY'];

        $lihatstock = mysqli_query($conn, "SELECT * FROM stock where idbarang='$idb'");
        $stocknya = mysqli_fetch_array($lihatstock);
        $stockskrg = $stocknya['stock'];

        $QTYskrg = mysqli_query($conn, "SELECT * FROM masuk where idmasuk='$idm'");
        $QTYnya = mysqli_fetch_array($QTYskrg);
        $QTYskrg = $QTYnya['QTY'];

        if($QTY>$QTYskrg){
            $selisih = $QTY-$QTYskrg;
            $kurangin = $stockskrg - $selisih;
            $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb' ");
            $updatenya = mysqli_query($conn, "update masuk set QTY='$QTY', keterangan='$deskripsi' where idm='$idm'");

    }
}

//menambah user access
if(isset($_POST['addnewuser'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $addtotable = mysqli_query($conn,"insert into login (email, password, level) values ('$email',' $password',' $level')");
    if($addtotable){
        header('location:user.php');
    }else{
        echo'gagal';
        header('location:user.php');
    }
}

//update user access
if(isset($_POST['updateuser'])){
    $iduser = $_POST['iduser'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $update = mysqli_query($conn, "update login set email='$email', password='$password', level='$level' where iduser='$iduser'");
    if($update){
        header('location:user.php');
    }else{
        echo'gagal';
        header('location:user.php');
    }

}

//hapus user
if(isset($_POST['hapususer'])){
    $iduser = $_POST['iduser'];

    $hapus = mysqli_query($conn, "delete from login where iduser='$iduser'");
    if($hapus){
        header('location:user.php');
    }else{
        echo'gagal';
        header('location:user.php');
    }
}

//Request Barang
if(isset($_POST['requestbarang'])){
    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $stok = $_POST['stok'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];
    $iduser = $_POST['iduser'];

    $sisa = $stok - $jumlah;

    $addtomasuk = mysqli_query($conn, "insert into masuk (idbarang, keterangan, QTY, iduser, status) values ('$idb','$keterangan','$jumlah','$iduser', 'Diproses')");
    $updatestock = mysqli_query($conn, "update stock set stock='$sisa' where idbarang='$idb'");
    
    if($addtomasuk&&$updatestock){
        header('location:index_penjait.php');
    }else{
        echo'gagal';
        header('location:index_penjait.php');
    }

}

//approve barang
if(isset($_POST['approvebarang'])){
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $qty = $_POST['QTY'];
    $penerima = $_POST['penerima'];
    $keterangan = $_POST['keterangan'];
    $tanggal = date("Y-m-d h:i:s");

    $sisa = $stok - $jumlah;

    $addtokeluar = mysqli_query($conn, "insert into keluar (idbarang, tanggal, penerima, QTY) values ('$idb','$tanggal','$penerima','$qty')");
    $updatemasuk = mysqli_query($conn, "update masuk set status='Approved', keterangan = '$keterangan', approveddate='$tanggal' where idmasuk='$idm'");
    
    if($addtokeluar&&$updatemasuk){
        header('location:masuk.php');
    }else{
        echo'gagal';
        header('location:masuk.php');
    }

}


//reject barang
if(isset($_POST['rejectbarang'])){
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $qty = $_POST['QTY'];
    $penerima = $_POST['penerima'];
    $keterangan = $_POST['keterangan'];
    $tanggal = date("Y-m-d h:i:s");

    $sisa = $stok - $jumlah;

    $updatemasuk = mysqli_query($conn, "update masuk set status='Rejected', keterangan = '$keterangan', approveddate='$tanggal' where idmasuk='$idm'");
    $updatestock = mysqli_query($conn, "update stock set stock = stock + $qty where idbarang='$idb'");
    
    if($addtokeluar&&$updatemasuk){
        header('location:masuk.php');
    }else{
        echo'gagal';
        header('location:masuk.php');
    }

}

?>