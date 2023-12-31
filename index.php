<?php
    $name = "";
    $phone = "";
    $r_date = "";
    $r_time = "";
    $p_size = "";
    $c_order = "";
    $successMessage = "";
    $errorMessage = "";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sad";

    //connection
    $connection = new mysqli($servername, $username, $password, $database);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $r_date = $_POST["r_date"];
        $r_time = $_POST["r_time"];
        $p_size = $_POST["p_size"];
        $c_order = $_POST["c_order"];

        if (empty($name) || empty($phone) || empty($r_date) || empty($r_time) || empty($p_size)) {
            $errorMessage = "All fields are required!";
        } else {
            $sql = "INSERT INTO customer (name, phone, r_date, r_time, p_size, c_order) " .
                "VALUES ('$name', '$phone', '$r_date', '$r_time', '$p_size', '$c_order')";
            
            $result = $connection->query($sql);

            if (!$result) {
                die();
                $errorMessage = "Error: " . $connection->error;
            } else {
                $successMessage = "Form Submitted Successfully\nName: $name\nPhone: $phone\nReservation Date: $r_date\nReservation Time: $r_time\nParty size: $p_size";
                $successMessage = str_replace("\n", '\n', $successMessage);
                echo '<script>alert("' . $successMessage . '"); window.location.href = "/SAD-main/index.php";</script>';
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haeri's Sizzling House</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <!-- Logo -->
        <div class="logo"><img src="assets/HaeRi’s.png" alt="YOUR LOGO"></div>
        <!-- Navigation menu -->
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="reservation.php">Reservation</a></li>
                <li><a href="menu.html">Our Menu</a+
                ></li>
                <li><a href="gallery.html">Gallery </a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
        <!-- Search bar -->
        <div class="search-bar">
            <input type="text" placeholder="Search..." id="searchInput">
            <button onclick="searchFunction()">Search</button>
            
        </div>
    </header>

    <main>
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


        <!-- Product categories -->
        <div class="categories">
            <h2>&#127873;Best Sellers</h2>
            <ul>
                <li><a href="menu.html">&#128226;Beef Tapa with Egg</a></li>
                <li><a href="menu.html">&#128226;Special Pork Sisig</a></li>
                <li><a href="menu.html">&#128226;Chicken BBQ with Egg</a></li>
                <li><a href="menu.html">&#128226;Chicken Creamy Mushroom & Sauce</a></li>
                <li><a href="menu.html">&#128226;Potato Mojo</a></li>
                <!-- Add more categories -->
            </ul>
        </div>
        
        <!-- Product listings -->
        <div class="products">
            <!-- Product cards -->
            <!-- These can be dynamically generated using JavaScript -->
        </div>
    </main>
    <!-- end na to ng main -->

    <!-- Sections here -->
    <section id="reservation-section" class="reservation-section">
        <h2>Reservation?</h2>
        <p>
            Reserve now to get our Promo, Limited Person only. <br>
            to Avail. Click Reserve now Fill Details and Submit. It will Automatically sent to our server <br>
            and fetch back to you! Good day and have a good night and sweet dreams muah! 
        </p>
        <button type="button" onclick="showpopup2()">Reserve Now</button>
    </section>

    <section id="home" class="home"></section>


    <section id="about" class="about">
        <div class="left">
            <img src="assets/owner.jpg" alt="">
        </div>

        <div class="right">
            <h3>ABOUT</h3>
            <h2>Haeri's Sizzling House</h2>
            <p>
                The restaurant, founded in 2015, has thrived on a unique blend of Korean and Filipino flavors,
                 offering a diverse menu with a strategic focus on affordability and variety. 
                 Services are primarily provided through in-person interactions, 
                 with manual seat reservations handled when necessary due to limited space. 
                 A deliberate choice to avoid a digital reservation system reflects their cost-conscious approach. 
                    <a href="about.html"><button>READ MORE</button></a>
            </p>
        </div>
    </section>
    <section id="gallery-section" class="gallery-section">
        <h2>Gallery</h2>
        <section id="gallery" class="gallery">
            <div class="left">
                <h2>INTERIORS</h2>
                <a href="interiors.html"><img src="assets/interriors.jpg" alt="img"></a>
            </div>
            <div class="right">
                <h2>FOOD</h2>
                <a href="food.html"><img src="assets/food.jpg" alt="img"></a>
            </div>
        </section>
    </section>
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
    <script src="script.js"></script> <!-- Include your JavaScript -->
</body>
</html>