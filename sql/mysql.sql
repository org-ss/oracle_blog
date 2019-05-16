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
	u_email varchar(50) comment '邮箱',
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

insert into users values(default,'123456@qq.com','admin','123456','gsm.jpg',default);

insert into articles values
	(default,'关于我的介绍','第一次尝试制作php个人博客网站',
	'第一次想做这么一个网站，去记录自己的生活和学习，前行的脚步太过匆忙，不如停下来好好整理整理，自己选择的路，不论如何都要走完。',default,2,'first.jpg');


insert into photos values(default,'001.jpg',default,'1');
insert into photos values(default,'002.jpg',default,'1');
insert into photos values(default,'003.jpg',default,'1');
insert into photos values(default,'004.jpg',default,'1');
insert into photos values(default,'005.jpg',default,'1');
