<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evergreen Bank Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            margin: 50px;
            font-family: Arial, sans-serif;
            background-color: #eaf2e3;
        }

        h1 {
            background-color: #9fe89f;
            padding: 10px;
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

        a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Evergreen Bank</h1>
    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email Id</th>
                <th>Remaining balance</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "myplace";

            $connection = new mysqli($servername, $username, $password, $database);

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $sql = "SELECT * FROM customers";
            $result = $connection->query($sql);
            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["balance"] . "</td>
                    <td>
                        <a href=\"view_customer.php?id=" . $row["id"] . "\">View</a> | 
                        <a href=\"transfer_money.php?sender_id=" . $row["id"] . "\">Transfer</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="transactions.php">See All Transactions</a>
</body>
</html>
