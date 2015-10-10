<?php /**
 * 관리자메뉴 대쉬보드용 모델
 */
class AdminInformation {
    public static function pageMemberCount() {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT count(barcode) as count FROM gymMember");
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['count'];
    }

    public static function attendanceCount(){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT count(barcode) as count FROM attendance WHERE date=:date");
        $stmt->execute(array('date'=>date('Y-m-d')));
        $row = $stmt->fetch();
        return $row['count'];
    }

    public static function recentlyJoinedMember(){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT count(email) as count
        FROM member WHERE registerDate >= :month");
        $recentMonth = date('Y-m-d',strtotime('-1 month'));
        $stmt->execute(array('month'=>$recentMonth));
        $row = $stmt->fetch();
        return $row['count'];
    }

    public static function endedMembers() { // 1주일 동안 만료될 사람들!
        $pdo = Database::getInstance();
        $oneWeekAgo = strtotime('Y-m-d', "-1 week");
        $today = getdate();

        $stmt = $pdo->prepare("SELECT name, registerDate, duration FROM gymMember WHERE active = 1");
        $stmt->execute();
        $rows = $stmt->fetch();

        $memberArray = array();
        foreach ($rows as $row) {
            $registerDate = date('Y-m-d', strtotime($row['registerDate']));
            $duration = $row['duration'];
            $expireDate = date_modify($registerDate, "$duration months");
            if (($expireDate <= $today) && ($expireDate > $oneWeekAgo)) {
                $memberArray[] = array(
                    'name'=>$row['name'],
                    'expireDate'=>$expireDate);
            }
        }
        return $memberArray;
    }
    public static function monthlyJoinedMemberCount() {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('SELECT count(email) as count,
        date_format(registerDate, "%m") as month
        FROM member WHERE registerDate > :month
        GROUP BY extract(YEAR_MONTH FROM registerDate)
        ORDER BY registerDate ASC');
        $sixMonthAgo = date('Y-m-d',strtotime('-5 month'));
        $stmt->execute(array('month'=>$sixMonthAgo));
        $rows = $stmt->fetchAll();
        $count = array();
        foreach ($rows as $row) {
            $count[] = array(
                'count'=>$row['count'],
                'month'=>$row['month']
            );
        }
        return $count;
    }
    public static function dailyAttendMemberCount() { // 이부분 코딩점
        // 지난 일주일간 출석 회원수 count 이건 쉽지
        $pdo = Database::getInstance();
        $sevenDaysAgo = date('Y-m-d', strtotime('-5 day')); // 2015-10-05
        $stmt = $pdo->prepare("SELECT count(barcode) FROM attendance WHERE date > :day");
        $stmt->execute(array(':day'=>$sevenDaysAgo));
        $rows = $stmt->fetchAll();

        return $rows['count(barcode)']; // 두번 출석하면 두번온걸로 되긴 하지만 조회수 조사하고 그런거 보면 여러번 방문해도 다 체크 되니까 이렇게 짜놓음
    }
    public static function attendTimeStatistics() { // 시간대별 출석 회원수 (어제)
        // 10시부터 2시, 2시부터 6시, 6시부터 11시로 나눠서 그룹바이 이용해서 리턴좀
        $pdo = Database::getInstance();
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $today = getdate();
        $morningTime = date_time_set($yesterDay, 10, 00);
        $afternoonTime = date_time_set($yesterDay, 14, 00);
        $eveningTime = date_time_set($yesterDay, 18, 00);

        $morningCounter = 0;
        $afternoonCounter = 0;
        $eveningCounter = 0;

        $stmt = $pdo->prepare("SELECT date FROM attendance WHERE date >:yesterday AND date < :today");
        $stmt->execute(array(':yesterday'=>$yesterday,
            ':today'=>$today));
        $rows = $stmt->fetchAll();
        
        foreach($rows as $row) {
            $currentTime = $row['date'];
            if ($currentTime > $eveningTime) {
                $eveningCounter++;
            } else if ($currentTime > $afternoonTime) {
                $afternoonCounter++;
            } else {
                $morningCounter++;
            }
        }
        
        return array($morningCounter, $afternoonCounter, $eveningCounter);
    }
    public static function monthlyGymMemberCount() { // 월별 전체 회원수
        $pdo = Database::getInstance();
        
        $sixMonthAgo = date('Y-m-d', strtotime("-6 month"));
        $fiveMonthAgo = date('Y-m-d', strtotime("-5 month"));
        $fourMonthAgo = date('Y-m-d', strtotime("-4 month"));
        $threeMonthAgo = date('Y-m-d', strtotime("-3 month"));
        $twoMonthAgo = date('Y-m-d', strtotime("-2 month"));
        $oneMonthAgo = date('Y-m-d', strtotime("-1 month"));
        
        $stmt = $pdo->prepare("SELECT registerDate, duration FROM gymMember");
        $stmt->execute();
        $rows = $stmt->fetchAll();

        $sixMonthAgoCounter = 0;
        $fiveMonthAgoCounter = 0;
        $fourMonthAgoCounter = 0;
        $threeMonthAgoCounter = 0;
        $twoMonthAgoCounter = 0;
        $oneMonthAgoCounter = 0;

        foreach($rows as $row) {
            $registerDate = date('Y-m-d', strtotime($row['registerDate']));
            $duration = $row['duration'];
            $expireDate = date_modify($registerDate, "$duration months");
            if ($expireDate > $oneMonthAgo) {
                $oneMonthAgoCounter++;
            } else if ($expireDate > $twoMonthAgo) {
                $twoMonthAgoCounter++;
            } else if ($expireDate > $threeMonthAgo) {
                $threeMonthAgoCounter++;
            } else if ($expireDate > $fourMonthAgo) {
                $fourMonthAgoCounter++;
            } else if ($expireDate > $fiveMonthAgo) {
                $fiveMonthAgoCounter++;
            } else if ($expireDate > $sixMonthAgo) {
                $sixMonthAgoCounter++;
            }
        }
        return array($oneMonthAgoCounter, $twoMonthAgoCounter, $threeMonthAgoCounter, $fourMonthAgoCounter, $fiveMonthAgoCounter, $sixMonthAgoCounter);
    }
}
 ?>