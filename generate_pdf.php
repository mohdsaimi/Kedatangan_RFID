
<?php
session_start();
require('fpdf.php');
require('config/config.php');

$tarikh = $_SESSION['tarikh'];

$newDate = date("d-m-Y", strtotime($tarikh));  

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // GFG logo image
        $this->Image('geeks.png', 30, 8, 20);
          
        // GFG logo image
        $this->Image('geeks.png', 160, 8, 20);
          
        // Set font-family and font-size
        $this->SetFont('Times','B',20);
          
        // Move to the right
        $this->Cell(80);
          
        // Set the title of pages.
        $this->Cell(30, 20, 'Welcome to GeeksforGeeks', 0, 2, 'C');
          
        // Break line with given space
        $this->Ln(5);
    }
       
    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
          
        // Set font-family and font-size of footer.
        $this->SetFont('Arial', 'I', 8);
          
        // set page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() .
              '/{nb}', 0, 0, 'C');
    }
}

//$sql = "SELECT * FROM pelajar";
//$result = $conn->query($sql);

//if(isset($_POST['butang_pdf']))
//{   
    //$pdf = new FPDF();
    $pdf = new FPDF('L','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0, 5, 'Laporan Kehadiran Pelajar', 0, 0, 'C');
    $pdf->Ln();
   
    $pdf->Cell(0, 10, $newDate, 0, 0, 'C');
    $pdf->Ln();
    $pdf->Ln();

    //$pdf->Cell(-100);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(10, 12, 'Bil. ', 1, 0, 'C');
    $pdf->Cell(80, 12, 'Nama Pelajar', 1, 0, 'C');
    $pdf->Cell(30, 12, 'NDP', 1, 0, 'C');
    $pdf->Cell(30, 6, '1', 1, 0, 'C');
    $pdf->Cell(30, 6, '2', 1, 0, 'C');
    $pdf->Cell(30, 6, '3', 1, 0, 'C');
    $pdf->Cell(30, 6, '4', 1, 0, 'C');
    $pdf->Cell(30, 6, '5', 1, 1, 'C');

    $pdf->Ln();


    $pdf->SetY(41.00125);
    $pdf->Cell(120, 6, '', 0, 0, 'C');
    $pdf->Cell(30, 6, '0800-0930', 1, 0, 'C');
    $pdf->Cell(30, 6, '1000-1130', 1, 0, 'C');
    $pdf->Cell(30, 6, '1130-1300', 1, 0, 'C');
    $pdf->Cell(30, 6, '1400-1530', 1, 0, 'C');
    $pdf->Cell(30, 6, '1530-1700', 1, 1, 'C');
    //$pdf->Ln();

    /* $pdf->SetY(47.00125);

    $pdf->Cell(10, 6, 'Bil. ', 1, 0, 'C');
    $pdf->Cell(80, 6, 'Nama Pelajar', 1, 0, 'C');
    $pdf->Cell(30, 6, 'NDP', 1, 0, 'C');
    $pdf->Cell(30, 6, '1', 1, 0, 'C');
    $pdf->Cell(30, 6, '2', 1, 0, 'C');
    $pdf->Cell(30, 6, '3', 1, 0, 'C');
    $pdf->Cell(30, 6, '4', 1, 0, 'C');
    $pdf->Cell(30, 6, '5', 1, 1, 'C');
    $pdf->Ln(); */

    $bil = 1;

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
            $color_1a="187";
            $color_1b="255";
            $color_1c="184";

            
        }else{

            $sql_slot1_L = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot1a' AND '$slot1b' ORDER BY masa DESC";
            $result_slot1_L = $conn->query($sql_slot1_L);
            if ($result_slot1_L->num_rows > 0){
                $row1=mysqli_fetch_array($result_slot1_L);
                $masa=$row1["masa"];
                $newTime = date("h:i", strtotime($masa)); 

                $slot1="L - $newTime";
                $color_1="#FCFFB8";  //yellow
                $color_1a="252";
                $color_1b="255";
                $color_1c="184";

            }else{
                $sql_slot1_0 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot1b' AND '$slot1c' ORDER BY masa DESC";
                $result_slot1_0 = $conn->query($sql_slot1_0);
                if ($result_slot1_0->num_rows > 0){
                    $row1=mysqli_fetch_array($result_slot1_0);
                    $masa=$row1["masa"];
                    $newTime = date("h:i", strtotime($masa)); 

                    $slot1="0 - $newTime";
                    $color_1="#FFB8B8";     //red
                    $color_1a="255";
                    $color_1b="184";
                    $color_1c="184";

                }else{
                    $slot1="0 - Tidak Hadir";
                    $color_1="#FFB8B8";     //red
                    $color_1a="255";
                    $color_1b="184";
                    $color_1c="184";
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
            $color_2a="187";
            $color_2b="255";
            $color_2c="184";

        }else{
            $sql_slot2_L = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot2a' AND '$slot2b' ORDER BY masa DESC";
            $result_slot2_L = $conn->query($sql_slot2_L);
            if ($result_slot2_L->num_rows > 0){
                $row1=mysqli_fetch_array($result_slot2_L);
                $masa=$row1["masa"];
                $newTime = date("h:i", strtotime($masa)); 

                $slot2="L - $newTime";
                $color_2="#FCFFB8";     //yellow
                $color_2a="252";
                $color_2b="255";
                $color_2c="184";

            }else{
                $sql_slot2_0 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot2b' AND '$slot2c' ORDER BY masa DESC";
                $result_slot2_0 = $conn->query($sql_slot2_0);
                if ($result_slot2_0->num_rows > 0){
                    $row1=mysqli_fetch_array($result_slot2_0);
                    $masa=$row1["masa"];
                    $newTime = date("h:i", strtotime($masa)); 

                    $slot2="0 - $newTime";
                    $color_2="#FFB8B8";     //red
                    $color_2a="255";
                    $color_2b="184";
                    $color_2c="184";

                }else{
                    $slot2="0 - Tidak Hadir";
                    $color_2="#FFB8B8";     //red
                    $color_2a="255";
                    $color_2b="184";
                    $color_2c="184";
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
            $color_3a="187";
            $color_3b="255";
            $color_3c="184";

        }else{
            $sql_slot3_L = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot3a' AND '$slot3b' ORDER BY masa DESC";
            $result_slot3_L = $conn->query($sql_slot3_L);
            if ($result_slot3_L->num_rows > 0){
                $row1=mysqli_fetch_array($result_slot3_L);
                $masa=$row1["masa"];
                $newTime = date("h:i", strtotime($masa)); 

                $slot3="L - $newTime";
                $color_3="#FCFFB8";     //yellow
                $color_3a="252";
                $color_3b="255";
                $color_3c="184";

            }else{
                $sql_slot3_0 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot3b' AND '$slot3c' ORDER BY masa DESC";
                $result_slot3_0 = $conn->query($sql_slot3_0);
                if ($result_slot3_0->num_rows > 0){
                    $row1=mysqli_fetch_array($result_slot3_0);
                    $masa=$row1["masa"];
                    $newTime = date("h:i", strtotime($masa)); 

                    $slot3="0 - $newTime";
                    $color_3="#FFB8B8";     //red
                    $color_3a="255";
                    $color_3b="184";
                    $color_3c="184";

                }else{
                    $slot3="0 - Tidak Hadir";
                    $color_3="#FFB8B8";     //red
                    $color_3a="255";
                    $color_3b="184";
                    $color_3c="184";
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
            $color_4a="187";
            $color_4b="255";
            $color_4c="184";

        }else{
            $sql_slot4_L = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot4a' AND '$slot4b' ORDER BY masa DESC";
            $result_slot4_L = $conn->query($sql_slot4_L);
            if ($result_slot4_L->num_rows > 0){
                $row1=mysqli_fetch_array($result_slot4_L);
                $masa=$row1["masa"];
                $newTime = date("h:i", strtotime($masa)); 

                $slot4="L - $newTime";
                $color_4="#FCFFB8";     //yellow
                $color_4a="252";
                $color_4b="255";
                $color_4c="184";

            }else{
                $sql_slot4_0 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot4b' AND '$slot4c' ORDER BY masa DESC";
                $result_slot4_0 = $conn->query($sql_slot4_0);
                if ($result_slot4_0->num_rows > 0){
                    $row1=mysqli_fetch_array($result_slot4_0);
                    $masa=$row1["masa"];
                    $newTime = date("h:i", strtotime($masa)); 

                    $slot4="0 - $newTime";
                    $color_4="#FFB8B8";     //red
                    $color_4a="255";
                    $color_4b="184";
                    $color_4c="184";

                }else{
                    $slot4="0 - Tidak Hadir";
                    $color_4="#FFB8B8";     //red
                    $color_4a="255";
                    $color_4b="184";
                    $color_4c="184";
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
            $color_5a="187";
            $color_5b="255";
            $color_5c="184";

        }else{
            $sql_slot5_L = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot5a' AND '$slot5b' ORDER BY masa DESC";
            $result_slot5_L = $conn->query($sql_slot5_L);
            if ($result_slot5_L->num_rows > 0){
                $row1=mysqli_fetch_array($result_slot5_L);
                $masa=$row1["masa"];
                $newTime = date("h:i", strtotime($masa)); 

                $slot5="L - $newTime";
                $color_5="#FCFFB8";     //yellow
                $color_5a="252";
                $color_5b="255";
                $color_5c="184";

            }else{
                $sql_slot5_0 = "SELECT * FROM iog_in_pelajar WHERE nama_pelajar='$nama_pelajar' AND masa BETWEEN '$slot5b' AND '$slotb' ORDER BY masa DESC";
                $result_slot5_0 = $conn->query($sql_slot5_0);
                if ($result_slot5_0->num_rows > 0){
                    $row1=mysqli_fetch_array($result_slot5_0);
                    $masa=$row1["masa"];
                    $newTime = date("h:i", strtotime($masa)); 

                    $slot5="0 - $newTime";
                    $color_5="#FFB8B8";     //red
                    $color_5a="255";
                    $color_5b="184";
                    $color_5c="184";

                }else{
                    $slot5="0 - Tidak Hadir";
                    $color_5="#FFB8B8";     //red
                    $color_5a="255";
                    $color_5b="184";
                    $color_5c="184";
                }
            }
        }


        $pdf->Cell(10, 10, $bil, 1, 0, 'C');
        $pdf->Cell(80, 10, $nama_pelajar, 1, 0, 'C');
        $pdf->Cell(30, 10, $ndp, 1, 0, 'C');
        $pdf->SetFillColor($color_1a,$color_1b,$color_1c);
        $pdf->Cell(30, 10, $slot1, 1, 0, 'C',true);
        $pdf->SetFillColor($color_2a,$color_2b,$color_2c);
        $pdf->Cell(30, 10, $slot2, 1, 0, 'C',true);
        $pdf->SetFillColor($color_3a,$color_3b,$color_3c);
        $pdf->Cell(30, 10, $slot3, 1, 0, 'C',true);
        $pdf->SetFillColor($color_4a,$color_4b,$color_4c);
        $pdf->Cell(30, 10, $slot4, 1, 0, 'C',true);
        $pdf->SetFillColor($color_5a,$color_5b,$color_5c);
        $pdf->Cell(30, 10, $slot5, 1, 1, 'C',true);
        //$pdf->Ln();


        /* echo '<tr>
                <td>'.$bil.'</td>
                <td>'.$nama_pelajar.'</td>
                <td>'.$ndp.'</td>
                <td style="text-align: center; background-color:'.$color_1.'">'.$slot1.'</td>
                <td style="text-align: center; background-color:'.$color_2.'">'.$slot2.'</td>
                <td style="text-align: center; background-color:'.$color_3.'">'.$slot3.'</td>
                <td style="text-align: center; background-color:'.$color_4.'">'.$slot4.'</td>
                <td style="text-align: center; background-color:'.$color_5.'">'.$slot5.'</td>
            </tr>'; */
        $bil++;

    }
    











  
    $pdf->Output('my_file.pdf','I');
//}




?>
