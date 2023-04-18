-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 06:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seyaha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `users_type` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `users_type`) VALUES
(1, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cafe`
--

CREATE TABLE `cafe` (
  `cafe_id` int(255) NOT NULL,
  `cafe_name` varchar(255) NOT NULL,
  `cafe_name_ar` varchar(255) NOT NULL,
  `cafe_location` varchar(255) NOT NULL,
  `cafe_img` varchar(255) NOT NULL,
  `cafe_city_id` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cafe`
--

INSERT INTO `cafe` (`cafe_id`, `cafe_name`, `cafe_name_ar`, `cafe_location`, `cafe_img`, `cafe_city_id`) VALUES
(3, 'The new tourist', 'السياحي الجديد', 'https://maps.app.goo.gl/hwVmeaZbzoYbrxSm8', 'السياحي الجديد.jpg', 9),
(4, 'Rashid Restaurant', 'مطعم رشيد', 'https://maps.app.goo.gl/eEgZddvDnwDGazpe9', 'Restaurant1.jpg', 9),
(5, 'Perugina Restaurant', 'مطعم بيروجينا', 'https://maps.app.goo.gl/TSUMteGK8uniejbC9', 'Restaurant2.jpg', 9),
(6, 'Cyrene Restaurant', 'مطعم قورينا للوجبات الشعبية', 'https://maps.app.goo.gl/WpLfkuCzpCMLaETe8?g_st=ic', 'Hotel1.jpg', 14),
(7, 'Family Restaurant', 'مطعم العائلة', 'https://maps.app.goo.gl/n22o1A3XooWs2UkD9?g_st=ic', 'Hotel1.jpg', 14),
(8, 'Kudu', 'كودو', 'https://maps.app.goo.gl/QC1GeYHkNyX7rYfD9?g_st=ic', 'Hotel1.jpg', 14),
(9, 'Cove Valley Park', 'منتزه وادي الكوف', 'https://maps.app.goo.gl/au4uGZAXUwJsBS596?g_st=ic', 'Restaurant2.jpg', 15),
(10, 'Latino Restaurant', 'مطعم لاتينو', 'https://maps.app.goo.gl/NekLXRJiyEkSZQwb8?g_st=ic', 'Restaurant1.jpg', 16),
(11, 'Tree Restaurant', 'مطعم الشجرة', 'https://maps.app.goo.gl/Yci1doN8QQyuq9WZ7?g_st=ic', 'Restaurant2.jpg', 16),
(12, 'Restaurant Alrahebeh (Shklov)', '(مطعم الرحيبة (شكلوف', 'https://maps.app.goo.gl/vCxtSWStAMYtDmoJA?g_st=ic', 'Restaurant1.jpg', 16),
(13, 'Abhih restaurant for popular', 'مطعم ابحيح للوجبات الشعبية', 'https://maps.google.com/?cid=6150299709660397255&entry=gps', 'Restaurant1.jpg', 19),
(14, 'Lebda Cafe for snacks', 'مقهى لبدة للمأكولات الخفيفة', 'https://maps.app.goo.gl/4Ryvu2GiPdG5h3Qf6', 'Restaurant2.jpg', 19),
(15, 'Forty Four Restaurant', 'مطعم فورتي فور 44', 'https://maps.app.goo.gl/9pc56kie8vJ17Q528', 'Restaurant1.jpg', 19),
(16, 'Qasioun Restaurant', 'مطعم قاسيون', 'https://maps.app.goo.gl/uMu2TS4fcDoKvu718', 'Restaurant2.jpg', 20),
(17, 'Sabroso Restaurant', 'مطعم سابروسو', 'https://maps.app.goo.gl/Ji3ity5Y5ZidekiA7', 'Restaurant1.jpg', 20),
(18, 'Ferrari Restaurant', 'مطعم فيراري', 'https://maps.app.goo.gl/GubDqbRejq3bjrUD6', 'Restaurant2.jpg', 20),
(20, 'Good Taste Restaurant', 'مطعم المذاق الطيب', 'https://maps.app.goo.gl/2SubijgxCRE1qpat7', 'Restaurant1.jpg', 21),
(21, 'Qurina Restaurant for popular meals', 'مطعم قورينا للوجبات الشعبية', 'https://maps.app.goo.gl/srFs17Pqk61wEL4e6 ', 'Restaurant2.jpg', 21),
(22, 'Tourist Cave Restaurant', 'مطعم الكهف السياحي', 'https://maps.app.goo.gl/FghJ5AUNbnncwf5H7', 'Restaurant1.jpg', 21),
(23, 'Cafe and restaurant(astoria)', 'كافي ومطعمastoria', 'https://maps.app.goo.gl/XX8kG2WmXGx9axHe9?g_st=ic', 'Restaurant1.jpg', 22);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(255) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `city_name_ar` varchar(255) NOT NULL,
  `city_caption` varchar(255) NOT NULL,
  `city_caption_ar` varchar(255) NOT NULL,
  `city_img` varchar(255) NOT NULL,
  `city_cover` varchar(255) NOT NULL,
  `city_location` varchar(255) NOT NULL,
  `city_type` tinyint(255) NOT NULL,
  `views` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `city_name_ar`, `city_caption`, `city_caption_ar`, `city_img`, `city_cover`, `city_location`, `city_type`, `views`) VALUES
