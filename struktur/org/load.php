<?php
function getConnection() {
    $dbhost="127.0.0.1";
    $dbuser="root";
    $dbpass="root";
    $dbname="rhr";
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}
$sql = "select id as memberId, parent as parentId  ,category as otherInfo from tbl_employee_category";

try {
    $db = getConnection();
    $stmt = $db->query($sql);
    $wines = $stmt->fetchAll(PDO::FETCH_OBJ);
    $db = null;
    echo json_encode($wines);
} catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}';
}
?>
