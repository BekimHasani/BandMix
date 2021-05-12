<?php include 'header.php'; ?>
<?php
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }
 ?>

<div class="main-header">
      <h1>Profile</h1>
  </div>
  <div class="main-body flex">
    <div class="left-main-body">
        <div class="content flex" >
          <div class="profile-img-container">
            <img src="images/userImg.jpg" class="profileImg">
            <p>Profile Picture</p>
          </div>

          <?php
          if('BAND' == $_SESSION['userType']){
            echo '<script type="text/javascript">
                    window.onload = function() {
                        showBand();
                      }
                </script>';
              }
           ?>


          <table id="MusicianProfileForm" class="show table-style">
            <tr>
              <td><label>First name:</label></td>
              <td>
                <?php
                  if(isset($_SESSION['firstname'])){
                    echo $_SESSION['firstname'] ;
                  }
                ?>

              </td>
            </tr>
            <tr>
              <td><label>Last name:</label></td>
              <td>
                <?php
                  if(isset($_SESSION['lastname'])){
                    echo $_SESSION['lastname'] ;
                  }
                ?>
                </td>
            </tr>
            <tr>
              <td><label>Email:</label></td>
              <td>
                <?php
                  if(isset($_SESSION['email'])){
                    echo $_SESSION['email'] ;
                  }
                ?>
              </td>
            </tr>
            <tr>
              <td><label>State:</label></td>
              <td>
                <?php
                  if(isset($_SESSION['state'])){
                    echo $_SESSION['state'] ;
                  }
                ?>
              </td>
            </tr>
            <tr>
              <td><label>City:</label></td>
              <td>
                <?php
                  if(isset($_SESSION['city'])){
                    echo $_SESSION['city'] ;
                  }
                ?>
              </td>
            </tr>
            <tr>
              <td><label>Instrument:</label></td>
              <td>
                <?php
                  if(isset($_SESSION['instrument'])){
                    echo $_SESSION['instrument'] ;
                  }
                ?>
            </tr>
          </table>

          <table id="BandProfileForm" class="hide table-style">
            <tr>
              <td><label>Band name: </label></td>
              <td>
                <?php
                  if(isset($_SESSION['band_name'])){
                    echo $_SESSION['band_name'] ;
                  }
                ?>
              </td>
            </tr>
            <tr>
              <td><label>Band type:</label></td>
              <td>
                <?php
                  if(isset($_SESSION['band_type'])){
                    echo $_SESSION['band_type'] ;
                  }
                ?>
              </td>
            </tr>
            <tr>
              <td><label>Email:</label></td>
              <td>
                <?php
                  if(isset($_SESSION['email'])){
                    echo $_SESSION['email'] ;
                  }
                ?>
              </td>
            </tr>
            <tr>
              <td><label>State:</label></td>
              <td>
                <?php
                  if(isset($_SESSION['state'])){
                    echo $_SESSION['state'] ;
                  }
                ?>
            </tr>
            <tr>
              <td><label>City:</label></td>
              <td>
                <?php
                  if(isset($_SESSION['city'])){
                    echo $_SESSION['city'] ;
                  }
                ?>
              </td>
            </tr>
          </table>
          <div class="text-style description-container table-style">

            <form  action="../handler/UpdateDescriptionHandler.php" method="post" name="postForm" class="description-form">
              <label>Description:</label>
              <div class='profileDescription'>
                <?php  if(isset($_SESSION['description']) && strlen($_SESSION['description']) > 0): ?>
                  <textarea class="text-style"  name="description" rows="8" cols="60" minlength="2" placeholder="Write your post here "><?php   echo $_SESSION['description']; ?></textarea><br>
                <?php else: ?>
                  <textarea class="text-style"  name="description" rows="8" cols="60" minlength="2" placeholder="Write your post here "></textarea><br>
                <?php endif; ?>

                <?php if(isset($_SESSION['musician_id'])): ?>
                  <input type="hidden" name="musician_id" value="<?php echo $_SESSION['musician_id']?>">
                <?php else: ?>
                  <input type="hidden" name="band_id" value="<?php echo $_SESSION['band_id']?>">
                <?php endif; ?>
                  <input type="submit" name="desriptionBtn" value="Update Description" class="desriptionBtn" >
              </div>
            </form>

          </div>
        </div>
        <hr>
        <form onsubmit="return validate()" class="" action="../handler/userProfileHandler.php" method="post" name="postForm">
          <div class="post-style" >
            <label>Post:</label><br>
              <textarea id="post-textarea" class="text-style"  name="post" rows="8" cols="80" minlength="2" placeholder="Write your post here "></textarea><br>
              <input type="hidden" name="userId" value="<?php echo $_SESSION['user_id'] ?>">
              <input type="submit" name="postBtn" value="Post" class="postBtn" >
          </div>
        </form>
        <hr>
        <div class="main-header">
            <h1>Latest Posts</h1>
        </div>
        <?php
        include('../handler/UserProfileHandler.php');

        $results = array_reverse(getPostData($_SESSION['user_id']));
        foreach ($results as $var) {
        ?>
          <div class="post-view">
              <p><?php echo $var['post'] ?></p>
              <h6><?php echo $var['post_date'] ?><h6>
          </div>

        <?php
        }
        ?>

    </div>
  </div>



  <script type="text/javascript">
      function showMusician(){
        document.getElementById("MusicianProfileForm").classList.remove("hide");
        document.getElementById("MusicianProfileForm").classList.add("show");
        document.getElementById("BandProfileForm").classList.remove("show");
        document.getElementById("BandProfileForm").classList.add("hide");
      }

      function showBand(){
        document.getElementById("MusicianProfileForm").classList.remove("show");
        document.getElementById("MusicianProfileForm").classList.add("hide");
        document.getElementById("BandProfileForm").classList.remove("hide");
        document.getElementById("BandProfileForm").classList.add("show");
      }

      var description =  document.postForm.post;

      function validate(){
        if(description.value.length < 3 ){
          alert('Description musut be more than 3 characters');
          description.focus();
          return false;
        }
      }

      function validate(){
        if(description.value.length > 2000 ){
          alert('Description cannot be more than 999 characters');
          description.focus();
          return false;
        }
      }
  </script>
<?php include 'footer.php'; ?>
