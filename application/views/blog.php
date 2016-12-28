<div class="container" style="text-align:justify;">
      <h1 class="text-center">Informasi Mengenai Duniawi !!!</h1>
      <?php foreach ($record->result_array() as $list) { ?>
      <div class="row">
        <div class="col-sm-4" style="margin:10px 0;">
          <img src="<?php echo base_url(); ?>uploads/blog/<?php echo $list['gambar']; ?>" class="img-responsive" alt="">
        </div>
        <div class="col-sm-8">
          <h2><?php echo $list['judul_blog']; ?></h2>
          <p>
            <?php echo $list['isi_blog']; ?>
          </p>
        </div>
      </div>
      <?php } ?>
    </div>
