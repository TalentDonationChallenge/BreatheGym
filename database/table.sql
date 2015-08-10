-- 외래키 사용시 reference가 되는 테이블은 먼저 생성하고 나중에 없앤다

drop table if exists exerciseRecord;
drop table if exists attendance;
drop table if exists achievement;
drop table if exists consulting;
drop table if exists breatheBoard;
drop table if exists freeBoard;
drop table if exists diaryBoard;
drop table if exists member;
drop table if exists exerciseList;
drop table if exists boxingList;
drop table if exists boxingLevel;
drop table if exists gymMember;

create table gymMember(
	barcode varchar(30) primary key,
	name varchar(30) not null,
	phone varchar(12),
	birthday date,
	sex int(1) not null,
	height int(3) not null,
	weight int(3) not null,
	registerDate date not null,
	duration int(3) not null,
	branch int(1) not null default 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table member(
	email varchar(50) not null primary key,
	password varchar(50),
	name varchar(30) not null,
	phone varchar(12),
	barcode varchar(30),
	birthday date,
	facebook int(1) not null,
	sex int(1) not null,
	registerDate date,
	nickname varchar(30) not null unique,
	active int(1) not null,
	foreign key (barcode) references gymMember(barcode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table attendance(
	barcode varchar(30) not null,
	date datetime not null,
	foreign key (barcode) references gymMember(barcode),
	primary key(barcode, date)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table achievement(
	email varchar(50),
	name varchar(50) not null,
	foreign key (email) references member(email),
	primary key(email, name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table exerciseList(
	no int(6) not null primary key AUTO_INCREMENT,
	name varchar(20) not null,
	date date not null,
	type int(1) not null, -- 일정시간동안 세트수 0, 일정세트 하는데 걸린시간 1
	time time default 0,
	count int(3) default 0,
	memo text default ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table exerciseRecord(
	barcode varchar(30) not null,
	exerciseNo int(6) not null,
	timeRecord time,
	countRecord int(3),
	foreign key (barcode) references gymMember(barcode),
	foreign key (exerciseNo) references exerciseList(no),
	primary key(barcode, exerciseNo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table consulting(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null,
	title varchar(50) not null,
	content text not null,
	writtenTime datetime not null,
	foreign key (email) references member(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 브리드 이야기
create table breatheBoard(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null,
	title varchar(50) not null,
	content text not null,
	writtenTime datetime not null,
	foreign key (email) references member(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

create table freeBoard(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null,
	title varchar(50) not null,
	content text not null,
	writtenTime datetime not null,
	foreign key (email) references member(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 사부님의 노트
create table diaryBoard(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null,
	title varchar(50) not null,
	content text not null,
	writtenTime datetime not null,
	foreign key (email) references member(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 복싱 진도 DB
create table boxingList(
	no int(6) not null primary key AUTO_INCREMENT,
	name varchar(20) not null,
	youtubeSrc varchar(50) not null,
	description varchar(200) not null,
	summary varchar(100) not null,
	photo mediumblob not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 개인별 복싱 진도
create table boxingLevel(
	barcode varchar(30) primary key,
	no int(6) not null,
	foreign key (barcode) references gymMember(barcode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
