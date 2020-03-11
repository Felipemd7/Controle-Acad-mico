-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jul 28, 2014 as 08:53 PM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `sistema_escolar`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `acesso_ao_sistema`
--

INSERT INTO `acesso_ao_sistema` (`id`, `status`, `code`, `senha`, `nome`, `painel`) VALUES
(1, 'Ativo', '123', '123', 'Marcos Rodrigues de Oliveira', 'admin'),
(2, 'Ativo', '87415978', '12345678912', 'Francisca Alberta', 'professor'),
(7, 'Ativo', '587418', '05379839371', 'Marcos Rodrigues de Oliveira', 'Aluno'),
(9, 'Ativo', '2597418795', '05379839371', 'Rodriguo almeida', 'tesoureiro'),
(10, 'Ativo', '2597419508', '05379839371', 'Marcos Rodrigues de Oliveira', 'portaria'),
(11, 'Ativo', '588160', '12345678910', 'Sany Ribeiro', 'Aluno');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `chamadas_em_sala`
--


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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `curso`) VALUES
(1, '1º ensino médio G');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `curso`, `disciplina`, `professor`, `sala`, `turno`) VALUES
(1, '1º ensino médio G', 'História', '87415978', '01', 'Manhã'),
(2, '1º ensino médio G', 'Português', '87415978', '01', 'Manhã'),
(3, '1º ensino médio G', 'Quimica', '87415978', '01', 'Manhã'),
(4, '1º ensino médio G', 'Física', '87415978', '01', 'Manhã'),
(5, '1º ensino médio G', 'Geografia', '87415978', '01', 'Manhã'),
(6, '1º ensino médio G', 'Matemática', '87415978', '01', 'Manhã'),
(8, '1º ensino médio G', 'Filosofia', '87415978', '01', 'Manhã'),
(9, '1º ensino médio G', 'Sociologia', '87415978', '01', 'Manhã');

-- --------------------------------------------------------

--
-- Estrutura da tabela `envio_de_trabalhos_bimestrais`
--

CREATE TABLE IF NOT EXISTS `envio_de_trabalhos_bimestrais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_trabalho` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `trabalho` varchar(255) NOT NULL,
  `aluno` varchar(255) NOT NULL,
  `nota` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `envio_de_trabalhos_bimestrais`
--

