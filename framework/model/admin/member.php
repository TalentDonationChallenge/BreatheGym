<?php
    /**
     * 관리자메뉴 - 회원관리
     */
    class MemberManagemant {
        public static function getPageMembers($filter) {

        }
        public static function getGymMembers($filter) {
            $pdo = Database::getInstance();
            if(isset($filter['branch'])) {
                $branch = $filter['branch'];
                if(isset($filter['name'])){
                    $stmt = $pdo->prepare("SELECT barcode, name, phone, registerDate, duration
                    FROM gymMember WHERE branch=:branch AND name=:name");
                    $stmt->execute(array('branch'=>$branch, 'name'=>$filter['name']));
                } else if(isset($filter['barcode'])) {
                    $stmt = $pdo->prepare("SELECT barcode, name, phone, registerDate, duration
                    FROM gymMember WHERE branch=:branch AND barcode=:barcode");
                    $stmt->execute(array('branch'=>$branch, 'barcode'=>$filter['barcode']));
                } else {
                    $stmt = $pdo->prepare("SELECT barcode, name, phone, registerDate, duration
                    FROM gymMember WHERE branch=:branch");
                    $stmt->execute(array('branch'=>$branch));
                }
                $rows = $stmt->fetchAll();
                $gymMembers = array();
                foreach ($rows as $row) {
                    $durationDate = date('m월 d일',
                        strtotime('+'.$row['duration'].' month',
                        strtotime($row['registerDate'])));
                    $gymMembers[] = array(
                        'barcode' => $row['barcode'],
                        'name'=> $row['name'],
                        'phone'=> $row['phone'],
                        'durationDate'=> $durationDate
                    );
                }
                return $gymMembers;
            } else {
                //에러!
            }
        }
        public static function getPageMemberInfo($email){

        }

        public static function getGymMemberInfo($barcode){
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare("SELECT name, phone, birthday, sex, height, weight,
                registerDate, duration, branch FROM gymMember WHERE barcode=:barcode");
            $stmt->execute(array('barcode'=>$barcode));
            $row = $stmt->fetch();
            $registerDate = strtotime($row['registerDate']);
            $durationDate = date('m월 d일',
                strtotime('+'.$row['duration'].' month',
                strtotime($row['registerDate'])));
            $sex=$row['sex']==='0'?'남자':'여자';
            $gymMemberInfo = array(
                'name'=> $row['name'],
                'phone'=> $row['phone'],
                'birthday'=>$row['birthday'],
                'sex'=> $sex,
                'height'=>$row['height'],
                'weight'=>$row['weight'],
                'registerDate'=> date('m월 d일', $registerDate),
                'durationDate'=> $durationDate
            );
            return $gymMemberInfo;
        }
    }
?>
