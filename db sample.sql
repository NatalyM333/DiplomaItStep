-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 12 2022 г., 14:57
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `coursessite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1633084335),
('admin', '5', 1635187184);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1632999171, 1632999171),
('support', 1, NULL, NULL, NULL, 1633585331, 1633585331),
('user', 1, NULL, NULL, NULL, 1633585160, 1633585160);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT '',
  `url_file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`url_file`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `documents`
--

INSERT INTO `documents` (`id`, `name`, `description`, `url_file`) VALUES
(2, 'Ліцензія', '', '\"..\\/..\\/files\\/document\\/c680c4d5c94452860e3d3b0915ad7107.pdf\"'),
(3, 'Свідоцтво ПДВ', '', '\"..\\/..\\/files\\/document\\/d006ca75b1ffbdff13ba10e624d5fade.pdf\"'),
(4, 'Дозвіл', '', '\"..\\/..\\/files\\/document\\/a01e82a54c9cab6b92b411bad445f915.pdf\"'),
(5, 'Довідка з ЄДРПОУ', '', '\"..\\/..\\/files\\/document\\/fbb910f093ae6eccdf68e739457ef6e4.pdf\"'),
(6, '1252 MONITOR UKRAINE - Distributor Certyficate (05.2021)', '', '\"..\\/..\\/files\\/document\\/22cf0e410fd1a0a24ed8a4622f4e099d.pdf\"');

-- --------------------------------------------------------

--
-- Структура таблицы `lift`
--

CREATE TABLE `lift` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT '',
  `url_image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`url_image`)),
  `type_id` int(11) NOT NULL,
  `producer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `lift`
--

