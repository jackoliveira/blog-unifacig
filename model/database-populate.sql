-- Criar o banco de dados "blog_grupo3"
-- Importar este arquivo ou apenas copiar e colar no PHPMyAdmin na tab SQL no banco "blog_grupo3"

CREATE TABLE `usuario` (
  `id` int(8) NOT NULL PRIMARY KEY auto_increment,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuario`(`nome`, `sobrenome`, `sexo`, `login`, `senha`, `status`) VALUES ('Jack', 'Oliveira', '1', 'jackoliveira', 'e10adc3949ba59abbe56e057f20f883e',  'ativo');
INSERT INTO `usuario`(`nome`, `sobrenome`, `sexo`, `login`, `senha`, `status`) VALUES ('Ramon', 'Oliveira', '1', 'ramonoliveira', 'e10adc3949ba59abbe56e057f20f883e',  'inativo');
INSERT INTO `usuario`(`nome`, `sobrenome`, `sexo`, `login`, `senha`, `status`) VALUES ('Fernando', '-', '1', 'fernando', 'e10adc3949ba59abbe56e057f20f883e',  'ativo');

CREATE TABLE `noticia` (
  `id` int(8) NOT NULL PRIMARY KEY auto_increment,
  `usuario_id` int(8) NOT NULL,
  FOREIGN KEY (usuario_id) REFERENCES usuario(id),
  `titulo` varchar(200) NOT NULL,
  `texto` varchar(1000) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `publicado_em` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `noticia`(`titulo`, `texto`, `usuario_id`, `publicado_em`, `foto`, `status`) VALUES ('Governo diminui participação da sociedade civil no Conselho Nacional do Meio Ambiente', 'Número de integrantes do Conama, conselho que discute normas do Sistema Nacional do Meio Ambiente, diminui 76% com o decreto publicado nesta quarta-feira (29). Participação do governo aumenta e de ONGs diminui.', 1, '09-12-1995', 'images/golfinho.jpg',  'publicado');
INSERT INTO `noticia`(`titulo`, `texto`, `usuario_id`, `publicado_em`, `foto`, `status`) VALUES ('Revogar Estação Tamoios exige ato do Congresso, e mudança via decreto será inconstitucional, dizem juristas', 'inui.', 2, '09-12-1995', 'images/golfinho.jpg',  'publicado');
INSERT INTO `noticia`(`titulo`, `texto`, `usuario_id`, `publicado_em`, `foto`, `status`) VALUES ('Governo diminui particip', 'Número', 3, '09-12-1900', 'images/galaxia-espiral.jpg', 'pendente');
