<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Moderator Register</title>
  </head>
  <body>
  <h1>Moderator Register</h1>  

  <form method="post" autocomplete="off" action="<?=base_url('Register_controller/addMod')?>">


    <div class = "form-group">
      <label for="companyid" class="label-default">Company ID:</label>
      <input class="form-control" name="email" id="email" type="email" required> 
      <br>
      <span id="errorEmail" style="display:none;color:red;">Email Already exist!</span>  
    </div>

    <div class = "form-group">
      <label for="" class="label-default">Password:</label>
      <input class="form-control" name="password" id="password" type="password" required>
    </div>

    <div class = "form-group">
      <label for="" class="label-default">Confirm Password:</label>
      <input class="form-control" name="password2" id="password" type="password" required>
    </div>

    <div class = "form-group">
      <button type="submit" class="btn btn-primary" name="register">Register</button>    
    </div>

    <button type="submit" onclick="window.location.href='Login';">
      Back
    </button>
    
  </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
        function check(){
          $.post('<?=base_url('validation/check');?>', {email: $('#email').val()}, function(data){
            if(data.exists){
              document.getElementById("errorEmail").style.display="";
            }else{
              document.getElementById("errorEmail").style.display="none";
            }
          }, 'JSON');
        }
    </script>

  </body>
</html>
