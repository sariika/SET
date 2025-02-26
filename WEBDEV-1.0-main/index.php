<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href ="CSS/webstyle.css">
    
    
    
    </head>
<body>
    
    <header><h1 id="title">Up-to-the-minute</h1>
    <nav>
       <ul>
        <a href="h.php" class="nav-item">Home</a>
           <a href="index_search.php" class="nav-item">Search page</a>
           <a href="index.php" class="nav-item">product</a>
        
        
        </ul>
    </nav>
    </header>
    
    <center><h1>Products</h1></center>
    <hr>
    
    <center><h2>Our Best Sellers</h2></center>

    <?php
    echo "We sell timers and merchandise. ";
    echo "Our timers will help you stay on top of all your daily tasks and keep track of your time. ";
    echo "Our merchandise includes different types of stationary.";
    echo "";
    ?>
    
    
    <div class="row">
        <div class="column">
            <img src="images/timer.jpg" alt="Timer">
        </div>
        <div class="column">
            <img src="images/stationary.jpg" alt="Stationary">
        </div>
</div>

    

    </body>
</html>
