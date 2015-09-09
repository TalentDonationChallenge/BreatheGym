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

        public static function getUserRecord($barcode, $exercise) {
            $pdo = Database::getInstance();
            //유저의 기록
            if($exercise['type'] === '0'){ //횟수기록
                $stmt = $pdo->prepare("SELECT countRecord as record
                FROM gymMember NATURAL JOIN exerciseRecord
                WHERE barcode=:barcode AND exerciseNo=:exerciseNo");
            } else if($exercise['type'] === '1') { //시간기록
                $stmt = $pdo->prepare("SELECT timeRecord as record
                FROM gymMember NATURAL JOIN exerciseRecord
                WHERE barcode=:barcode AND exerciseNo=:exerciseNo");
            }
            $stmt->execute(array(
                'exerciseNo'=>$exercise['no'],
                'barcode'=>$barcode
            ));
            $row = $stmt->fetch();
            $userRecord = $row['record'];
            if(!isset($userRecord)){
                return false;
            }
            //유저의 등수
            if($exercise['type'] === '0'){ //횟수기록
                $stmt = $pdo->prepare("SELECT count(*)+1 as rank
                FROM exerciseRecord
                WHERE exerciseNo=:exerciseNo AND countRecord>:userRecord");
            } else if($exercise['type'] === '1') { //시간기록
                $stmt = $pdo->prepare("SELECT count(*)+1 as rank
                FROM exerciseRecord
                WHERE exerciseNo=:exerciseNo AND timeRecord<:userRecord");
            }
            $stmt->execute(array(
                'exerciseNo'=>$exercise['no'],
                'userRecord'=>$userRecord
            ));
            $row = $stmt->fetch();
            $rank = $row['rank'];

            //전체 숫자
            $stmt = $pdo->prepare("SELECT count(*) as users
            FROM exerciseRecord WHERE exerciseNo=:exerciseNo");
            $stmt->execute(array('exerciseNo'=>$exercise['no']));
            $row = $stmt->fetch();
            $users = $row['users'];
            $percentage = $rank/$users*100;

            $result = array(
                'percentage' => $percentage,
                'record'=>$userRecord
            );
            return $result;
        }
    }

?>
