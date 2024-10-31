<?php
require_once('function.php');
require_once('borrow.class.php');

$first_name = $last_name = $student_id = $contact = $grade_section = $borrow_date = $expected_return_date = $name = $description = $quantity = '';
$first_nameErr = $last_nameErr = $student_idErr = $contactErr = $grade_sectionErr = $borrow_dateErr = $expected_return_dateErr = $nameErr = $descriptionErr = $quantityErr = '';
$productObj = new borrow();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['student_id']) && isset($_GET['apparatus_id'])) {
            $student_id = $_GET['student_id']; // From GET
            $apparatus_id = $_GET['apparatus_id'];
    
            $record = $productObj->fetchRecord($student_id, $apparatus_id);
    
            if (!empty($record)) {
                $first_name = $record['first_name'];
                $last_name = $record['last_name']; // Corrected
                $student_id_from_record = $record['student_id']; // Renamed for clarity
                $contact = $record['contact']; // Corrected
                $grade_section = $record['grade_section']; // Corrected
                $borrow_date = $record['borrow_date']; // Corrected
                $expected_return_date = $record['expected_return_date']; // Corrected
                $name = $record['apparatus']['name'];
                $description = $record['apparatus']['description'];
                $quantity = $record['apparatus']['quantity'];
            } else {
                echo 'No product found!';
                exit;
            }
        }
    }
      elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = clean_input($_POST['first_name']);
    $last_name = clean_input($_POST['last_name']);
    $student_id = clean_input($_POST['student_id']);
    $contact = clean_input($_POST['contact']);
    $grade_section = clean_input($_POST['grade_section']);
    $name = clean_input($_POST['name']);
    $description = clean_input($_POST['description']);
    $quantity = clean_input($_POST['quantity']);
    $borrow_date = clean_input($_POST['borrow_date']);
    $expected_return_date = clean_input($_POST['expected_return_date']);

    if (empty($first_name)) {
        $first_nameErr = 'First name is Required';
    }
    if (empty($last_name)) {
        $last_nameErr = 'Last name is Required';
    }
    if (empty($student_id)) {
        $student_idErr = 'Student ID is Required';
    }
    if (empty($contact)) {
        $contactErr = 'Contact is Required';
    }
    if (empty($grade_section)) {
        $grade_sectionErr = 'Grade & Section is Required';
    }
    if (empty($name)) {
        $nameErr = 'Apparatus name is required';
    }
    if (empty($description)) {
        $descriptionErr = 'Provide description';
    }
    if (empty($quantity)) {
        $quantityErr = 'Quantity is Required';
    }
    if (empty($borrow_date)) {
        $borrow_dateErr = 'Borrow date is Required';
    } elseif ($borrow_date < date('Y-m-d')) {
        $borrow_dateErr = 'Borrow date cannot be before today';
    }
    if (empty($expected_return_date)) {
        $expected_return_dateErr = 'Expected return date is Required';
    } elseif ($expected_return_date < $borrow_date) {
        $expected_return_dateErr = 'Expected return date cannot be before borrow date';
    }

    if (empty($first_nameErr) && empty($last_nameErr) && empty($contactErr) && empty($student_idErr) && empty($grade_sectionErr) && empty($borrow_dateErr) && empty($expected_return_dateErr)) {
        $productObj = new borrow();
        $productObj->first_name = $first_name;
        $productObj->last_name = $last_name;
        $productObj->contact = $contact;
        $productObj->student_id = $student_id;
        $productObj->grade_section = $grade_section;
        $productObj->borrow_date = $borrow_date;
        $productObj->expected_return_date = $expected_return_date;
        $productObj->name = $name;
        $productObj->description = $description;
        $productObj->quantity = $quantity;

        if ($productObj->add()) {
            header('location: success.php');
        } else {
            echo 'Cannot add laboratory apparatuses, something went wrong';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="forms.css">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Fill-up</title>
<style>
        .error{
                color: red;
        }
        .container-first {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f9f9f9;
        }

        .cont_2 {
        background-color: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 800px;
        }
        h1 {
        text-align: center;
        color: #333;
        font-size: 2em;
        text-transform: uppercase;
        }
        .input-infos {
        display: flex;
        flex-direction: column;
        gap: 20px;
        }

        .table1 {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        }

        .info, ._table2 {
        flex: 1;
        margin: 10px;
        }
        label {
        font-family: 'Arial', sans-serif;
        font-size: 0.95em;
        color: #555;
        margin-bottom: 5px;
        display: block;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="datetime-local"]{
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        margin-bottom: 10px;
        font-size: 1em;
        color: #333;
        background-color: #f7f7f7;
        transition: border 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        input[type="datetime-local"]:focus {
        border-color: #4CAF50;
        outline: none;
        }
        .error {
        color: #E74C3C;
        font-size: 0.85em;
        margin-bottom: 5px;
        display: block;
        }
        .sbmt {
        background-color: #eb1717;
        color: white;
        font-size: 1.2em;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
        text-transform: uppercase;
        font-family: 'Roboto', sans-serif;
        letter-spacing: 1.2px;
        }

        .sbmt:hover {
        background-color: #45A049;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
        .table1 {
                flex-direction: column;
        }

        .info, ._table2 {
                margin: 0;
        }
        }

</style>
</head>
<body>
<section class="home">
        <header class="head">
                <div class="schoolname">
                <h1>AYALA NATIONAL HIGH SCHOOL</h1>
                <h4 class="">Zone 6 Ayala, Zamboanga City, Zamboanga del Sur 7000</h4>
                </div>
                    <img src="img\logo.png" alt="" class="logo">
        </header>
                <div class="container-first">
                        <div class="cont_2">
                                <form action="" method="post"> 
                                <h1>Fill-UP INFORMATION</h1><br><br>
                                        <div class="input-infos">
                                                <div class="table1">
                                                        <div class="info">
                                                                <div class="">             
                                                                          
                                                                        <br>                                              
                                                                        <label for="first_name">First Name</label><span class="error"></span>
                                                                        <?php if (!empty($first_nameErr)): ?>
                                                                            <span class="error"><?= $first_nameErr ?></span>
                                                                        <?php endif; ?><br>
                                                                        <input type="text" id="first_name" name="first_name" placeholder="First Name" value="<?= $first_name ?>">
                                                                           
                                                                        <br>
                                                                        
                                                                        <label for="last_name" value="<?=$last_name?>" >Last Name</label>
                                                                        <?php if(!empty($last_nameErr)):?>
                                                                                        <span class="error"><?=$last_nameErr?></span>
                                                                                <?php endif; ?><br>
                                                                        <input type="text" id="last_name" name="last_name" placeholder=" Last Name" value="<?=$last_name?>"><br>
                                                                        
                                                                        <br>
                                                                        
                                                                        <label for="student_id" value="<?=$student_id?>">Student ID</label>
                                                                        <?php if(!empty($student_idErr)):?>
                                                                                        <span class="error"><?=$student_idErr?></span>
                                                                                <?php endif; ?><br>
                                                                        <input type="text" id="student_id" name="student_id" placeholder=" Student ID" value="<?=$student_id?>"><br>

                                                                        <br>        

                                                                        <label for="contact"value="<?=$contact?>">Contact</label>
                                                                        <?php if(!empty($contactErr)):?>
                                                                                        <span class="error"><?=$contactErr?></span>
                                                                                <?php endif; ?><br>
                                                                        <input type="text" id="contact" name="contact" placeholder=" Contact" value="<?=$contact?>"><br>

                                                                        <br>

                                                                        <label for="grade_section" value="<?=$grade_section?>">Grade & Section</label>
                                                                        <?php if(!empty($grade_sectionErr)):?>
                                                                                        <span class="error"><?=$grade_sectionErr?></span>
                                                                                <?php endif; ?><br>
                                                                        <input type="text" id="grade_section" name="grade_section" placeholder="  ex. 10Aquinas" value="<?=$grade_section?>"><br><br>

                                                                       
                                                                        <br>

                                                                        <br><br>
                                                                </div>
                                                                <div class="_table2">
                                                                <label for="name"  value="<?=$name?>">Apparatus name</label>
                                                                        <?php if(!empty($nameErr)):?>
                                                                                        <span class="error"><?=$nameErr?></span>
                                                                                <?php endif; ?><br>
                                                                        <input type="text" id="name" name="name" placeholder="  Apparatus name" value="<?=$name?>"><br><br>

                                                                        <label for="description"  value="<?=$description?>">Description</label>
                                                                        <?php if(!empty($descriptionErr)):?>
                                                                                        <span class="error"><?=$descriptionErr?></span>
                                                                                <?php endif; ?><br>
                                                                        <input type="text" id="description" name="description" placeholder="  Description" ><br><br>

                                                                        <label for="quantity"  value="<?=$quantity?>">Quantity</label>
                                                                        <?php if(!empty($quantityErr)):?>
                                                                                        <span class="error"><?=$quantityErr?></span>
                                                                                <?php endif; ?><br>
                                                                        <input type="number" id="quantity" name="quantity" placeholder="  Quantity"><br><br>

                                                                        <label for="borrow_date"  value="<?=$borrow_date?>">Borrow Date</label>
                                                                        <?php if(!empty($borrow_dateErr)):?>
                                                                                        <span class="error"><?=$borrow_dateErr?></span>
                                                                                <?php endif; ?><br>
                                                                        <input type="datetime-local" id="borrow_date" name="borrow_date" placeholder="  Borrow Date" ><br><br>


                                                                        <label for="Expected__return_date"  value="<?=$expected_return_date?>">Expected return date</label>
                                                                        <?php if(!empty($expected_return_dateErr)):?>
                                                                                        <span class="error"><?=$expected_return_dateErr?></span>
                                                                                <?php endif; ?><br>
                                                                        <input type="DATE" id="expected_return_date" name="expected_return_date" placeholder="  Expected return date"><br>

                                                                </div>
                                                        </div>     
                                                </div>     
                                        </div>
                                        <div class="" style="text-align: center;">
                                        <input type="submit" value="Submit" class="sbmt">
                                        </div>
                                </form>
                        </div>
                </div>
        </section>
</body>
</html>