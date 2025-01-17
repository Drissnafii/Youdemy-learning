<?php
require __DIR__ . '/../Models/User.php';
class Admin extends User {
    public function sendTag($Tag) {
    $conn = new PDO('mysql:host=localhost;dbname=youdemy_db;', 'root', '');
    $sql = "INSERT INTO tags (Name) 
        VALUES (:Name)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([
    ':Name'=>$Tag
        ]); 
    }

    public function readTag() {
    $conn = new PDO('mysql:host=localhost;dbname=youdemy_db;', 'root', '');
    $sql = "SELECT * FROM tags";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $Tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $Tags;
    }

    public function deleteTag($x) {
        $conn = new PDO ('mysql:host=localhost;dbname=youdemy_db;', 'root', '');
        $query = "DELETE FROM tags WHERE TagID = :id";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            'id' => $x
        ]);
        header('location: create-tag.php');
    }

    public function sendCatego($Name, $Description) {
        $conn = new PDO('mysql:host=localhost;dbname=youdemy_db;', 'root', '');
        $sql = "INSERT INTO categories (Name, Description) 
            VALUES (:Name, :Description)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([
        ':Name'=>$Name,
        ':Description'=>$Description
            ]); 
        }

        // Update Category
        public function upgateCatego($Name, $Description, $id) {
            $conn = new PDO('mysql:host=localhost;dbname=youdemy_db;', 'root', '');
            $sql = "UPDATE categories
                  SET  Name = :Name , Description = :Description 
                   WHERE CategoryID = :id";
            $stmt= $conn->prepare($sql);
            $stmt->execute([
            ':Name'=>$Name,
            ':Description'=>$Description, 
             ':id'=> $id
                ]); 
            }
    
        public function readCatego() {
            $conn = new PDO('mysql:host=localhost;dbname=youdemy_db;', 'root', '');
            $sql = "SELECT * FROM categories";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $categories;
            }
            
            public function readOneCatego($id) {
                $conn = new PDO('mysql:host=localhost;dbname=youdemy_db;', 'root', '');
                $sql = "SELECT * FROM categories WHERE CategoryID = :id";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'id' => $id
                ]);
                $categories = $stmt->fetch(PDO::FETCH_OBJ);
                return $categories;
            }
    
        public function deleteCatego($y) {
            $conn = new PDO ('mysql:host=localhost;dbname=youdemy_db;', 'root', '');
            $query = "DELETE FROM categories WHERE CategoryID = :id";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                'id' => $y
            ]);
            header('location: create-category.php');
        }

        public function editCatego() {
            $conn = new PDO ('mysql:host=localhost;dbname=youdemy_db;', 'root', '');

        }

}