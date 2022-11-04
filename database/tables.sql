create table student (
    student_id int not null primary key auto_increment,
    name varchar (50) not null,
    last_name varchar (50) not null,
    gender boolean not null,
    phone varchar (13) unique,
    address varchar (30),
    email varchar (30) unique,
    photo text);
create table manager (
    manager_id int not null primary key,
    user_name varchar (20)not null unique,
    email varchar (30) unique,
    password varchar(15)not null 
);


