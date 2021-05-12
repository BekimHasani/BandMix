<?php include 'header.php' ?>
<?php
  if(!isset($_SESSION['username']) || !isset($_SESSION['admin'])){
    header("Location: index.php");
  }
 ?>
  <div class="main-header">
      <h1>Admin Dashboard</h1>
  </div>
  <div class="main-body flex">
      <div class="left-dashboard-body">
          <div class="left-dashboard-content ">

              <?php if(isset($_SESSION['contacts'])):  ?>
                <div class="justify-content-center flex">
                  <div class="dashboard-table-container">
                    <table class="dashboard-table">
                      <caption>Messages</caption>
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Subject</th>
                          <th scope="col">Message</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($_SESSION['contacts'] as $contact) {
                            echo '
                            <tr>
                                <td data-label="Name">'.$contact['contact_name'].'</td>
                                <td data-label="Email">'.$contact['email'].'</td>
                                <td data-label="Subject">'.$contact['subject'].'</td>
                                <td data-label="Message">'.$contact['description'].'</td>
                                <td data-label="Action"><form action="../handler/MarkReadMessageHandler.php" method="post">
                                  <input type="hidden" name="contact_id" value="'.$contact['contact_id'].'">
                                  <input type="submit" name="markReadBtn" value="Mark As Read" class="dashboard-form-btn" >
                                </form>
                                </td>
                            </tr>';
                          }
                          unset($_SESSION['contacts']);
                         ?>
                      </tbody>

                    </table>
                  </div>
                </div>
              <?php endif; ?>

          <?php if(isset($_SESSION['adminUsers'])):  ?>
            <div class="justify-content-center flex">
              <div class="dashboard-table-container">
                <table class="dashboard-table">
                  <caption>Admin Users</caption>
                  <thead>
                    <tr>
                      <th scope="col">Uesrname</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($_SESSION['adminUsers'] as $user) {
                        echo '
                        <tr>
                            <td data-label="Username">'.$user['username'].'</td>
                            <td data-label="Frist Name">'.$user['first_name'].'</td>
                            <td data-label="Last Name">'.$user['last_name'].'</td>
                            <td data-label="Action"><form action="../handler/RemoveAdminHandler.php" method="post">
                              <input type="hidden" name="user_id" value="'.$user['user_id'].'">
                              <input type="submit" name="removeAdminBtn" value="Remove Admin" class="dashboard-form-btn" >
                            </form>
                            </td>
                        </tr>';
                      }
                      unset($_SESSION['adminUsers']);
                     ?>
                  </tbody>

                </table>
              </div>
            </div>
          <?php endif; ?>
        </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
