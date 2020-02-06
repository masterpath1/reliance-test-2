<?php 

    // get price 
    $inputs = $_POST;
    $inputs['password'] = rand(99999, 111111);
    $userId = 'user_'.$inputs['password'];

    $userdetails = [// format user details
        $userId => $inputs
    ];
    // open a file
    $path = 'database/users.txt';
    $current = file_get_contents($path);
    $file = fopen($path,"w+") or die("Reload Page");
    $current.= $current ? '%%%%' : '';
    $current.= json_encode($userdetails);
    $update = fwrite($file, $current);

?>

<html>
  <head>
    <title>Reliance Gotv Payment Engine</title>
  </head>
  <body> 
    <div>
        <?php if($update): ?>
            <h1>Registration <?= $update ? 'was successfully' : 'Failed'; ?> </h1>
        
            <h3>Username: <?= $userId; ?></h3>

            <h3>Password: <?= $inputs['password']; ?></h3>

            <h4 style="color: red;">Note your password and email address write down, so you can use it next time</h4>
            
            <form action='purchase.php' method="post">
                <input type="hidden" name='id' value="<?= $userId; ?>" />
                <button type="submit"> Buy Now </button> 
            </form>
        <?php else: ?>
            <h4 style="color: red;">Registration Failed, click below to try again</h4>
            <a href="details.php">Register Now</a>
        <?php endif; ?>
        
    </div>    
  </body>
</html>