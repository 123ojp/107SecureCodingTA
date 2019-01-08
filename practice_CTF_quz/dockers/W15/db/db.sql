SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+08:00";

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `ctf` (
  `id` int(11) NOT NULL auto_increment,
  `flag` varchar(64) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `username`, `password`) VALUES ("1", "root", "b7cc0e1980129efa3deaab7a1fddd3e060693e82");
INSERT INTO `users` (`id`, `username`, `password`) VALUES ("2", "toor", "aab2858bec1f42ec041f9e5938f7a10432e52ac6");
INSERT INTO `users` (`id`, `username`, `password`) VALUES ("3", "abcd", "89675f6b47198123940613cd72bc17d9dee284b9");
INSERT INTO `users` (`id`, `username`, `password`) VALUES ("4", "1234", "e5eb3a782f7299554923fa793c051d80cb2a58af");
INSERT INTO `users` (`id`, `username`, `password`) VALUES ("5", "a1b2", "a74842ae4d89b5e28a08ba711325276809ebdf37");
INSERT INTO `ctf` (`id`, `flag`) VALUES ("1", "CTF{use_script_try_right_ans!}");
