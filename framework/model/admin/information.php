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

    public static function visitorCount() {

    }

    public static function endedMembers() {
        $pdo = Database::getInstance();

    }
    public static function monthlyJoinedMember() {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT count(email) as count, registerDate
        FROM member WHERE registerDate > :month
        GROUP BY extract(YEAR_MONTH FROM registerDate)");
        $recentMonth = date('Y-m-d',strtotime('-6 month'));

    }
}
 ?>
