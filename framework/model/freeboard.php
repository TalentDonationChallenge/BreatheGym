<?php 
	/**
	* 한번 객체지향처럼 짜보도록 하겠다 
	*/
	class Board {
		private $table; //위험하긴한데 이게 코드를 줄이는 방법이기도 하고... 흠
		function __construct($type)
		{
			printf($type);
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

		public function loadPostList($no, $page) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "SELECT no, title, nickname
			FROM {$table} JOIN member ON {$table}.email = memeber.email
			ORDER BY no DESC LIMIT 30 OFFSET :offset";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(':offset' => ($page-1)*30));
			$rows = $stmt->fetchAll();

			$posts = array();

			foreach ($rows as $row) {
				$posts[] = array(
					'no' => $row['no'],
					'title' => $row['title'],
					'nickname' => $row['nickname']
				);
			}
			return $posts;
		}

		public function loadPost($no) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "SELECT no, title, nickname, content, writtenTime
			FROM {$table} JOIN member ON no = :no";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(':no' => $no));
			$row = $stmt->fetch();

			$post = array(
				'no' => $row['no'],
				'title' => $row['title'],
				'nickname' => $row['nickname'],
				'writtenTime' => $row['writtenTime']
			);
			return $post;
		}

		public function editPost($no, $title, $content) {
			$table = $this->table;
			$pdo = Database::getInstance();
			$sql = "UPDATE {$table} SET title=:title, content = :content, writtenTime = NOW()
			WHERE no = :no"; 
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(
				':title'=>$title,
				':content'=>$content,
				':no'=>$no
			));
			return $pdo->lastInsertId();
		}
	}
?>