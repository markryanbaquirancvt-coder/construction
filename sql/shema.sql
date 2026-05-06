CREATE TABLE contractors (
    contractor_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    gender VARCHAR(20),
    specialization VARCHAR(100),
    email VARCHAR(100),
    birth_date DATE,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE project_houses (
    project_id INT AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(150),
    house_type VARCHAR(50),
    contractor_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_contractor FOREIGN KEY (contractor_id) REFERENCES contractors(contractor_id) ON DELETE CASCADE
);
