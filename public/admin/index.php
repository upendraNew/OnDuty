<?php require_once 'includes/top.php' ?>
<?php 
    if(!isset($_SESSION['email'])){
        header("Location: ./login.php");
    }
?>
<!-- Content -->

<?php // require_once 'includes/cards.php' ?>

<!-- $dbClass->check($_SESSION['email']) -->

<div class="container">
<form action="" method="post">
<div class="form-group">
    <label for="work">Search Work</label>
                    <select class="form-control" name="Work">
                     <option value="Plumber">Plumber</option>
                     <option value="Electrician">Electrician</option>
                    </select>
                  </div>   
        <button type="submit" class="small btn btn-warning btn-block mt-4" name="search"
                        >Search</button>


    <div class="content">
        <?php 
            if(isset($_POST['search'])){
                $wor = $_POST['Work'];
                $da = $workerClass->byWork($wor);
                // print_r($da);
                foreach ($da as $w) {
                 echo "
                    <div class='card mt-1 text-center bg-primary text-white lead'>
                        <p>".$w->name." - ".$w->email."</p>
                        <p>Education: ".$w->education."</p>
                        <p>Experience: ".$w->experience."</p>
                        <p>Mobile: ".$w->mobile."</p>
                        <p>Charge: $".$w->wage." per hour</p>
                    </div>";
                }
            }
        ?>
    </div>

<!-- Content Ends -->
      
<?php require_once 'includes/bottom.php' ?>
