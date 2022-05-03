/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50651
 Source Host           : localhost:3306
 Source Schema         : koalas

 Target Server Type    : MySQL
 Target Server Version : 50651
 File Encoding         : 65001

 Date: 03/05/2022 11:58:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for habitat
-- ----------------------------
DROP TABLE IF EXISTS `habitat`;
CREATE TABLE `habitat`  (
  `HabitatId` int(11) NOT NULL,
  `coordinates` geometry NOT NULL,
  `Name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Content` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`HabitatId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of habitat
-- ----------------------------

-- ----------------------------
-- Table structure for ko_base
-- ----------------------------
DROP TABLE IF EXISTS `ko_base`;
CREATE TABLE `ko_base`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `habitat_id` int(11) NULL DEFAULT NULL,
  `habitat` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `like` int(11) NULL DEFAULT 0,
  `up_time` datetime NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ko_base
-- ----------------------------
INSERT INTO `ko_base` VALUES (29, 'uploads/202205012029495977.jpg', 7, 'Great Sandy Conservation Park', 'test0', 19, '2022-05-01 20:29:49', 1);
INSERT INTO `ko_base` VALUES (31, 'uploads/202205012100123277.jpg', 1, 'Lamington National Park', 'test1', 15, '2022-05-01 21:00:12', 1);
INSERT INTO `ko_base` VALUES (33, 'uploads/202205012100356097.jpg', 3, 'Noosa National Park', 'test3', 12, '2022-05-01 21:00:35', 0);
INSERT INTO `ko_base` VALUES (34, 'uploads/202205012100494985.jpg', 4, 'Glass House Mountains National Park', 'test4', 3, '2022-05-01 21:00:49', 0);
INSERT INTO `ko_base` VALUES (35, 'uploads/202205012101006150.jpg', 4, 'Glass House Mountains National Park', 'test5', 14, '2022-05-01 21:01:00', 1);
INSERT INTO `ko_base` VALUES (36, 'uploads/202205012101179663.jpg', 4, 'Glass House Mountains National Park', 'test6', 6, '2022-05-01 21:01:17', 1);

-- ----------------------------
-- Table structure for ko_habitat
-- ----------------------------
DROP TABLE IF EXISTS `ko_habitat`;
CREATE TABLE `ko_habitat`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ko_habitat
-- ----------------------------
INSERT INTO `ko_habitat` VALUES (1, 'Lamington National Park', '153.1573', '-28.2438', 'Lush rainforests, ancient trees, spectacular views, extensive walking tracks, exceptional ecological importance and natural beauty make this Gondwana Rainforests of Australia World Heritage Area an outstanding place to visit.');
INSERT INTO `ko_habitat` VALUES (2, 'Springbrook National Park', '153.2881', '-28.1993', 'Spectacular waterfalls, lush rainforest, ancient trees, impressive views, exceptional ecological importance and natural beauty makes Springbrook an outstanding place to visit. Springbrook National Park is part of the Gondwana Rainforests of Australia World Heritage Area(external link), one of Queensland’s five World Heritage properties and part of the World Heritage Family.');
INSERT INTO `ko_habitat` VALUES (3, 'Noosa National Park', '153.0918', '-26.4405', 'Noosa National Park features the spectacular coastal scenery of Noosa Headland, and nearby areas around Lake Weyba, Peregian and Coolum. Surrounded by development, this park is a wildlife sanctuary, protecting beautiful stands of eucalypt forest, woodland, melaleuca wetland, colourful wallum heathland and pockets of dense vine-strewn rainforest.\r\n');
INSERT INTO `ko_habitat` VALUES (4, 'Glass House Mountains National Park', '152.9431', '-26.9498', 'The craggy peaks of the Glass House Mountains tower above the surrounding landscape. They are so significant that they are listed on the Queensland and National Heritage Register as a landscape of national significance.\r\n\r\nWalking tracks lead through a variety of open forests to lookouts with panoramic views of the mountains. You can walk around the base of Mount Tibrogargan to see its profile from many angles and to the top of Mount Ngungun for spectacular views of nearby peaks and the surrounding landscape.\r\n\r\nThe Yul-yan-man track is accessible from Beerburrum and Tibrogargan trailheads. It offers a Grade 5 walk for people with rock scrambling skills.\r\n\r\nThere are other challenging summit routes and climbing sites for experienced rockclimbers and abseilers.\r\n');
INSERT INTO `ko_habitat` VALUES (5, 'Bunya Mountains National Park', '151.5348', '-26.8194', 'Rainforest-clad peaks shelter the largest stand of ancient bunya pines in the world. Discover cool mountains, rainforests and waterfalls, unique range-top grasslands, panoramic views, colourful birdlife and enthralling stories of times long ago.');
INSERT INTO `ko_habitat` VALUES (6, 'Carnarvon National Park', '148.0861', '-25.0361', 'Carnarvon National Park is located in the Southern Brigalow Belt bioregion in the Maranoa Region in Central Queensland, Australia. The park is 593 km northwest of Brisbane.\r\n');
INSERT INTO `ko_habitat` VALUES (7, 'Great Sandy Conservation Park', '153.1454', '-25.2471', 'The park features untouched beaches, large sand dunes, heathlands, rainforests, swamps, creeks, freshwater lakes and mangrove forests.\r\n\r\nGreat Sandy National Park is divided into two sections. The Cooloola Recreation Area section is situated on the coast between Noosa Heads in the south and Rainbow Beach in the north and covers 18,400 hectares (45,000 acres). The K\'gari (Fraser Island) section encompasses almost all of K\'gari, the world\'s largest sand island, which is situated north of Rainbow Beach, covering 56,000 hectares (140,000 acres).');
INSERT INTO `ko_habitat` VALUES (8, 'Venman Bushland National Park', '153.1992', '-27.6337', 'Venman Bushland National Park has been a popular Brisbane recreation area for decades. It was originally private property—owned by local Jack Burnett Venman (1911–1994). Today, this 415ha park forms part of the Koala Bushland Coordinated Conservation Area (PDF, 461KB) and is managed by the Queensland Parks and Wildlife Service.');
INSERT INTO `ko_habitat` VALUES (9, 'Daisy Hill', '153.1605', '-27.6225', 'The bushland area between Daisy Hill and Redland Bay is an important koala habitat, with exactly the right conditions to support a thriving community. Fittingly, Daisy Hill is home to an educational Koala Centre. At the Koala Centre, you can see koalas up close and learn all about these unique Australian marsupials.\r\n');

-- ----------------------------
-- Table structure for ko_team
-- ----------------------------
DROP TABLE IF EXISTS `ko_team`;
CREATE TABLE `ko_team`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `duties` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ko_team
-- ----------------------------
INSERT INTO `ko_team` VALUES (1, '111', '222', 'fadfa', 'uploads/202205012012188265.jpg');
INSERT INTO `ko_team` VALUES (2, '111', '222', 'aaa', 'uploads/202205012011339324.jpg');
INSERT INTO `ko_team` VALUES (4, 'zzz', 'zzz', 'zzz', 'uploads/202205012231286223.jpg');

-- ----------------------------
-- Table structure for koalapoint
-- ----------------------------
DROP TABLE IF EXISTS `koalapoint`;
CREATE TABLE `koalapoint`  (
  `PointId` int(11) NOT NULL,
  `Longitude` decimal(11, 8) NOT NULL,
  `Latitude` decimal(11, 8) NOT NULL,
  `HabitatHabitatId` int(11) NOT NULL,
  PRIMARY KEY (`PointId`) USING BTREE,
  INDEX `IX_FK_HabitatKoalaPoint`(`HabitatHabitatId`) USING BTREE,
  CONSTRAINT `FK_HabitatKoalaPoint` FOREIGN KEY (`HabitatHabitatId`) REFERENCES `habitat` (`HabitatId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of koalapoint
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
