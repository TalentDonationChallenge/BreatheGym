<?php
require_once(__DIR__.'/freeboard.php');
    /**
     * 상담담담
     */
    class Consulting extends Board {
        public function loadReply($origin) {
            $pdo = Database::getInstance();
			$stmt = $pdo->prepare("SELECT content, writtenTime
                FROM consult WHERE reply = :reply");
			$stmt->execute(array(
				':content'=>$content,
                ':reply'=>$origin
			));
            $row = $stmt->fetch();
            $reply = array(
                'content'=>$row['content'],
                'writtenTime'=> date('m/d H:i:s',strtotime($row['writtenTime']))
            );
			return $reply;
        }
        public function insertReply($origin, $content) {
			$pdo = Database::getInstance();
			$stmt = $pdo->prepare("INSERT INTO consulting (content, writtenTime, reply)
				VALUES (:content, NOW(), :reply)");
			$stmt->execute(array(
				':content'=>$content,
                ':reply'=>$content
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
