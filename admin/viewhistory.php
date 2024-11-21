<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Booking History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php
    include('../connection/gateway.php');
    $con = connection(); 
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">FirstName</th>
            <th scope="col">LastName</th>
            <th scope="col">Email</th>
            <th scope="col">Vehicle type</th>
            <th scope="col">Plate Number</th>
            <th scope="col">Time in</th>
            <th scope="col">Time out</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Date Booked</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $fetchdata = mysqli_query($con,"SELECT * FROM booking_form ORDER BY user_id DESC ");
        while ($row = mysqli_fetch_array($fetchdata)) {
    ?>
        <tr>
            <td><?php echo $row["user_id"]; ?></td>
            <td><?php echo $row["firstname"]; ?></td>
            <td><?php echo $row["lastname"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["Vehicle type"]; ?></td>
            <td><?php echo $row["platenumber"]; ?></td>
            <td><?php echo $row["parking_in"]; ?></td>
            <td><?php echo $row["parking_out"]; ?></td>
            <td><?php echo $row["paymentMethod"]; ?></td>
            <td><?php echo $row["dateBooked"]; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php
    mysqli_close($con);
?>

</body>
</html>

