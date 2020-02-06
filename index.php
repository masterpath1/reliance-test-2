
<html>
  <head>
    <title>Reliance Gotv Payment Engine</title>
  </head>
  <body> 
    <div>

        <h1>welcome to Reliance Gotv Payment Engine</h1>
        <hr>

        <h2 style="color: red;"><?= $_GET['msg'] ?></h2>

        <h1>Make Payemnt below</h1>
        <h2 style="color: red;">Already have an account? <a href="login.php">Click here</a> to login</h2>
        
        <h3>No account yet, fill the details below</h3>
        <form action='register.php' method="post"> 
            <label>Full Name</label>
            <input type="text" name="name" id="name" required/><br><br>
            <label>Email Address</label>
            <input type="text" name="email" id="email" required/><br><br>
            <label>Phone Number</label>
            <input type="text" name="phone" id="phone" required/><br><br>
            <button type="submit"> Signup Now </button> 
        </form>
    </div>    
  </body>
</html>