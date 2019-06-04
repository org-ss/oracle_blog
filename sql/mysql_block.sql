###分页函数
--留言分页函数
create or replace function fun_messages
(v_page in number,v_articleId in number)
return sys_refcursor
is
messages_cur sys_refcursor;
begin
    open type_cur for
    select * from 
        (select rownum rn,m.* from messages m where m.articleId=v_articleId)e 
        where e.rn>=(v_page-1)*5+1 and e.rn<=v_page*5;
    return messages_cur;
end;
/
select fun_messages(1,4) from dual;

--留言分页过程
create or replace procedure pro_messages
(v_page in number,v_articleId in number,type_cur out sys_refcursor)
is
begin
    open messages_cur for
    select * from 
        (select rownum rn,m.* from messages m where m.articleId=v_articleId)e 
        where e.rn>=(v_page-1)*5+1 and e.rn<=v_page*5;
end;
/
set serveroutput on
declare
messages_cur sys_refcursor;
v_rows messages%rowtype;
begin
    pro_messages(1,4,type_cur);
    loop
    fetch messages_cur into v_rows;
    exit when type_cur%notfound;
    dbms_output.put_line(v_rows.name);
    end loop;
    close messages_cur;
end;
/


--文章每一个类型的分页
create or replace function fun_articles_type
(v_page in number,v_typeId in number)
return sys_refcursor
is
articles_cur sys_refcursor;
begin
    open articles_cur for
    select * from 
        (select rownum rn,a.* from v_articles a where a.typeId=v_typeId)e 
        where e.rn>=(v_page-1)*5+1 and e.rn<=v_page*5;
    return articles_cur;
end;
/

--相册的分页
create or replace function fun_photos
(v_page in number)
return sys_refcursor
is
photos_cur sys_refcursor;
begin
    open photos_cur for
    select * from 
        (select rownum rn,p.* from photos p)e 
        where e.rn>=(v_page-1)*9+1 and e.rn<=v_page*9;
    return photos_cur;
end;
/

--用户的分页
create or replace function fun_users
(v_page in number)
return sys_refcursor
is
users_cur sys_refcursor;
begin
    open users_cur for
    select * from 
        (select rownum rn,u.* from users u)e 
        where e.rn>=(v_page-1)*8+2 and e.rn<=v_page*8+1;
    return users_cur;
end;
/

##视图
--文章视图
create view v_articles
as
select a.*,u.name from articles a 
left join users u
on a.userId=u.id;

--grant create trigger,create procedure to blogdata;--给用户赋予创建触发器和过程的权限


--文章查询的过程(失败)
/*create or replace procedure pr_articles_search(
    keyword in VARCHAR2,
    cur_articles out sys_refcursor) is
begin
  open cur_articles for select *from articles where (regexp_like(title,'(keyword)+') or regexp_like(introduction,'(keyword)+'));
  CLOSE cur_articles;
end;*/

--根据typeId计算文章总数
create or REPLACE FUNCTION fun_getNum(
  v_tId in articles.typeId% TYPE,
  v_num out number) 
  return number is
begin
  select count(*) into v_num from articles where typeId= v_tid;
  return v_num;
end;
/

--文章查询
select *from v_articles where (regexp_like(title,'(keyword)+') or regexp_like(introduction,'(keyword)+'));

