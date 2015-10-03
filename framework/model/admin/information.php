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
    }
    public static function attendTimeStatistics() { // 시간대별 출석 회원수 (어제)
        // 10시부터 2시, 2시부터 6시, 6시부터 11시로 나눠서 그룹바이 이용해서 리턴좀
    }
    public static function monthlyGymMemberCount() { // 월별 전체 회원수
        //이건 어떻게 구하냐.. ㅠㅠ
    }
}
 ?>
