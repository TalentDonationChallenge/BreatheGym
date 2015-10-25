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
        public function loadPost($no) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "SELECT no, member.email as email, title, nickname, content, writtenTime, hits, picture
			FROM {$table} JOIN member ON {$table}.email = member.email
			WHERE no =:no";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(':no' => $no));
			$row = $stmt->fetch();
			if($row){
				$post = array(
					'no' => $row['no'],
					'email' => $row['email'],
					'title' => $row['title'],
					'content'=>$row['content'],
					'nickname' => $row['nickname'],
					'writtenTime' => date('Y/m/d H:i:s',strtotime($row['writtenTime'])),
					'hits' => $row['hits'],
                    'picture' => $row['picture']
				);
				return $post;
			} else{
				return false;
			}
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

        public function loadImages($no) {
            $table = parent::getTable();
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare('SELECT no, fileName, originFileName FROM pictures
            WHERE tableName = :tableName AND postNumber = :postNumber ORDER BY no DESC');
            $stmt->execute(array(
                ':tableName'=>$table,
                'postNumber'=>$no
            ));
            $rows = $stmt->fetchAll();
            $images = array();
            foreach ($rows as $row){
                $images[] = array(
                    'no'=>$row['no'],
                    'fileName'=>$row['fileName'],
                    'originFileName'=>$row['originFileName']
                );
            }
            return $images;
        }

        public function deleteImages($no) {
            $table = parent::getTable();
            $pdo = Database::getInstance();
			$sql = "SELECT fileName FROM pictures
            WHERE tableName = :tableName AND postNumber = :no";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(
                ':tableName'=>$table,
                ':no' => $no
            ));
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                $filename = $row['fileName'];
                unlink('upload/files/'.$filename);
                unlink('upload/files/thumbnail/'.$filename);
            }
            $sql = "DELETE FROM pictures
            WHERE tableName = :tableName AND postNumber = :no";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':tableName'=>$table,
                ':no' => $no
            ));
        }

    }

?>
