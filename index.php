<?php
$MySQL = mysqli_connect("localhost", "root", "", "vjezba17") or die('Error connecting to MySQL server.');
$query = "SELECT u.user_firstname, u.user_lastname, u.email, c.country_name
          FROM users u
          LEFT JOIN countries c ON u.country_id = c.id";

$result = mysqli_query($MySQL, $query);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prikaz korisnika i njihovih zemalja</title>
</head>
<body>
    <h1>Popis korisnika i zemalja</h1>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Country</th>
                </tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>
                    <td>{$row['user_firstname']}</td>
                    <td>{$row['user_lastname']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['country_name']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nema podataka za prikaz!</p>";
    }

    mysqli_close($MySQL);
    ?>
</body>
</html>
