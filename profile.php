<?php include 'header.php'; ?>
<style>
    @media screen and (max-width: 780px) {
        .profile-img {
          margin-left: 0rem;
        }

        .section h3 {
          font-size: 23px;
        }

        .desc {
          margin-left: 0rem;
          margin-top: 0rem;
        }

        .btn {
          font-size: 15px;
          padding: 1rem;
          padding-right: 2rem;
          padding-left: 2rem;
          display: inline-block;
        }

        .title {
           text-align: center; 
        }
    }
</style>
<section id="profile" class="section bg-light">
	<div class="container">
		<div class="albums space">
                <?php 
                    if (isset($_GET['u'])) {
                        if ($_GET['u'] == $userid) {
                            $query = "SELECT COUNT(*) AS donations FROM learningMaterial WHERE UserID='$userid' AND Status = 'Active'";
                            $result = mysqli_query($db,$query);

                            if ($result == false) {
                                # code...
                            }
                            else {
                                $row = mysqli_fetch_array($result);
                                $donations = $row['donations'];
                            }
                            echo "
            <div>
                <center><img src='profile-pictures/$picture' style='width: 15rem; height: 15rem; border-radius: 30rem; border: 2px solid #fff;'></center>
            </div>
            <div>
                <h3>$firstName $lastName</h3>
                <h2>Donations: $donations</h2>
                <a href='settings.php' class='btn btn-primary'>Account Settings</a>
                <a href='includes/logout.php' class='btn btn-secondary'>Logout</a>
                <h4>Joined on: $joinDate</h4>
            </div>";
                        }
                        else {
                            $u = $_GET['u'];

                            $query = "SELECT COUNT(*) AS donations FROM learningMaterial WHERE Status = 'Active' AND UserID ='$u'";
                            $result1 = mysqli_query($db,$query);

                            if ($result1 == false) {
                                # code...
                            }
                            else {
                                $row1 = mysqli_fetch_array($result1);
                                $donations = $row1['donations'];
                            }

                            $sql = "SELECT * FROM users WHERE UserID = '$u'";
                            $result = mysqli_query($db,$sql);

                            if ($result == false) {
                                # code...
                            }
                            else {
                                $row = mysqli_fetch_array($result);

                                $userFirst = $row['FirstName'];
                                $userLast = $row['LastName'];
                                $joinDate = $row['SignUpDate'];
                                $userPicture = $row['ProfilePicture'];
                            }
                            echo "
            <div>
                <center><img src='profile-pictures/$userPicture' style='width: 15rem; height: 15rem; border-radius: 30rem; border: 2px solid #fff;'></center>
            </div>
            <div>
                <h3>$userFirst $userLast</h3>
                <h2>Donations: $donations</h2>
                <h4>Joined on: $joinDate</h4>
            </div>";
                        }
                    }
                ?>
        		
        	
		</div>
		<hr>
		<h3>Donations</h3>
        <?php 
                $user = $_GET['u'];
                $sql1 = "SELECT * FROM learningMaterial WHERE Status = 'Active' AND UserID = '$user' ORDER BY MaterialID DESC";
                $result1 = mysqli_query($db,$sql1);

                if ($result1 == false) {
                    # code...
                }
                else {
                    while ($row1 = mysqli_fetch_array($result1)) {
                        $materialID1 = $row1['MaterialID'];
                        $title1 = $row1['Title'];
                        $type1 = $row1['Type'];
                        $file1 = $row1['MaterialFile'];
                        $picture1 = $row1['CoverImage'];
                        $category1 = $row1['Genre'];
                        $date1 = $row1['PostDate'];
                        $postUserid1 = $row1['UserID'];

                        if (isset($_SESSION['login'])) {
                            if ($userid == $user) {
                                echo "
                <div class='albums box'>
                    <div class='cover profile-img'>
                        <a href='view.php?m=$materialID1'><img style='background: url(material-covers/$picture1) no-repeat center/cover; border: none;'></a>
                    </div>
                    <div class='desc'>
                        <h3 class='title'>$title1</h3>
                        <h4>$type1</h2>
                        <h4>Category: $category1</h2>
                        <h4>Date: $date1</h4>
                        <h4>10 Downloads</h4>
                        <div class='buttons'>
                        <a href='view.php?m=$materialID1' class='btn btn-secondary'>See more</a>
                        <a href='delete.php?m=$materialID1&u=$userid' class='btn btn-primary'>Delete</a>
                        </div>
                    </div>
                </div>
                <br>";
                            }
                            else {
                               echo "
                <div class='albums box'>
                    <div class='cover profile-img'>
                        <a href='view.php?m=$materialID1'><img style='background: url(material-covers/$picture1) no-repeat center/cover; border: none;'></a>
                    </div>
                    <div class='desc'>
                        <h3 class='title'>$title1</h3>
                        <h4>$type1</h2>
                        <h4>Category: $category1</h2>
                        <h4>Date: $date1</h4>
                        <h4>10 Downloads</h4>
                        <a href='view.php?m=$materialID1' class='btn btn-secondary'>See more</a>
                    </div>
                </div>
                <br>"; 
                            }
                            
                        }
                        else {
                            echo "<div class='albums box'>
                    <div class='cover profile-img'>
                        <a href='view.php?m=$materialID1'><img style='background: url(material-covers/$picture1) no-repeat center/cover; border: none;'></a>
                    </div>
                    <div class='desc'>
                        <h3 class='title'>$title1</h3>
                        <h4>$type1</h2>
                        <h4>Category: $category1</h2>
                        <h4>Date: $date1</h4>
                        <h4>10 Downloads</h4>
                        <a href='view.php?m=$materialID1' class='btn btn-secondary'>Download</a>
                    </div>
                </div>
                <br>";
                        }
                        
                    }   
                }
            ?>
		<br>
	</div>
</section>
<?php include 'footer.php'; ?>