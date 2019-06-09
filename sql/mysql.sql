#创建blogdata用户并授予权限：在orcl数据库库中使用sys用户进行命令操作
select * from user_users;
create user blogdata identified by 123456;
grant connect,resource to blogdata;
grant create view to blogdata;
grant select any dictionary to blogdata;


create sequence articles_id
  increment by 1
  start with 1
  maxvalue 1000
  nominvalue 
  nocycle
  nocache;

create sequence types_id
  increment by 1
  start with 1
  maxvalue 1000
  nominvalue
  nocycle
  nocache;
  
create sequence users_id
  increment by 1
  start with 1
  maxvalue 1000
  nominvalue
  nocycle
  nocache;
  
create sequence messages_id
  increment by 1
  start with 1
  maxvalue 1000
  nominvalue
  nocycle
  nocache;
  
create sequence photos_id
  increment by 1
  start with 1
  maxvalue 1000
  nominvalue
  nocycle
  nocache;

create table types(
	id number primary key,
	name varchar2(10) not null,
	created_at varchar2(50)
);
comment on table types is '文章类型';

create table users(
	id number primary key,
	email varchar2(50) unique,
	name varchar2(50) not null,
	password varchar2(50) not null,
	role number default 1,
	image varchar2(50),
	introduce varchar2(800),
	lasttime varchar2(50)
);
comment on table users is '用户信息，其中role为1时表示普通身份';


create table articles(
	id number primary key,
	title varchar2(100) not null,
	introduction varchar2(400) not null,
	content varchar2(800) not null,
	created_at varchar2(50),
	userId number not null,
	image varchar2(50),
	typeId number not null,
	constraints articles_uid_fk foreign key(userId)
	references users(id),
	constraints articles_tid_fk foreign key(typeId)
	references types(id)
);
comment on table articles is '文章信息';


create table messages(
	id number primary key,
	name varchar2(100) not null,
	content varchar2(300) not null,
	articleId number,
	created_at varchar2(50),
	constraints messages_aid_fk foreign key(articleId)
	references articles(id)
);
comment on table messages is '文章留言';

create table photos(
	id number primary key,
	name varchar2(50) not null,
	created_at varchar2(50),
	userId number,
	constraints photos_uid_fk foreign key(userId)
	references users(id)
);
comment on table photos is '图片信息';

 --文章id自增的触发器
create or replace trigger tr_aid
before insert on articles
for each row
begin
select articles_id.nextval,to_char(sysdate,'yyyy-mm-dd hh24:mi:ss') into :new.id,:new.created_at from dual;
end;
/

--分类id自增的触发器
create or replace trigger tr_tid
before insert on types
for each row
begin
select types_id.nextval,to_char(sysdate,'yyyy-mm-dd hh24:mi:ss') into :new.id,:new.created_at from dual;
end;
/

--用户id自增的触发器
create or replace trigger tr_uid
before insert on users
for each row
begin
select users_id.nextval,to_char(sysdate,'yyyy-mm-dd hh24:mi:ss') into :new.id,:new.lasttime from dual;
end;
/

--留言id自增的触发器
create or replace trigger tr_mid
before insert on messages
for each row
begin
select messages_id.nextval,to_char(sysdate,'yyyy-mm-dd hh24:mi:ss') into :new.id,:new.created_at from dual;
end;
/

--相册id自增的触发器
create or replace trigger tr_pid
before insert on photos
for each row
begin
select photos_id.nextval,to_char(sysdate,'yyyy-mm-dd hh24:mi:ss') into :new.id,:new.created_at from dual;
end;
/

--用户更新最近登录时间的触发器：
create or replace trigger tr_updateid
before update on users
for each row
begin
  if updating('lasttime') then
    select to_char(sysdate,'yyyy-mm-dd hh24:mi:ss') into :new.lasttime from dual;
  end if;
end;
/ 
