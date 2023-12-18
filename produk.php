<div class="row text-center">
    <?php   
    include 'koneksi.php';
    $sql="select * from produk order by id_produk desc";
    $hasil=mysqli_query($kon,$sql);
    $jumlah = mysqli_num_rows($hasil);
    if ($jumlah>0){
        while ($data = mysqli_fetch_array($hasil)):
    ?>
    <div class="col-sm-3">
        <div class="thumbnail">
            <a href="#"><img src="img/<?php echo $data['gambar'];?>" width="100%" alt="Cinque Terre"></a>
            <div class="caption">
                <h5><?php echo $data['keterangan'];?></h5>
                <h6>Rp. <?php echo number_format($data['harga'],2,',','.'); ?> </h6>
                <p><a href="mainpage.php" class="btn btn-primary btn-block" role="button">Masuk Untuk Membeli</a></p>
            </div>
        </div>
    </div>
    <?php 
        endwhile;
    }else {
        echo "<div class='alert alert-warning'> Tidak ada produk pada kategori ini.</div>";
    };
    ?>
</div>