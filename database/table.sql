create table member(
	email varchar(50) not null primary key,
	password varchar(50),
	name varchar(30) not null unique,
	phone varchar(12),
	barcode varchar(30) foreign key,
	birthday date,
	facebook int(1) not null,
	sex int(1) not null,
	registerDate date,
	nickname varchar(30) not null unique,
	active int(1) not null
);

create table gymMember(
	barcode varchar(30) primary key,
	height int(3) not null,
	weight int(3) not null,
	registerDate date not null,
	duration date not null
);

create table exerciseRecord(
	barcode varchar(30),
	name varchar(20),
	type int(1),
	timeRecord time,
	countRecord int(3),
	date date
);

create table attendance(
	barcode varchar(30) primary key,
	date date not null
);

create table achievement(
	email varchar(50) primary key
);

create table exerciseList(
	name varchar(20),
	type int(1),
	time time default 0,
	count int(3) default 0,
	primary key(name,type,time,count)
);

create table exerciseSchedule(
	date date,
	name varchar(20),
	type int(1),
	time time default 0,
	count int(3) default 0,
	primary key(date,name,type,time,count)
);

create table counsel(
	name varchar(30) not null,
	title varchar(50) not null,
	content varchar(500) not null
);

create table breatheBoard(

);

create table freeBoard(

);

create table diaryBoard(

);