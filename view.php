<?php include 'header.php'; ?>
<section id="profile" class="section bg-light">
	<div class="container space">
        <style>
            .cover {
                width: 18.5rem;
                height: 18.5rem;
                
                margin-left: 10rem;
            }

            .cover img {
                width: 100%;
                height: 18.5rem;
            }

            .description-box {
                width: 100%;
                background-color: black;
            }

             @media screen and (max-width: 780px) {
                .profile-img {
                  margin-left: 0rem;
                }

                .cover {
                  margin-left: 0rem;  
                }

                .desc {
                  margin-left: 0rem;
                  margin-top: 0rem;
                }

                

                .section h3{ 
                   font-size: 23px;
                }

                .section h2{ 
                   font-size: 16px;
                }
            }
        </style>
        <?php 
            if (isset($_GET['m'])) {
                $mid = $_GET['m'];

                $sql = "SELECT * FROM learningMaterial WHERE MaterialID = '$mid'";
                $result = mysqli_query($db,$sql);

                if ($result == false) {
                    # code...
                }
                else {
                    $row = mysqli_fetch_array($result);

                    $materialID = $row['MaterialID'];
                    $title = $row['Title'];
                    $type = $row['Type'];
                    $file = $row['MaterialFile'];
                    $picture = $row['CoverImage'];
                    $category = $row['Genre'];
                    $date = $row['PostDate'];
                    $postUserid = $row['UserID'];
                    $description = $row['Description'];

                    $sql = "SELECT * FROM users WHERE UserID = '$postUserid' AND Status = 'Active'";
                    $result2 = mysqli_query($db,$sql);

                        if ($result2 == false) {
                            # code...
                        }
                        else {
                            $resultSet = mysqli_fetch_array($result2);

                            if (empty($resultSet)) {
                                $userName = 'Unknown';
                                if (isset($_SESSION['login'])) {
                            echo "
                            <div class='albums space'>
                                <div class='cover'>
                                    <img style='background: url(material-covers/$picture) no-repeat center/cover; border: none;'>
                                </div>
                                <div>
                                    <h3 class='title'>$title</h3>
                                    <h2>Category: $category</h2>
                                    <h2>Date: $date</h2>
                                    <h2>Posted by: $userName</h2>
                                    <a href='material/$file' download='$title' class='btn btn-primary'>Download</a>
                                </div>
                            </div>
                            <br>
                            <div class=''>
                                <h2>Description</h2>
                                <hr>
                            <div class=''>
                                    $description
                            </div>
                    </div>";
                        }
                        else {
                            echo "
                            <div class='albums space'>
                                <div class='cover'>
                                    <img style='background: url(material-covers/$picture) no-repeat center/cover; border: none;'>
                                </div>
                                <div>
                                    <h3 class='title'>$title</h3>
                                    <h2>Category: $category</h2>
                                    <h2>Date: $date</h2>
                                    <h2>Posted by: $userName</h2>
                                    <p>109 Downloads</p>
                                    <a href='login.php' class='btn btn-primary'>Download</a>
                                </div>
                            </div>
                            <br>
                            <div class=''>
                                <h2>Description</h2>
                            <div class=''>
                                    $description
                            </div>
                    </div>";
                        }
                            }
                            else {
                                $userName = $resultSet['FirstName'].' '.$resultSet['LastName'];
                                if (isset($_SESSION['login'])) {
                            echo "
                            <div class='albums space'>
                                <div class='cover'>
                                    <img style='background: url(material-covers/$picture) no-repeat center/cover; border: none;'>
                                </div>
                                <div>
                                    <h3 class='title'>$title</h3>
                                    <h2>Category: $category</h2>
                                    <h2>Date: $date</h2>
                                    <h2>Posted by: <a href='profile.php?u=$postUserid' style='color: #d3071b;'>$userName</a></h2>
                                    <a href='material/$file' download='$title' class='btn btn-primary'>Download</a>
                                </div>
                            </div>
                            <br>
                            <div class=''>
                                <h2>Description</h2>
                                <hr>
                            <div class=''>
                                    $description
                            </div>
                    </div>";
                        }
                        else {
                            echo "
                            <div class='albums space'>
                                <div class='cover'>
                                    <img style='background: url(material-covers/$picture) no-repeat center/cover; border: none;'>
                                </div>
                                <div>
                                    <h3 class='title'>$title</h3>
                                    <h2>Category: $category</h2>
                                    <h2>Date: $date</h2>
                                    <h2>Posted by: <a href='profile.php?u=$postUserid' style='color: #d3071b;'>$userName</a></h2>
                                    <p>109 Downloads</p>
                                    <a href='login.php' class='btn btn-primary'>Download</a>
                                </div>
                            </div>
                            <br>
                            <div class=''>
                                <h2>Description</h2>
                            <div class=''>
                                    $description
                            </div>
                    </div>";
                        }
                            }
                            
                        }   
                }
            }
        ?>
	</div>
</section>
<?php include 'footer.php'; ?>