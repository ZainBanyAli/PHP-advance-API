
<!-- task4: -->
<?php
//  1. Retrieve a Student's Subjects (GET): 

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "school_management";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// if (!isset($_GET['student_id']) || empty($_GET['student_id'])) {
//     echo json_encode(["error" => "Student ID parameter is missing or empty"]);
//     $conn->close();
//     exit();
// }

// $studentID = $_GET['student_id'];

// if (!filter_var($studentID, FILTER_VALIDATE_INT)) {
//     echo json_encode(["error" => "Invalid Student ID parameter"]);
//     $conn->close();
//     exit();
// }

// $stmt = $conn->prepare("
//     SELECT s.id, s.name, s.description 
//     FROM subjects s
//     JOIN student_subject ss ON s.id = ss.subject_id
//     WHERE ss.student_id = ?
// ");
// if ($stmt === false) {
//     echo json_encode(["error" => "Failed to prepare the statement: " . $conn->error]);
//     $conn->close();
//     exit();
// }

// $stmt->bind_param("i", $studentID);

// $stmt->execute();

// $result = $stmt->get_result();

// if ($result->num_rows > 0) {
//     $subjects = array();
//     while ($row = $result->fetch_assoc()) {
//         $subjects[] = $row;
//     }
//     echo json_encode($subjects);
// } else {
//     echo json_encode(["error" => "No subjects found for this student"]);
// }

// header('Content-Type: application/json');

// $stmt->close();
// $conn->close();
?>


<?php
//  2.  Retrieve a Subject's Students (GET):  

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

// // Check if 'subject_id' parameter is set
// if (!isset($_GET['subject_id']) || empty($_GET['subject_id'])) {
//     echo json_encode(["error" => "Subject ID parameter is missing or empty"]);
//     $conn->close();
//     exit();
// }

// $subjectID = $_GET['subject_id'];

// // Validate the subject ID to ensure it's an integer
// if (!filter_var($subjectID, FILTER_VALIDATE_INT)) {
//     echo json_encode(["error" => "Invalid Subject ID parameter"]);
//     $conn->close();
//     exit();
// }

// // Prepare and bind
// $stmt = $conn->prepare("
//     SELECT st.id, st.name, st.date_of_birth, st.address, st.contact_information, st.class
//     FROM students st
//     JOIN student_subject ss ON st.id = ss.student_id
//     WHERE ss.subject_id = ?
// ");
// if ($stmt === false) {
//     echo json_encode(["error" => "Failed to prepare the statement: " . $conn->error]);
//     $conn->close();
//     exit();
// }

// $stmt->bind_param("i", $subjectID);

// // Execute the statement
// $stmt->execute();

// // Get the result
// $result = $stmt->get_result();

// // Check if any rows are returned
// if ($result->num_rows > 0) {
//     $students = array();
//     while ($row = $result->fetch_assoc()) {
//         $students[] = $row;
//     }
//     echo json_encode($students);
// } else {
//     echo json_encode(["error" => "No students found for this subject"]);
// }

//  header('Content-Type: application/json');


// $stmt->close();
// $conn->close();
?>


<?php
//  3. Register Students in Subjects (POST): 

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

// // Get the raw POST data
// $data = json_decode(file_get_contents('php://input'), true);

// // Check if the necessary data is present
// if (!isset($data['student_id']) || !isset($data['subject_id'])) {
//     echo json_encode(["error" => "student_id and subject_id are required"]);
//     $conn->close();
//     exit();
// }

// $student_id = $data['student_id'];
// $subject_id = $data['subject_id'];

// // Validate student_id and subject_id
// if (!filter_var($student_id, FILTER_VALIDATE_INT) || !filter_var($subject_id, FILTER_VALIDATE_INT)) {
//     echo json_encode(["error" => "Invalid student_id or subject_id"]);
//     $conn->close();
//     exit();
// }

// // Prepare and bind
// $stmt = $conn->prepare("INSERT INTO student_subject (student_id, subject_id) VALUES (?, ?)");
// if ($stmt === false) {
//     echo json_encode(["error" => "Failed to prepare the statement: " . $conn->error]);
//     $conn->close();
//     exit();
// }

