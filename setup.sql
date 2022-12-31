use ei2031;

create table user(
    id int auto_increment not null primary key,
    name char(60) not null,
    Email char(100) not null,
    icon char(100),
    password char(12) not null,
    address char(100) not null
);

create table product( --error
    id int auto_increment not null primary key,
    name char(30) not null,
    bug char(50) not null,
    type int not null,
    price int not null,
    expiration date not null,
    about varchar(21844) not null,
    stock int not null
);

create table productImage(
    id int auto_increment not null primary key,
    productID int not null,
    image char(30) not null,
    category int not null,
    updateDate date not null
);

create table feedback( --error
    id int auto_increment not null primary key,
    productID int not null,
    eval int not null,
    comment varchar(21844),
    updateDate date not null
);

create table allergy( -- error
    id int auto_increment not null primary key,
    productID int not null,
    egg int default 0,
    shell int default 0,
    milk int default 0,
    wheat int default 0,
    nut int default 0,
    fruit int default 0,
    -- fish egg
    roe int default 0, 
    soba int default 0,
    soy int default 0,
    fish int default 0,
);

create table bookmark(
    id int auto_increment not null primary key,
    productID int not null,
    userID int not null,
    updateDate date not null
);

create table sales(
    id int auto_increment not null primary key,
    productID int not null,
    userID int not null,
    num int not null,
    sold date not null
);

create table cart( -- error
    id int auto_increment not null primary key,
    productID int not null,
    userID int not null,
    num int not null,
    added date not null,
    updateDate date not null
);

create table logined(
    id int auto_increment not null primary key,
    userID int not null,
    loginedDate date not null
);

insert into user(name,Email,icon,password,address) values(
    "test","sample@gmail.com","https://pakutaso.cdn.rabify.me/shared/img/thumb/partyPAUI1755.jpg.webp?d=1420","12345678","静岡県浜松市北区初生町1150"
);

insert into product(name,bug,type,price,expiration,stock,about,) values(

);