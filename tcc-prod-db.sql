-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: rpg2
-- ------------------------------------------------------
-- Server version	5.5.57-0+deb8u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `campos`
--

DROP TABLE IF EXISTS `campos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campos` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_ficha` int(5) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `tipo` char(1) NOT NULL,
  `relac` tinyint(1) NOT NULL,
  `pai` int(5) NOT NULL,
  `jedit` tinyint(1) NOT NULL,
  `medit` tinyint(1) NOT NULL,
  `redit` tinyint(1) NOT NULL,
  `ordem` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cod_ficha` (`id_ficha`),
  CONSTRAINT `fk_ficha_campo` FOREIGN KEY (`id_ficha`) REFERENCES `fichas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campos`
--

LOCK TABLES `campos` WRITE;
/*!40000 ALTER TABLE `campos` DISABLE KEYS */;
INSERT INTO `campos` VALUES (53,6,'Nome','s',0,0,0,0,0,0),(54,6,'Numero (chamada)','n',0,0,0,0,0,0),(55,6,'Turma','s',0,0,0,0,0,0),(56,6,'Email','s',0,0,0,0,0,0),(57,6,'teste2','s',0,0,0,0,0,0),(58,7,'Nome','s',0,0,0,0,0,0),(59,3,'teste','n',0,0,0,0,0,0),(60,3,'miau','n',0,0,0,0,0,0),(61,3,'Texto','s',0,0,0,0,0,0),(62,3,'Nome:','n',0,0,0,0,0,0),(63,3,'Jogo:','s',0,0,0,0,0,0),(69,11,'Nome','s',0,0,0,0,0,0),(70,11,'Númerico','n',0,0,0,0,0,1),(91,13,'Nome','s',0,0,0,0,0,0),(92,13,'Numero','n',0,0,0,0,0,1),(93,13,'Turma','s',0,0,0,0,0,2),(94,14,'Nome','s',0,0,0,0,0,0),(95,14,'Turma','s',0,0,0,0,0,2),(96,14,'Numero de Chamada','n',0,0,0,0,0,2),(100,18,'Nome','s',0,0,0,0,0,0),(101,18,'numero de chamada','n',0,0,0,0,0,1);
/*!40000 ALTER TABLE `campos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dados`
--

DROP TABLE IF EXISTS `dados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dados` (
  `nome` varchar(40) NOT NULL,
  `num_lados` int(3) NOT NULL,
  `id_jogo` int(5) NOT NULL,
  `id` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `id_jogo` (`id_jogo`),
  CONSTRAINT `fk_jogo_dado` FOREIGN KEY (`id_jogo`) REFERENCES `jogo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dados`
--

LOCK TABLES `dados` WRITE;
/*!40000 ALTER TABLE `dados` DISABLE KEYS */;
/*!40000 ALTER TABLE `dados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_jogador`
--

DROP TABLE IF EXISTS `estado_jogador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_jogador` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(5) NOT NULL,
  `id_jogo` int(5) NOT NULL,
  `id_ponto_mapa_atual` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jogo` (`id_jogo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_ponto_mapa_atual` (`id_ponto_mapa_atual`),
  CONSTRAINT `fk_jogador` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_jogador_jogo` FOREIGN KEY (`id_jogo`) REFERENCES `jogo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ponto_atual` FOREIGN KEY (`id_ponto_mapa_atual`) REFERENCES `pontomapa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_jogador`
--

LOCK TABLES `estado_jogador` WRITE;
/*!40000 ALTER TABLE `estado_jogador` DISABLE KEYS */;
INSERT INTO `estado_jogador` VALUES (19,13,7,242),(20,11,7,244),(23,14,7,247),(24,17,9,407),(26,8,10,584),(39,41,10,604),(42,11,10,579),(43,44,10,580),(45,42,10,594),(51,46,10,585),(60,45,10,583),(61,47,10,596),(62,8,9,409),(64,6,10,582);
/*!40000 ALTER TABLE `estado_jogador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fichas`
--

DROP TABLE IF EXISTS `fichas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fichas` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_jogo` int(5) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `visivel_aluno` tinyint(1) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_jogo` (`id_jogo`),
  CONSTRAINT `fk_jogo_ficha` FOREIGN KEY (`id_jogo`) REFERENCES `jogo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fichas`
--

LOCK TABLES `fichas` WRITE;
/*!40000 ALTER TABLE `fichas` DISABLE KEYS */;
INSERT INTO `fichas` VALUES (3,2,'Ficha 2',0,0),(4,3,'Ficha Ã¡gua',0,0),(5,4,'Ficha Origam Da Vida',1,1),(6,5,'Ficha',0,0),(7,6,'Ficha',0,0),(9,2,'',0,0),(10,2,'',0,0),(11,7,'Ficha 1',0,0),(13,9,'Ficha',0,0),(14,10,'Ficha',0,0),(15,11,'Ficha',0,0),(16,12,'Ficha',0,0),(17,13,'Ficha',0,0),(18,14,'Ficha',0,0);
/*!40000 ALTER TABLE `fichas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jogador_ficha_campos`
--

DROP TABLE IF EXISTS `jogador_ficha_campos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jogador_ficha_campos` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_jogo` int(5) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `id_campo` int(5) NOT NULL,
  `conteudo` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jogo` (`id_jogo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_campo` (`id_campo`),
  CONSTRAINT `fk_campos_conteudo` FOREIGN KEY (`id_campo`) REFERENCES `campos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_jogo_campos_conteudo` FOREIGN KEY (`id_jogo`) REFERENCES `jogo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_campos_conteudo` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jogador_ficha_campos`
--

LOCK TABLES `jogador_ficha_campos` WRITE;
/*!40000 ALTER TABLE `jogador_ficha_campos` DISABLE KEYS */;
INSERT INTO `jogador_ficha_campos` VALUES (22,5,6,53,'Maria'),(23,5,6,54,'10'),(24,5,6,55,'B'),(25,5,6,56,'maria@teste.com'),(26,5,6,57,'teste'),(71,7,8,69,'teste'),(72,7,8,70,'3'),(73,7,11,69,'teste 2'),(74,7,11,70,'2'),(75,7,13,69,'teste 3'),(76,7,13,70,'3'),(77,7,14,69,'Eu Sou o Nº4'),(78,7,14,70,'4'),(79,7,12,69,'Marcelo Zanini'),(80,7,12,70,'6'),(123,7,6,69,''),(124,7,6,70,'0'),(147,10,6,94,'Aluno Teste Maria'),(148,10,6,95,'1'),(149,10,6,96,'10');
/*!40000 ALTER TABLE `jogador_ficha_campos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jogo`
--

DROP TABLE IF EXISTS `jogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jogo` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(5) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `cod_usuario` (`id_usuario`),
  CONSTRAINT `fk_usuario_jogo` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jogo`
--

LOCK TABLES `jogo` WRITE;
/*!40000 ALTER TABLE `jogo` DISABLE KEYS */;
INSERT INTO `jogo` VALUES (2,4,'Jogo 1',0,1),(3,4,'Água',0,1),(4,5,'Origem da Vida',1,1),(5,4,'Quiz teste',1,1),(6,4,'quiz 2',1,1),(7,9,'trítio',1,1),(9,5,'Ciclo Celular',1,1),(10,40,'halloween',1,1),(11,49,'Ciclo Celular',1,1),(12,49,'Países Asiáticos',1,1),(13,49,'Movimento Balístico',1,1),(14,49,'Tabela Periódica',1,1);
/*!40000 ALTER TABLE `jogo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mapa`
--

DROP TABLE IF EXISTS `mapa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mapa` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_jogo` int(5) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `principal` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `cod_jogo` (`id_jogo`),
  KEY `id` (`id`),
  KEY `id_3` (`id`),
  CONSTRAINT `fk_jogo_mapa` FOREIGN KEY (`id_jogo`) REFERENCES `jogo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mapa`
--

LOCK TABLES `mapa` WRITE;
/*!40000 ALTER TABLE `mapa` DISABLE KEYS */;
INSERT INTO `mapa` VALUES (1,2,'mundo','623e7a46001c3160c0197de29989d21d.jpg',0),(5,2,'asia','5a1800bc1ff78367a29804e544106111.jpg',0),(6,2,'europa','c18763fe35e9f69d11347b2cbd3a4950.jpg',0),(39,2,'teste3','cbdefc925601a4ec5245338f3fa36b24.jpg',0),(40,2,'teste novo','',0),(41,2,'teste novo','0890a40f1b594b807f9dae9edbac2850.jpg',1),(42,2,'vamos testar','98c3d820f6b1962a8301d35c9fe3b98c.jpg',0),(43,2,'Novo','77088c4f9471a3c61c4a7b5065289fe4.jpg',0),(44,5,'oi','1f493538ed5d6b34a52ed90a9f66e1b5.jpg',1),(45,6,'teste','d980744d1e411fdfc10dadbf0df31f26.jpg',1),(46,2,'teste 23/08','e10280abcad0db47306abf572916007a.jpg',0),(51,7,'mundo','b924635190f24f52ea78db8b397bfdae.jpg',0),(52,9,'celula','8ac07b598382d41b7f332255cefb5848.jpg',0),(53,10,'Halloween','ef8c616bb633bf09b6063d0074404596.jpg',0),(54,11,'celula','c94f154ebb0992bd72fb83d835e61a2a.jpg',0),(55,12,'mapa','4c61f74dee789ef8e34ee496349d4f83.jpg',0),(56,13,'gráfico','d7546e0fcc86a4740a7eeba0d1f1bbac.jpg',0),(57,14,'Elementum','7e9c672e5ea9412d820d3d31e0e2deb5.jpg',0);
/*!40000 ALTER TABLE `mapa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pergunta`
--

DROP TABLE IF EXISTS `pergunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pergunta` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_jogo` int(5) NOT NULL,
  `texto` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jogo` (`id_jogo`),
  CONSTRAINT `fk_jogo_pergunta` FOREIGN KEY (`id_jogo`) REFERENCES `jogo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pergunta`
--

LOCK TABLES `pergunta` WRITE;
/*!40000 ALTER TABLE `pergunta` DISABLE KEYS */;
INSERT INTO `pergunta` VALUES (1,4,'Pela teoria de Oparin, os primeiros seres surgidos na Terra teriam sido:'),(7,4,'Entre as modificações que ocorreram nas condições ambientais de nosso planeta, algumas foram\r\ncausadas pela própria atividade dos seres. Os organismos iniciais, ao realizarem a fermentação,\r\ndeterminaram uma grande alteração na atmosfera da Terra primitiva, porque nela introduziram o:'),(8,4,'Hoje admite-se que a primeira forma de vida tenha surgido em lagos da Terra primitiva, que\r\napresentava uma atmosfera diferente da atual. A partir desse acontecimento outros se sucederam,\r\nestabelecendo-se uma diversidade de formas e processos. A primeira forma de vida (I), a\r\ncomposição da atmosfera primitiva (II) e a provável seqüência de processos para obtenção de\r\nalimento e energia (III) conquistados pelos seres vivos foram, respectivamente:'),(10,5,'Quais  as principais características do mamíferos ?'),(11,5,'Quais são as moleculas da agua?'),(12,5,'Qual a principal função das mitocondrias ?'),(13,5,'qual o valor de pi ?'),(14,5,'o que h ?'),(15,5,'Quando é 4 +4 ?'),(16,5,'Qual o elemento quimico mais abundante na terra?'),(17,5,'Qual desse metais é o mais condutível ?'),(18,5,'O que define uma angiosperma ?'),(19,5,'Qual a reposta para a vida o universo e tudo mais ?'),(20,5,'Que evento originou o universo ?'),(21,2,'quem descobriu o Brasil?'),(22,6,'Pergunta teste 1 '),(23,7,'Qual a molecula da agua ?'),(24,7,'olá?'),(25,5,'O que é o elemento conhecido como trítio?'),(26,9,'Nos seres multicelulares, a mitose é um processo que tem como principal função?'),(27,9,'A meiose é um tipo de divisão celular na qual:'),(28,9,'Em relação ao processo de divisão celular, podemos afirmar que:'),(29,9,'O gato doméstico (Felis domestica) apresenta 38 cromossomos em suas células somáticas. No núcleo do óvulo normal de uma gata são esperados:'),(30,9,'Os produtos imediatos da meiose de uma abelha e de uma samambaia são:'),(31,9,'A vinblastina é um quimioterápico usado no tratamento de pacientes com câncer. Sabendo-se que essa substância impede a formação de microtúbulos, pode-se concluir que sua interferência no processo de multiplicação celular ocorre na:'),(32,9,'Um pesquisador que deseje estudar a divisão meiótica em samambaia deve utilizar em suas preparações microscópicas células de'),(33,9,'Em organismos unicelulares, divisão por mitose significa'),(34,9,'Considerando que uma espécie de ave apresenta 2n = 78 cromossomos é correto afirmar:'),(35,7,'1?'),(36,7,'2?'),(37,7,'3?'),(38,7,'4?'),(39,7,'5?'),(40,7,'6?'),(41,7,'7?'),(42,7,'8?'),(43,7,'9?'),(44,9,'Durante a meiose, o pareamento dos cromossomos homo?logos é importante porque garante:'),(45,9,'Um bebê apresenta cerca de 1 trilhão de células. Esse mesmo indivíduo, quando adulto, irá apresentar:'),(46,9,'Certos fármacos, como a colchicina, ligam-se às moléculas de tubulina e impedem que elas se associem para formar microtúbulos. Quando células em divisão são tratadas com essas substâncias, a mitose é interrompida na metáfase. Células contendo dois pares de cromossomos homólogos foram tratadas com colchicina, durante um ciclo celular. Após o tratamento, essas células ficaram com:'),(47,9,'Considere que as abelhas de uma espécie possuem 34 cromossomos, sendo que as fêmeas originam-se por reprodução sexuada e os machos, por partenogênese. É esperado que fêmeas e machos tenham nos núcleos de suas células somáticas, respectivamente:'),(48,9,'Para fazer o estudo de um cariótipo, qual a fase da mitose que seria mais adequada usar, tendo em vista a necessidade de se obter a maior nitidez dos cromossomos, em função do seu maior grau de espiralização?'),(49,9,'Mitose e Meiose são tipos de divisões celulares, que apresentam as seguintes características diferenciais:'),(50,9,'A professora explicava aos alunos que alguns tecidos e/ou órga?os são mais indicados para se obter células nas diferentes fases da mitose. Nos animais e vegetais, esses tecidos e/ou órgãos são, respectivamente:'),(51,9,'Qual alternativa representa a associação correta entre o tipo de divisa?o celular e os processos que ocorrem durante a divisão.'),(52,9,'As meioses espórica, gamética e zigótica ocorrem, respectivamente, em:'),(53,9,'Uma célula somática com 8 cromossomos durante a fase G1 da interfase, ao entrar na divisa?o mitótica, apresentará na metáfase ________  metafásicos, cada um com ________.'),(54,9,'A mosca de frutas apresenta 08 cromossomos nas ce?lulas soma?ticas. É correto afirmar, portanto, que uma célula somática do referido inseto apresenta:'),(55,10,'O que significa a sigla inglesa SOS?'),(56,10,'Nos túmulos de língua inglesa, vêm escrito as letras R.I.P. O que elas querem dizer?'),(57,10,'O que significa a expressão \"Night Owl\"'),(58,10,'Complete A Frase:\nThe pupils ________ the teacher this week.'),(59,10,'Complete A Frase:\nWe _______ in your garden all morning yesterday.'),(60,10,'Complete A Frase:\n _________ the young boys this month?'),(61,10,'Complete A Frase:\nJack _____________ at the CBS Company since he graduated from college.'),(62,10,'Complete A Frase:\nWhile I was going home I _____ an accident.'),(63,10,'Consider the verb form in the sentence below. '),(64,10,'Complete A Frase:\nAre you the person _____ car have been stolen?'),(65,10,'Complete a frase:\nThe Englishmen sat quite calm. ________ instinct helped a lot.'),(66,10,'Complete A Frase:\nI want to see the actor ____ refused the Oscar.'),(67,10,'Complete a frase:\nYesterday I saw a friend of ________ talking to ________ neighbor.'),(68,10,'Complete a frase:\nThe man from _____ you borrowed the pencil is one of the examiners.'),(69,10,'Complete a frase:\nCan\'t you give me an explanation ________ you\'ve changed your mind?'),(70,10,'\"She is a good baby-sitter.\" In the plural form:'),(71,10,'Let\'s go to _______________.'),(72,10,'My _______________ are usually quite good.'),(73,10,'Escolha a alternativa correta que apresenta um sinônimo da palavra HUNGRY.'),(74,10,'Escolha a alternativa correta que apresenta um sinônimo da palavra HORRIBLE.'),(75,10,'Em português, a palavra Bark significa?'),(76,10,'Em português, a palavra Policy significa?'),(77,10,'Quais são os passados do verbo be ?'),(78,14,'o que significa H na tabela periódica?');
/*!40000 ALTER TABLE `pergunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pergunta_jogador`
--

DROP TABLE IF EXISTS `pergunta_jogador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pergunta_jogador` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_jogo` int(5) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `id_pergunta` int(5) NOT NULL,
  `id_resposta` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_resposta` (`id_resposta`),
  KEY `id_jogo` (`id_jogo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_pergunta` (`id_pergunta`),
  CONSTRAINT `fk_jogo_pergunta_jogador` FOREIGN KEY (`id_jogo`) REFERENCES `jogo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pergunta_jogador` FOREIGN KEY (`id_pergunta`) REFERENCES `pergunta` (`id`),
  CONSTRAINT `fk_resposta_pergunta_jogador` FOREIGN KEY (`id_resposta`) REFERENCES `respostas` (`id_resposta`),
  CONSTRAINT `fk_usuario_pergunta_jogador` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=719 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pergunta_jogador`
--

LOCK TABLES `pergunta_jogador` WRITE;
/*!40000 ALTER TABLE `pergunta_jogador` DISABLE KEYS */;
INSERT INTO `pergunta_jogador` VALUES (89,5,6,19,74),(92,5,12,17,61),(93,5,12,11,31),(94,5,12,12,40),(95,5,12,20,79),(96,5,12,25,119),(97,5,12,15,51),(98,5,12,13,41),(99,5,12,19,74),(146,7,11,40,240),(147,7,13,40,240),(148,7,11,43,251),(149,7,11,38,229),(150,7,13,24,104),(151,7,14,39,234),(152,7,14,35,214),(153,7,14,42,250),(154,7,11,42,250),(155,7,14,43,251),(156,7,8,41,245),(157,7,14,36,217),(158,7,14,23,91),(159,7,14,23,91),(160,7,14,38,229),(161,7,14,24,104),(162,7,14,37,223),(163,9,15,32,177),(164,9,15,26,135),(165,9,15,27,143),(166,9,15,50,330),(167,9,23,28,149),(168,9,15,54,351),(169,9,17,28,149),(170,9,17,26,135),(171,9,27,26,135),(172,9,17,47,311),(173,9,15,46,306),(174,9,19,53,347),(175,9,17,50,327),(176,9,27,45,304),(177,9,27,45,304),(178,9,15,49,322),(179,9,19,27,141),(180,9,17,54,351),(181,9,26,26,135),(182,9,27,45,304),(183,9,19,44,294),(184,9,27,45,304),(185,9,19,44,294),(186,9,19,44,294),(187,9,27,45,304),(188,9,23,51,333),(189,9,15,29,159),(190,9,17,30,267),(191,9,17,30,267),(192,9,17,30,267),(193,9,28,32,176),(194,9,36,31,264),(195,9,23,32,180),(196,9,24,51,335),(197,9,21,46,310),(198,9,30,26,135),(199,9,29,53,347),(200,9,17,52,344),(201,9,21,26,134),(202,9,18,45,304),(203,9,17,27,142),(204,9,24,47,314),(205,9,19,49,325),(206,9,15,52,345),(207,9,26,28,146),(208,9,17,46,307),(209,9,19,47,311),(210,9,21,34,289),(211,9,31,30,270),(212,9,21,47,311),(213,9,39,44,292),(214,9,19,45,305),(215,9,29,51,332),(216,9,21,54,351),(217,9,19,29,156),(218,9,31,27,142),(219,9,31,27,142),(220,9,17,31,263),(221,9,31,27,142),(222,9,36,27,142),(223,9,39,33,279),(224,9,28,44,292),(225,9,19,26,132),(226,9,27,52,343),(227,9,29,27,143),(228,9,21,48,316),(229,9,22,33,278),(230,9,22,33,278),(231,9,26,44,292),(232,9,39,28,146),(233,9,22,33,278),(234,9,24,44,293),(235,9,23,29,159),(236,9,17,32,180),(237,9,17,32,180),(238,9,17,32,180),(239,9,27,28,149),(240,9,28,33,276),(241,9,24,27,143),(242,9,17,33,279),(243,9,29,48,320),(244,9,16,26,134),(245,9,30,47,314),(246,9,15,51,332),(247,9,16,50,329),(248,9,30,34,286),(249,9,26,33,279),(250,9,36,49,322),(251,9,24,45,303),(252,9,29,45,302),(253,9,25,49,321),(254,9,21,50,330),(255,9,30,48,320),(256,9,23,44,294),(257,9,24,48,320),(258,9,26,48,318),(259,9,17,48,317),(260,9,39,53,348),(261,9,29,47,312),(262,9,27,50,329),(263,9,19,34,290),(264,9,16,28,146),(265,9,19,30,267),(266,9,31,51,335),(267,9,26,29,156),(268,9,30,28,149),(269,9,28,29,157),(270,9,36,33,277),(271,9,27,49,325),(272,9,19,52,345),(273,9,23,34,290),(274,9,24,26,134),(275,9,17,53,350),(276,9,24,33,279),(277,9,19,54,352),(278,9,30,49,325),(279,9,31,32,180),(280,9,27,44,294),(281,9,21,27,143),(282,9,19,33,279),(283,9,26,32,176),(284,9,18,53,350),(285,9,31,26,135),(286,9,27,48,320),(287,9,25,47,311),(288,9,29,34,286),(289,9,24,49,322),(290,9,22,44,293),(291,9,19,28,149),(292,9,27,33,279),(293,9,30,45,301),(294,9,20,46,310),(295,9,27,27,142),(296,9,30,30,267),(297,9,21,45,304),(298,9,26,27,143),(299,9,16,30,267),(300,9,17,51,331),(301,9,18,26,135),(302,9,17,51,331),(303,9,16,27,142),(304,9,28,31,265),(305,9,36,46,306),(306,9,25,32,177),(307,9,22,48,320),(308,9,30,51,332),(309,9,16,53,349),(310,9,27,47,311),(311,9,24,28,150),(312,9,15,30,267),(313,9,26,31,263),(314,9,19,32,178),(315,9,29,44,294),(316,9,30,29,157),(317,9,31,49,322),(318,9,28,27,142),(319,9,39,51,334),(320,9,17,45,304),(321,9,25,51,332),(322,9,30,27,142),(323,9,19,31,261),(324,9,39,27,141),(325,9,22,47,311),(326,9,36,52,341),(327,9,16,46,306),(328,9,21,33,279),(329,9,29,49,322),(330,9,23,47,312),(331,9,26,46,306),(332,9,15,28,149),(333,9,19,50,329),(334,9,30,52,342),(335,9,16,32,178),(336,9,30,33,277),(337,9,39,48,320),(338,9,29,29,156),(339,9,36,51,332),(340,9,31,28,149),(341,9,27,29,156),(342,9,22,45,304),(343,9,17,44,292),(344,9,19,51,332),(345,9,15,45,304),(346,9,20,52,344),(347,9,26,34,286),(348,9,16,33,279),(349,9,19,48,316),(350,9,18,50,326),(351,9,25,29,156),(352,9,20,33,279),(353,9,36,26,135),(354,9,23,54,351),(355,9,21,49,325),(356,9,22,54,352),(357,9,19,46,307),(358,9,30,32,178),(359,9,17,34,289),(360,9,17,34,289),(361,9,16,47,311),(362,9,15,53,349),(363,9,18,27,142),(364,9,22,53,347),(365,9,39,26,132),(366,9,25,27,142),(367,9,20,31,263),(368,9,27,32,180),(369,9,26,30,266),(370,9,29,28,147),(371,9,24,30,270),(372,9,16,48,320),(373,9,39,34,286),(374,9,30,31,264),(375,9,28,54,352),(376,9,22,51,332),(377,9,36,47,311),(378,9,21,53,349),(379,9,23,53,350),(380,9,26,54,351),(381,9,25,33,279),(382,9,39,45,304),(383,9,16,52,342),(384,9,17,49,322),(385,9,27,31,264),(386,9,15,47,311),(387,9,20,45,302),(388,9,16,54,354),(389,9,26,53,349),(390,9,36,45,301),(391,9,39,47,312),(392,9,27,54,352),(393,9,16,31,264),(394,9,24,52,343),(395,9,25,28,149),(396,9,22,46,310),(397,9,28,30,267),(398,9,30,54,351),(399,9,21,52,345),(400,9,18,47,311),(401,9,24,32,180),(402,9,16,29,156),(403,9,26,49,325),(404,9,31,54,351),(405,9,15,44,294),(406,9,31,33,277),(407,9,27,51,334),(408,9,20,30,266),(409,9,28,26,131),(410,9,29,30,267),(411,9,17,29,157),(412,9,16,49,321),(413,9,21,29,159),(414,9,27,34,288),(415,9,16,44,294),(416,9,18,32,180),(417,9,36,54,352),(418,9,36,54,352),(419,9,28,48,318),(420,9,30,50,330),(421,9,27,30,266),(422,9,16,45,304),(423,9,22,28,149),(424,9,26,45,304),(425,9,15,34,288),(426,9,16,34,289),(427,9,16,51,333),(428,9,30,46,306),(429,9,30,44,294),(430,9,25,50,326),(431,9,31,47,311),(432,9,26,51,335),(433,9,30,53,348),(434,9,31,50,327),(435,9,27,46,306),(436,9,15,33,279),(437,9,22,34,290),(438,9,24,29,160),(439,9,21,30,270),(440,9,21,30,270),(441,9,21,30,270),(442,9,28,51,332),(443,9,26,52,343),(444,9,39,52,344),(445,9,23,49,321),(446,9,15,48,320),(447,9,24,53,347),(448,9,20,53,349),(449,9,18,31,263),(450,9,29,33,279),(451,9,39,30,268),(452,9,15,31,263),(453,9,28,28,149),(454,9,26,47,311),(455,9,24,54,354),(456,9,25,52,343),(457,9,21,28,148),(458,9,20,44,292),(459,9,22,49,321),(460,9,39,50,330),(461,9,26,50,327),(462,9,28,49,324),(463,9,29,50,326),(464,9,23,33,276),(465,9,39,54,351),(466,9,18,51,331),(467,9,21,31,263),(468,9,29,31,264),(469,9,31,45,304),(470,9,25,26,134),(471,9,21,51,334),(472,9,24,34,286),(473,9,18,29,159),(474,9,24,31,262),(475,9,29,52,343),(476,9,24,46,310),(477,9,31,52,343),(478,9,21,32,177),(479,9,25,46,310),(480,9,29,26,132),(481,9,31,29,156),(482,9,39,29,157),(483,9,25,44,294),(484,9,24,50,328),(485,9,25,30,267),(486,9,31,48,320),(487,9,29,46,306),(488,9,25,48,320),(489,9,31,34,286),(490,9,31,34,286),(491,9,31,34,286),(492,9,25,45,301),(493,9,25,53,347),(494,9,29,32,180),(495,9,29,54,354),(496,9,25,34,286),(497,9,25,31,263),(498,9,25,54,352),(499,10,8,76,641),(500,10,8,66,507),(501,10,41,70,574),(502,10,41,64,566),(503,10,41,57,491),(504,10,44,59,516),(505,10,41,72,586),(506,10,41,72,586),(507,10,41,72,586),(508,10,42,74,604),(509,10,42,74,604),(510,10,42,74,604),(511,10,41,76,641),(512,10,41,58,515),(513,10,44,61,526),(514,10,41,63,541),(515,10,41,61,528),(516,10,42,58,512),(517,10,41,55,359),(518,10,41,59,519),(519,10,42,69,564),(520,10,44,63,542),(521,10,41,56,497),(522,10,11,67,553),(523,10,41,74,601),(524,10,42,66,507),(525,10,41,62,531),(526,10,11,72,586),(527,10,41,77,646),(528,10,42,75,637),(529,10,44,60,524),(530,10,41,66,506),(531,10,11,68,558),(532,10,41,73,609),(533,10,42,56,497),(534,10,11,71,595),(535,10,41,68,556),(536,10,41,67,551),(537,10,44,66,509),(538,10,42,57,491),(539,10,41,65,546),(540,10,11,58,514),(541,10,44,74,601),(542,10,41,71,591),(543,10,41,60,522),(544,10,41,60,522),(545,10,42,68,557),(546,10,44,57,491),(547,10,44,57,491),(548,10,44,57,491),(549,10,44,57,491),(550,10,44,57,491),(551,10,44,57,491),(552,10,44,57,491),(553,10,44,57,491),(554,10,44,57,491),(555,10,11,74,601),(556,10,42,77,647),(557,10,11,60,521),(558,10,41,69,564),(559,10,42,62,531),(560,10,41,75,637),(561,10,11,65,546),(562,10,11,66,506),(563,10,42,72,588),(564,10,11,73,608),(565,10,11,56,496),(566,10,42,61,528),(567,10,44,67,551),(568,10,11,64,568),(569,10,11,55,359),(570,10,44,56,497),(571,10,42,67,551),(572,10,11,76,642),(573,10,44,76,642),(574,10,11,57,491),(575,10,11,61,526),(576,10,44,77,649),(577,10,42,55,358),(578,10,11,75,637),(579,10,11,59,518),(580,10,42,60,524),(581,10,11,77,647),(582,10,44,65,546),(583,10,44,65,546),(584,10,44,65,546),(585,10,11,62,531),(586,10,42,70,571),(587,10,11,62,531),(588,10,11,62,531),(589,10,11,62,531),(590,10,11,62,531),(591,10,11,62,531),(592,10,11,62,531),(593,10,11,62,531),(594,10,11,62,531),(595,10,42,63,545),(596,10,42,63,545),(597,10,42,63,545),(598,10,42,63,545),(599,10,11,70,574),(600,10,42,63,545),(601,10,44,68,558),(602,10,11,63,542),(603,10,11,69,564),(604,10,44,69,564),(605,10,42,59,519),(606,10,42,71,591),(607,10,44,58,515),(608,10,42,64,566),(609,10,44,62,533),(610,10,44,73,610),(611,10,42,65,549),(612,10,42,73,610),(613,10,44,64,567),(614,10,42,76,642),(615,10,44,75,636),(616,10,44,55,356),(617,10,44,72,590),(618,10,44,71,594),(619,10,44,70,574),(620,10,47,56,497),(621,10,47,65,546),(622,10,46,58,514),(623,10,45,69,564),(624,10,46,76,642),(625,10,46,74,604),(626,10,45,75,638),(627,10,47,70,572),(628,10,47,69,564),(629,10,46,73,607),(630,10,47,76,641),(631,10,46,66,507),(632,10,47,57,491),(633,10,47,57,491),(634,10,45,77,649),(635,10,47,57,491),(636,10,47,57,491),(637,10,47,57,491),(638,10,46,56,497),(639,10,46,56,497),(640,10,46,56,497),(641,10,46,56,497),(642,10,46,56,497),(643,10,46,56,497),(644,10,46,56,497),(645,10,46,72,586),(646,10,46,72,586),(647,10,47,66,507),(648,10,45,73,610),(649,10,46,62,534),(650,10,47,68,560),(651,10,46,60,525),(652,10,46,60,525),(653,10,46,60,525),(654,10,46,64,566),(655,10,45,72,586),(656,10,47,63,543),(657,10,46,77,647),(658,10,46,68,558),(659,10,47,67,553),(660,10,46,67,552),(661,10,46,57,491),(662,10,46,75,637),(663,10,47,58,512),(664,10,47,58,513),(665,10,47,58,513),(666,10,45,60,525),(667,10,46,59,516),(668,10,47,73,609),(669,10,46,63,543),(670,10,46,70,572),(671,10,45,63,541),(672,10,47,74,604),(673,10,46,61,526),(674,10,45,61,528),(675,10,46,69,564),(676,10,45,76,641),(677,10,47,75,638),(678,10,47,61,526),(679,10,46,55,360),(680,10,47,62,531),(681,10,45,68,556),(682,10,47,55,359),(683,10,45,57,491),(684,10,45,57,491),(685,10,45,57,491),(686,10,45,57,491),(687,10,45,57,491),(688,10,45,57,491),(689,10,45,57,491),(690,10,45,56,497),(691,10,47,60,521),(692,10,47,64,570),(693,10,45,74,604),(694,10,45,55,359),(695,10,47,71,591),(696,10,45,66,507),(697,10,47,72,590),(698,10,47,77,649),(699,10,45,67,551),(700,10,45,59,518),(701,10,45,62,531),(702,10,45,65,550),(703,10,45,64,570),(704,10,45,71,591),(705,10,45,71,591),(706,10,45,71,591),(707,10,45,70,571),(708,10,45,58,511),(709,9,8,32,176),(710,9,8,46,306),(711,9,8,31,263),(712,9,8,27,142),(713,10,48,77,648),(714,10,48,61,528),(715,10,6,63,541),(716,10,6,77,649),(717,10,6,67,552),(718,10,6,74,604);
/*!40000 ALTER TABLE `pergunta_jogador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pontomapa`
--

DROP TABLE IF EXISTS `pontomapa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pontomapa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapa` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `submapa` int(11) NOT NULL,
  `coordenadas` text NOT NULL,
  `texto` text NOT NULL,
  `tipo` int(11) NOT NULL,
  `ordem` int(5) NOT NULL,
  `disparar_pergunta` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=630 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pontomapa`
--

LOCK TABLES `pontomapa` WRITE;
/*!40000 ALTER TABLE `pontomapa` DISABLE KEYS */;
INSERT INTO `pontomapa` VALUES (186,44,'Inicio',0,'LatLng(190.81667, 45.25)','',0,0,0),(187,44,'Hidrogenio',0,'LatLng(185.81667, 97.75)','',0,1,1),(188,44,'Helio',0,'LatLng(188.81667, 140.75)','',0,2,1),(189,44,'Bario',0,'LatLng(188.81667, 170.75)','',0,3,1),(190,44,'C',0,'LatLng(186.31667, 210.75)','',0,4,1),(191,44,'N',0,'LatLng(186.31667, 243.75)','',0,5,1),(192,44,'O',0,'LatLng(186.31667, 294.75)','',0,6,1),(193,44,'F',0,'LatLng(190.31667, 335.25)','',0,7,1),(194,44,'CL',0,'LatLng(103.81667, 323.75)','',0,8,1),(195,44,'K',0,'LatLng(102.31667, 284.25)','',0,9,1),(196,44,'ca',0,'LatLng(103.15833, 250.125)','',0,10,1),(197,44,'ti',0,'LatLng(105.15833, 215.875)','',0,11,1),(198,44,'FE',0,'LatLng(107.65833, 176.625)','',0,12,1),(199,44,'Cu',0,'LatLng(102.90833, 136.125)','',0,13,1),(200,44,'Zn',0,'LatLng(107.40833, 99.875)','',0,14,1),(201,44,'Au',0,'LatLng(41.90833, 98.625)','',0,15,1),(202,44,'Hg',0,'LatLng(42.90833, 134.125)','',0,16,1),(203,44,'Pb',0,'LatLng(42.65833, 168.625)','',0,17,1),(204,44,'Po',0,'LatLng(42.31667, 212.94167)','',0,18,1),(205,44,'Ra',0,'LatLng(43.31667, 254.44167)','',0,19,1),(206,44,'PU',0,'LatLng(39.81667, 295.44167)','',0,20,1),(213,45,'oi',0,'LatLng(180.56667, 186.44167)','',0,0,0),(214,45,'ola',0,'LatLng(187.56667, 225.94167)','',0,1,0),(215,45,'oi',0,'LatLng(190.06667, 285.44167)','',0,2,0),(216,45,'helio',0,'LatLng(187.06667, 138.44167)','',0,3,0),(238,51,'usa',0,'LatLng(190.64167, 75.25)','',0,0,1),(239,51,'grenlandia',0,'LatLng(231.64167, 154.25)','',0,1,1),(240,51,'europa',0,'LatLng(206.64167, 184.25)','',0,2,1),(241,51,'asia',0,'LatLng(206.14167, 238.25)','',0,3,1),(242,51,'russia',0,'LatLng(194.06667, 301.25)','',0,4,1),(243,51,'Egito',0,'LatLng(164.06667, 179.75)','',0,5,1),(244,51,'africa',0,'LatLng(137.14167, 213.75)','',0,6,1),(245,51,'Brasilia',0,'LatLng(107.56667, 115.75)','',0,7,1),(246,51,'pantanal',0,'LatLng(49.82083, 106.125)','',0,8,1),(247,51,'artico',0,'LatLng(9.64166, 227.25)','',0,9,1),(404,52,'Inicio',0,'LatLng(218.5, 35.25)','',0,0,0),(405,52,'1',0,'LatLng(186, 42.75)','',0,1,1),(406,52,'2',0,'LatLng(178, 69.25)','',0,2,1),(407,52,'3',0,'LatLng(195.5, 91.75)','',0,3,1),(408,52,'Matriz',0,'LatLng(202.5, 112.75)','',0,4,1),(409,52,'4',0,'LatLng(218, 124.75)','',0,5,1),(410,52,'5',0,'LatLng(217, 157.25)','',0,6,1),(411,52,'Membrana',0,'LatLng(193, 181.75)','',0,7,1),(412,52,'6',0,'LatLng(165.5, 168.75)','',0,8,1),(413,52,'7',0,'LatLng(158, 139.25)','',0,9,1),(414,52,'8',0,'LatLng(148, 114.25)','',0,10,1),(415,52,'Mitocondria',0,'LatLng(139, 95.75)','',0,11,1),(416,52,'9',0,'LatLng(123, 66.25)','',0,12,1),(417,52,'10',0,'LatLng(100, 55.25)','',0,13,1),(418,52,'Lisossomo',0,'LatLng(79.5, 83.25)','',0,14,1),(419,52,'11',0,'LatLng(57.5, 53.75)','',0,15,1),(420,52,'12',0,'LatLng(39.5, 77.75)','',0,16,1),(421,52,'13',0,'LatLng(36.5, 107.25)','',0,17,1),(422,52,'14',0,'LatLng(34, 136.75)','',0,18,1),(423,52,'Peroxissomo',0,'LatLng(46.5, 154.75)','',0,19,1),(424,52,'15',0,'LatLng(30, 167.75)','',0,20,1),(425,52,'16',0,'LatLng(31.5, 199.75)','',0,21,1),(426,52,'Retículo',0,'LatLng(58.5, 220.25)','',0,22,1),(427,52,'17',0,'LatLng(52.5, 243.75)','',0,23,1),(428,52,'18',0,'LatLng(66.5, 268.75)','',0,24,1),(429,52,'Centríolo',0,'LatLng(90.5, 280.75)','',0,25,1),(430,52,'19',0,'LatLng(75.5, 313.25)','',0,26,1),(431,52,'20',0,'LatLng(84, 338.25)','',0,27,1),(432,52,'Golgi',0,'LatLng(120, 337.75)','',0,28,1),(433,52,'21',0,'LatLng(140.5, 309.75)','',0,29,1),(434,52,'22',0,'LatLng(137, 277.75)','',0,30,1),(435,52,'Citoesqueleto',0,'LatLng(160.5, 257.75)','',0,31,1),(436,52,'23',0,'LatLng(147.5, 225.25)','',0,32,1),(437,52,'24',0,'LatLng(144.5, 191.25)','',0,33,1),(438,52,'25',0,'LatLng(125.5, 175.75)','',0,34,1),(439,52,'Núcleo-Fim',0,'LatLng(98.5, 195.75)','',0,35,0),(573,53,'1-inicio',0,'LatLng(192.5, 24.25)','',0,0,0),(574,53,'2',0,'LatLng(171, 23.5)','',0,1,1),(575,53,'3',0,'LatLng(149.5, 34)','',0,2,1),(576,53,'4',0,'LatLng(145, 58.5)','',0,3,1),(577,53,'5',0,'LatLng(156, 81.5)','',0,4,1),(578,53,'6',0,'LatLng(176.5, 93.5)','',0,5,1),(579,53,'7',0,'LatLng(198.5, 99)','',0,6,1),(580,53,'8',0,'LatLng(215, 119)','',0,7,1),(581,53,'9',0,'LatLng(217, 144)','',0,8,1),(582,53,'10',0,'LatLng(202, 163.5)','',0,9,1),(583,53,'11',0,'LatLng(179.5, 170.5)','',0,10,1),(584,53,'12',0,'LatLng(158.5, 164.5)','',0,11,1),(585,53,'13',0,'LatLng(139, 149)','',0,12,1),(586,53,'14',0,'LatLng(123.5, 129.5)','',0,13,1),(587,53,'15',0,'LatLng(109.5, 109)','',0,14,1),(588,53,'16',0,'LatLng(95.5, 87.5)','',0,15,1),(589,53,'17',0,'LatLng(78, 69)','',0,16,1),(590,53,'18',0,'LatLng(58.5, 61.5)','',0,17,1),(591,53,'19',0,'LatLng(39, 76)','',0,18,1),(592,53,'20',0,'LatLng(27, 99.5)','',0,19,1),(593,53,'21',0,'LatLng(21.5, 125.5)','',0,20,1),(594,53,'22',0,'LatLng(20.5, 152)','',0,21,1),(595,53,'23',0,'LatLng(26, 177.5)','',0,22,1),(596,53,'24',0,'LatLng(36.5, 199.5)','',0,23,1),(597,53,'25',0,'LatLng(54, 218.5)','',0,24,1),(598,53,'26',0,'LatLng(75.5, 228.5)','',0,25,1),(599,53,'27',0,'LatLng(98, 230.5)','',0,26,1),(600,53,'28',0,'LatLng(121, 231)','',0,27,1),(601,53,'29',0,'LatLng(143, 228.5)','',0,28,1),(602,53,'30',0,'LatLng(167, 228.5)','',0,29,1),(603,53,'31',0,'LatLng(189, 235)','',0,30,1),(604,53,'32',0,'LatLng(207.5, 249.5)','',0,31,1),(605,53,'33',0,'LatLng(219, 273)','',0,32,1),(606,53,'34',0,'LatLng(215, 298)','',0,33,1),(607,53,'35',0,'LatLng(202, 320)','',0,34,1),(608,53,'36',0,'LatLng(182.5, 333)','',0,35,1),(609,53,'37',0,'LatLng(160, 337)','',0,36,1),(610,53,'38',0,'LatLng(137.5, 336.5)','',0,37,1),(611,53,'39',0,'LatLng(114.5, 333.5)','',0,38,1),(612,53,'40',0,'LatLng(93, 323)','',0,39,1),(613,53,'41',0,'LatLng(74, 311)','',0,40,1),(614,53,'42',0,'LatLng(53.5, 300.5)','',0,41,1),(615,53,'43',0,'LatLng(34.5, 314.5)','',0,42,1),(616,53,'44',0,'LatLng(34, 341)','',0,43,1),(617,53,'45',0,'LatLng(47.5, 363)','',0,44,1),(618,53,'46-Chegada',0,'LatLng(68.5, 372)','',0,45,0),(625,57,'Inicio',0,'LatLng(222.86667, 43.7)','',0,0,0),(626,57,'H',0,'LatLng(221.86667, 96.7)','',0,1,1),(627,57,'HE',0,'LatLng(225.56667, 133.7)','hélio',0,2,1),(628,57,'',0,'LatLng(225.06667, 168.7)','',0,3,0),(629,57,'C',0,'LatLng(225.06667, 204.2)','',0,4,0);
/*!40000 ALTER TABLE `pontomapa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respostas`
--

DROP TABLE IF EXISTS `respostas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respostas` (
  `id_resposta` int(5) NOT NULL AUTO_INCREMENT,
  `id_pergunta` int(5) NOT NULL,
  `texto` varchar(500) NOT NULL,
  `resp_cert` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_resposta`),
  KEY `id_pergunta` (`id_pergunta`),
  CONSTRAINT `fk_pergunta_resposta` FOREIGN KEY (`id_pergunta`) REFERENCES `pergunta` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=661 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respostas`
--

LOCK TABLES `respostas` WRITE;
/*!40000 ALTER TABLE `respostas` DISABLE KEYS */;
INSERT INTO `respostas` VALUES (1,1,'heterótrofos e anaeróbios',1),(2,1,'heterótrofos e aeróbios',0),(3,1,'autótrofos e heterótrofos',0),(4,1,'autótrofos e anaeróbios',0),(5,1,'autótrofos e aeróbios',0),(6,7,'gás carbônico.',1),(7,7,'gás oxigênio.',0),(8,7,'gás nitrogênio.',0),(9,7,'gás metano.',0),(10,7,'vapor d&#39;água.',0),(11,8,'I = heterótrofa; II = sem oxigênio; III = heterotrófico, fermentação, fotossíntese, respiração aeróbica',1),(12,8,'I = autótrofa; II = com oxigênio; III = fotossíntese, fermentação, heterotrófico, respiração aeróbica',0),(13,8,'I = autótrofa; II = sem oxigênio; III = fotossíntese, fermentação, heterotrófico, respiração aeróbica',0),(14,8,'I = heterótrofa; II = sem oxigênio; III = heterotrófico, respiração aeróbica, fotossíntese, fermentação',0),(15,8,'I = heterótrofa; II = com oxigênio; III = heterotrófico, respiração aeróbica, fotossíntese, fermentação',0),(31,11,'h20',1),(32,11,'co2',0),(33,11,'h',0),(34,11,'n',0),(35,11,'K',0),(36,12,'sintese de proteina ',0),(37,12,'replicação do dna',0),(38,12,'fornecer energia ',0),(39,12,'RNA',0),(40,12,'Respiração',1),(41,13,'3.14',1),(42,13,'3.22',0),(43,13,'3.55',0),(44,13,'42',0),(45,13,'24',0),(46,14,'helio',0),(47,14,'hidrogenio',1),(48,14,'hidroxido de sodio',0),(49,14,'hipocloreto de potassio',0),(50,14,'naosei',0),(51,15,'8',1),(52,15,'2',0),(53,15,'9',0),(54,15,'10',0),(55,15,'50',0),(56,16,'O',0),(57,16,'C',1),(58,16,'N',0),(59,16,'H',0),(60,16,'Au',0),(61,17,'Ouro',1),(62,17,'Prata',0),(63,17,'Aluminio',0),(64,17,'Ferro',0),(65,17,'Cobre',0),(66,18,'Flores',0),(67,18,'Frutos',0),(68,18,'Flores e frutos',1),(69,18,'Fotossitese',0),(70,18,'Folhas ',0),(71,19,'Equilibrio',0),(72,19,'Inteligencia Artificial ',0),(73,19,'Robos',0),(74,19,'42',1),(75,19,'52',0),(76,20,'Teoria dos homosapiens',0),(77,20,'Teoria do pudim de passas ',0),(78,20,'Teoria do caos',0),(79,20,'Teria do big bang',1),(80,20,'Teoria do big ben',0),(81,21,'Maria Antonieta',0),(82,21,'Cristovão Colombo',0),(83,21,'Sheik de Ferro',0),(84,21,'Pedro Alvares Cabral',1),(85,21,'Marie Currie',0),(86,22,' teste 1 ',0),(87,22,' teste 2',0),(88,22,' teste 3',1),(89,22,'teste 4',0),(90,22,'teste 5',0),(91,23,'H20',1),(92,23,'CO2',0),(93,23,'CO3',0),(94,23,'H3O',0),(95,23,'AG3',0),(101,24,'1',0),(102,24,'2',0),(103,24,'3',0),(104,24,'olá',1),(105,24,'5',0),(106,10,'pelos',0),(107,10,'gladulas mamarias',1),(108,10,'Coluna vetebral',0),(109,10,'Produzir Oxigenio e consumir co2',0),(110,10,'Capcidade de raciocineo',0),(116,25,'Um elemento quimico da ficção científica.',0),(117,25,'A forma mais abundante de hélio no planeta.',0),(118,25,'Um elemento teórico com mais de 300 prótons.',0),(119,25,'Uma forma de hidrogênio com 2 neutrons',1),(120,25,'Uma Ligação covalente entre 3 hidrogênios',0),(131,26,'o movimento celular.',0),(132,26,'a produção de gametas.',0),(133,26,'a produção de energia.',0),(134,26,'a expressão gênica.',0),(135,26,'o crescimento.',1),(141,27,'uma célula diplóide origina outra célula diplóide',0),(142,27,'uma célula diplóide origina 4 células haplóides',1),(143,27,'uma célula diplóide origina 2 células haplóides',0),(144,27,'uma célula hapóide origina 4 células haplóides',0),(145,27,'uma célula diplóide origina 4 células diplóides',0),(146,28,'a mitose consiste em duas divisões celulares sucessivas.',0),(147,28,'os óvulos e os espermatozóides são produzidos por divisões mitóticas.',0),(148,28,'durante a meiose não ocorre a permutação ou \"crossing- over\".',0),(149,28,'a meiose é um processo que dá origem a quatro células haplóides.',1),(150,28,'durante a mitose as cromátides irmãs não se separam.',0),(156,29,'19 cromossomos simples e 19 moléculas de DNA.',1),(157,29,'19 cromossomos duplicados e 38 moléculas de DNA.',0),(158,29,'38 cromossomos simples e 38 moléculas de DNA.',0),(159,29,'38 cromossomos simples e 19 moléculas de DNA.',0),(160,29,'19 cromossomos duplicados e 19 moléculas de DNA.',0),(176,32,'embrião recém-formado.',0),(177,32,'rizoma da samambaia.',0),(178,32,'soros da samambaia.',0),(179,32,'rizóides do prótalo.',0),(180,32,'estruturas reprodutivas do prótalo.',1),(211,35,'2',0),(212,35,'1',1),(213,35,'3',0),(214,35,'4',0),(215,35,'5',0),(216,36,'1',0),(217,36,'2',1),(218,36,'3',0),(219,36,'4',0),(220,36,'5',0),(221,37,'1',0),(222,37,'2',0),(223,37,'3',1),(224,37,'4',0),(225,37,'5',0),(226,38,'1',0),(227,38,'2',0),(228,38,'3',0),(229,38,'4',1),(230,38,'5',0),(231,39,'1',0),(232,39,'2',0),(233,39,'3',0),(234,39,'4',0),(235,39,'5',1),(236,40,'2',0),(237,40,'3',0),(238,40,'3',0),(239,40,'5',0),(240,40,'6',1),(241,41,'1',0),(242,41,'2',0),(243,41,'3',0),(244,41,'5',0),(245,41,'7',1),(246,42,'1',0),(247,42,'2',0),(248,42,'3',0),(249,42,'7',0),(250,42,'8',1),(251,43,'9',1),(252,43,'10',0),(253,43,'4',0),(254,43,'5',0),(255,43,'5',0),(261,31,'condensação dos cromossomos.',0),(262,31,'descondensação dos cromossomos.',1),(263,31,'duplicação dos cromossomos.',0),(264,31,'migração dos cromossomos.',0),(265,31,'reorganização dos nucléolos.',0),(266,30,'esporos e gametas, respectivamente.',0),(267,30,'gametas e esporos, respectivamente.',1),(268,30,'gametas e zigotos, respectivamente.',0),(269,30,'ambos esporos.',0),(270,30,'ambos gametas.',0),(276,33,'crescimento.',0),(277,33,'regeneração.',0),(278,33,'recombinação.',0),(279,33,'reprodução.',1),(280,33,'gametogênese.',0),(286,34,'Um gameta tem 39 cromossomos autossomos e 2 cromossomos sexuais.',0),(287,34,' Um gameta tem 38 cromossomos autossomos e 2 cromossomos sexuais.',0),(288,34,'Um gameta tem 38 cromossomos autossomos e 1 cromossomo sexual.',1),(289,34,'Uma célula somática tem 77 cromossomos autossomos e 1 cromossomo sexual.',0),(290,34,'Uma célula somática tem 78 cromossomos autossomos e 2 cromossomos sexuais.',0),(291,44,'a separação dos cromossomos não homólogos.',0),(292,44,'a duplicac?a?o do DNA, indispensável a esse processo.',0),(293,44,'a formac?a?o de células filhas geneticamente idênticas a? ce?lula ma?e.',0),(294,44,'a possibilidade de permuta ge?nica.',1),(295,44,'a possibilidade de permuta ge?nica.',0),(301,45,'menor número de células, pois, com o tempo, ocorre perda de células por apoptose.',0),(302,45,'menor número de células, pois, com o tempo, ocorre perda de células por descamação de superfícies (pele e vias respiratória e digestória).',0),(303,45,'o mesmo número de  células, porém elas serão maiores em decorrência de especialização, nutrientes e organelas.',0),(304,45,'maior númerode  células, em decorrência de divisões mitóticas, que permitem o crescimento de órgãos e tecidos.',1),(305,45,'maior número de  células, em decorrência da ingestão, na alimentação, de células animais e vegetais, as quais se somam àquelas do indivíduo.',0),(306,46,'quatro cromossomos.',0),(307,46,'dois cromossomos.',0),(308,46,'seis cromossomos.',0),(309,46,'dez cromossomos.',0),(310,46,'oito cromossomos.',1),(311,47,'34 e 17 cromossomos.',1),(312,47,'68 e 34 cromossomos.',0),(313,47,'17 e 34 cromossomos.',0),(314,47,'34 e 68 cromossomos.',0),(315,47,'51 e 17 cromossomos.',0),(316,48,'Prófase.',0),(317,48,'Pró-Metáfase.',0),(318,48,'Anáfase.',0),(319,48,'Telófase.',0),(320,48,'Metáfase.',1),(321,49,'a mitose ocorre exclusivamente nas células somáticas, nunca no plasma germinativo',0),(322,49,'a meiose possibilita a recombinação genética, ingrediente constituinte da variabilidade genética',1),(323,49,'mitose e meiose se alternam no processo de reprodução assexuada dos seres unicelulares',0),(324,49,'mitose e meiose sempre ocorrem num mesmo organismo vivo.',0),(325,49,'todas as alternativas estão corretas',0),(326,50,'medula óssea e meristema.',1),(327,50,'sangue e meristema.',0),(328,50,'medula óssea e esclerênquima.',0),(329,50,'testículo e esclerênquima.',0),(330,50,'testículo e xilema.',0),(331,51,'Mitose – produc?a?o de gametas com reduc?a?o no nu?mero de cromossomos.',0),(332,51,'Meiose – ocorre?ncia de crossing-over ou permutac?a?o na Pro?fase I.',1),(333,51,'Meiose – nu?mero de ce?lulas-filhas ao fim do processo e? o dobro do nu?mero de ce?lulas-ma?e.',0),(334,51,'Meiose – produc?a?o de ce?lulas 2n, apo?s a Meiose I.',0),(335,51,'Mitose – emparelhamento dos cromossomos homo?logos na Pro?fase.',0),(341,52,'algas, vegetais e fungos.',0),(342,52,'vegetais, algas e fungos.',1),(343,52,'vegetais, fungos e algas.',0),(344,52,'fungos, algas e vegetais.',0),(345,52,'fungos, vegetais e algas.',0),(346,53,'4 cromossomos - 1 cromátide',0),(347,53,'4 cromossomos - 2 cromátides',0),(348,53,'8 cromossomos - 1 cromátide',0),(349,53,'8 cromossomos - 2 cromátides',1),(350,53,'16 cromossomos - 2 cromátides',0),(351,54,'04 cromátides em G1.',0),(352,54,'08 cromátides em G2.',0),(353,54,'32 centrômeros na metáfase.',0),(354,54,'16 cinetócoros na prófase.',1),(355,54,'8 cariotécas na anáfase',0),(356,55,'Save our songs',0),(357,55,'Save out souls',0),(358,55,'Safe out songs',0),(359,55,' Save our souls',1),(360,55,'Saver out souls',0),(491,57,'Coruja da noite',0),(492,57,'Pessoa noturna',1),(493,57,'Coruja que caça a noite',0),(494,57,'Espécie de coruja',0),(495,57,'Passar a noite observando corujas',0),(496,56,' Rest in pieces',0),(497,56,'Rest in peace',1),(498,56,'Restart in planet',0),(499,56,'  Resolve intelligence plant',0),(500,56,'Rest in plant',0),(506,66,'which',0),(507,66,'who',1),(508,66,'whose',0),(509,66,'what',0),(510,66,'whom',0),(511,58,'have seen',1),(512,58,'see',0),(513,58,'saw',0),(514,58,'have saw',0),(515,58,' has seen',0),(516,59,'work',0),(517,59,'works',0),(518,59,'have worked',0),(519,59,'worked',1),(520,59,'will work',0),(521,60,'Did you see',0),(522,60,'Has you seen',0),(523,60,'Had you seen',0),(524,60,'Do you see',0),(525,60,' Have you seen',1),(526,61,'is working',0),(527,61,'works',0),(528,61,'have worked',0),(529,61,' has being working',0),(530,61,' has been working',1),(531,62,'saw',1),(532,62,'have saw',0),(533,62,'will see',0),(534,62,'see',0),(535,62,'have seen',0),(541,63,'I haven\'t met my Chinese friends since July.',0),(542,63,'The children have read a Chinese story yesterday.',0),(543,63,'Have you learned Mandarin when you were in school?',1),(544,63,'They have seen many Chinese films last year.',0),(545,63,'His parents have lived in Chine in the 1960\'s.',0),(546,65,'His',0),(547,65,'Theirs',0),(548,65,' It\'s',0),(549,65,'Their',1),(550,65,'Your',0),(551,67,'him - my',0),(552,67,'them - your',0),(553,67,'mine - yours',0),(554,67,' yours - our',1),(555,67,'them - us',0),(556,68,'that',0),(557,68,'which',0),(558,68,'who',0),(559,68,'whose',0),(560,68,'whom',1),(561,69,'which',0),(562,69,'whose',0),(563,69,'that',0),(564,69,'why',1),(565,69,'whom',0),(566,64,'that',0),(567,64,'which',0),(568,64,'who',0),(569,64,'whom',0),(570,64,'whose',1),(571,70,'They are good baby-sitters.',1),(572,70,'She\'s good babies-sitters.',0),(573,70,'She\'s a goods babies-sitter.',0),(574,70,' They are good babies-sitters.',0),(575,70,'Shes are good babies-sitter.',0),(586,72,' friend Bob\'s grades',1),(587,72,'friend\'s Bob grades',0),(588,72,'Bob friend\'s grades',0),(589,72,'grades Bob friend',0),(590,72,'friend Bob grades',0),(591,71,' the mountain\'s top.',0),(592,71,'the mountain\' top.',0),(593,71,'the top\'s mountain.',0),(594,71,' the mountain of the top.',0),(595,71,'the top of the mountain.',1),(601,74,'Cheerful',0),(602,74,'Reputable',0),(603,74,'Starving',0),(604,74,'Horrid',1),(605,74,'Delighted',0),(606,73,'Elated',0),(607,73,'Splendid',0),(608,73,'Nasty',0),(609,73,'Ravenous',1),(610,73,'Thrilled',0),(636,75,'Quebrar',0),(637,75,'Barco',0),(638,75,'Casca',1),(639,75,'  Casa',0),(640,75,'Mau',0),(641,76,'Política',1),(642,76,'Polícia',0),(643,76,'Palco',0),(644,76,'Pólice',0),(645,76,'Polir',0),(646,77,' We, where, wast',0),(647,77,'Were(n\'t), where(n\'t), wast(an\'t)',0),(648,77,'We, wast, wasd',0),(649,77,' Was(n\'t), were(n\'t)',1),(650,77,'Wes, were, wast, wads',0),(656,78,'hidrogênio',1),(657,78,'hélio',0),(658,78,'teste 1',0),(659,78,'teste 3',0),(660,78,'',0);
/*!40000 ALTER TABLE `respostas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Marcelo','mrcl1mtx','marcelo@mail.com','1993-08-07',1,0),(3,'Teste Tester de Testamento testado','123','teste@teste.com','0000-00-00',0,0),(4,'Ingrid','123','ingrid@teste.com','0000-00-00',0,1),(5,'Prof Patricia','patriciapessoa','pipessoa009@gmail.com','2017-05-21',0,1),(6,'maria','123','maria@teste.com','0000-00-00',0,0),(7,'Novo','123','novo@gmail.com','0000-00-00',0,0),(8,'Aluno','123','aluno@gmail.com','0000-00-00',0,0),(9,'prof','123','prof@gmail.com','0000-00-00',0,1),(11,'aluno 2','123','aluno2@gmail.com','0000-00-00',0,0),(12,'Marcelo Zanini Ferreira de Carvalho','mrcl1mtx','marcelo_gere@hotmail.com','1992-08-09',0,0),(13,'aluno 3','123','aluno3@gmail.com','1990-10-14',0,0),(14,'Aluno4','1234','aluno4@gmail.com','0000-00-00',0,0),(15,'Giovani Moreira da Silva','game0311','hotgigiowheels@gmail.com','0000-00-00',1,0),(16,'ROBERTO PIVA JUNIOR','CASAALPHA','ROBERTO.PIVAJR@GMAIL.COM','0000-00-00',1,0),(17,'Elias Soares de Oliveira Junior','manin123','cellohp569@gmail.com','0000-00-00',1,0),(18,'FELIPE SEIKTI FERNANDES ISHII','anapaul@4321','feliperotor@gmail.com','0000-00-00',1,0),(19,'Matheus Macedo Gomes','123456','mmgs20@hotmail.com','0000-00-00',1,0),(20,'Bianca Ferreira','123qwe','bbianca.f.10@gmail.com','0000-00-00',0,0),(21,'Pietra Leal Gouveia','pietra2003','pi.gouveia.pg@gmail.com','0000-00-00',0,0),(22,'victor furlan','vividi2912','victorfurlanvictor@yahoo.com','0000-00-00',1,0),(23,'Beatriz Marques Ramos Bezerra','ninicalinda','beatriz.marques.rb@gmail.com','0000-00-00',0,0),(24,'Millena Ferreira da Silva','61675495manu','milleninhaferreira@gmail.com','0000-00-00',0,0),(25,'Mariana Gutenberg Oliveira','160102','marianagutenberg12@gmail.com','0000-00-00',0,0),(26,'Milena Silva Assunção','florzinha','milena.mi2010@gmail.com','0000-00-00',0,0),(27,'Felipe de carvalho vieira santos','felipe1132325','felipe.gers2.55@gmail.com','0000-00-00',1,0),(28,'Cleisse Evelyn Oliveira da Rocha','230502','evelyn_cleisse@outlook.com','0000-00-00',0,0),(29,'Isa Belle Alves Pereira','nicolli1','isabap015@gmail.com','0000-00-00',0,0),(30,'Carolina da Costa Arruda','kaka141201','kaka.arruda141201@gmail.com','0000-00-00',0,0),(31,'Beatriz Rezende Santos','140602bia','beatrizrezendesds@gmail.com','0000-00-00',0,0),(35,'Igor de Azevedo Ferreira','adriuspa','drikapaesbaru@gmail.com','0000-00-00',1,0),(36,'Maria Julia Borazanian','hda123','mjborazok@gmail.com','0000-00-00',0,0),(37,'Beatriz Rezende Santos','140602','beatrizrezendesds@hotmail.com','0000-00-00',0,0),(39,'Igor de Azevedo Ferreira','37818538','drikapaesbaruk@gmail.com','0000-00-00',1,0),(40,'Escola de Ingles','123456','escolaingles@gmail.com','0000-00-00',1,1),(41,'Leonardo Fernandes de Lima','livia123445','leonar201046@gmail.com','0000-00-00',1,0),(42,'Raiane Chagas brasil ','a1b2c3','ciribrasil@globo.com','0000-00-00',0,0),(43,'ANA KARYNE GONÇALVES','afraaid08','anany08@hotmaill.com','0000-00-00',0,0),(44,'Aysha Do Amaral Rodrigues','ayshalinda','aysha_amaral@hotmail.com','0000-00-00',0,0),(45,'Isabella Barbato ','ALANZOKA!@#','bella.bamorim@gmail.com','0000-00-00',0,0),(46,'leticia   da  conceição silve','familia51','leticia_hp@live.com','0000-00-00',0,0),(47,'giovanna de andrade gonçalves','wicca2005','giovanna.setembro@gmail.com','0000-00-00',0,0),(48,'MARCIA','1234','marcia@ifsp.edu.br','0000-00-00',0,0),(49,'Professor X','prof','professor@teste.com','0000-00-00',1,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-26 18:09:16
