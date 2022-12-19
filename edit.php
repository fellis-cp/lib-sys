
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <title>Edit Buku</title>
 </head>
 <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">Edit Buku</h1>
          <hr style="height: 1px;color: black;background-color: black;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 mx-auto">
          <?php
              include 'model.php';
              $model = new Model();
              $id = $_REQUEST['id'];
              $row = $model->edit($id);
 
              if (isset($_POST['update'])) {
                if (isset($_POST['judulbuku']) && isset($_POST['penulis']) && isset($_POST['penerbit']) && isset($_POST['isbn'])) {
                  if (!empty($_POST['judulbuku']) && !empty($_POST['penulis']) && !empty($_POST['penerbit']) && !empty($_POST['isbn']) ) {
                     
                    $data['id'] = $id;
                    $data['judulbuku'] = $_POST['judulbuku'];
                    $data['penerbit'] = $_POST['penerbit'];
                    $data['penulis'] = $_POST['penulis'];
                    $data['isbn'] = $_POST['isbn'];
 
                    $update = $model->update($data);
 
                    if($update){
                      echo "<script>alert('record update successfully');</script>";
                      echo "<script>window.location.href = 'index.php';</script>";
                    }else{
                      echo "<script>alert('record update failed');</script>";
                      echo "<script>window.location.href = 'index.php';</script>";
                    }
 
                  }else{
                    echo "<script>alert('empty');</script>";
                    header("Location: edit.php?id=$id");
                  }
                }
              }
          ?>
          <form action="" method="post">
            <div class="form-group">
              <label for="">Judulbuku</label>
              <input type="text" name="judulbuku" value="<?php echo $row['judulbuku']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Penulis</label>
              <input type="penulis" name="penulis" value="<?php echo $row['penulis']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Penerbit </label>
              <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Isbn</label>
              <textarea name="isbn" id="" cols="" rows="3" class="form-control"><?php echo $row['isbn']; ?></textarea>
            </div>
            <div class="form-group">
              <button type="submit" name="update" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>