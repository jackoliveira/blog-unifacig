CREATE DATABASE blog_grupo3
  CHARACTER SET utf8
  COLLATE utf8_general_ci;

USE blog_grupo3;

CREATE TABLE `usuario` (
  `id` int(8) NOT NULL PRIMARY KEY auto_increment,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `descricao` varchar(100),
  `imagem` varchar(200),
  `sexo` int(2) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuario`(`nome`, `sobrenome`, `descricao`, `imagem`, `sexo`, `login`, `senha`, `status`) VALUES ('Jack', 'Oliveira', 'Desenvolvedor Web | Ruby on Rails | NodeJS | Angular', '', 1, 'jackoliveira', 'e10adc3949ba59abbe56e057f20f883e',  'ativo');
INSERT INTO `usuario`(`nome`, `sobrenome`, `descricao`, `imagem`, `sexo`, `login`, `senha`, `status`) VALUES ('Ramon', 'Oliveira', '', '', 1, 'ramonoliveira', 'e10adc3949ba59abbe56e057f20f883e',  'inativo');
INSERT INTO `usuario`(`nome`, `sobrenome`, `descricao`, `imagem`, `sexo`, `login`, `senha`, `status`) VALUES ('Fernando', '-', '', '', 1, 'fernando', 'e10adc3949ba59abbe56e057f20f883e',  'ativo');

CREATE TABLE `noticia` (
  `id` int(8) NOT NULL PRIMARY KEY auto_increment,
  `usuario_id` int(8) NOT NULL,
  FOREIGN KEY (usuario_id) REFERENCES usuario(id),
  `titulo` varchar(200) NOT NULL,
  `texto` LONGTEXT NOT NULL,
  `publicado_em` DATETIME(6) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `noticia` (`titulo`, `texto`, `usuario_id`, `publicado_em`, `status`) VALUES ('Governo diminui participação da sociedade civil no Conselho Nacional do Meio Ambiente', 'Número de integrantes do Conama, conselho que discute normas do Sistema Nacional do Meio Ambiente, diminui 76% com o decreto publicado nesta quarta-feira (29). Participação do governo aumenta e de ONGs diminui.', 1, '2019-05-20 00:00:01', 'publicado');
INSERT INTO `noticia` (`titulo`, `texto`, `usuario_id`, `publicado_em`, `status`) VALUES ('Revogar Estação Tamoios exige ato do Congresso, e mudança via decreto será inconstitucional, dizem juristas', 'inui.', 2, '2019-05-20 00:00:01', 'publicado');
INSERT INTO `noticia` (`titulo`, `texto`, `usuario_id`, `publicado_em`, `status`) VALUES ('Governo diminui particip', 'Número', 3, '2019-05-20 00:00:01', 'pendente');

CREATE TABLE `foto` (
  `id` int(8) NOT NULL PRIMARY KEY auto_increment,
  `noticia_id` int(8) NOT NULL,
  FOREIGN KEY (noticia_id) REFERENCES noticia(id),
  `nome` varchar(200) NOT NULL,
  `caminho` varchar(200) DEFAULT 'images/default_photo.jpg' -- NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `foto` (`noticia_id`, `nome`) VALUES (1, 'default');
INSERT INTO `foto` (`noticia_id`, `nome`) VALUES (2, 'default');
INSERT INTO `foto` (`noticia_id`, `nome`) VALUES (3, 'default');

CREATE TABLE `comentario` (
  `id` int(8) NOT NULL PRIMARY KEY auto_increment,
  `noticia_id` int(8) NOT NULL,
  FOREIGN KEY (noticia_id) REFERENCES noticia(id),
  `autor` varchar(200) NOT NULL,
  `conteudo` varchar(255) NOT NULL,
  `publicado_em` DATETIME(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comentario` (`noticia_id`, `autor`, `conteudo`, `publicado_em`) VALUES (1, 'N00BM45T3R', 'JKQEWWas', '2019-05-20 00:00:01');
INSERT INTO `comentario` (`noticia_id`, `autor`, `conteudo`, `publicado_em`) VALUES (2, 'Fulano', 'ASDYAUSIDKas', '2019-05-20 00:00:01');
INSERT INTO `comentario` (`noticia_id`, `autor`, `conteudo`, `publicado_em`) VALUES (3, 'oiuyyuio', 'ATDSYBASND', '2019-05-20 00:00:01');

CREATE TABLE `curtida` (
  `id` int(8) NOT NULL PRIMARY KEY auto_increment,
  `noticia_id` int(8) NOT NULL,
  FOREIGN KEY (noticia_id) REFERENCES noticia(id),
  `quantidade` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `curtida` (`noticia_id`, `quantidade`) VALUES (1, 54);
INSERT INTO `curtida` (`noticia_id`, `quantidade`) VALUES (2, 35);
INSERT INTO `curtida` (`noticia_id`, `quantidade`) VALUES (3, 125);