Create DATABASE hw1;
USE hw1:

CREATE TABLE users (
    id integer primary key auto_increment,
    username varchar(16) not null unique,
    password varchar(255) not null,
    email varchar(255) not null unique,
    name varchar(255) not null,
    surname varchar(255) not null
) Engine = InnoDB;

CREATE TABLE contenuto (
    id integer primary key auto_increment,
    user_id integer not null,
    foreign key (user_id) references users(id),
    NomeAttrazione varchar(255),
    Città varchar(255),
    Tipologia varchar(255),
    copertina varchar(255)
) Engine = InnoDB;