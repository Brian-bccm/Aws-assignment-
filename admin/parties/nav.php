<?php
    include('../config/constants.php');
    include('login-check.php');
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Wushu Society - Home Page</title>
    <!-- <link rel="stylesheet" href="../css/reset.css"> -->
    <link rel="icon" type="image/x-icon" href="../img/wushu_society_logo.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/wushu_society_logo.png">
                    <h2>Wushu<span class="danger">Society</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">

                        <a href="index.php" class="active">
                            <span class="material-icons-sharp">
                                home
                            </span>
                            <h3>Home</h3>
                        </a>

                        <a href="manage-admin.php">
                            <span class="material-icons-sharp">
                                support_agent
                            </span>
                            <h3>Admin</h3>
                        </a>

                        <a href="manage-user.php">
                            <span class="material-icons-sharp">
                                person_outline
                            </span>
                            <h3>Users</h3>
                        </a>

                        <a href="manage-products.php">
                            <span class="material-icons-sharp">
                                production_quantity_limits
                            </span>
                            <h3>Products</h3>
                            <span class="message-count">27</span>
                        </a>

                        <a href="manage-announcement.php">
                            <span class="material-icons-sharp">
                                announcement
                            </span>
                            <h3>Announcement</h3>
                        </a>

                        <a href="manage-timetable.php">
                            <span class="material-icons-sharp">
                                schedule
                            </span>
                            <h3>Timetable</h3>
                        </a>

                        <a href="manage-event.php">
                            <span class="material-icons-sharp">
                                event_note
                            </span>
                            <h3>Events</h3>
                        </a>

                        <a href="manage-participant.php">
                            <span class="material-icons-sharp">
                                directions_run
                            </span>
                            <h3>Participants</h3>
                        </a>

                        <a href="manage_ranking.php">
                            <span class="material-icons-sharp">
                                add
                            </span>
                            <h3>Ranking</h3>
                        </a>

                        <a href="manage-payment.php">
                        <span class="material-icons-sharp">
                            payments
                        </span>
                            <h3>Payments</h3>
                        </a>

                <a href="logout.php" class="logout">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->
