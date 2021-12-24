<?php
require_once 'connection.php';
session_start();

// redirect user if not logged in
if (!isset($_SESSION['loggedin'])) {
    header('location: ../user/login.php');
}

// check type of user
if (!isset($_SESSION['type']) || ($_SESSION['type'] != "event manager")) {
    echo "<script>
    alert('YOU ARE NOT ADMIN');
    window.location.href='../user/home.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/update_event.css">
    <title>Update event (admin)</title>
</head>

<body>
    <?php
    include "view_events.php";

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $performer = $_POST['performer'];
        $venue = $_POST['venue'];
        $description = $_POST['description'];
        $date_start = $_POST['date_start'];
        $date_end = $_POST['date_end'];
        $ticket_price = $_POST['tprice'];
        $status = $_POST['status'];

        $sql = "UPDATE events SET title = ?, performer = ?, venue = ?, description = ?, date_start = ?, date_end = ?, ticket_price = ?, status = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute([$title, $performer, $venue, $description, $date_start, $date_end, $ticket_price, $status, $id]);
        if ($result) {
            echo 'Successfully updated existing event.';
        } else {
            echo 'Cannot update event.';
        }
    }
    ?>

    <div>
        <form action="update_event.php" method="post">
            <div class="container">
                <h1>Update event</h1>
                <p>Update necessary information.</p><br>
                <label for="id"><b>ID to update</b></label><br><br>
                <input class="form-control" type="text" name="id"><br><br><br>

                <label for="title"><b>New Title</b></label><br>
                <input class="form-control" type="text" name="title"><br><br><br>

                <label for="performer"><b>New Performer</b></label><br>
                <input class="form-control" type="text" name="performer"><br><br><br>

                <label for="venue"><b>New Venue</b></label><br>
                <input class="form-control" type="text" name="venue"><br><br><br>

                <label for="desc"><b>New Description</b></label><br>
                <input class="form-control" type="text" name="desc"><br><br><br>

                <label for="datestart"><b>New Date Start</b></label><br>
                <input class="form-control" type="datetime-local" name="datestart"><br><br><br>

                <label for="dateend"><b>New Date End</b></label><br>
                <input class="form-control" type="datetime-local" name="dateend"><br><br><br>

                <label for="tprice"><b>New Ticket Price (in Php)</b></label><br>
                <input class="form-control" type="text" name="tprice"><br><br><br>

                <label for="status"><b>New Status</b></label><br>
                <input class="form-control" type="text" name="status"><br><br><br><br>

                <input type="submit" name="update" value="Update event"><br><br><br>

                <!--
                <button type="submit" formaction="create_event.php">Go to Create event</button>
                <button type="submit" formaction="delete_event.php">Go to Delete event</button>
                <br><br><br>
                <button type="submit" formaction="view_events.php">View events</button>
                <button type="submit" formaction="view_participants_events.php">View participants</button>
                <br><br><br><br><br>
                <button type="submit" formaction="logout.php">Logout</button>
                -->
            </div>
        </form>
    </div>
</body>

</html>