<?php
session_start();
$username = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Food</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- assets/CSS -->
    <link rel="stylesheet" href="assets/CSS/style.css">
    <link href="assets/CSS/custom.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/JS/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/JS/order.js"></script> <!-- Include the common JavaScript file -->

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Pinyon Script -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Pinyon+Script&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <h1>Welcome <?php echo $username; ?>!</h1>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="order.php">Western</a></li>
            <li><a href="asian.html">Asian</a></li>
            <li><a href="fastfood.html">Fast Food</a></li>
            <li><a href="beverage.html">Beverage</a></li>
        </ul>
    </nav>

    <form enctype="multipart/form-data">
        <div class="gallery-container">
            <div class="gallery-item">
                <img src="assets\Images\image CC.jpg" alt="Western Grill">
                <div class="order-form">
                    <label for="western1">Western Grill (RM 25.00)</label>
                    <input type="number" id="western1" name="western1" min="0" value="0" class="item-quantity" data-name="Western Grill" data-price="25.00">
                </div>
            </div>

            <div class="gallery-item">
                <img src="assets/Images/image SP.jpg" alt="Spaghetti Bolognese">
                <div class="order-form">
                    <label for="western2" class="item-label">
                        <span class="item-name">Spaghetti Bolognese</span>
                        <span class="item-price">(RM 20.00)</span>
                    </label>
                    <input type="number" id="western2" name="western2" min="0" value="0" class="item-quantity" data-name="Spaghetti Bolognese" data-price="20.00">
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="order-summary">
            <h3>Order Summary</h3>
            <p>Total Items: <span id="total-items">0</span></p>
            <p>Total Price: RM<span id="total-price">0.00</span></p>
            <button id="place-order" class="order-btn">Place Order</button>
        </div>
    </form>
    <br><br>
</body>
<footer>
    <div class="image-container2">
        <a href="https://www.google.com/maps/dir//607,+Jalan+17%2F10,+Seksyen+17,+46400+Petaling+Jaya,+Selangor/@3.1222898,101.5533822,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x31cc495d298b9beb:0xfe6a13c3cd6df28d!2m2!1d101.6357842!2d3.122293?entry=ttu&g_ep=EgoyMDI0MTExOS4yIKXMDSoASAFQAw%3D%3D" target="_self" title="Our Location">
            <img src="assets/Images/GM icon.png" width="60" height="60" alt="KIMSENG official IG"/>
        </a>
        <a href="https://www.instagram.com/brayden_cjr05/?__pwa=1" target="_self" title="KIMSENG official IG">
            <img src="assets/Images/IG img.png" width="60" height="60" alt="KIMSENG official IG"/>
        </a>
    </div>
    <br>
    <p><strong>&copy Karisma Maju Mulia</strong></p>
</footer>
</html>