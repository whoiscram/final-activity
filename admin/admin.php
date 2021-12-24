<?php
  require_once 'config.php'; 
  $_SESSION["username"] = "user";
  $_SESSION["role"] = "role";
  session_start();
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SESSION["username"] == "admin"){ 
        //continue as admin
} else{
    //header("Location: ../user/home.php");
    echo '<script>alert("YOU ARE NOT ADMIN")</script>'; //if username/role is not admin promt this message 
    exit();
}
    
} else {
    header('Location: ../user/login.php'); // if not logged in redirect 
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/admin.css">
    <title>Maki Admin</title>
</head>

<body>
    <h1>Admin</h1>
    <form action="create_event.php" method="get">
        <button type="submit">Create event</button>
        <button type="submit" formaction="update_event.php">Update event</button>
        <button type="submit" formaction="delete_event.php">Delete event</button>
        <br><br><br>
        <button type="submit" formaction="view_events.php">View events</button>
        <button type="submit" formaction="view_participants_events.php">View participants</button>
        <br><br><br><br><br>
        <button type="submit" formaction="logout.php">Logout</button>
    </form>
</body>

</html>