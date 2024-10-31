
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>USERS</title>
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
    <?php
       require_once 'borrow.class.php';
       
       $borrowObj = new borrow();

       $array = $borrowObj->Search();

       $keyword = $grade_section = '';
       if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])){
        $keyword = htmlentities($_POST['keyword']);
        $grade_section = htmlentities($_POST['grade_section']);
        $array = $borrowObj->Search($keyword, $grade_section);
       }
    ?>
        <header>
            <div class="">
                <img src="img\logo.png" alt="" class="logo">
            </div>
            <ul>
                <li><a href="#dashboard">DASHBOARD</a></li>
                <li><a href="inventory.php">INVENTORY</a></li>
                <li><a href="BORROWED.PHP">BORROWED</a></li>
                <li><a class="active" href="#about">USERS</a></li>
                <li><a href="#about">REPORTS</a></li>
            </ul>
        </header>
        <section class="" id="dashboard">
            <div class="" style="margin-left:12%;padding:1px 16px;height:25%;">
                    <br><br><h2 style="color: red;">USERS</h2>
                    <div class="container">
        <form action="" class="searchform" method="post">
            <label for="">Grade</label> &nbsp; &nbsp;
            <select name="grade_section" id="grade_section">
                <option value="">All</option>
                <option value="7">Grade 7</option>
                <option value="8">Grade 8</option>
                <option value="9">Grade 9</option>
                <option value="10">Grade 10</option>
            </select>
            <label for="keyword">SEARCH</label> &nbsp &nbsp;
            <input type="text" name="keyword" id="keyword" placeholder="Enter keyword" value="<?=$keyword?>">
            <input type="submit" value="Search" name="search" id="search">
        </form>
    </div>

<table class="styled-table">
        <tr>
            <th>No.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Student Id</th>
            <th>Contact</th>
            <th>Grade & Section</th>
        </tr>
        <?php
            $i = 1;
            foreach($array as $arr){
        ?>
        <tr>
            <td><?=$i ?></td>
            <td><?=$arr['first_name'] ?></td>
            <td><?=$arr['last_name'] ?></td>
            <td><?=$arr['student_id'] ?></td>
            <td><?=$arr['contact'] ?></td>
            <td><?=$arr['grade_section'] ?></td>
            </td>
            
        </tr>
        <?php
            $i++; 
        }
        ?>
</table>

            </div>
        </section>
</body>
<!-- <script src="./user.js"></script> -->
</html>