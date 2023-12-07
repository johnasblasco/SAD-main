<?php
    if(isset($_GET["phone"])){
        $phone = $_GET["phone"];


        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "sad";

        //connection
        $connection = new mysqli($servername,$username,$password,$database);

        $sql = "DELETE FROM customer WHERE phone = '$phone'";
        $connection->query($sql); 
    }
    echo '<script>
</script>';
?>
<script>
setTimeout(function() {
    var message = "Reserve Request is Successfully Deleted";
    var alertDiv = document.createElement("div");
    
    // Styling for the alert
    alertDiv.style.cssText = "position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #bc1b22; color: #FFF; padding: 20px; border-radius: 10px; font-size: 24px; text-align: center; box-shadow: 0 4px 8px rgba(0,0,0,0.1);";

    alertDiv.textContent = message;
    document.body.appendChild(alertDiv);

    setTimeout(function() {
        window.location.href = '/SAD-main/dashboard.php';
    }, 1000);

}, 1000);
</script>




