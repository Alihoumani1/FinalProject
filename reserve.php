<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search" style="background-image: url('images/category/bg.jpg');">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your Reservation.</h2>

            <form action="" method="POST" class="order">
             
                    
                </fieldset>
                
                <fieldset>
                    <legend>Reservation Details</legend>
                    <div class="rserve-label">Full Name</div>
                    <input type="text" name="Name" placeholder="E.g. Ali Houmani" class="input-responsive" required>

                    <div class="reserve-label">Phone Number</div>
                    <input type="tel" name="Phone" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="reserve-label">Email</div>
                    <input type="email" name="Email" placeholder="E.g. hi@Alihoumani.com" class="input-responsive" required>
                    <div class="reserve-label">Date</div>
                    <input type="text" name="reservation_date" placeholder="E.g. 00/00/2024" class="input-responsive" required>
                    <div class="reserve-label">Seats</div>
                    <textarea name="seats" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Reservation" class="btn btn-primary">
                </fieldset>

            </form>
            <?php
            //check whether submit button is clicked or not
            if(isset($_POST['submit']))
            {
                
                $reservation_date = date("Y-m-d H:i:s"); // Current date and time in proper format
                $status = "Reserved"; // Order status
                $Name = $_POST['Name'];
                $seats = $_POST['seats'];
                $Phone = $_POST['Phone'];
                $Email = $_POST['Email'];

                // Save order in database
                // Create SQL to save data
                $sql = "INSERT INTO dineIn (reservation_date, status, Name, seats, Phone, Email) 
                        VALUES ('$reservation_date', '$status', '$Name', '$seats', '$Phone', '$Email')";
                
                // Execute the query
                $res = mysqli_query($conn, $sql);
                
                // Check if executed
                if($res)
                {
                    // Executed and order set
                    $_SESSION['order'] = "<div class='success'>Reservation confirmed successfully</div>";
                    header('location: '.SITEURL);
                }
                else
                {
                    // Failed to save order
                    $_SESSION['order'] = "<div class='error'>Failed to confirm reservation</div>";
                    header('location: '.SITEURL);
                }
            }
            ?>


        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>
