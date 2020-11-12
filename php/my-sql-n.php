<?php
class MySqlN {
  private $conn;
  private $QBARQ_BASE = "SELECT id, title, description, author, likes, img_name ";
  function __construct(){
    $this->conn = new mysqli('localhost', 'root', '', 'qbase');
  }

  function getCategories() {
    $sqlCode = "SELECT * FROM category";
    return $this->getAssoc($sqlCode);
  }
  function getQBarQ(int $limit) {
    $sqlCode = "$this->QBARQ_BASE from qbarq ORDER BY RAND() LIMIT $limit";
    return $this->getAssoc($sqlCode);
  }
  function getQBarQWithCategory(int $limit, int $categoryId) {
    $sqlCode = "$this->QBARQ_BASE from qbarq WHERE category_id = $categoryId ORDER BY RAND() LIMIT $limit";
    return $this->getAssoc($sqlCode);
  }
  function getQBARQByLikes(int $limit) {
    $sqlCode = "$this->QBARQ_BASE from qbarq ORDER BY likes LIMIT $limit";
    return $this->getAssoc($sqlCode);
  }
  function getNewQBARQ(int $limit) {
    $sqlCode = "$this->QBARQ_BASE from qbarq ORDER BY id DESC LIMIT $limit";
    return $this->getAssoc($sqlCode);
  }
  function getQBarQByNamelike(string $namelike, int $limit) {
    $sqlCode = "$this->QBARQ_BASE FROM qbarq WHERE title like '%$namelike%' LIMIT $limit";
    return $this->getAssoc($sqlCode);
  }

  function getRandom(string $tableName, int $limit) {
    
  }

  function getAssoc(string $sqlCode) {
    $result = [];
    $query = $this->conn->query($sqlCode);
    while($assoc = $query->fetch_assoc())
      $result[] = $assoc;
    return $result;
  }

  function __destruct() {
    return $this->conn->close() ? true : false;
  }
}