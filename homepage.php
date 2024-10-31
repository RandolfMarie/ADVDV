<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Homepage</title>
</head>
<STYLE>
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
    font-size: 1.2em;
    line-height: 1.8;
    color: #555;
}
.next-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 35px;
    margin-left: 250px;
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
        border-radius: 10px;
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
.hero {
            position: relative;
            height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            overflow: hidden;
        }

        .hero img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; 
            z-index: -1; 
        }

        .hero-content {
            z-index: 1;
            background-color: #ca0000;
            padding: 30px;
            border-radius: 15px;
        }

        .hero h1 {
            font-size: 4em;
            margin: 0;
        }

        .hero p {
            font-size: 1.5em;
            margin-top: 10px;
        }

        .hero a {
            text-decoration: none;
            color: white;
            background-color: #5e73eb;
            padding: 10px 30px;
            margin-top: 20px;
            font-size: 1.2em;
            display: inline-block;
            border-radius: 5px;
        }


        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 0; 
        }


        .mission {
            padding: 60px 30px;
            background-color: #f9f9f9;
            text-align: center;
        }
        .mission h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .mission p {
            font-size: 1.2em;
            max-width: 800px;
            margin: 0 auto;
        }
        .programs {
            padding: 60px 30px;
        }
        .programs h2 {
            font-size: 2.5em;
            text-align: center;
            margin-bottom: 50px;
        }
        .program-list {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .program-item {
            width: 30%;
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .program-item h3 {
            font-size: 1.8em;
            margin-bottom: 10px;
        }
        .testimonials {
            background-color: #eb1717;
            color: white;
            padding: 60px 30px;
            text-align: center;
        }
        .testimonials h2 {
            font-size: 2.5em;
            margin-bottom: 30px;
        }
        .testimonial {
            max-width: 600px;
            margin: 0 auto;
            font-size: 1.2em;
        }

        
        .footer {
            background-color: #333;
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        .footer p {
            font-size: 1.2em;
            margin: 0;
        }
        .footer a {
            color: #ff6600;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .program-item {
                width: 100%;
            }
        }

</STYLE>
<body>
        <header class="head">
                <div class="schoolname">
                <h1>AYALA NATIONAL HIGH SCHOOL</h1>
                <h4 class="">Zone 6 Ayala, Zamboanga City, Zamboanga del Sur 7000</h4>
                </div>
                    <img src="img\logo.png" class="logo"alt="">
        </header>
        <section class="hero">
        <div class="hero-overlay">
            <img src="img/bg.jpg" alt="">
        </div>
        <div class="hero-content">
            <h1>WELCOME TO</h1>
            <h1>AYALA NATIONAL HIGH SCHOOL</h1>
            <p>Where Learning Meets Excellence</p><br>
            <a href="#mission">Learn More</a>
        </div>
    </section>
        <section class="home">
        <div class="container_1">
                <div class="container_2">
                    <img src="img\microscope.png" alt="" class="mircoscope">
                </div>
                <div class="container_3">
                    <div class="pass">
                        <h1 class="">SCHOOL LABORATORY APPARATUSES</h1>
                        <p>In high school science labs, laboratory apparatuses such as microscopes, beakers, and test tubes are essential for hands-on learning in subjects like biology, chemistry, and physics. 
                            This platform serves as a streamlined tool for booking and borrowing these valuable instruments, allowing students and teachers to easily browse available equipment and check its availability.
                        </p>
                             <a href="taa.php" class="next-btn">Next</a>
                    </div>
                </div>
        </div>
        </section>
   

    <section id="mission" class="mission">
        <h2>Our Mission</h2>
        <p>At ANHS, we aim to foster a learning environment that inspires students to achieve their full potential through a combination of academic rigor and holistic development. We are dedicated to shaping the future leaders of tomorrow.</p>
    </section>

    <section class="programs">
        <h2>Our Programs</h2>
        <div class="program-list">
            <div class="program-item">
                <h3>Junior High School</h3>
                <p>Our secondary education program focuses on building a strong foundation in literacy, numeracy, and critical thinking.</p>
            </div>
            <div class="program-item">
                <h3>Senior high School</h3>
                <p>We provide a comprehensive curriculum to prepare students for higher education and career opportunities.</p>
            </div>
            <div class="program-item">
                <h3>Extracurricular Activities</h3>
                <p>From sports to arts, our extracurricular programs allow students to explore their passions outside the classroom.</p>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <h2>What Our Students Say</h2>
        <p class="testimonial">"ANHS School has helped me grow both academically and personally. The teachers are supportive and the school environment is welcoming." - GERALD LLOYD, Class of 2022</p>
    </section>

    <section class="footer">
        <p>&copy; 2024 ANHS School. All rights reserved. | <a href="mailto:info@abcschool.com">Contact Us</a></p>
    </section>
</body>
<script src="homepage.js"></script>
</html>