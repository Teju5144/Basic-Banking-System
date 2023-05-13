<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myplace";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    $sql = "SELECT * FROM customers WHERE id = $customer_id";
    $result = $connection->query($sql);

    if (!$result) {
        die("Invalid query: " . $connection->error);
    }

    $customer = $result->fetch_assoc();

    if (!$customer) {
        die("Customer not found.");
    }
} else {
    die("Customer ID not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            margin: 50px;
            font-family: Arial, sans-serif;
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #f9f9f9;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Customer Details</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email Id</th>
                <th>Remaining balance</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $customer["id"]; ?></td>
                <td><?php echo $customer["name"]; ?></td>
                <td><?php echo $customer["email"]; ?></td>
                <td><?php echo $customer["balance"]; ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>

