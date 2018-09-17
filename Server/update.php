<?php
$host = SAE_MYSQL_HOST_M;
$user = SAE_MYSQL_USER;
$pass = SAE_MYSQL_PASS;
$dbname = SAE_MYSQL_DB;
$port = SAE_MYSQL_PORT;

$nickName = $_POST['nickName'];
$points = $_POST['points'];


try {
    $dbh = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT * FROM userInfo WHERE nickName = :nickName';
    $result = $dbh->prepare($sql);
    $result->execute(array(':nickName'=> $nickName));
    $data = $result->fetch(PDO::FETCH_ASSOC);
    if($data) {
        $sql = 'UPDATE userInfo SET points = :points WHERE nickName = :nickName';
        $result = $dbh->prepare($sql);
        if($result->execute(array(':nickName'=> $nickName,':points'=> $points))) {
            echo "更新成功";
        }
    } else {
        $sql = 'INSERT INTO userInfo (nickName, points) VALUES (:nickName, :points)';
        $result = $dbh->prepare($sql);
        if($result->execute(array(':nickName'=> $nickName,':points'=> $points))) {
            echo "添加成功";
        }
    }

    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>