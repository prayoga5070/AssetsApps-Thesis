CREATE TABLE `maintenance` (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT NOT NULL,
    asset_id INT NOT NULL,
    status VARCHAR(100) NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL
);

CREATE TABLE `maintenance_notes_history` (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    maintenance_id INT NOT NULL,
    notes VARCHAR(2000) NULL,
    created_at DATETIME NULL
);