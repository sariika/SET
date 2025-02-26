<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="webstyle.css">
</head>
<header><h1 id="title">Up-to-the-minute</h1>
    <nav>
       <ul>
           <a href="h.php" class="nav-item">Home</a>
           <a href="index_search.php" class="nav-item">Search page</a>
           <a href="index.php" class="nav-item">product</a>
        
        
        </ul>
    </nav>
    </header>
    
<body>
    <div class="container">
        <div class="show" >1</div>
        <div class="show" >2</div>
        <div class="show" >3</div>
        <div class="show" >4</div>
    
    </div>
    
    
</body>
<?php
    for ($x = 0; $x <= 10; $x++) {
    echo "The number is: $x <br>";
}
?>
</html>
