-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 05 2015 г., 19:14
-- Версия сервера: 5.6.24
-- Версия PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `education`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `date`, `user`) VALUES
(7, 'Syria conflict: Russia air strikes stepped up', 'Moscow said its aircraft had hit Islamic State (IS) command centres, arms depots and military vehicles.\r\nTargets included the IS stronghold of Raqqa, but also Aleppo, Hama and Idlib - provinces with little IS presence.\r\nMembers of the US-led coalition targeting IS have renewed their criticism of the Russian action.\r\nIn a statement, the US, UK, Turkey and other coalition members called on Russia to cease air strikes they said were hitting the Syrian opposition and civilians, adding that they would "only fuel more extremism".\r\nThe Syrian opposition and others have suggested non-IS rebel factions opposed to President Assad - the Kremlin''s ally - are bearing the brunt of the Russian attacks.\r\nAlexei Pushkov, the head of the foreign affairs committee in Russia''s parliament, said the air strikes - which began on Wednesday - could last for three to four months.\r\nHe added that the US had only "pretended" to bomb IS, and promised that Russia''s campaign would be much more effective', '2015-10-02 23:15:00', 2),
(8, 'Obama says Iran and President Assad represent Russia&#039;s entire coalition in Syria', '<p>President Obama, addressing Soviet intervention in Syria at a White House press conference, said Tuesday Iran and Syria President Bashar Assad represented Russia&#039;s entire coalition &quot;and the rest of the world makes up ours.&quot;</p><p>He also said Washington and Russian leaders are currently having critical &quot;conversations about deconfliction&quot; so that tensions in Syria won&#039;t end up with &quot;firefights&quot; in the air between the two sides. He warned against suggestions that the U.S. immediately intervene militarily to protect the Syrian rebels who have come under attack by Russian airstrikes in recent days.</p><p>&quot;This is not a contest between the U.S. and Russia,&quot; he said. &quot;We&#039;re not going to make Syria a proxy war between Russia and the United States. Our battle is with ISIL.&quot;</p><p>Nevertheless, reports Friday indicated that senior U.S. military leaders and defense officials are debating whether military force should be used to protect Washington-backed Syrian rebels.</p><p>Right now, the military is not authorized to retaliate on the rebels&#039; behalf.</p><p>&ldquo;This is a hugely difficult and complex problem and I would have hoped we would have learned that from Afghanistan and Iraq, where we have devoted enormous time and effort and resources with the very best people,&rdquo; he said, addressing the impulse to rush to a military solution.</p>&lt;div style=&quot;margin: 0px 0px 24px; padding: 0px; color: rgb(34, 34, 34); font-family: Lora, &#039;Times New Roman&#039;, serif; line-height: 21px; background: 0px 0px rgb(244, 244, 244);&quot;&gt;&lt;/div&gt;<p>This doesn&rsquo;t change the U.S. and coalition policy that the regime of President Bashar Assad must go, he told reporters.</p><p>Obama would not say when asked by a reporter whether he felt Putin had been dishonest in not laying out his intentions in conversations with the White House before the strikes.</p><p>&quot;Mr. Putin had to go into Syria not out of strength but out of weakness&quot; to prop up Assad, Obama said, calling it a lonely place on the world stage. &quot;Iran and Assad make up Mr. Putin&#039;s coalition at the moment. The rest of the world makes up ours. We are not fooled by the current strategy.&quot;</p><p>He said Putin appeared to share the U.S. coalition&rsquo;s urgency to defeat ISIL but what is clear, he said, is Putin &ldquo;doesn&rsquo;t distinguish between ISIL and a moderate Syrian opposition that want to make Assad go.&rdquo;</p><p>He said the Russian airstrikes will ultimately prove counterproductive, as it will draw the animosity of the Syrian people and the wider Sunni Islamic world.</p><p>&quot;Mr. Putin&#039;s action&#039;s have only been successful in so far as they have bolstered his poll ratings inside of Russia,&quot; said Obama. &quot;But this is not a smart strategic move on Russia&#039;s part.&quot;</p><p>The Pentagon on Thursday had its first conversation with Russian officials in an effort to avoid any unintended U.S.-Russian confrontations as the airstrikes continue in the skies over Syria.</p><p>U.S. officials made it clear earlier this year that rebels trained by the U.S. would receive air support in the event they are attacked by either ISIS or Syrian government troops, but the Russian airstrikes have added an unexpected complication. Currently, only about 80 U.S.-trained Syrian rebels are back in Syria fighting with their units.</p><p>In other remarks, which ranged from today&#039;s economic numbers to the school shooting in Oregon on Thursday, Obama said he would not sign another continuing resolution after the latest temporary measure to avoid a federal government shutdown was passed by Congress this week.That continuing resolution, which keeps the government running based on last fiscal year&#039;s budget, will expire in December. Until then, congress must work on passing a real FY 2016 budget.&amp;nbsp;</p><p>&quot;It only sets up another manufactured crisis two weeks before Christmas,&quot; Obama said of the latest CR. &quot;This is not how the United States should be operating. We can&#039;t keep kicking the can down the road. American families deserve better.&quot;</p>', '2015-10-02 23:54:03', 2),
(9, 'UN report on web harassment could open door to gov&#039;t control of Internet, critics warn', '<p>Buried at the end of a wonkish UN report about problems women face online last month was a proposal that free speech advocates say could lay the groundwork for a government grab of the web.</p><p>The report, titled &ldquo;Cyber Violence against Women and Girls: A Worldwide Wakeâ€Up Call,&rdquo; described the bullying, harassment and threats faced by female Internet users as &ldquo;a problem of pandemic proportion&rdquo; â€â€ and suggested governments across the globe may one day need to use their &ldquo;licensing prerogative&rdquo; to ensure that only Internet service providers &ldquo;that supervise content and its dissemination&rdquo; be &ldquo;allowed to connect with the public.&rdquo;</p><p>&ldquo;Telecoms and search engines, the indispensable backbone bringing the content to users, have a particular role and responsibility to protect the public from violent or abusive behaviors,&rdquo; the report, released at UN headquarters in Manhattan on Sept. 24, argued. &ldquo;Regulators have a role to play, even if the solution to this challenge must be sought primarily in the political realm.&rdquo;</p>', '2015-10-03 01:13:02', 2),
(10, 'Sepp Blatter: Coca-Cola among sponsors saying Fifa boss must go', '<p class="introduction" id="story_continues_1">Fifa president Sepp Blatter will not resign despite major sponsors Coca-Cola, Visa, Budweiser and McDonald&#039;s calling for him to go immediately.</p><p>The four each issued statements saying Blatter should quit after&amp;nbsp;<a href="http://www.bbc.co.uk/news/world-europe-34363289">Swiss criminal proceedings were opened</a>&amp;nbsp;against him last week.</p><p>Coca-Cola took the first step, saying: &quot;Every day that passes Fifa&#039;s image and reputation continues to tarnish.&quot;</p><p>McDonald&#039;s said Blatter going would be &quot;in the best interest of the game&quot;.</p><p>The 79-year-old is accused by Swiss prosecutors of signing a contract that was &quot;unfavourable to Fifa&quot; and making a &quot;disloyal payment&quot; to Uefa president Michel Platini but denies any wrongdoing.</p><p>In a statement released through his lawyers on Friday, Blatter said resigning now &quot;would not be in the best interest of Fifa, nor would it advance the process of reform&quot;.</p><p>Budweiser&#039;s parent company, AB InBev, said it considered Blatter &quot;to be an obstacle in the reform process&quot;, while Visa said it would be in &quot;the best interests of Fifa and the sport&quot; for the Swiss to resign immediately.</p><p>Football Association chairman Greg Dyke described Friday&#039;s developments as a &quot;game-changer&quot;.</p><p>He added: &quot;It doesn&#039;t matter what Mr Blatter says now. If the people who pay for Fifa want a change they will get a change. For those of us who want fundamental change, this is good news.&quot;</p>', '2015-10-03 01:15:06', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT 'guest',
  `email` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(2, 'Administrator', 'arakka@mail.ru', 'qwerty123', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
