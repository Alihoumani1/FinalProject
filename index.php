<?php include('partials-front/menu.php');?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center" style="background-image: url('images/category/bg.jpg');">
    
    <div class="container">
        
        <form id="search-form" action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" id="search" placeholder="Search for Food.." required>
            <button id="voice-search-btn" style="width: 60px; padding: 7px; border: none; background: none; cursor: pointer;">
                    <img src="images/mic.jpg" alt="Voice Search" style="max-width: 100%; height: auto;">
                </button>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php 
    if(isset($_SESSION['order']))
    {
        echo$_SESSION['order'];
        unset($_SESSION['order']);
    }


?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
            //create sql query to display categories from data base
            $sql="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
            //execute query
            $res=mysqli_query($conn,$sql);
            //count rows to check wether the category is available or not
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                //category available
                while($row=mysqli_fetch_assoc($res))
                {
                    //get values such as id,title,image
                    $id=$row['id'];
                    $title=$row['title'];
                    $image_name=$row['image_name'];
                    ?>
                    
            <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>">
            <div class="box-3 float-container">
                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>
                    <?php

                }
            }
            else{
                echo  "<div class ='error'>Category not added.</div>";
            }
             
            ?>


           

         
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            
            //getting foods from data base that are active and featured
            //sql query
            $sql2="SELECT *FROM tbl_food WHERE active='Yes' AND featured='Yes'LIMIT 6";
            //execute query
            $res2=mysqli_query($conn,$sql2);
            //count rows
            $count2=mysqli_num_rows($res2);
            //check wether food available or not
            if($count2>0)
            {
                //food available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //get all the values
                    $id=$row['id'];
                    $title=$row['title'];
                    $price=$row['price'];
                    $description=$row['description'];
                    $image_name=$row['image_name'];
                    ?>
                    <div class="food-menu-box">
                <div class="food-menu-img">
                <?php 
                 // check if image available
                 if (!$image_name) {
                 // image not available
                  echo "<div class='error'>Image not available.</div>";
                  } else {
                  // image available
                     ?>
                  <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="Chicken Hawaiian Pizza" class="img-responsive img-curve">
                   <?php
                   }
                  ?>
                    
                   
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="food-price">$<?php echo $price;?></p>
                    <p class="food-detail">
                        <?php echo $description; ?>
                        
                    </p>
                    <br>

                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
        </div>

                    </div>

                    <?php
                }
            }
            else{
                //not available
                echo "<div class'error'>Food not available.</div>";

            }
            ?>

           
             
           

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

   <?php include('partials-front/footer.php');?>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-JT7T9wuao+xtq8DPyRXM0xhnpAKvysqWdZ9+TVAmPxmr6QY8qKMzrYmNwnt8AaD+0PI0uVI9gO8HbK/zk8bJKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
    const searchInput = document.getElementById('search');
    const voiceSearchBtn = document.getElementById('voice-search-btn');
    const searchForm = document.getElementById('search-form');

    // Check if browser supports speech recognition
    if ('webkitSpeechRecognition' in window) {
        const recognition = new webkitSpeechRecognition();

        // Set properties for recognition
        recognition.continuous = false;
        recognition.interimResults = false;
        recognition.lang = 'en-US';

        // Event listener for voice search button click
        voiceSearchBtn.addEventListener('click', () => {
            recognition.start();
        });

        // Event listener for when speech recognition results are ready
        recognition.onresult = (event) => {
            const transcript = event.results[0][0].transcript;
            searchInput.value = transcript;
            searchForm.submit();
        };

        // Event listener for speech recognition errors
        recognition.onerror = (event) => {
            console.error('Speech recognition error:', event.error);
        };
    } else {
        // Browser does not support speech recognition
        console.warn('Speech recognition not supported.');
    }
</script>