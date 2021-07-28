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
          <li>Detail Pengumuman</li>
        </ul>
      </div>
    </div>
    <!-- //short-->
    <!--single page-->
    <section class="single page py-lg-4 py-md-3 py-sm-3 py-3" id="single-page">
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title mb-lg-5 mb-md-4 mb-sm-4 mb-3 text-center">Detail Pengumuman </h3>
        <div class="row">
          <?php 
            include 'koneksi.php';
            $id = $_GET['id'];
            $result = mysqli_query($conn, "SELECT * FROM berita WHERE id = '$id'");
            $data = mysqli_fetch_array($result);
           ?>
          <div class="col-lg-6 color-img-three">
            <img src="<?php echo $data['gambar'] ?>" alt="news image" class="img-fluid">
          </div>
          <div class="col-lg-6 blog-left-sub">
            <h4 class="pb-3"><?php echo $data['judul'] ?></h4>
            <p><?php echo $data['isi'] ?>
            </p>
          </div>
        </div>
      </div>
    </section>
    <!--//single page-->
    <?php 
    include 'footer.php';
    ?> 