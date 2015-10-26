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
        public function insertImagePost($email, $title, $content, $image, $video) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "INSERT INTO {$table} (email, title, content, writtenTime, picture, video)
				VALUES (:email, :title, :content, NOW(), :picture, :video)";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(
				':email'=>$email,
				':title'=>$title,
				':content'=>$content,
                ':picture'=>$image,
                ':video'=>$video
			));
			return $pdo->lastInsertId();
		}
        public function loadPost($no) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "SELECT no, member.email as email, title, nickname, content, writtenTime, hits, video
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
                    'video' => $row['video']
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
        public function insertVideo($url, $no) {
            $table = parent::getTable();
            $pdo = Database::getInstance();
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
    }

?>
