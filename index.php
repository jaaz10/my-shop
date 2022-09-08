<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

    <style>
        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1000px) {

            /* Force table to not be like tables anymore */
            table,
            thead,
            tbody,
            th,
            td,
            tr,
            tfoot {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }



            tr {
                border: 3px solid #fff;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 3px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }

            .table-container table td::before {
                content: attr(data-heading);
                font-weight: bold;
            }

            .table-container {
                text-align: center;
            }

            .table-container h2 {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="table-container">
        <h2 style="padding-top:20px;">List of Clients</h2>
        <a class="btn btn-primary" href="/myshop/create.php" role="button">New Client</a>
        <br>
        <br>
        <table class="table table dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop";

                // Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // Read all row from database table
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                // Read data of each row 
                while ($row = $result->fetch_assoc()) {
                    echo "
                        
                    <tr>
                    <td data-heading='ID'>$row[id]</td>
                    <td data-heading='Name'>$row[name]</td>
                    <td data-heading='Email'>$row[email]</td>
                    <td data-heading='Phone'>$row[phone]</td>
                    <td data-heading='Address'>$row[address]</td>
                    <td data-heading='Created at'>$row[created_at]</td>
                    <td>
                        <a class= 'btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'>Edit</a>
                        <a class= 'btn btn-danger btn-sm' href='/myshop/delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                    ";
                }

                ?>

            </tbody>
        </table>

    </div>
</body>

</html>