<?php include 'header.php' ?>
<?php
    if(!isset($_SESSION['searchedUsers'])){
      header("Location: index.php");
    }
  ?>

        <div class="main-header">
            <h1>Search Results</h1>
        </div>
        <div class="main-body flex">
            <div class="left-main-body" >
              <?php foreach ($_SESSION['searchedUsers'] as $user) {?>
              <div class="content search-content flex" >
                <div class="profile-img-container">
                  <img src="images/userImg.jpg" class="profileImg">
                  <p>Profile Picture</p>
                </div>
                    <?php if($user['userType'] == 'MUSICIAN'): ?>
                     <table id="MusicianProfileForm" class="show table-style">
                       <tr>
                         <td><label>First name:</label></td>
                         <td><?php echo $user['first_name'] ;?></td>
                       </tr>
                       <tr>
                         <td><label>Last name:</label></td>
                         <td><?php echo $user['last_name'] ;?></td>
                       </tr>
                       <tr>
                         <td><label>Email:</label></td>
                         <td><?php echo $user['email'] ; ?></td>
                       </tr>
                       <tr>
                         <td><label>State:</label></td>
                         <td><?php echo $user['state'] ; ?></td>
                       </tr>
                       <tr>
                         <td><label>City:</label></td>
                         <td><?php echo $user['city'] ;?></td>
                       </tr>
                       <tr>
                         <td><label>Instrument:</label></td>
                         <td><?php echo $user['instrument'] ;?>
                      </tr>
                      <tr>
                        <td><label>UserType:</label></td>
                        <td><?php echo $user['userType'] ; ?></td>
                      </tr>
                     </table>
                   <?php else: ?>
                     <table id="BandProfileForm" class="show table-style">
                       <tr>
                         <td><label>Band name: </label></td>
                         <td><?php echo $user['band_name'] ;?></td>
                       </tr>
                       <tr>
                         <td><label>Band type:</label></td>
                         <td><?php echo $user['band_type'] ;?></td>
                       </tr>
                       <tr>
                         <td><label>Email:</label></td>
                         <td><?php echo $user['email'] ;?> </td>
                       </tr>
                       <tr>
                         <td><label>State:</label></td>
                         <td><?php echo $user['state'] ;?></td>
                       </tr>
                       <tr>
                         <td><label>City:</label></td>
                         <td><?php echo $user['city'] ; ?></td>
                       </tr>
                       <tr>
                         <td><label>UserType:</label></td>
                         <td><?php echo $user['userType'] ; ?></td>
                       </tr>
                     </table>
                   <?php endif; ?>
                     <div class="text-style description-container table-style">

                     <form  action="../handler/UpdateDescriptionHandler.php" method="post" name="postForm" class="description-form">
                       <label>Description:</label>
                       <div class='profileDescription'>
                         <?php  if(isset($user['description']) && strlen($user['description']) > 0): ?>
                           <textarea class="text-style"  name="description" rows="8" cols="60" minlength="2" placeholder="Write your post here "><?php   echo $user['description']; ?></textarea><br>
                         <?php else: ?>
                           <textarea class="text-style"  name="description" rows="8" cols="60" minlength="2" placeholder="Write your post here "></textarea><br>
                         <?php endif; ?>

                       </div>
                     </form>
                   </div>
                   <?php if($user['role'] == 'ADMIN'): ?>
                     <form action="../handler/RemoveAdminHandler.php" method="post">
                       <input type="hidden" name="user_id" value="<?php echo  $user['user_id'] ?>">
                       <input type="submit" name="removeAdminBtn" value="Remove Admin" class="dashboard-form-btn" >
                     </form>
                   <?php endif; ?>
                  <?php if($user['role'] == 'USER' && $user['userType'] == 'MUSICIAN'): ?>
                    <form action="../handler/AddAdminHandler.php" method="post">
                      <input type="hidden" name="user_id" value="<?php echo  $user['user_id'] ?>">
                      <input type="submit" name="addAdminBtn" value="Add Admin" class="dashboard-form-btn" >
                    </form>
                   <?php endif; ?>

                 </div>
               <?php
                  unset($_SESSION['searchedUsers'] );
                  }
                ?>
               <hr>
               </div>
            </div>


        <?php include 'footer.php'; ?>
    </body>
</html>
