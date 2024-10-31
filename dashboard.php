
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

    </style>
</head>

<body>
        <header>
            <div class="">
                <img src="img\logo.png" alt="" class="logo">
            </div>
            <ul>
                <li><a class="active" href="#dashboard">DASHBOARD</a></li>
                <li><a href="inventory.php">INVENTORY</a></li>
                <li><a href="BORROWED.PHP">BORROWED</a></li>
                <li><a href="user.php">USERS</a></li>
                <li><a href="#about">REPORTS</a></li>
            </ul>
        </header>
        <section class="" id="dashboard">
            <div class="" style="margin-left:10%;padding:1px 16px;height:25%;">
                
            </div>
        </section>
</body>
<script src="homepage.js"></script>
</html>