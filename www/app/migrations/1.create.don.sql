CREATE TABLE Don (
    id INT AUTO_INCREMENT PRIMARY KEY,
    namedon VARCHAR(255) NOT NULL, 
    typedon VARCHAR(255) NOT NULL, 
    donneur_id INT NOT NULL,
    FOREIGN KEY (donneur_id) REFERENCES Donneur(id)
);


