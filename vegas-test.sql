-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 02 2023 г., 15:52
-- Версия сервера: 5.7.38
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vegas-test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `email`) VALUES
(1, '+79999999999', 'example123@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2023_02_01_105525_create_socials_table', 1),
(14, '2023_02_01_105630_create_contacts_table', 1),
(15, '2023_02_01_105744_create_services_table', 1),
(16, '2023_02_01_111134_create_titles_table', 1),
(17, '2023_02_01_192322_add_slug_services', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `title`, `short_content`, `content`, `img`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'ab', 'Voluptatem alias esse voluptates veniam facere expedita. Quis velit et ipsum repudiandae modi amet doloribus. Tempora ut aut beatae ducimus vel voluptatem voluptatem.', 'Eveniet maxime quia sapiente et cumque voluptatem laborum. Ullam in quis ad ipsum neque laboriosam quidem. Quaerat sequi excepturi nihil molestias at et nobis. Fuga pariatur nemo dolorem enim quam. Accusantium in consequatur facilis est. Dolorum sapiente dolorem quaerat accusantium. Inventore minus quis porro. Repudiandae aut ea nihil autem officiis aperiam rerum. Quo officiis dolorem vitae rerum omnis. Unde consequatur ad vel quae sit.', 'https://avatars.mds.yandex.net/get-altay/1881714/2a0000016f6d66820ddf33641e5c859cc269/XXXL', '2019-01-20 22:31:16', '2016-11-14 21:01:38', 'ab'),
(2, 'omnis', 'Consequuntur quo molestiae repellat. Et nihil et maxime qui facilis. Dolorum quis temporibus fugit et id. Odio at repellendus sed aperiam.', 'Ullam voluptate velit modi sed. Fugit possimus doloremque tempora sunt voluptate. Ipsum corrupti quia unde vel explicabo doloremque sequi quaerat. Ullam voluptates nulla facere dolor. Aliquam ut sint doloribus ea laboriosam tenetur. Voluptatem ratione voluptas nihil ad praesentium ut quae. Ducimus aut eos sed iure est aspernatur libero. Nemo soluta doloremque non numquam. Modi beatae deserunt nobis quod voluptas aut. Veritatis nihil doloremque expedita odit.', 'https://via.placeholder.com/640x480.png/0088dd?text=sunt', '2001-05-20 15:13:48', '2007-09-26 00:30:28', 'omnis'),
(3, 'saepe', 'Odit commodi quibusdam non. Ipsa eum sequi quam harum sed nostrum laborum. Animi nostrum omnis nobis cum quod sit.', 'Explicabo tempora nulla illo exercitationem. Nulla nisi minus repellendus minus saepe reprehenderit autem vel. Amet suscipit maxime nobis sapiente eum possimus sunt. Repellat architecto tempora dolorum totam ab impedit perspiciatis. Voluptatem ut consequatur ex et. Libero voluptatem doloribus accusantium nisi eos incidunt aut laboriosam. Maiores ut dignissimos quam qui sit quas. Delectus est ut voluptatum. Dolore quia quod labore quia magnam. Quibusdam et vel eaque voluptatem dolore.', 'https://via.placeholder.com/640x480.png/00bb11?text=perferendis', '1980-08-19 03:12:06', '1994-10-08 07:12:16', 'saepe'),
(4, 'non', 'Voluptas id consequuntur ab hic praesentium omnis dolores. Exercitationem eius quis dolorem temporibus. Voluptates non aliquid excepturi fuga eligendi. Magnam quidem aut deleniti tenetur qui nihil ut eos.', 'Nisi dolorum doloribus eius magnam. Et eos dolores et et ducimus ad. Repellat molestiae itaque impedit at amet hic. Blanditiis ut odio non provident illo ab. Facilis tenetur qui sed culpa vel. Dolores eos sit veritatis at voluptate illum. Animi consequuntur aperiam mollitia corrupti itaque. Ea enim explicabo vero in. Et animi qui odio quia laudantium dolore tenetur sunt. Tempore sint accusamus est voluptates expedita quia quibusdam.', 'https://via.placeholder.com/640x480.png/00ccaa?text=nihil', '2006-04-07 11:45:06', '1993-05-31 23:24:42', 'non'),
(5, 'eveniet', 'Recusandae qui ipsa veritatis doloribus et. Voluptatem non non et nostrum quaerat laudantium.', 'Qui modi necessitatibus ut veniam. Iusto in earum atque corrupti repudiandae. Atque expedita molestias voluptatem. Officia dolorum cumque libero dolor odit corrupti minus voluptatem. Asperiores qui esse quos delectus dolore. Reprehenderit illo facilis tempora omnis rerum temporibus dolor earum. Voluptas repudiandae earum quis tempora omnis. Et possimus repellendus corrupti earum. Cum ad nostrum minus facilis vero voluptas. Nulla quae qui quis maiores.', 'https://via.placeholder.com/640x480.png/002233?text=quos', '1996-10-22 02:24:41', '2018-08-30 22:39:34', 'eveniet'),
(6, 'molestias', 'Sint unde doloremque enim est quos quisquam et. Necessitatibus consequatur magni aut numquam. Nisi aut rerum temporibus modi illum voluptates est. Ut recusandae sint est dolor modi repudiandae omnis.', 'Quaerat nostrum iure ullam sed. Quaerat sint in commodi et corrupti doloremque odit. Excepturi occaecati porro voluptatem distinctio explicabo. Odio et neque voluptatum officia qui. Et dolor facere ducimus fuga tempora ipsa vel. Ut aut temporibus aliquid praesentium atque non reprehenderit. Quis libero est repellendus non sequi. Incidunt iure repudiandae sed harum cum occaecati. In sed inventore facere dolore sapiente. Libero vero dolorem dolor totam qui cumque adipisci.', 'https://via.placeholder.com/640x480.png/00bb22?text=autem', '1984-03-30 19:38:58', '1988-09-13 11:49:07', 'molestias'),
(7, 'voluptatibus', 'Illum magnam amet nulla et iure. Repudiandae qui quo aut eius et est. Sequi quis incidunt eum est voluptate aliquam repellendus. Sit voluptatum incidunt saepe dolores quam error incidunt.', 'Possimus et consectetur quis. Necessitatibus et commodi dolore officiis. Est dolores nesciunt facere quasi doloribus ut. Earum et ducimus dolores est eum consequatur in dignissimos. Velit repudiandae qui et excepturi. Temporibus quia cupiditate amet. Ut quasi non eum sed. Delectus nostrum dolorem quia.', 'https://via.placeholder.com/640x480.png/0044bb?text=dicta', '2006-09-08 20:54:52', '1991-05-22 22:46:51', 'voluptatibus'),
(8, 'ab', 'Recusandae quia autem est eos ipsum tenetur omnis doloremque. Necessitatibus nihil sed quasi et quia. Error quibusdam dolorem qui molestiae vel maxime suscipit consequatur.', 'Reiciendis eos quidem incidunt consequatur est iure voluptatem vel. Dolorem animi illum consectetur eos. Voluptates qui illum rerum eaque. Aut ex ea doloribus in. Cumque qui commodi in optio ipsa. Sint odio eum velit eveniet. Nemo ut delectus saepe doloremque. Possimus cumque commodi sunt ipsum. Atque molestiae est facere molestiae.', 'https://via.placeholder.com/640x480.png/00dd99?text=qui', '1981-12-10 20:54:41', '1990-12-21 20:10:38', 'ab'),
(9, 'quis', 'Voluptatum saepe pariatur aut error velit doloremque. Ex nesciunt alias incidunt ut voluptate ad ex. Blanditiis excepturi est sed ea rerum ut.', 'Nam nam rerum magnam eligendi et neque aut culpa. Eaque quisquam excepturi ad quam qui ad magnam. Explicabo et illum sit dolorum natus. Dolor voluptas pariatur voluptatibus soluta et. Hic voluptatibus quasi repudiandae. Veritatis dolorum sed quia vel aspernatur est dolor distinctio. Et accusamus praesentium laudantium omnis. Ea est commodi voluptate architecto quis. Eaque voluptates voluptate labore. Fugit illo laborum quos cumque ut.', 'https://via.placeholder.com/640x480.png/00bbaa?text=beatae', '1996-07-22 06:41:11', '1998-03-19 15:13:43', 'quis'),
(10, 'ex', 'Consequuntur possimus fuga vero magnam beatae accusamus. Saepe quisquam optio eius. Accusantium iure et suscipit qui.', 'Ut ut ipsa vitae hic laboriosam. Magni consequatur eaque quia voluptas consequatur molestias aut. Sit tempore aut voluptatem enim blanditiis aut quis. Voluptas in amet quis iure. Et amet enim mollitia. Molestias aperiam voluptate enim voluptatem. Totam vel molestias odio perferendis laborum eum. Cumque ea quia veritatis aspernatur soluta quis aut.', 'https://via.placeholder.com/640x480.png/0044dd?text=ea', '1980-09-23 06:55:33', '2015-03-11 21:19:24', 'ex'),
(11, 'iste', 'Est dolorum reprehenderit dignissimos consequuntur sint dolorum. Laboriosam ea voluptas aliquid neque soluta eos alias. Quo commodi repudiandae harum aspernatur aliquam eos. Sunt harum eligendi ad asperiores sunt deleniti.', 'Cumque et rerum assumenda illo. Non qui qui sed facere et. Odit ipsum magnam fugit dolorum iste eius. Magnam quod veritatis non et. Et accusantium rem et facilis pariatur quasi expedita. Nostrum libero voluptas consequatur sunt. Atque aut doloribus expedita enim. Officiis sit sunt non ex beatae. Assumenda impedit accusantium ipsam. In earum quis sunt voluptatem possimus ab. Consequatur dolore cum quia magni id perferendis.', 'https://via.placeholder.com/640x480.png/00bb99?text=nulla', '2001-07-14 19:32:30', '2002-01-25 22:31:10', 'iste'),
(12, 'exercitationem', 'Pariatur saepe cumque enim quis fugiat. Molestiae quisquam rem dolore numquam. Et consequatur aliquid eos fugit placeat. Et ullam quas officiis minima pariatur et quia.', 'Quae nam voluptas consequatur est omnis voluptatem provident. Placeat voluptatem voluptas accusantium ut ut animi nisi. Ut quia unde et et est molestiae officiis. Ea vel tempora sed ex delectus aliquam quod voluptatibus. Incidunt dolores magnam quod et eaque voluptate quia. Ut ratione quis quo reprehenderit esse sint. At id qui ea tenetur rerum quo libero. Sint eos et voluptas et atque recusandae mollitia. Quis et corrupti iure voluptatem suscipit occaecati.', 'https://via.placeholder.com/640x480.png/00dd44?text=exercitationem', '2010-01-06 17:38:06', '1985-08-23 07:39:01', 'exercitationem'),
(13, 'nobis', 'Mollitia qui omnis ex provident modi ullam ipsam corrupti. Nihil et veniam tempora ducimus pariatur. Voluptatem reprehenderit dolor eveniet aliquid ad ratione.', 'Nulla sit et voluptates. Saepe ut est at alias nisi exercitationem odio illo. Voluptatem ea est sed aut id ut. Dolorem porro et fugiat ut. Sed voluptates ut officiis. Assumenda repellat est velit facilis pariatur. Quo cum saepe enim voluptatum aut omnis. Esse vero vel sequi.', 'https://via.placeholder.com/640x480.png/006677?text=magni', '2020-01-30 00:17:48', '1986-04-29 07:48:06', 'nobis'),
(14, 'id', 'Illo quia ipsum neque quaerat dolor. Sit eius et est sed. Voluptate a nihil soluta deleniti commodi eum non.', 'Ad assumenda maiores nam vitae quidem deleniti et. Rerum eos corrupti ab deleniti debitis. Veritatis ab praesentium et natus. Animi sint voluptatibus qui et velit. Dignissimos nesciunt ut quis nemo et recusandae provident asperiores. Est deserunt atque esse impedit velit deleniti. Reiciendis et amet voluptas. Animi ipsam totam consectetur. Enim labore nostrum omnis magnam quis eum. Sed consequatur vel est voluptatibus dolor dolore. Et nihil animi ducimus soluta beatae. Saepe quia tempora alias.', 'https://via.placeholder.com/640x480.png/00ee33?text=deleniti', '1990-03-09 10:24:17', '2009-03-13 21:11:45', 'id'),
(15, 'nemo', 'Non iusto qui est minima vel. Amet voluptatem dicta ea deserunt velit vero enim totam. Illo quo quod aut aut qui cumque facilis.', 'Occaecati autem aspernatur et maxime odit commodi. Sunt autem voluptatem molestiae omnis et velit odio. Eum delectus ipsum architecto minus est velit aut. Voluptas veritatis sed voluptate sed modi animi. Facilis dolores fuga et voluptas. Tempora esse qui at facere ut voluptatem. Provident enim saepe non eveniet illo totam. Inventore nesciunt id aut explicabo explicabo accusamus. Officia doloribus qui dicta voluptates.', 'https://via.placeholder.com/640x480.png/0011bb?text=vero', '2003-08-19 21:41:21', '1991-08-01 02:22:51', 'nemo'),
(16, 'nulla', 'Quis tenetur et id voluptatum delectus ratione fugiat. Earum numquam et consequuntur fugit eligendi quos. Perspiciatis commodi perspiciatis sapiente ducimus cupiditate possimus earum.', 'Alias error ut corrupti laudantium. Ut aliquam dolores tenetur voluptatum. Voluptatem rerum quos eveniet. Aut voluptate expedita dignissimos est aut deleniti. Aliquid fuga cumque ab in dolore et. Et in itaque quidem cupiditate occaecati sint. Ut dignissimos qui aut rerum dicta soluta. Sed facere nesciunt quia ut inventore harum est. Similique odio et distinctio et omnis ad odit.', 'https://via.placeholder.com/640x480.png/005511?text=laborum', '2002-12-26 23:29:59', '2006-04-24 20:08:13', 'nulla'),
(17, 'commodi', 'Assumenda asperiores omnis ut temporibus velit veritatis. Rerum molestiae eos minus ut sequi.', 'Quidem sequi voluptatem laudantium quas facere quia maxime. Voluptatem dolorum soluta a officiis dolores voluptate et. Possimus qui culpa doloremque odio omnis voluptatem est. Error dicta omnis non est sapiente non. Adipisci laborum autem dolorem nihil. Et maiores adipisci aut ducimus velit non dolor eum. Aut harum quis dolorum rerum. Rerum eos quia nesciunt praesentium. Saepe ratione ut hic sed at nemo iste.', 'https://via.placeholder.com/640x480.png/0088ee?text=accusamus', '2010-04-05 10:49:42', '2012-08-15 18:53:58', 'commodi'),
(18, 'iure', 'Possimus consequatur accusantium nobis libero laborum. Quaerat quasi maxime temporibus numquam. Id et suscipit iusto perferendis cumque ad enim laboriosam.', 'Hic id iste vel repudiandae adipisci facere officiis. Deserunt omnis veritatis optio quo quibusdam. Reiciendis ut dolorem necessitatibus eveniet natus sit. Vel distinctio iusto beatae asperiores. Est incidunt dolor doloremque saepe dicta sequi ipsa. Mollitia aperiam quis error temporibus dolore. Animi aut pariatur incidunt dignissimos dolor quia. Quia ut quo nostrum. Ducimus autem sunt quam saepe cumque minus tempore. Consequatur quaerat et temporibus vel omnis qui amet.', 'https://via.placeholder.com/640x480.png/003388?text=ipsam', '1987-09-19 03:06:13', '2008-03-02 06:48:33', 'iure'),
(19, 'ipsam', 'Deserunt animi nesciunt perferendis enim. Voluptatem maxime quisquam neque commodi doloribus. Libero quasi repudiandae cumque. Dolor magnam voluptas enim quae in quo.', 'Molestiae voluptatibus nostrum earum adipisci. Non possimus ipsa sint nihil. Ut ut repellendus autem consequatur. Laboriosam et omnis qui et ducimus soluta ipsam qui. Distinctio ullam ab ut est ipsa ipsa. Fugit placeat error aliquid minima expedita.', 'https://via.placeholder.com/640x480.png/00aabb?text=omnis', '1997-05-12 00:48:31', '2002-06-11 05:07:01', 'ipsam'),
(20, 'saepe', 'Laudantium nemo animi quis ipsum. Vel voluptatem tempora eligendi dolor laudantium dolores. Est nam accusantium autem. Et ut ratione magni quia et sunt.', 'Eos ipsa consequatur consectetur vero. Ipsa tenetur architecto iusto et et atque qui. Quia velit iusto pariatur sit libero. Doloribus debitis quo ab perspiciatis commodi numquam. Repellat possimus accusantium voluptas suscipit placeat sed. Beatae sed ut tenetur adipisci ut. Tempora nihil quia quaerat ut.', 'https://via.placeholder.com/640x480.png/002299?text=necessitatibus', '1995-04-29 20:41:36', '1973-03-10 04:56:11', 'saepe');

-- --------------------------------------------------------

--
-- Структура таблицы `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `socials`
--

INSERT INTO `socials` (`id`, `name`, `alias`) VALUES
(1, 'vk', 'https://vk.com'),
(2, 'twitter', 'https://twitter.com/?lang=ru'),
(3, 'Одноклассники', 'https://ok.ru/');

-- --------------------------------------------------------

--
-- Структура таблицы `titles`
--

CREATE TABLE `titles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `titles`
--

INSERT INTO `titles` (`id`, `title`, `content`) VALUES
(1, 'Страница Услуг', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nisl ex, sagittis a ante non, blandit aliquet lorem. Pellentesque non molestie purus. Etiam non feugiat ligula. Curabitur quis enim faucibus, interdum orci ac, euismod mauris. Donec lacinia dui massa, eu tristique tellus iaculis vitae. Nulla consectetur magna sed velit convallis venenatis.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
