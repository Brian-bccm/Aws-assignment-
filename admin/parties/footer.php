        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <?php
                        $row = $_SESSION['check_user'];
                        ?>
                        <p>Hey, <b><?php echo $row['username'] ?></b></p>
                        <small class="text-muted">Admin</small>
                        <?php
                        ?>
                    </div>
                    <div class="profile-photo">
                        <?php
                        if (empty($row['img'])) {
                            ?>
                            <img src="../img/user/user-image.jpg">
                            <?php
                        } else {
                            ?>
                            <img src="../img/admin/<?php echo $row['img']; ?>">
                            <?php
                        }
                        ?>
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/background-img.png">
                    <h2>Kung Fu</h2>
                    <p>TAR UMT Penang Branch Wushu Society</p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Reminders</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div>

            </div>

        </div>


    </div>
    <script src="../js/myjs.js"></script>
    </body>
</html>