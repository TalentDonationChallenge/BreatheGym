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
        public function loadPost($no) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "SELECT no, member.email as email, title, nickname, content, writtenTime, hits
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
					'hits' => $row['hits']
				);
				return $post;
			} else{
				return false;
			}
		}
        public function addImage($fileName, $originFileName, $no){
            $table = parent::getTable();
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare("UPDATE {$table} SET picture=1 WHERE no = :postNumber");
            $stmt->execute(array(':postNumber'=>$no));
            $stmt = $pdo->prepare('INSERT INTO pictures(tableName, postNumber, fileName, originFileName)
            VALUES (:tableName, :postNumber, :fileName, :originFileName)');
            $stmt->execute(array(
                ':tableName'=>$table,
                ':postNumber'=>$no,
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
        public function insertVideo($url, $no) {
            $table = parent::getTable();
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare("UPDATE {$table} SET video=1 WHERE no = :postNumber");
            $stmt->execute(array(':postNumber'=>$no));
            $stmt = $pdo->prepare("INSERT INTO videos (tableName, postNumber, url)
            VALUES (:tableName, :postNumber, :url)");
            $stmt->execute(array(
                ':tableName'=>$table,
                ':postNumber'=>$no,
                ':url'=>$url
            ));
            return $pdo->lastInsertId();
        }
        public function loadVideo($no) {
            $table = parent::getTable();
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare("SELECT url FROM videos
                WHERE tableName = :tableName AND postNumber = :postNumber");
            $stmt->execute(array(
                ":tableName"=>$table,
                ":postNumber"=>$no
            ));
            $row = $stmt->fetch();
            return $row['url'];
        }
        public function deleteVideo($no) {
            $table = parent::getTable();
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare("DELETE FROM videos
                WHERE tableName = :tableName AND postNumber = :postNumber");
            $stmt->execute(array(
                ":tableName"=>$table,
                ":postNumber"=>$no
            ));
        }
    }

?>