INSERT INTO `envio_de_trabalhos_bimestrais` (`id`, `date`, `status`, `id_trabalho`, `disciplina`, `trabalho`, `aluno`, `nota`) VALUES
(2, '28/08/2014 13:54:40', 'Aceito', '1', 'História', '[2]Lighthouse.jpg', '588160', '8.0'),
(3, '28/07/2014 20:28:27', 'Aceito', '2', 'História', '[6]Penguins.jpg', '588160', '6.5'),
(4, '28/07/2014 20:29:35', 'Aceito', '3', 'Português', '[4]Lighthouse.jpg', '588160', '10'),
(5, '28/07/2014 20:33:39', 'Aceito', '4', 'História', '[7]Penguins.jpg', '588160', '10'),
(6, '28/07/2014 20:34:17', 'Aceito', '5', 'História', '[8]Penguins.jpg', '588160', '8.1'),
(7, '28/07/2014 20:38:46', 'Aceito', '6', 'Português', '[9]Penguins.jpg', '588160', '5.2'),
(8, '28/07/2014 20:39:47', 'Aceito', '7', 'Português', '[10]Penguins.jpg', '588160', '6.8'),
(9, '28/07/2014 20:41:14', 'Aceito', '8', 'Português', '[11]Penguins.jpg', '588160', '5.8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `envio_de_trabalhos_extras`
--

CREATE TABLE IF NOT EXISTS `envio_de_trabalhos_extras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_trabalho` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `trabalho` varchar(255) NOT NULL,
  `aluno` varchar(255) NOT NULL,
  `nota` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `envio_de_trabalhos_extras`
--

INSERT INTO `envio_de_trabalhos_extras` (`id`, `date`, `status`, `id_trabalho`, `disciplina`, `trabalho`, `aluno`, `nota`) VALUES
(1, '28/07/2014 14:03:44', 'Aceito', '1', 'História', '[5]Penguins.jpg', '588160', '2.5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudantes`
--

CREATE TABLE IF NOT EXISTS `estudantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `nascimento` varchar(255) NOT NULL,
  `mae` varchar(255) NOT NULL,
  `pai` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `tel_residencial` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `tel_amigo` varchar(255) NOT NULL,
  `serie` varchar(255) NOT NULL,
  `turno` varchar(255) NOT NULL,
  `atendimento_especial` varchar(255) NOT NULL,
  `mensalidade` varchar(255) NOT NULL,
  `vencimento` varchar(255) NOT NULL,
  `tel_cobranca` varchar(255) NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `estudantes`
--

INSERT INTO `estudantes` (`id`, `code`, `status`, `nome`, `cpf`, `rg`, `nascimento`, `mae`, `pai`, `estado`, `cidade`, `bairro`, `endereco`, `complemento`, `cep`, `tel_residencial`, `celular`, `tel_amigo`, `serie`, `turno`, `atendimento_especial`, `mensalidade`, `vencimento`, `tel_cobranca`, `obs`) VALUES
(1, '587418', 'Ativo', 'Marcos Rodrigues de Oliveira', '05379839371', '20073154576', '05/04/1993', 'Marleide de Sousa Rodrigues', 'Jose Nestor de Oliveira', 'São Gonçalo do Amarante', 'CEARA', 'Taiba', 'Av. Capitão Inácio Prata', 'Próximo ao posto bandeira branca', 'Próximo ao posto', '8651', '1515', '5815', '1º ensino médio G', 'Manhã', 'NÃO', '499.99', '28', '8589321649', 'assdf'),
(2, '588160', 'Ativo', 'Sany Ribeiro', '12345678910', '958741568715', '05/04/1993', 'Sisa Rodrigues', 'Jose Ribeiro', 'CE', 'Fortaleza', 'Centro', 'Rua Carolina Sucupira', 'ap. 15 3º andar', '78545-000', '8533156162', '8589321649', '857419621', '1º ensino médio G', 'Noite', 'NÃO', '1499.99', '25', '85893221649', '----');

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
(1, '2597418795', 'Ativo', 'Tesoureiro', 'Rodriguo almeida', '05379839371', '05/04/1993', 'Superior Completo', 'Engenharia Mecânica', '------', '---------', '--------', '1500'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

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
(19, '28/07/2014 20:42:53', 'Ativo', '1º ensino médio G', 'As notas das provas bimestrais estão sendo divulgadas');

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

--
-- Extraindo dados da tabela `mural_professor`
--


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
(1, '588160', '1', 'História', '7.0'),
(2, '588160', '2', 'História', '5.7'),
(3, '588160', '3', 'História', '10'),
(4, '588160', '4', 'História', '5.65'),
(5, '588160', '1', 'Português', '5.6'),
(6, '588160', '2', 'Português', '7.0'),
(7, '588160', '3', 'Português', '3.2'),
(8, '588160', '4', 'Português', '10');

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
-- Estrutura da tabela `notas_observacao`
--

CREATE TABLE IF NOT EXISTS `notas_observacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `bimestre` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `nota` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `notas_observacao`
--

INSERT INTO `notas_observacao` (`id`, `code`, `bimestre`, `disciplina`, `nota`) VALUES
(1, '588160', '1', 'História', '4.75'),
(2, '588160', '2', 'História', '5.70'),
(3, '588160', '3', 'História', '10'),
(4, '588160', '4', 'História', '5.65');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas_provas`
--

CREATE TABLE IF NOT EXISTS `notas_provas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `bimestre` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `nota` varchar(255) NOT NULL,
  `prova` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `notas_provas`
--

INSERT INTO `notas_provas` (`id`, `code`, `bimestre`, `disciplina`, `nota`, `prova`) VALUES
(1, '587418', '1', 'História', '3.2', '[3]Lighthouse.jpg'),
(2, '588160', '1', 'História', '1.5', '[3]Tulips.jpg'),
(3, '587418', '2', 'História', '5.5', '[1]'),
(4, '588160', '2', 'História', '4.9', '[5]Lighthouse.jpg'),
(5, '588160', '3', 'História', '10', '[1]'),
(6, '587418', '4', 'História', '6.8', '[1]'),
(7, '588160', '4', 'História', '3.2', '[1]');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(9, '588160', '4', 'Português', '5.8');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `pontos_extras`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `code`, `status`, `nome`, `cpf`, `nascimento`, `formacao`, `graduacao`, `pos_graduacao`, `mestrado`, `doutorado`, `salario`) VALUES
(1, '87415978', 'Ativo', 'Francisca Alberta', '12345678912', '05/04/1993', 'Superior Completo', 'Pedagogia', '___', '___', '___', '1500');

-- --------------------------------------------------------

--
-- Estrutura da tabela `provas_bimestrais`
--

CREATE TABLE IF NOT EXISTS `provas_bimestrais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `professor` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `disciplina` varchar(255) NOT NULL,
  `detalhes` text NOT NULL,
  `bimestre` varchar(255) NOT NULL,
  `data_aplicacao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `provas_bimestrais`
--

INSERT INTO `provas_bimestrais` (`id`, `date`, `status`, `professor`, `curso`, `disciplina`, `detalhes`, `bimestre`, `data_aplicacao`) VALUES
(1, '28/07/2014 14:00:02', 'Ativo', '87415978', '1º ensino médio G', 'História', '', '1', '28/07/2014'),
(2, '28/07/2014 20:30:06', 'Ativo', '87415978', '1º ensino médio G', 'História', 's', '2', '28/07/2014'),
(3, '28/07/2014 20:32:07', 'Ativo', '87415978', '1º ensino médio G', 'História', 'ghdfgh', '3', '28/07/2014'),
(4, '28/07/2014 20:32:36', 'Ativo', '87415978', '1º ensino médio G', 'História', 'df', '4', '28/07/2014'),
(5, '28/07/2014 20:41:53', 'Ativo', '87415978', '1º ensino médio G', 'Português', '1', '1', '28/07/2014'),
(6, '28/07/2014 20:42:53', 'Ativo', '87415978', '1º ensino médio G', 'Português', 'cvjh', '1', '28/07/2014');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `trabalhos_bimestrais`
--

INSERT INTO `trabalhos_bimestrais` (`id`, `date`, `status`, `professor`, `curso`, `disciplina`, `tema`, `detalhes`, `data_entrega`, `bimestre`) VALUES
(1, '28/08/2014 13:53:19', 'Encerrado', '87415978', '1º ensino médio G', 'História', 'História do Brasil', 'Descreva a importancia da história antiga do Brasil para a forrmação do pensamento atual.', '28/07/2014', '1'),
(2, '28/07/2014 20:28:05', 'Ativo', '87415978', '1º ensino médio G', 'História', 'História do Brasil', '', '29/07/2014', '2'),
(3, '28/07/2014 20:29:24', 'Encerrado', '87415978', '1º ensino médio G', 'Português', '', '', '28/07/2014', '1'),
(4, '28/07/2014 20:33:31', 'Encerrado', '87415978', '1º ensino médio G', 'História', 'História do Brasil', 'sdgf', '28/07/2014', '3'),
(5, '28/07/2014 20:34:09', 'Encerrado', '87415978', '1º ensino médio G', 'História', 'História do Brasil', 'sadf', '28/07/2014', '4'),
(6, '28/07/2014 20:38:32', 'Encerrado', '87415978', '1º ensino médio G', 'Português', 'sdfgbds', 'dfg', '28/07/2014', '2'),
(7, '28/07/2014 20:39:33', 'Encerrado', '87415978', '1º ensino médio G', 'Português', 'ghkf', 'vjnc', '28/07/2014', '3'),
(8, '28/07/2014 20:41:02', 'Ativo', '87415978', '1º ensino médio G', 'Português', 'sdf', 'sdf', '28/07/2014', '4');

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
