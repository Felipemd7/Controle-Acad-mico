-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Fev-2019 às 03:36
-- Versão do servidor: 5.7.15-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `id7594032_sistema_escolar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso_ao_sistema`
--

CREATE TABLE IF NOT EXISTS `acesso_ao_sistema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `painel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Extraindo dados da tabela `acesso_ao_sistema`
--

INSERT INTO `acesso_ao_sistema` (`id`, `status`, `code`, `senha`, `nome`, `painel`) VALUES
(1, 'Ativo', '123', '123', 'Marcos Rodrigues de Oliveira', 'admin'),
(2, 'Ativo', '1234', 'root', 'Francisca Alberta', 'professor'),
(11, 'Inativo', '2018.50.2', '1234', 'Juliana Reis de Oliveira', 'Aluno'),
(75, 'Ativo', '2018.100.1', '794', 'Igor Bezerra Reis', 'Aluno'),
(80, 'Ativo', '87416722', '1234', 'Igor', 'professor'),
(81, 'Ativo', '2019B.91.2', '07759775350', 'Hyago Bezerra Reis', 'Aluno'),
(82, 'Ativo', '2019B.100.10', '333777788890', 'Esdras Vasconceles', 'Aluno'),
(83, 'Ativo', '2019B.0.11', '07759775350', 'Igor Santos', 'Aluno'),
(84, 'Ativo', '2019B.30.11', '333777788890', 'Igor Santos', 'Aluno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `central_mensagem`
--

CREATE TABLE IF NOT EXISTS `central_mensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `emissor` varchar(255) NOT NULL,
  `receptor` varchar(255) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `anexo` varchar(255) NOT NULL,
  `data_resposta` varchar(255) NOT NULL,
  `resposta` varchar(255) NOT NULL,
  `anexo_resp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `central_mensagem`
--

INSERT INTO `central_mensagem` (`id`, `date`, `status`, `emissor`, `receptor`, `mensagem`, `anexo`, `data_resposta`, `resposta`, `anexo_resp`) VALUES
(1, '28/07/2014 00:15:20', 'Respondida', '587418', 'COORDENAÇÃO', 'Quando começa as aulas', '[1]', '28/07/2014 00:15:59', 'Dia 28/07/2014', '[1]');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamadas_em_sala`
--

CREATE TABLE IF NOT EXISTS `chamadas_em_sala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `date_day` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `code_professor` varchar(255) NOT NULL,
  `code_aluno` varchar(255) NOT NULL,
  `presente` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

--
-- Extraindo dados da tabela `chamadas_em_sala`
--

INSERT INTO `chamadas_em_sala` (`id`, `date`, `date_day`, `curso`, `disciplina`, `code_professor`, `code_aluno`, `presente`) VALUES
(111, '07/02/2019 00:46:23', '', '2', 'Algoritmo', '87416722', '2019B.91.2', 'JUSTIFICADA'),
(112, '07/02/2019 00:46:54', '07/02/19', '2', 'Algoritmo', '87416722', '2018.100.1', 'JUSTIFICADA'),
(113, '07/02/2019 00:46:59', '07/02/19', '2', 'Algoritmo', '87416722', '2019B.91.2', 'SIM'),
(114, '07/02/2019 00:47:02', '07/02/19', '2', 'Algoritmo', '87416722', '2019B.100.10', 'NAO'),
(115, '07/02/2019 00:47:21', '07/02/19', '2', 'Estrutura de Dados', '87416722', '2018.100.1', 'JUSTIFICADA'),
(116, '07/02/2019 00:48:48', '07/02/19', '2', 'Estrutura de Dados', '87416722', '2019B.91.2', 'JUSTIFICADA'),
(117, '07/02/2019 00:48:51', '07/02/19', '2', 'Estrutura de Dados', '87416722', '2019B.100.10', 'NAO'),
(118, '07/02/2019 02:51:34', '07/02/19', '2', 'Engenharia de Soft', '87416722', '2018.100.1', 'SIM'),
(119, '07/02/2019 02:51:39', '07/02/19', '2', 'Engenharia de Soft', '87416722', '2019B.91.2', 'NAO'),
(120, '07/02/2019 02:51:42', '07/02/19', '2', 'Engenharia de Soft', '87416722', '2019B.100.10', 'JUSTIFICADA'),
(121, '08/02/2019 11:32:55', '08/02/19', '2', 'Engenharia de Soft', '87416722', '2018.100.1', 'SIM'),
(122, '08/02/2019 11:32:59', '08/02/19', '2', 'Engenharia de Soft', '87416722', '2019B.91.2', 'NAO'),
(123, '08/02/2019 11:33:01', '08/02/19', '2', 'Engenharia de Soft', '87416722', '2019B.100.10', 'SIM'),
(124, '08/02/2019 11:33:10', '08/02/19', '2', 'POO', '87416722', '2018.100.1', 'SIM'),
(125, '08/02/2019 11:33:14', '08/02/19', '2', 'POO', '87416722', '2019B.91.2', 'SIM'),
(126, '08/02/2019 11:33:17', '08/02/19', '2', 'POO', '87416722', '2019B.100.10', 'SIM'),
(127, '08/02/2019 11:33:26', '08/02/19', '2', 'Algoritmo', '87416722', '2018.100.1', 'SIM'),
(130, '08/02/2019 15:56:41', '08/02/19', '2', 'Algoritmo', '87416722', '2019B.100.10', 'JUSTIFICADA'),
(131, '08/02/2019 15:59:24', '08/02/19', '2', 'Algoritmo', '87416722', '2019B.91.2', 'NAO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `confirma_entrada_de_alunos`
--

CREATE TABLE IF NOT EXISTS `confirma_entrada_de_alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `data_hoje` varchar(255) NOT NULL,
  `porteiro` varchar(255) NOT NULL,
  `code_aluno` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `confirma_entrada_de_alunos`
--

INSERT INTO `confirma_entrada_de_alunos` (`id`, `date`, `data_hoje`, `porteiro`, `code_aluno`) VALUES
(1, '28/08/2014 13:32:50', '28/08/2014', '2597419508', '587418'),
(2, '28/08/2014 13:36:02', '28/08/2014', '2597419508', '587418'),
(3, '28/08/2014 13:51:18', '28/08/2014', '2597419508', '587418'),
(4, '28/08/2014 13:51:29', '28/08/2014', '2597419508', '588160');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(255) NOT NULL,
  `ano` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `curso`, `ano`, `status`) VALUES
(2, 'Informatica', 2018, 0),
(11, 'Farmacia', 2019, 0),
(12, '1Âº Ano - A', 2019, 1),
(13, '1º Ano - A', 2020, 1),
(14, '1á~´wesasd~´asd´s', 2016, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE IF NOT EXISTS `disciplinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `professor` varchar(255) NOT NULL,
  `sala` varchar(255) NOT NULL,
  `turno` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `curso`, `disciplina`, `professor`, `sala`, `turno`) VALUES
(13, '2', 'POO', '87416722', '17', 'Manha'),
(20, '2', 'Algoritmo', '87416722', '20', 'Manha'),
(21, '2', 'Estrutura de Dados', '87416722', '104', 'Manha'),
(22, '2', 'Engenharia de Soft', '87416722', '09', 'Manha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `envio_de_trabalhos`
--

CREATE TABLE IF NOT EXISTS `envio_de_trabalhos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_trabalho` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `trabalho` varchar(255) NOT NULL,
  `aluno` varchar(255) NOT NULL,
  `nota` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `envio_de_trabalhos`
--

INSERT INTO `envio_de_trabalhos` (`id`, `data`, `status`, `id_trabalho`, `disciplina`, `trabalho`, `aluno`, `nota`) VALUES
(14, '12/01/2019 07:16:48', 'Aceito', '9', '13', '3f0dba3c71f6bf1c4ae02f31389185aa.pdf', '2018.100.1', '8.52'),
(15, '12/01/2019 21:38:31', 'Aceito', '10', '20', 'cb0ff3b4f86eee9585a7bfb1ea332058.pdf', '2018.100.1', '8.7'),
(16, '12/01/2019 21:52:46', 'Aceito', '11', '20', '3dd096acbc072b624def02ffc679a2f7.pdf', '2018.100.1', '8.9'),
(17, '04/02/2019 22:52:18', 'Aceito', '12', '20', '49035a42467a407b06144f10a9f09bbe.txt', '2018.100.1', '10'),
(20, '04/02/2019 23:12:27', 'Aguardar', '', '', 'bd6a8e25a906dbefb22ba1d3ecb0974c.txt', '2018.100.1', '-1'),
(21, '04/02/2019 23:13:21', 'Aguardar', '', '', '220abe7a6a37f56399066ed0d7e7c362.txt', '2018.100.1', '-1'),
(22, '04/02/2019 23:16:06', 'Aceito', '13', '13', '12c500d62f1063efa7f6f0e575a009b3.txt', '2018.100.1', '10'),
(23, '07/02/2019 04:07:28', 'Aceito', '15', '13', '720d498c69548a0d080d58cc6d338614.txt', '2018.100.1', '8'),
(24, '07/02/2019 04:08:57', 'Aguardar', '16', '20', 'e6d1a87b4b0e55f23da83e5dc056ab4b.txt', '2018.100.1', '-1'),
(25, '07/02/2019 04:09:13', 'Aguardar', '16', '20', 'c1ea43cde0b3d1b84661fc92726cc64fxlsx', '2018.100.1', '-1'),
(26, '07/02/2019 04:16:20', 'Aceito', '17', '20', 'd837a0c90e26a1110f5b372054d13d04.txt', '2018.100.1', '10'),
(27, '07/02/2019 05:44:17', 'Aceito', '18', '21', '6efd4173fd4bc0657a731070ac9900c6.jpg', '2018.100.1', '10'),
(28, '07/02/2019 05:56:08', 'Aguardar', '19', '22', 'ba8c4c523e1933b8a506f0dbb16fb4e5.png', '2018.100.1', '-1'),
(29, '08/02/2019 20:03:29', 'Aceito', '23', '20', '7b4d23067e7d4ad4f5b03003d574a0ca.jpg', '2018.100.1', '8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudantes`
--

CREATE TABLE IF NOT EXISTS `estudantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `rg` varchar(255) DEFAULT NULL,
  `nascimento` varchar(255) DEFAULT NULL,
  `mae` varchar(255) DEFAULT NULL,
  `pai` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `tel_residencial` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `tel_amigo` varchar(255) DEFAULT NULL,
  `serie` varchar(255) DEFAULT NULL,
  `turno` varchar(255) DEFAULT NULL,
  `atendimento_especial` varchar(255) DEFAULT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `estudantes`
--

INSERT INTO `estudantes` (`id`, `code`, `status`, `nome`, `cpf`, `rg`, `nascimento`, `mae`, `pai`, `estado`, `cidade`, `bairro`, `endereco`, `complemento`, `cep`, `tel_residencial`, `celular`, `tel_amigo`, `serie`, `turno`, `atendimento_especial`, `obs`, `email`) VALUES
(1, '2018.100.1', 'Ativo', 'Igor Bezerra Reis', '07759775350', '4116196', '05/01/2000', 'Maria Celia Alves Bezerra Reis', 'Antao Almeida de Jesus Reis', 'PI', 'Floriano', 'Tiberão', 'Rua raimundo nunes de alemida', 'Casa de esquina', '648000000', '', '89994524815', '', '2', 'Tarde', 'SIM', 'Não ha obeservações', 'igorbezerra234@gmail.com'),
(9, '2019B.91.2', 'Ativo', 'Hyago Bezerra Reis', '07759775350', '231312313', '05/01/2000', 'Maria Celia', 'Antao Almeida', 'PI', 'Floriano', 'Tiberão', 'Rua raimundo nunes de almeida', 'Casa de esquina', '648000000', '89995576467', '89994524815', '4565786785', '2', 'Manha', 'NAO', '', 'igorbezerra234@gmail.com'),
(10, '2019B.100.10', 'Ativo', 'Esdras Vasconceles', '333777788890', '231312313', '05/01/2000', 'Aldete Reis', 'Nerivan Junior', 'PI', 'Floriano', 'Catumbi', 'Rua frutuoso pacheco', 'Casa de esquina', '648000000', '', '89994524815', '4565786785', '2', 'Manha', 'NAO', '', ''),
(11, '2019B.30.11', 'Ativo', 'Igor Santos', '333777788890', '231312313', '05/01/2000', 'Mocinha', 'Nerivan Junior', 'asdasd', 'asdasd', 'Catumbi', 'Rua frutuoso pacheco', '', '', '', '89994524815', '', '2', 'Manha', 'NAO', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fluxo_de_caixa`
--

CREATE TABLE IF NOT EXISTS `fluxo_de_caixa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `d` varchar(255) NOT NULL,
  `m` varchar(255) NOT NULL,
  `a` varchar(255) NOT NULL,
  `date_completo` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `form_pag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `fluxo_de_caixa`
--

INSERT INTO `fluxo_de_caixa` (`id`, `status`, `tipo`, `d`, `m`, `a`, `date_completo`, `date`, `codigo`, `descricao`, `valor`, `form_pag`) VALUES
(1, 'Ativo', 'CRÉDITO', '28', '07', '2014', '28/07/2014 00:14:01', '28/07/2014', 'mensalidade=2597418795', 'Mensalidade do aluno: 587418 Competencia: 07/2014', '399.99', 'Cartão de crédito'),
(2, 'Ativo', 'CRÉDITO', '28', '08', '2014', '28/08/2014 13:44:50', '28/08/2014', 'mensalidade=2597418795', 'Mensalidade do aluno: 588160 Competencia: 08/2014', '1499.99', 'Cheque');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `code_aluno` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`id`, `nome`, `code_aluno`) VALUES
(16, '2c85892ace323c85854c5bf8e40f0540.jpg', '2018.100.1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `profissao` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `nascimento` varchar(255) NOT NULL,
  `formacao` varchar(255) NOT NULL,
  `graduacao` varchar(255) NOT NULL,
  `pos_graduacao` varchar(255) NOT NULL,
  `mestrado` varchar(255) NOT NULL,
  `doutorado` varchar(255) NOT NULL,
  `salario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `code`, `status`, `profissao`, `nome`, `cpf`, `nascimento`, `formacao`, `graduacao`, `pos_graduacao`, `mestrado`, `doutorado`, `salario`) VALUES
(1, '2597418795', 'Ativo', 'Tesoureiro', 'Rodriguo almeida', '05379839371', '05/04/1993', 'Superior Completo', 'Engenharia Mecânica', '------', '---------', '--------', '2000'),
(2, '2597419508', 'Ativo', 'Porteiro', 'Marcos Rodrigues de Oliveira', '05379839371', '05/04/1993', 'Ensino Médio Completo', '-', '-', '-', '-', '1062.89');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensalidades`
--

CREATE TABLE IF NOT EXISTS `mensalidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `matricula` varchar(255) NOT NULL,
  `d_cobranca` varchar(255) NOT NULL,
  `vencimento` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dia` varchar(255) NOT NULL,
  `mes` varchar(255) NOT NULL,
  `ano` varchar(255) NOT NULL,
  `dia_pagamento` varchar(255) NOT NULL,
  `data_pagamento` varchar(255) NOT NULL,
  `d_p` varchar(255) NOT NULL,
  `m_p` varchar(255) NOT NULL,
  `a_p` varchar(255) NOT NULL,
  `metodo_pagamento` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `mensalidades`
--

INSERT INTO `mensalidades` (`id`, `code`, `matricula`, `d_cobranca`, `vencimento`, `valor`, `status`, `dia`, `mes`, `ano`, `dia_pagamento`, `data_pagamento`, `d_p`, `m_p`, `a_p`, `metodo_pagamento`) VALUES
(1, '1174836', '587418', '28/07/2014', '28/07/2014', '399.99', 'Pagamento Confirmado', '28', '07', '2014', '28/07/2014', '28/07/2014 00:14:01', '28', '07', '2014', 'Cartão de crédito'),
(2, '1174837', '587418', '28/08/2014', '28/08/2014', '499.99', 'Aguarda Pagamento', '28', '08', '2014', '', '', '', '', '', ''),
(3, '1176320', '588160', '28/08/2014', '25/08/2014', '1499.99', 'Pagamento Confirmado', '28', '08', '2014', '28/08/2014', '28/08/2014 13:44:50', '28', '08', '2014', 'Cheque');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mural_aluno`
--

CREATE TABLE IF NOT EXISTS `mural_aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Extraindo dados da tabela `mural_aluno`
--

INSERT INTO `mural_aluno` (`id`, `date`, `status`, `curso`, `titulo`) VALUES
(1, '28/08/2014 13:53:19', 'Ativo', '1º ensino médio G', 'Trabalho bimestral de História com encerramento no dia 28/07/2014 - Para ver mais detalhes vá em AVALIAÇÕES'),
(2, '28/07/2014 14:00:02', 'Ativo', '1º ensino médio G', 'As notas das provas bimestrais estão sendo divulgadas'),
(3, '28/07/2014 14:03:05', 'Ativo', '1º ensino médio G', 'Trabalho extra da disciplina História com encerramento no dia 28/07/2014 - Para ver mais detalhes vá em AVALIAÇÕES'),
(4, '28/07/2014 14:05:03', 'Ativo', '1º ensino médio G', 'As notas bimestrais foram lançadas no sistema'),
(5, '28/07/2014 20:28:05', 'Ativo', '1º ensino médio G', 'Trabalho bimestral de História com encerramento no dia 29/07/2014 - Para ver mais detalhes vá em AVALIAÇÕES'),
(6, '28/07/2014 20:29:24', 'Ativo', '1º ensino médio G', 'Trabalho bimestral de Português com encerramento no dia 28/07/2014 - Para ver mais detalhes vá em AVALIAÇÕES'),
(7, '28/07/2014 20:30:06', 'Ativo', '1º ensino médio G', 'As notas das provas bimestrais estão sendo divulgadas'),
(8, '28/07/2014 20:32:07', 'Ativo', '1º ensino médio G', 'As notas das provas bimestrais estão sendo divulgadas'),
(9, '28/07/2014 20:32:36', 'Ativo', '1º ensino médio G', 'As notas das provas bimestrais estão sendo divulgadas'),
(10, '28/07/2014 20:33:31', 'Ativo', '1º ensino médio G', 'Trabalho bimestral de História com encerramento no dia 28/07/2014 - Para ver mais detalhes vá em AVALIAÇÕES'),
(11, '28/07/2014 20:34:09', 'Ativo', '1º ensino médio G', 'Trabalho bimestral de História com encerramento no dia 28/07/2014 - Para ver mais detalhes vá em AVALIAÇÕES'),
(12, '28/07/2014 20:34:49', 'Ativo', '1º ensino médio G', 'As notas bimestrais foram lançadas no sistema'),
(13, '28/07/2014 20:36:16', 'Ativo', '1º ensino médio G', 'As notas bimestrais foram lançadas no sistema'),
(14, '28/07/2014 20:36:48', 'Ativo', '1º ensino médio G', 'As notas bimestrais foram lançadas no sistema'),
(15, '28/07/2014 20:38:32', 'Ativo', '1º ensino médio G', 'Trabalho bimestral de Português com encerramento no dia 28/07/2014 - Para ver mais detalhes vá em AVALIAÇÕES'),
(16, '28/07/2014 20:39:33', 'Ativo', '1º ensino médio G', 'Trabalho bimestral de Português com encerramento no dia 28/07/2014 - Para ver mais detalhes vá em AVALIAÇÕES'),
(17, '28/07/2014 20:41:02', 'Ativo', '1º ensino médio G', 'Trabalho bimestral de Português com encerramento no dia 28/07/2014 - Para ver mais detalhes vá em AVALIAÇÕES'),
(18, '28/07/2014 20:41:53', 'Ativo', '1º ensino médio G', 'As notas das provas bimestrais estão sendo divulgadas'),
(19, '28/07/2014 20:42:53', 'Ativo', '1º ensino médio G', 'As notas das provas bimestrais estão sendo divulgadas'),
(20, '05/01/2019', 'Ativo', '1º ensino médio G', 'Trabalho bimestral de Historia com encerramento no dia 2019-01-31 - Para ver mais detalhes vá em AVALIAÇÕES'),
(21, '05/01/2019', 'Ativo', '1º ensino médio G', 'Trabalho bimestral de Historia com encerramento no dia 2019-01-31 - Para ver mais detalhes vá em AVALIAÇÕES'),
(22, '05/01/2019', 'Ativo', '1º ensino médio G', 'Trabalho bimestral de Historia com encerramento no dia 2019-01-31 - Para ver mais detalhes vá em AVALIAÇÕES'),
(23, '05/01/2019', 'Ativo', 'Biologia', 'Trabalho bimestral de Biofisica com encerramento no dia 2019-01-23 - Para ver mais detalhes vá em AVALIAÇÕES'),
(24, '05/01/2019', 'Ativo', 'Biologia', 'Trabalho bimestral de Biofisica com encerramento no dia 2019-01-24 - Para ver mais detalhes vá em AVALIAÇÕES'),
(25, '05/01/2019', 'Ativo', 'Biologia', 'Trabalho bimestral de Biofisica com encerramento no dia 2019-01-24 - Para ver mais detalhes vá em AVALIAÇÕES'),
(26, '05/01/2019', 'Ativo', 'Biologia', 'Trabalho bimestral de Biofisica com encerramento no dia 2019-01-24 - Para ver mais detalhes vá em AVALIAÇÕES'),
(27, '05/01/2019', 'Ativo', '', 'Trabalho bimestral de  com encerramento no dia 2019-01-29 - Para ver mais detalhes vá em AVALIAÇÕES'),
(28, '05/01/2019', 'Ativo', '', 'Trabalho bimestral de  com encerramento no dia 2019-01-29 - Para ver mais detalhes vá em AVALIAÇÕES'),
(29, '05/01/2019', 'Ativo', '', 'Trabalho bimestral de  com encerramento no dia 2019-01-29 - Para ver mais detalhes vá em AVALIAÇÕES'),
(30, '05/01/2019', 'Ativo', '', 'Trabalho bimestral de  com encerramento no dia 2019-01-29 - Para ver mais detalhes vá em AVALIAÇÕES'),
(31, '05/01/2019', 'Ativo', 'Matematica', 'Trabalho bimestral de Matematica 1 com encerramento no dia 2019-01-30 - Para ver mais detalhes vá em AVALIAÇÕES'),
(32, '05/01/2019', 'Ativo', 'Matematica', 'Trabalho bimestral de Matematica 1 com encerramento no dia 2019-01-30 - Para ver mais detalhes vá em AVALIAÇÕES'),
(33, '05/01/2019', 'Ativo', 'Matematica', 'Trabalho bimestral de Matematica 1 com encerramento no dia 2019-01-30 - Para ver mais detalhes vá em AVALIAÇÕES'),
(34, '05/01/2019', 'Ativo', '1º ensino médio G', 'Trabalho bimestral de Filosofia com encerramento no dia 2019-02-09 - Para ver mais detalhes vá em AVALIAÇÕES'),
(35, '05/01/2019', 'Ativo', 'Biologia', 'Trabalho bimestral de Biofisica com encerramento no dia 2019-02-28 - Para ver mais detalhes vá em AVALIAÇÕES'),
(36, '05/01/2019', 'Ativo', '1º ensino médio G', 'Trabalho bimestral de BD com encerramento no dia 2019-01-31 - Para ver mais detalhes vá em AVALIAÇÕES'),
(37, '12/01/2019', 'Ativo', 'Informatica', 'Trabalho bimestral de POO com encerramento no dia 2019-01-31 - Para ver mais detalhes vá em AVALIAÇÕES'),
(38, '12/01/2019', 'Ativo', 'Informatica', 'Trabalho bimestral de POO com encerramento no dia 2019-01-24 - Para ver mais detalhes vá em AVALIAÇÕES'),
(39, '12/01/2019', 'Ativo', '2', 'Trabalho bimestral de 13 com encerramento no dia 2019-01-31 - Para ver mais detalhes vá em AVALIAÇÕES'),
(40, '12/01/2019', 'Ativo', '2', 'Trabalho bimestral de 20 com encerramento no dia 2019-01-31 - Para ver mais detalhes vá em AVALIAÇÕES'),
(41, '12/01/2019', 'Ativo', '2', 'Trabalho bimestral de 20 com encerramento no dia 2019-01-31 - Para ver mais detalhes vá em AVALIAÇÕES'),
(42, '04/02/2019', 'Ativo', '2', 'Trabalho bimestral de 20 com encerramento no dia  - Para ver mais detalhes vá em AVALIAÇÕES'),
(43, '04/02/2019', 'Ativo', '2', 'Trabalho bimestral de 13 com encerramento no dia 2019-02-28 - Para ver mais detalhes vá em AVALIAÇÕES'),
(44, '07/02/2019', 'Ativo', '', 'Trabalho bimestral de  com encerramento no dia  - Para ver mais detalhes vá em AVALIAÇÕES'),
(45, '07/02/2019', 'Ativo', '2', 'Trabalho bimestral de 13 com encerramento no dia 2019-02-28 - Para ver mais detalhes vá em AVALIAÇÕES'),
(46, '07/02/2019', 'Ativo', '2', 'Trabalho bimestral de 20 com encerramento no dia 2019-02-19 - Para ver mais detalhes vá em AVALIAÇÕES'),
(47, '07/02/2019', 'Ativo', '2', 'Trabalho bimestral de 20 com encerramento no dia 2019-03-07 - Para ver mais detalhes vá em AVALIAÇÕES'),
(48, '07/02/2019', 'Ativo', '2', 'Trabalho bimestral de 21 com encerramento no dia 2019-02-28 - Para ver mais detalhes vá em AVALIAÇÕES'),
(49, '07/02/2019', 'Ativo', '2', 'Trabalho bimestral de 22 com encerramento no dia 2019-02-27 - Para ver mais detalhes vá em AVALIAÇÕES'),
(50, '08/02/2019', 'Ativo', '2', 'Trabalho bimestral de 22 com encerramento no dia 2019-02-28 - Para ver mais detalhes vá em AVALIAÇÕES'),
(51, '08/02/2019', 'Ativo', '2', 'Trabalho bimestral de 22 com encerramento no dia 2019-02-13 - Para ver mais detalhes vá em AVALIAÇÕES'),
(52, '08/02/2019', 'Ativo', '2', 'Trabalho bimestral de Estrutura de Dados com encerramento no dia 2019-02-28 - Para ver mais detalhes vá em AVALIAÇÕES'),
(53, '08/02/2019', 'Ativo', '2', 'Trabalho bimestral de Algoritmo com encerramento no dia 2019-02-28 - Para ver mais detalhes vá em AVALIAÇÕES');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mural_coordenacao`
--

CREATE TABLE IF NOT EXISTS `mural_coordenacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `mural_coordenacao`
--

INSERT INTO `mural_coordenacao` (`id`, `date`, `status`, `curso`, `titulo`) VALUES
(1, '28/07/2014 00:13:23', 'Ativo', 'Não informado', 'A mensalidade de um aluno foi reajustada!'),
(2, '28/07/2014 00:15:20', 'Ativo', 'Não informado', 'Existe uma nova mensagem enviada pelo aluno para ser respondida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mural_professor`
--

CREATE TABLE IF NOT EXISTS `mural_professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mural_tesouraria`
--

CREATE TABLE IF NOT EXISTS `mural_tesouraria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `mural_tesouraria`
--

INSERT INTO `mural_tesouraria` (`id`, `date`, `status`, `curso`, `titulo`) VALUES
(1, '28/08/2014 13:28:50', 'Ativo', '', 'A cobrança do aluno Marcos Rodrigues de Oliveira referente ao mês 08/2014 foi gerada e aguarda pagamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas_bimestrais`
--

CREATE TABLE IF NOT EXISTS `notas_bimestrais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `bimestre` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `nota` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `notas_bimestrais`
--

INSERT INTO `notas_bimestrais` (`id`, `code`, `bimestre`, `disciplina`, `nota`) VALUES
(1, '20181A', '1', 'História', '7.0'),
(2, '20181A', '2', 'História', '5.7'),
(3, '20181A', '3', 'História', '10'),
(4, '20181A', '4', 'História', '5.65'),
(5, '20181B', '1', 'Português', '5.6'),
(6, '20181B', '2', 'Português', '7.0'),
(7, '20181B', '3', 'Português', '7'),
(8, '20181B', '4', 'Português', '10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas_de_observacoes`
--

CREATE TABLE IF NOT EXISTS `notas_de_observacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `professor` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `detalhes` text NOT NULL,
  `bimestre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `notas_de_observacoes`
--

INSERT INTO `notas_de_observacoes` (`id`, `date`, `status`, `professor`, `curso`, `disciplina`, `detalhes`, `bimestre`) VALUES
(1, '28/07/2014 14:05:03', 'Ativo', '87415978', '1º ensino médio G', 'História', '', '1'),
(2, '28/07/2014 20:34:49', 'Ativo', '87415978', '1º ensino médio G', 'História', 'sdf', '2'),
(3, '28/07/2014 20:36:16', 'Ativo', '87415978', '1º ensino médio G', 'História', 'sdf', '3'),
(4, '28/07/2014 20:36:48', 'Ativo', '87415978', '1º ensino médio G', 'História', 'sadf', '4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas_provas`
--

CREATE TABLE IF NOT EXISTS `notas_provas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `notaQual` varchar(255) NOT NULL,
  `notaQuant` float NOT NULL,
  `prova` varchar(255) NOT NULL,
  `bimestre` int(11) NOT NULL,
  `id_prova` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Extraindo dados da tabela `notas_provas`
--

INSERT INTO `notas_provas` (`id`, `code`, `disciplina`, `notaQual`, `notaQuant`, `prova`, `bimestre`, `id_prova`) VALUES
(32, '2018.100.1', '13', '10', 10, '[1]', 4, '42'),
(33, '2019B.91.2', '13', '10', 10, '[1]', 4, '42'),
(34, '2019B.100.10', '13', '10', 10, '[1]', 4, '42'),
(35, '2018.100.1', '13', '10', 10, '[1]', 3, '41'),
(36, '2018.100.1', '13', '10', 10, '[1]', 2, '40'),
(37, '2018.100.1', '13', '10', 10, '[1]', 1, '39'),
(38, '2018.100.1', '20', '8', 8, '[1]', 1, '43'),
(39, '2018.100.1', '20', '9', 9, '[1]', 2, '44'),
(40, '2018.100.1', '20', '9', 9, '[1]', 3, '45'),
(41, '2018.100.1', '20', '6', 6, '[1]', 4, '46'),
(42, '2018.100.1', '21', '9', 10, '777.jpg', 1, '47'),
(43, '2018.100.1', '22', '10', 8, '[1]', 4, '48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas_trabalhos`
--

CREATE TABLE IF NOT EXISTS `notas_trabalhos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `bimestre` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `nota` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `notas_trabalhos`
--

INSERT INTO `notas_trabalhos` (`id`, `code`, `bimestre`, `disciplina`, `nota`) VALUES
(1, '588160', '1', 'História', '8.0'),
(2, '588160', 'Trabalho extra', 'História', '2.5'),
(3, '588160', '2', 'História', '6.5'),
(4, '588160', '1', 'Português', '10'),
(5, '588160', '3', 'História', '10'),
(6, '588160', '4', 'História', '8.1'),
(7, '588160', '2', 'Português', '5.2'),
(8, '588160', '3', 'Português', '6.8'),
(9, '588160', '4', 'Português', '5.8'),
(10, '2018.100.1', '', 'BD', '10'),
(11, '2018.100.1', '', 'Filosofia', '8.4'),
(12, '2018.100.1', '', 'Filosofia', '7.5'),
(13, '2018.100.1', '', 'POO', '9.95'),
(14, '2018.100.1', '', '13', '10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontos_extras`
--

CREATE TABLE IF NOT EXISTS `pontos_extras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `nota` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE IF NOT EXISTS `professores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `nascimento` varchar(255) NOT NULL,
  `formacao` varchar(255) NOT NULL,
  `graduacao` varchar(255) NOT NULL,
  `pos_graduacao` varchar(255) NOT NULL,
  `mestrado` varchar(255) NOT NULL,
  `doutorado` varchar(255) NOT NULL,
  `salario` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `code`, `status`, `nome`, `cpf`, `nascimento`, `formacao`, `graduacao`, `pos_graduacao`, `mestrado`, `doutorado`, `salario`) VALUES
(3, '87415978', 'Ativo', 'Fracisco', '2123123', '05/01/2000', 'Superior Completo', 'Alguma ai', 'asdasd', 'asdasda', 'dasdasd', '2000'),
(4, '87416722', 'Ativo', 'Igor Bezerra Reis', '07759775350', '05/01/2000', 'Superior Incompleto', '', '', '', 'doutorado', '3000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `provas`
--

CREATE TABLE IF NOT EXISTS `provas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `professor` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `detalhes` text NOT NULL,
  `data_aplicacao` varchar(255) NOT NULL,
  `bimestre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Extraindo dados da tabela `provas`
--

INSERT INTO `provas` (`id`, `date`, `status`, `professor`, `curso`, `disciplina`, `detalhes`, `data_aplicacao`, `bimestre`) VALUES
(39, '07/02/2019 04:56:01', 'Ativo', '87416722', '2', '13', 'Heranca', '07/02/2019', 1),
(40, '07/02/2019 04:58:10', 'Ativo', '87416722', '2', '13', 'Herannnnnacccccao', '07/02/2019', 2),
(41, '07/02/2019 05:00:36', 'Ativo', '87416722', '2', '13', 'eeeeeeeeeeeeee', '07/02/2019', 3),
(42, '07/02/2019 05:00:46', 'Ativo', '87416722', '2', '13', 'mmmmmmmmmmmmmmm', '07/02/2019', 4),
(43, '07/02/2019 05:16:52', 'Ativo', '87416722', '2', '20', '', '07/02/2019', 1),
(44, '07/02/2019 05:16:59', 'Ativo', '87416722', '2', '20', '', '07/02/2019', 2),
(45, '07/02/2019 05:17:04', 'Ativo', '87416722', '2', '20', '', '07/02/2019', 3),
(46, '07/02/2019 05:17:10', 'Ativo', '87416722', '2', '20', '', '07/02/2019', 4),
(47, '07/02/2019 05:19:48', 'Ativo', '87416722', '2', '21', '', '07/02/2019', 1),
(48, '08/02/2019 15:26:29', 'Ativo', '87416722', '2', '22', '', '08/02/2019', 4),
(49, '08/02/2019 12:29:25', 'Ativo', '87416722', '2', '22', '', '08/02/2019', 3),
(50, '08/02/2019 11:30:50', 'Ativo', '87416722', '2', '22', '', '08/02/2019', 2),
(51, '08/02/2019 16:02:52', 'Ativo', '87416722', '2', '22', '', '08/02/2019', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalho`
--

CREATE TABLE IF NOT EXISTS `trabalho` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `data` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `professor` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL,
  `disciplina` varchar(50) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `detalhe` text NOT NULL,
  `data_de_entrega` varchar(255) NOT NULL,
  `nota` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `trabalho`
--

INSERT INTO `trabalho` (`id`, `data`, `status`, `professor`, `curso`, `disciplina`, `tema`, `detalhe`, `data_de_entrega`, `nota`) VALUES
(23, '08/02/2019', 'Ativo', '87416722', '2', '20', 'Laços de repetição', '', '2019-02-28', -1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalhos_bimestrais`
--

CREATE TABLE IF NOT EXISTS `trabalhos_bimestrais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `professor` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `detalhes` text NOT NULL,
  `data_entrega` varchar(255) NOT NULL,
  `bimestre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `trabalhos_bimestrais`
--

INSERT INTO `trabalhos_bimestrais` (`id`, `date`, `status`, `professor`, `curso`, `disciplina`, `tema`, `detalhes`, `data_entrega`, `bimestre`) VALUES
(18, '05/01/2019', 'Encerrado', '87416722', '1º ensino médio G', 'Historia', 'Era Vagas', 'tudo que foi dado em sala de aula', '2019-01-31', '1'),
(19, '05/01/2019', 'Encerrado', '87416722', '1º ensino médio G', 'Filosofia', 'Aristoteles', 'tudo sobre ele', '2019-02-21', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalhos_extras`
--

CREATE TABLE IF NOT EXISTS `trabalhos_extras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `professor` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `detalhes` text NOT NULL,
  `data_entrega` varchar(255) NOT NULL,
  `pontos` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `trabalhos_extras`
--

INSERT INTO `trabalhos_extras` (`id`, `date`, `status`, `professor`, `curso`, `disciplina`, `tema`, `detalhes`, `data_entrega`, `pontos`) VALUES
(1, '28/07/2014 14:03:05', 'Ativo', '87415978', '1º ensino médio G', 'História', 'História do Brasil', '', '28/07/2014', '3.0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
