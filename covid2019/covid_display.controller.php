<!-- Dipika Giri     1001440380
Brenda Martinez 1001766152-->
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
        $designation = filter_input(INPUT_POST, 'designation');
        $email = filter_input(INPUT_POST, 'email');
        $phonenum = filter_input(INPUT_POST, 'phonenum');
        if($query = "SELECT * 
            FROM OFFICIALS AS O  
            WHERE O.Designation = :designation OR O.Email = :email OR O.Phone_No = :phonenum"){
            if($query ==null){
                echo "No Record Available";
                die();
            } else {
                $stmt = $conn->prepare($query);
                $stmt->execute(array(':designation'=>$designation, ':email'=>$email, ':phonenum'=>$phonenum));
                $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
                echo "<table style = width:100%><tr><th>"."ID"."</th><th>"."State_Ab"."</th><th>"."Elected_Officials"."</th><th>"."Designation"."</th><th>"."Email"."</th><th>"."Phone_No"."</th></tr>";
                foreach($rows as $row){
                    echo "<tr>";
                    echo "<td style='text-align:center'>".$row["ID"]."</td>";
                    echo "<td style='text-align:center'>".$row["State_Ab"]."</td>";
                    echo "<td style='text-align:center'>".$row["Elected_Officials"]."</td>";
                    echo "<td style='text-align:center'>".$row["Designation"]."</td>";
                    echo "<td style='text-align:center'>".$row["Email"]."</td>";
                    echo "<td style='text-align:center'>".$row["Phone_No"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
    }
?>  