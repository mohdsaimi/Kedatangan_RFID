<?php session_start(); ?>
<?php include('config/config.php'); ?>
<?php include('components/head.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>

<!-- //////////////// -->
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="row align-items-center justify-content-center">
            <p></p>
            <h2>Pinda Maklumat Pelajar</h2>
            <p></p>

            <?php
                if((isset($_GET['id_pelajar']))&&(is_numeric($_GET['id_pelajar']))){
                    $id_pelajar=$_GET['id_pelajar'];
                }elseif((isset($_POST['id_pelajar']))&&(is_numeric($_POST['id_pelajar']))){
                    $id_pelajar=$_POST['id_pelajar'];
                }else{
                    echo '<p><font class="font1">Sila hubungi Administrator.</font><p>';
                    exit();
                }
                
                $_SESSION['id_pelajar']=$id_pelajar;

                $sql = "SELECT * FROM pelajar WHERE id_pelajar='$id_pelajar'";
                $result = $conn->query($sql);
                $row1=mysqli_fetch_array($result);

                $nama_pelajar=$row1["nama_pelajar"];
                $id_pelajar=$row1["id_pelajar"];
                $ndp=$row1["ndp"];
            ?>

            <form method="post" action="pelajar.php">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                        <label>Nama Pelajar:</label>
                        </div>
                    </div>
                    <div class="col-md-6"><input type="text" class="form-control" value="<?php echo $nama_pelajar; ?>" id="nama_pelajar" name="nama_pelajar"></div>
                </div>
                
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                        <label>NDP:</label>
                        </div>
                    </div>
                    <div class="col-md-2"><input type="text" class="form-control" value="<?php echo $ndp; ?>" id="ndp" name="ndp"></div>
                </div>

                <button name="butang" value="update" type="update" class="btn btn-outline-secondary">Update</button>
            </form>


        
            
        </div>
    </div>
</div>

<section class="">
    <div class="row">
        &nbsp;
    </div>
</section>
        
<!-- //////////////// -->

<?php include('components/footer.inc.php'); ?>




