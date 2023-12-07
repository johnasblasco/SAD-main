<?php
    $name = "";
    $phone = "";
    $r_date = "";
    $r_time = "";
    $p_size = "";
    $c_order = "";
    $errorMessage = "";
    $successMessage = "";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sad";

    //connection
    $connection = new mysqli($servername,$username,$password,$database);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $r_date = $_POST["r_date"];
        $r_time = $_POST["r_time"];
        $p_size = $_POST["p_size"];
        $c_order = $_POST["c_order"];

    }

    do {
        if (empty($name) || empty($phone) || empty($r_date) || empty($r_time) || empty($p_size) || empty($c_order)) {
            $errorMessage = "All fields are required!";
            break;
        }
        

        //add or insert to database
        $sql = "INSERT INTO customer (name, phone, r_date, r_time, p_size, c_order) " .
       "VALUES ('$name', '$phone', '$r_date', '$r_time', '$p_size', '$c_order')";
        
        $result = $connection->query($sql);

        if(!$result){
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        }else{
            $successMessage = "Form Submitted Successfully\nName: " . $name . "\nPhone: " . $phone . "\nReservation Date: " . $r_date . "\nReservation Time: " . $r_time . "\nParty size: " . $p_size;

            // Replace '\n' with the JavaScript representation of a newline character
            $successMessage = str_replace("\n", '\n', $successMessage);
            
            echo '<script>alert("' . $successMessage . '");  window.location.href = "/SAD-main/index.php";</script>';
            
        }
        
    } while(false);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation | Haeri's Sizzling House</title>
    <link rel="stylesheet" href="reservation.css">
    
