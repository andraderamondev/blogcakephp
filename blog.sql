-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Fev-2020 às 03:45
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `posts_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comments`
--

INSERT INTO `comments` (`id`, `text`, `created`, `modified`, `posts_id`, `username`) VALUES
(2, 'Excelente dicas Neil muitas pessoas fazem isso e sempre pecam em algum ponto por isso não conseguem criar backlinks de relevancia', '2020-02-08 18:47:10', '2020-02-08 18:47:10', 3, 'João José'),
(3, 'Excelente dicas Neil muitas pessoas fazem isso e sempre pecam em algum ponto por isso não conseguem criar backlinks de relevancia', '2020-02-08 18:52:12', '2020-02-08 18:52:12', 3, 'Maria da Silva'),
(5, 'Excelente dicas Neil muitas pessoas fazem isso e sempre pecam em algum ponto por isso não conseguem criar backlinks de relevancia', '2020-02-08 18:54:51', '2020-02-08 18:54:51', 2, 'Francisco de Paula'),
(7, 'KKKK...so falta funcionar msm', '2020-02-08 20:29:57', '2020-02-08 20:29:57', 1, 'José Santos'),
(8, 'asdasd', '2020-02-08 20:50:33', '2020-02-08 20:50:33', 3, 'asdasd'),
(10, 'Outro comentário aleatório', '2020-02-08 21:49:02', '2020-02-08 21:49:02', 5, 'Ramon Dev'),
(11, 'So mais um teste', '2020-02-08 22:52:58', '2020-02-08 22:52:58', 1, 'Ramon Andrade'),
(14, 'asdadanasdnasd as dajsd as', '2020-02-09 04:21:00', '2020-02-09 04:21:00', 1, 'Chico Bastoaj');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `content`, `created`, `modified`, `users_id`, `title`) VALUES
(1, 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro.\r\n\r\nO Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro.\r\n\r\nO Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro.\r\n\r\nO Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro.', '2020-02-08 12:46:00', '2020-02-10 03:27:54', 9, 'Algum titulo qualquer 121?'),
(2, 'Então, um dia, James Chartrand decidiu revelar sua verdadeira identidade em um post no blog, dizendo a todos que ela era uma mulher e não um homem, como todos presumiam.\r\n\r\nPor que uma blogueira e desenvolvedora web julgou necessário revelar sua verdadeira identidade? Bem, o motivo é simples: Para ganhar a confiança de seu público-alvo.\r\n\r\nDa mesma forma, quando você escrever comentários em blogs do ramo, não cometa o erro de usar um endereço de email falso.\r\n\r\nRelações comerciais podem ser iniciadas na seção de comentários. Se você é um blogueiro e notou que um leitor em particular sempre lê seus posts e deixa comentários valiosos, você pode contatá-lo facilmente através de seu endereço de email.\r\n\r\nImagine o quão frustrado não ficaria o blogueiro ao descobrir que o seu endereço de email não está funcionando adequadamente.\r\n\r\nSempre cheque duas vezes seu endereço de email.', '2020-02-08 13:11:00', NULL, 8, 'O que é o Lorem Ipsum?'),
(3, 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro.', '2020-02-08 13:46:00', NULL, 9, 'O que é o Lorem Ipsum?'),
(5, '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\r\n\r\nBut I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?', '2020-02-08 21:18:30', '2020-02-08 21:18:30', 9, 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC'),
(7, 'asdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh daasdjasdka a sha sjdah sjdha sj a ksdu haskjd akjsh da1', '2020-02-09 23:55:00', '2020-02-09 23:55:18', 9, 'Novo post 1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `avatar`, `created`, `modified`) VALUES
(1, 'José Jr', 'jose', '1415ad20f466c032e2fdf1e9fa98df6c4972a532', '', '2020-02-06 00:00:00', '2020-02-09 23:26:18'),
(7, 'João da Silva', 'joao', '1415ad20f466c032e2fdf1e9fa98df6c4972a532', 'android.jpg', '2020-02-07 16:00:24', '2020-02-09 23:29:58'),
(8, 'Usuário Teste', 'uteste', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 'android.jpg', '2020-02-07 16:06:11', '2020-02-07 16:06:11'),
(9, 'Ramon Andrade', 'ramon', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 'android.jpg', '2020-02-07 16:30:42', '2020-02-07 16:30:42'),
(10, 'Maria J', 'mariaj', '6658463e6dc63f71343b5fff381468ee4aeb8d2b', '', '2020-02-07 18:11:12', '2020-02-09 23:27:39'),
(11, 'Pedro Sousa', 'pedro', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 'android.jpg', '2020-02-08 23:49:08', '2020-02-08 23:49:08');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_fk` (`posts_id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_fk` (`users_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_fk` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`);

--
-- Limitadores para a tabela `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_fk` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
