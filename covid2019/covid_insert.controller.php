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
        $stateab = filter_input(INPUT_POST, 'stateab');
        $name = filter_input(INPUT_POST, 'name');
        $designation = filter_input(INPUT_POST, 'designation');
        $email = filter_input(INPUT_POST, 'email');
        $phonenum = filter_input(INPUT_POST, 'phonenum');
        $query = "INSERT INTO officials(ID, State_Ab, Elected_Officials, Designation, Email, Phone_No)
        VALUES('$id','$stateab','$name','$designation','$email','$phonenum')";
        if($conn->query($query) == TRUE){
            echo "New record is inserted sucessfully";
        } else {
            echo "Error: ".$query."<br>".$conn->error;
        }
    }
?> 