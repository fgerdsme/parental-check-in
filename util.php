<?php 
    include_once './config/config.inc.php';

    function checkIn() {
        global $config;

        // Create connection
        $conn = new mysqli(
            $config['DB_HOST'], 
            $config['DB_USERNAME'], 
            $config['DB_PASSWORD'], 
            $config['DB_NAME']
        );

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        // Insert new check in date 
        $upd_sql = "INSERT INTO iamok_check_in VALUES();";
        if ($conn->query($upd_sql)) {
            echo 'alert(\'Checked-In\');';
        } else {
            echo "alert('Error: ' . $sql . ' ' .  $conn->error);";
        }
        
        $conn->close();      
    }

    function checkAlert($force) {   
        global $config;

        // Create connection
        $conn = new mysqli(
            $config['DB_HOST'], 
            $config['DB_USERNAME'], 
            $config['DB_PASSWORD'], 
            $config['DB_NAME']
        );

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        // Show latest item
        $sql = "SELECT checked_in_within_hours(" . $config['CONFIG_CHECK_IN_HOURS'] . ") as checked_in;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc(); // only 1 row 0: didn't check in, 1: checked in

        if ($force or $row["checked_in"] == 0) {
            raiseAlert();
        }
        $conn->close();
    }

    function raiseAlert() {
        global $config;

        mail(
            $config['MAIL_RECIPIENT'],
            $config['MAIL_SUBJECT'],
            $config['MAIL_MESSAGE']
        );
    }

?>