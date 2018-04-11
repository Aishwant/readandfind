-- Populate the tables

-- Populating Genre
INSERT INTO Genre VALUES (1,"Thriller");
INSERT INTO Genre VALUES (2,"Mystery");
INSERT INTO Genre VALUES (3,"Fantasy");
INSERT INTO Genre VALUES (4,"Romance");
INSERT INTO Genre VALUES (5,"Crime");
INSERT INTO Genre VALUES (6,"Fiction");
INSERT INTO Genre VALUES (7,"Tragedy");

-- Pupulating authors
INSERT INTO Author VALUES (1, "William", "Shakespear");
INSERT INTO Author VALUES (2, "Dan", "Brown");
INSERT INTO Author VALUES (3, "J.K", "Rowling");
INSERT INTO Author VALUES (4, "Nicholas", "Spark");
INSERT INTO Author VALUES (5, "Laxmi P", "Devkota");

-- Populating Books
INSERT INTO Books VALUES (1,"123491237-BN","Romeo and Juliet",1,4);
INSERT INTO Books VALUES (2,"123491237-BN","Macbeth",1,7);
INSERT INTO Books VALUES (3,"123491237-BN","Angel and Demons",2,2);
INSERT INTO Books VALUES (4,"123491237-BN","Harry Porter and the Sorcerer's Stone",3,3);
INSERT INTO Books VALUES (5,"123491237-BN","The Tempest",1,4);
INSERT INTO Books VALUES (6,"123491237-BN","Hamlet",1,7);
INSERT INTO Books VALUES (7,"123491237-BN","Cafe",1,4);
INSERT INTO Books VALUES (8,"123491237-BN","Inferno",2,2);
INSERT INTO Books VALUES (9,"123491237-BN","The Notebook",4,4);
INSERT INTO Books VALUES (10,"123491237-BN","A Walk to Remember",4,4);
INSERT INTO Books VALUES (11,"123491237-BN","See Me",4,4);
INSERT INTO Books VALUES (12,"123491237-BN","Harry Porter and the Chamber of Secrets",3,3);
INSERT INTO Books VALUES (13,"123491237-BN","The Casual Vacancy",3,6);

-- Populating Users
INSERT INTO Users VALUES (1,"aghimire@go.olemiss.edu","##12","Aishwant","Ghimire");
INSERT INTO Users VALUES (2,"prasannata12@gmail.com","#2341","Prassu","KC");
INSERT INTO Users VALUES (3,"mnakarmi@go.olemiss.edu","#567","Mohit","Nakarmi");
INSERT INTO Users VALUES (4,"yuniktmr@gmail.com","#123","Yunik","Tamrakar");

-- Populating Users_Books
INSERT INTO Users_Books VALUES(1,1,2017);
INSERT INTO Users_Books VALUES(1,2,2003);
INSERT INTO Users_Books VALUES(1,3,2016);
INSERT INTO Users_Books VALUES(1,5,2018);
INSERT INTO Users_Books VALUES(1,6,2015);
INSERT INTO Users_Books VALUES(1,7,2012);
INSERT INTO Users_Books VALUES(1,9,2012);
INSERT INTO Users_Books VALUES(1,10,2016);
INSERT INTO Users_Books VALUES(2,4,2012);
INSERT INTO Users_Books VALUES(2,5,2016);
INSERT INTO Users_Books VALUES(2,6,2010);
INSERT INTO Users_Books VALUES(2,7,2009);
INSERT INTO Users_Books VALUES(2,9,2012);
INSERT INTO Users_Books VALUES(3,1,2012);
INSERT INTO Users_Books VALUES(3,10,2016);
INSERT INTO Users_Books VALUES(3,7,2003);
INSERT INTO Users_Books VALUES(4,1,2016);
INSERT INTO Users_Books VALUES(4,2,2012);
INSERT INTO Users_Books VALUES(4,3,2016);
INSERT INTO Users_Books VALUES(4,4,2012);
INSERT INTO Users_Books VALUES(4,5,2016);
INSERT INTO Users_Books VALUES(4,6,2003);
INSERT INTO Users_Books VALUES(4,7,2016);
INSERT INTO Users_Books VALUES(4,8,2003);
INSERT INTO Users_Books VALUES(4,12,2016);