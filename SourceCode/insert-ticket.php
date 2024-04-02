<?php
    require_once 'function.php';
    init_connection();

    // CREATE TICKET TABLE
    $sql_create_table = "CREATE TABLE IF NOT EXISTS ticket (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ticket_name VARCHAR(150),
        ticket_price VARCHAR(50),
        ticket_infor TEXT
    )";
    
    if ($conn->query($sql_create_table) === TRUE) {
        echo "Table users created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
    $sql_alter_table = "ALTER TABLE ticket ADD COLUMN ticket_img VARCHAR(255)";
    if ($conn->query($sql_alter_table) === TRUE) {
        echo "Column ticket_img added successfully<br>";
    } else {
        echo "Error adding column ticket_img: " . $conn->error . "<br>";
    }

    //insert data into ticket table
    $sql_insert_data = "INSERT INTO ticket (ticket_name, ticket_price,ticket_infor,ticket_img) VALUES ('Adult Ticket', '150.000', 'Ticket for Adult (>1m4)','image/ticket/ticket-adult1.jpg'),
    ('Kid Ticket', '75.000', 'Ticket for kid (1m-1m4)','image/ticket/ticket-kid1.jpg'),
    ('Adult All in one Ticket', '250.000', 'All In One experience ticket includes unlimited experience tickets for outdoor/indoor/Sun Wheel games.... Does not include food, prize games, haunted houses, trams... Time of use: 15:00- 22:00. Note that service operating hours may vary depending on season or weather.','image/ticket/ticket-adult2.jpg'),
    ('Kid All in one Ticket', '125.000', 'All In One ticket is a package ticket to experience unlimited outdoor/indoor/Sun Wheel games.... Does not include food, prize games, haunted houses, trams... Time of use: 15:00- 22:00. Note that service operating times may vary depending on season or weather.','image/ticket/ticket-kid2.jpg'),
    ('Family Ticket', '350.000', 'Ticket for family (3-4 person)','image/ticket/ticket-family.jpeg')";

    if ($conn->query($sql_insert_data) === TRUE) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql_insert_data . "<br>" . $conn->error;
    }
?>
