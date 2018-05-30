delimiter //
create trigger updateNoteOnInsert after insert
on opinion for each row
begin
	update book,
	(select book, avg(note) as averageNote
	from opinion group by book) as n
	set book.note=n.averageNote
	where book.id=n.book;
end;//
delimiter ;

delimiter //
create trigger updateNoteOnDelete after delete
on opinion for each row
begin
  update book,
  (select book, avg(note) as averageNote
  from opinion group by book) as n
  set book.note=n.averageNote
  where book.id=n.book;
end;//
delimiter ;