INSERT INTO `lift` (`id`, `description`, `url_image`, `type_id`, `producer_id`) VALUES
(50, '<p class=\"MsoNormal\" style=\"margin-left:53.0pt\"><span class=\"MsoHyperlink\"><span style=\"font-size:13.0pt;color:black;mso-ansi-language:UK\">Ліфтова К</span></span><span class=\"MsoHyperlink\"><span lang=\"EN-US\" style=\"font-size:13.0pt;color:black;\r\nmso-ansi-language:EN-US\">омпа</span></span><span class=\"MsoHyperlink\"><span style=\"font-size:13.0pt;color:black;mso-ansi-language:UK\">нія </span></span><span lang=\"uk\"><a href=\"mailto:AH@MET\"><span lang=\"UK\" style=\"font-size:13.0pt;\r\nmso-ansi-language:UK\">AH</span><span lang=\"EN-US\" style=\"font-size:13.0pt;\r\nmso-ansi-language:EN-US\">@MET</span></a></span><span class=\"MsoHyperlink\"><span lang=\"uk\" style=\"font-size:13.0pt;mso-ansi-language:EN-US\"> </span></span><span class=\"MsoHyperlink\"><span lang=\"uk\" style=\"font-size:13.0pt;color:black;\r\nmso-ansi-language:EN-US\">&nbsp;</span></span><span class=\"MsoHyperlink\"><span style=\"font-size:13.0pt;color:black;mso-ansi-language:\r\nUK\">заснована в 1998 році в&nbsp;\r\nТуреччині&nbsp; .&nbsp; Має&nbsp;\r\nвласні потужності для виробництва ліфтового обладнання і пропонує&nbsp; наступні типи :</span></span><span lang=\"uk\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: right; margin-left: 53pt;\">\r\n\r\n</p><p class=\"MsoNormal\" style=\"margin-left:36.85pt;text-indent:-36.85pt;mso-list:\r\nl0 level1 lfo1;tab-stops:19.4pt list 36.0pt\"><!--[if !supportLists]--><b><span lang=\"uk\">1.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span></b><!--[endif]--><span class=\"MsoHyperlink\"><b><span style=\"font-size:13.0pt;color:black;mso-ansi-language:UK\">Пасажирські ліфти :</span></b></span></p><p class=\"MsoNormal\" style=\"margin-left:36.85pt;text-indent:-36.85pt;mso-list:\r\nl0 level1 lfo1;tab-stops:19.4pt list 36.0pt\"></p>', '[\"..\\/..\\/images\\/lift\\/da9d3fc52cdd8c97bd72acaba382f44b.jpg\",\"..\\/..\\/images\\/lift\\/NQgyy0dNXMJIM186THTqQ_WHgfQE4FgSUEWW9zvr.jpg\",\"..\\/..\\/images\\/lift\\/fIXm-VHzoWcarWRsCKoZlvdCYBYvNC78w1HBcH43.jpg\",\"..\\/..\\/images\\/lift\\/HiPkyfStKoWptEyG3AtIeMv4dSGdtjBU9a4u6wLl.jpg\",\"..\\/..\\/images\\/lift\\/kXx0oqPnUmS2nH16_5GreEzAOMGcB7pIMEWWWcWP.jpg\"]', 25, 18);
INSERT INTO `lift` (`id`, `description`, `url_image`, `type_id`, `producer_id`) VALUES
(52, '<p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif;mso-bidi-font-family:Arial;color:black\">&nbsp;</span><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\nmso-bidi-font-family:Arial;color:black\">Завод ліфтового обладнання <b>Lubelska\r\nWytwórnia Dźwigów Osobowych Lift Service S.A</b></span><span style=\"font-family:\r\n&quot;Times New Roman&quot;,serif;mso-bidi-font-family:Arial\">&nbsp; заснована в 1991 році в м.Люблін у\r\nПольщі.&nbsp; Ми пропонуємо перевірену\r\nроками&nbsp; якісну продукцію наших партнерів\r\n, це:</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><b><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\nmso-bidi-font-family:Arial\">1. Пасажирські, лікарняні та&nbsp; вантажні &nbsp;ліфти&nbsp;&nbsp;\r\nбез машинного приміщення</span></b><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\nmso-bidi-font-family:Arial\">&nbsp; вантажопідйомністю\r\nвід 350 кг до 3 600 кг і зі швидкістю до 1,6 м/с</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><b><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\nmso-bidi-font-family:Arial\">2. Пасажирські, лікарняні та&nbsp; вантажні &nbsp;ліфти&nbsp;&nbsp;\r\nз&nbsp; верхнім&nbsp; машинним приміщенням</span></b><span style=\"font-family:&quot;Times New Roman&quot;,serif;mso-bidi-font-family:Arial\">, які\r\nпідходять на заміну старих ліфтів&nbsp; вантажопідйомністю\r\nвід 320 кг до 3 250 кг і зі швидкістю до 1 м/с на заміну та&nbsp; в новобудови зі швидкістю 2,5 м/с</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><b><span lang=\"EN-US\" style=\"font-family:&quot;Times New Roman&quot;,serif;mso-bidi-font-family:Arial;\r\nmso-ansi-language:EN-US\">3. </span></b><b><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\nmso-bidi-font-family:Arial\">Нова розробка заводу ліфти серії</span></b><b><span lang=\"EN-US\" style=\"font-family:&quot;Times New Roman&quot;,serif;mso-bidi-font-family:\r\nArial;mso-ansi-language:EN-US\"> PURE </span></b><b><span style=\"font-family:\r\n&quot;Times New Roman&quot;,serif;mso-bidi-font-family:Arial\">для нових житлових\r\nбудинків.</span></b><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\nmso-bidi-font-family:Arial;color:black\">Вантажопідйомність 630-1000 кг&nbsp; з розмірами кабіни &nbsp;1100x1400 ммi 1100x2100&nbsp; мм в шахтах ширина яких починається з 1600 мм,\r\nа глибина приямку не перевищує 1000 мм, а висота останнього поверху 3400мм</span><!--[if gte vml 1]><v:shapetype\r\n id=\"_x0000_t75\" coordsize=\"21600,21600\" o:spt=\"75\" o:preferrelative=\"t\"\r\n path=\"m@4@5l@4@11@9@11@9@5xe\" filled=\"f\" stroked=\"f\">\r\n <v:stroke joinstyle=\"miter\"/>\r\n <v:formulas>\r\n  <v:f eqn=\"if lineDrawn pixelLineWidth 0\"/>\r\n  <v:f eqn=\"sum @0 1 0\"/>\r\n  <v:f eqn=\"sum 0 0 @1\"/>\r\n  <v:f eqn=\"prod @2 1 2\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelWidth\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @0 0 1\"/>\r\n  <v:f eqn=\"prod @6 1 2\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelWidth\"/>\r\n  <v:f eqn=\"sum @8 21600 0\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @10 21600 0\"/>\r\n </v:formulas>\r\n <v:path o:extrusionok=\"f\" gradientshapeok=\"t\" o:connecttype=\"rect\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"t\"/>\r\n</v:shapetype><v:shape id=\"_x0000_s1026\" type=\"#_x0000_t75\" style=\'position:absolute;\r\n left:0;text-align:left;margin-left:341.3pt;margin-top:29.8pt;width:195.2pt;\r\n height:327.25pt;z-index:251656192;mso-wrap-distance-left:0;\r\n mso-wrap-distance-top:0;mso-wrap-distance-right:0;mso-wrap-distance-bottom:0;\r\n mso-position-horizontal:absolute;mso-position-horizontal-relative:text;\r\n mso-position-vertical:absolute;mso-position-vertical-relative:text\' filled=\"t\">\r\n <v:fill color2=\"black\"/>\r\n <v:imagedata src=\"file:///C:/Users/NyaNya/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png\"\r\n  o:title=\"\"/>\r\n <w:wrap type=\"square\" side=\"left\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><!--[endif]--><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\nmso-bidi-font-family:Arial;color:black\">Два стандарти виконання </span><span lang=\"EN-US\" style=\"font-family:&quot;Times New Roman&quot;,serif;mso-bidi-font-family:\r\nArial;color:black;mso-ansi-language:EN-US\">к</span><span style=\"font-family:\r\n&quot;Times New Roman&quot;,serif;mso-bidi-font-family:Arial;color:black\">абін</span><span lang=\"EN-US\" style=\"font-family:&quot;Times New Roman&quot;,serif;mso-bidi-font-family:\r\nArial;color:black;mso-ansi-language:EN-US\">&nbsp;\r\nDUO&nbsp; </span><span style=\"font-family:&quot;Times New Roman&quot;,serif;mso-bidi-font-family:Arial;\r\ncolor:black\">і&nbsp; </span><span lang=\"EN-US\" style=\"font-family:&quot;Times New Roman&quot;,serif;mso-bidi-font-family:Arial;\r\ncolor:black;mso-ansi-language:EN-US\">LAMINATE</span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-size:9.0pt;\r\nmso-bidi-font-size:12.0pt;font-family:&quot;Arial&quot;,sans-serif;color:black\">.</span><b><i><u><span lang=\"EN-US\" style=\"font-family:&quot;Times New Roman&quot;,serif;mso-bidi-font-family:\r\nArial;mso-ansi-language:EN-US\">PURE LAMINATE&nbsp;</span></u></i></b><o:p></o:p></p><p class=\"a\" style=\"text-align: justify;\"><a name=\"tw-target-text\"></a><span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;,serif;mso-bidi-font-family:\r\n&quot;Liberation Mono&quot;;color:#202124\">Це серія кабін з мінімалістичною, елегантною\r\nформою та високоякісними оздоблювальними матеріалами, які мають риси благородних\r\nпорід деревини. Велике дзеркало та поліровані поручні з нержавіючої сталі на\r\nзадній стінці,які оптично збільшують салон, роблячи його просторим і легким.\r\nМіцний, але благородний, теплий і елегантний ламінат HPL з різноманітними\r\nтекстурами дерева ідеально вписується навіть в найпрестижніші інтер’єри.</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><!--[if gte vml 1]><v:shapetype\r\n id=\"_x0000_t75\" coordsize=\"21600,21600\" o:spt=\"75\" o:preferrelative=\"t\"\r\n path=\"m@4@5l@4@11@9@11@9@5xe\" filled=\"f\" stroked=\"f\">\r\n <v:stroke joinstyle=\"miter\"/>\r\n <v:formulas>\r\n  <v:f eqn=\"if lineDrawn pixelLineWidth 0\"/>\r\n  <v:f eqn=\"sum @0 1 0\"/>\r\n  <v:f eqn=\"sum 0 0 @1\"/>\r\n  <v:f eqn=\"prod @2 1 2\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelWidth\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @0 0 1\"/>\r\n  <v:f eqn=\"prod @6 1 2\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelWidth\"/>\r\n  <v:f eqn=\"sum @8 21600 0\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @10 21600 0\"/>\r\n </v:formulas>\r\n <v:path o:extrusionok=\"f\" gradientshapeok=\"t\" o:connecttype=\"rect\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"t\"/>\r\n</v:shapetype><v:shape id=\"_x0000_s1026\" type=\"#_x0000_t75\" style=\'position:absolute;\r\n left:0;text-align:left;margin-left:-55.15pt;margin-top:172.05pt;width:179.7pt;\r\n height:303.75pt;z-index:251657216;mso-wrap-distance-left:0;\r\n mso-wrap-distance-top:0;mso-wrap-distance-right:0;mso-wrap-distance-bottom:0;\r\n mso-position-horizontal:absolute;mso-position-horizontal-relative:text;\r\n mso-position-vertical:absolute;mso-position-vertical-relative:text\' filled=\"t\">\r\n <v:fill color2=\"black\"/>\r\n <v:imagedata src=\"file:///C:/Users/NyaNya/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png\"\r\n  o:title=\"\"/>\r\n <w:wrap type=\"square\" side=\"right\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><!--[endif]--><u><span style=\"font-family:&quot;Times New Roman&quot;,serif;\r\nmso-bidi-font-family:Arial\">Двері кабіни </span></u><span style=\"font-family:\r\n&quot;Times New Roman&quot;,serif;mso-bidi-font-family:Arial\">автоматичні, з нержавіючої\r\nсталі або з пластифікованого металу або металу пофарбованого порошково .</span></p><p class=\"MsoNormal\" style=\"text-align: justify;\"><!--[if gte vml 1]><v:shapetype\r\n id=\"_x0000_t75\" coordsize=\"21600,21600\" o:spt=\"75\" o:preferrelative=\"t\"\r\n path=\"m@4@5l@4@11@9@11@9@5xe\" filled=\"f\" stroked=\"f\">\r\n <v:stroke joinstyle=\"miter\"/>\r\n <v:formulas>\r\n  <v:f eqn=\"if lineDrawn pixelLineWidth 0\"/>\r\n  <v:f eqn=\"sum @0 1 0\"/>\r\n  <v:f eqn=\"sum 0 0 @1\"/>\r\n  <v:f eqn=\"prod @2 1 2\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelWidth\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @0 0 1\"/>\r\n  <v:f eqn=\"prod @6 1 2\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelWidth\"/>\r\n  <v:f eqn=\"sum @8 21600 0\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @10 21600 0\"/>\r\n </v:formulas>\r\n <v:path o:extrusionok=\"f\" gradientshapeok=\"t\" o:connecttype=\"rect\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"t\"/>\r\n</v:shapetype><v:shape id=\"_x0000_s1026\" type=\"#_x0000_t75\" style=\'position:absolute;\r\n left:0;text-align:left;margin-left:-26.65pt;margin-top:6pt;width:367.95pt;\r\n height:88.95pt;z-index:251658240;mso-wrap-distance-left:0;\r\n mso-wrap-distance-top:0;mso-wrap-distance-right:0;mso-wrap-distance-bottom:0;\r\n mso-position-horizontal:absolute;mso-position-horizontal-relative:text;\r\n mso-position-vertical:absolute;mso-position-vertical-relative:text\' filled=\"t\">\r\n <v:fill color2=\"black\"/>\r\n <v:imagedata src=\"file:///C:/Users/NyaNya/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png\"\r\n  o:title=\"\"/>\r\n <w:wrap type=\"square\" side=\"largest\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><!--[endif]--><span lang=\"EN-US\" style=\"font-family:\r\n&quot;Times New Roman&quot;,serif;mso-bidi-font-family:Arial;mso-ansi-language:EN-US\"><u>PURE\r\nDUO</u></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span lang=\"EN-US\" style=\"font-family:\r\n&quot;Times New Roman&quot;,serif;mso-bidi-font-family:Arial;mso-ansi-language:EN-US\"></span><o:p></o:p></p><p class=\"a\" style=\"text-align: justify; margin-right: -39.7pt; line-height: 1;\"><span style=\"font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif; color: rgb(32, 33, 36);\">Лінія DUO присвячена місцям, де важить\r\nсучасність і аскетичний мінімалізм, а також творчий і креативний змішування. Це\r\nдає можливість комбінувати </span></p><p class=\"a\" style=\"text-align: justify; margin-right: -39.7pt; line-height: 1;\"><span style=\"font-size: 12pt; font-family: &quot;Times New Roman&quot;, serif; color: rgb(32, 33, 36);\">матеріали та кольори кутів, а також центральних\r\nпанелей. Завдяки цьому ми отримуємо великі можливості облаштування інтер\'єру\r\nсалону. Міцні,</span></p><p class=\"a\" style=\"text-align: justify; margin-right: -39.7pt; line-height: 1;\"><span style=\"color: rgb(32, 33, 36); font-family: &quot;Times New Roman&quot;, serif; font-size: 12pt;\">якісні оздоблювальні матеріали можна поєднувати в обраних\r\nконфігураціях, створюючи цікаві колірні поєднання з урахуванням архітектурних\r\nта</span></p><p class=\"a\" style=\"text-align: justify; margin-right: -39.7pt; line-height: 1;\"><span style=\"color: rgb(32, 33, 36); font-family: &quot;Times New Roman&quot;, serif; font-size: 12pt;\"> естетичних вимог кожного проекту.</span></p><p class=\"a\" style=\"text-align: justify; margin-right: -39.7pt; line-height: 1;\"><img src=\"data:image/png;base64,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\" style=\"width: 702px;\" data-filename=\"aaa.png\"><span style=\"color: rgb(32, 33, 36); font-family: &quot;Times New Roman&quot;, serif; font-size: 12pt;\"><br></span></p><p class=\"a\" style=\"text-align: justify; margin-right: -39.7pt; line-height: 1;\"></p>', '[\"..\\/..\\/images\\/lift\\/1c07756d808f2b900b1e99bfd0911764.jpg\",\"..\\/..\\/images\\/lift\\/cfB4fk9uX7SgChPtG5XEdfmcxDKihxaNkCHaGHOz.jpg\",\"..\\/..\\/images\\/lift\\/Wyv5YfAWAxuyB6TaMhNkuikf0JE49kGX_qUugIhw.jpg\",\"..\\/..\\/images\\/lift\\/bYivQI5xeb8EtS22JkmsNqIX8xbhT4DvAuPcCSvG.jpg\",\"..\\/..\\/images\\/lift\\/mzW2_vosZQTvr6uas8VsnseF13Svn_zQDltqr-P4.jpg\",\"..\\/..\\/images\\/lift\\/E8K6N2fkFy4Hc5kCEPQeYzBKypeOYMe6G9P3AfRv.jpg\"]', 25, 19);
INSERT INTO `lift` (`id`, `description`, `url_image`, `type_id`, `producer_id`) VALUES
(53, '<p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;\r\ncolor:black\">&nbsp;</span><span style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif;color:black\">Завод\r\nліфтового обладнання <b>Metallschneider </b><strong><span style=\"font-weight:\r\nnormal\">GmbH</span></strong></span><span style=\"font-size:14.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;color:#333333;mso-bidi-font-weight:bold\"> </span><span style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif\">&nbsp;заснований в 1881 році в Німеччині, а з 1963\r\nроку виробляє сервісні , вантажні ліфти.&nbsp;\r\nМи пропонуємо перевірену роками&nbsp;\r\nякісну&nbsp; німецьку продукцію наших\r\nпартнерів , це сервісні ліфти для готелей , ресторанів, медичних центрів,\r\nприватних будинків:</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif\">1.<span style=\"color:black\">&nbsp; Тип</span></span></b><b><span style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif;color:black;\r\nmso-ansi-language:EN-US\"> <span lang=\"EN-US\">ISO-A<span style=\"border:none black 1.0pt;\r\nmso-border-alt:none black 0cm;padding:0cm\"> </span></span></span></b><b><span style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif;color:black\">з\r\nдвостулковими дверима на&nbsp; сервісній\r\nвисоті від 700 мм</span></b><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;\">&nbsp;</span><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif\">вантажопідйомністю 50 кг, 100 кг і 300 кг,\r\nвисота кабіни від 600 мм до 1200 мм</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif\">&nbsp;розмір\r\nкабіни : в/п 50кг ( 400-600 мм) х (400-600мм),</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в/п100кг та 300\r\nкг ( 400-1000мм) х (400-1000мм).</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif\">2. <span style=\"color:black\">Тип </span></span></b><a href=\"https://www.metallschneider.de/en/products/service-lifts/iso-a\"><b><span style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif;color:black;\r\nborder:none black 1.0pt;mso-border-alt:none black 0cm;padding:0cm\">ISO-</span></b></a><b><span style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif;color:black;\r\nborder:none black 1.0pt;mso-border-alt:none black 0cm;padding:0cm\">С </span></b><b><span style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif;color:black\">з\r\nдвостулковими дверима&nbsp; сервіс на рівні\r\nпідлоги</span></b><span style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif\">,</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif\">вантажопідйомністю &nbsp;100 кг&nbsp;\r\n,300 кг , висота кабіни від 600 мм до 1200 мм розмір кабіни :&nbsp; в/п 100 кг (500-1000мм) х (500- 1000мм),</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; в/п 300 кг\r\n(500-1000мм) х (600-1000мм).</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align:justify\"><b><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif\">3. <span style=\"color:black\">Тип </span></span></b><a href=\"https://www.metallschneider.de/en/products/service-lifts/iso-a\"><b><span style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif;color:black;\r\nborder:none black 1.0pt;mso-border-alt:none black 0cm;padding:0cm\">ISO-</span></b></a><b><span lang=\"EN-US\" style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:black;border:none black 1.0pt;mso-border-alt:none black 0cm;padding:0cm;\r\nmso-ansi-language:EN-US\">D </span></b><b><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif;color:black\">з розпашними </span></b><b><span style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif;color:black;\r\nmso-ansi-language:EN-US\">&nbsp;</span></b><b><span style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif;color:black\">дверима&nbsp; сервіс на рівні підлоги</span></b><span style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif\">,</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif\">&nbsp; вантажопідйомністю\r\n100 кг&nbsp; і 300 кг,&nbsp; висота кабіни від 600 мм до 1200 мм</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif\">&nbsp; розмір\r\nкабіни :&nbsp; в/п 100 кг (400-1000мм) х (500-\r\n1000мм),</span><o:p></o:p></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nfont-family:&quot;Times New Roman&quot;,serif\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; в/п 300 кг\r\n(400-1000мм) х (600-1000мм).</span><o:p></o:p></p><p class=\"MsoBodyText\" style=\"text-align:justify\"><b><span style=\"font-size:14.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:black;border:none black 1.0pt;\r\nmso-border-alt:none black 0cm;padding:0cm\">4. Тип </span></b><b><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:black;border:none black 1.0pt;mso-border-alt:none black 0cm;padding:0cm;\r\nmso-ansi-language:EN-US\">ISO</span></b><b><span style=\"font-size:14.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:black;border:none black 1.0pt;\r\nmso-border-alt:none black 0cm;padding:0cm\">-</span></b><b><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:black;border:none black 1.0pt;mso-border-alt:none black 0cm;padding:0cm;\r\nmso-ansi-language:EN-US\">Z</span></b><b><span lang=\"EN-US\" style=\"font-size:14.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:#333333\"> </span></b><b><span style=\"font-size:14.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:#333333\">з двоповерховою кабіною, це своєрідне поєднання двох типів\r\nсервісних ліфтів </span></b><b><span lang=\"EN-US\" style=\"font-size:14.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:#333333;mso-ansi-language:\r\nEN-US\">ISO-A&nbsp;&nbsp; </span></b><b><span style=\"font-size:14.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:#333333\">та </span></b><b><span lang=\"EN-US\" style=\"font-size:14.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:#333333;mso-ansi-language:\r\nEN-US\">ISO-D</span></b><o:p></o:p></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:#333333\">вантажопідйомністю 100кг, 200 кг і 300 кг, висота кабіни&nbsp; 1750 мм</span><o:p></o:p></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt;font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:#333333\">&nbsp; розмір кабіни : ширина (500-1000мм)\r\nх&nbsp; довжина(600- 1000мм),</span><o:p></o:p></p><p class=\"MsoBodyText\" style=\"text-align:justify\"><b><span style=\"font-size:14.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:#333333\">5. Тип </span></b><b><span style=\"font-size:14.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:black\">ISO-U</span></b><span style=\"font-size:14.0pt;line-height:115%;\r\nfont-family:&quot;Times New Roman&quot;,serif;color:black;mso-bidi-font-weight:bold\"> <b>з\r\nодними розпашними дверима та підлоговою заслінкою ( тротуарний ліфт)</b></span><o:p></o:p></p><p class=\"MsoBodyText\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:black\">вантажопідйомність\r\n300 кг розмір кабіни (800-1000мм)х(800-1000мм) х 1200 мм</span><o:p></o:p></p><p class=\"MsoBodyText\" style=\"text-align:justify\"><b><span style=\"font-size:14.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:#333333\">6. Тип </span></b><b><span style=\"font-size:14.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:black\">ISO-MAX з розпашними дверима, але без супроводу людиною</span></b><o:p></o:p></p><p class=\"MsoBodyText\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:#333333\">&nbsp;вантажопідйомністю&nbsp; 300 кг, 500 кг, 750 кг, 1000 кг, приямок\r\nмінімум 200 мм</span><o:p></o:p></p><p class=\"MsoBodyText\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:#333333\">Для ліфтів\r\n300кг і 500 кг розмір кабіни :(800-1000мм) х (1100 -1500мм) х (висота кабіни 1200\r\n- 2000мм )</span><o:p></o:p></p><p class=\"MsoBodyText\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:#333333\">Для ліфтів\r\n750кг і 1000 кг розмір кабіни&nbsp;\r\n(1000-1275мм) х (1400 -1500мм) х (висота кабіни 1200 - 2000мм )</span><o:p></o:p></p><p class=\"MsoBodyText\" style=\"text-align:justify\"><b><span style=\"font-size:14.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:#333333\">7. Тип</span></b><b><span style=\"font-size:14.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:black\"> </span></b><b><span lang=\"EN-US\" style=\"font-size:14.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:black;border:none black 1.0pt;\r\nmso-border-alt:none black 0cm;padding:0cm;mso-ansi-language:EN-US\">ISO-PE easy</span></b><b><span lang=\"EN-US\" style=\"font-size:14.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif;\r\ncolor:#333333;mso-ansi-language:EN-US\"> </span></b><b><span style=\"font-size:\r\n14.0pt;line-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:#333333\">з\r\nрозпашними дверима і з супроводом однією людиною</span></b><o:p></o:p></p><p class=\"MsoBodyText\" style=\"text-align:justify\"><span style=\"font-size:14.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman&quot;,serif;color:#333333;mso-bidi-font-weight:\r\nbold\">вантажопідйомністю 750кг і 100 кг, з приямком 200 мм .</span><o:p></o:p></p><p class=\"MsoNormal\"><span style=\"mso-bidi-font-family:&quot;Times New Roman&quot;;\r\ncolor:#333333;mso-bidi-font-weight:bold\">&nbsp;</span><span style=\"font-size:14.0pt;\r\nmso-bidi-font-family:&quot;Times New Roman&quot;;color:#333333;mso-bidi-font-weight:bold\">Ширина\r\nкабіни від 800 до 1500 мм, </span><o:p></o:p></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt\">&nbsp;довжина кабіни від&nbsp; 1100 дo 1800,</span><o:p></o:p></p><p class=\"MsoNormal\"><span style=\"font-size:14.0pt\">&nbsp;висота кабіни&nbsp;\r\nвід 2000 до 2200 мм&nbsp;</span></p>', '[\"..\\/..\\/images\\/lift\\/32780887a88d75a451520afdea5366c8.jpg\",\"..\\/..\\/images\\/lift\\/sWcnr42lg1CbnF-8H8fJnBCDPNvgyuHYxv__0TRu.jpg\",\"..\\/..\\/images\\/lift\\/JriFNLUHXu5VtfhqzbkmS3fZDiizOnmDu3uhAs3i.jpg\",\"..\\/..\\/images\\/lift\\/fo8HRNBiE3cRe96hOOA7t4s47Zzn8T7_34M2LQeD.jpg\",\"..\\/..\\/images\\/lift\\/aUXuD6LraQaMhDuzLzTEKHY_413XJpbdLqFhb1Qm.jpg\",\"..\\/..\\/images\\/lift\\/OOR52N00PCPEVbohH66M9Xzksn9pEDxskx3kqcu8.jpg\",\"..\\/..\\/images\\/lift\\/BSBnGIikwJQGEumnMhvnVDwVbrp9DH324cc2sfV6.jpg\",\"..\\/..\\/images\\/lift\\/uQ4JfZoPflEQLCdXnPBgao9o3pHkxApUAnTkPpYB.jpg\",\"..\\/..\\/images\\/lift\\/86ZY2WvUYxEYGOSe1xTV7AuQBZzlnlHfxbZgRALQ.jpg\",\"..\\/..\\/images\\/lift\\/8uXr6onGESo5fvV0n25JN8e1qPzGz1fm8wwAZVFg.jpg\",\"..\\/..\\/images\\/lift\\/ZU-qdRb_TQYnleQEZf8BReBluGDwvB8WcrIFcYLU.jpg\"]', 26, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1632995982),
('m130524_201442_init', 1632995987),
('m140506_102106_rbac_init', 1632999160),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1632999160),
('m180523_151638_rbac_updates_indexes_without_prefix', 1632999160),
('m190124_110200_add_verification_token_column_to_user_table', 1632995987),
('m200409_110543_rbac_update_mssql_trigger', 1632999160),
('m210930_102745_addRole', 1632999171),
('m210930_110002_addAdmin', 1632999694),
('m211001_063422_TypesTable', 1633070191),
('m211001_085403_ProducerTable', 1633080872),
('m211001_163524_LiftTable', 1633107048),
('m211006_054421_add_url_image_column_to_type_table', 1633499798),
('m211007_053842_addUserRole', 1633585160),
('m211007_054120_addSupportUserRole', 1633585331),
('m211007_055343_SupportTable', 1633586220),
('m211007_155509_add_producer_column_to_support_table', 1633623344),
('m211007_162554_add_url_image_column_to_producer_table', 1633623978),
('m211115_162307_DocumentsTable', 1636993495);

