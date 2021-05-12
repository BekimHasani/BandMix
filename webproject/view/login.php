<?php include 'header.php' ?>

        <div class="main-header">
            <h1>Sign into BandMix</h1>
        </div>
        <div class="main-body flex">
            <div class="myaccount-main-content">
                <h2>Bandmix Login</h2>

                    <form onsubmit="return validateForm()" name = "loginForm"  class="forma-myaccount" action="../handler/loginHandler.php" method="post">

                        <div class="email-input flex justify-content-between">
                            <label for="" class="req ml3"> <strong>Username:</strong> </label>
                              <?php
                                if(isset($_SESSION['usernameValue'])){
                                  echo '<input type="text" name="username" value="'.$_SESSION['usernameValue'].'" class="textinput">';
                                  unset($_SESSION['usernameValue']);
                                }else{
                                  echo '<input type="text" name="username" value="" class="textinput">';
                                }
                              ?>
                            <?php
                              if(isset($_SESSION['usernameMessage'])){
                                  echo '</br><i class="validation-error">'.$_SESSION['usernameMessage'].'</i>';
                                  unset($_SESSION['usernameMessage']);
                              }
                             ?>
                        </div>

                        <br>
                        <div class="password-input flex justify-content-between">
                            <label for="" class="req ml3"> <strong>Password:</strong></label>
                            <input type="password" name="password" value="" class="textinput">
                            <?php
                              if(isset($_SESSION['passwordMessage'])){
                                  echo '</br><i class="validation-error">'.$_SESSION['passwordMessage'].'</i>';
                                  unset($_SESSION['passwordMessage']);
                              }
                             ?>
                        </div>

                        <div class="flex marginL">
                            <div class="usertype-radiobutton">
                             <input type="radio" id="musician" name="usertype" value="MUSICIAN" checked>
                             <label for="musician">Musician</label>
                             <input type="radio" id="band" name="usertype" value="BAND">
                             <label for="band">Band</label>
                           </div>
                        </div>

                        <div class="forgot-remember-password ">
                            <a href="#">Forgot your password?</a>
                            <br><br>
                        </div>
                        <br>

                        <input type="submit" name="signin" value="Sign in" class="sign-in-button">
                    </form>

                    <p style="margin-top: 5%";>If you don't have an account yet, please sign up first.</p>
                    <div class="authentication-paragraf">
                        <img src="images/tick.png" alt="">
                    <p class=""> Using secure authentication.</p>
                    <h2>Got Facebook?</h2>
                    </div>
                    <p>Already have an account with Facebook? Login seamlessly with Facebook.</p>
                    <a href="#" style="margin-bottom:15%;"> <img src="images\login-with-Fb.png" alt=""> </a>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
    <script type="text/javascript">

      function validateForm(){
         var username = document.loginForm.username;
         var password = document.loginForm.password;
         var usertype = document.loginForm.usertype;
         var usernameRgx = /^[^\W_]{4,20}$/;

          if(username.value.length == 0){
            alert('Username is missing, please enter username');
            username.focus();
            return false;
          }

          var passwordRgx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{6,20}/;

          if(password.value.length == 0){
            alert('Password is missing, please enter password');
            password.focus();
            return false;
          }

          if(usertype.value.length === 0 || !usertype.value){
            alert('User type cannot be empty');
            usertype.focus();
            return false;
          }

          return true;
      }
    </script>
</html>
