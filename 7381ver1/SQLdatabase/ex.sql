SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `deco7381` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `deco7381`;

CREATE TABLE `comment` (
  `id` bigint NOT NULL,
  `video_id` bigint DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `create_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `expert` (
  `id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `company` varchar(255) NOT NULL,
  `work` varchar(255) NOT NULL,
  `qualifications` varchar(255) NOT NULL,
  `graduate_university` varchar(255) NOT NULL,
  `certificate_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `user` (
  `id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `user` (`id`, `name`, `password`, `email`, `phone_number`) VALUES
(1, 'a', '$2y$10$6gdTXpbxzcFNfgFhw3MZu.8qNgorPYQ4kef2JMSlFAwfE1Ontmq3e', 'a@qq.com', '1234567890'),
(2, 'Qingyi Li', '$2y$10$Fc0NUwS9NvtdGQdT57MfluobTaMxg2whTm2g33PyonaHQfNxCHosu', 'abc@qq.com', '0493302955'),
(5, 'abc', '$2y$10$UWwuyaE61jRO0teH2bJHte923d1dOuSAnEkvSdsULUqnxpYi8iAuK', 'abcde@qq.com', '0493302955'),
(6, 'shengquan', '$2y$10$G1b8XGGA6/Bryl9r2Ca2OeZG0jZ/p6l4wyO2/e7prVu//6gIqaFhi', 'shengquan49@qq.com', '1234567890'),
(7, 'QLY', '$2y$10$5gSWVDuTVoV239AqC.BTeOw9otP0Cy9Dz2ustUguiNaG7mwyC47Nm', 'abcde@qq.com', '0493302955'),
(8, 'Hongbo Li', '$2y$10$Vx9HmQbUu.RBXbMiyJqxqem.tRZBRdLQD3VFd4Tjz.8jrsjMAlXHi', '854311939@qq.com', '13407341012'),
(9, 'try1', '$2y$10$P087oSOyw1G9SuUmHoki2OYPLo.MMhcT2SjAyAYPzbkWFtMW.23aC', '123@123.com', '12345678'),
(13, 'qwer1234', '$2y$10$Ci/6pNs9xE6k/DibEd6E3.twJFp7dr/n/Keqy.X8.pnaudc5U.jLq', 'qwer@qq.com', '1234567890'),
(14, 'www', '$2y$10$EgYbLDevEChHf/W17b8VUuahscC0lYsdhgwzK2jsWMLq8pzO9Rspa', 'ggg@qq.com', '0493302955'),
(15, 'zyb', '$2y$10$hKy5/KuVBlvv4HRLMAhBve70OYETphMFP/Kzt8WkVM2LAsLpvDleW', 'yibo.zhang@uq.net.au', '0490892215'),
(16, 'Expert', '$2y$10$CFRQA3tfKtIdkiSs5sCNDezLHAbRMENDFZSNr6QhmGwE3h9sZGp3O', 'expert@123.com', '3453456'),
(17, 'qly123', '$2y$10$EU6YlemsGLGbzTmuhO91tuEPVXRVh5xSDd5xS5ewus7nZepN7z0oW', 'qly@uq.com', '0493302955'),
(18, 'qly1234', '$2y$10$iX8R/JVd7LqU3ozFxj5dh.TTUwiSkmqins8mIbZjf9xIax/wfxSj.', 'qly1234@uq.com', '0493302955');

CREATE TABLE `video` (
  `id` bigint NOT NULL,
  `export_id` bigint DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `play_url` varchar(255) NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `videos` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `videos` (`id`, `name`, `location`) VALUES
(47, '1.mp4', 'upload/1.mp4'),
(48, '2.mp4', 'upload/2.mp4'),
(49, '3.mp4', 'upload/3.mp4'),
(50, '4.mp4', 'upload/4.mp4'),
(51, '5.mp4', 'upload/5.mp4'),
(52, '6.mp4', 'upload/6.mp4'),
(53, '7.mp4', 'upload/7.mp4'),
(54, '8.mp4', 'upload/8.mp4'),
(55, '9.mp4', 'upload/9.mp4'),
(56, '10.mp4', 'upload/10.mp4'),
(57, '11.mp4', 'upload/11.mp4'),
(58, '12.mp4', 'upload/12.mp4'),
(59, '13.mp4', 'upload/13.mp4'),
(60, '14.mp4', 'upload/14.mp4'),
(61, '15.mp4', 'upload/15.mp4'),
(62, '16.mp4', 'upload/16.mp4'),
(63, '17.mp4', 'upload/17.mp4'),
(64, '18.mp4', 'upload/18.mp4'),
(65, '19.mp4', 'upload/19.mp4'),
(66, '20.mp4', 'upload/20.mp4'),
(67, '21.mp4', 'upload/21.mp4'),
(68, '22.mp4', 'upload/22.mp4'),
(69, '23.mp4', 'upload/23.mp4'),
(70, '24.mp4', 'upload/24.mp4'),
(71, '25.mp4', 'upload/25.mp4'),
(72, '26.mp4', 'upload/26.mp4'),
(73, '27.mp4', 'upload/27.mp4'),
(74, '26.webm', 'upload/26.webm'),
(75, '28(fortest).mp4', 'upload/28(fortest).mp4'),
(76, '28.mp4', 'upload/28.mp4'),
(77, 'Sample9.webm', 'upload/Sample9.webm'),
(78, 'Sample8.webm', 'upload/Sample8.webm'),
(79, 'Sample7.webm', 'upload/Sample7.webm'),
(80, 'Sample6.webm', 'upload/Sample6.webm'),
(81, 'Sample5.webm', 'upload/Sample5.webm'),
(82, 'Sample4.webm', 'upload/Sample4.webm'),
(83, 'Sample3.webm', 'upload/Sample3.webm'),
(84, 'Sample2.webm', 'upload/Sample2.webm'),
(85, 'Sample1.webm', 'upload/Sample1.webm');

CREATE TABLE `videos1` (
  `id` int NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_video_id` (`video_id`) USING BTREE;

ALTER TABLE `expert`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id_name` (`name`) USING BTREE;

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id_name` (`name`) USING BTREE;

ALTER TABLE `video`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id_title` (`title`) USING BTREE;

ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `videos1`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `comment`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

ALTER TABLE `expert`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

ALTER TABLE `video`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

ALTER TABLE `videos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

ALTER TABLE `videos1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
