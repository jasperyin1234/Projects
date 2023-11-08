<?php
session_start();
include_once("includes/config.php");

$getUserID = '';
$getResID = $_GET['resID'];
$result = mysqli_query($mysqli, "SELECT * FROM restaurantlist WHERE resID= '$getResID' ");
?>

<html>

<head>
    <title>Restaurant Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/mystyle.css">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>

<body>
    <?php

    if (isset($_SESSION['userID'])) {
        include_once("includes/memberHeader.php");
    } else {
        include_once("includes/guestHeader.php");
    }

    ?> 		
            <div>
                <button type="button" class="backButton backButtonDetails">
    <span class="backButtonIcon"><ion-icon name="arrow-back-outline"></ion-icon></span>
        <span class="backButtonText"><a href="/Group 11/restaurantList.php">Back To Restaurant List</a></span>
</button>
                <?php
                while ($details = mysqli_fetch_array($result)) {
                    $getResLogo = $details['resLogo'];
                    $getResGallery1 = $details['gal1'];
                    $getResGallery2 = $details['gal2'];
                    $getResGallery3 = $details['gal3'];
                    echo "<div class='detailsHeader'><img class='restaurantLogo' src='.$getResLogo'>";
                    echo "<div class='details'><h4 id='RestaurantName'>" . $details['resName'] . "</h4>";
                    echo "Operation Day: " . $details['operationDay'] . "<br>";
                    echo "Operation Hour: " . $details['operationTime'] . "<br>";
                    echo "Location: " . $details['location'] . "<br></div>";

                    echo "<button class='booking-btn'><a href='#' id='makeReservationButton'>Make Reservation</a></button>";

                    echo "<div class='description'><h3>About the Restaurant</h3>" . $details['description'] . "<br><br>";
                    echo "</div></div>";

                    echo "<div class='moreDetails'><h3>More Details</h3><hr>";
                    echo "<h5 class='detailsTitle'>Cuisines</h5>" . $details['cuisine'];
                    echo "<h5 class='detailsTitle'>Price Range</h5>";
                    echo "Average spending: " . $details['priceRange'] . " per pax";
                    echo "<h5 class='detailsTitle'>Payment Options</h5>" . $details['paymentOption'];
                    echo "<h5 class='detailsTitle'>Contact</h5>" . $details['contact'];
                    echo "<h5 class='detailsTitle'>Website</h5><a href=https://" . $details['website'] . ">" . $details['website'] . "</a><br><br><br><br></div>";
                }
                ?>
            </div>
            <?php
            if (isset($_SESSION['userID'])) {
                $getUserID = $_SESSION['userID'];

                echo " 
        <div class='bg-modal'>
        <div class='modal-content'>
            <img id='AppLogo' src='/Group 11/images/AppLogo_.jpeg' alt='App Logo' />
            <form action='/Group 11/makeReservation.php' method='post' name='makeReservation'>
                <div class='close'>+</div>
            
                <input class='userID' type='hidden' name='userID' value=' .$getUserID. '>
                <input class='resID' type='hidden' name='resID' value= '.$getResID.'>
                <input class='bookingInput' type='date' name='bookingDate' placeholder='Date' required>
                <input class='bookingInput' type='text' name='bookingName' placeholder='Name' required>
                <input class='bookingInput' type='text' name='bookingContact' placeholder='Phone Number' required>
                <select class='bookingInput' name='bookingTime' placeholder='Booking Time' required>
                    <option value='08:00'>08.00am</option>
                    <option value='09:00'>09.00am</option>
                    <option value='10:00'>10.00am</option>
                    <option value='11:00'>11.00am</option>
                    <option value='12:00'>12.00pm</option>
                    <option value='13:00'>01.00pm</option>
                    <option value='14:00'>02.00pm</option>
                    <option value='15:00'>03.00pm</option>
                    <option value='16:00'>04.00pm</option>
                    <option value='17:00'>05.00pm</option>
                    <option value='18:00'>06.00pm</option>
                    <option value='19:00'>07.00pm</option>
                    <option value='20:00'>08.00pm</option>
                    <option value='20:00'>09.00pm</option>
                    <option value='20:00'>10.00pm</option>
                </select>
                <input class='bookingInput' type='number' name='bookingPax' placeholder='Number of Pax' min='1' max='10' required>
                <input class='book-now' type='submit' name='Book' value='Book Now!' onclick='book()';  return true;'>
            </form>
        </div>
    </div>
    
    <script>
        document.getElementById('makeReservationButton').addEventListener('click',
            function() {
                document.querySelector('.bg-modal').style.display = 'flex';
            }
        );
        document.querySelector('.close').addEventListener('click',
            function() {
                 document.querySelector('.bg-modal').style.display = 'none';
            }
        );

        function book() {
            document.getElementById('makeReservation').action = '/Group 11/makeReservation.php';
        };
    </script>";
    } else {
                echo "
            <div class='bg-modal'>
                <div class='modal-content'>
                    </div></div>
            <script>
                document.getElementById('makeReservationButton').addEventListener('click',
                function() {
                    alert('Please log in first!')
                }
            );
            </script>";
            }
        
            
            ?>


            <div class='gallery'>
                <h3>Gallery</h3>
                <?php
                echo "<p><img src='.$getResGallery1.'class='resGallery' alt='Restaurant gallery 1' width='300'></p>";
                echo "<p><img src='.$getResGallery2.'class='resGallery' alt='Restaurant gallery 2' width='300'></p>";
                echo "<p><img src='.$getResGallery3.'class='resGallery' alt='Restaurant gallery 3' width='300'>";
                ?>
            </div><br>

            <?php include 'includes/footer.php' ?>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>