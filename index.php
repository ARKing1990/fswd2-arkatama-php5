<?php 
require_once("auth.php");
require_once("koneksi.php");
require_once("crud.php");
?> 
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale-1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="icon" href="#">
        <title>Website Husein</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="logout.php">Logout<span class="sr-only"></span></a>
            </li>
            </ul>
        </div>
        </nav>
        <div class="container">
            <div class="card mt-3">
                <div class="card-header bg-primary text-white">
                    Form Pengguna
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" value="<?=@$nnama?>" name="bnama" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="brole" class="form-control">
                                <option value="" disabled selected>Pilih Role Pengguna</option>
                                <option value="<?=@$nrole?>"><?=@$nrole?></option>
                                <option value="Admin">Admin</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" value="<?=@$nemail?>" name="bemail"  class="form-control" placeholder="name@example.com" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" value="<?=@$npassword?>" name="bpassword"  class="form-control" placeholder="Input Password" required>
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" value="<?=@$ntelepon?>" name="btelepon" class="form-control" placeholder="Input Nomor Telepon" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="balamat" class="form-control" placeholder="Input Alamat"><?=@$nalamat?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Unggah Foto</label>
                            <input type="file" class="form-control" name="bimages" required>
                        </div>
                        <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                        <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header bg-success text-white">
                    Data Pengguna
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Avatar</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                        </tr>
                        <?php 
                        $no=1;
                        $tampil = mysqli_query($db, "SELECT * FROM user ORDER BY id_user"); 
                        while($data=mysqli_fetch_array($tampil)):
                        ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td>
                                <a href="index.php?hal=edit&id=<?=$data['id_user']?>" class="btn btn-warning">Edit</a>
                                <a href="index.php?hal=hapus&id=<?=$data['id_user']?>" onclick="return confirm ('Yakin mehapus data ini?')" class="btn btn-danger">Hapus</a>
                            </td>
                            <td><?=$data['images']?></td>
                            <td><?=$data['nama']?></td>
                            <td><?=$data['email']?></td>
                            <td><?=$data['telepon']?></td>
                            <td><?=$data['role']?></td>
                        </tr>
                        <?php endwhile;?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>