<?php
require_once(__DIR__.'/board.php');
    /**
     *
     */
    class ImageBoard extends Board
    {
        function __construct($type) {
            parent::setTable($type);
        }
        public function insertImagePost($email, $title, $content) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "INSERT INTO {$table} (email, title, content, writtenTime, picture)
				VALUES (:email, :title, :content, NOW(), 1)";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(
				':email'=>$email,
				':title'=>$title,
				':content'=>$content
			));
			return $pdo->lastInsertId();
		}
        public function addImage($fileName, $originFileName, $postNumber){
            $table = parent::getTable();
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare('INSERT INTO pictures(tableName, postNumber, fileName, originFileName)
            VALUES (:tableName, :postNumber, :fileName, :originFileName)');
            $stmt->execute(array(
                ':tableName'=>$table,
                ':postNumber'=>$postNumber,
                ':fileName'=>$fileName,
                ':originFileName'=>$originFileName
            ));
        }
        public function loadImages($postNumber) {
            $table = parent::getTable();
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare('SELECT fileName, originFileName FROM pictures
            WHERE tableName = :tableName AND postNumber = :postNumber ORDER BY no DESC');
            $stmt->execute(array(
                ':tableName'=>$table,
                'postNumber'=>$postNumber
            ));
            $rows = $stmt->fetchAll();
            $images = array();
            foreach ($rows as $row){
                $images[] = array(
                    'fileName'=>$row['fileName'],
                    'originFileName'=>$row['originFileName']
                );
            }
            return $images;
        }

    }

?>
