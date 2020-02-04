<?php
require('db.php');

  if (!isset($_POST['search']))
    header("Location: view.php");

 
  $_POST['search'] = mysqli_real_escape_string($con, $_POST['search']);
  $search_sql = "SELECT * FROM `new_record` WHERE `product_name` LIKE '%" . $_POST['search'] . "%' OR `price` LIKE '%".$_POST['search']."%'";
  
  $result = mysqli_query($con, $search_sql);
  if(mysqli_num_rows($result) > 0) {    
    $search_rs = mysqli_fetch_assoc($result);
  }

  ?>
  <link rel="stylesheet" href="css/style.css" />
  <div class="form">
  <h1>Search Results</h1>
  <?php
  if (mysqli_num_rows($result) > 0) {
    do { ?>
      <h3><?php echo $search_rs['product_id']  . " " . $search_rs['product_name']  . " " . $search_rs['price']; ?></h3>
      <a href='view.php'>View Recodes</a>
  <?php
    } while (false != ($search_rs = mysqli_fetch_assoc($result)));
  }
  else
    echo "No results found";
?>
</div>

