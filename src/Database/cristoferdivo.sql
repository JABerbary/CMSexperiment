-- Create database and select 

select * from TB_LOGIN ;
select * from tb_pagina ;
select * from tb_postagens ;

create database cristoferdivo;

use cristoferdivo;

-- --------------------------------------------------------

--
-- Table structure for table `tb_postagens`
--

CREATE TABLE `tb_postagens` (
  Id int auto_increment PRIMARY KEY NOT NULL,
  titulo varchar(255) COLLATE utf8_bin NOT NULL,
  data varchar(12) COLLATE utf8_bin NOT NULL,
  imagem varchar(255) COLLATE utf8_bin NOT NULL,
  exibir int(11) NOT NULL,
  descricao longtext COLLATE utf8_bin NOT NULL,
  pagina_id int(11) DEFAULT NULL
); 

--
-- Table structure for table `tb_login`
--


CREATE TABLE `tb_login` (
  id int auto_increment PRIMARY KEY NOT NULL,
  nome varchar(255)  NOT NULL,
  email varchar(255)  NOT NULL,
  usuario varchar(255) NOT NULL,
  senha varchar(255)  NOT NULL,
  tumb varchar(255)  NOT NULL,
  nivel int(11) NOT NULL
);


-- --------------------------------------------------------

--
-- Table structure for table `tb_pagina`
--

CREATE TABLE `tb_pagina` (
  pagina_id int auto_increment PRIMARY KEY NOT NULL,
  pagina_nome varchar(20) COLLATE utf8_bin DEFAULT NULL
);

--
-- Dumping data for table `tb_pagina`
--

INSERT INTO `tb_pagina` (`pagina_id`, `pagina_nome`) VALUES
(3, 'cooking'),
(5, 'fashion'),
(2, 'music'),
(4, 'pooshlife'),
(1, 'sobre');



