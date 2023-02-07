create table admins
( admin_name char(50) not null primary key,
 admin_pass char(50) not null
);

create table users
( user_name char(50) not null primary key,
 user_pass char(50) not null,
 role char(7) not null
);

create table stops
( id int unsigned not null primary key auto_increment,
 route_name char(50) not null,
 stop_name char(50) not null
);

create table shuttles
( shuttle_id char(50) not null primary key,
 eta int unsigned not null
);

create table announcements
( title char(100) not null primary key,
 body mediumtext not null,
 driver_name char(50) not null,
 shuttle_id char(50) not null,
 wait_time int unsigned not null,
 date char(10) not null
);