-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 15 2020 г., 17:26
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`postID`, `title`, `content`, `id`) VALUES
(1, 'Helping each other out – Free Self-Run Hostel in Iran', 'This story is a bit different since we weren’t stuck ourselves. But we had many guests who were stuck in Iran. In Hi Tehran Hostels, we stopped accepting new guests immediately after hearing about the start of epidemic in Iran to play our part in reducing the risk for everyone.\r\n\r\nYet, we continued monitoring the new chaos, and acknowledged the remaining foreign travelers, who were confused and clueless about when and how they could fly out, were facing many difficulties.\r\n\r\nUnfortunately, with the closure of borders, frequent cancellation of flights, and poor support from many embassies in Iran toward their travelers, we started to notice there were still numerous travelers in Iran who couldn’t fly back home any time soon and they were very tight on budget or out of money since they didn’t predict such a long stay.', 7),
(2, 'A Simple Story why I love Hostels', '\r\nGoing to Berlin on November was a challenge for me, since I’m not really an enthusiast of low temperatures. Me and my boyfriend started looking for hostels online, and found some incredible photos of the Wallyard Concept Hostel.\r\nWe are attracted by places with great design projects, and this is one of the things we look forward to find on our trips together.\r\n\r\nAmazed by the decor of the Wallyard Concept Hostel, but traveling on a low budget, we booked a shared room for 4.\r\nShare\r\n4\r\nPin\r\nTweet\r\n4Shares\r\nGoing to Berlin on November was a challenge for me, since I’m not really an enthusiast of low temperatures. Me and my boyfriend started looking for hostels online, and found some incredible photos of the Wallyard Concept Hostel.\r\n\r\nWe are attracted by places with great design projects, and this is one of the things we look forward to find on our trips together.\r\n\r\nAmazed by the decor of the Wallyard Concept Hostel, but traveling on a low budget, we booked a shared room for 4.\r\n\r\nRead: complete guide to best hostels in Berlin\r\n\r\nWe travel often, and sometimes the hostels are nothing like they look like on their website photos.\r\n\r\nBut as we arrived at Wallyard Concept Hostel  we realized that it was even better than we expected.\r\n\r\nDesign, graffiti and art work aside, the owners and their mother were the cherry on top of the cake! They were more than welcoming, always ready to help and give us different information about Berlin. And I didn’t even started talking about  the home cooked breakfast at Wallyard Concept Hostel.\r\n\r\nEverything was fresh and made with love, like we were their friends staying over the weekend.\r\n\r\nAnd to end our stay with great style, the owner gave us a room upgrade, so we had a suite of our own to spend Sunday night. All this little treats made our trip to Berlin so special that I even forgot the winter, since I felt really warm inside!', 6),
(3, 'Seven Miles For Me', 'Leaving a store, I returned to my car only to find that I’d locked my keys and cell phone inside. A teenager riding his bike saw me kick a tire and say a few choice words. “What’s wrong?” he asked. I explained my situation. “But even if I could call my wife,” I said, “she can’t bring me her car key, since this is our only car.” He handed me his cell phone. “Call your wife and tell her I’m coming to get her key.” “That’s seven miles round trip.” “Don’t worry about it.” An hour later, he returned with the key. I offered him some money, but he refused. “Let’s just say I needed the exercise,” he said. Then, like a cowboy in the movies, he rode off into the sunset.', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(6, 'covid19', 'covid@gmail.com', '3f762047f00586290e385019a6f27768'),
(7, 'tolebiermekov', 'tolebiermekov@gmail.com', '698d51a19d8a121ce581499d7b701668');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
