<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "borrowing_system";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT name, inventory_quantity FROM apparatuses";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Document</title>
    <style>
        *{
    padding: 0;
    margin: 0;
}
section{
    height: 100vh;
}
header{
    position: fixed;
    display: flex;
    flex-direction: column;
    background-color: #202020;
    width: 12%;
    height: 100%;
    text-align:center;
}
header .logo{
    height: 122px;
    width: 122px;
    margin-top: 14px;
    margin-bottom: 10px;
}
ul{
    padding: 0;
    margin: 0;
    width: 69%;
    list-style-type: none;
}
li a {
    width: 100%;
    display: block;
    color: #ffff;
    padding: 30px 30px;
    text-decoration: none;
    font-size: larger;
    font-family: 'Montserrat';
    font-weight: 800;
}  
  li a:hover{
    background-color: #555;
  }
  li a.active {
    background-color: #e05d5d; /* Different background for the active link */
    color: white; /* Text color for the active link */
}

/* Styling for when hovering over the active item */
li a.active:hover {
    background-color: #45a049; /* Background color for hovering over the active link */
}

        .styled-table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 18px;
    font-family: 'Montserrat', sans-serif;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
    text-align: left;
    border: 1px solid #ddd;
}

.styled-table th {
    background-color: #f2f2f2;
    color: #333;
}

.styled-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.styled-table tr:hover {
    background-color: #f1f1f1;
}

.edit-link,
.deleteBtn {
    text-decoration: none;
    color: #007bff;
}

.edit-link:hover,
.delete-link:hover {
    color: #0056b3;
}

.delete-link {
    margin-left: 10px;
}
h2{
    font-size: 45px;
}
@media (min-width: 1920px) and (max-width: 2000px) {
    .styled-table {
        font-size: 20px; /* Increase font size for larger screens */
    }

    .styled-table th,
    .styled-table td {
        padding: 15px 20px; /* Add more padding for larger screens */
    }

    h2 {
        font-size: 50px; /* Increase heading size */
    }

    .edit-link,
    .deleteBtn {
        font-size: 20px; /* Adjust link sizes for larger screens */
    }
}
    </style>
</head>
<body>
        <header>
            <div class="">
                <img src="img\logo.png" alt="" class="logo">
            </div>
            <ul>
                <li><a href="dashboard.php">DASHBOARD</a></li>
                <li><a class="active" href="#section2">INVENTORY</a></li>
                <li><a href="BORROWED.PHP">BORROWED</a></li>
                <li><a href="user.php">USERS</a></li>
                <li><a href="#about">REPORTS</a></li>
            </ul>
        </header>
        <section class="" id="dashboard">
        <div class="" style="margin-left:15%;padding:1px 16px;height:25%;">
                <h1 style="color: red;">AVAILABLE APPARATUSES</h1>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Apparatus Name</th>
                            <th>Quantity Available</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>

            </div>
        </section>
</body>
<script src="homepage.js"></script>
</html>