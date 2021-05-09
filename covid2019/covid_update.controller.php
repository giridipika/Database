<!-- Dipika Giri     1001440380
Brenda Martinez  1001766152-->
<?php
    $host="localhost:3306";
    $username="root";
    $password="";
    $dbname="covid2019";
    $conn=new PDO('mysql:host='.$host.';dbname='.$dbname,$username,$password);
    // var_dump($conn);
    if(!$conn) {
        die("Connection failed");
    }       
    else{
        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST, 'name');
        $query = "UPDATE officials SET Elected_Officials = '$name'
        WHERE ID = '$id'";
        if($conn->query($query)) {
            echo "Record updated sucessfully";
        } else {
            echo "Error: ".$query."<br>".$conn->error;
        }
    }
?>