<?php

//Check Account exist 
function checkAccountExistLogin($conn, $data) {
  $sm_check = $conn->prepare("SELECT * FROM account WHERE email = :email and password = :password");
  $sm_check->bindParam(":email", $data["email"], PDO::PARAM_STR);
  $sm_check->bindParam(":password", $data["password"], PDO::PARAM_STR);
  $sm_check->execute();
  $count = $sm_check->rowCount();
  if ($count != 0) return true;
  return false;
}

function getDataAccountIdLogin($conn, $email) {
  $sm = $conn->prepare("SELECT * FROM account WHERE email = :email");
  $sm->bindParam(":email", $email, PDO::PARAM_STR);
  $sm->execute();
  $data = $sm->fetch(PDO::FETCH_ASSOC);
  return $data;
}

if(!session_id()) {
    session_start();
}
  require_once 'facebook/src/Facebook/autoload.php';
  $fb = new Facebook\Facebook([
    'app_id' => '762485030958079',
    'app_secret' => '7a556c1b53f3b5574529fd2bcdf9d29f',
    'default_graph_version' => 'v2.10',
    ]);
  
  $helper = $fb->getRedirectLoginHelper();
  
  $permissions = ['email']; // Optional permissions
  $loginUrl = $helper->getLoginUrl('http://localhost:8080/eproject_aptech/facebook/fb-callback.php', $permissions);

if(isset($_POST['login'])){
  $datalogin = array();
  if(!empty($_POST['email']) && !empty($_POST['password'])){
    $datalogin['email'] = $_POST['email'];
    $datalogin['password'] = md5($_POST['password']);
    if(checkAccountExistLogin($conn, $datalogin)) {
      //Logged in successfully
      $dataaccount = getDataAccountIdLogin($conn, $datalogin['email']);
      $_SESSION['loginclient']['id'] = $dataaccount['id'];
      header('location:index.php');
    } else {
      ?>
        <script>alert('Login unsuccessful');</script>
      <?php
    }
  }
}

?>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">                      
    <div class="modal-body">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Login</h4>
        <form class="aa-login-form" action="" method="post">
        <label for="">Email<span>*</span></label>
        <input type="email" required name="email" class="form-control" placeholder="Enter your email">
        <label for="">Password<span>*</span></label>
        <input type="password" required name="password" class="form-control" placeholder="enter your password">
        <button class="aa-browse-btn" name="login" type="submit">Login</button>
        <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember the password </label>
        <p class="aa-lost-password"><a href="#">Forgot password</a></p>
        <div class="aa-register-now">
            <p style="padding: 8px; background:#4545f1;"><a href="<?php echo $loginUrl; ?>" style="color:white;">Login with facebook</a></p>
            You do not have an account?<a href="index.php?p=taikhoan">Registration!</a>
        </div>
        </form>
    </div>                        
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>    