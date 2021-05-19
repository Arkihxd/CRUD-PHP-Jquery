CREATE DATABASE IF NOT EXISTS `mysql-info16` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mysql-info16`;

create table if not exists pessoas (
   id int not null AUTO_INCREMENT,
   nome varchar(255) not null,

   PRIMARY KEY (id)

);

create table if not exists dependentes (
   id int not null AUTO_INCREMENT,
   nome varchar(255) not null,
   pessoa int not null,
   FOREIGN KEY (pessoa) REFERENCES pessoas(id),
   PRIMARY KEY (id)
);

INSERT INTO  `pessoas` (`id`, `nome`) VALUES
(1, 'João Almeida'),
(2, 'André Santiago'),
(3, 'Jairo Nascimento'),
(4, 'Luiz Augusto'),
(5, 'Maria Gonçalves'),
(6, 'Vera Oliveira'),
(7, 'Paulo Augusto'),
(8, 'Lurdes Andrade'),
(9, 'José Souza'),
(10, 'Lúcia Garcia'),
(11, 'Felipe Maranhão'),
(12, 'Carlos Dias');


INSERT INTO `dependentes` (`id`, `nome`, `pessoa`) VALUES
(not null, 'Ioan Miguéis', 1),
(not null, 'Vera Ornelas', 1),

(not null, 'Petra Batata', 2),
(not null, 'Rita Milheiro', 2),

(not null, 'Martin Bruno', 3),
(not null, 'Ianis Silveira', 3),
(not null, 'Giorgi Torres', 3),


(not null, 'Raissa Couto', 4),
(not null, 'Emmanuel Brásio', 4),
(not null, 'Eric Lage', 4),



(not null, 'Aliya Carrilho', 5),
(not null, 'Aryan Lessa', 5),

(not null, 'Bartolomeu Lisboa', 6),
(not null, 'Camila Piteira', 6),
(not null, 'Omar Garcez', 6),

(not null, 'Valdemar Caeira', 7),
(not null, 'Elena Bogado ', 7),


(not null, 'Josefa Palmeira', 8),
(not null, 'Liam Breia', 8),


(not null, 'Aliça Bezerra', 9),
(not null, 'Mila Portella', 9),

(not null, 'Miriam Pacheco', 10),
(not null, 'Nayra Rodrigues', 10),


(not null, 'Milene Toscano', 11),
(not null, 'Mario Fonseca', 11),
(not null, 'Carol Marques', 11),
(not null, 'Caetano Augusto', 11),

(not null, 'Lia Cotrim', 12),
(not null, 'Diana Queirós', 12),
(not null, 'Américo Alvarenga', 12);