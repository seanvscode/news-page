<?php
class News {
    private $conn;
    private $table_name = "news";
    
    public $id;
    public $title;
    public $summary;
    public $content;
    public $category;
    public $author;
    public $event_date;
    public $image_url;
    public $created_at;
    public $updated_at;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    // Read all news
    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    // Read one news item
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->title = $row['title'];
            $this->summary = $row['summary'];
            $this->content = $row['content'];
            $this->category = $row['category'];
            $this->author = $row['author'];
            $this->event_date = $row['event_date'];
            $this->image_url = $row['image_url'];
            $this->created_at = $row['created_at'];
            $this->updated_at = $row['updated_at'];
            return true;
        }
        return false;
    }
    
    // Create news
    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                  SET title=:title, summary=:summary, content=:content, 
                      category=:category, author=:author, event_date=:event_date, 
                      image_url=:image_url";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize inputs
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->summary = htmlspecialchars(strip_tags($this->summary));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->category = htmlspecialchars(strip_tags($this->category));
        $this->author = htmlspecialchars(strip_tags($this->author));
        
        // Bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":summary", $this->summary);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":category", $this->category);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":event_date", $this->event_date);
        $stmt->bindParam(":image_url", $this->image_url);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    // Update news
    public function update() {
        $query = "UPDATE " . $this->table_name . "
                  SET title = :title, summary = :summary, content = :content,
                      category = :category, author = :author, event_date = :event_date,
                      image_url = :image_url
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        // Sanitize inputs
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->summary = htmlspecialchars(strip_tags($this->summary));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->category = htmlspecialchars(strip_tags($this->category));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->id = htmlspecialchars(strip_tags($this->id));
        
        // Bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":summary", $this->summary);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":category", $this->category);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":event_date", $this->event_date);
        $stmt->bindParam(":image_url", $this->image_url);
        $stmt->bindParam(":id", $this->id);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    // Delete news
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    // Search news
    public function search($keywords) {
        $query = "SELECT * FROM " . $this->table_name . "
                  WHERE title LIKE ? OR content LIKE ? OR summary LIKE ?
                  ORDER BY created_at DESC";
        
        $stmt = $this->conn->prepare($query);
        $keywords = htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
        
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);
        
        $stmt->execute();
        return $stmt;
    }
    
    // Get news by category
    public function getByCategory($category) {
        $query = "SELECT * FROM " . $this->table_name . "
                  WHERE category = :category
                  ORDER BY created_at DESC";
        
        $stmt = $this->conn->prepare($query);
        $category = htmlspecialchars(strip_tags($category));
        $stmt->bindParam(":category", $category);
        $stmt->execute();
        return $stmt;
    }
}
?>