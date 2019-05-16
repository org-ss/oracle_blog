create database blog default charset 'utf8mb4';

use blog;

create table articles(
	a_id int(11) primary key auto_increment comment '文章的id',
	a_title varchar(100) comment '文章的标题',
	a_begin_text varchar(400) comment '文章的简介',
	a_content varchar(800) comment '文章内容',
	a_date timestamp comment '文章创建时间',
	a_uid int(11) comment'文章作者id',
	a_photo varchar(50) comment'文章配图名称'
);


create table users(
	u_id int(11) primary key auto_increment,
	u_name varchar(50) comment '用户名',
	u_password varchar(50),
	u_photo varchar(50) comment'用户头像名称',
	u_lasttime timestamp comment '最近登录的时间'
);

create table visits(
	v_id int(11) primary key auto_increment,
	v_name varchar(100) comment'浏览者用户名',
	v_date timestamp comment'留言添加时间',
	v_content varchar(300) comment'留言内容',
	v_uid int(11)

);

create table photos(
	p_id int(11) primary key auto_increment,
	p_name varchar(50) comment'照片名称',
	p_date timestamp comment'照片上传时间',
	p_uid int(11)
);

insert into users values(default,'admin','123456','gsm.jpg',default);