-- --------------------------------------------------------

--
-- Структура таблицы `producer`
--

CREATE TABLE `producer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT '',
  `url_image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`url_image`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `producer`
--

INSERT INTO `producer` (`id`, `name`, `description`, `url_image`) VALUES
(18, 'AH & MET', '', '\"..\\/..\\/images\\/producer\\/97d06510eccfd5164b77513e1de90ea5.png\"'),
(19, 'Lift service', '', '\"..\\/..\\/images\\/producer\\/a440251ccb3a88f9872616e3fd9a802a.png\"'),
(20, 'Metallschneider', '', '\"..\\/..\\/images\\/producer\\/1595b5f92bb5e9726c4ba2398b8bd9b2.png\"');

-- --------------------------------------------------------

--
-- Структура таблицы `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT '',
  `url_file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`url_file`)),
  `producer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `support`
--

INSERT INTO `support` (`id`, `name`, `description`, `url_file`, `producer_id`) VALUES
(22, 'AH-MET-ELEVATOR_', '', '\"..\\/..\\/files\\/support\\/63c45c5426c9ee12dbb820aad111d4c1.pdf\"', 18),
(23, 'skg_for_project', '', '\"..\\/..\\/files\\/support\\/f3cb21d61dea5c8749e63db2cb602da1.pdf\"', 20);

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT '',
  `url_image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`url_image`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `name`, `description`, `url_image`) VALUES
