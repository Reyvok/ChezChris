drop table if exists suggestion;
drop table if exists message;
drop table if exists topic;
drop table if exists theme;
drop table if exists category;
drop table if exists fanart;
drop table if exists fanfiction;
drop table if exists opinion;
drop table if exists book;
drop table if exists news;
drop table if exists status;
drop table if exists account;
drop table if exists grade;
drop table if exists role;





create table if not exists role(
id int not null auto_increment,
label varchar(25) not null default 'client',
primary key(id)
) engine=myisam, default charset=utf8;



create table if not exists grade(
id int not null auto_increment,
scoreLimit int not null,
label varchar(25) not null default 'Noob',
primary key(id)
) engine=myisam, default charset=utf8;



create table if not exists account(
id int not null auto_increment,
username varchar(20) not null unique,
imagePath tinytext,
firstname varchar(20),
lastname varchar(20),
password varchar(64) not null,
mail varchar(40) not null unique,
score int not null,
grade int not null,
role int not null,
primary key(id),
constraint grade_account foreign key(grade) references grade(id),
constraint role_account foreign key(role) references role(id)
) default charset=utf8;



create table if not exists status(
id int not null auto_increment,
label varchar(20) not null,
primary key(id)
) engine=myisam, default charset=utf8;



create table if not exists news(
id int not null auto_increment,
title tinytext not null,
txt mediumtext not null,
pubDate datetime not null default current_timestamp,
author int not null,
status int not null,
primary key(id),
constraint account_news foreign key(author) references account(id),
constraint status_news foreign key(status) references status(id)
) default charset=utf8;



create table if not exists book(
id int not null auto_increment,
title tinytext not null,
note float(2,1),
primary key(id)
) default charset=utf8;



create table if not exists opinion(
id int not null auto_increment,
title tinytext not null,
txt mediumtext not null,
note float(2,1) not null,
pubDate datetime not null default current_timestamp,
author int not null,
book int not null,
primary key(id),
constraint author_opinion foreign key(author) references account(id),
constraint book_opinion foreign key(book) references book(id)
) default charset=utf8;



create table if not exists fanfiction(
id int not null auto_increment,
title tinytext not null,
txt mediumtext,
pathFile tinytext,
status int not null,
pubDate datetime not null default current_timestamp,
author int not null,
primary key(id),
constraint status_fanfiction foreign key(status) references status(id),
constraint author_fanfiction foreign key(author) references account(id)
) default charset=utf8;



create table if not exists fanart(
id int not null auto_increment,
title tinytext not null,
pathFile tinytext not null,
pubDate datetime not null default current_timestamp,
author int not null,
primary key(id),
constraint author_fanart foreign key(author) references account(id)
) default charset=utf8;



create table if not exists category(
id int not null auto_increment,
title tinytext not null,
primary key(id)
) engine=myisam, default charset=utf8;



create table if not exists theme(
id int not null auto_increment,
title tinytext not null,
category int not null,
primary key(id),
constraint category_theme foreign key(category) references category(id)
) engine=myisam, default charset=utf8;



create table if not exists topic(
id int not null auto_increment,
title tinytext not null,
theme int not null,
author int not null,
pubDate datetime not null default current_timestamp,
primary key(id),
constraint theme_topic foreign key(theme) references theme(id),
constraint author_topic foreign key(author) references account(id)
) engine=myisam default charset=utf8;



create table if not exists message(
id int not null auto_increment,
title tinytext not null,
txt mediumtext not null,
topic int not null,
author int not null,
pubDate datetime not null default current_timestamp,
primary key(id),
constraint topic_message foreign key(topic) references topic(id),
constraint author_message foreign key(author) references account(id)
) default charset=utf8;



create table if not exists suggestion(
id int not null auto_increment,
title tinytext not null,
txt mediumtext not null,
pubDate datetime not null default current_timestamp,
author int not null,
primary key(id),
constraint author_suggestion foreign key(author) references account(id)
) default charset=utf8;










