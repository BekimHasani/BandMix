<?php include 'header.php' ?>

        <div class="main-header">
            <h1>Contact BandMix.com </h1>
        </div>
        <div class="main-body flex">
            <div class="left-main-body">
                <div class="left-contact-content">
                    <h2>We love to hear from you! Send us your questions, comments or ideas!</h2>
                    <p>Customer Support: <strong>877-569-6118.</strong></p><br><br>
                    <form action="../handler/ContactInsertHandler.php" onsubmit="return validateForm()" method="post" name='contactUsForm'>
                      <table id="contactus-input-table">
                          <tr>
                              <td>
                                  <label for="">Your Name:</label>
                              </td>
                              <td>
                                  <input type="text" name="name" value="" required>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <label for="">Your Email:</label>
                              </td>
                              <td>
                                  <input type="email" name="email" value="" required>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                <label for="">Subject :</label>
                              </td>
                              <td>
                                <input type="text" name="subject" value="" required>
                              </td>
                          </tr>
                      </table>
                      <label for="">Message:</label><br>
                      <textarea id="contactus-textarea" name="description" rows="8" cols="80" minlength="40" placeholder="Minimum 60 characters"></textarea><br>
                      <input type="submit" name="contactusBtn" value="Contact Us" >
                      <?php if(isset($_SESSION['contactMessage'])): ?>
                        <?php
                          echo '<p><i style="color:red;">'.$_SESSION['contactMessage'].'</i></p>';
                          unset($_SESSION['contactMessage']);
                        ?>
                      <?php endif; ?>
                    </form>
                </div>
            </div>
            <div class="right-main-body">
                <div class="right-contact-content">

                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>
    </body>

    <script type="text/javascript">

      function validateForm(){
        var name = document.contactUsForm.name;
        var email = document.contactUsForm.email;
        var subject = document.contactUsForm.subject;
        var description = document.contactUsForm.description;

        var emailRgx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(email.value.length == 0 || !email.value.match(emailRgx) || email.value.length > 50 ){
          alert('Invalid email max length(50)');
          email.focus();
          return false;
        }
        var nameRgx = /^[A-Za-z]{3,20}/;
        if(!name.value.match(nameRgx)){
          alert('Name must contain characters only (3-20)');
          name.focus();
          return false;
        }

        if(subject.value.length == 0 ){
          alert('Subject cannot be empty');
          email.focus();
          return false;
        }

        if(subject.value.length > 30 ){
          alert('Subject cannot contain more than 30 characters ');
          email.focus();
          return false;
        }

        var subjectRgx = /^[A-Za-z0-9]{3,20}/;
        if(!subject.value.match(subjectRgx) ){
          alert('Subject can contain only numbers and characters');
          email.focus();
          return false;
        }

        if(description.value.length == 0){
          alert('Description cannot be empty');
          email.focus();
          return false;
        }

        if(description.value.length > 1000){
            alert('Description cannot contain more than 500 characters ');
            email.focus();
            return false;
        }
      }

    </script>
</html>
