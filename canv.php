<?php
include('session.php');
$site_lang=$_SESSION['dil'] ;
if(isset($_POST["Import"]))
{

    echo $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");
//$sql_data = "SELECT * FROM prod_list_1 ";

        $count = 0;                                         // add this line
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
             print_r($emapData);

            $count++;                                      // add this line

            if($count>1){                                  // add this line
                $sql = "INSERT into tbl_excel(excel_name,excel_email) values ('$emapData[0]','$emapData[1]')";
                $db->query($sql);
            }                                              // add this line
        }


        fclose($file);
        echo 'CSV File has been successfully Imported';
//        header('Location: index.php');
    }
    else
        echo 'Invalid File:Please Upload CSV File';
}

?>
<!DOCTYPE html>
<html>
<body>
<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-default" name="Import" value="Import">Upload</button>
</form>
</body>
</html>