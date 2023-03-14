<?php session_start(); ?>
<?php include('config/config.php'); ?>
<?php include('components/head.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>

<script>
  export default {
    data() {
      return {
        value: ''
      }
    }
  }
</script>

<!-- //////////////// -->
<div class="container">

    <div class="row align-items-center justify-content-center">
        <div class="row align-items-center justify-content-center">

            <p></p>
            <h2>Laporan Kehadiran Pelajar</h2>
            <p></p>

            <form method="post" action="">
            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                    <label>Tarikh:</label>
                    </div>
                </div>
                <div class="col-sm-2"><input type="date" class="form-control" id="tarikh" name="tarikh"></div>
                <div class="col-md-1"><button name="butang" value="view" type="view" class="btn btn-outline-secondary">View</button></div>
                <div class="col-md-1">&nbsp;</div>
            </div>
            </form>
            <p></p>
            <p></p>

            <?php

            if(count($_POST)>0) {
                $butang=$_POST['butang'];

                //echo $butang;

                if($butang=="view"){
                    $tarikh=$_POST['tarikh'];

                    $message = $tarikh;



/* kgjdoifjgpdjsf[gpjdfji] */



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
                                <th>Kedatangan '.$tarikh.'</th>
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


                            /* SELECT * FROM `iog_in_pelajar` WHERE `masa` BETWEEN '2023-03-14 13:00:00' AND '2023-03-14 15:00:00' */
        
                            }
                            
                        }else{
        
                            }
        echo '</tbody></table>';






/* ohgofdsjfodsjgofjdojgreio */








                }


            }else{
                $message="Sila pilih tarikh !";
            }

            if(!empty($message)){

                echo '<font color=green><b>'.$message.'</b></font>';
            }


	
?>

<p>
<!--     <a target="_self" href=add_pelajar.php>
    <button type="button " class="btn btn-outline-success mb-3"><h3><b>+</b></h3></button></a> -->
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




