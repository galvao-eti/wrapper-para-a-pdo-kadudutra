<?php
/**
 * @var \Turma3\Config $config
 */

namespace Turma3;

//use Turma3\Config;

class wrapperCategory
{
    public $dbh;

    /**
     * wrapperCategory constructor.
     */
    public function __construct()
    {
        // TODO: Implement __construct() method.

        $config = new Config('mysql', 'database', 'turma3', 'admin', 'root');
        $this->dbh = new Base($config);
    }

    /**
     * wrapperCategory destructor.
     */
    public function __destruct()
    {
        $this->dbh->disconnect();
    }

    /**
     * @param String $category
     */
    public function addCategory($category)
    {
        $sql = "INSERT INTO categoria (nome) VALUES (:val)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':val', $category, \PDO::PARAM_STR);
        $stmt->execute();
    }

    /**
     * @return array
     */
    public function listCategory()
    {
        $sql = "SELECT * FROM categoria";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * @param int $id
     * @return array
     */
    public function getCategory($id)
    {
        $sql = "SELECT * FROM categoria WHERE id = :id LIMIT 1";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * @param int $id
     * @param String $category
     */
    public function updateCategory($id, $category)
    {
        $sql = "UPDATE categoria SET nome = :category WHERE id = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':category', $category, \PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, \PDO::PARAM_STR);
        $stmt->execute();
    }

    /**
     * @param int $id
     */
    public function deleteCategory($id)
    {
        $sql = "DELETE FROM categoria WHERE id = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_STR);
        $stmt->execute();
    }
}

