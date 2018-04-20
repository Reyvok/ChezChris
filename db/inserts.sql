delete from suggestion where 1=1;
delete from message where 1=1;
delete from topic where 1=1;
delete from theme where 1=1;
delete from category where 1=1;
delete from fanart where 1=1;
delete from fanfiction where 1=1;
delete from opinion where 1=1;
delete from book where 1=1;
delete from news where 1=1;
delete from status where 1=1;
delete from account where 1=1;
delete from grade where 1=1;
delete from role where 1=1;

set names utf8;

insert into role values
(1, "admin"),
(2, "client");


insert into grade values
(1, "5", "grade1"),
(2, "10", "grade2"),
(3, "15", "grade3");


insert into account values
(1, "user1", null, "fstname", "lstname", "password", "mail1@gmail.com", 5, 1, 1),
(2, "user2", null, "fstname", "lstname", "password", "mail2@gmail.com", 10, 2, 2),
(3, "user3", null, null, null, "password", "mail3@gmail.com", 15, 3, 2);


insert into status values
(1, "Publié"),
(2, "Brouillon");


insert into news values
(1, "news1", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", current_timestamp(), 1, 1),
(2, "news2", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", current_timestamp(), 1, 1),
(3, "news3", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", current_timestamp(), 1, 1),
(4, "news4", "Lorem ipsum.", current_timestamp(), 1, 1),
(5, "aoe", "Wololo", current_timestamp(), 1, 1);


insert into book values
(1, "Les Royaumes Démoniaques", 5.0);


insert into opinion values
(1, "awesome", "incredible book", 5.0, current_timestamp(), 2, 1),
(2, "Lorem ipsum", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 4.5, current_timestamp(), 3, 1);


insert into fanfiction values
(1, "fic1", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", "ff_user2_2018-04-20_10-06-25.pdf", 1, 5.0, current_timestamp(), 2),
(2, "fic2", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", null, 2, null, current_timestamp(), 3),
(3, "fic3", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", null, 1, null, current_timestamp(), 3);


insert into fanart values
(1, "Wow", "fa_user2_2018-04-18_13-25-59.jpg", 1, 5.0, current_timestamp(), 2),
(2, "Much blood", "fa_user2_2018-04-18_14-49-21.png", 1, 5.0, current_timestamp(), 2),
(3, "Wuw", "fa_user3_2018-04-17_15-20-36.jpg", 1, 4.5, current_timestamp(), 3),
(4, "art4", "fa_user3_2018-04-20_11-12-56.jpg", 1, 3.8, current_timestamp(), 3),
(5, "art5", "fa_user3_2018-04-18_14-49-43.jpg", 1, 5.0, current_timestamp(), 3),
(6, "art6", "fa_user2_2018-04-20_11-18-41.jpg", 1, 4.7, current_timestamp(), 2),
(7, "art7", "fa_user3_2018-04-20_11-19-23.jpg", 1, 3.6, current_timestamp(), 3),
(8, "art8", "fa_user3_2018-04-20_11-20-12.jpg", 2, 4.1, current_timestamp(), 3);


insert into category values
(1, "Général"),
(2, "Divers");


insert into theme values
(1, "Les Royaumes", 1),
(2, "Suites", 1),
(3, "Narnia", 2);


insert into topic values
(1, "Chapitre 1", 1, 2, current_timestamp()),
(2, "Chapitre 2", 1, 2, current_timestamp()),
(3, "Quel titre ?", 2, 2, current_timestamp()),
(4, "Lorem Ipsum", 3, 3, current_timestamp());


insert into message values
(1, "msg1", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.", 1, 2, current_timestamp()),
(2, "msg2", "ouais", 1, 3, current_timestamp()),
(3, "ms3", "c vré", 1, 2, current_timestamp()),
(4, "On sait pas", "c vré aussi", 3, 3, current_timestamp());


insert into suggestion values
(1, "On pourrait", "On pourrait faire des trucs", current_timestamp(), 2);













