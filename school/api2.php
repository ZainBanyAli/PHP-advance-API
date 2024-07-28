<?php
header('Content-Type: application/json'); // Set the Content-Type header to JSON

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'school_management';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function createStudent($name, $class, $date_of_birth, $address, $contact_information) {
    global $conn;
    $sql = "INSERT INTO students (name, class, date_of_birth, address, contact_information) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("sssss", $name, $class, $date_of_birth, $address, $contact_information);
    $stmt->execute();
    $id = $stmt->insert_id;
    $stmt->close();
    return $id;
}

function readStudent($id) {
    global $conn;
    $sql = "SELECT * FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
    $stmt->close();
    return $student;
}

function updateStudent($id, $name, $class, $date_of_birth, $address, $contact_information) {
    global $conn;
    $sql = "UPDATE students SET name = ?, class = ?, date_of_birth = ?, address = ?, contact_information = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("sssssi", $name, $class, $date_of_birth, $address, $contact_information, $id);
    $stmt->execute();
    $stmt->close();
}

function deleteStudent($id) {
    global $conn;
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];

// Base path for the API, adjust according to your setup
$base_path = '/school/api.php';

if ($request_method == 'POST' && strpos($request_uri, $base_path . '/students') !== false) {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['name']) && isset($data['class']) && isset($data['date_of_birth']) && isset($data['address']) && isset($data['contact_information'])) {
        $id = createStudent($data['name'], $data['class'], $data['date_of_birth'], $data['address'], $data['contact_information']);
        $student = readStudent($id);
        echo json_encode($student);
    } else {
        echo json_encode(array('message' => 'Invalid request'));
    }
} elseif ($request_method == 'PUT' && preg_match('/' . str_replace('/', '\/', $base_path) . '\/students\/(\d+)/', $request_uri, $matches)) {
    $id = $matches[1];
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['name']) || isset($data['class']) || isset($data['date_of_birth']) || isset($data['address']) || isset($data['contact_information'])) {
        updateStudent($id, $data['name'] ?? '', $data['class'] ?? '', $data['date_of_birth'] ?? '', $data['address'] ?? '', $data['contact_information'] ?? '');
        $student = readStudent($id);
        echo json_encode($student);
    } else {
        echo json_encode(array('message' => 'Invalid request'));
    }
} elseif ($request_method == 'DELETE' && preg_match('/' . str_replace('/', '\/', $base_path) . '\/students\/(\d+)/', $request_uri, $matches)) {
    $id = $matches[1];
    deleteStudent($id);
    echo json_encode(array('message' => 'Student deleted successfully'));
} elseif ($request_method == 'GET' && preg_match('/' . str_replace('/', '\/', $base_path) . '\/students\/(\d+)/', $request_uri, $matches)) {
    $id = $matches[1];
    $student = readStudent($id);
    echo json_encode($student);
} elseif ($request_method == 'GET' && strpos($request_uri, $base_path . '/students') !== false) {
    $result = $conn->query("SELECT * FROM students");
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));
} else {
    echo json_encode(array('message' => 'Invalid request'));
}

$conn->close();
?>
