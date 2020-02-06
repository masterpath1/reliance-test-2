
<?php 
    $purchase = false;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $inputs = $_POST;
        $path = file('database/users.txt');
        foreach ($path as $item) {
            $users = explode('%%%%', $item);
        }
        if(count($users) > 0) {
            foreach ($users as $detail) {
                $data = (array)json_decode($detail);                
                if($data[$inputs['username']]) {
                    $user = $data[$inputs['username']];
                    if ($user->password != $inputs['password']) {
                        return header("Location: index.php?msg=Wrong credentials");
                    }
                    $purchase = true;
                }
            }
        } else {
            return header("Location: index.php?msg=an error occurred, kindly try again");
        }


        // var_dump($user);
        // die();
    }
    

?>


<html>
  <head>
    <title>Reliance Gotv Payment Engine</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
  </head>
  <body> 
    <div>
        <h1>Reliance Gotv Payment Engine</h1>
        <hr>


        <?php if($purchase): ?>
            <h1>Choose Your GOTV Package</h1>

            <form action="details.php" method="post">
                <div>
                    <input type="hidden" name='id' value="<?= $inputs['username']; ?>" />

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

        <?php else: ?>

            <h3>Login Here</h3>

            <form action='' method="POST"> 
                <label>Username</label>
                <input type="text" name="username" required/><br><br>
                <label>Password</label>
                <input type="password" name="password" required/><br><br>
                <button type="submit"> Login </button> 
            </form>
        <?php endif; ?>
        
    </div> 

  </body>
</html>