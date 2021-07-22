<?php
require_once 'db_stepup.php';

if(isset($_GET['submit']))
{
    $data = $_GET;

    $name = $data['action'];
    print_r($name);
    $dbObj = new DataBase();
    if($name=="upvote") {
        $sql = "UPDATE question SET upvote_count = 1 where ID = 1";

    }else if($name=="downvote"){
        $sql = "UPDATE question SET downvote_count = 1 where ID = ";
    }
//    $conn = $dbObj->getConnection();
//    try{
//        $stmt = $conn->prepare($sql);
//        $stmt->bindValue(':name',$name);
//
//        $stmt->execute();
//    }
//    catch (PDOException $exception)
//    {
//        echo $exception;
//    }

    $ref = "../Home.php";
    echo '<script>window.location = "'.$ref.'"</script>';
    exit;

}



?>