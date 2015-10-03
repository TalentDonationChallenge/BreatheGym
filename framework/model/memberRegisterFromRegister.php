<?php

    //회원 가입(register)을 담당하는 함수입니다.
    //isUserExistFromRegisterInfo=>회원 가입이 작성한 Email을 통해 이미 회원가입이 되어있는 멤버인지 체크하는 함수입니다.
    //registerUserToDatabase => 새 회원을 db에 저장하는 함수입니다.
    //userEmail,userPassword,userName,userPhone,userBarcode,userBirthDay,facebook,userSex,registerDate,userNickName,userLevel
    //을 인자로 하여 저장합니다.
    

	class UserRegister {
        public static function isUserExistFromRegisterInfo($userEmail) { 

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
        

    
    }
	
	
	
	

	
	
	





?>