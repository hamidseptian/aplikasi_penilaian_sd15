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
          <li>Cek Nilai </li>
        </ul>
      </div>
    </div>
    <!-- //short-->
    <!--single page-->
    <section class="single page py-lg-4 py-md-3 py-sm-3 py-3" id="single-page">
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title mb-lg-5 mb-md-4 mb-sm-4 mb-3 text-center">Cek Nilai <?php echo $_GET['nama'] ?> </h3>
        <table width="100%">
            <tr>
              <td>No</td>
              <td>Semester</td>
              <td>Action</td>
            </tr>
          <?php 
            @$nisn = $_GET['nisn'];
            // echo $nisn;
            $no = 1;
            include 'koneksi.php';
            $qnilai= "SELECT nilai.* FROM nilai WHERE nilai.nisn = '$nisn' GROUP by nilai.sem";
            $query = mysqli_query($conn, $qnilai);
            while ($data = mysqli_fetch_array($query)) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data['sem'] ?></td>
                <td><a target="_blank" href="lap_nilai_siswa.php?nisn=<?php echo $data['nisn'] ?>&sem=<?php echo $data['sem'] ?>" class="form-control btn-primary"><center>Cek</center></a></td>
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