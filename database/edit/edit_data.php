<?php
$id_user = $_GET['id'];
$query = mysqli_query($koneksi," SELECT * FROM user_app WHERE id_user='$id_user'");
$view = mysqli_fetch_array($query);
?>

<section class = "content">
<div class="container-fluid">
           <!-- general form elements disabled -->
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit User App</h3>
        </div>
              <!-- /.card-header -->
            <div class="card-body">
                <form method='post' action='update/update_data.php' enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>username</label>
                        <input type="text" name="username" class="form-control" placeholder="username" value = "<?php echo $view['username'];?>">
                        <input type="text" name="id_user" class="form-control" placeholder="username" value = "<?php echo $view['id_user'];?>" hidden>
                      </div>
                      <div class="form-group">
                        <label>email</label>
                        <input type="email" name="email" class="form-control" placeholder="email" value = "<?php echo $view['email'];?>">
                        <input type="text" name="id_user" class="form-control" placeholder="email" value = "<?php echo $view['id_user'];?>" hidden>
                      </div>
                      <div class="form-group">
                        <label>password</label>
                        <input type="password" name="password" class="form-control" placeholder="password" value = "<?php echo $view['pass'];?>">
                        <input type="password" name="id_user" class="form-control" placeholder="password" value = "<?php echo $view['id_user'];?>" hidden>
                      </div>
                    </div>
                    <!-- <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nim</label>
                        <input type="text" name = "nim" class="form-control" placeholder="Nim" value = "<?php echo $view['nim'];?>">
                      </div>
                    </div> -->
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <!-- <div class="form-group">
                      <label >Semester:</label>
                        <select class="custom-select" name = "semester" required >
                    <option value="<?php echo $view['semester'];?>" selected><?php echo $view['semester'];?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                      </div> -->
                    </div>
                    <div class="col-sm-6">
                    <label class="from-label" for="customFile">Upload Foto</label>
                    <input type="file" name="foto" class="form-control" id="customFile"/>
                    </div>
                  </div>
                  <div class="row"> 
                  <div class="col-sm-12">
                  <img src="foto/<?php echo $view['foto'];?>" width="100px" class="rounded">
                  </div>
                  </div>
                  <div class="row">
                      <button type="submit" class="btn btn-info">Simpan</button>
                  </div>
                </form>
            </div>
              <!-- /.card-body -->
    </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
</div>
</section>