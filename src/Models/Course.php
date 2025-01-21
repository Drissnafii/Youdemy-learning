<?php
require __DIR__ . '/../../config/database.php';

class Course {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAllCategories() {
        try {
            $query = "SELECT * FROM categories";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching categories: " . $e->getMessage());
        }
    }

    public function getAllTags() {
        try {
            $query = "SELECT * FROM tags";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching tags: " . $e->getMessage());
        }
    }
    public function createCourse($title, $description, $categoryID, $teacherID, $videoLink) {
        try {
            $query = "INSERT INTO Courses (Title, Description, CategoryID, TeacherID, VideoLink)
                      VALUES (:title, :description, :categoryID, :teacherID, :videoLink)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                'title' => $title,
                'description' => $description,
                'categoryID' => $categoryID,
                'teacherID' => $teacherID,
                'videoLink' => $videoLink,
            ]);
            return true;
        } catch (PDOException $e) {
            throw new Exception("Error creating course: " . $e->getMessage());
        }
    }
    public function getCourses($teacherID) {
        try {
            $query = "SELECT * FROM Courses WHERE TeacherID = :teacherID";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(['teacherID' => $teacherID]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error fetching courses: " . $e->getMessage());
        }
    }
public function getVideoLink($courseID) {
    $query = "SELECT VideoLink FROM courses WHERE CourseID = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$courseID]);
    $result = $stmt->fetch();
    return $result ? $result['VideoLink'] : null;
}
}