<?php include('config.php'); ?>
<?php include('parties/nav.php'); ?>

<main>
        <style>


        h1 {
            text-align: center;
            color: #343a40;
        }
        table {
            border-collapse: collapse;
            margin: 20px auto;
            background-color: white;
            border: 2px solid #dee2e6;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            color: #343a40;
        }
        .highlight {
            background-color: #f8f9fa;
        }
        .special {
            background-color: #f0f0f0;
        }
    </style>
    <h1>MANAGE TIMETABLE</h1>
    <br><br>

    <!-- Form for creating a new timetable entry -->
    <form method="post" action="create_timetable.php">
        <div class="form-group">
            <label for="day">Day:</label>
            <input type="text" class="form-control" name="day" required>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time:</label>
            <input type="time" class="form-control" name="start_time" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time:</label>
            <input type="time" class="form-control" name="end_time" required>
        </div>
        <div class="form-group">
            <label for="student_category">Student Category:</label>
            <select class="form-control" name="student_category" required>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Intermediate">Advanced</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Timetable Entry</button>
    </form>

    <br><br>

    <!-- Display the timetable entries -->
    <?php include('readtimetable.php'); ?>
</main>

<?php include('parties/footer.php'); ?>
