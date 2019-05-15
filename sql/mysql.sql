create database blog default charset 'utf8mb4';

use blog;

create table article(
	id int(11) primary key auto_increment comment '文章的id',
	title varchar(200) comment '文章的标题',
	begin_text varchar(400) comment '文章的简介'.
	content varchar(800) comment '文章内容',
	created_at timestamp comment '文章创建时间',
	author varchar(100) comment '文章发布作者',
	comment int(11) default 0 comment '文章评论数'，
	photo varchar(200) default null comment '文章图片',
	visit int(11) default 0 comment '文章浏览数'
);

create table message(
	id int(11) primary key auto_increment,
	name varchar(100) comment '评论人',
	photo varchar(200) comment '评论人头像',
	content varchar(400) comment '评论内容',
	created_at timestamp comment '评论时间'
);

create table user(
	id int(11) primary key auto_increment,
	name varchar(100) comment '用户名',
	password varchar(100),
	photo varchar(200),
	last_time timestamp comment '最近登录的时间'
);