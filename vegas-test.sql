-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 02 2023 г., 16:57
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
-- Структура таблицы `service`
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
-- Дамп данных таблицы `service`
--

INSERT INTO `services` (`id`, `title`, `short_content`, `content`, `img`, `created_at`, `updated_at`, `slug`) VALUES
(21, 'voluptas', 'Nemo veritatis dolores qui non culpa. Consequuntur perferendis nisi mollitia sequi iure sint. Non dolorem necessitatibus at enim. Soluta commodi voluptas cum dolore qui facere est.', 'Hic suscipit rerum quia autem. Et id dicta fuga voluptas laudantium in. Sit quibusdam et omnis iste et sed ut. Ipsa qui sint qui culpa aspernatur. Et aut tempora omnis molestiae. Dolores vitae nesciunt doloribus vel ab ut iusto temporibus. Earum nulla sed enim cum magnam quia et omnis. Eligendi accusamus tempore ullam reiciendis. Rem sapiente repudiandae nostrum numquam optio rerum aut. Eius voluptatem dolorem voluptatem repellat iste qui.', 'https://via.placeholder.com/640x480.png/00ee66?text=dicta', '1994-12-28 02:09:35', '2013-12-23 18:40:55', 'reprehenderit'),
(22, 'id', 'Commodi porro laboriosam occaecati et et voluptatibus laborum. Mollitia nihil distinctio et iusto. Asperiores laborum numquam aliquid hic in.', 'Beatae id hic adipisci quod non. Soluta modi non dolor impedit quia. Molestiae explicabo voluptatum explicabo voluptas quidem iste enim aut. Et et fuga quisquam voluptas deleniti. Dolor facilis iusto molestiae ut quia commodi perspiciatis. Necessitatibus est iste omnis modi veritatis officia. Eos consequatur aspernatur excepturi. Aut ex hic commodi porro culpa.', 'https://via.placeholder.com/640x480.png/00ee22?text=magnam', '1980-12-19 08:16:01', '1975-07-16 15:52:33', 'voluptate'),
(23, 'natus', 'Illum ut quae laboriosam tenetur quisquam fuga. Nobis exercitationem et voluptas maxime aut repellat quia perferendis.', 'Sequi eos voluptates doloremque occaecati id rerum ut quisquam. Molestiae odit iusto magnam dolorem. Ut aliquam est ut dolor. Aut facere consectetur et quisquam nihil et. Doloremque aut iusto perspiciatis et. Et labore vero accusamus voluptate ut voluptatem. Aspernatur sint amet non sunt a cupiditate quas. Excepturi consequatur non adipisci et. Dolores aut et officiis aut accusamus molestias accusamus. Nostrum rerum et dolores suscipit ex sapiente. Voluptatem est officia totam inventore.', 'https://via.placeholder.com/640x480.png/000011?text=ad', '1987-12-18 21:41:34', '1973-07-27 13:40:29', 'rerum'),
(24, 'autem', 'Aut magnam veniam perspiciatis consectetur et consequatur unde. Quas est provident harum vitae officiis deleniti similique. Aut quia sint minima.', 'Eos quia hic porro in assumenda. Quo repudiandae sunt et. Maxime impedit eos ducimus error fugit est consequuntur. Ab totam quibusdam maxime at. Impedit non deserunt saepe. Optio ipsa et doloribus aliquid incidunt atque non. Iste facilis perspiciatis non quia aut sed ipsum. Ut aliquam quam ea aperiam ut voluptate et.', 'https://via.placeholder.com/640x480.png/000022?text=rem', '1986-06-24 16:57:49', '1992-01-02 23:43:07', 'ab'),
(25, 'et', 'Est dolorem impedit expedita saepe velit. Deserunt quo aperiam rerum soluta sint. Numquam quasi totam placeat architecto est.', 'Natus unde architecto eveniet reprehenderit qui est. Debitis natus ducimus quaerat est consequatur. Aliquam voluptatibus aut repellendus molestias qui. Excepturi tenetur quidem sint delectus mollitia quibusdam et. Libero exercitationem recusandae voluptate odio. Aut sed eum quis iure fuga ratione molestias. Rem odio aliquid quos ipsa. Natus numquam et dolorem et laudantium incidunt.', 'https://via.placeholder.com/640x480.png/0088cc?text=odio', '1986-06-13 21:34:36', '2011-02-17 19:23:03', 'voluptatem'),
(26, 'iste', 'Asperiores animi eos tenetur explicabo culpa repellat. Et occaecati in eaque omnis est aut debitis ratione.', 'Fugiat dolor possimus harum labore aut. Explicabo id tempora aspernatur possimus et odio officiis libero. Voluptatem enim est officia tempore maiores eaque dignissimos. Labore eveniet molestiae unde totam necessitatibus. Et aut nostrum maiores magni doloremque. Repellat accusamus qui cupiditate ipsam magni nihil dolores. Laborum impedit quos corporis quo ut laborum dolorem. Quaerat nostrum aliquam reprehenderit ea nam.', 'https://via.placeholder.com/640x480.png/00dd11?text=ratione', '2012-01-03 17:54:21', '1981-09-16 07:22:04', 'qui'),
(27, 'et', 'Tenetur voluptas adipisci quia rerum rem explicabo consequatur officia. Eum molestiae ad et aut est. Eveniet animi totam iste.', 'Voluptatem debitis qui provident provident sunt. Consequuntur in sint quia. Quod in possimus consequuntur nam excepturi illum itaque. Neque enim aperiam qui expedita ab doloribus. Quis facilis dolorem odit incidunt sapiente odio maiores. Accusamus distinctio omnis veritatis dignissimos sequi cumque repellendus. Ea nobis autem a fugit corrupti. Omnis aut voluptatibus rerum aut iusto. Sit quas quidem et. Et nulla necessitatibus laudantium odit perspiciatis recusandae id.', 'https://via.placeholder.com/640x480.png/001122?text=eligendi', '2010-05-07 16:32:17', '2016-05-25 07:16:17', 'cum'),
(28, 'consectetur', 'Veniam impedit ut dolores consequatur magnam autem. Numquam corrupti architecto repellendus nisi nam est recusandae. Quas nesciunt aliquam similique commodi error perspiciatis.', 'Aut saepe beatae officiis fugit praesentium cumque hic. Ex quia iste et autem corporis dolorem. Magni ea eos veniam non eligendi dolorem ut. Eos et iure voluptatibus excepturi quia dolore. Possimus enim magnam aut sint aliquam enim quisquam. Itaque quis repellat reiciendis. Aut aut adipisci quaerat quidem qui ea.', 'https://via.placeholder.com/640x480.png/001111?text=occaecati', '1996-03-28 12:24:15', '2014-06-18 05:31:32', 'quasi'),
(29, 'neque', 'Quaerat porro enim error sint sit. Recusandae in doloribus ipsa. Omnis voluptatem ut et sapiente minus pariatur. Iusto voluptate tempora sit velit.', 'Delectus sint et sunt eaque tempora voluptas reiciendis officia. Beatae perspiciatis totam optio aut dicta rem fuga. Amet dolor et explicabo et debitis. Sint itaque consequatur explicabo rerum voluptatem nostrum. Voluptas maxime nulla cupiditate officiis. Quasi recusandae alias repudiandae in corrupti eum et. Iure iure numquam deserunt iste quia. Aut harum optio adipisci voluptas eligendi quaerat et.', 'https://via.placeholder.com/640x480.png/00dd22?text=perferendis', '1970-04-29 08:48:10', '1979-01-16 05:31:45', 'ea'),
(30, 'praesentium', 'Accusantium quis molestias eos ratione. Molestiae mollitia ipsam cupiditate commodi cumque. At architecto tempore ipsa nostrum voluptas. Officia qui ea voluptate et laborum alias ipsam.', 'Accusantium et magnam dolores omnis ut est veniam. Minus qui nemo ut laborum debitis sit rerum. Quam exercitationem ut praesentium laboriosam a. Impedit eveniet provident blanditiis neque deserunt perspiciatis vel. Autem fugiat ut assumenda maxime facilis vero labore. Ab porro quaerat voluptatem suscipit rerum. Atque quo fugiat ducimus.', 'https://via.placeholder.com/640x480.png/004477?text=fugiat', '2002-12-12 13:09:22', '2000-11-09 17:47:25', 'necessitatibus'),
(31, 'alias', 'Velit maxime iure ducimus et doloremque. Sunt voluptatum omnis aspernatur eum est dolor iste. Quasi blanditiis odit quas. Vel adipisci itaque numquam sunt omnis corrupti saepe illum. Fugiat accusantium aut quidem.', 'Rerum qui autem qui ratione. Et neque dolorem blanditiis numquam voluptatum minus. Non ab ea temporibus odio. Autem velit perferendis vel dolore ipsa voluptatum numquam recusandae. Sint aut adipisci rerum. Quo aperiam et saepe qui voluptates iure. Perferendis magni laboriosam dicta. Ab voluptates eum vero. Quis aut accusamus et sunt ea eum facilis officiis. Officia libero rerum modi distinctio. Et perferendis deserunt rem a deserunt aut sint.', 'https://via.placeholder.com/640x480.png/007722?text=qui', '1980-01-19 11:52:08', '1974-01-17 00:48:12', 'quia'),
(32, 'et', 'Reiciendis enim iure ab qui iusto quasi. Qui sunt aut quis hic.', 'Repudiandae molestiae consequatur numquam accusamus. Molestiae qui a incidunt facilis aut pariatur nihil. Est vel asperiores nisi optio excepturi deserunt aut. Eveniet dignissimos beatae numquam ullam. Et harum architecto aut atque. Nemo fugit neque doloremque molestias ducimus cupiditate. Minima consequuntur illo ex impedit neque. Distinctio officia veniam soluta dolores distinctio tenetur. Ut totam dignissimos aut impedit. In fugiat officiis sit aut.', 'https://via.placeholder.com/640x480.png/0022dd?text=officiis', '1991-07-06 01:50:00', '1991-07-14 07:34:20', 'consequatur'),
(33, 'nihil', 'Expedita reiciendis aliquid porro doloribus accusantium est voluptas. Dicta sunt sed optio numquam sunt et. Molestiae atque quos in porro est magni. Amet molestiae magni error laudantium et consequatur. Perferendis porro ut soluta perspiciatis ullam.', 'Sunt corporis iste omnis provident voluptas est. Quam cum et temporibus omnis aliquid. Consequatur saepe et voluptatem commodi aut. Nisi sequi praesentium odio qui. Quaerat dolore error rerum quia. Enim eum et accusamus. Dolores dolorem laborum et aspernatur. Rerum quis voluptatibus sed consequatur labore voluptas. Hic nisi et ipsa asperiores quia illo quas. Ad est quis accusantium repellendus quas qui consequatur. Esse est natus ea facilis. Deleniti odit id temporibus.', 'https://via.placeholder.com/640x480.png/007766?text=fugiat', '2007-09-07 13:20:35', '2018-01-02 14:21:27', 'minima'),
(34, 'cumque', 'Quis rerum consequuntur sed est unde. Eius voluptatum in ut ad. Et consequatur placeat sapiente vero nesciunt dolor qui.', 'Qui est cumque veritatis molestiae. Eligendi voluptas eum enim. Et cum assumenda maiores facere sapiente. Id sunt nihil enim velit ex quas impedit. Tempora asperiores rerum ut. Autem voluptatem at a ea. Vel vel consequatur natus deserunt quam. Porro aperiam consequatur labore voluptas. Voluptatibus vel velit ipsum ducimus. Ad rem nihil autem consequuntur. Deserunt et quo doloremque. Est deserunt quam dolorem rerum illum repellat omnis.', 'https://via.placeholder.com/640x480.png/002255?text=accusamus', '1998-03-07 04:40:35', '2016-09-17 14:04:13', 'consequatur'),
(35, 'sunt', 'Odio corrupti qui amet numquam. At quia aliquid consequatur molestiae sapiente repudiandae non. Qui ipsam est sapiente fugiat nulla consectetur et. Et quis soluta nobis impedit est eligendi ea eos.', 'Aut dignissimos amet eaque facilis eius occaecati labore hic. Sit eius ut est repellat illum enim. Laborum explicabo fugiat ratione distinctio alias enim sapiente. In quod qui aspernatur quia dolorem dolorem temporibus repudiandae. Error molestias laborum architecto quos. Distinctio excepturi veritatis eveniet maxime. Veritatis ut aperiam excepturi.', 'https://via.placeholder.com/640x480.png/00ccee?text=doloribus', '2014-05-05 03:43:11', '1975-09-17 21:45:45', 'aut'),
(36, 'quaerat', 'Consequatur in ducimus porro magni. Ut repellat quibusdam est quidem officia fuga quisquam. Commodi veritatis sit impedit.', 'Est debitis illo eaque ut veritatis corrupti dolores perspiciatis. Est voluptatem ut repellat ipsam. Asperiores qui maxime dolorum rerum debitis. Dolorem facilis nobis cupiditate est minima sapiente. Saepe nam quis unde qui tempore occaecati repellendus. Quia quidem numquam non. Nostrum fugit sed eveniet et aliquid nostrum. Culpa ducimus nihil facere velit aut earum sunt. Dolorum dolorem natus deleniti cumque ad quia qui quisquam.', 'https://via.placeholder.com/640x480.png/001111?text=et', '2010-04-23 19:14:49', '1972-02-02 15:32:12', 'facere'),
(37, 'rerum', 'Iure nihil animi ut quia vitae. Repellendus distinctio aliquam suscipit dolorem praesentium. Asperiores consectetur quaerat doloremque laboriosam esse odit tempore. Impedit hic et adipisci harum.', 'Dicta nesciunt totam tempora quis ut aut saepe. Aliquid maiores modi vitae qui sed. Qui sequi sunt et reiciendis perspiciatis ab. Voluptas magnam quis et. Rerum at perspiciatis quia eos quis similique voluptatum nihil. Unde facere quis enim et officiis est nobis. Dolore non atque magni illum quod perferendis. Aut debitis vel praesentium. Sit laborum labore dolorum aut asperiores. Id nisi aliquid sed sit non atque. Voluptatum quos et est et vel voluptas explicabo.', 'https://via.placeholder.com/640x480.png/00aabb?text=ea', '1975-12-31 00:58:30', '1981-06-19 05:26:48', 'aut'),
(38, 'sed', 'Omnis eum assumenda minima illum repellendus. Quos iste quia omnis repudiandae rerum voluptatem reprehenderit. Praesentium rerum accusantium qui optio sed eaque.', 'Molestias voluptatem quidem mollitia laboriosam non aut est. Aut quia corrupti ex placeat aut excepturi rerum. Quas ut perspiciatis corporis praesentium veniam dolor est illum. Porro ipsa maxime quas est repellendus qui quo maxime. Est repellendus sint necessitatibus perspiciatis deserunt. Voluptatum animi debitis sunt omnis. Est ab distinctio sit repellendus qui cumque voluptatibus. Sapiente ullam et dolorum veritatis dignissimos. Nam quos dignissimos saepe. Eveniet voluptas est modi aut quod.', 'https://via.placeholder.com/640x480.png/00ee44?text=ut', '2001-06-10 19:18:54', '1995-01-06 23:08:21', 'natus'),
(39, 'asperiores', 'Tempore quia odio ut. Impedit pariatur minima voluptas aut et ratione.', 'Nulla voluptatem vitae magni accusamus dolores quia et rerum. Mollitia autem dolor nobis. Fugiat maiores officia sit neque mollitia esse quibusdam. Maxime iure et ut dolor eos occaecati praesentium. Nisi nihil provident enim perferendis. Sit id est veritatis neque sed perferendis veniam ut. Vel odit omnis quasi non. In fugit libero doloremque quam hic ipsam. Quo saepe vel iure sed mollitia. Voluptatem non magnam quidem et tempore autem.', 'https://via.placeholder.com/640x480.png/006666?text=itaque', '1992-04-27 21:48:22', '1981-08-20 20:44:06', 'est'),
(40, 'magnam', 'Et vel velit ipsum reiciendis. Et esse vel sunt laborum. Voluptas dolor repellat debitis ratione.', 'Est tempore eos est ratione qui. Doloremque commodi molestiae quasi. Accusamus rem consectetur error vel. Eaque ratione rem non suscipit ut sed et nulla. Qui explicabo cupiditate quo voluptas. Officia quia natus voluptatum error deserunt ab aperiam placeat. Sed magni nobis natus minus dicta facilis dolore. Dignissimos tenetur pariatur explicabo.', 'https://via.placeholder.com/640x480.png/002266?text=laudantium', '1982-01-17 06:11:10', '1972-10-01 16:09:48', 'reiciendis');

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
-- Индексы таблицы `service`
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
-- AUTO_INCREMENT для таблицы `service`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
