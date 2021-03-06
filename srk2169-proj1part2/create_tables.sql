create database strike_a_chord;
use strike_a_chord;

create table basic_user(
username varchar(40) not null,
firstname varchar(40) not null,
lastname varchar(40) not null,
primary key(username)

);

create table member(
username varchar(40) not null,
expiry_date date not null,
foreign key (username) references basic_user(username)
on update cascade
on delete restrict,
primary key(username)
);

create table songs(
sid int not null auto_increment,
name varchar(40),
length_of_song timestamp,
primary key(sid)
);

create table chords(
cid smallint not null auto_increment,
cname char(10) not null unique,
instrument varchar(40),
name varchar(40), 
notes varchar(40),
primary key (cid)
);

create table has_chords(
sid int not null,
cid smallint not null,
foreign key (sid) references songs(sid)
on update cascade
on delete restrict,
foreign key (cid) references chords(cid)
on update cascade
on delete restrict,
primary key(sid, cid)
);

create table has_mastered(
username varchar(40) not null,
cid smallint not null,

foreign key (username) references basic_user(username)
on update cascade
on delete restrict,

foreign key (cid) references chords(cid)
on update cascade
on delete restrict,	
primary key(username, cid)
);

create table gets_recommendations(
username varchar(40) not null,
cid smallint not null,
sid int not null,
date date,
foreign key (username, cid) references has_mastered(username, cid)
on update cascade
on delete restrict,
foreign key (sid, cid) references has_chords(sid, cid)
on update cascade
on delete restrict,
primary key(username, cid, sid)
);


