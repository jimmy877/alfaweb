-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 15 2022 г., 08:42
-- Версия сервера: 5.7.27-0ubuntu0.18.04.1
-- Версия PHP: 7.1.33-44+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `alfaweb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_categories`
--

CREATE TABLE `b5fcx_categories` (
  `id` int(11) NOT NULL,
  `asset_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `path` varchar(255) NOT NULL DEFAULT '',
  `extension` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `note` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `textfull` text NOT NULL,
  `photogallery` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `access` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `metadesc` varchar(1024) NOT NULL COMMENT 'The meta description for the page.',
  `metakey` varchar(1024) NOT NULL COMMENT 'The meta keywords for the page.',
  `metadata` varchar(2048) NOT NULL COMMENT 'JSON encoded metadata properties.',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `modified_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hits` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `language` char(7) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `webix_kids` int(10) NOT NULL,
  `access_group` varchar(255) NOT NULL,
  `orders` int(2) NOT NULL,
  `history` text NOT NULL,
  `looks` text NOT NULL,
  `fieldGroupID` int(10) NOT NULL,
  `fields` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `b5fcx_categories`
--

INSERT INTO `b5fcx_categories` (`id`, `asset_id`, `parent_id`, `lft`, `rgt`, `level`, `path`, `extension`, `title`, `alias`, `note`, `description`, `textfull`, `photogallery`, `published`, `checked_out`, `checked_out_time`, `access`, `params`, `metadesc`, `metakey`, `metadata`, `created_user_id`, `created_time`, `modified_user_id`, `modified_time`, `hits`, `language`, `version`, `webix_kids`, `access_group`, `orders`, `history`, `looks`, `fieldGroupID`, `fields`) VALUES
(1, 0, 0, 0, 11, 0, '', 'system', 'ROOT', 'root', '', '', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{}', '', '', '{}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1, 0, '', 0, '', '', 0, '{\"name\": \"Alex\", \"about\": {\"age\": 33, \"height\": 71}, \"lastname\": \"Salomatin\"}'),
(2, 27, 1, 1, 2, 1, 'uncategorised', 'com_content', 'Uncategorised', 'uncategorised', '', '', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1, 0, '', 0, '', '', 0, '{\"color\": {\"name\": \"Цвет\", \"value\": [\"синий\", \"Красный\"]}, \"model\": {\"name\": \"Модель\", \"value\": \"Nokia\"}}'),
(3, 28, 1, 3, 4, 1, 'path1/uncategorised/', 'com_banners', 'Uncategorised', 'uncategorised', '', '', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1, 0, '', 0, '', '', 0, '{\"color\": {\"name\": \"Цвет\", \"value\": \"Красный\"}, \"model\": {\"name\": \"Модель\", \"value\": \"Nokia\"}}'),
(4, 29, 1, 5, 6, 1, 'path0/path1/uncategorised/', 'com_contact', 'Uncategorised', 'uncategorised', '', '', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1, 0, '', 0, '', '', 0, '{\"color\": {\"name\": \"Цвет\", \"value\": \"синий\"}, \"model\": {\"name\": \"Модель\", \"value\": \"Samsung\"}}'),
(5, 30, 1, 7, 8, 1, 'path2/uncategorised/', 'com_newsfeeds', 'Uncategorised', 'uncategorised', '', '', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1, 0, '', 0, '', '', 0, 'null'),
(7, 32, 1, 9, 10, 1, 'uncategorised', 'com_users', 'Uncategorised', 'uncategorised', '', '', '', '', 1, 0, '0000-00-00 00:00:00', 1, '{\"category_layout\":\"\",\"image\":\"\"}', '', '', '{\"author\":\"\",\"robots\":\"\"}', 42, '2011-01-01 00:00:01', 0, '0000-00-00 00:00:00', 0, '*', 1, 0, '', 0, '', '', 0, 'null'),
(8, 0, 0, 0, 0, 2, '', '', 'Тестирование записи', 'Testovaya zapis\'', '', '', '', '', 0, 0, '0000-00-00 00:00:00', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 1, 0, '', 0, '', '', 0, 'null'),
(10, 0, 0, 0, 0, 2, '', '', 'Тестирование записи', 'Testovaya zapis\'1', '', '', '', '', 0, 0, '0000-00-00 00:00:00', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 1, 0, '', 0, '', '', 0, 'null'),
(11, 0, 1, 0, 0, 1, 'test', 'com_content', 'cat title', 'test', '', '', '', '', 0, 0, '0000-00-00 00:00:00', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 1, 1, '', 0, '', '', 0, 'null'),
(12, 0, 11, 0, 0, 2, 'test/two', 'com_content', 'title2', 'two', '', '', '', '[{\"url\":\"\\/uploads\\/1440620537_2.jpg\",\"name\":\"wallpapers\",\"desc\":\"\\u043e\\u043f\\u0438\\u0441\\u0430\\u043d\\u0438\\u0435\",\"order\":1},{\"url\":\"\\/uploads\\/1440620537_2.jpg\",\"name\":\"wallpapers\",\"desc\":\"\\u043e\\u043f\\u0438\\u0441\\u0430\\u043d\\u0438\\u0435\",\"order\":1}] ', 0, 0, '0000-00-00 00:00:00', 0, '', 'тестовое описание', 'первое, второе, третье', '{\"author\":\"anton\",\"robots\":\"\"}', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 1, 1, '', 0, '', '', 0, 'null'),
(13, 0, 12, 0, 0, 3, 'test/two/treeTest', 'com_content', 'cat title', 'treeTest', '', '', '', '', 0, 0, '0000-00-00 00:00:00', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 1, 1, '', 0, '', '', 0, 'null'),
(14, 0, 13, 0, 0, 4, 'test/two/treeTest/four', 'com_content', 'title4', 'four', '', '', '', '', 0, 0, '0000-00-00 00:00:00', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 1, 0, '', 0, '', '', 0, 'null'),
(15, 0, 11, 0, 0, 2, 'test/five', 'com_content', 'title5', 'five', '', '', '', '', 0, 0, '0000-00-00 00:00:00', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '', 1, 0, '', 0, '', '', 0, 'null');

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_content`
--

CREATE TABLE `b5fcx_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `asset_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'FK to the #__assets table.',
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `catid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `checked_out` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publish_up` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publish_down` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` varchar(5120) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `hits` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `metadata` text NOT NULL,
  `featured` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Set if article is featured.',
  `language` char(7) NOT NULL COMMENT 'The language code for the article.',
  `xreference` varchar(50) NOT NULL COMMENT 'A reference to enable linkages to external data sets.',
  `main` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `b5fcx_content`
--

INSERT INTO `b5fcx_content` (`id`, `asset_id`, `title`, `alias`, `introtext`, `fulltext`, `state`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`, `featured`, `language`, `xreference`, `main`) VALUES
(1, 54, 'Тестовый материал', 'test', '', '', 1, 2, '2016-03-02 19:39:20', 878, '', '2016-03-02 19:39:20', 0, 0, '0000-00-00 00:00:00', '2016-03-02 19:39:20', '0000-00-00 00:00:00', '{\"image_intro\":\"\",\"float_intro\":\"\",\"image_intro_alt\":\"\",\"image_intro_caption\":\"\",\"image_fulltext\":\"\",\"float_fulltext\":\"\",\"image_fulltext_alt\":\"\",\"image_fulltext_caption\":\"\"}', '{\"urla\":false,\"urlatext\":\"\",\"targeta\":\"\",\"urlb\":false,\"urlbtext\":\"\",\"targetb\":\"\",\"urlc\":false,\"urlctext\":\"\",\"targetc\":\"\"}', '{\"show_title\":\"\",\"link_titles\":\"\",\"show_tags\":\"\",\"show_intro\":\"\",\"info_block_position\":\"\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_vote\":\"\",\"show_hits\":\"\",\"show_noauth\":\"\",\"urls_position\":\"\",\"alternative_readmore\":\"\",\"article_layout\":\"\",\"show_publishing_options\":\"\",\"show_article_options\":\"\",\"show_urls_images_backend\":\"\",\"show_urls_images_frontend\":\"\"}', 1, 0, '', '', 1, 132, '{\"robots\":\"\",\"author\":\"\",\"rights\":\"\",\"xreference\":\"\"}', 0, '*', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_fields_settings`
--

CREATE TABLE `b5fcx_fields_settings` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `filter` int(2) NOT NULL,
  `filter_type` varchar(20) NOT NULL,
  `activate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `b5fcx_fields_settings`
--

INSERT INTO `b5fcx_fields_settings` (`id`, `name`, `alias`, `cat_id`, `type`, `value`, `filter`, `filter_type`, `activate`) VALUES
(1, 'test', 'name1', 1, '', '', 0, '', 0),
(2, 'test', 'name1-3', 1, '', '', 0, '', 0),
(3, 'field name', 'name1', 0, '', '', 0, '', 0),
(4, 'field name', 'name1', 0, '', '', 0, '', 0),
(5, 'field name', 'name1', 0, '', '', 0, '', 0),
(6, 'field name', 'name1', 0, '', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_field_aliases`
--

CREATE TABLE `b5fcx_field_aliases` (
  `id` int(6) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `FID` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `b5fcx_field_aliases`
--

INSERT INTO `b5fcx_field_aliases` (`id`, `alias`, `FID`) VALUES
(1, 'FID', 17),
(2, 'alias-1', 0),
(5, 'ass', 0),
(7, 'sdsds', 0),
(8, 'sdsds-1', 0),
(9, 'sdsds-1-1', 0),
(10, 'test', 0),
(11, 'one-else', 0),
(12, 'anothergroup', 0),
(13, 'droplist', 0),
(14, 'radiobuttons', 0),
(15, 'textarea', 0),
(16, 'testif', 0),
(31, 'alias', 0),
(32, 'nefield', 0),
(33, 'nefield-1', 0),
(34, 'falias', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_field_group`
--

CREATE TABLE `b5fcx_field_group` (
  `id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `b5fcx_field_group`
--

INSERT INTO `b5fcx_field_group` (`id`, `name`, `alias`) VALUES
(1, 'поля ИМ', 'im-fields'),
(2, 'Поля второй категории', 'second-category');

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_field_prototype`
--

CREATE TABLE `b5fcx_field_prototype` (
  `id` int(6) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `catID` int(6) DEFAULT NULL,
  `params` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `b5fcx_field_prototype`
--

INSERT INTO `b5fcx_field_prototype` (`id`, `group_name`, `alias`, `type`, `catID`, `params`) VALUES
(1, 'Тест', 'test', 'text', NULL, '{\"id_1\": {\"name\": \"test5\", \"type\": \"checkboxGroup\", \"alias\": \"alias\", \"params\": \"один, два, три, четыре\", \"required\": \"yes\"}, \"id_2\": {\"name\": \"test\", \"type\": \"checkboxGroup\", \"alias\": \"alias-1\", \"params\": \"chek, chek1, chek2\", \"required\": \"yes\"}, \"id_3\": {\"name\": \"tre\", \"type\": \"checkbox\", \"alias\": \"rerer\", \"params\": \"\", \"required\": \"yes\"}, \"id_7\": {\"name\": \"sdsd\", \"type\": \"text\", \"alias\": \"sdsds-1\", \"params\": \"\", \"required\": \"no\"}, \"id_8\": {\"name\": \"sdsd\", \"type\": \"text\", \"alias\": \"sdsds-1-1\", \"params\": \"\", \"required\": \"no\"}, \"id_9\": {\"name\": \"тестовое\", \"type\": \"text\", \"alias\": \"test\", \"params\": \"\", \"required\": \"yes\"}, \"id_10\": {\"name\": \"еще тест\", \"type\": \"text\", \"alias\": \"one-else\", \"params\": \"\", \"required\": \"yes\"}, \"id_13\": {\"name\": \"Радиокнокпи\", \"type\": \"radiobutton\", \"alias\": \"radiobuttons\", \"params\": \"кнопка 1, кнопка 2, кнопка 3\", \"required\": \"yes\"}, \"id_15\": {\"name\": \" для теста условия2\", \"type\": \"text\", \"alias\": \" testif2\", \"params\": \"\", \"required\": \"no\"}, \"id_16\": {\"name\": \"Тестируем новое поле\", \"type\": \"text\", \"alias\": \"nefield-1\", \"params\": \"\", \"required\": \"yes\"}, \"id_17\": {\"name\": \"тест\", \"type\": \"text\", \"alias\": \"falias\", \"params\": \"\", \"required\": \"yes\"}}'),
(3, 'test2', 'test-1', 'text', NULL, '{\"id_4\": {\"name\": \"test\", \"type\": \"checkboxGroup\", \"alias\": \"uniqe\", \"params\": \"chek, chek1, chek2\", \"required\": \"yes\"}, \"id_5\": {\"name\": \"test\", \"type\": \"checkboxGroup\", \"alias\": \"alias-2\", \"params\": \"chek, chek1, chek2\", \"required\": \"yes\"}, \"id_6\": {\"name\": \"tre\", \"type\": \"checkbox\", \"alias\": \"rerer-1\", \"params\": \"\", \"required\": \"yes\"}, \"id_11\": {\"name\": \"название поля в другой группе\", \"type\": \"text\", \"alias\": \"anothergroup\", \"params\": \"\", \"required\": \"no\"}, \"id_12\": {\"name\": \"Список\", \"type\": \"select\", \"alias\": \"droplist\", \"params\": \"1,2,3,4\", \"required\": \"yes\"}, \"id_14\": {\"name\": \"текстовая область\", \"type\": \"textarea\", \"alias\": \"textarea\", \"params\": \"\", \"required\": \"yes\"}}'),
(4, 'test3', 'test-1-1', 'text', NULL, NULL),
(7, 'Выпадающий список 1', 'myselect', 'select', 1, '{\"params\": \"param1\\r\\nпарам2\", \"required\": \"yes\"}');

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_field_value`
--

CREATE TABLE `b5fcx_field_value` (
  `id` int(10) NOT NULL,
  `fieldID` int(6) NOT NULL,
  `fieldName` varchar(255) NOT NULL,
  `fieldAlias` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `bigValue` text NOT NULL,
  `contentID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_menu`
--

CREATE TABLE `b5fcx_menu` (
  `id` int(11) NOT NULL,
  `menutype` varchar(24) NOT NULL COMMENT 'The type of menu this item belongs to. FK to #__menu_types.menutype',
  `title` varchar(255) NOT NULL COMMENT 'The display title of the menu item.',
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'The SEF alias of the menu item.',
  `note` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(1024) NOT NULL COMMENT 'The computed path of the menu item based on the alias field.',
  `link` varchar(1024) NOT NULL COMMENT 'The actually link the menu item refers to.',
  `type` varchar(16) NOT NULL COMMENT 'The type of link: Component, URL, Alias, Separator',
  `published` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The published state of the menu link.',
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'The parent menu item in the menu tree.',
  `level` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'The relative level in the tree.',
  `component_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'FK to #__extensions.id',
  `checked_out` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'FK to #__users.id',
  `checked_out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'The time the menu item was checked out.',
  `browserNav` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'The click behaviour of the link.',
  `access` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'The access level required to view the menu item.',
  `img` varchar(255) NOT NULL COMMENT 'The image of the menu item.',
  `template_style_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `params` text NOT NULL COMMENT 'JSON encoded data for the menu item.',
  `lft` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set lft.',
  `rgt` int(11) NOT NULL DEFAULT '0' COMMENT 'Nested set rgt.',
  `home` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Indicates if this menu item is the home or default page.',
  `language` char(7) NOT NULL DEFAULT '',
  `client_id` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `b5fcx_menu`
--

INSERT INTO `b5fcx_menu` (`id`, `menutype`, `title`, `alias`, `note`, `path`, `link`, `type`, `published`, `parent_id`, `level`, `component_id`, `checked_out`, `checked_out_time`, `browserNav`, `access`, `img`, `template_style_id`, `params`, `lft`, `rgt`, `home`, `language`, `client_id`) VALUES
(1, '', 'Menu_Item_Root', 'root', '', '', '', '', 1, 0, 0, 0, 0, '0000-00-00 00:00:00', 0, 0, '', 0, '', 0, 65, 0, '*', 0),
(2, 'menu', 'com_banners', 'Banners', '', 'Banners', 'index.php?option=com_banners', 'component', 0, 1, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners', 0, '', 1, 10, 0, '*', 1),
(3, 'menu', 'com_banners', 'Banners', '', 'Banners/Banners', 'index.php?option=com_banners', 'component', 0, 2, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners', 0, '', 2, 3, 0, '*', 1),
(4, 'menu', 'com_banners_categories', 'Categories', '', 'Banners/Categories', 'index.php?option=com_categories&extension=com_banners', 'component', 0, 2, 2, 6, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-cat', 0, '', 4, 5, 0, '*', 1),
(5, 'menu', 'com_banners_clients', 'Clients', '', 'Banners/Clients', 'index.php?option=com_banners&view=clients', 'component', 0, 2, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-clients', 0, '', 6, 7, 0, '*', 1),
(6, 'menu', 'com_banners_tracks', 'Tracks', '', 'Banners/Tracks', 'index.php?option=com_banners&view=tracks', 'component', 0, 2, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 'class:banners-tracks', 0, '', 8, 9, 0, '*', 1),
(7, 'menu', 'com_contact', 'Contacts', '', 'Contacts', 'index.php?option=com_contact', 'component', 0, 1, 1, 8, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact', 0, '', 11, 16, 0, '*', 1),
(8, 'menu', 'com_contact', 'Contacts', '', 'Contacts/Contacts', 'index.php?option=com_contact', 'component', 0, 7, 2, 8, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact', 0, '', 12, 13, 0, '*', 1),
(9, 'menu', 'com_contact_categories', 'Categories', '', 'Contacts/Categories', 'index.php?option=com_categories&extension=com_contact', 'component', 0, 7, 2, 6, 0, '0000-00-00 00:00:00', 0, 0, 'class:contact-cat', 0, '', 14, 15, 0, '*', 1),
(10, 'menu', 'com_messages', 'Messaging', '', 'Messaging', 'index.php?option=com_messages', 'component', 0, 1, 1, 15, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages', 0, '', 17, 22, 0, '*', 1),
(11, 'menu', 'com_messages_add', 'New Private Message', '', 'Messaging/New Private Message', 'index.php?option=com_messages&task=message.add', 'component', 0, 10, 2, 15, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages-add', 0, '', 18, 19, 0, '*', 1),
(12, 'menu', 'com_messages_read', 'Read Private Message', '', 'Messaging/Read Private Message', 'index.php?option=com_messages', 'component', 0, 10, 2, 15, 0, '0000-00-00 00:00:00', 0, 0, 'class:messages-read', 0, '', 20, 21, 0, '*', 1),
(13, 'menu', 'com_newsfeeds', 'News Feeds', '', 'News Feeds', 'index.php?option=com_newsfeeds', 'component', 0, 1, 1, 17, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds', 0, '', 23, 28, 0, '*', 1),
(14, 'menu', 'com_newsfeeds_feeds', 'Feeds', '', 'News Feeds/Feeds', 'index.php?option=com_newsfeeds', 'component', 0, 13, 2, 17, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds', 0, '', 24, 25, 0, '*', 1),
(15, 'menu', 'com_newsfeeds_categories', 'Categories', '', 'News Feeds/Categories', 'index.php?option=com_categories&extension=com_newsfeeds', 'component', 0, 13, 2, 6, 0, '0000-00-00 00:00:00', 0, 0, 'class:newsfeeds-cat', 0, '', 26, 27, 0, '*', 1),
(16, 'menu', 'com_redirect', 'Redirect', '', 'Redirect', 'index.php?option=com_redirect', 'component', 0, 1, 1, 24, 0, '0000-00-00 00:00:00', 0, 0, 'class:redirect', 0, '', 29, 30, 0, '*', 1),
(17, 'menu', 'com_search', 'Basic Search', '', 'Basic Search', 'index.php?option=com_search', 'component', 0, 1, 1, 19, 0, '0000-00-00 00:00:00', 0, 0, 'class:search', 0, '', 31, 32, 0, '*', 1),
(18, 'menu', 'com_finder', 'Smart Search', '', 'Smart Search', 'index.php?option=com_finder', 'component', 0, 1, 1, 27, 0, '0000-00-00 00:00:00', 0, 0, 'class:finder', 0, '', 33, 34, 0, '*', 1),
(19, 'menu', 'com_joomlaupdate', 'Joomla! Update', '', 'Joomla! Update', 'index.php?option=com_joomlaupdate', 'component', 1, 1, 1, 28, 0, '0000-00-00 00:00:00', 0, 0, 'class:joomlaupdate', 0, '', 35, 36, 0, '*', 1),
(20, 'main', 'com_tags', 'Tags', '', 'Tags', 'index.php?option=com_tags', 'component', 0, 1, 1, 29, 0, '0000-00-00 00:00:00', 0, 1, 'class:tags', 0, '', 37, 38, 0, '', 1),
(21, 'main', 'com_postinstall', 'Post-installation messages', '', 'Post-installation messages', 'index.php?option=com_postinstall', 'component', 0, 1, 1, 32, 0, '0000-00-00 00:00:00', 0, 1, 'class:postinstall', 0, '', 39, 40, 0, '*', 1),
(101, 'mainmenu', 'Главная', 'home', '', 'home', 'index.php?option=com_directory&view=def', 'component', 1, 1, 1, 10004, 0, '0000-00-00 00:00:00', 0, 1, ' ', 9, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"page_title\":\"\",\"show_page_heading\":\"1\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0}', 41, 42, 0, '*', 0),
(102, 'm-site-menu', 'Возможности IBP', 'main', '', 'main', 'index.php?option=com_directory&view=def', 'component', 1, 1, 1, 10004, 0, '0000-00-00 00:00:00', 0, 1, ' ', 9, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0}', 43, 44, 1, '*', 0),
(103, 'm-site-menu', 'Описание системы', 'aboutipb', '', 'aboutipb', 'index.php?option=com_directory&view=aboutipb', 'component', 1, 1, 1, 10004, 0, '0000-00-00 00:00:00', 0, 1, ' ', 9, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0}', 45, 46, 0, '*', 0),
(104, 'm-site-menu', 'Новости', 'news', '', 'news', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, ' ', 9, '{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"\",\"info_block_position\":\"\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_vote\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_hits\":\"\",\"show_tags\":\"\",\"show_noauth\":\"\",\"urls_position\":\"\",\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0}', 47, 48, 0, '*', 0),
(105, 'm-site-menu', 'Полезное', 'poleznoe', '', 'poleznoe', 'index.php?option=com_content&view=article&id=1', 'component', 1, 1, 1, 22, 0, '0000-00-00 00:00:00', 0, 1, ' ', 9, '{\"show_title\":\"\",\"link_titles\":\"\",\"show_intro\":\"\",\"info_block_position\":\"\",\"show_category\":\"\",\"link_category\":\"\",\"show_parent_category\":\"\",\"link_parent_category\":\"\",\"show_author\":\"\",\"link_author\":\"\",\"show_create_date\":\"\",\"show_modify_date\":\"\",\"show_publish_date\":\"\",\"show_item_navigation\":\"\",\"show_vote\":\"\",\"show_icons\":\"\",\"show_print_icon\":\"\",\"show_email_icon\":\"\",\"show_hits\":\"\",\"show_tags\":\"\",\"show_noauth\":\"\",\"urls_position\":\"\",\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0}', 49, 50, 0, '*', 0),
(106, 'main', 'COM_DIRECTORY', 'com-directory', '', 'com-directory', 'index.php?option=com_directory', 'component', 0, 1, 1, 10004, 0, '0000-00-00 00:00:00', 0, 1, 'class:component', 0, '{}', 51, 54, 0, '', 1),
(107, 'main', 'BASESETTINGS_SUBMENU', 'basesettings-submenu', '', 'com-directory/basesettings-submenu', 'index.php?option=com_directory', 'component', 0, 106, 2, 10004, 0, '0000-00-00 00:00:00', 0, 1, 'class:basesettings', 0, '{}', 52, 53, 0, '', 1),
(108, 'mainmenu', 'Обработчик форм', 'forms', '', 'forms', 'index.php?option=com_directory&view=forms', 'component', 1, 1, 1, 10004, 0, '0000-00-00 00:00:00', 0, 1, ' ', 9, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0}', 55, 56, 0, '*', 0),
(109, 'mainmenu', 'IPB для банков', 'banks', '', 'banks', 'index.php?option=com_directory&view=banks', 'component', 1, 1, 1, 10004, 0, '0000-00-00 00:00:00', 0, 1, ' ', 9, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0}', 57, 58, 0, '*', 0),
(110, 'main', 'Банки', 'Банки', '', 'com-directory/basesettings-submenu', 'index.php?option=com_directory&view=banks', 'component', 0, 106, 2, 10004, 0, '0000-00-00 00:00:00', 0, 1, 'class:basesettings', 0, '{}', 52, 53, 0, '', 1),
(111, 'mainmenu', 'IPB для компаний', 'companies', '', 'companies', 'index.php?option=com_directory&view=companies', 'component', 1, 1, 1, 10004, 0, '0000-00-00 00:00:00', 0, 1, ' ', 9, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0}', 59, 60, 0, '*', 0),
(112, 'main', 'Компании', 'Компании', '', 'com-directory/basesettings-submenu', 'index.php?option=com_directory&view=companies', 'component', 0, 106, 2, 10004, 0, '0000-00-00 00:00:00', 0, 1, 'class:basesettings', 0, '{}', 52, 53, 0, '', 1),
(113, 'mainmenu', 'IPB для партнеров', 'partners', '', 'partners', 'index.php?option=com_directory&view=partners', 'component', 1, 1, 1, 10004, 0, '0000-00-00 00:00:00', 0, 1, ' ', 9, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0}', 61, 62, 0, '*', 0),
(114, 'main', 'Партнеры', 'Партнеры', '', 'com-directory/basesettings-submenu', 'index.php?option=com_directory&view=partners', 'component', 0, 106, 2, 10004, 0, '0000-00-00 00:00:00', 0, 1, 'class:basesettings', 0, '{}', 52, 53, 0, '', 1),
(115, 'main', 'О системе', 'О системе', '', 'com-directory/basesettings-submenu', 'index.php?option=com_directory&view=aboutipb', 'component', 0, 106, 2, 10004, 0, '0000-00-00 00:00:00', 0, 1, 'class:basesettings', 0, '{}', 52, 53, 0, '', 1),
(116, 'main', 'Физики', 'Физики', '', 'com-directory/basesettings-submenu', 'index.php?option=com_directory&view=fiziks', 'component', 0, 106, 2, 10004, 0, '0000-00-00 00:00:00', 0, 1, 'class:basesettings', 0, '{}', 52, 53, 0, '', 1),
(117, 'mainmenu', 'IBP для физических лиц', 'fiziks', '', 'fiziks', 'index.php?option=com_directory&view=fiziks', 'component', 1, 1, 1, 10004, 0, '0000-00-00 00:00:00', 0, 1, ' ', 9, '{\"menu-anchor_title\":\"\",\"menu-anchor_css\":\"\",\"menu_image\":\"\",\"menu_text\":1,\"menu_show\":1,\"page_title\":\"\",\"show_page_heading\":\"\",\"page_heading\":\"\",\"pageclass_sfx\":\"\",\"menu-meta_description\":\"\",\"menu-meta_keywords\":\"\",\"robots\":\"\",\"secure\":0}', 63, 64, 0, '*', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_modules`
--

CREATE TABLE `b5fcx_modules` (
  `id` int(10) NOT NULL,
  `module_id` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `arial_name` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL,
  `alias` varchar(250) NOT NULL,
  `ordering` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `b5fcx_modules`
--

INSERT INTO `b5fcx_modules` (`id`, `module_id`, `name`, `arial_name`, `type`, `alias`, `ordering`) VALUES
(1, 'pages_72542', 'pages', 'Материалы', 'admin', '/administrator/pages/', '200'),
(2, 'menu_01000', 'Menu', 'Меню сайта', 'admin', '', '300'),
(3, 'categories_00002', 'categories', 'Категории', 'admin', '/administrator/categories/', '100'),
(4, 'form_00001', 'forms', 'Формы', 'admin', '/administrator/form/', '400'),
(5, 'fields_00001', 'fields', 'Настройка доп. полей', 'admin', '/administrator/fields/', '500');

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_modules_rules`
--

CREATE TABLE `b5fcx_modules_rules` (
  `id` int(20) NOT NULL,
  `moduleId` int(6) NOT NULL,
  `read` int(6) NOT NULL,
  `edit` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `b5fcx_modules_rules`
--

INSERT INTO `b5fcx_modules_rules` (`id`, `moduleId`, `read`, `edit`) VALUES
(1, 1, 8, 8),
(2, 2, 8, 8),
(3, 3, 8, 8),
(4, 4, 8, 8),
(5, 5, 8, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_session`
--

CREATE TABLE `b5fcx_session` (
  `session_id` varchar(200) NOT NULL DEFAULT '',
  `client_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `guest` tinyint(4) UNSIGNED DEFAULT '1',
  `time` varchar(14) DEFAULT '',
  `data` mediumtext,
  `userid` int(11) DEFAULT '0',
  `username` varchar(150) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `b5fcx_session`
--

INSERT INTO `b5fcx_session` (`session_id`, `client_id`, `guest`, `time`, `data`, `userid`, `username`) VALUES
('m7q2pk694u4etoqit0jus47s82', 0, 1, '1463507484', 'joomla|s:1452:\"TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjoyOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjE6e3M6OToiX19kZWZhdWx0IjtPOjg6InN0ZENsYXNzIjozOntzOjc6InNlc3Npb24iO086ODoic3RkQ2xhc3MiOjI6e3M6NzoiY291bnRlciI7aToxO3M6NToidGltZXIiO086ODoic3RkQ2xhc3MiOjM6e3M6NToic3RhcnQiO2k6MTQ2MzUwNzQ3NztzOjQ6Imxhc3QiO2k6MTQ2MzUwNzQ3NztzOjM6Im5vdyI7aToxNDYzNTA3NDc3O319czo4OiJyZWdpc3RyeSI7TzoyNDoiSm9vbWxhXFJlZ2lzdHJ5XFJlZ2lzdHJ5IjoyOntzOjc6IgAqAGRhdGEiO086ODoic3RkQ2xhc3MiOjA6e31zOjk6InNlcGFyYXRvciI7czoxOiIuIjt9czo0OiJ1c2VyIjtPOjU6IkpVc2VyIjoyNjp7czo5OiIAKgBpc1Jvb3QiO047czoyOiJpZCI7aTowO3M6NDoibmFtZSI7TjtzOjg6InVzZXJuYW1lIjtOO3M6NToiZW1haWwiO047czo4OiJwYXNzd29yZCI7TjtzOjE0OiJwYXNzd29yZF9jbGVhciI7czowOiIiO3M6NToiYmxvY2siO047czo5OiJzZW5kRW1haWwiO2k6MDtzOjEyOiJyZWdpc3RlckRhdGUiO047czoxMzoibGFzdHZpc2l0RGF0ZSI7TjtzOjEwOiJhY3RpdmF0aW9uIjtOO3M6NjoicGFyYW1zIjtOO3M6NjoiZ3JvdXBzIjthOjE6e2k6MDtzOjE6IjkiO31zOjU6Imd1ZXN0IjtpOjE7czoxMzoibGFzdFJlc2V0VGltZSI7TjtzOjEwOiJyZXNldENvdW50IjtOO3M6MTI6InJlcXVpcmVSZXNldCI7TjtzOjEwOiIAKgBfcGFyYW1zIjtPOjI0OiJKb29tbGFcUmVnaXN0cnlcUmVnaXN0cnkiOjI6e3M6NzoiACoAZGF0YSI7Tzo4OiJzdGRDbGFzcyI6MDp7fXM6OToic2VwYXJhdG9yIjtzOjE6Ii4iO31zOjE0OiIAKgBfYXV0aEdyb3VwcyI7TjtzOjE0OiIAKgBfYXV0aExldmVscyI7YTozOntpOjA7aToxO2k6MTtpOjE7aToyO2k6NTt9czoxNToiACoAX2F1dGhBY3Rpb25zIjtOO3M6MTI6IgAqAF9lcnJvck1zZyI7TjtzOjEzOiIAKgB1c2VySGVscGVyIjtPOjE4OiJKVXNlcldyYXBwZXJIZWxwZXIiOjA6e31zOjEwOiIAKgBfZXJyb3JzIjthOjA6e31zOjM6ImFpZCI7aTowO319fXM6OToic2VwYXJhdG9yIjtzOjE6Ii4iO30=\";', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_users`
--

CREATE TABLE `b5fcx_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `sendEmail` tinyint(4) DEFAULT '0',
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  `lastResetTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Date of last password reset',
  `resetCount` int(11) NOT NULL DEFAULT '0' COMMENT 'Count of password resets since lastResetTime',
  `otpKey` varchar(1000) NOT NULL DEFAULT '' COMMENT 'Two factor authentication encrypted keys',
  `otep` varchar(1000) NOT NULL DEFAULT '' COMMENT 'One time emergency passwords',
  `requireReset` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Require user to reset password on next login',
  `autorisation_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `b5fcx_users`
--

INSERT INTO `b5fcx_users` (`id`, `name`, `username`, `email`, `password`, `block`, `sendEmail`, `registerDate`, `lastvisitDate`, `activation`, `params`, `lastResetTime`, `resetCount`, `otpKey`, `otep`, `requireReset`, `autorisation_id`) VALUES
(878, 'Super User', 'jimmy877', 'molot877@mail.ru', '9d8e43fd711d16149039183363e98672', 0, 1, '2016-09-01 19:52:04', '2016-04-06 07:20:31', '1', '', '0000-00-00 00:00:00', 0, '', '', 0, 'c5b62b2131af162dd5101731e6f266b2'),
(879, 'manager', 'manager', 'zaika@mail.ru', '$2y$10$ijd3FvvWXJ4BucOFIEUllezywQKpH3QOYrAdT3EIQtFsZjQiEDNES', 0, 0, '2016-04-04 21:57:53', '2016-04-06 07:20:28', '', '{\"admin_style\":\"\",\"admin_language\":\"\",\"language\":\"\",\"editor\":\"\",\"helpsite\":\"\",\"timezone\":\"\"}', '0000-00-00 00:00:00', 0, '', '', 0, ''),
(880, '', 'jimmy878', 'molot878@mail.ru', 'fb3c0168812b592bf0463cabc20931e7', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', 0, '', '', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_user_keys`
--

CREATE TABLE `b5fcx_user_keys` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `series` varchar(255) NOT NULL,
  `invalid` tinyint(4) NOT NULL,
  `time` varchar(200) NOT NULL,
  `uastring` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_user_notes`
--

CREATE TABLE `b5fcx_user_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `catid` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `subject` varchar(100) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_user_id` int(10) UNSIGNED NOT NULL,
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `review_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_user_profiles`
--

CREATE TABLE `b5fcx_user_profiles` (
  `user_id` int(11) NOT NULL,
  `profile_key` varchar(100) NOT NULL,
  `profile_value` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Simple user profile storage table';

-- --------------------------------------------------------

--
-- Структура таблицы `b5fcx_user_usergroup_map`
--

CREATE TABLE `b5fcx_user_usergroup_map` (
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__users.id',
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Foreign Key to #__usergroups.id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `b5fcx_user_usergroup_map`
--

INSERT INTO `b5fcx_user_usergroup_map` (`user_id`, `group_id`) VALUES
(878, 8),
(879, 2),
(879, 6),
(879, 7);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `b5fcx_categories`
--
ALTER TABLE `b5fcx_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_idx` (`extension`,`published`,`access`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_path` (`path`),
  ADD KEY `idx_left_right` (`lft`,`rgt`),
  ADD KEY `idx_alias` (`alias`),
  ADD KEY `idx_language` (`language`);

--
-- Индексы таблицы `b5fcx_content`
--
ALTER TABLE `b5fcx_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_access` (`access`),
  ADD KEY `idx_checkout` (`checked_out`),
  ADD KEY `idx_state` (`state`),
  ADD KEY `idx_catid` (`catid`),
  ADD KEY `idx_createdby` (`created_by`),
  ADD KEY `idx_featured_catid` (`featured`,`catid`),
  ADD KEY `idx_language` (`language`),
  ADD KEY `idx_xreference` (`xreference`);

--
-- Индексы таблицы `b5fcx_fields_settings`
--
ALTER TABLE `b5fcx_fields_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `b5fcx_field_aliases`
--
ALTER TABLE `b5fcx_field_aliases`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `b5fcx_field_group`
--
ALTER TABLE `b5fcx_field_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `b5fcx_field_prototype`
--
ALTER TABLE `b5fcx_field_prototype`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `b5fcx_field_value`
--
ALTER TABLE `b5fcx_field_value`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `b5fcx_menu`
--
ALTER TABLE `b5fcx_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_client_id_parent_id_alias_language` (`client_id`,`parent_id`,`alias`,`language`),
  ADD KEY `idx_componentid` (`component_id`,`menutype`,`published`,`access`),
  ADD KEY `idx_menutype` (`menutype`),
  ADD KEY `idx_left_right` (`lft`,`rgt`),
  ADD KEY `idx_alias` (`alias`),
  ADD KEY `idx_path` (`path`(255)),
  ADD KEY `idx_language` (`language`);

--
-- Индексы таблицы `b5fcx_modules`
--
ALTER TABLE `b5fcx_modules`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `b5fcx_modules_rules`
--
ALTER TABLE `b5fcx_modules_rules`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `b5fcx_session`
--
ALTER TABLE `b5fcx_session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `time` (`time`);

--
-- Индексы таблицы `b5fcx_users`
--
ALTER TABLE `b5fcx_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_name` (`name`),
  ADD KEY `idx_block` (`block`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- Индексы таблицы `b5fcx_user_keys`
--
ALTER TABLE `b5fcx_user_keys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `series` (`series`),
  ADD UNIQUE KEY `series_2` (`series`),
  ADD UNIQUE KEY `series_3` (`series`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `b5fcx_user_notes`
--
ALTER TABLE `b5fcx_user_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_category_id` (`catid`);

--
-- Индексы таблицы `b5fcx_user_profiles`
--
ALTER TABLE `b5fcx_user_profiles`
  ADD UNIQUE KEY `idx_user_id_profile_key` (`user_id`,`profile_key`);

--
-- Индексы таблицы `b5fcx_user_usergroup_map`
--
ALTER TABLE `b5fcx_user_usergroup_map`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `b5fcx_categories`
--
ALTER TABLE `b5fcx_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `b5fcx_content`
--
ALTER TABLE `b5fcx_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `b5fcx_fields_settings`
--
ALTER TABLE `b5fcx_fields_settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `b5fcx_field_aliases`
--
ALTER TABLE `b5fcx_field_aliases`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `b5fcx_field_group`
--
ALTER TABLE `b5fcx_field_group`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `b5fcx_field_prototype`
--
ALTER TABLE `b5fcx_field_prototype`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `b5fcx_field_value`
--
ALTER TABLE `b5fcx_field_value`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `b5fcx_menu`
--
ALTER TABLE `b5fcx_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT для таблицы `b5fcx_modules`
--
ALTER TABLE `b5fcx_modules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `b5fcx_modules_rules`
--
ALTER TABLE `b5fcx_modules_rules`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `b5fcx_users`
--
ALTER TABLE `b5fcx_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=881;

--
-- AUTO_INCREMENT для таблицы `b5fcx_user_keys`
--
ALTER TABLE `b5fcx_user_keys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `b5fcx_user_notes`
--
ALTER TABLE `b5fcx_user_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
