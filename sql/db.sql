                         create table test.article
(
	id bigint unsigned auto_increment,
	title varchar(200) null,
	text text null,
	author varchar(100) null,
	created timestamp default CURRENT_TIMESTAMP null,
	constraint id
		unique (id)
);

alter table test.article
	add primary key (id);

