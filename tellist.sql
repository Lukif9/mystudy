use `c14st16`;
drop table if exists `tellist`;
create table `tellist` (
	`no` tinyint(4) not null auto_increment,
	`name` char(20) not null,
	`telno` char(20) not null,
	primary key(`no`)
) auto_increment=2;
insert into `tellist` values(1, "ZARD", "011-1111-1111");