<?php
 include('../session.php');
$site_lang=$_SESSION['dil'] ;


    $month = $_POST['month'];



$sql_month= "select title from $tbl_month  where lang='$site_lang' and level_id='$month' ";



					$result_month  = $db->query($sql_month);
					$data = array();
                if($result_month){
					if ($result_month ->num_rows > 0) {

					while($row_month  = $result_month ->fetch_assoc()) {
                        $data[]  = $row_month;
					}
				}
			}



echo json_encode($data);
?>