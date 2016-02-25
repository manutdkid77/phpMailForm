<?php
  if($_POST["submit"]){
        if(!($_POST["sname"])){
          $error="Please enter sender email";
        }

        if(!($_POST["subject"])){
          $error.="<br/>Please enter subject";
        }

        if(!($_POST["body"])){
          $error.="<br/>Please enter your views";
        }
        if (!($_POST["rname"])) {
          $error.="<br/>Please enter your email id";
        }

        if($error){
          $result="<div class='alert alert-dismissible alert-danger'>
                    <p>There are error(s) in your form </p>".$error."
                      <button type='button' class='close' data-dismiss='alert'>
                      &times
                      </button>
                    </div>";
        }
        else{
          mail($_POST["sname"],$_POST["subject"], $_POST["body"],"from ".$_POST["rname"]);
          $result="<div class='alert alert-dismissible alert-success'>
                    <p>Form Submitted Successfully</p>
                      <button type='button' class='close' data-dismiss='alert'>
                      &times
                      </button>
                    </div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Mini Project</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
      body{
          font-family: 'Ubuntu', sans-serif;
         } 
      .close{
        top:-19px !important;
      }

      #formContainer{
        background: url("img/bgg3.jpg");
        background-size: cover;

      }
      .navbar{
        margin: 0;
      }
      #formContent{
        margin-top: 89px;
        border: 1px solid whitesmoke;
        border-radius: 9px;
        padding: 15px;
        width: 35%;
        margin-left: 30.333333% !important;
      }
      .form-group{
        padding-top: 25px;
      }
      #formContent>form>div>label{
        color: whitesmoke;
      }
      

    </style>
  </head>
  <body>
    
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand">PHP Form</a>
          <button class="navbar-toggle" data-toggle="collapse" data-target="#navList">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="navbar-collapse collapse navbar-right" id="navList">
          <ul class="navbar-nav nav">
            <li class="active"><a href="#">Contact Us</a></li>
          </ul>
        </div>

        
      </div>
    </div>

    <div class="bodyContainer" id="formContainer">
            <div class="container-fluid">
              <div class="col-md-3 col-md-offset-4" id="formContent">
                <?php
                      echo $result;

                    ?>
                <form method="post">
                  <div class="form-group">
                    <label for="sname">To</label>
                    <input type="email" class="form-control" name="sname" id="sname" value="<?php echo $_POST['sname']; ?>">
                  </div>
                  <div class="form-group" method="post">
                    <label for="rname">From</label>
                    <input type="email" class="form-control" name="rname" id="rname" value="<?php echo $_POST['rname']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject" value="<?php echo $_POST['subject']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="body">Your Views</label>
                    <textarea class="form-control" rows="5" id="body" name="body" style="resize:none"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-default center-block" value="Send" name="submit" id="submit">
                  </div>
                </form>
              </div>
            </div>
        </div>

    <script type="text/javascript">
      $(".bodyContainer").css("min-height",$(window).height());
    </script>
  </body>
</html>