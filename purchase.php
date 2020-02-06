
<?php 
    $userId = $_POST['id'];

    if ($userId == NULL) {
        return header("Location: index.php?msg=an error occurred, kindly try again");
    }
?>


<html>
  <head>
    <title>Reliance Gotv Payment Engine</title>
  </head>
  <body> 
    <div>
        <h1>Choose Your GOTV Package</h1>

        <form action="details.php" method="post">
            <div>
                <input type="hidden" name='id' value="<?= $userId; ?>" />

                <labe>Select a package: </label>
                <select name="package" required>
                    <option value="">Select a package</option>
                    <option value="lite">GOTV Lite</option>
                    <option value="mega">GOTV Mega</option>
                </select>
            </div>
            <br><br>
            <button type="submit">Buy Now</button> 
        </form>
    </div> 


    

  </body>
</html>