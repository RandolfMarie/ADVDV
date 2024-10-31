<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <style>
            *{
    padding: 0;
    margin: 0;
}
header{
    display: flex;
    justify-content: space-between;
    background-color: #202020;
    width: 100%;
    padding-top: 10px;
    padding-bottom: 8px;
}
.logo{
    width: auto;
    height: 60px;
    padding-right: 20px;
}
.schoolname{
    padding-left: 18px;
}
 header h1{
    color: #eb1717;
    font-size: 40px;
 }
 header{
    color: #d2cdcd;
    font-weight: 400;
 }
 header h4{
    font-family: 'Montserrat';
 }

 /* General Styling for Homepage */
body {
    font-family: 'Lato', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
}

.container_1 {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #ffffff;
    padding: 60px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 1200px;
    margin: 40px auto;
    transition: all 0.3s ease-in-out;
}

.container_1:hover {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.container_2 {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}

.mircoscope {
    max-width: 100%;
    height: auto;
    filter: drop-shadow(0 5px 10px rgba(0, 0, 0, 0.1));
    transition: transform 0.3s ease-in-out;
}

.mircoscope:hover {
    transform: scale(1.05);
}

.container_3 {
    flex: 1;
    padding-left: 40px;
}

.pass h1 {
    font-family: 'Playfair Display', serif;
    font-size: 2.5em;
    color: #333;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.pass p {
    font-size: 13px;    
    color: #555;
}
.pass .btns{
    text-align: center;
}
.pass .agree{
    text-align: center;
}
.next-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 35px;
    font-family: 'Lato', sans-serif;
    font-size: 1.1em;
    background-color: #eb1717;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.next-btn:hover {
    background-color: #45a049;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .container_1 {
        flex-direction: column;
        padding: 40px;
    }

    .container_3 {
        padding-left: 0;
        margin-top: 30px;
    }

    .mircoscope {
        max-width: 300px;
    }

    .pass h1 {
        font-size: 1.8em;
    }

    .pass p {
        font-size: 1em;
    }

    .next-btn {
        padding: 10px 30px;
        font-size: 1em;
    }
}
    </style>
    <title>Homepage</title>
</head>
<body>
<section class="home">
        <header class="head">
                <div class="schoolname">
                <h1>AYALA NATIONAL HIGH SCHOOL </h1>
                <h4 class="">Zone 6 Ayala, Zamboanga City, Zamboanga del Sur 7000</h4>
                </div>
                    <img src="img\logo.png" alt="" class="logo">
        </header>
        <div class="container_1">
                <div class="container_2">
                    <img src="img\microscope.png" alt="" class="mircoscope">
                </div>
                <div class="container_3">
                        <div class="pass">
                            <h1 class="">Terms and Agreement</h1><br>
                            <p class="itms">
                                <b>1. Borrower Information Requirement</b><BR>
                                    &nbsp; Before borrowing any laboratory item, users must provide accurate and complete personal information, 
                                    including their name, contact details, identification number, and any other required details. 
                                    Failure to provide accurate information may result in denial of access to laboratory equipment.<br><br>
                                <b>2. Damage to Items</b><br>
                                    &nbsp;The borrower is fully responsible for the care and condition of any laboratory equipment they borrow. 
                                    If the borrowed item is damaged during the borrowing period, the borrower will be charged for the cost 
                                    of repair or replacement, as determined by the laboratory management.
                                    The cost will be based on the extent of the damage and the value of the item.<br><br>
                                <b>3. Late Return of Items</b><br>
                                    &nbsp;All borrowed items must be returned by the agreed upon return date and time.
                                    A late return fee will be charged for every day or part thereof that the item is not returned on time. 
                                    The late fee rate will be specified at the time of borrowing.
                                    Borrowers are encouraged to return items on time to avoid incurring additional charges.<br><br>
                                <b>4. Acknowledgment of Responsibility</b><br>
                                    &nbsp;By borrowing any item, users acknowledge that they have read, understood, and agreed to these terms.
                                    Noncompliance with these terms may result in restrictions on future borrowing privileges.   
                            </p><br><br>
                            <p class="agree">
                                <b>I agree to the <span style="color:red">Terms of Service</span> and I read the privacy notice.</b>
                            </p>
                            <div class="btns">
                                <a href="homepage.php" class="next-btn">Decline</a>
                                <a href="forms.php" class="next-btn">Accept</a>
                            </div>
                        </div>
                </div>
                </div>
        </section>
</body>
<script src="homepage.js"></script>
</html>