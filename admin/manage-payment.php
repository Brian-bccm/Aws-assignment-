<?php
include("parties/nav.php");
// Retrieve payment history from the database
$sql = "SELECT * FROM tbl_payment ORDER BY payment_date DESC";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
?>
<main>
    <h1>Manage Payment</h1>
        <div class="list-table">
            <div class="wrapper">
            <table class="tbl-full text-center">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>User ID</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Display payment history
                    if ($count > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['transaction_id'] . "</td>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['payment_method'] . "</td>";
                            echo "<td>$" . $row['amount'] . "</td>";
                            echo "<td>" . $row['payment_status'] . "</td>";
                            echo "<td>" . $row['payment_date'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="6">No Records !!!</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include("parties/footer.php"); ?>