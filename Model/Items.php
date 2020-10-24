<?php

function itemList()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $DbName = "items";

    // Create connection
    $conn = new mysqli($servername, $username, $password , $DbName);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";


    $sql = "SELECT * FROM items";
    $result = $conn->query($sql);
    $data[$result->num_rows+1]=array(
        
        "name" => "",
        "price" => "",
        );;
    echo "<pre>";
    $count =0;
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "id: " . $row["ID"]. " - Name: " . $row["ItemName"]. " " . $row["ItemPrice"]. "<br>";
        $data[$count] =[
        $row["ItemName"],
        $row["ItemPrice"]
        ];
        $count++;
      }
    } else {
      echo "0 results";
    }
    return $data;
}


?>