(25, 'Пасажирські', '', '\"..\\/..\\/images\\/type\\/c18050e659a3ca8f286d041f2d38da06.jpg\"'),
(26, 'Сервісні(Вантажні)', '', '\"..\\/..\\/images\\/type\\/93b45dfd89d532b8a58c8254b4725e13.jpg\"'),
(27, ' Похилі(сходові) платформи', '', '\"..\\/..\\/images\\/type\\/9af9144679bab1833bfe810d1946e155.jpg\"'),
(28, 'Вертикальні платформи', '', '\"..\\/..\\/images\\/type\\/70a5ec053a0a60d8e6acdb146a1426f0.jpg\"');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'CzmAA-3MMyi2E72nChs_BPy9XnT5ubzr', '$2y$13$Ow/TxBaz3PmohFCdFLXc5.ttVrW1hyo0yH0ENgx1oPH3ZUZOz.so.', NULL, 'testernataly333@gmail.com', 10, 1632998193, 1633537560, 'xNITYfOBA2O1XsBe2ARZpNoKuzdHUMCB_1632998193'),
(5, 'user', 'ja3J-I3fDfkASKZi_SWVCoNK6cxU3CUY', '$2y$13$qaAQsMaZHECaD2w2Z3mISO/wLhclbNgJp6eCQRVUfwnbmUPiJvn2y', NULL, 'minzinava@gmail.com', 10, 1633028416, 1633549589, 'Ib6iqz-V8lHwXxxBt8dQHO340lhGUwZY_1633028416');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lift`
--
ALTER TABLE `lift`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producer_id` (`producer_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producer_id` (`producer_id`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `lift`
--
ALTER TABLE `lift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `producer`
--
ALTER TABLE `producer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `lift`
--
ALTER TABLE `lift`
  ADD CONSTRAINT `lift_ibfk_1` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lift_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `support_ibfk_1` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
