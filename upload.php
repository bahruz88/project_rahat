<?php
include('session.php') ;
if(is_array($_FILES)) {
    if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $sourcePath = $_FILES['userImage']['tmp_name'];
        $uid = $_POST['uid'];
        $empno = $_POST['empno'];
        $fileData = pathinfo(basename($_FILES["userImage"]["name"]));



        // $targetPath = "images/users/".$_FILES['userImage']['name'];

//        $sql = "INSERT INTO tbl_users(u_photo) VALUES ('$targetPath')";
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
            mysqli_close($db);
        }else{
            $fileName ='S' . $uid . '.' . $fileData['extension'];
            $targetPath = "images/users/".$fileName;
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