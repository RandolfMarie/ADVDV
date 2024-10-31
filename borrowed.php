<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="admin.css">
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<title>Borrowed Apparatus</title>
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
        h1{
            font-size: 45px;
        }
        .searchform {
        display: flex; 
        align-items: center; 
        margin: 20px auto;
        padding: 10px; 
        border: 1px solid #ccc;
        border-radius: 25   px;
        background-color: #f9f9f9; 
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
        }

        .searchform select, 
        .searchform input[type="text"] {
            padding: 10px; 
            border: 1px solid #ccc;
            border-radius: 20px; 
            font-size: 14px; 
            margin-right: 10px; 
        }

        .searchform input[type="text"] {
            flex: 1; 
        }

        .searchform input[type="submit"] {
            padding: 10px 20px;
            background-color: #eb1717   ; 
            color: white;
            border: none; 
            border-radius: 20px; 
            cursor: pointer; 
            transition: background-color 0.3s; 
        }

        .searchform input[type="submit"]:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
        .status-container {
            display: flex;
            align-items: center; 
            margin: 10px 0; 
            border: 1px solid #ccc; 
            border-radius: 10px; 
            padding: 10px; 
            background-color: #f9f9f9; 
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
        }

        .status-container {
        display: flex; /* Flexbox for layout */
        align-items: center; /* Center items vertically */
        justify-content: center; /* Center items horizontally */
        gap: 10px; /* Space between select and button */
     }

        .status-container select {
            padding: 10px; /* Inner spacing */
            border: 1px solid #ccc; /* Light border */
            border-radius: 5px; /* Rounded corners */
            font-size: 14px; /* Font size */
            outline: none; /* Remove outline on focus */
            transition: border-color 0.3s; /* Smooth transition for border color */
        }

        .status-container select:focus {
            border-color: #4CAF50; /* Change border color on focus */
        }

        .action-button {
            padding: 10px 15px; /* Inner spacing */
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
            border: none; /* Remove border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
            font-size: 14px; /* Font size */
            transition: background-color 0.3s; /* Smooth transition for background */
        }

        .action-button:hover {
            background-color: #45a049; /* Darker green on hover */
        }

                @media (min-width: 1920px) {
            .styled-table {
                font-size: 20px; 
            }

            .styled-table th,
            .styled-table td {
                padding: 15px 20px; 
            }

            h1 {
                font-size: 50px; 
            }
            }
</style>
</head>
<body>
<?php
require_once 'borrow.class.php';

$borrowObj = new borrow();
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : ''; // Get search keyword

$records = $borrowObj->getBorrowedRecords($keyword); // Fetch records

// Handle action submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $borrowId = $_POST['borrow_id'];
    $action = $_POST['action'];
    // Call the corresponding method to update the record based on the action
    $borrowObj->updateRecordStatus($borrowId, $action);
    
    // Fetch updated records after status change
    $records = $borrowObj->getBorrowedRecords($keyword); // Refresh records
}
?>
<header>
    <div class="">
        <img src="img/logo.png" alt="" class="logo">
    </div>
    <ul>
        <li><a href="dashboard.php">DASHBOARD</a></li>
        <li><a href="inventory.php">INVENTORY</a></li>
        <li><a class="active" href="borrowed.php">BORROWED</a></li>
        <li><a href="user.php">USERS</a></li>
        <li><a href="#about">REPORTS</a></li>
    </ul>
</header>

<section id="dashboard">
    <br>
    <div style="margin-left:12%;padding:1px 16px; width: 85%;">
        <h1 style="color: red;">Borrowed Records</h1>
        <div class="container">
            <form action="" class="searchform" method="post">
                <label for="keyword">SEARCH</label> &nbsp &nbsp;
                <input type="text" name="keyword" id="keyword" placeholder="Enter keyword" value="<?php echo htmlspecialchars($keyword); ?>">
                <input type="submit" value="Search" name="search" id="search">
            </form>
        </div>
        <table class="styled-table">
    <thead>
        <tr>
            <th>Borrow ID</th>
            <th>Student Name</th>
            <th>Borrow Date</th>
            <th>Expected Return Date</th>
            <th>Apparatus Name</th>
            <th>Quantity Borrowed</th>
            <th>Status</th> <!-- New column for status -->
            <th>Actions</th> <!-- New column for actions -->
        </tr>
    </thead>
    <tbody>
    <?php if ($records): ?>
        <?php foreach ($records as $record): ?>
            <tr>
                <td><?php echo htmlspecialchars($record['borrow_id']); ?></td>
                <td><?php echo htmlspecialchars($record['first_name'] . ' ' . $record['last_name']); ?></td>
                <td><?php echo htmlspecialchars(date('Y-m-d', strtotime($record['borrow_date']))); ?></td>
                <td><?php echo htmlspecialchars(date('Y-m-d', strtotime($record['expected_return_date']))); ?></td>
                <td><?php echo htmlspecialchars($record['apparatus_name']); ?></td>
                <td><?php echo htmlspecialchars($record['quantity_borrowed']); ?></td>
                <td style="background-color: 
                    <?php 
                        $status = strtoupper(htmlspecialchars($record['status'] ?? 'PENDING'));
                        if ($status == 'COMPLETED') {
                            echo '#39e75f';
                        } elseif ($status == 'LATE') {
                            echo '#ff8533';
                        } elseif ($status == 'CANCELLED') {
                            echo '#eb1717';
                        } else {
                            echo 'yellow'; // Default to yellow for Pending
                        }
                    ?>;">
                    <?php echo htmlspecialchars($record['status'] ?? 'Pending'); ?>
                </td>
                <td>
                    <form method="post" action="" class="status">
                        <input type="hidden" name="borrow_id" value="<?php echo htmlspecialchars($record['borrow_id']); ?>">
                        <div class="status-container">
                            <select name="action" required>
                                <option value="">Select Action</option>
                                <option value="completed">Completed</option>
                                <option value="completed_late">Late</option>
                                <option value="cancel">Cancel</option>
                            </select>
                            <input type="submit" value="Update" class="action-button">
                        </div>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="8">No records found.</td>
        </tr>
    <?php endif; ?>
</tbody>

</table>

    </section>
</body>
<script src="homepage.js"></script>
</html>
