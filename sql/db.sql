create table articles
(
	id bigint unsigned auto_increment,
	title varchar(400) null,
	text text null,
	created datetime default CURRENT_TIMESTAMP not null,
	author_id bigint unsigned null,
	constraint article_id_uindex
		unique (id),
	constraint id
		unique (id)
);

alter table articles
	add primary key (id);

create table authors
(
	id bigint unsigned auto_increment,
	first_name varchar(200) null,
	last_name varchar(200) null,
	nick_name varchar(200) null,
	constraint authors_id_uindex
		unique (id),
	constraint id
		unique (id)
);

alter table authors
	add primary key (id);

