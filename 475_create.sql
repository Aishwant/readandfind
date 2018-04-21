-- Last modification date: 2018-03-29 06:43:49.417

-- tables

DROP TABLE IF EXISTS Users_Books,Books,Author, Genre, Users;

-- Table: Author
CREATE TABLE Author (
    Author_ID int NOT NULL,
    AFName char(20),
    ALName char(20),
    PRIMARY KEY (Author_ID)
);

-- Table: Books
CREATE TABLE Books (
    Book_ID int NOT NULL,
    ISBN char(50),
    Book_Name char(50),
    Author_ID int,
    Genre_ID int,
    PRIMARY KEY (Book_ID)
);

-- Table: Genre
CREATE TABLE Genre (
    Genre_ID int NOT NULL,
    GenreN char(50) NOT NULL,
    PRIMARY KEY (Genre_ID)
);

-- Table: User
CREATE TABLE Users (
    User_ID int NOT NULL,
    Email_ID char(50) NOT NULL,
    Password char(20) NOT NULL,
    FName char(20) NOT NULL,
    LName char(20) NOT NULL,
    PRIMARY KEY (User_ID)
);

-- Tables: Users_Books
CREATE TABLE Users_Books (
    User_ID int NOT NULL,
    Book_ID int NOT NULL,
    Year_Read int,
    PRIMARY KEY (User_ID,Book_ID)
);

-- foreign keys
-- Reference: Books_Genre (table: Books)
ALTER TABLE Books ADD CONSTRAINT Books_Genre FOREIGN KEY Books_Genre (Genre_ID)
    REFERENCES Genre (Genre_ID);

-- Reference: Books_Author (table: Books)
ALTER TABLE Books ADD CONSTRAINT Books_Author FOREIGN KEY Books_Author (Author_ID)
    REFERENCES Author (Author_ID);

-- Reference: Users_Books_Books (table: Users_Books)
ALTER TABLE Users_Books ADD CONSTRAINT Users_Books_Books FOREIGN KEY Users_Books_Books (Book_ID)
    REFERENCES Books (Book_ID);

-- Reference: Users_Books_User (table: Users_Books)
ALTER TABLE Users_Books ADD CONSTRAINT Users_Books_User FOREIGN KEY Users_Books_User (User_ID)
    REFERENCES Users (User_ID);

-- End of file.