<?php
include('session.php') ;
if(is_array($_FILES)) {
    if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $sourcePath = $_FILES['userImage']['tmp_name'];
        $uid = $_POST['uid'];
        $emp_id = $_POST['emp_id'];
        /**/
        $sql_employees= "select * from $tbl_employees where  emp_status=1  and  id=$emp_id ";
        $result_employees = $db->query($sql_employees);
//        echo $sql_employees;
        $empno='';
        if ($result_employees->num_rows > 0) {
            while($row= $result_employees->fetch_assoc()) {
                $empno=$row['empno'];
            }
        }
        /**/
        $fileData = pathinfo(basename($_FILES["userImage"]["name"]));
        if($empno!=''){
            $fileName ='S' . $empno . '.' . $fileData['extension'];
            $targetPath = "images/users/".$fileName;
            $sql = "UPDATE  $tbl_users SET  
		u_photo  = '$targetPath'
		WHERE id= '$uid' ";

            if(!mysqli_query($db, $sql)) {
                echo "error" .mysqli_error($db);
            }
            else {
//            echo "success=".$uid ;
            }

            $sqlemp = "UPDATE  $tbl_employees SET image_name  = '$targetPath' WHERE id= '$emp_id' ";

            if(!mysqli_query($db, $sqlemp)) {
                echo "error" .mysqli_error($db);
            }
            else {
//            echo "success=".$uid ;
            }
            mysqli_close($db);
        }else{
            $fileName ='S' . $uid . '.' . $fileData['extension'];
            $targetPath = "images/users/".$fileName;
			
			$sql = "UPDATE  $tbl_users SET  u_photo  = '$targetPath' WHERE id= '$uid' ";

            if(!mysqli_query($db, $sql)) {
                echo "error" .mysqli_error($db);
            }
            else {
//            echo "success=".$uid ;
            }
            $sqlemp = "UPDATE  $tbl_employees SET image_name  = '$targetPath' WHERE id= '$emp_id' ";

            if(!mysqli_query($db, $sqlemp)) {
                echo "error" .mysqli_error($db);
            }
            else {
//            echo "success=".$uid ;
            }
            mysqli_close($db);
        }

        //Close connection

        if(move_uploaded_file($sourcePath,$targetPath)) {
            ?>
            <img class="profile-user-img img-fluid img-circle image-preview"  class="upload-preview"
                 src="<?php echo $targetPath; ?>"
                 alt="User profile picture">
            <input type="hidden" name="imgName" value="<?php echo $targetPath; ?>">
<!--            <img class="image-preview" src="--><?php //echo $targetPath; ?><!--" class="upload-preview" />-->
            <?php
        }
    }
}
?>