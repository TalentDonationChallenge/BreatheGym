-- 외래키 사용시 reference가 되는 테이블은 먼저 생성하고 나중에 없앤다

drop table if exists exerciseRecord;
drop table if exists attendance;
drop table if exists achievement;
drop table if exists consulting;
drop table if exists breatheBoard;
drop table if exists freeBoard;
drop table if exists diaryBoard;
drop table if exists exerciseList;
drop table if exists boxingList;
drop table if exists boxingLevel;
drop table if exists exerciseEpilogue;
drop table if exists boxingLib;
drop table if exists boxingLec;
drop table if exists sparring;
drop table if exists crossfitLib;
drop table if exists crossfitLec;
drop table if exists comments;
drop table if exists pictures;
drop table if exists member;
drop table if exists gymMember;


create table gymMember(
	barcode varchar(30) primary key default '',
	name varchar(30) not null default '',
	phone varchar(12) not null default '00000000000',
	birthday date not null default '2000-01-01',
	sex int(1) not null default 0 check (sex = 0 or sex = 1),
	height int(3) not null default 0 check (height >= 0),
	weight int(3) not null default 0 check (weight >= 0),
	registerDate date not null default '2000-01-01',
	duration int(2) not null default 0 check (duration >= 0), -- 개월수 단위로
	branch int(1) not null default 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table member(
	email varchar(50) not null primary key,
	password varchar(50) not null default '',
	name varchar(30) not null default '',
	phone varchar(12) not null default '00000000000',
	barcode varchar(30) not null default '',
	birthday date not null default '2000-01-01',
	facebook int(1) not null default 0 check (facebook = 0 or facebook = 1),
	sex int(1) not null default 0 check (sex = 0 or sex = 1),
	registerDate date default '2000-01-01',
	nickname varchar(30) not null unique default '',
	active int(1) not null default 0 check (active = 0 or active = 1),
	foreign key (barcode) references gymMember(barcode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table attendance(
	barcode varchar(30) not null default '',
	date datetime not null default '2000-01-01',
	foreign key (barcode) references gymMember(barcode),
	primary key(barcode, date)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table achievement(
	email varchar(50) not null default '',
	name varchar(50) not null default '',
	foreign key (email) references member(email),
	primary key(email, name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table exerciseList(
	no int(6) not null primary key AUTO_INCREMENT,
	name varchar(20) not null default '',
	date date not null default '2000-01-01',
	type int(1) not null check (type = 0 or type = 1), -- 일정시간동안 세트수 0, 일정세트 하는데 걸린시간 1
	time time default 0 not null,
	count int(3) default 0 not null,
	memo text default '' not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table exerciseRecord(
	barcode varchar(30) not null default '',
	exerciseNo int(6) not null default 0,
	timeRecord time not null default 0,
	countRecord int(3) not null default 0,
	foreign key (barcode) references gymMember(barcode),
	foreign key (exerciseNo) references exerciseList(no),
	primary key(barcode, exerciseNo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table consulting(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null default '',
	title varchar(50) not null default '',
	content text not null default '',
	writtenTime datetime not null default 0,
	reply int(6) default 0 not null,
	foreign key (email) references member(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 브리드 이야기
create table breatheBoard(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null default '',
	title varchar(50) not null, -- 아무래도 title과 content가 빈 문자열이면 들어갈 수 없으니까 디폴트 값을 안주기로 했음
	content text not null,
	writtenTime datetime not null,
	hits int(6) not null default 0,
	foreign key (email) references member(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

create table freeBoard(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null default '',
	title varchar(50) not null,
	content text not null,
	writtenTime datetime not null,
	hits int(6) not null default 0,
	foreign key (email) references member(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 운동 후기
create table exerciseEpilogue(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null default '',
	title varchar(50) not null,
	content text not null,
	writtenTime datetime not null,
	hits int(6) not null default 0,
	foreign key (email) references member(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 복싱 자료실
create table boxingLib(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null default '',
	title varchar(50) not null,
	content text not null,
	writtenTime datetime not null,
	hits int(6) not null default 0,
	foreign key (email) references member(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 복싱 강의실
create table boxingLec(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null default '',
	title varchar(50) not null,
	content text not null,
	writtenTime datetime not null,
	hits int(6) not null default 0,
	foreign key (email) references member(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 스파링 영상
create table sparring(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null default '',
	title varchar(50) not null,
	content text not null,
	writtenTime datetime not null,
	hits int(6) not null default 0,
	foreign key (email) references member(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 크로스핏 자료실
create table crossfitLib(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null default '',
	title varchar(50) not null,
	content text not null,
	writtenTime datetime not null,
	hits int(6) not null default 0,
	foreign key (email) references member(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 크로스핏 동작들
create table crossfitLec(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null default '',
	title varchar(50) not null,
	content text not null,
	writtenTime datetime not null,
	hits int(6) not null default 0,
	foreign key (email) references member(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


-- 사부님의 노트
create table diaryBoard(
	no int(6) not null primary key AUTO_INCREMENT,
	email varchar(50) not null default '',
	title varchar(50) not null,
	content text not null,
	writtenTime datetime not null,
	hits int(6) not null default 0,
	foreign key (email) references member(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 복싱 진도 DB
create table boxingList(
	no int(6) not null primary key AUTO_INCREMENT,
	name varchar(20) not null default '',
	youtubeSrc varchar(50) not null default '',
	description varchar(200) not null default '',
	summary varchar(100) not null default '',
	photo mediumblob not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 개인별 복싱 진도
create table boxingLevel(
	barcode varchar(30) primary key,
	no int(6) not null default 0,
	foreign key (barcode) references gymMember(barcode)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 댓글 테이블
create table comments(
	no int(6) not null primary key AUTO_INCREMENT,
	tableName enum('breatheBoard', 'freeBoard', 'diaryBoard', 'consulting',
		'exerciseEpilogue', 'boxingLib', 'boxingLec', 'sparring', 'crossfitLec', 'crossfitLib') not null,
	postNumber int(6) not null,
	name varchar(20) not null,
	content text not null,
	writtenTime datetime not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- 사진 테이블
create table pictures(
	no int(6) not null primary key AUTO_INCREMENT,
	tableName enum('breatheBoard', 'freeBoard', 'diaryBoard', 'consulting',
		'exerciseEpilogue', 'boxingLib', 'boxingLec', 'sparring', 'crossfitLec', 'crossfitLib') not null,
	postNumber int(6) not null,
	fileName varchar(50) not null,
	originFileName varchar(50) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;