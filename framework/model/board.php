<?php
	/**
	* 한번 객체지향처럼 짜보도록 하겠다
	*/
	class Board {
		private $table; //위험하긴한데 이게 코드를 줄이는 방법이기도 하고... 흠
		function __construct($type) {
			$this->table = $type;
		}

		public function insertPost($email, $title, $content) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "INSERT INTO {$table} (email, title, content, writtenTime)
				VALUES (:email, :title, :content, NOW())";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(
				':email'=>$email,
				':title'=>$title,
				':content'=>$content
			));
			return $pdo->lastInsertId();
		}

		public function deletePost($no) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "DELETE FROM {$table} WHERE no = :no";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(':no' => $no));
		}

		public function loadPostList($page) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "SELECT no, title, nickname, writtenTime
			FROM {$table} JOIN member ON {$table}.email = member.email
			ORDER BY no DESC LIMIT 15 OFFSET :offset";
			$stmt = $pdo->prepare($sql);
			$offset = ($page-1)*15;
			$stmt->bindParam(":offset", $offset , PDO::PARAM_INT);
			$stmt->execute();
			$rows = $stmt->fetchAll();

			$posts = array();

			foreach ($rows as $row) {
				$posts[] = array(
					'no' => $row['no'],
					'title' => $row['title'],
					'nickname' => $row['nickname'],
					'writtenTime' => date('m/d H:i:s',strtotime($row['writtenTime']))
				);
			}
			return $posts;
		}

		public function loadPost($no) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "SELECT no, title, nickname, content, writtenTime
			FROM {$table} JOIN member ON {$table}.email = member.email
			WHERE no =:no";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(':no' => $no));
			$row = $stmt->fetch();
			if($row){
				$post = array(
					'no' => $row['no'],
					'title' => $row['title'],
					'content'=>$row['content'],
					'nickname' => $row['nickname'],
					'writtenTime' => date('Y/m/d H:i:s',strtotime($row['writtenTime']))
				);
				return $post;
			} else{
				return false;
			}
		}

		public function editPost($no, $title, $content) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "UPDATE {$table} SET title=:title,
			content = :content, writtenTime = NOW() WHERE no = :no";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(
				':title'=>$title,
				':content'=>$content,
				':no'=>$no
			));
			return $pdo->lastInsertId();
		}

		public function pageCount() {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "SELECT count(no)/15 as pages FROM {$table}";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			$row = $stmt->fetch();
			return ceil($row['pages']);
		}

        public function addHitCounter($no, $hits) {
        	$table = $this->table;
        	$pdo = Database::getInstance();
        	$sql = "UPDATE {$table} SET hit = :hit WHERE no = :no";
        	$stmt = $pdo->prepare($sql);
        	$stmt->execute(array(
        		':hit' => $hits+1,
        		':no' => $no
        	));
        	return $pdo->lastInsertId();
        }

		public function loadComments($no) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "SELECT name, content, writtenTime
			FROM {$comments} WHERE table = :table and no = :no";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(
				':table' => $table
				':no' => $no
			));
			$rows = $stmt->fetchAll();
			$posts = array();

			foreach ($rows as $row) {
				$posts[] = array(
					'name' => $row['name'],
					'content' => $row['content'],
					'writtenTime' => date('m/d H:i:s',strtotime($row['writtenTime']))
				);
			}
			return $posts;
		}

		public function submitComments($name, $content, $table, $postNumber) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "INSERT INTO {$table} (tableName, postNumber, name, content, writtenTime)
				VALUES (:table, :postNumber, :name, :content, NOW())";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(
				':table'=>$table,
				':postNumber'=>$postNumber,
				':name'=>$name,
				':content'=>$content
			));
			return $pdo->lastInsertId();
		}
	}
?>
