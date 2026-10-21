DELIMITER //

DROP TABLE IF EXISTS user_movie CASCADE;
DROP TABLE IF EXISTS movie_genere CASCADE;
DROP TABLE IF EXISTS user CASCADE;
DROP TABLE IF EXISTS movie CASCADE;

CREATE TABLE user(

    id int auto_increment primary key,
    name varchar(255),
    email varchar(255) unique,
    password varchar(255),
    role varchar(50),
    birthdate date
);
//
CREATE TABLE movie(
    uuid varchar(32) primary key,
    name varchar(255),
    expiredate date,
    length int,
    director varchar(255)

);//

CREATE TABLE genere(
    id int auto_increment primary key,
    name varchar(100)
);
//

CREATE TABLE movie_genere(
    uuid_movie varchar(32) references movie(uuid),
    id_genere int references genere(id),
    constraint pk_movie_genere primary key (uuid_movie,id_genere)
);
//

CREATE TABLE user_movie(
    id_user int references user(id),
    uuid_movie varchar(32) references movie(uuid),
    constraint pk_user_movie primary key (id_user,uuid_movie)
);
//

insert into user (name, email, password, role, birthdate)
values ('Carlos Martinez','carlos@email.com',
        '123456789','ADMIN',STR_TO_DATE('20/05/2022','%d/%m/%Y'));//