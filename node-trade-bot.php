<?php
    $servername = ""; // mysql host
    $username = ""; // mysql user
    $password = ""; // mysql password
    $dbname = ""; // mysql database

    $myfile = fopen("history.txt", "r+") or die("Unable to open file!");
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT * FROM donations ORDER BY id DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $txt = "ID: " . $row["id"]. " - SteamID: " . $row["sid"]. " - Items Donated: " . $row["amount"] . "<br>";
            fwrite($myfile, $txt);
        }
    } else {
        echo "0 results";
    }
    
    fclose($myfile);
    $conn->close();
?>
