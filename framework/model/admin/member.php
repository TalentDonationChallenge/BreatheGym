<?php
    /**
     * 관리자메뉴 - 회원관리
     */
    class MemberManagemant {
        public static function getPageMembers($filter) {
            $pdo = Database::getInstance();
            if (isset($filter['email'])) {
                $stmt = $pdo->prepare("SELECT email, name, nickname, sex, registerDate FROM member
                WHERE email=:email");
                $stmt->execute(array('email'=>$filter['email']));
            } else if (isset($filter['name'])) {
                $stmt = $pdo->prepare("SELECT email, name, nickname, sex, registerDate FROM member
                WHERE name=:name");
                $stmt->execute(array('name'=>$filter['name']));
            } else {
                $stmt = $pdo->prepare("SELECT email, name, nickname, sex, registerDate FROM member");
                $stmt->execute();
            }
            $rows = $stmt->fetchAll();
            $pageMembers = array();
            foreach ($rows as $row) {
                $pageMembers[] = array(
                    'email'=>$row['email'],
                    'name'=>$row['name'],
                    'nickname'=>$row['nickname'],
                    'sex'=>$row['sex']=='0'?'남자':'여자',
                    'registerDate'=>date('Y년 m월 d일', strtotime($row['registerDate']))
                );
            }
            return $pageMembers;
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
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare("SELECT email, name, nickname, sex, registerDate, barcode FROM member
            WHERE email=:email");
            $stmt->execute(array('email'=>$email));
            $row = $stmt->fetch();
            $sex=$row['sex']==='0'?'남자':'여자';
            $pageMemberInfo = array(
                'email'=>$row['email'],
                'name'=>$row['name'],
                'nickname'=>$row['nickname'],
                'sex'=>$sex,
                'registerDate'=>$row['registerDate'],
                'barcode'=>$row['barcode']
            );
            return $pageMemberInfo;
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
                'durationDate'=> $durationDate,
                'branch'=>$row['branch']
            );
            return $gymMemberInfo;
        }
    }
?>