// $stmt->bind_param("ii", $student_id, $subject_id);

// // Execute the statement
// if ($stmt->execute()) {
//     echo json_encode(["message" => "Student registered in subject successfully"]);
// } else {
//     echo json_encode(["error" => "Failed to register student in subject: " . $stmt->error]);
// }

// $stmt->close();
// $conn->close();
?>

<?php
// // 4.
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

// // Get the student ID from the query parameter
// $studentID = isset($_GET['student_id']) ? intval($_GET['student_id']) : null;

// if ($studentID === null) {
//     echo json_encode(["error" => "Student ID parameter is missing or invalid"]);
//     $conn->close();
//     exit();
// }

// // Prepare the SQL statement
// $sql = "
//     SELECT exams.id, exams.subject_id, exams.date, exams.max_score
//     FROM exams
//     JOIN student_exams ON exams.id = student_exams.exam_id
//     WHERE student_exams.student_id = ?
// ";

// $stmt = $conn->prepare($sql);
// if ($stmt === false) {
//     echo json_encode(["error" => "Failed to prepare the statement: " . $conn->error]);
//     $conn->close();
//     exit();
// }

// $stmt->bind_param("i", $studentID);
// $stmt->execute();
// $result = $stmt->get_result();

// $exams = [];
// while ($row = $result->fetch_assoc()) {
//     $exams[] = $row;
// }

// if (empty($exams)) {
//     echo json_encode(["error" => "No exams found for this student"]);
// } else {
//     echo json_encode($exams);
// }
// header('Content-Type: application/json');

// $stmt->close();
// $conn->close();
// ?>

<?php
// 5. Retrieve a Subject's Exams (GET): Create an endpoint to get all the exams conducted for a particular subject.
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

// // Get the subject ID from the query parameter
// $subjectID = isset($_GET['subject_id']) ? intval($_GET['subject_id']) : null;

// if ($subjectID === null) {
//     echo json_encode(["error" => "Subject ID parameter is missing or invalid"]);
//     $conn->close();
//     exit();
// }

// // Prepare the SQL statement
// $sql = "SELECT * FROM exams WHERE subject_id = ?";
// $stmt = $conn->prepare($sql);
// if ($stmt === false) {
//     echo json_encode(["error" => "Failed to prepare the statement: " . $conn->error]);
//     $conn->close();
//     exit();
// }

// $stmt->bind_param("i", $subjectID);
// $stmt->execute();
// $result = $stmt->get_result();

// $exams = [];
// while ($row = $result->fetch_assoc()) {
//     $exams[] = $row;
// }

// if (empty($exams)) {
//     echo json_encode(["error" => "No exams found for this subject"]);
// } else {
//     echo json_encode($exams);
// }
//  header('Content-Type: application/json');

// $stmt->close();
// $conn->close();
?>


<?php
// 6.Update Exam: Allow updating exam details, including scores
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the raw data from the PUT request
$data = json_decode(file_get_contents("php://input"), true);

$examID = isset($data['id']) ? intval($data['id']) : null;
$subjectID = isset($data['subject_id']) ? intval($data['subject_id']) : null;
$date = isset($data['date']) ? $data['date'] : null;
$maxScore = isset($data['max_score']) ? intval($data['max_score']) : null;

if ($examID === null || $subjectID === null || $date === null || $maxScore === null) {
    echo json_encode(["error" => "All parameters (id, subject_id, date, max_score) are required"]);
    $conn->close();
    exit();
}

// Prepare the SQL statement
$sql = "UPDATE exams SET subject_id = ?, date = ?, max_score = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo json_encode(["error" => "Failed to prepare the statement: " . $conn->error]);
    $conn->close();
    exit();
}

$stmt->bind_param("isii", $subjectID, $date, $maxScore, $examID);
if ($stmt->execute()) {
    echo json_encode(["message" => "Exam updated successfully"]);
} else {
    echo json_encode(["error" => "Failed to update exam: " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>

