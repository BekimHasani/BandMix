<?php include 'header.php' ?>


        <div class="main-header">
            <h1>Sign into BandMix</h1>
        </div>
        <?php
        if(isset($_SESSION['validationError']) && 'BAND' == $_SESSION['validationError']){
          echo '<script type="text/javascript">
                  window.onload = function() {
                      showBand();
                    }
              </script>';
            }
         ?>

          <div class="main-body flex">;
            <div class="register-main-content flex flex-direction-column">
                <div id="register-header">
                  <h1>Register</h1>
                    <p>Please fill in this form to create an account.</p>
                    <hr>
                </div>

                <div class="flex justify-content-center " >
                  <div class="flex justify-content-around vid">
                     <button onclick="showMusician()" class="type-change-button" value="musician">Musician</p>
                       <button onclick="showBand()" class="type-change-button" value="band">Band</p>
                  </div>
                  </script>
                </div><hr>


                <!-- musician  -->
                  <div id="MusicianForm" class="show">
                    <form  name="individualRegisterForm" onsubmit="return musicianValidationForm()" action="../handler/SignUpHandler.php" method="POST" id="musician-register-form">
                    <table id="register-table">
                          <tr>
                              <td>
                                <label for="firstname"><b>First Name:</b></label>
                                <input class="register-page-input" name="firstname" required>
                                <?php
                                  if(isset($_SESSION['firstNameError'])){
                                      echo '</br><i class="validation-error">'.$_SESSION['firstNameError'].'</i>';
                                    unset($_SESSION['firstNameError']);
                                  }
                                 ?>
                              </td>

                              <td>
                                  <label for="lastname"><b>Last Name:</b></label>
                                  <input class="register-page-input" type="text" name="lastname" required>
                                  <?php
                                    if(isset($_SESSION['lastNameError'])){
                                      echo '</br><i class="validation-error">'.$_SESSION['lastNameError'].'</i>';
                                      unset($_SESSION['lastNameError']);
                                    }
                                   ?>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <label for="email"><b>Email:</b></label>
                                  <input class="register-page-input" name="email" required>
                                  <?php
                                    if(isset($_SESSION['emailError'])){
                                      echo '</br><i class="validation-error">'.$_SESSION['emailError'].'</i>';
                                      unset($_SESSION['emailError']);
                                    }
                                   ?>
                              </td>
                              <td>
                                  <label for="state"><b>State:</b></label>
                                  <input class="register-page-input"  name="state" required>
                                  <?php
                                    if(isset($_SESSION['stateError'])){
                                      echo '</br><i class="validation-error">'.$_SESSION['stateError'].'</i>';
                                      unset($_SESSION['stateError']);
                                    }
                                   ?>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <label for="city"><b>City:</b></label>
                                  <input class="register-page-input"  name="city" required>
                                  <?php
                                    if(isset($_SESSION['cityError'])){
                                      echo '</br><i class="validation-error">'.$_SESSION['cityError'].'</i>';
                                      unset($_SESSION['cityError']);
                                    }
                                   ?>
                              </td>

                              <td>
                                  <label for="instrument"><b>Instrument:</b></label>
                                  <select class="register-page-input" name="instrument">
                                    <option value=""></option>
                                    <option value="Guitar">Guitar</option>
                                    <option value="Piano">Piano</option>
                                    <option value="Drums">Drums</option>
                                    <option value="Bass">Bass</option>
                                  </select>
                                  <?php
                                    if(isset($_SESSION['instrumentError'])){
                                      echo '</br><i class="validation-error">'.$_SESSION['instrumentError'].'</i>';
                                      unset($_SESSION['instrumentError']);
                                    }
                                   ?>
                              </td>


                          </tr>
                          <tr>
                            <td>
                                <label for="username"><b>Username:</b></label>
                                <input type="text"  class="register-page-input" name="username" required>
                                <?php
                                  if(isset($_SESSION['usernameError']) && 'MUSICIAN' == $_SESSION['validationError']){
                                    echo '</br><i class="validation-error">'.$_SESSION['usernameError'].'</i>';
                                    unset($_SESSION['usernameError']);
                                  }
                                 ?>
                            </td>
                            <td>
                                <label for="password"><b>Password:</b></label>
                                <input class="register-page-input" type="password"  name="password" required>
                                <?php
                                  if(isset($_SESSION['passwordError']) && 'MUSICIAN' == $_SESSION['validationError']){
                                    echo '</br><i class="validation-error">'.$_SESSION['passwordError'].'</i>';
                                    unset($_SESSION['passwordError']);
                                    unset($_SESSION['validationError']);
                                  }
                                 ?>
                            </td>
                          </tr>
                          <input type="hidden" name="usertype" value="MUSICIAN">
                    </table>
                    <div class="flex justify-content-center">
                      <input type="submit" name='registerbtn' class="registerbtn">
                    </div><hr>
                    </form>
                  </div>

                  <!-- band -->
                  <div id="BandForm" class="hide">
                    <form name="bandRegisterForm" onsubmit="return bandValidationForm()"  action="../handler/SignUpHandler.php" method="POST" id="band-register-form">
                      <table id="register-table" >
                          <tr>
                              <td>
                                <label for="bandName"><b>Band Name:</b></label>
                                <input class="register-page-input" name="bandName" required>
                                <?php
                                  if(isset($_SESSION['bandNameError'])){
                                    echo '</br><i class="validation-error">'.$_SESSION['bandNameError'].'</i>';
                                    unset($_SESSION['bandNameError']);
                                  }
                                 ?>
                              </td>
                              <td>
                                  <label for="description"><b>Description:</b></label>
                                  <input class="register-page-input" type="text" name="description" required>
                              </td>
                          </tr>
                          <tr>
                            <td>
                              <label for="bandType"><b>Band Type:</b></label>
                                <select class="register-page-input" name="bandType" required>
                                  <option value=""></option>
                                  <option value="Rock Band">Rock Band</option>
                                  <option value="Pop Band">Pop Band</option>
                                  <option value="Rap Band">Rap Band</option>
                                  <option value="Others">Others</option>
                                </select>
                                <?php
                                  if(isset($_SESSION['bandTypeError'])){
                                    echo '</br><i class="validation-error">'.$_SESSION['bandTypeError'].'</i>';
                                    unset($_SESSION['bandTypeError']);
                                  }
                                 ?>
                              </td>
                              <td>
                                <label for="email"><b>Email:</b></label>
                                <input class="register-page-input" name="email" required>
                                <?php
                                    if(isset($_SESSION['bandEmailError'])){
                                      echo '</br><i class="validation-error">'.$_SESSION['bandEmailError'].'</i>';
                                      unset($_SESSION['bandEmailError']);
                                    }
                                   ?>
                            </td>

                          </tr>
                          <tr>
                            <td>
                              <label for="state"><b>State:</b></label>
                              <input class="register-page-input"  name="state" required>
                              <?php
                                  if(isset($_SESSION['bandStateError'])){
                                    echo '</br><i class="validation-error">'.$_SESSION['bandStateError'].'</i>';
                                    unset($_SESSION['bandStateError']);
                                  }
                                 ?>
                            </td>

                            <td>
                              <label for="city"><b>City:</b></label>
                              <input class="register-page-input"  name="city" required>
                              <?php
                                  if(isset($_SESSION['bandCityError'])){
                                    echo '</br><i class="validation-error">'.$_SESSION['bandCityError'].'</i>';
                                    unset($_SESSION['bandCityError']);
                                  }
                                 ?>
                            </td>


                          </tr>
                          <tr>
                            <td>
                                <label for="username"><b>Username:</b></label>
                                <input type="text"  class="register-page-input" name="username" required>
                                <?php
                                  if(isset($_SESSION['usernameError'])){
                                    echo '</br><i class="validation-error">'.$_SESSION['usernameError'].'</i>';
                                    unset($_SESSION['usernameError']);
                                  }
                                 ?>
                            </td>

                            <td>
                                <label for="password"><b>Password:</b></label>
                                <input class="register-page-input" type="password"  name="password" required>
                                <?php
                                  if(isset($_SESSION['passwordError'])){
                                    echo '</br><i class="validation-error">'.$_SESSION['passwordError'].'</i>';
                                    unset($_SESSION['passwordError']);
                                  }
                                 ?>
                            </td>

                          </tr>
                          <input type="hidden" name="usertype" value="BAND">
                    </table>

                    <div class="flex justify-content-center">
                      <input type="submit" name='registerbtn' class="registerbtn">
                    </div><hr>
                  </form>
                  </div>



                  <p class="txtstyle">Already have an account? <a href="login.php">Sign in</a>.</p>

            </div>
        </div>

        <?php include 'footer.php'; ?>
    </body>
    <script type="text/javascript">

        var register=true;
        function showMusician(){
          document.getElementById("MusicianForm").classList.remove("hide");
          document.getElementById("MusicianForm").classList.add("show");
          document.getElementById("BandForm").classList.remove("show");
          document.getElementById("BandForm").classList.add("hide");
          register=true;
        }

        function showBand(){
          document.getElementById("MusicianForm").classList.remove("show");
          document.getElementById("MusicianForm").classList.add("hide");
          document.getElementById("BandForm").classList.remove("hide");
          document.getElementById("BandForm").classList.add("show");
          register=false;
        }

        function musicianValidationForm(){
          console.log(12);
          var firstname = document.musicianRegisterForm.firstname;
          var lastname  = document.musicianRegisterForm.lastname;
          var email = document.musicianRegisterForm.email;
          var password = document.musicianRegisterForm.password;
          var state = document.musicianRegisterForm.state;
          var city = document.musicianRegisterForm.city;
          var instruments = document.musicianRegisterForm.instruments;
          var usertype = document.musicianRegisterForm.usertype;
          var username = document.musicianRegisterForm.username;

          var nameRgx = /^[A-Za-z]{3,20}/;
          var addressRgx = /^[A-Za-z]{3,30}/;
          var usernameRgx = /^[^\W_]{4,20}$/;

          if(!firstname.value.match(nameRgx)){
            alert('First name must contain characters only (3-20)');
            firstname.focus();
            return false;
          }

          if(!lastname.value.match(nameRgx)){
            alert('Last name must contain characters only (3-20)');
            lastname.focus();
            return false;
          }

          var emailRgx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if(email.value.length == 0 || !email.value.match(emailRgx)){
            alert('Invalid email');
            email.focus();
            return false;
         }

         if(!state.value.match(addressRgx)){
           alert('State must not be empty and can contain at most 30 characters');
           state.focus();
           return false;
         }

         if(!city.value.match(addressRgx)){
           alert('City must not be empty and can contain at most 30 characters');
           city.focus();
           return false;
         }

         if(!username.value.match(usernameRgx)){
           alert('Username must contain only characters and digits (4-20)');
           username.focus();
           return false;
         }

          var passwordRgx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{6,20}/;

          if(!password.value.match(passwordRgx)){
            alert('Password must contain 6-20 characters and at least one letter, one number,and one of the special symbols');
            password.focus();
            return false;
          }

          if(instruments.value.length === 0 || !instruments.value){
              alert('Select one of the instruments from the list');
              instrumentsValue.focus();
              return false;
          }

          if(usertype.value.length === 0 || !usertype.value){
              alert('User type cannot be empty');
              usertype.focus();
              return false;
          }
          return true;
        }

        function bandValidationForm(){
          var bandname = document.bandRegisterForm.bandname;
          var description  = document.bandRegisterForm.description;
          var bandtype = document.bandRegisterForm.bandtype;
          var email = document.bandRegisterForm.email;
          var state = document.bandRegisterForm.state;
          var city = document.bandRegisterForm.city;
          var password = document.bandRegisterForm.password;
          var usertype = document.bandRegisterForm.usertype;

          var nameRgx = /^[A-Za-z0-9]{3,20}/;
          var addressRgx = /^[A-Za-z]{3,30}/;
          var usernameRgx = /^[^\W_]{4,20}$/;

          if(!bandname.value.match(nameRgx)){
            alert('Band name must contain characters only (3-20)');
            bandname.focus();
            return false;
          }

          if(!description.value.match(nameRgx)){
            alert('Description must contain more than 5 characters only');
            description.focus();
            return false;
          }

          if(bandtype.value.length === 0 || !bandtype.value){
              alert('Select one of the band type from the list');
              bandtype.focus();
              return false;
          }

          var emailRgx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          if(email.value.length == 0 || !email.value.match(emailRgx)){
            alert('Invalid email');
            email.focus();
            return false;
          }

          if(!state.value.match(addressRgx)){
            alert('State must not be empty and can contain at most 30 characters');
            state.focus();
            return false;
          }

          if(!city.value.match(addressRgx)){
            alert('City must not be empty and can contain at most 30 characters');
            city.focus();
            return false;
          }

          if(!username.value.match(usernameRgx)){
            alert('Username must contain only characters and digits (4-20)');
            username.focus();
            return false;
          }

          var passwordRgx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{6,20}/;
          if(!password.value.match(passwordRgx)){
            alert('Password must contain 6-20 characters and at least one letter, one number,and one of the special symbols');
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
