<div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Admin Panel</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i><a href="<?php echo base_url(); ?>index.php/admin"> Dashboard</a>
                            </li>
                            <li>
                              <i class="fa fa-list-alt"></i><a href="<?php echo base_url(); ?>index.php/admin/welcome/blog"> Blog</a>
                            </li>
                            <li class="active">
                              <i class="fa fa-list-alt"></i> Tambah Data Blog
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        Tambah Data Blog
                      </div>
                      <div class="panel-body">
                        <form role="form" action="<?php echo base_url(); ?>index.php/admin/welcome/insert_blog" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label>Judul Blog</label>
                            <input class="form-control" type="text" name="judul" value="">
                          </div>
                          <div class="form-group">
                            <label>Isi Blog</label>
                            <textarea class="form-control" rows="5" placeholder="Isi Blog" name="isi" required> </textarea>
                            <!-- <input class="form-control" type="text" name="name" value=""> -->
                          </div>
                          <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="gambar" value="">
                          </div>
                          <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                          <button type="reset" class="btn btn-warning">Bersihkan</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
