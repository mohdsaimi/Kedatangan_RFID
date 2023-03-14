<?php session_start(); ?>
<?php include('config/config.php'); ?>
<?php include('components/head.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>

<!-- //////////////// -->
<div class="container">

    <div class="row align-items-center justify-content-center">
        <div class="row align-items-center justify-content-center">

            <p></p>
            <h2>Senarai Daftar Pelajar</h2>
            <p></p>

            <?php

            if(count($_POST)>0) {
                $butang=$_POST['butang'];

                //echo $butang;

                if($butang=="update"){
                    $nama_pelajar=$_POST['nama_pelajar'];
                    $ndp=$_POST['ndp'];	
                    $id_pelajar=$_SESSION['id_pelajar'];
    
                    mysqli_query($conn,"UPDATE pelajar set nama_pelajar='$nama_pelajar', ndp='$ndp' WHERE id_pelajar= '$id_pelajar'");
                    $message = "Record Modified Successfully";
                }elseif($butang=="save"){
                    $nama_pelajar=$_POST['nama_pelajar'];
                    $ndp=$_POST['ndp'];	

                    $sql = "INSERT INTO pelajar (nama_pelajar,ndp) VALUES ('$nama_pelajar','$ndp')";
                    if (mysqli_query($conn, $sql)) {
                        $message ="New record created successfully !";
                    } else {
                        $message ="Error: " . $sql . "" . mysqli_error($conn);
                    }
                    
                }


            }else{
                $message="";
            }

            if(!empty($message)){

                echo '<font color=green><b>'.$message.'</b></font>';
            }

            $sql = "SELECT * FROM pelajar";
            $result = $conn->query($sql);

            if ($result->num_rows > 0){
                $bil=1;
                echo '
                    <table class="table table-striped"><thead>
                    <tr>
                        <th>Bil.</th>
                        <th>Nama Pelajar</th>
                        <th>NDP</th>
                        <th>Action</th>
                    </tr></thead><tbody>
                ';


                    $sql = "SELECT * FROM pelajar ORDER BY id_pelajar ASC";
                    $result = $conn->query($sql);

                    while($row1=mysqli_fetch_array($result)){

                    $nama_pelajar=$row1["nama_pelajar"];
                    $id_pelajar=$row1["id_pelajar"];
                    $ndp=$row1["ndp"];

                    echo '<tr>
                            <td>'.$bil.'</td>
                            <td>'.$nama_pelajar.'</td>
                            <td>'.$ndp.'</td>
                            <td><a target="_self" href=pinda.php?id_pelajar='.$id_pelajar.'><button type="button" class="btn btn-outline-secondary">
                            Pinda
                            </button></a>
                            </td>
                        </tr>';
                    $bil++;

                    }
                    
                }else{

                    }
echo '</tbody></table>';
	
?>

<p>
    <a target="_self" href=add_pelajar.php>
    <button type="button " class="btn btn-outline-success mb-3"><h3><b>+</b></h3></button></a>
</p>

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




