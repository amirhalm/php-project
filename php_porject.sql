-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 12, 2025 at 03:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_porject`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(60) NOT NULL,
  `copies` int(40) NOT NULL,
  `avilable` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `copies`, `avilable`) VALUES
(1, 'الأمير', 'رواية سياسية من تأليف نيقولو ميكيافيلي', 5, 5),
(2, 'مئة عام من العزلة', 'قصة عائلة بوينديا عبر أجيال متعددة', 5, 5),
(3, 'الحرب والسلام', 'رواية كلاسيكية عن الحرب والحب في روسيا', 5, 5),
(4, 'البؤساء', 'قصة فانتين وجان فالجان في فرنسا', 5, 5),
(5, 'مدن الملح', 'رواية عن تحولات المجتمع العربي', 5, 5),
(6, 'النبي', 'تأملات روحية لفارس عباد', 5, 5),
(7, 'الشيخ والبحر', 'قصة صياد يواجه الطبيعة', 5, 5),
(8, 'الطريق', 'رواية عن الأب وابنه في عالم مدمر', 5, 5),
(9, 'رحلة إلى مركز الأرض', 'مغامرة علمية مع جول فيرن', 5, 5),
(10, 'المئة عام من العزلة', 'أسطورة عائلة بوينديا', 5, 5),
(11, 'مزرعة الحيوان', 'قصة رمزية عن الثورة والسلطة', 5, 5),
(12, '1984', 'رواية ديستوبية عن المراقبة والتحكم', 5, 5),
(13, 'فهرنهايت 451', 'رواية عن منع القراءة والسيطرة الفكرية', 5, 5),
(14, 'الطاعون', 'رواية عن مقاومة الوباء', 5, 5),
(15, 'موبي ديك', 'صراع رجل مع حوت أبيض', 5, 5),
(16, 'الحارس في حقل الشوفان', 'رواية عن المراهقة والتمرد', 5, 5),
(17, 'الرسائل إلى ذاتي الصغيرة', 'مجموعة رسائل تحفيزية', 5, 5),
(18, 'العطر', 'قصة قاتل في باريس القرن 18', 5, 5),
(19, 'المرأة في الأبيض', 'رواية غموض ورعب', 5, 5),
(20, 'سحر التفكير الكبير', 'كتاب تطوير ذاتي', 5, 5),
(21, 'فن الحرب', 'استراتيجيات قتالية من الصين القديمة', 5, 5),
(22, 'الطريق إلى الحرية', 'قصة كفاح وإنسانية', 5, 5),
(23, 'الرجل الخفي', 'رواية عن القوة والاختفاء', 5, 5),
(24, 'البلدة الصغيرة', 'قصص من الحياة الريفية', 5, 5),
(25, 'على طريق الحرية', 'مذكرات نضال وكفاح', 5, 5),
(26, 'الطفل السري', 'رواية درامية عن الأسرار العائلية', 5, 5),
(27, 'الحياة سر', 'مقالات فلسفية', 5, 5),
(28, 'أطلس البطل', 'قصة ملحمية عن البطولة', 5, 5),
(29, 'الغريب', 'رواية عن اللامبالاة والوجود', 5, 5),
(30, 'صلاة في برلين', 'مذكرات من الحرب', 5, 5),
(31, 'من أنا؟', 'تأملات في الذات', 5, 5),
(32, 'أغنية الجليد والنار', 'سلسلة فانتازيا شهيرة', 5, 5),
(33, 'السعادة الحقيقية', 'كتاب تحفيزي وتطويري', 5, 5),
(34, 'حكايات من الشرق', 'قصص تقليدية من الشرق الأوسط', 5, 5),
(35, 'رحلة العمر', 'مذكرات ومغامرات', 5, 5),
(36, 'لغة الجسد', 'كيف تفهم الآخرين', 5, 5),
(37, 'موسم الهجرة إلى الشمال', 'رواية عن الهوية والاغتراب', 5, 4),
(38, 'في انتظار البرابرة', 'قصة عن السلطة والظلم', 5, 5),
(39, 'نساء صغيرات', 'قصة عائلة وأخوات في أمريكا', 5, 5),
(40, 'الشيخ والبحر', 'قصة كفاح الصياد القديم', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `borrow_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`book_id`, `user_id`, `borrow_time`) VALUES
(37, 5, '2025-09-12'),
(40, 5, '2025-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'amirh', 'amirh@gmail.com', '123', 'admin'),
(2, 'habiba', 'habiba@gmail.com', '123', 'admin'),
(3, 'mahmoud', 'mahmoud@gmail.com', '$2y$10$axPOFtugJba1/CRPgM9gJOJkpvfXM1WXBcIk/XpTSau.kgdFvgHmq', 'student'),
(4, 'mahmoud', 'mahmoud@gmail.com', '$2y$10$XUffakCwcaw2xCI3Zsbao.7.exYEYYiUptQOzwbtBkmdnTvRYPnxK', 'student'),
(5, 'omr', 'omr@gmail.com', '123', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `borrows`
--
ALTER TABLE `borrows`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrows`
--
ALTER TABLE `borrows`
  ADD CONSTRAINT `borrows_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
