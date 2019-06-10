##视图
--文章视图
create view v_articles
as
select a.*,t.name type,u.name author from articles a 
left join users u
on a.userId=u.id
left join types t
on a.typeid=t.id;


--分类视图
create view v_types as
select *from (select count(*) num,typeid from v_articles group by typeid) e 
right join types t on e.typeid=t.id;


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
/*create or REPLACE FUNCTION fun_getNum(
  v_tId in articles.typeId% TYPE,
  v_num out number) 
  return number is
begin
  select count(*) into v_num from articles where typeId= v_tid;
  return v_num;
end;
/


--文章查询
select *from v_articles where (regexp_like(title,'(keyword)+') or regexp_like(introduction,'(keyword)+'));*/

--计算照片总数
create or replace procedure pro_count_photos(v_count out number)
is
begin
    select count(*) into v_count from photos;
end;
/

--计算文章总数
create or replace procedure pro_count_articles(v_count out number)
is
begin
    select count(*) into v_count from v_articles;
end;
/