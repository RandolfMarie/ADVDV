CREATE DATABASE borrowing_system;

USE borrowing_system;

CREATE TABLE Students (
    id INT(11) NOT NULL AUTO_INCREMENT, 
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    student_id VARCHAR(20) NOT NULL UNIQUE,          
    contact VARCHAR(50) NOT NULL,
    grade_section VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Apparatus (
    apparatus_id INT(11) NOT NULL AUTO_INCREMENT, 
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    quantity INT NOT NULL,
    PRIMARY KEY (apparatus_id)
);

CREATE TABLE BorrowRecords (
    borrow_id INTEGER PRIMARY KEY AUTO_INCREMENT,  
    student_id VARCHAR(20) NOT NULL,
    borrow_date DATETIME NOT NULL,                    
    expected_return_date DATE NOT NULL,
    status ENUM('Pending','completed', 'late', 'cancelled') DEFAULT NULL, 
    CONSTRAINT FK_student_id FOREIGN KEY(student_id) REFERENCES Students(student_id)
);

CREATE TABLE BorrowedApparatus (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,  
    borrow_id INTEGER NOT NULL,                           
    apparatus_id INTEGER NOT NULL,                        
    quantity_borrowed INTEGER NOT NULL,                   
    FOREIGN KEY (borrow_id) REFERENCES BorrowRecords(borrow_id),
    FOREIGN KEY (apparatus_id) REFERENCES Apparatus(apparatus_id)
);

CREATE TABLE ApparatusLog (
    log_id INTEGER PRIMARY KEY AUTO_INCREMENT, 
    apparatus_id INTEGER NOT NULL,                        
    action TEXT CHECK(action IN ('add', 'remove')),       
    quantity INTEGER NOT NULL,                            
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,         
    FOREIGN KEY (apparatus_id) REFERENCES Apparatus(apparatus_id)
);

-- New AdminUsers table for managing admin accounts
CREATE TABLE AdminUsers (
    admin_id INT(11) NOT NULL AUTO_INCREMENT,      
    username VARCHAR(50) NOT NULL UNIQUE,           
    password VARCHAR(255) NOT NULL,                
    email VARCHAR(100) NOT NULL UNIQUE,             
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,  
    PRIMARY KEY (admin_id)                         
);
