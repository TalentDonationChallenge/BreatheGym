<?php


	class UserRegister {
        public static function isUserExistFromRegisterInfo($userEmail) { //마감일 구하기
          //  echo "User register";
            $pdo = Database::getInstance();
    		$stmt = $pdo->prepare("SELECT count(*),name FROM member WHERE email = :userEmail");
    		$stmt -> execute(array(
    			':userEmail'=> $userEmail
    		));
    		$row = $stmt -> fetch();
            $isUserExist = $row['count(*)'];

            return $isUserExist;
        }

       public static function registerUserToDatabase($userEmail,$userPassword,$userName,$userPhone,$userBarcode,$userBirthDay,$facebook,$userSex,$registerDate,$userNickName,$userLevel) { //마감일 구하기
            $pdo = Database::getInstance();
    		$stmt = $pdo->prepare("INSERT INTO member (email, password, name, phone, barcode,birthday,facebook,sex,registerDate,nickname,level)
            VALUES (:email, :password, :name, :phone, :barcode, :birthday, :facebook, :sex, :registerDate, :nickname, :level)");

            $stmt->execute(array(
                    ":email"=>$userEmail,
                    ":password"=>sha1($userPassword) ,
                    ":name"=>$userName,
                    ":phone"=>$userPhone,
                    ":barcode"=>$userBarcode,
                    ":birthday"=>$userBirthDay,
                    ":facebook"=>$facebook,
                    ":sex"=>$userSex,
                    ":registerDate"=>$registerDate,
                    ":nickname"=>$userNickName,
                    ":level"=>$userLevel
                ));
        }
        

        //연속출석같은 경우, 공휴일이나 여기 쉬는날은 어떻게해?!
        //출석률도 좀 이상할것같고... ㅠㅠ

    }
	
	
	
	

	
	
	



	/*$stmt = $pdo->prepare("INSERT INTO member (email, password, name, phone, barcode,birthday,facebook,sex,registerDate,nickname,level)
			VALUES (:email, :password, :name, :phone, :barcode, :birthday, :facebook, :sex, :registerDate, :nickname, :level)");

	$stmt->execute(array(
			":email"=>$email,
			":password"=>$password ,
			":name"=>$name,
			":phone"=>$phone,
			":barcode"=>$barcode,
			":birthday"=>$birthday,
			":facebook"=>$facebook,
			":sex"=>$sex,
			":registerDate"=>$registerDate,
			":nickname"=>$nickname,
			":level"=>$level
		));*/

?>