CREATE TABLE fundos (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL,
  ticker VARCHAR(10) NOT NULL,
  valor DECIMAL(10,2) NOT NULL,
  quantidade INT UNSIGNED NOT NULL,
  data DATE NOT NULL,
  PRIMARY KEY (id)
);

--
-- Gerado pelo PhpmyAdmin
--

CREATE DATABESE bd_roteiro1;

CREATE TABLE `fundos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `ticker` varchar(10) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `quantidade` int NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (id)