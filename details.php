
<?php 

    // get price 
    $package = $_POST['package'];
    $id = $_POST['id'];
    $packages = file('database/package.txt');    
    foreach ($packages as $item) {
        if(strpos($item, $package) !== false)
        $value = explode(':', $item);
        $price = isset($value[1]) ? (int)$value[1] : NULL;
    }
    if ($price == NULL || $package == NULL) {
        return header("Location: index.php?msg=an error occurred, kindly try again");
    }

    // get user details
    $path = file('database/users.txt');
    foreach ($path as $item) {
        $users = explode('%%%%', $item);
    }
    if(count($users) > 0) {
        foreach ($users as $detail) {
            $data = (array)json_decode($detail);
            if($data[$id]) {
                $user = $data[$id];
            }
        }
    } else {
        return header("Location: index.php?msg=an error occurred, kindly try again");
    }
    
    if($user == NULL) {
        return header("Location: index.php?msg=an error occurred, kindly try again");
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
        <h1>welcome to Reliance Gotv Payment Engine</h1>

        <h1>GOTV <?= ucwords($package); ?> Package</h1>
        <h3>Amount: &#x20A6;<?= number_format($price); ?></h3>

        <button type="button" onclick="payWithPaystack()"> Pay Now </button> 


        <script>
        function payWithPaystack(){
            let name = '<?= $user->name; ?>';
            let email = '<?= $user->email; ?>';
            let phone = '<?= $user->phone; ?>';
            let amount = <?= $price; ?>;

            var handler = PaystackPop.setup({
            key: 'pk_test_f7018009b39518fc39fd526319e0bb2cbd10d334',
            email: email,
            amount: (amount * 100),
            currency: "NGN",
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            metadata: {
                custom_fields: [
                    {
                        display_name: name,
                        value: phone
                    }
                ]
            },
            callback: function(response){
                alert('success. transaction ref is ' + response.reference);
                return window.location.href = '/index.php?msg=Your Order has been recieved by us, we will contact you soon';
            },
            onClose: function(){
                alert('Transaction cancelled');
            }
            });
            handler.openIframe();
        }

    </script>
        
    </div> 

  </body>
</html>