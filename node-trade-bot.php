<?php
    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";

    $current = file_get_contents("history.txt");
    $history = fopen("history.txt", "w+") or die("Unable to open file!");
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    preg_match("/^ID: ([0-9]+)/", $current, $match);
    
    $sql = "SELECT * FROM donations WHERE id>" . $match[1] . " ORDER BY id DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $txt = "";
        while($row = $result->fetch_assoc()) {
            $txt = $txt . "ID: " . $row["id"]. " - SteamID: " . $row["sid"]. " - Items Donated: " . $row["amount"] . "<br>";
            echo $txt;
        }
        $toWrite = str_replace("Resource id #4", "", $txt . $current);
        echo $toWrite;
        fwrite($history, $toWrite);
    } else {
        echo "0 results";
        fwrite($history, $current);
    }
    
    fclose($history);
    $conn->close();
?>
