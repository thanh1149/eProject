-- create "TICKET" Table
$sql_create_table = "CREATE TABLE IF NOT EXISTS ticket (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ticket_name VARCHAR(150),
        ticket_price VARCHAR(50),
        ticket_infor TEXT
    )";
-- insert data into ticket table
    $sql_insert_data = "INSERT INTO ticket (ticket_name, ticket_price,ticket_infor,ticket_img) VALUES ('Adult Ticket', '150.000', 'Ticket for Adult (>1m4)','image/ticket/ticket-adult1.jpg'),
    ('Kid Ticket', '75.000', 'Ticket for kid (1m-1m4)','image/ticket/ticket-kid1.jpg'),
    ('Adult All in one Ticket', '250.000', 'All In One experience ticket includes unlimited experience tickets for outdoor/indoor/Sun Wheel games.... Does not include food, prize games, haunted houses, trams... Time of use: 15:00- 22:00. Note that service operating hours may vary depending on season or weather.','image/ticket/ticket-adult2.jpg'),
    ('Kid All in one Ticket', '125.000', 'All In One ticket is a package ticket to experience unlimited outdoor/indoor/Sun Wheel games.... Does not include food, prize games, haunted houses, trams... Time of use: 15:00- 22:00. Note that service operating times may vary depending on season or weather.','image/ticket/ticket-kid2.jpg'),
    ('Family Ticket', '350.000', 'Ticket for family (3-4 person)','image/ticket/ticket-family.jpeg')";
    
    
    $sql_add_fk = "ALTER TABLE `ticket-cart`ADD CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id)";
    if ($conn->query($sql_add_fk) === TRUE) {
        echo "Column user_id added successfully and foreign key constraint added.<br>";
    } else {
        echo "Error adding foreign key constraint: " . $conn->error . "<br>";
    } 

$sql_create_table = "CREATE TABLE IF NOT EXISTS admin (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(150),
        password VARCHAR(50),
    )";

$sql_create_table = "CREATE TABLE IF NOT EXISTS contact (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        phone VARCHAR(20),
        message TEXT,
    )";

$sql_create_table = "CREATE TABLE IF NOT EXISTS ticket-cart (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        price VARCHAR(50),
        quantity INT(11),
        date datetime,
        user_id INT,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )";

$sql_create_table = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        email VARCHAR(50),
        phone VARCHAR(50),
        password datetime,
    )";