    <?php 
    include 'header_menu.php';
    ?> 
    <!-- short -->
    <div class="using-border py-3">
      <div class="inner_breadcrumb  ml-4">
        <ul class="short_ls">
          <li>
            <a href="index.php">Home</a>
            <span>/ /</span>
          </li>
          <li>Cek Nilai</li>
        </ul>
      </div>
    </div>
    <!-- //short-->
    <!--single page-->
    <form method="get">
    <section class="single page py-lg-4 py-md-3 py-sm-3 py-3" id="single-page">
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title mb-lg-5 mb-md-4 mb-sm-4 mb-3 text-center">Cek Nilai  </h3>
        <div class="row">
            <div class="col-lg-8">
              <?php 
                if (!empty($_GET['nama'])) {?>
                <input type="text" name="nama" class="form-control" value="<?php echo $_GET['nama'] ?>" placeholder="Masukkan Nama atau NISN " >
<?php            }else{
               ?>
              <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama atau NISN " >
              <?php } ?>
            </div>
            <div class="col-lg-4">
              <input type="submit" name="cari" class="form-control btn-primary" value="Cek">
            </div>
        </div>
      </div>
    </form>
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <table width="100%">
            <tr>
              <td>No</td>
              <td>NISN</td>
              <td>Nama Lengkap</td>
              <td>Tempat/Tanggal Lahir</td>
              <td>Tahun Masuk</td>
              <td>Action</td>
            </tr>
          <?php 
            @$nama = $_GET['nama'];
            $no = 1;
            include 'koneksi.php';
            $query = mysqli_query($conn, "SELECT biodata.*, YEAR(timestampp) as tahun FROM biodata WHERE biodata.nisn like '%".$nama."%' or nama_lengkap like '%".$nama."%'");
            while ($data = mysqli_fetch_array($query)) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data['nisn'] ?></td>
                <td><?php echo $data['nama_lengkap'] ?></td>
                <td><?php echo $data['tl'].'/'.$data['tgll'] ?></td>
                <td><?php echo $data['tahun']  ?></td>
                <td><a href="detail_siswa.php?nisn=<?php echo $data['nisn']  ?>&nama=<?php echo $data['nama_lengkap']  ?>" class="form-control btn-primary">Detail</a></td>
              </tr>
      <?php  }
           ?>
           </table>

      </div>
    </section>
    <!--//single page-->
    <?php 
    include 'footer.php';
    ?> 