(9, 'Ghadames', 'غدامس', 'Country', 'مدينة', 'Ghadames2.jpg', 'Ghadames1.jpg', 'https://goo.gl/maps/KKsjyjGehuzVcJaz5', 2, 0),
(14, 'Jebel Akhder', 'الجبل الأخضر ', 'mountain', 'مدينة ', 'Jebel Akhdar.jpg', 'Jebel Akhdar.jpg', 'https://maps.app.goo.gl/dRBgegLgttHKDJBz9?g_st=ic', 1, 8),
(15, 'Wadi Alkouf Bridge', ' جسر وادي الكوف', 'mountain', 'مدينة ', 'Wadi Alkouf Bridge1.jpg', 'جسر وادي الكوف.jpg', 'https://maps.app.goo.gl/LWRe1qd5tN8vpJdv7?g_st=ic', 1, 8),
(16, 'Al Marj', 'المرج', 'mountain', 'مدينة', 'almarj3.jpg', '', 'https://maps.app.goo.gl/2A18rnprqdanf5pj6?g_st=ic', 1, 2),
(17, 'Al Jaghbub', 'بحيرات الجغبوب', 'Country', 'مدينة', 'Al Jaghbub1.jpg', 'Al Jaghbub2.jpg', 'https://maps.app.goo.gl/ZqJkXgQi8hY9Gv9Q8?g_st=ic', 2, 0),
(18, 'Lac Qabar oun Obari ', 'بحيرة قبر عون', 'Country', 'مدينة', 'Gaberoun.jpg', 'athrun4.jpg', 'https://maps.app.goo.gl/NvQDph2QbGBFt6acA', 2, 0),
(19, 'Leptis Magna', 'لبدة الأثرية', 'Country', 'مدينة', 'LeptisMagna2.jpg', 'LeptisMagna1.jpg', 'https://maps.app.goo.gl/8VsQK8QMRxJDMUAE7', 3, 0),
(20, 'Sabratha', 'صبراتة الأثرية', 'Country', 'مدينة', 'sabratha1.jpg', 'sabratha2.jpg', 'https://maps.app.goo.gl/QK3zRXmSQ5yAYGVt5', 3, 0),
(21, 'Shahat', 'شحات الأثرية', 'Country', 'مدينة', 'shahat1.jpg', 'shahat1.jpg', 'https://maps.app.goo.gl/h6M6FweVmQEYjvhK6', 3, 0),
(22, 'Athrun', 'الأثرون', 'Country', 'مدينة', 'athrun5.jpg', 'athrun2.jpg', 'https://maps.app.goo.gl/QSefAmimQdPM82hp6?g_st=ic', 3, 0),
(23, 'Benghazi', 'بنغازي', 'Country', 'مدينة', 'Benghazi1.jpg', 'Benghazi2.jpg', 'https://maps.app.goo.gl/ydVzx36oGbrjNpxN6', 3, 0),
(24, 'Derna', 'درنة', 'Country', 'مدينة', 'Derna2.jpg', 'Derna3.jpg', 'https://maps.app.goo.gl/RB94nDxAJZHwZsNZA', 3, 0),
(25, 'AL Bayda', 'البيضاء', 'Country', 'مدينة', 'Al Bayda1.jpg', 'Al Bayda2.jpg', 'https://maps.app.goo.gl/x2asZeKHYJ3zzK158', 1, 0),
(26, 'Swsa', 'سوسة', 'Country', 'مدينة', 'Susah2.jpg', '', 'https://maps.app.goo.gl/6iyVqmsusYapvKbL8', 1, 0),
(27, 'Darna', 'درنة', 'Country', 'مدينة', 'Derna waterfalls1.jpg', 'Derna3.jpg', 'https://maps.app.goo.gl/RB94nDxAJZHwZsNZA', 1, 0),
(28, 'Acacus Mountains', 'جبال أكاكوس', 'Country', 'مدينة', 'Acacus mountains1.jpg', 'Acacus mountains2.jpg', 'https://maps.app.goo.gl/6utTSPLMDBzyvFfu6?g_st=ic', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `city_info`
--

CREATE TABLE `city_info` (
  `info_id` int(255) NOT NULL,
  `info_title` varchar(255) NOT NULL,
  `info_title_ar` varchar(255) NOT NULL,
  `info_description` varchar(255) NOT NULL,
  `info_description_ar` varchar(255) NOT NULL,
  `info_img` varchar(255) NOT NULL,
  `info_city_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city_info`
--

INSERT INTO `city_info` (`info_id`, `info_title`, `info_title_ar`, `info_description`, `info_description_ar`, `info_img`, `info_city_id`) VALUES
(5, 'Monument to the battle of Raheibah', 'نصب تذكاري للمعركة رحيبه', 'The battle of Rahiba or the Battle of Rahiba Day is a battle that took place between the Libyan resistance fighters and the Italian forces of Libya in the Rahiba region in eastern Libya, on March 28, 1927, after the Italian forces advanced on the rebel ca', 'معركة الرحيبة أو موقعة يوم الرحيبة هي معركة دارت بين المقاومين الليبيّين وقوات ليبيا الإيطالية في منطقة الرحيبة شرق ليبيا، يوم 28 من مارس عام 1927، جاءت بعد زحف القوات الإيطالية على معسكرات الثوار في دور العبيد. انتهت المعركة بانتصار المقاومين الليبين وهز', 'نصب تدكار جبل الاخضر.jpg', '14'),
(6, 'Highway Bridge', 'جسر الطريق السريع', 'Wadi Al-Kof Bridge in Al-Jabal Al-Akhdar, Libya, is the second highest bridge in Africa. It is located about 19 km west of Al-Bayda and connects the two cities of Al-Bayda. Its vertical height is 160.', 'جسر وادي الكوف في الجبل الأخضر ليبيا هو تاني اعلى جسر في افريقيا يقع غرب مدينة البيضاء بحوالي 19 كم ويربط بين مدينتي البيضاء ويبلغ ارتفاع عموديه 160.', 'جسر وادي الكوف.jpg', '15'),
(7, 'The ancient mosque', 'المسجد العتيق', 'It is located in Al-Baladiya Square in Benghazi, Libya. It is one of the oldest mosques in the city that still exists, as its foundation dates back to the year 1577 AD. That is, during the first Ottoman era in the city of Benghazi. It was historical and h', 'يوجد في ميدان البلدية في بنغازي، ليبيا. ويعتبر من أقدم مساجد المدينة التي لا تزال قائمة، حيث يرجع تاريخ تأسيسه إلى العام 1577 م. أي في العهد العثماني الأول في مدينة بنغازي. كانت به مئذنة تاريخية أزيلت في صيانة التي أُجريت عام 1973م. .', 'photo_المسجد العتيق.jpg', '23'),
(8, 'Sport City', 'المدينة الرياضية', 'It is a multi-use sports complex in the city. It contains a main stadium to host football matches, in addition to owning facilities for athletics. Work began on its construction in 1967 and it was officially opened in 1970, and a major football stadium.', 'في مدينة بنغازي،  هي مجمع رياضي متعدد الاستخدامات في المدينة. يحتوي ملعباً رئيسيا لاستضافة مباريات كرة القدم، إضافة لامتلاكها منشآت لألعاب القوى. بدأ العمل في بنائها العام 1967 وافتتحت رسميا العام 1970، وملعبا رئيسيا لكرة القدم ', 'photo_ميدان الرياضية.jpg', '23'),
(9, 'Turkish castle', 'القلعة التركية', 'It is a castle built during the period of Turkish rule in Libya, and it was located next to the port of Benghazi in the city, and it was the most important headquarters of the Turks in the city of Benghazi, as it was the first part occupied by the Italian', 'هي قلعة بنيت في فترة الحكم التركي لليبيا، وكانت قائمة بجانب ميناء بنغازي في المدينة، وكانت أهم مقرات الأتراك في مدينة بنغازي، كما كانت أول جزء يحتله الإيطاليون في مدينة بنغازي.', 'photoالقلعة التركية.jpg', '23'),
(11, 'Cove valley', 'وادي الكوف', 'Belgray monuments\r\nIt is a museum located at the entrance to the city of Al-Bayda, and it was opened in 1988 AD.', 'متحف البيضاء (أثار بلغراي)\r\nهو متحف يقع عند مدخل مدينة البيضاء ، وقد افتتح في عام 1988م[1] يعرض مجموعة من اللقى الأثرية عثر عليها في موقع بلدة بلغراي مدينة البيضاء حاليا ، تمثلت في أواني فخارية ترجع إلى العصرين الإغريقي والروماني', 'وادي الكوف(البيضاء(.jpg', '25'),
(12, 'Archaeological Apollonia', 'أبولونيا الأثرية', 'It is a Libyan archaeological site located in the Green Mountain region.[1][2][3] It was founded by the Greeks in Cyrene to become an important economic center in the southern Mediterranean', ' هي موقع أثري ليبي يقع في منطقة الجبل الأخضر. أسسها الإغريق في قورينائية لتصبح مركزا اقتصاديا هاما في جنوبي البحر المتوسط', 'photo_سوسه الأثار.jpg', '26'),
(13, 'Lakes(Lake Al malfi)', 'بحيرات (بحيرة الملفى)', '                    The Libyan Al-Jaghbub lakes, including Al-Malfa and Al-Faridha lakes, are distinguished by their stunning scenery, as well as the possibility of exploiting them in the future development of tourism and making them a focus for medical t', '                    بحيرات الجغبوب الليبية ومنها بحيرتا الملفا والفريدغة، تتميز بمناظرها الخلابة، فضلا عن إمكانية استغلالها في تنمية مستقبلية للسياحية وجعلها بؤرة للسياحةِ العلاجية محليا وعربيا.                ', 'بحيرة الجغبوب.jpg', '17'),
(14, 'Mustafanu Marine Arch', 'قوس مصطافينو البحري', '                    The Arch of Mostafaino, which is located in the beautiful village of Al-Athrun in the Green Mountain in Libya, is one of the most beautiful natural landscapes                ', '                    قوس مصطفينو الذي يقع في قرية الأثرون الجميلة بالجبل الأخضر بليبيا احد اجمل مناظر طبيعة المميزة                ', 'قوس اثرون.jpg', '22'),
(15, 'wadi Al Athrun', 'وادي الاثرون', 'A beautiful place on the seashore located near the town of Al-Athron. It is frequented by visitors for the beauty of the landscape, as well as for amateurs jumping into the water from the top of the rocky cliff in the water basin, as well as for amateurs ', 'مكان جميل على شاطئ البحر يقع قرب بلدة  الاثرون يرتاده الزوار لجمال المنظر الطبيعي وكذلك لهواة القفز في الماء من على قمة الجرف الصخري في الحوض المائي وكذلك هواة الصيد البحري سواء بالصنارة او البندقية الخاصة بالصيد في مياه البحر', 'وادي الاثرون.jpg', '22'),
(16, 'Western Byzantine Church', 'الكنيسة البيزنطية الغربية', 'The western church in Al-Athron, which is one of two churches built during the Byzantine era in the red town \"Al-Athron\". They are distinguished by their decorative and structural richness, which is evident from the use of white marble in their columns an', 'الكنيسة الغربية في الأثرون، وهي واحدة من كنيستين بنيتا خلال العهد البيزنطي في البلدة الحمراء \"الأثرون\" وتتميزان بثراء زخرفي وانشائي يتضح من استخدام للرخام الأبيض في أعمدتها ونقوشها، ويعود تاريخهما إلى  اوائل القرن السادس الميلادي', 'كنيسة غربية.jpg', '22'),
(17, 'Eastern Byzantine Church', 'لكنيسة البيزنطية الشرقية', 'The Eastern Church is an ancient church dating back to the fifth century AD in the Lathron region on the coast of the Green Mountain. It is one of the churches that were built during the Byzantine Empire’s control over those areas. It is indicated that it', 'الكنيسة الشرقية هي كنيسة أثرية ترجع للقرن الخامس ميلادي في منطقة لاثرون على ساحل الجبل الأخضر و هي إحدى الكنائس التي شيدت أثناء سيطرة الأمبرطورية البيزنطية على تلك المناطق و الاشارة الى انها تقع الى الشرق من الكنيسة الغربية بمسافة 200 مترا ، وانها اقل حفظ', 'كنيسة شرقية.jpg', '22'),
(18, 'مسجد أبوبكر الصديق ', 'Abu Bakr Siddiq Mosque', 'One of the biggest mosques in all of Libya, It has its unique design and a wonderful look', 'من أكبر المساجد في كل أنحاء ليبيا ، يتميز بتصميمه الفريد وإطلالته الرائعة', 'مسجد مرج.jpg', '16'),
(19, 'Akakus Mountains', 'سلسلة جبال أكاكوس', 'Acacus Mountains, Acacus features landscapes that range from wind-colored sands to rock arches and huge stones to valleys.  The Arch of Avazagar is one of the most important places in the region. The lands of the region are characterized by a desert natur', 'جبال أكاكوس ، تتميز أكاكوس بمناظر طبيعية تتراوح من الرياح الرملية الملونة إلى الأقواس الصخرية والأحجار الضخمة إلى الوديان.  يعد قوس أفازاغار من أهم الأماكن في المنطقة وتتميز أراضي المنطقة بطبيعة صحراوية وبها العديد من الوديان والواحات.', 'اكاكوس.jpg', '28'),
(20, 'Shahat Sculpture Museum', 'متحف المنحوتات شحات', 'Shahat Museum or the Museum of Sculptures in Shahat in Libya.  It is a museum near the historical city of Cyrene. The museum includes about 150 artifacts that are considered among the most important antiquities found so far in the ancient city, if you exc', 'متحف شحات أو متحف المنحوتات في شحات في ليبيا. هو متحف قرب مدينة قوريني التاريخية، المتحف يضم نحو 150 قطعة أثرية تعتبر من أهم الآثار التي عثر عليها حتى الآن في المدينة الأثرية، إذا استثنيت الآثار التي اكتشفت في شحات والمناطق المحيطة بها والمعروضة في المتاح', 'متحف شحات.jpg', '21'),
(21, 'Cyrenaic effects', 'اثار قورينا', 'The ancient city of Cyrene mediates an archaeological and ancient value that attracts the attention of tourists from everywhere. It was founded by the Greeks in the sixth century BC, and it is one of five sites in Libya that UNESCO included in the World H', 'تتوسط المدينة الأثرية قورينا قيمة اثرية وعريقة تجذب انظار سياح من كل مكان، وقد أسسها الإغريق في القرن السادس قبل الميلاد، وهي واحدة من خمسة مواقع في ليبيا أدرجتها منظمة اليونسكو ضمن قائمة التراث العالمي قبل عقود.', 'اثار قورينا.jpg', '21'),
(22, 'Belgdir Palace', 'قصر بلغدير', 'Al-Shahat monuments have always attracted us with their beauty and antiquity.  One of its features is a palace called Qasr al-Ghadir, which is a historical landmark in the ruins of Shahat', 'لطالما جذبتنا آثار الشحات بجمالها وعراقتها. احد معالمها قصر يسمي بقصر بالغدير وهو معلم تاريخي في اثار شحات', 'قصر بلغدير.jpg', '21'),
(23, 'Ghadames Museum', 'متحف غدامس', 'The Ghadames Museum embodies the history of the jewel of the desert and is visited by most tourists, as a first stop before tours in the alleys, streets and neighborhoods of the old town.  Different historical periods, and expresses the arts of engineerin', 'متحف غدامس يجسد تاريخ جوهرة الصحراء و يقصده أغلب السياح، كمحطة أولى قبل الجولات داخل أزقة وشوارع وأحياء البلدة القديمة، فالمتحف الواقع داخل أسوار القلعة العتيقة، بالقرب من سوق الصناعات التقليدية، يتيح لزواره فرص الاطلاع على الحياة الثقافية والاجتماعية، وا', 'متحف غدامس.jpg', '9'),
(24, 'Persian eye', 'عين الفرس', 'The “Ain Al-Faras” or “Ghousuf” in the Ghadam dialect, as it is called by the people of Ghadames, is considered the most important source of water in the old city, and it is an artesian spring that was the main artery that gave life to the ancient city.  ', 'تعتبر “عين الفرس” أو “غصوف” باللهجة الغدامسية كما يطلق عليها أهالي غدامس، أهم مصادر المياه قديما بالمدينة القديمة، وهي نبع ارتوازي كان الشريان الرئيسي الذي أعطى الحياة للمدينة القديمة. ويقال أن “عين الفرس” يرجع تاريخها إلى 4000 سنة تقريبا وهي عين طبيعي قد', 'عين الفرس.jpg', '9'),
(25, 'Hawa Fteeh Cave', 'كهف هوا فطيح', 'Hawa Fteih is a large karstic cave located in Cyrenaica in northeastern Libya.[2]  This site has been of interest to research into African archaeological history and anatomically recent human prehistory because it was occupied during the Middle and Upper ', 'هوا فطيح هو كهف كارستي كبير يقع في برقة في شمال شرق ليبيا كان هذا الموقع ذا أهمية للبحث في التاريخ الأثري الأفريقي وعصور ما قبل التاريخ البشري الحديث تشريحًا لأنه كان محتلاً خلال العصر الحجري القديم الأوسط والعليا والعصر الحجري الأوسط والعصر الحجري الحديث', 'كهف الجبل الاخضر.jpg', '14'),
(26, 'Lake', 'بحيره', 'From the creativity of the Creator, Glory be to Him, in the heart of the African desert, specifically in Libya, and it is a beautiful lake that starts from 1/5 until it reaches a depth of 7 meters.  It is characterized by salinity, which makes drowning al', 'من إبداع الخالق سبحانه في قلب الصحراء الأفريقية تحديداً في ليبيا، وهي بحيرة جميلة يبدأها من 1/5 حتى يصل عمق 7 امتار.  تمتاز بالملوحة ما يجعل الغرق شيء شبه مستحيل.  وهي مقصد سياحي جذاب.  تبعد عن اقرب منطقة لهاحوالي  45 كيلو.\r\n', 'بحيرة قبر عون.jpg', '18'),
(27, 'Lebda Al-kubra Theatre', 'مسرح لبدة الكبرى', 'The semi-circular Leptis Theatre is considered one of the city’s archaeological landmarks. It was founded in the year 1 Frankish by Hannobal Rufus, one of the richest citizens of Leptis Theatre. The stage, and at both ends of the amphitheater on the stage', 'يعتبر مسرح لبدة النصف دائري من معالم المدينة الأثرية، حيث أسس عام 1 إفرنجي على يد (حنوبعل روفس) أحد أثرياء مواطني لبدة، ويتكون المسرح من مدرّج نصف دائري يستعمل لجلوس المشاهدين تتخلله فتحات الدخول والخروج وقد وُزعت بطريقة هندسية منتظمة بين تلك المدرجات وقب', 'مسرح لبدة.jpg', '19'),
(28, 'Sabratha Theatre', 'مسرح صبراتة', 'Sabratha Archaeological Theater It is located in the ancient city of Sabratha in western Libya, and the Sabratha archaeological theater is one of the examples expressing the architecture of Roman theaters.[2] Historical sources indicate that the theater, ', 'مسرح صبراتة الأثري يقع في مدينة صبراتة الأثرية غرب ليبيا، ويعد مسرح مدينة صبراتة الأثري من النماذج المعبرة عن معمار المسارح الرومانية.[2] وتشير المصادر التاريخية إلى أن المسرح الواقع على مسافة 230 متر عن شاطئ البحر، قد بني على الأرجح خلال عهد الإمبراطور ك', 'مسرح صبراتة.jpg', '20');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_email` varchar(255) NOT NULL,
  `employee_password` varchar(255) NOT NULL,
  `users_type` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_email`, `employee_password`, `users_type`) VALUES
(1, 'Employee', 'employee@gmail.com', '202cb962ac59075b964b07152d234b70', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(255) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_name_ar` varchar(255) NOT NULL,
  `hotel_location` varchar(255) NOT NULL,
  `hotel_img` varchar(255) NOT NULL,
  `hotel_city_id` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `hotel_name_ar`, `hotel_location`, `hotel_img`, `hotel_city_id`) VALUES
(3, 'Dar Gadamis Hotel', 'فندق دار غدامس', 'https://maps.app.goo.gl/zwp8DpLEvLP9TcyB9', 'Hotel1.jpg', 9),
(4, 'Ghadames Stars', ' نجوم غدامس', 'https://maps.app.goo.gl/MvqrKRkNWfqdL7Vz7', 'Hotel1.jpg', 9),
(5, 'Ben Yedder Hotel', ' فندق بن يدر', 'https://maps.app.goo.gl/Cdp8UAkMFo7FNtKw5', 'Hotel1.jpg', 9),
(6, 'Intermediate Hills Hotel', 'فندق التلال الوسيطة', 'https://maps.app.goo.gl/cKK4DKZKLraGH9Ma9?g_st=ic', 'Hotel1.jpg', 14),
(7, 'Valley references Sayyaf', 'فندق وادي امراجع السياف', 'https://maps.app.goo.gl/6kE46FDQ9N6apxVe7?g_st=ic', 'Hotel1.jpg', 14),
(8, 'Al-Abyar Palm Resort', 'منتجع النخيل الأبيار', 'https://maps.app.goo.gl/s9VUehopxtcLFDDCA?g_st=ic', 'Hotel1.jpg', 14),
(9, 'Resort Elkufe', 'منتجع الكوف', 'https://maps.app.goo.gl/6VCBwNukShYRNhNe6?g_st=ic', 'Hotel1.jpg', 15),
(10, 'Tourist Marg Hotel', 'فندق المرج السياحي', 'https://maps.app.goo.gl/JGpNQyT7Myor5pH19?g_st=ic', 'Hotel1.jpg', 16),
(11, 'Hmade eldrsi home', 'فندق حماد الدرسي', 'https://maps.app.goo.gl/VkFKfJSnuc77Z7eeA?g_st=ic', 'Hotel1.jpg', 16),
(12, 'Lebda Hotel', 'فندق لبدة', 'https://maps.app.goo.gl/wDw2UAGa4448Ps5Q9', 'Hotel1.jpg', 19),
(13, 'Seaside Hotel', 'فندق ضفاف البحر', 'https://maps.app.goo.gl/AW1Z1hNEYE3qyD3V6', 'Hotel1.jpg', 19),
(14, 'Severus Hotel', 'فندق سيفيروس', 'https://maps.app.goo.gl/jCwicTiFQYksFV6fA', 'Hotel1.jpg', 19),
(15, 'Maghreb Hotel', 'فندق المغرب العربي', 'https://maps.app.goo.gl/qNMVA8UoCUd8qXZA9', 'Hotel1.jpg', 20),
(16, 'Sabratha Jewel Tourist Village', 'قرية جوهرة صبراتة السياحية', 'https://maps.app.goo.gl/rakRcyQgBtQfqXsb9', 'Hotel1.jpg', 20),
(17, 'Proton Family Resort. Sabratha / Tellil', 'منتجع لبروتون العائلي. صبراته /تليل', 'https://maps.app.goo.gl/z7Hetvef2Phs3R487', 'Hotel1.jpg', 20),
(18, 'Shahat Tourist Resort', 'منتجع شحات السياحي', 'https://maps.app.goo.gl/2eLJz2yxg2uB7nt46 ', 'Hotel1.jpg', 21),
(19, 'Cyrene Tourist Hotel', 'فندق قورينا السياحي', 'https://maps.app.goo.gl/MjjZphkt9r1f5LnV6 ', 'Hotel1.jpg', 21),
(20, 'The tourist resort of Athroon', 'المنتجع السياحي بالأثرون', 'https://maps.app.goo.gl/mxE7jF8kKJ7Csj3y7?g_st=ic', 'Hotel1.jpg', 22),
(21, 'Luthorne Resort', 'منتجع لثرون السياحي', 'https://maps.app.goo.gl/N5tcNcRVXStnB4H16?g_st=ic', 'Hotel1.jpg', 22);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(255) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_title_ar` varchar(255) NOT NULL,
  `news_description` text NOT NULL,
  `news_description_ar` varchar(255) NOT NULL,
  `news_img` varchar(255) NOT NULL,
  `news_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_title_ar`, `news_description`, `news_description_ar`, `news_img`, `news_status`) VALUES
(4, 'News1', 'خبر1', 'A tourist guide to the distinctive and popular landmarks and cities in beloved Libya. A project submitted for a bachelor                ', 'دليل سياحي للمعالم والمدن المميزة والشعبية في ليبيا الحبيبة', 'Hotel1.jpg', 2),
(5, 'News2', 'خبر2', 'sdfv', 'دليل سياحي للمعالم والمدن المميزة والشعبية في ليبيا الحبيبة', 'Restaurant2.jpg', 1),
(6, 'News3', 'خبر3', 'sd', 'دليل سياحي للمعالم والمدن المميزة والشعبية في ليبيا الحبيبةشيسرسير', 'Ghadames2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(255) NOT NULL,
  `users_name` varchar(255) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_password` varchar(255) NOT NULL,
  `users_type` tinyint(255) NOT NULL,
  `type_city` tinyint(255) NOT NULL,
  `language` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_email`, `users_password`, `users_type`, `type_city`, `language`) VALUES
(2, 'nn', 'nn@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 1),
(3, 'user', 'user@user.user', '202cb962ac59075b964b07152d234b70', 1, 1, 1),
(4, 'Ali', 'ali@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 2, 2),
(6, 'samah', 'samah@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 1),
(9, 'hanan', 'hanan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 1),
(10, 'alaa', 'alaa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 1),
(12, 'Ahmed', 'ahmed@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 3, 1),
(13, 'Mohamed', 'mohamed@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 2, 1),
(14, 'mailk', 'aa@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 1),
(15, 'qwq', 'aq@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 1),
(16, 'kk', 'zx@xc.com', '202cb962ac59075b964b07152d234b70', 1, 3, 1),
(17, 'ahmed123', 'xz@gmailm.xx', '202cb962ac59075b964b07152d234b70', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`cafe_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `city_info`
--
ALTER TABLE `city_info`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cafe`
--
ALTER TABLE `cafe`
  MODIFY `cafe_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `city_info`
--
ALTER TABLE `city_info`
  MODIFY `info_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
