<?php
$host = SAE_MYSQL_HOST_M;
$user = SAE_MYSQL_USER;
$pass = SAE_MYSQL_PASS;
$dbname = SAE_MYSQL_DB;
$port = SAE_MYSQL_PORT;

$nickName = $_POST['nickName'];


try {
    $dbh = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT points FROM userInfo WHERE nickName = :nickName';
    $result = $dbh->prepare($sql);
    $result->execute(array(':nickName'=> $nickName));
    $data = $result->fetch(PDO::FETCH_ASSOC);
    if($data) {
        header('content-type:application/json;charset=utf-8');
        echo json_encode($data); 
    }

    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>