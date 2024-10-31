<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .container {
            text-align: center;
            background-color: white;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            font-size: 2.5rem;
            color: #28a745; /* Success color */
            margin-bottom: 20px;
        }

        .container p {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 30px;
        }

        .container a {
            text-decoration: none;
            background-color: #007bff; /* Button color */
            color: white;
            padding: 12px 24px;
            font-size: 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .container a:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 30px;
            }

            .container h1 {
                font-size: 2rem;
            }

            .container a {
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Added Successfully!</h1>
        <p>Your record has been added successfully.</p>
        <a href="homepage.php">Back to Main Menu</a>
    </div>

</body>
</html>
