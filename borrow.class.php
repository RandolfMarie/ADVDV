<?php
    require_once 'database.php';

    class borrow{

        public $id = '';
        public $first_name = '';
        public $last_name = '';
        public $student_id = '';
        public $contact = '';
        public $grade_section = '';
        public $borrow_id = '';
        public $borrow_date = '';
        public $expected_return_date = '';
        public $actual_return_date = '';
        public $apparatus_id = '';
        public $quantity_borrowed = '';
        public $log_id = '';
        public $action = '';
        public $timestamp = '';
        public $name = '';
        public $description = '';
        public $quantity = '';

        protected $db;

        function __construct(){
            $this->db = new Database();
        }
        function showAll() {
            $sql = "SELECT * FROM Students;";
            
            $query = $this->db->connect()->prepare($sql);
            
            if ($query->execute()) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return [];
            }
        }
        function showAllBR($keyword='') {
            $sql = "SELECT 
                        BorrowRecords.student_id, 
                        Apparatus.name, 
                        Apparatus.quantity, 
                        BorrowRecords.borrow_id, 
                        Apparatus.description
                    FROM 
                        BorrowedApparatus
                    JOIN 
                        BorrowRecords ON BorrowedApparatus.borrow_id = BorrowRecords.borrow_id
                    JOIN 
                        Apparatus ON BorrowedApparatus.apparatus_id = Apparatus.apparatus_id
                    WHERE 
                        BorrowRecords.student_id LIKE :keyword
                    ORDER BY 
                        BorrowRecords.student_id ASC;";
            
            $query = $this->db->connect()->prepare($sql);
            $keyword = '%' . $keyword . '%';
            $query->bindParam(':keyword', $keyword);
            
            $data = null;
        
            if ($query->execute()) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        }
        
        function add() {
    // Insert into Students table
    $sql = "INSERT INTO Students (first_name, last_name, student_id, contact, grade_section)
            VALUES (:first_name, :last_name, :student_id, :contact, :grade_section);";
    
    $query = $this->db->connect()->prepare($sql);
    $query->bindParam(':first_name', $this->first_name);
    $query->bindParam(':last_name', $this->last_name);
    $query->bindParam(':student_id', $this->student_id);
    $query->bindParam(':contact', $this->contact);
    $query->bindParam(':grade_section', $this->grade_section);
    
    if ($query->execute()) {

        // Insert into Apparatus table
        $sql1 = "INSERT INTO Apparatus (name, description, quantity)
                 VALUES (:name, :description, :quantity);";

        $query1 = $this->db->connect()->prepare($sql1);
        $query1->bindParam(':name', $this->name);
        $query1->bindParam(':description', $this->description);
        $query1->bindParam(':quantity', $this->quantity);

        if ($query1->execute()) {
            // Ensure the student exists before adding borrow records
            $sql_check_student = "SELECT * FROM students WHERE student_id = :student_id";
            $query_check = $this->db->connect()->prepare($sql_check_student);
            $query_check->bindParam(':student_id', $this->student_id);
            $query_check->execute();

            if ($query_check->rowCount() > 0) {
                // Insert into BorrowRecords table
                $sql2 = "INSERT INTO borrowrecords (student_id, borrow_date, expected_return_date)
                         VALUES (:student_id, :borrow_date, :expected_return_date);";
                
                $query2 = $this->db->connect()->prepare($sql2);
                $query2->bindParam(':student_id', $this->student_id); // Pass the student_id
                $query2->bindParam(':borrow_date', $this->borrow_date);
                $query2->bindParam(':expected_return_date', $this->expected_return_date);

                if ($query2->execute()) {
                    // Get the last inserted borrow_id from BorrowRecords
                    $borrow_id = $this->db->connect()->lastInsertId(); // borrow_id from borrowrecords
                    
                    // You need to query the correct `apparatus_id` if it's already in the database
                    // Since you're inserting into the Apparatus table, fetch its ID separately
                    $sql_get_apparatus_id = "SELECT apparatus_id FROM Apparatus WHERE name = :name";
                    $query_get_apparatus_id = $this->db->connect()->prepare($sql_get_apparatus_id);
                    $query_get_apparatus_id->bindParam(':name', $this->name);
                    $query_get_apparatus_id->execute();
                    $apparatus_row = $query_get_apparatus_id->fetch(PDO::FETCH_ASSOC);
                    $apparatus_id = $apparatus_row['apparatus_id'];

                    if ($apparatus_id) {
                        // Insert into BorrowedApparatus table
                        $sql3 = "INSERT INTO borrowedapparatus (borrow_id, apparatus_id, quantity_borrowed)
                                 VALUES (:borrow_id, :apparatus_id, :quantity_borrowed);";

                        $query3 = $this->db->connect()->prepare($sql3);
                        $query3->bindParam(':borrow_id', $borrow_id);
                        $query3->bindParam(':apparatus_id', $apparatus_id); // Use the fetched apparatus_id
                        $query3->bindParam(':quantity_borrowed', $this->quantity);

                        if ($query3->execute()) {
                            // Redirect to success page
                            header('location:success.php');
                            exit;
                        }
                    } else {
                        die('Error: Apparatus not found in the database.');
                    }
                }
            } else {
                die('Error: Student not found in the database.');
            }
        }
    }
}

        
    function Search($keyword='', $grade_section=''){

            $sql = "SELECT * from students WHERE (first_name LIKE '%' :keyword '%') AND (grade_section LIKE '%' :grade_section '%') ORDER BY first_name ASC;";

            $query = $this->db->connect()->prepare($sql);
            $query->bindParam(':keyword', $keyword);
            $query->bindParam(':grade_section', $grade_section);
            $data = null;
      if($query->execute())
        {
            $data = $query->fetchall();
        }
        return $data;
    }
    public function getBorrowedRecords($keyword = '') {
        $sql = "SELECT 
                    BorrowRecords.borrow_id,
                    Students.first_name,
                    Students.last_name,
                    BorrowRecords.borrow_date,
                    BorrowRecords.expected_return_date,
                    BorrowRecords.status, -- Include status in the select statement
                    BorrowedApparatus.apparatus_id,
                    Apparatus.name AS apparatus_name,
                    BorrowedApparatus.quantity_borrowed
                FROM 
                    BorrowRecords
                JOIN 
                    Students ON BorrowRecords.student_id = Students.student_id
                JOIN 
                    BorrowedApparatus ON BorrowRecords.borrow_id = BorrowedApparatus.borrow_id
                JOIN 
                    Apparatus ON BorrowedApparatus.apparatus_id = Apparatus.apparatus_id
                WHERE 
                    Students.first_name LIKE :keyword OR 
                    Students.last_name LIKE :keyword OR 
                    BorrowRecords.borrow_id LIKE :keyword
                ORDER BY 
                    BorrowRecords.borrow_date DESC;";
    
        $query = $this->db->connect()->prepare($sql);
        $keyword = '%' . $keyword . '%';
        $query->bindParam(':keyword', $keyword);
    
        if ($query->execute()) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    
    public function updateRecordStatus($borrowId, $action) {
        $query = "";
    
        switch ($action) {
            case 'completed':
                $query = "UPDATE borrowrecords SET status='completed' WHERE borrow_id=:borrow_id";
                break;
            case 'completed_late':
                $query = "UPDATE borrowrecords SET status='late' WHERE borrow_id=:borrow_id";
                break;
            case 'cancel':
                $query = "UPDATE borrowrecords SET status='cancelled' WHERE borrow_id=:borrow_id";
                break;
            default:
                return false; // Invalid action
        }
    
        // Prepare and execute the query
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindParam(':borrow_id', $borrowId, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return true; // Successfully updated
        } else {
            // Get error information
            $errorInfo = $stmt->errorInfo();
            // Log or print the error (this could be to a log file or directly to the screen for debugging)
            error_log("SQL Error: " . print_r($errorInfo, true));
            return false; // Update failed
        }
    }
    
}
?>