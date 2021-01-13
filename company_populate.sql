use company;
show tables;


insert into customer values(11001, "Clairs", "John Smith", 2123546000);
insert into customer values(11002, "StarBucks", "Jenny WIll", 513444000);


insert into hardware values("m0001", "HP","DL380", "NewTech",'2025-10-30');
insert into hardware values("m0002", "SUN","NS2", "ServerDepot",'2027-01-01');



insert into app values("a000120", "SalesManager","2.0",Null);
insert into app values("a000121", "SalesManager","2.1",Null);
insert into app values("a000211", "Primo","11.0","2023-06-30");




insert into cusenv values(11001,1,"m0001","2017-01-31","2022-12-21","Centos7", "Tomcat7","8","5.5");
insert into cusenv values(11001,2,"m0001","2018-03-21","2023-12-21","Centos8", "Tomcat7","8","7.1");
insert into cusenv values(11002,1,"m0002","2017-9-30",NULL,"Redhat6.2", "Apache2.4.2","7",NULL);




insert into cusapp values(11001,"a000120","2019-06-01","2021-06-01");
insert into cusapp values(11001,"a000211","2019-10-31","2021-10-31");
insert into cusapp values(11002,"a000120","2018-04-15",null);