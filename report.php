<?php session_start(); ?>
<?php include('config/config.php'); ?>
<?php include('components/head.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>

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
                    <label>Tarikh :</label>
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

            //$_SESSION['tarikh'] = $tarikh;

            if(count($_POST)>0) {
                $butang=$_POST['butang'];
                
                //echo $butang;

                if($butang=="view"){
                    $tarikh=$_POST['tarikh'];

                    $newDate = date("d-m-Y", strtotime($tarikh));  
                    $newDate2 = date("Y-m-d", strtotime($tarikh));  
                    $_SESSION['tarikh'] = $newDate2;
                    
                    //$message = $tarikh;


            /* kgjdoifjgpdjsf[gpjdfji] */



                    $sql = "SELECT * FROM pelajar";
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0){
                        $bil=1;
                        echo '
                            <table class="table table-striped"><thead>
                            <tr>
                                <th rowspan="3" style="vertical-align: middle">Bil.</th>
                                <th rowspan="3" style="vertical-align: middle">Nama Pelajar</th>
                                <th rowspan="3" style="vertical-align: middle">NDP</th>
                                <th colspan="5" style="text-align: center">Kedatangan '.$newDate.'</th>
                            </tr>
                            <tr>
                                <th style="text-align: center">1</th>
                                <th style="text-align: center">2</th>
                                <th style="text-align: center">3</th>
                                <th style="text-align: center">4</th>
                                <th style="text-align: center">5</th>
                            </tr>
                            <tr>
                                <th style="text-align: center">0800-0930</th>
                                <th style="text-align: center">1000-1130</th>
                                <th style="text-align: center">1130-1300</th>
                                <th style="text-align: center">1400-1530</th>
                                <th style="text-align: center">1530-1700</th>
                            </tr>
                            </thead><tbody>
                        ';
        
        
                            $sql = "SELECT * FROM pelajar ORDER BY id_pelajar ASC";
                            $result = $conn->query($sql);
        
                            while($row1=mysqli_fetch_array($result)){
        
                            $nama_pelajar=$row1["nama_pelajar"];
                            $id_pelajar=$row1["id_pelajar"];
                            $ndp=$row1["ndp"];

                            $slota="$tarikh 07:30:00";
                            $slot1a="$tarikh 08:05:00";
                            $slot1b="$tarikh 08:15:00";
                            $slot1c="$tarikh 09:45:00";
                            $slot2a="$tarikh 10:05:00";
                            $slot2b="$tarikh 10:15:00";
                            $slot2c="$tarikh 11:15:00";
                            $slot3a="$tarikh 11:35:00";
                            $slot3b="$tarikh 11:45:00";
                            $slot3c="$tarikh 13:30:00";
                            $slot4a="$tarikh 14:05:00";
                            $slot4b="$tarikh 14:15:00";
                            $slot4c="$tarikh 15:15:00";
                            $slot5a="$tarikh 15:35:00";
                            $slot5b="$tarikh 15:15:00";
                            $slotb="$tarikh 16:00:00";

                            //slot 1

                            $sql_slot1 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slota' AND '$slot1a' ORDER BY masa DESC";
                            $result_slot1 = $conn->query($sql_slot1);
        
                            if ($result_slot1->num_rows > 0){
                                $row1=mysqli_fetch_array($result_slot1);
                                $masa=$row1["masa"];
                                $newTime = date("h:i", strtotime($masa)); 

                                $slot1="1 - $newTime";
                                $color_1="#BBFFB8";  //green
                            }else{
                                $sql_slot1_L = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot1a' AND '$slot1b' ORDER BY masa DESC";
                                $result_slot1_L = $conn->query($sql_slot1_L);
                                if ($result_slot1_L->num_rows > 0){
                                    $row1=mysqli_fetch_array($result_slot1_L);
                                    $masa=$row1["masa"];
                                    $newTime = date("h:i", strtotime($masa)); 

                                    $slot1="L - $newTime";
                                    $color_1="#FCFFB8";  //yellow

                                }else{
                                    $sql_slot1_0 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot1b' AND '$slot1c' ORDER BY masa DESC";
                                    $result_slot1_0 = $conn->query($sql_slot1_0);
                                    if ($result_slot1_0->num_rows > 0){
                                        $row1=mysqli_fetch_array($result_slot1_0);
                                        $masa=$row1["masa"];
                                        $newTime = date("h:i", strtotime($masa)); 

                                        $slot1="0 - $newTime";
                                        $color_1="#FFB8B8";     //red

                                    }else{
                                        $slot1="0 - Tidak Hadir";
                                        $color_1="#FFB8B8";     //red
                                    }
                                }
                            }
        
                            //slot 2

                            $sql_slot2 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot1c' AND '$slot2a' ORDER BY masa DESC";
                            $result_slot2 = $conn->query($sql_slot2);
        
                            if ($result_slot2->num_rows > 0){
                                $row1=mysqli_fetch_array($result_slot2);
                                $masa=$row1["masa"];
                                $newTime = date("h:i", strtotime($masa)); 

                                $slot2="1 - $newTime";
                                $color_2="#BBFFB8";     //green
                            }else{
                                $sql_slot2_L = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot2a' AND '$slot2b' ORDER BY masa DESC";
                                $result_slot2_L = $conn->query($sql_slot2_L);
                                if ($result_slot2_L->num_rows > 0){
                                    $row1=mysqli_fetch_array($result_slot2_L);
                                    $masa=$row1["masa"];
                                    $newTime = date("h:i", strtotime($masa)); 

                                    $slot2="L - $newTime";
                                    $color_2="#FCFFB8";     //yellow

                                }else{
                                    $sql_slot2_0 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot2b' AND '$slot2c' ORDER BY masa DESC";
                                    $result_slot2_0 = $conn->query($sql_slot2_0);
                                    if ($result_slot2_0->num_rows > 0){
                                        $row1=mysqli_fetch_array($result_slot2_0);
                                        $masa=$row1["masa"];
                                        $newTime = date("h:i", strtotime($masa)); 

                                        $slot2="0 - $newTime";
                                        $color_2="#FFB8B8";     //red

                                    }else{
                                        $slot2="0 - Tidak Hadir";
                                        $color_2="#FFB8B8";     //red
                                    }
                                }
                            }
        
                            //slot 3

                            $sql_slot3 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot2c' AND '$slot3a' ORDER BY masa DESC";
                            $result_slot3 = $conn->query($sql_slot3);
        
                            if ($result_slot3->num_rows > 0){
                                $row1=mysqli_fetch_array($result_slot3);
                                $masa=$row1["masa"];
                                $newTime = date("h:i", strtotime($masa)); 

                                $slot3="1 - $newTime";
                                $color_3="#BBFFB8";     //green
                            }else{
                                $sql_slot3_L = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot3a' AND '$slot3b' ORDER BY masa DESC";
                                $result_slot3_L = $conn->query($sql_slot3_L);
                                if ($result_slot3_L->num_rows > 0){
                                    $row1=mysqli_fetch_array($result_slot3_L);
                                    $masa=$row1["masa"];
                                    $newTime = date("h:i", strtotime($masa)); 

                                    $slot3="L - $newTime";
                                    $color_3="#FCFFB8";     //yellow

                                }else{
                                    $sql_slot3_0 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot3b' AND '$slot3c' ORDER BY masa DESC";
                                    $result_slot3_0 = $conn->query($sql_slot3_0);
                                    if ($result_slot3_0->num_rows > 0){
                                        $row1=mysqli_fetch_array($result_slot3_0);
                                        $masa=$row1["masa"];
                                        $newTime = date("h:i", strtotime($masa)); 

                                        $slot3="0 - $newTime";
                                        $color_3="#FFB8B8";     //red

                                    }else{
                                        $slot3="0 - Tidak Hadir";
                                        $color_3="#FFB8B8";     //red
                                    }
                                }
                            }
        
                            //slot 4

                            $sql_slot4 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot3c' AND '$slot4a' ORDER BY masa DESC";
                            $result_slot4 = $conn->query($sql_slot4);
        
                            if ($result_slot4->num_rows > 0){
                                $row1=mysqli_fetch_array($result_slot4);
                                $masa=$row1["masa"];
                                $newTime = date("h:i", strtotime($masa)); 

                                $slot4="1 - $newTime";
                                $color_4="#BBFFB8";     //green
                            }else{
                                $sql_slot4_L = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot4a' AND '$slot4b' ORDER BY masa DESC";
                                $result_slot4_L = $conn->query($sql_slot4_L);
                                if ($result_slot4_L->num_rows > 0){
                                    $row1=mysqli_fetch_array($result_slot4_L);
                                    $masa=$row1["masa"];
                                    $newTime = date("h:i", strtotime($masa)); 

                                    $slot4="L - $newTime";
                                    $color_4="#FCFFB8";     //yellow

                                }else{
                                    $sql_slot4_0 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot4b' AND '$slot4c' ORDER BY masa DESC";
                                    $result_slot4_0 = $conn->query($sql_slot4_0);
                                    if ($result_slot4_0->num_rows > 0){
                                        $row1=mysqli_fetch_array($result_slot4_0);
                                        $masa=$row1["masa"];
                                        $newTime = date("h:i", strtotime($masa)); 

                                        $slot4="0 - $newTime";
                                        $color_4="#FFB8B8";     //red

                                    }else{
                                        $slot4="0 - Tidak Hadir";
                                        $color_4="#FFB8B8";     //red
                                    }
                                }
                            }
        
                            //slot 5

                            $sql_slot5 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot4c' AND '$slot5a' ORDER BY masa DESC";
                            $result_slot5 = $conn->query($sql_slot5);
        
                            if ($result_slot5->num_rows > 0){
                                $row1=mysqli_fetch_array($result_slot5);
                                $masa=$row1["masa"];
                                $newTime = date("h:i", strtotime($masa)); 

                                $slot5="1 - $newTime";
                                $color_5="#BBFFB8";     //green
                            }else{
                                $sql_slot5_L = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot5a' AND '$slot5b' ORDER BY masa DESC";
                                $result_slot5_L = $conn->query($sql_slot5_L);
                                if ($result_slot5_L->num_rows > 0){
                                    $row1=mysqli_fetch_array($result_slot5_L);
                                    $masa=$row1["masa"];
                                    $newTime = date("h:i", strtotime($masa)); 

                                    $slot5="L - $newTime";
                                    $color_5="#FCFFB8";     //yellow

                                }else{
                                    $sql_slot5_0 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot5b' AND '$slotb' ORDER BY masa DESC";
                                    $result_slot5_0 = $conn->query($sql_slot5_0);
                                    if ($result_slot5_0->num_rows > 0){
                                        $row1=mysqli_fetch_array($result_slot5_0);
                                        $masa=$row1["masa"];
                                        $newTime = date("h:i", strtotime($masa)); 

                                        $slot5="0 - $newTime";
                                        $color_5="#FFB8B8";     //red

                                    }else{
                                        $slot5="0 - Tidak Hadir";
                                        $color_5="#FFB8B8";     //red
                                    }
                                }
                            }
                    
        
                            echo '<tr>
                                    <td>'.$bil.'</td>
                                    <td>'.$nama_pelajar.'</td>
                                    <td>'.$ndp.'</td>
                                    <td style="text-align: center; background-color:'.$color_1.'">'.$slot1.'</td>
                                    <td style="text-align: center; background-color:'.$color_2.'">'.$slot2.'</td>
                                    <td style="text-align: center; background-color:'.$color_3.'">'.$slot3.'</td>
                                    <td style="text-align: center; background-color:'.$color_4.'">'.$slot4.'</td>
                                    <td style="text-align: center; background-color:'.$color_5.'">'.$slot5.'</td>
                                </tr>';
                            $bil++;

                            }
                            
                        }else{
        
                            }
        echo '</tbody></table>';






/* ohgofdsjfodsjgofjdojgreio */








                }

                echo '<p>
                        <a target="_blank" href=generate_pdf.php>
                        <button name="butang" value="pdf" type="pdf" class="btn btn-outline-secondary">Jana Laporan PDF</button></a>
                        </p>';

            }else{
                $message="Sila pilih tarikh !";
            }

            if(!empty($message)){

                echo '<font color=green><b>'.$message.'</b></font>';
            }
   
	
?>

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




