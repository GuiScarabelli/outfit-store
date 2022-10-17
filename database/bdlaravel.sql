-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Out-2022 às 20:22
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdlaravel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `idCategoria` int(11) NOT NULL,
  `categoria` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcategoria`
--

INSERT INTO `tbcategoria` (`idCategoria`, `categoria`) VALUES
(1, 'Calça'),
(2, 'Camiseta'),
(3, 'Bermuda'),
(4, 'vazgf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(120) DEFAULT NULL,
  `dtNascCliente` date NOT NULL,
  `estadoCivilCliente` varchar(30) NOT NULL,
  `enderecoCliente` varchar(200) NOT NULL,
  `numeroCliente` int(100) NOT NULL,
  `cepCliente` char(10) NOT NULL,
  `cidadeCliente` varchar(120) NOT NULL,
  `estadoCliente` varchar(120) NOT NULL,
  `rgCliente` char(12) NOT NULL,
  `cpfCliente` char(14) NOT NULL,
  `emailCliente` varchar(120) NOT NULL,
  `foneCliente` char(15) NOT NULL,
  `celularCliente` char(18) NOT NULL,
  `senhaCliente` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `nomeCliente`, `dtNascCliente`, `estadoCivilCliente`, `enderecoCliente`, `numeroCliente`, `cepCliente`, `cidadeCliente`, `estadoCliente`, `rgCliente`, `cpfCliente`, `emailCliente`, `foneCliente`, `celularCliente`, `senhaCliente`) VALUES
(6, 'Sr. Sexo', '2222-02-22', 'Sexo', 'Rua Irmão Deodoro', 5370, '08410-410', 'São Paulo', 'SP', '234Sexo', '121.212.121-21', 'Sexo@Sexo.com', '(11) 1111-1111', '(11) 11111-1', '$2y$10$cR5CoTyLXAqc1s2W6o5dLeUXb19QlLhc/c2wLV1836txNlEY3a6M.'),
(7, 'Sr. Sexo', '1111-11-11', 'Sexo', 'Rua Irmão Deodoro', 1111, '08410-410', 'São Paulo', 'SP', '234Sexo', '121.212.121-21', 'Sexo@Sexo.com', '(11) 1111-1111', '(11) 11111-1111', '$2y$10$9EFvgxBBs/FL2wuob/k0yOa89s11ONYIkYeMYLt9A0jWqE0DwG/QC'),
(8, 'oi', '1111-11-11', 'Sexo', 'Sexo', 1111, '08410-410', 'Sexo', 'Sx', '234Sexo', '121.212.121-21', 'Sexo@Sexo.com', '(11) 1111-1111', '(11) 11111-1111', '$2y$10$9uOuHNXbYliEkJ2ShWHKV.otzFkx4I3gjXWT.9jjTvH3Hj/ctIbA.'),
(9, 'guilherme', '2222-11-12', 'isso', 'Rua Irmão Deodoro', 1111, '08410-410', 'São Paulo', 'SP', '111111111', '111.111.111-11', 'gui@foda.com', '(11) 1111-1111', '(11) 11111-1111', '$2y$10$fUqhMwEIZslCrjdpnM9XkeGsMXVmVR2m1tweCEmNOx/VBysEgbahi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpedido`
--

CREATE TABLE `tbpedido` (
  `idPedido` int(11) NOT NULL,
  `idProduto` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbproduto`
--

CREATE TABLE `tbproduto` (
  `idProduto` int(11) NOT NULL,
  `nomeProduto` varchar(100) NOT NULL,
  `fotoProduto` varchar(255) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `valorProduto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbproduto`
--

INSERT INTO `tbproduto` (`idProduto`, `nomeProduto`, `fotoProduto`, `idCategoria`, `valorProduto`) VALUES
(1, 'dawd', '09d04f7436fad255628f62011ee9cfdb.jpg', 2, 222);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices para tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idProduto` (`idProduto`,`idCliente`);

--
-- Índices para tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD PRIMARY KEY (`idProduto`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD CONSTRAINT `tbproduto_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `tbcategoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
