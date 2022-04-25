<?php
class Page {
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function createPage() {
    $sql = "INSERT INTO
              pages (page_title, page_label, page_slug, page_content, page_created)
            VALUES
              (?, ?, ?, ?, NOW())";

    $stmt = $this->db->pdo->prepare($sql);

    $stmt->bindParam(1, escape($_POST['title']));
    $stmt->bindParam(2, escape($_POST['label']));
    $stmt->bindParam(3, escape($_POST['slug']));
    $stmt->bindParam(4, escape($_POST['content']));

    if($stmt->execute()) {
      return true;
    }

    return false;
  }

  public function readPages() {
    $sql = "SELECT * FROM pages ORDER BY page_created DESC";

    $stmt = $this->db->pdo->prepare($sql);

    if($stmt->execute()) {
      return $stmt->fetchAll();
    }

    return false;
  }

  public function readPage($page) {
    $sql = "SELECT * FROM pages WHERE page_slug = ?";

    $stmt = $this->db->pdo->prepare($sql);

    $stmt->bindParam(1, $page);

    if($stmt->execute()) {
      return $stmt->fetch();
    }

    return false;
  }

  public function updatePage($page) {
    $sql = "UPDATE
              pages
            SET
              page_title = ?,
              page_label = ?,
              page_slug = ?,
              page_content = ?,
              page_updated = NOW()
            WHERE
              page_slug = ?";
    
    $stmt = $this->db->pdo->prepare($sql);

    $stmt->bindParam(1, escape($_POST['title']));
    $stmt->bindParam(2, escape($_POST['label']));
    $stmt->bindParam(3, escape($_POST['new_slug']));
    $stmt->bindParam(4, escape($_POST['content']));
    $stmt->bindParam(5, $page);

    if($stmt->execute()) {
      return true;
    }

    return false;
  }

  public function deletePage($page) {
    $sql = "DELETE FROM pages WHERE page_slug = ?";

    $stmt = $this->db->pdo->prepare($sql);

    $stmt->bindParam(1, $page);
    
    if($stmt->execute()) {
      return true;
    }

    return false;
  }
}