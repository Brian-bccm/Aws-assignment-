<?php include('parties/nav.php') ?>
    
    <!-- Main Content Section Starts -->
    <main>
        <h1>DASHBOARD</h1>
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        
        <!-- Analyses -->
        <div class="analyse">
            <div class="sales">
                <div class="status">
                    <div class="info">
                        <h3>Total Sales</h3>
                        <h1>$65,024</h1>
                    </div>
                    <div class="progresss">
                        <svg id="mySVG">
                            <circle cx="38" cy="38" r="36" id="totalSalesCircle"></circle>
                        </svg>
                        <div class="percentage">
                            <p>+81%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="visits">
                <div class="status">
                    <div class="info">
                        <h3>Site Visit</h3>
                        <h1>24,981</h1>
                    </div>
                    <div class="progresss">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="percentage">
                            <p>-48%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="searches">
                <div class="status">
                    <div class="info">
                        <h3>Searches</h3>
                        <h1>14,147</h1>
                    </div>
                    <div class="progresss">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="percentage">
                            <p>+21%</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="products">
                <div class="status">
                    <div class="info">
                        <h3>Products</h3>
                        <h1>14,147</h1>
                    </div>
                    <div class="progresss">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="percentage">
                            <p>+21%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- End of Analyses -->

            <!-- New Users Section -->
            <div class="new-users">
                <h2>New Users</h2>
                <div class="user-list">
                <?php
                $sql1 = "SELECT * FROM tbl_user ORDER BY datetime DESC LIMIT 3;";
                $result1 = mysqli_query($conn, $sql1);
                while ($row = mysqli_fetch_assoc($result1)) {
                    $datetime = new DateTime($row["datetime"]);
                    $current_time = new DateTime('Asia/Kuala_Lumpur');

                    $datetime_day = $datetime->format('d');
                    $datetime_hours = $datetime->format('H');
                    $datetime_minutes = $datetime->format('i');
                    $datetime_second = $datetime->format('s');

                    $current_day = $current_time->format('d');
                    $current_hours = $current_time->format('H');
                    $current_minutes = $current_time->format('i');
                    $current_second = $current_time->format('s');
                    ?>
                    <div class="user">
                        <?php 
                        if (empty($row['img'])) {
                            ?>
                            <img src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/default-user-profile.jpg">
                            <?php
                        }else {
                            ?>
                            <img src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/user/<?php echo $row['img']; ?>">
                            <?php
                        }
                        ?>
                        
                        <h2><?php echo $row['username']; ?></h2>
                        <p>
                            <?php
                            if ($current_day > $datetime_day) {
                                echo $days = $current_day - $datetime_day . "Days Ago";
                            } else if ($current_hours > $datetime_hours) {
                                echo $hours = $current_hours - $datetime_hours . "Hours Ago";
                            } else if ($current_minutes > $datetime_minutes) {
                                echo $minutes = $current_minutes - $datetime_minutes . "Min Ago";
                            } else {
                                echo $seconds = $current_second - $datetime_second . "Sec Ago";
                            }
                            ?>
                        </p>
                    </div>
                    <?php
                }
                ?>
                    <a href="manage-user.php">
                        <div class="user">
                            <img src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/default-user-profile.jpg">
                            <h2>More</h2>
                            <p>New User</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM tbl_payment";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['user_id'] ?></td>
                                <td><?php echo $row['payment_method'] ?></td>
                                <td><?php echo $row['amount'] ?></td>
                                <td><?php echo $row['payment_status'] ?></td>
                                <td><a href="manage-payment.php">Details</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="manage-payment.php">Show All</a>
            </div>
            <!-- End of Recent Orders -->
    </main>
    <!-- Main Content Section Ends -->
<?php include('parties/footer.php') ?>