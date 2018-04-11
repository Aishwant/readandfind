----- Needed Quaries

select Users.FName, Users.LName, count(Users_Books.Book_ID) as `Number of Books read` from Users natural join Users_Books group by Users_Books.User_ID;
select Users.FName as 'People who have read Macbeth' from Users natural join Users_Books where Users_Books.Book_ID = (select Books.Book_ID from Books where Books.Book_Name="Macbeth");
select Users.FName, group_concat(distinct(Author.LName)) as `Author's Last Name` from (Users natural join Users_Books natural join Books), Author where Books.Author_ID = Author.Author_ID group by Users.FName order by Users.FName ASC;