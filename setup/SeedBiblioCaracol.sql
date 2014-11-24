INSERT INTO `Temas` VALUES (1,'Exraterrestres'),(2,'Guerra'),(3,'Futurista'),(4,'Espacio Exterior'),(5,'Medieval'),(6,'War'),(8,'Elfos'),(9,'');

INSERT INTO `Usuarios` VALUES (1,'J','J','$2y$10$Bvvwi6UBlKvEmoQIfTQ.i.QL2mN0pMj4H1Az1th/Pia3UXE4b7YXO',1),(3,'A','A','$2y$10$RqteknM94ObN2Qmv66cboe5Pb73s9RN52HlLyF2J49mrQm2Z/4/gO',0);

INSERT INTO `Autores` VALUES (1,'Erick Nylund'),(2,'William C.Dietz'),(3,'Joseph Staten'),(4,'Tobias S.Buckell'),(5,'John Shirley'),(6,'Horst Rinne'),(10,'Juan Pérez'),(11,'John Ronald Reuel Tolkien'),(12,'J.R.R. Tolkien'),(13,'J. R. R. Tolkien'),(14,'Juan Pérez,John Ronald Reuel Tolkien'),(15,'J.K. Rowling'),(16,'Dinah Buchotz'),(17,'Luke Bell'),(18,'Giselle Liza Anatol');

INSERT INTO `Editorial` VALUES (2,'Adams Media'),(3,'Andrés Bello'),(4,'Chapman and Hall/CRC'),(5,'Gallery Books'),(6,'Greenwood Publishing Group'),(7,'Harper Collins publishers'),(8,'HarperCollins UK'),(9,'Houghton Mifflin Harcourt'),(10,'Paulist Press'),(11,'Pottermore'),(1,'Tor Books');

INSERT INTO `Estante` VALUES (1);

INSERT INTO `Fila` VALUES (1,1),(2,1),(3,1);

INSERT INTO `Posicion` VALUES (1,1,1),(2,1,1),(3,1,1),(4,1,1),(5,1,1);

INSERT INTO `Generos` VALUES (1,'Ciencia Ficcion'),(2,'Romance'),(3,'Fantasy'),(4,'Epic'),(11,'Mitología'),(12,'Fantasía'),(13,'Epica'),(14,'');

INSERT INTO `Contenido` VALUES (1,'Halo: The Fall of Reach','Libro','345451325',0,'Ingles','2010-08-03','Jóvenes',NULL,1),(2,'Halo: The Flood','Libro','345459210',0,'Ingles','2010-10-13','Jóvenes',NULL,1),(3,'Halo: Contact Harvest','Libro','765315696',0,'Ingles','2007-10-30','Jóvenes',NULL,1),(4,'Halo: The Cole Protocol','Libro','76531570',0,'Ingles','2008-11-25','Jóvenes',NULL,1),(5,'Halo: Broken Circle','Libro','1476783594',0,'Ingles','2014-11-04','Jóvenes',NULL,5),(10,'The Weibull Distribution','Revista','9781420087437',0,'Inglés','2008-11-20','Adultos','',4),(40,'LoTR','Revista','9780261102385',1,'Portugués','2000-01-01','Jóvenes','http://bks5.books.google.com.mx/books?id=jB_9MgEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api',3),(41,'The Fellowship of the Ring','Libro','0547952015',1,'Inglés','2012-02-15','Jóvenes','http://bks6.books.google.com.mx/books?id=aWZzLPhY4o0C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',9),(42,'The Two Towers: The Lord of the Rings','Libro','000732250X',1,'Inglés','2009-04-20','Jóvenes','http://bks9.books.google.com.mx/books?id=UraJfjMXYV0C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',8),(44,'The Return of the King','Libro','054795204X',1,'Inglés','2012-02-15','Jóvenes','http://books.google.com/books/content?id=WZ0f_yUgc0UC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',9),(45,'The Hobbit','Libro','0007487290',1,'Inglés','2012-01-01','Jóvenes','http://bks7.books.google.com.mx/books?id=RMD2ugAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api',7),(49,'Harry Potter and the Sorcerer\'s Stone','Libro','1781100276',0,'Inglés','2012-03-27','Niños','http://bks4.books.google.com.mx/books?id=wrOQLV6xB-wC&printsec=frontcover&img=1&zoom=1&source=gbs_api',11),(51,'Harry Potter and the Deathly Hallows','Libro','1781100330',0,'Inglés','2012-03-27','Niños','http://bks5.books.google.com.mx/books?id=_oaAHiFOZmgC&printsec=frontcover&img=1&zoom=1&source=gbs_api',11),(53,'The Unofficial Harry Potter Cookbook','Libro','1440508526',0,'Inglés','2010-08-18','Niños','http://bks9.books.google.com.mx/books?id=dNSOkGbW_EkC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',2),(54,'Baptizing Harry Potter','Libro','1616431156',0,'Inglés','2012-01-01','Niños','http://bks6.books.google.com.mx/books?id=szF_pLGmJTQC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',10),(56,'Fantastic Beasts and Where to Find Them','Libro','1781100411',0,'Inglés','2012-07-25','Niños','http://books.google.com/books/content?id=0xtzuECVGncC&printsec=frontcover&img=1&zoom=1&source=gbs_api',11),(57,'Reading Harry Potter','Libro','0313320675',0,'Inglés','2003-01-01','Niños','http://bks7.books.google.com.mx/books?id=-__ICQemqaEC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',9);

INSERT INTO `Copia` VALUES (1,1,1,1,1),(7,57,1,1,1),(2,1,2,1,1),(3,2,3,1,1);

INSERT INTO `Pedidos` VALUES (1,'2014-11-08 12:00:00',1),(2,'2014-08-11 10:00:00',1);

INSERT INTO `Contenido_has_Generos` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(41,3),(45,3),(41,4),(45,4),(40,12),(40,13),(49,14),(51,14),(53,14),(54,14),(56,14),(57,14);

INSERT INTO `Contenido_has_Temas` VALUES (1,1),(1,2),(40,2),(1,3),(1,4),(40,5),(40,8),(49,9),(51,9),(53,9),(54,9),(56,9),(57,9);

INSERT INTO `Prestamos` VALUES (1,'2014-11-08 12:00:00','2014-11-19',1),(2,'2014-11-08 12:00:00','2014-11-08',1),(3,'0000-00-00 00:00:00','2014-11-08',1),(4,'2014-11-19 10:06:37','2014-11-19',1),(5,'2014-11-19 11:45:17','2014-11-08',3),(6,'2014-11-19 11:46:57','2014-11-19',3),(7,'2014-11-19 11:47:56',NULL,3),(8,'2014-11-19 11:49:50',NULL,1),(9,'2014-11-19 11:51:33',NULL,3);

INSERT INTO `Prestamos_has_Copia` VALUES (1,1,1),(2,3,2),(3,2,1),(4,1,1),(5,3,2),(6,2,1),(7,3,2),(8,2,1),(9,1,1);

INSERT INTO `Autores_has_Contenido` VALUES (10,40),(12,41),(13,42),(12,44),(13,45),(15,49),(15,51),(16,53),(17,54),(15,56),(18,57);
