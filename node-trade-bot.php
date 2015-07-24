<?php
    $servername = ""; // mysql host
    $username = ""; // mysql user
    $password = ""; // mysql password
    $dbname = ""; // mysql database

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT id, sid, amount FROM donations";
    $result = $conn->query($sql);
    
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - SteamID: " . $row["sid"]. " - Items Donated: " . $row["amount"] . "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>