</head>
<body>
    
    <header>
        <!-- Logo -->
        <div class="logo"><img src="assets/HaeRi’s.png" alt="YOUR LOGO"></div>
        <!-- Navigation menu -->
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="reservation.php">Reservation</a></li>
                <li><a href="menu.html">Our Menu</a></li>
                <li><a href="gallery.html">Gallery </a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
        <!-- Search bar -->
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <button>Search</button>
        </div>
    </header>

    <main>
        <h1>LOCATION</h1>
        <h6>&#128204; 23 Paseo del Congreso St, Malolos, 3000 Bulacan</h6>
        <div class="home"></div>
        <section id="reservation-section" class="reservation-section">
            <div class="form">
                <span> 
                    <h3>Haeri's Sizzling House </h3>
                    <p> &#x1F4CD; 23 Paseo del Congreso St, Malolos, 3000 Bulacan <br> </p>
                    <h3>OPENING HOURS </h3>
                        &#x1F553;MONDAY TO FRIDAY <br>
                        11:00AM - 12:00 MN <br>
                        &#x1F553;SATURDAY & SUNDAY <br>
                        11:00AM - 01:00 AM <br>
                    
                </span>
                <span>
                    
                        <h3>LANDLINE</h3>
                        <p>
                        <sub>(0995) 368 1668</sub>
                        </p>
                        <h3>MOBILE</h3>
                        <p>
                        <sub>(0956) 156 9820</sub>
                        </p>
                        <h3>WHERE TO PARK</h3>
                        <p>
                        Meron dyan sa gilid gilid
                        </p>
                    </p>
                </span>

                <span>
                    <form id="reservationForm">
                        <label for="date"><h4>Date:</h4></label>
                        <input type="date" id="date" required>
                
                        <label for="time"><h4>Time:</h4></label>
                        <input type="time" id="time" required>
                
                        <label for="people"><h4>Number of people:</h4></label>
                        <input type="number" id="people" min="1" required>
                        <button type="button" onclick="findTable()">Check Availability</button>
                        
                    </form>
                
                    <script>
                        function findTable() {
                            // Get values from the form
                            var date = document.getElementById('date').value;
                            var time = document.getElementById('time').value;
                            var people = document.getElementById('people').value;
                
                            // Display a simple confirmation message (you can customize this part)
                            alert('TABLE AVAILABLE FOR \nDate: ' + date + '\nTime: ' + time + '\nNumber of People: ' + people + '\n\n' + 'AVAILABLE : TRUE');
                        }
                    </script>
                    <button type="button" onclick="showpopup2()">Reserve Now</button>
                </span>
            </div>
        </section>
    </main>
    <!-- end na to ng main -->

    <!-- Sections here -->
    <div id="popup2">
        <div class="bookingContent" id="bookingContent">
            <span class="close-btn" onclick="closePopup()">X</span>
            <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2>Make a Reservation</h2>
            
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name"  value="<?php echo $name; ?>" required>
            
                <label for="phone">Mobile Phone:</label>
                <input type="tel" id="phone" name="phone"  value="<?php echo $phone; ?>"required>
            
                <label for="date">Reservation Date:</label>
                <input type="date" id="date" name="r_date"  value="<?php echo $r_date; ?>"required>
            
                <label for="time">Reservation Time:</label>
                <input type="time" id="time" name="r_time"  value="<?php echo $r_time; ?>"required>
            
                <label for="guest">Party Size (e.g., number of guests):</label>
                <input type="number" id="guest" name="p_size"  value="<?php echo $p_size; ?>"required>
            
                <label for="special-requests">Type your Request or  your pre-order here: <br>(leave blank if none)</label>
                <textarea id="special-requests" name="c_order" rows="4"><?php echo $c_order; ?></textarea>                
                <button type="submit">Make Reservation</button>
                </form>
        </div>
    </div>

    <div id="popup">
        <div class="popupContent">
            <p>
                <span class="close-btn" onclick="closePopup()">X</span>
                    If you have any questions, please call our locations on the following numbers: <br>
    
                    Haeri's Sizzling House - (0956) 156 9820 <br>
            
                    The Podium, Ortigas - ‭(0917) 702 8913 <br>
    
                    Bonifacio Global City - ‭(0917) 710 1682 <br>
    
                    City Of Dreams - (0956) 794 0075 <br>
    
                    Araneta City - (0977) 412 0670 <br>
    
                    Facebook: @HaerisSizzlingHouse <br>
    
                    Instagram: @HaerisSizzlingHouse<br>
    
                    Operating Hours:<br>
    
                    Newport World Resorts<br>
                    Bonifacio Global City<br>
    
                    11:00 am - 12:00 mn  Monday - Sunday<br>
    
                    The Podium<br>
    
                    Sunday - Thursday 10:00 AM - 11:00 PM<br>
                    Friday & Saturday 10:00AM - 12:00AM<br>
    
                    City Of Dreams<br>
    
                    11:00 am - 02:00 am  Monday - Sunday<br>
    
                    Delivery Hours:<br>
    
                    11:00 am - 8:00 pm<br>
                    5 pm cut-off for same-day delivery on all orders.<br>
    
                    <button id="order-here" onclick="showpopup2()">RESERVE NOW</button>
                </p>
            </div>
        </div>



    <footer>
        <!-- Footer Logo -->
        <div class="footer-logo">
            <img src="assets/HaeRi’s.png" alt="">
        </div>
        <!-- Footer Links dito dagdagan if meron pa-->
        <div class="footer-links">
            <a href="https://www.facebook.com/HaerisSizzlingHouse/" target="_blank"><input type="image" src="assets/facebook.png" alt="fb"></a>
            <a href="https://twitter.com/haericopter" target="_blank"><input type="image" src="assets/twitter.png" alt="tw"></a>
            <a href="https://www.instagram.com/haericopter" target="_blank"><input type="image" src="assets/instagram.png" alt="ig"></a>
        </div>
        <!-- Footer menu -->
        <div class="footer-menu">
            <ul>
                <li><a class="iubenda-white iubenda-noiframe iubenda-embed iubenda-noiframe " title="Privacy Policy" href="https://www.iubenda.com/privacy-policy/99994695/cookie-policy">Cookie Policy</a></li>
                <script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
                <li><a href="https://www.iubenda.com/terms-and-conditions/99994695" class="iubenda-white iubenda-noiframe iubenda-embed iubenda-noiframe " title="Terms and Conditions ">Terms and Conditions</a></li>
                <script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
                <li><a class="iubenda-white iubenda-noiframe iubenda-embed iubenda-noiframe " title="Terms and Conditions" href="https://www.iubenda.com/privacy-policy/99994695">Privacy Policy</a></li>
                <script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
            </ul>
        </div>
        <!-- Contact information -->
        <div class="contact-info">
            <!-- Your contact details -->
        </div>
        <div class="copyright">©2023 Haeri's Sizzling House by BSIT3FG1 Powered by group 5.</div>
        </footer>


    <script>
        // popup
        function closePopup() {
        var popup = document.getElementById('popup');
        var popup2 = document.getElementById('popup2');
        popup2.style.display = 'none';
        popup.style.display = 'none';
        }

        function showpopup2(){
        closePopup();
        var popup2 = document.getElementById('popup2');
        popup2.style.display = 'block';
        }
        //pag na submit
        function submitForm(event) {
        event.preventDefault(); // Prevent the default form submission

        // Validate the form (you can add more validation logic if needed)
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('phone');
        const dateInput = document.getElementById('date');
        const timeInput = document.getElementById('time');

        if (nameInput.value.trim() === '' || emailInput.value.trim() === '' || dateInput.value === '' || timeInput.value === '') {
            alert('Please fill in all required fields.');
            return;
        }

        // If the form is valid, show a success alert
        alert('Form submitted successfully!\nName: ' + nameInput.value + '\nEmail: ' + emailInput.value + '\nDate: ' + dateInput.value + '\nTime: ' + timeInput.value);
        closePopup();
        }
    </script> <!-- Include your JavaScript -->
</body>
</html>