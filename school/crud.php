<?php
// api.php

// database connection settings
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'school_management';

// connect to database
$conn = new mysqli($host, $username, $password, $database);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CRUD operations
function createStudent($name, $date_of_birth, $address, $contact_information) {
    global $conn;
    $sql = "INSERT INTO students (name, date_of_birth, address, contact_information) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $date_of_birth, $address, $contact_information);
    $stmt->execute();
    $stmt->close();
}

function readStudents() {
    global $conn;
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);
    $students = array();
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    return $students;
}

function readStudent($id) {
    global $conn;
    $sql = "SELECT * FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
    return $student;
}

function updateStudent($id, $name, $date_of_birth, $address, $contact_information) {
    global $conn;
    $sql = "UPDATE students SET name = ?, date_of_birth = ?, address = ?, contact_information = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $date_of_birth, $address, $contact_information, $id);
    $stmt->execute();
    $stmt->close();
}

function deleteStudent($id) {
    global $conn;
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['action'])) {
        if ($data['action'] == 'create') {
            createStudent($data['name'], $data['date_of_birth'], $data['address'], $data['contact_information']);
            echo json_encode(array('message' => 'Student created successfully'));
        } elseif ($data['action'] == 'update') {
            updateStudent($data['id'], $data['name'], $data['date_of_birth'], $data['address'], $data['contact_information']);
            echo json_encode(array('message' => 'Student updated successfully'));
        } elseif ($data['action'] == 'delete') {
            deleteStudent($data['id']);
            echo json_encode(array('message' => 'Student deleted successfully'));
        }
    } else {
        echo json_encode(array('message' => 'Invalid request'));
    }
}

$conn->close();
?>

