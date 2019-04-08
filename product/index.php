<html>
   <head>
       <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
       <style>
       #back{
    background-image: url("login.jpg"); 
  background-position: center;
  background-repeat: no-repeat; 
  background-size: cover; }
</style>
   </head>
   
   <body id="back">
      <br>
      <div class="container-fluid">
         <div class="row ">
            <br><br>
            <div class="col-sm-1"></div>
            <div class="col-sm-3 jumbotron" style="padding:20px;border:1px solid grey;">
               <h3 class="text-center">Login</h3>
               <hr>
               <form action="usercheck.php" method="post" id="myform">
                  <div class="form-group">
                     <label>Email</label>
                     <input type="text" name="email" class="form-control" id="email" >
                     <i id="emailErr"></i>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" id="password" title="Please enter atleast 8 characters">
                     <i id="passwordErr"></i>
                  </div>
                  <div class="form-group text-center">
                     <button class="btn btn-primary btn-md" type="submit" id="login">Login</button>
                  </div>
               </form>
            </div>
            <div class="col-sm-8"></div>
         </div>
      </div>
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="js/script.js"></script>
   </body>
</html>
