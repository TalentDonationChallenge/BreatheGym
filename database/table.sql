drop table if exists member;
drop table if exists gymMember;
drop table if exists exerciseRecord;
drop table if exists attendance;
drop table if exists achievement;
drop table if exists exerciseSchedule;
drop table if exists consulting;
drop table if exists breatheBoard;
drop table if exists freeBoard;
drop table if exists diaryBoard;
drop table if exists exerciseList;


create table gymMember(
	barcode varchar(30) primary key,
	name varchar(30) not null unique,
	phone varchar(12),
	birthday date,
	sex int(1) not null,
	height int(3) not null,
	weight int(3) not null,
	registerDate date not null,
	duration date not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table member(
	email varchar(50) not null primary key,
	password varchar(50),
	name varchar(30) not null unique,
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


create table exerciseRecord(
	barcode varchar(30),
	name varchar(20),
	type int(1),
	timeRecord time,
	countRecord int(3),
	date date,
	primary key(barcode, name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table attendance(
	barcode varchar(30) primary key,
	date datetime not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table achievement(
	email varchar(50) primary key
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table exerciseList(
	no int(6) not null primary key AUTO_INCREMENT,
	name varchar(20) not null,
	type int(1) not null, -- 일정시간동안 세트수 0, 일정세트 하는데 걸린시간 1
	time time default 0,
	count int(3) default 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table exerciseSchedule(
	exerciseNo int(6) not null,
	date date,
	foreign key (exerciseNo) references exerciseList(no) on delete cascade,
	primary key (exerciseNo, date)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table consulting(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null,
	title varchar(50) not null,
	content text not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 브리드 이야기
create table breatheBoard(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null,
	title varchar(50) not null,
	content text not null	
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

create table freeBoard(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null,
	title varchar(50) not null,
	content text not null	
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 사부님의 노트
create table diaryBoard(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null,
	title varchar(50) not null,
	content text not null	
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
