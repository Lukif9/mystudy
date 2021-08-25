use `c14st16`;
drop table if exists `members`;
create table `members` (
	`mNo` int(5) not null auto_increment,
	`mId` char(20) not null,
	`mPw` char(20) not null,
	`mName` char(50) not null,
	`mAlias` char(50) not null,
	primary key(`mNo`)
) auto_increment=4;
insert into `members` values ( 1, 'ZARD', 'ZARD', '자드', 'LOVER');
insert into `members` values ( 2, 'CDR', 'CDR', '용', 'zardZZang');
insert into `members` values ( 3, 'LOVE', 'LOVE', '사랑', 'cdrzard');