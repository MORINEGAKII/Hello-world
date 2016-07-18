<?php

    $id  = $_GET['id'];
    $connection = mysqli_connect("localhost","root","","sottucapp") or die("Error " . mysqli_error($connection));
    $sql = "select * from candidate  where seat='".$id."'";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
    mysqli_close($connection);
?>