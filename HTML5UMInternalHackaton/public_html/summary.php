<?php 
    session_start();
    $delivery = $_GET['delivery'];
    $cutlery = $_GET['cutlery'];
    if(isset($_GET['spot'])){
        $spot = $_GET['spot'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Summary of Your Order</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- assets/CSS -->
    <link rel="stylesheet" href="assets/CSS/style2.css">
    <link href="assets/CSS/custom.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let orderItems = '';
            let totalItems = 0;
            let totalPrice = 0.0;
            let orderData = [];
            let username = sessionStorage.getItem('username') || 'guest';
            let cutlery = '<?php echo $cutlery; ?>';
            let delivery = '<?php echo $delivery; ?>';
            let spot = '<?php echo $spot; ?>';

            // Iterate through all items stored in session storage
            for (let key in sessionStorage) {
                if (sessionStorage.hasOwnProperty(key) && key.startsWith('item_')) {
                    let item = JSON.parse(sessionStorage.getItem(key));
                    orderItems += `<div class="item">
                        <p class="name">${item.name} (Quantity: ${item.quantity})</p>
                        <p class="price">RM ${(item.price * item.quantity).toFixed(2)}</p>
                    </div>`;
                    totalItems += item.quantity;
                    totalPrice += item.quantity * item.price;

                    // Add item to orderData array
                    orderData.push({
                        name: item.name,
                        quantity: item.quantity,
                        price: item.price,
                        total: item.price * item.quantity

                    });
                }
            }

            // Adjust total price based on cutlery choice
            if (cutlery === 'yes') {
                totalPrice += 1.0; // Add RM1 for cutlery
                cutleryMessage = 'Cutlery cost(RM 1.00)';
            } else if (cutlery === 'no') {
                totalPrice *= 0.9; // Apply 10% discount
                cutleryMessage = '10% discount applied for no cutlery';
            }



            // Update the order summary in the DOM
            $('.order-items').html(orderItems);

            if (cutleryMessage) {
                $('.order-items').append(`<p class="cutleryMessage">${cutleryMessage}</p>`);
            }

            $('.total-price').text(`RM ${totalPrice.toFixed(2)}`);


            // Add order data to hidden fields in the form
            $('#order-data').val(JSON.stringify(orderData));
            $('#total-items').val(totalItems);
            $('#total-price').val(totalPrice);
            $('#cutlery').val(cutlery);
            $('#delivery').val(delivery);
            $('#spot').val(spot);
        });
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- Pinyon Script -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Pinyon+Script&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Food Order Summary</h1>
    </header>

    <main class="container">
        <section class="order-summary">
            <h2>Invoice</h2>
            <div class="order-items">
                <!-- Order items will be inserted here by JavaScript -->
            </div>

            <div class="order-total">
                <p>Total:</p>
                <p class="total-price">RM 0.00</p>
            </div>
        </section>

        <!-- QR Payment Section -->
        <section class="qr-payment">
            <h5><b>Scan the QR Code to Pay</b></h5>
            <img src="assets/Images/template QR.jpg" alt="QR Code for Payment" class="qr-image">
        </section>

        <!-- Upload Payment Evidence Section -->
        <section class="upload-payment">
            <h5><b>Upload Your Payment Evidence</b></h5>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label for="payment-evidence">Choose Image:</label>
                <input type="file" name="payment-evidence" id="payment-evidence" accept="image/*" required>
                <input type="hidden" name="username" value="<?php echo $_SESSION["user"]?>">
                <input type="hidden" id="order-data" name="order-data">
                <input type="hidden" id="total-items" name="total-items">
                <input type="hidden" id="total-price" name="total-price">
                <input type="hidden" name="delivery" value="<?php echo $delivery; ?>">
                <input type="hidden" name="cutlery" value="<?php echo $cutlery; ?>">
                <input type="hidden" name="spot" value="<?php echo $spot; ?>">
                <button type="submit" class="upload-btn">Upload</button>
            </form>
        </section>
    </main>
    <br><br>
    <footer>
        <div class="image-container3">
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
</body>
</html>