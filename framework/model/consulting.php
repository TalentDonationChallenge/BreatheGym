<?php
require_once(__DIR__.'/board.php');
    /**
     * 상담담담
     */
    class Consulting extends Board {
        function __construct() {
            parent::setTable('consulting');
        }
        public function loadConsultingList($page) {
			$pdo = Database::getInstance();
			$sql = "SELECT no, title, nickname, writtenTime
			FROM consulting NATURAL JOIN member
			WHERE reply=0 ORDER BY no DESC LIMIT 15 OFFSET :offset";
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

        public function loadReply($origin) {
            $pdo = Database::getInstance();
			$stmt = $pdo->prepare("SELECT title, content, writtenTime
                FROM consulting WHERE reply = :reply");
			$stmt->execute(array(
                ':reply'=>$origin
			));
            $row = $stmt->fetch();
            if($row){
                $reply = array(
                    'title'=>$row['title'],
                    'content'=>$row['content'],
                    'writtenTime'=> date('m/d H:i:s',strtotime($row['writtenTime']))
                );
    			return $reply;
            } else {
                return false;
            }
        }
        public function insertReply($origin, $content) {
			$pdo = Database::getInstance();
			$stmt = $pdo->prepare("INSERT INTO consulting (email, content, writtenTime, reply)
				VALUES (:email, :content, NOW(), :reply)");
			$stmt->execute(array(
                ':email'=>'master@gmail.com',//관리자메일
				':content'=>$content,
                ':reply'=>$origin
			));
			return $pdo->lastInsertId();
        }

        public function editReply($no, $content) {
            $pdo = Database::getInstance();
			$stmt = $pdo->prepare("UPDATE consulting SET
			content = :content, writtenTime = NOW() WHERE no = :no");
			$stmt->execute(array(
				':content'=>$content,
				':no'=>$no
			));
			return $pdo->lastInsertId();
        }
    }
?>
