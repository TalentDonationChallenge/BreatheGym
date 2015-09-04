<?php
    /**
     * 운동기록관리 - 크로스핏
     */
    class MemberCrossfitManagement {

        public static function getCrossfitRankers($exercise) { //기록 상위 5명 불러오기
            $pdo= Database::getInstance();
            if($exercise['type'] === '0'){ //횟수기록
                $stmt = $pdo->prepare("SELECT name, countRecord
                FROM gymMember NATURAL JOIN exerciseRecord
                WHERE exerciseNo=:exerciseNo
                ORDER BY countRecord DESC LIMIT 3");
            } else if($exercise['type'] === '1') { //시간기록
                $stmt = $pdo->prepare("SELECT name, timeRecord
                FROM gymMember NATURAL JOIN exerciseRecord
                WHERE exerciseNo=:exerciseNo
                ORDER BY timeRecord ASC LIMIT 3");
            }
            $stmt->execute(array('exerciseNo'=>$exercise['no']));
            $rows = $stmt->fetchAll();
            $rankers = array();
            foreach ($rows as $row) {
                $rankers[] = $exercise['type']==='0'?array(
                    'name'=>$row['name'],
                    'count'=>$row['countRecord']
                ):array(
                    'name'=>$row['name'],
                    'time'=>$row['timeRecord']
                );
            }
            return $rankers;
        }

        public static function getUserRecord($barcode) {
            $pdo = Database::getInstance();

        }
    }

?>
