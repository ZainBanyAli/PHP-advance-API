<!-- <?php
//  1. Create Teacher (POST):

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_management";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } -->
// //1. Create Teacher (POST)

// $data = json_decode(file_get_contents('php://input'), true);

// file_put_contents('php://stderr', "Parsed Data: " . print_r($data, true) . "\n");

// if (!empty($data['name']) && !empty($data['contactInfo'])) {
//     $name = $data['name'];
//     $contactInfo = $data['contactInfo'];

//     $sql = "INSERT INTO Teacher (Name, ContactInfo) VALUES ('$name', '$contactInfo')";
//     if ($conn->query($sql) === TRUE) {
//         echo json_encode(["message" => "Teacher created successfully"]);
//     } else {
//         echo json_encode(["error" => "Error: " . $sql . "<br>" . $conn->error]);
//     }
// } else {
//     echo json_encode(["error" => "Invalid input"]);
// }

// $conn->close();

// get_teachers.php


// $sql = "SELECT * FROM Teacher";
// $result = $conn->query($sql);

// $teachers = array();
// while($row = $result->fetch_assoc()) {
//     $teachers[] = $row;
// }

// echo json_encode($teachers);
// $conn->close();
//?> 

<?php
// 2. Get All Teachers (GET):

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_management";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // SQL query to select all records from the Teacher table
// $sql = "SELECT * FROM Teacher";
// $result = $conn->query($sql);

// // Initialize an empty array to hold the teacher data
// $teachers = array();

// // Fetch the results and store them in the array
// while($row = $result->fetch_assoc()) {
//     $teachers[] = $row;
// }

// // Output the data in JSON format
// echo json_encode($teachers, JSON_PRETTY_PRINT);

// // Close the connection
// $conn->close();
?>


<?php
// 3. Get Teacher by ID (GET):

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_management";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Get TeacherID from query parameter
// $teacherID = isset($_GET['TeacherID']) ? intval($_GET['TeacherID']) : 0;

// // SQL query to select records from the Teacher table
// $sql = "SELECT * FROM Teacher WHERE TeacherID = $teacherID";
// $result = $conn->query($sql);

// // Check if query execution is successful
// if (!$result) {
//     die("Error in query: " . $conn->error);
// }

// // Initialize an empty array to hold the teacher data
// $teachers = array();

// // Fetch the results and store them in the array
// while ($row = $result->fetch_assoc()) {
//     $teachers[] = $row;
// }

// // Output the data in JSON format
// echo json_encode($teachers, JSON_PRETTY_PRINT);

// // Close the connection
// $conn->close();
?>

// create_subject.php


<?php
// // 4- create_subject.php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_management";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// $data = json_decode(file_get_contents('php://input'), true);
// $name = $data['name'];
// $description = $data['description'];

// $sql = "INSERT INTO subjects (name, description) VALUES ('$name', '$description')";
// if ($conn->query($sql) === TRUE) {
//     echo json_encode(["message" => "Subject created successfully"]);
// } else {
//     echo json_encode(["error" => "Error: " . $sql . "<br>" . $conn->error]);
// }

// $conn->close();
?>




//5- get all subjects
<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_management";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $sql = "SELECT * FROM Subjects ";
// $result = $conn->query($sql);

// if (!$result) {
//     die("Query failed: " . $conn->error);
// }

// $subjects = array();
// while($row = $result->fetch_assoc()) {
//     $subjects[] = $row;
// }

// // Set Content-Type to application/json
// header('Content-Type: application/json');
// echo json_encode($subjects);

// $conn->close();
?>


6-get subjects by id 


<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_management";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Get the subject ID from the URL
// $subjectID = isset($_GET['id']) ? intval($_GET['id']) : 0;

// if ($subjectID > 0) {
//     // Prepare and bind
//     $stmt = $conn->prepare("SELECT * FROM Subjects WHERE id = ?");
//     if ($stmt) {
//         $stmt->bind_param("i", $subjectID);

//         // Execute the statement
//         $stmt->execute();

//         // Get the result
//         $result = $stmt->get_result();

//         if ($result->num_rows > 0) {
//             echo json_encode($result->fetch_assoc());
//         } else {
//             echo json_encode(["error" => "Subject not found"]);
//         }

//         $stmt->close();
//     } else {
//         echo json_encode(["error" => "Failed to prepare the statement"]);
//     }
// } else {
//     echo json_encode(["error" => "Invalid subject ID"]);
// }

// // Set Content-Type to application/json
// header('Content-Type: application/json');
// echo json_encode($subjects);
// $conn->close();
?>


<?php
// <! 7-creat exam(post) -->

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_management";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Get the input data
// $data = json_decode(file_get_contents('php://input'), true);
// $subjectID = $data['subject_id'];
// $examDate = $data['date'];
// $maxScore = $data['max_score'];

// // Prepare and bind
// $stmt = $conn->prepare("INSERT INTO Exams (subject_id, date, max_score) VALUES (?, ?, ?)");
// if ($stmt) {
//     $stmt->bind_param("isi", $subjectID, $examDate, $maxScore);

//     // Execute the statement
//     if ($stmt->execute()) {
//         echo json_encode(["message" => "Exam created successfully"]);
//     } else {
//         echo json_encode(["error" => "Error executing statement: " . $stmt->error]);
//     }

//     $stmt->close();
// } else {
//     echo json_encode(["error" => "Failed to prepare the statement: " . $conn->error]);
// }

// $conn->close();
 ?>

<?php
// <! 8-creat exam(GET) -->

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_management";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $sql = "SELECT * FROM exams";
// $result = $conn->query($sql);

// $exams = array();
// while ($row = $result->fetch_assoc()) {
//     $exams[] = $row;
// }

// // Set Content-Type to application/json
// header('Content-Type: application/json');

// // Encode the result as JSON
// echo json_encode($exams);

// $conn->close();
?>

// <! 9-Get Exam by ID (GET): -->
<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_management";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Check if 'id' parameter is set
// if (!isset($_GET['id']) || empty($_GET['id'])) {
//     echo json_encode(["error" => "ID parameter is missing or empty"]);
//     $conn->close();
//     exit();
// }

// $examID = $_GET['id'];

// // Validate the ID to ensure it's an integer
// if (!filter_var($examID, FILTER_VALIDATE_INT)) {
//     echo json_encode(["error" => "Invalid ID parameter"]);
//     $conn->close();
//     exit();
// }

// // Prepare and bind
// $stmt = $conn->prepare("SELECT * FROM exams WHERE id = ?");
// if ($stmt === false) {
//     echo json_encode(["error" => "Failed to prepare the statement: " . $conn->error]);
//     $conn->close();
//     exit();
// }

// $stmt->bind_param("i", $examID);

// // Execute the statement
// $stmt->execute();

// // Get the result
// $result = $stmt->get_result();

// // Check if any rows are returned
// if ($result->num_rows > 0) {
//     echo json_encode($result->fetch_assoc());
// } else {
//     echo json_encode(["error" => "Exam not found"]);
// }
// // Set Content-Type to application/json
// header('Content-Type: application/json');

// // Encode the result as JSON
// echo json_encode($result->fetch_assoc());
// $stmt->close();
// $conn->close();
?>

