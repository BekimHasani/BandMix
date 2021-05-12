<!DOCTYPE html>
<?php include 'resumeSession.php' ?>
<script type="text/javascript">
  function searchInputValidation(){
    var searchInput = document.searchForm.searchInput;
    if(searchInput.value.length < 3 ){
      alert('To search you need at least 3 characters');
      searchInput.focus();
      return false;
    }
  }
</script>
<html lang="en" dir="ltr">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/aboutus-page.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/contactus-page.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/register-page.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/profile-page.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/dashboard-page.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/responsive.css?v=<?php echo time(); ?>">
        <title>Band Mix</title>
    </head>
    <body>
        <div class="header flex justify-content-around">
            <div class="header-logo flex justify-content-end">
                <a href="index.php"><img src="images/bandix.png" alt="Bandixlogo"></a>
            </div>
            <?php if(isset($_SESSION['username'])): ?>
              <div class="search-bar-container flex justify-content-center">
                <form onsubmit="return searchInputValidation()" class="search-bar-form flex" action="../handler/SearchUserHandler.php" method="post" name="searchForm">
                  <input type="search" class='search-bar' placeholder="Search" name="searchInput" value="" required>
                  <button type="submit" class='search-bar-button' name="searchBtn">Go</button>
                </form>
              </div>
            <?php endif; ?>
            <label for="menu">&#9776;</label>
            <input class='header-checkbox' type="checkbox" id="menu"/>
            <nav class="navbar flex">
              <?php if(!isset($_SESSION['username'])): ?>
                <ul class="navbar-links flex">
                    <li>
                        <a href="AboutUs.php">About Us</a>
                    </li>
                    <li>
                        <a href="contactus.php">Contact Us</a>
                    </li>
              <?php endif; ?>
            </nav>

            <?php if(isset($_SESSION['username'])): ?>
              <?php if(isset($_SESSION['admin'])): ?>
               <div class="login-nav flex ">
                   <a href="../handler/DashboardHandler.php">Dashboard</a>
                   <a href="userProfile.php"><?php echo $_SESSION['firstname']; ?></a>
                   <a href="logout.php" class="Log-btn">Logout</a>
               </div>
             <?php else: ?>
               <div class="login-nav flex">
                   <a href="userProfile.php"><?php echo $_SESSION['username']; ?></a>
                   <a href="logout.php" class="Log-btn">Logout</a>
               </div>
             <?php endif; ?>
           <?php else: ?>
               <div class="login-nav flex">
                   <a href="signup.php" id="joinfreebtn">Join Free</a>
                   <a href="login.php" id="Loginbtn" class="Log-btn">Login</a>
               </div>
           <?php endif; ?>


        </div>
