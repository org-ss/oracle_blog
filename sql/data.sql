--1
insert into types values(null,'学术',null);
insert into types values(null,'生活',null);
select * from types;

--2
insert into users values(null,'123456@qq.com','admin','123456',0,'a.jpg','第一次想做这么一个网站，去记录自己的生活和学习，前行的脚步太过匆忙，不如停下来好好整理整理，自己选择的路，不论如何都要走完。',null);
insert into users values(null,'11@qq.com','bobo','bobo',default,'b.jpg','aaa',null);
insert into users values(null,'22@qq.com','aa','aa',default,'b.jpg','aaa',null);
insert into users values(null,'33@qq.com','bb','bb',default,'b.jpg','aaa',null);
insert into users values(null,'44@qq.com','cc','cc',default,'b.jpg','aaa',null);
insert into users values(null,'55@qq.com','dd','dd',default,'b.jpg','aaa',null);
insert into users values(null,'66@qq.com','ee','ee',default,'b.jpg','aaa',null);
insert into users values(null,'77@qq.com','ff','ff',default,'b.jpg','aaa',null);
insert into users values(null,'88@qq.com','gg','gg',default,'b.jpg','aaa',null);
insert into users values(null,'99@qq.com','hh','hh',default,'b.jpg','aaa',null);
insert into users values(null,'00@qq.com','ii','ii',default,'b.jpg','aaa',null);
insert into users values(null,'111@qq.com','jj','jj',default,'b.jpg','aaa',null);
select * from users;

--3
insert into photos values(null,'a.jpg',null,1);
insert into photos values(null,'b.jpg',null,1);
insert into photos values(null,'c.jpg',null,1);
insert into photos values(null,'d.jpg',null,1);
insert into photos values(null,'e.jpg',null,1);
insert into photos values(null,'f.jpg',null,1);
insert into photos values(null,'g.jpg',null,1);
insert into photos values(null,'h.jpg',null,1);
insert into photos values(null,'i.jpg',null,1);
insert into photos values(null,'coffee.png',null,1);
select * from photos;

--4
insert into articles values
	(null,'关于我的介绍','第1次尝试制作php个人博客网站',
	'第一次想做这么一个网站，去记录自己的生活和学习，前行的脚步太过匆忙，不如停下来好好整理整理，自己选择的路，不论如何都要走完。',null,1,'a.jpg',1);
insert into articles values(null,'Docker领域再添1员，网易云发布“蜂巢”，加入云计算之争','Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争','Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争',null,1,'b.jpg',1);
insert into articles values
	(null,'关于我的介绍','第2次尝试制作php个人博客网站',
	'第一次想做这么一个网站，去记录自己的生活和学习，前行的脚步太过匆忙，不如停下来好好整理整理，自己选择的路，不论如何都要走完。',null,1,'a.jpg',2);
insert into articles values(null,'Docker领域再添2员，网易云发布“蜂巢”，加入云计算之争','Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争','Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争',null,1,'b.jpg',2);
select * from articles;
insert into articles values
	(null,'关于我的介绍','第3次尝试制作php个人博客网站',
	'第一次想做这么一个网站，去记录自己的生活和学习，前行的脚步太过匆忙，不如停下来好好整理整理，自己选择的路，不论如何都要走完。',null,1,'a.jpg',1);
insert into articles values(null,'Docker领域再添3员，网易云发布“蜂巢”，加入云计算之争','Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争','Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争',null,1,'b.jpg',1);
insert into articles values
	(null,'关于我的介绍','第4次尝试制作php个人博客网站',
	'第一次想做这么一个网站，去记录自己的生活和学习，前行的脚步太过匆忙，不如停下来好好整理整理，自己选择的路，不论如何都要走完。',null,1,'a.jpg',2);
insert into articles values(null,'Docker领域再添4员，网易云发布“蜂巢”，加入云计算之争','Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争','Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争',null,1,'b.jpg',2);
select * from articles;
insert into articles values
	(null,'关于我的介绍','第5次尝试制作php个人博客网站',
	'第一次想做这么一个网站，去记录自己的生活和学习，前行的脚步太过匆忙，不如停下来好好整理整理，自己选择的路，不论如何都要走完。',null,1,'a.jpg',1);
insert into articles values(null,'Docker领域再添5员，网易云发布“蜂巢”，加入云计算之争','Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争','Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争',null,1,'b.jpg',1);
insert into articles values
	(null,'关于我的介绍','第6次尝试制作php个人博客网站',
	'第一次想做这么一个网站，去记录自己的生活和学习，前行的脚步太过匆忙，不如停下来好好整理整理，自己选择的路，不论如何都要走完。',null,1,'a.jpg',2);
insert into articles values(null,'Docker领域再添6员，网易云发布“蜂巢”，加入云计算之争','Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争','Docker领域再添一员，网易云发布“蜂巢”，加入云计算之争',null,1,'b.jpg',2);
select * from articles;

--5
insert into messages values(null,'bobo','很喜欢你写的文章，希望继续更新',2,null);
insert into messages values(null,'aa','很喜欢你写的文章，希望继续更新',2,null);
insert into messages values(null,'bb','很喜欢你写的文章，希望继续更新',2,null);
insert into messages values(null,'cc','很喜欢你写的文章，希望继续更新',2,null);
insert into messages values(null,'dd','很喜欢你写的文章，希望继续更新',2,null);
insert into messages values(null,'ee','很喜欢你写的文章，希望继续更新',2,null);
insert into messages values(null,'ff','很喜欢你写的文章，希望继续更新',2,null);
insert into messages values(null,'gg','很喜欢你写的文章，希望继续更新',2,null);
insert into messages values(null,'hh','很喜欢你写的文章，希望继续更新',2,null);
insert into messages values(null,'ii','很喜欢你写的文章，希望继续更新',2,null);
insert into messages values(null,'jj','很喜欢你写的文章，希望继续更新',2,null);
select * from messages;