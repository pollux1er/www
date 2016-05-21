-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 13 Avril 2016 à 23:23
-- Version du serveur :  5.6.17-log
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `canteen`
--

-- --------------------------------------------------------

--
-- Structure de la table `account_info`
--

CREATE TABLE IF NOT EXISTS `account_info` (
  `id_user` int(11) NOT NULL,
  `dessert` int(11) DEFAULT NULL,
  `entree` int(11) DEFAULT NULL,
  `repas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `account_info`
--

INSERT INTO `account_info` (`id_user`, `dessert`, `entree`, `repas`) VALUES
(1005, 5, 5, 20),
(1007, 5, 5, 20),
(1016, 5, 5, 20),
(1019, 5, 5, 20),
(1022, 5, 5, 20),
(1023, 5, 5, 20),
(1024, 5, 5, 20),
(1025, 5, 5, 20),
(1033, 5, 5, 20),
(1035, 5, 5, 20),
(1038, 5, 5, 20),
(1039, 5, 5, 20),
(1041, 5, 5, 20),
(1044, 5, 5, 20),
(1046, 5, 5, 20),
(1048, 5, 5, 20),
(1055, 5, 5, 20),
(1059, 5, 5, 20),
(1065, 5, 5, 20),
(1066, 5, 5, 20),
(1070, 5, 5, 20),
(1095, 5, 5, 20),
(1098, 5, 5, 20),
(1101, 5, 5, 20),
(1102, 5, 5, 20),
(1104, 5, 5, 20),
(1105, 5, 5, 20),
(1106, 5, 5, 20),
(1109, 5, 5, 20),
(1110, 5, 5, 20),
(1111, 5, 5, 20),
(1112, 5, 5, 20),
(1113, 5, 5, 20),
(1114, 5, 5, 20),
(1116, 5, 5, 20),
(1120, 5, 5, 20),
(1122, 5, 5, 20),
(1126, 5, 5, 20),
(1127, 5, 5, 20),
(1129, 5, 5, 20),
(1130, 5, 5, 20),
(1132, 5, 5, 20),
(1133, 5, 5, 20),
(1134, 5, 5, 20),
(1135, 5, 5, 20),
(1138, 5, 5, 20),
(1141, 5, 5, 20),
(1143, 5, 5, 20),
(1144, 5, 5, 20),
(1145, 5, 5, 20),
(1146, 5, 5, 20),
(1147, 5, 5, 20),
(1148, 5, 5, 20),
(1149, 5, 5, 20),
(1150, 5, 5, 20),
(1151, 5, 5, 20),
(1153, 5, 5, 20),
(1156, 5, 5, 20),
(1157, 5, 5, 20),
(1159, 5, 5, 20),
(1160, 5, 5, 20),
(1161, 5, 5, 20),
(1162, 5, 5, 20),
(1166, 5, 5, 20),
(1168, 5, 5, 20),
(1169, 5, 5, 20),
(1170, 5, 5, 20),
(1171, 5, 5, 20),
(1173, 5, 5, 20),
(1174, 5, 5, 20),
(1177, 5, 5, 20),
(1178, 5, 5, 20),
(1180, 5, 5, 20),
(1182, 5, 5, 20),
(1183, 5, 5, 20),
(1184, 5, 5, 20),
(1185, 5, 5, 20),
(1186, 5, 5, 20),
(1187, 5, 5, 20),
(1188, 5, 5, 20),
(1190, 5, 5, 20),
(1191, 5, 5, 20),
(1192, 5, 5, 20),
(1193, 5, 5, 20),
(1194, 5, 5, 20),
(1195, 5, 5, 20),
(1196, 5, 5, 20),
(1199, 5, 5, 20);

-- --------------------------------------------------------

--
-- Structure de la table `info_user`
--

CREATE TABLE IF NOT EXISTS `info_user` (
  `PIN` int(11) NOT NULL,
  `nom` text,
  `prenom` text,
  `id_user` int(11) DEFAULT NULL,
  `status` text,
  PRIMARY KEY (`PIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `info_user`
--

INSERT INTO `info_user` (`PIN`, `nom`, `prenom`, `id_user`, `status`) VALUES
(1005, 'MEYONG SEH', 'Paul Henri', 14860, 'Perenco Rio del Rey'),
(1007, 'GRASSER', 'Laurent', 9352, 'Perenco Rio del Rey'),
(1016, 'YUCEL', 'Ozhan', 941, 'Perenco Rio del Rey'),
(1019, 'DEWEERDT', 'Jérôme', 8359, 'Perenco Rio del Rey'),
(1022, 'MESSINA BOMBA', 'Nicolas GaÃ«l StÃ©phane', 14898, 'Perenco Rio del Rey'),
(1023, 'DIFFO KUETE', 'Ange', 9348, 'Perenco Rio del Rey'),
(1024, 'TEGUE MANGAH', 'Melaine', 9293, 'Perenco Rio del Rey'),
(1025, 'TCHATCHOUANG', 'Ronald Magloire', 11954, 'Perenco Rio del Rey'),
(1033, 'DEFO FODJOU', 'Peggy Steve', 12129, 'Perenco Rio del Rey'),
(1035, 'CHARLIER', 'Stéphane', 6684, 'Perenco Rio del Rey'),
(1038, 'KUIATE', 'Christian HervÃ©', 14054, 'Perenco Rio del Rey'),
(1039, 'DIMBONG BABOULE', 'Trésor', 13903, 'Perenco Rio del Rey'),
(1041, 'SONKIN TENESSONG', 'Jean De Laure', 10201, 'Perenco Rio del Rey'),
(1044, 'CHERNENKOV', 'Sergey', 9542, 'Perenco Rio del Rey'),
(1046, 'PYM', 'Bolleri Donatien', 14457, 'Perenco Rio del Rey'),
(1048, 'BALOMOG MBIDA', 'Jaurès Ibert', 14455, 'Perenco Rio del Rey'),
(1055, 'FEUSSI TALOM', 'Armand', 8453, 'Perenco Rio del Rey'),
(1059, 'KAMDE WONFACK', 'Joseph', 8487, 'Perenco Rio del Rey'),
(1065, 'BEMBATOUM', 'Alexandra Alima', 9327, 'Perenco Rio del Rey'),
(1066, 'NJONKOU NJANJO', 'Jérémie', 9076, 'Perenco Rio del Rey'),
(1070, 'NJAYOU', 'Ibrahim', 9073, 'Perenco Rio del Rey'),
(1095, 'BAMIS', 'François', 9309, 'Perenco Rio del Rey'),
(1098, 'MAHE', 'Patrick', 3406, 'Perenco Rio del Rey'),
(1101, 'BISSIKIN', 'Diane Elvire', 9353, 'Barakat'),
(1102, 'SEUGUE MEDO', 'Georges', 9093, 'Perenco Rio del Rey'),
(1104, 'KWEM ESSOME', 'Victor', 9021, 'Perenco Rio del Rey'),
(1105, 'FONKOUA FONKOUA', 'Julius', 9346, 'Perenco Rio del Rey'),
(1106, 'MENGUE MENGUE', 'Franck Paul', 8697, 'Perenco Cameroon'),
(1109, 'SIMEU', 'Daniel', 9095, 'Perenco Rio del Rey'),
(1110, 'BOUTCHOUANG', 'Jacob', 8962, 'Perenco Rio del Rey'),
(1111, 'EYOUM', 'Zéphyrin', 8995, 'Perenco Rio del Rey'),
(1112, 'NTUNGWE ABOA', 'Sandrine', 8711, 'Perenco Rio del Rey'),
(1113, 'TAO', 'Michel Claye', 9316, 'Perenco Rio del Rey'),
(1114, 'JONGO MOUDJONGUE', 'Nadine', 10259, 'Cible RH'),
(1116, 'HAMADOU KOUDOBONG', 'Zourmba', 9003, 'Perenco Rio del Rey'),
(1120, 'TCHOPBA', 'Alphonse', 9108, 'Perenco Rio del Rey'),
(1122, 'DJOMOU', 'Samuel', 8970, 'Perenco Rio del Rey'),
(1126, 'ADAMI', 'Jean-Pierre', 12551, 'FORTIORI'),
(1127, 'KOUEKO NEMANGOU', 'Emmanuel Simplice', 8491, 'Perenco Rio del Rey'),
(1129, 'PASSOMBEN BAKAK', 'Jules', 14308, 'EMPLOI SERVICE'),
(1130, 'SIAKO', 'Bernard', 9094, 'Perenco Rio del Rey'),
(1132, 'MBONGUE', 'Paul', 9038, 'Perenco Rio del Rey'),
(1133, 'ASSONGOU NGADANG', 'Michel', 8942, 'Perenco Rio del Rey'),
(1134, 'BILEBEL', 'Marcel', 12913, 'Perenco Rio del Rey'),
(1135, 'DASSI', 'Sylvestre', 455, 'Perenco Cameroon'),
(1138, 'NGANGA MBAMBU', 'Pitshou', 5005, 'Perenco Rio del Rey'),
(1141, 'IBOCK', 'Martin', 9005, 'Perenco Rio del Rey'),
(1143, 'LEONARD', 'Damien', 9722, 'Perenco Rio del Rey'),
(1144, 'NYAMSI', 'Paul', 9084, 'Perenco Rio del Rey'),
(1145, 'TCHATO TCHOUNKE', 'Dynis', 9289, 'Perenco Rio del Rey'),
(1146, 'ROCH', 'Stéphane', 12556, 'Perenco Rio del Rey'),
(1147, 'NYEMB', 'Bernard', 9085, 'Perenco Rio del Rey'),
(1148, 'PREVOST', 'Gwendoline', 8366, 'Perenco Rio del Rey'),
(1149, 'NGATSING', 'Yves', 9666, 'Perenco Rio del Rey'),
(1150, 'DOUALLA SILIKI', 'Yves', 8975, 'Perenco Rio del Rey'),
(1151, 'BANDELECK', 'Joachim', 9189, 'Bollore Logistics'),
(1153, 'YANGA', 'Médard Bienvenu', 487, 'Perenco Cameroon'),
(1156, 'TAAGO KAYEM', 'Véronique', 9097, 'Perenco Rio del Rey'),
(1157, 'HIEHIES', 'Jonas', 9004, 'Perenco Rio del Rey'),
(1159, 'MATIMBA SALLE', 'Rodolphe', 9236, 'Bollore Logistics'),
(1160, 'TCHOUGNIA', 'Michel', 9111, 'Perenco Rio del Rey'),
(1161, 'NJUEMOU SADJOUE', 'Cyrus Hervé', 9165, 'CEGELEC'),
(1162, 'MENGUE NDZIE', 'Pascaline', 9047, 'Perenco Rio del Rey'),
(1166, 'NENKAM', 'Boniface', 9066, 'Perenco Rio del Rey'),
(1168, 'ABDOURAMAN', 'Sadou', 4244, 'Perenco Cameroon'),
(1169, 'EBOGO', 'Serge Christian', 8977, 'Perenco Rio del Rey'),
(1170, 'DIPPAH YAH', 'Cécile Julienne', 8965, 'Perenco Rio del Rey'),
(1171, 'YUCEL', 'Asli', 13216, 'Barakat'),
(1173, 'MBOUMA SIK', 'Martial', 9153, 'CEGELEC'),
(1174, 'BANNES', 'Xavier', 520, 'Perenco Rio del Rey'),
(1177, 'BILONG', 'Jean Emmanuel', 451, 'Perenco Cameroon'),
(1178, 'FOH MEFAN', 'Joseph Nathalie Joëlle', 9000, 'Perenco Rio del Rey'),
(1180, 'ETCHOME', 'Adolphe', 8990, 'Perenco Rio del Rey'),
(1182, 'SANAMA', 'Marielle', 9521, 'Perenco Rio del Rey'),
(1183, 'ENOUMEDI', 'Nadine Fidèle', 8985, 'Perenco Rio del Rey'),
(1184, 'KANGA ZE', 'Roland', 9013, 'Perenco Rio del Rey'),
(1185, 'NKOMBA', 'Joseph', 9078, 'Perenco Rio del Rey'),
(1186, 'EZE', 'Georges', 8996, 'Perenco Rio del Rey'),
(1187, 'NGATCHA', 'Yannick', 9404, 'Perenco Rio del Rey'),
(1188, 'TAMA EYEBE', 'Thérèse Nicole', 9100, 'Perenco Rio del Rey'),
(1190, 'BELL YEPP', 'Raymond', 3132, 'Perenco Cameroon'),
(1191, 'JACQUELOT', 'Nicolas', 12544, 'Perenco Rio del Rey'),
(1192, 'ELONG EBELE', 'Jean Albert', 8982, 'Perenco Rio del Rey'),
(1193, 'ANOUBOUWO DONGMO', 'Alain Merlin', 12497, 'NUMERIX'),
(1194, 'YESSI', 'Joseph', 9121, 'Perenco Rio del Rey'),
(1195, 'NGO NGWE NTAMACK', 'Prudence', 8504, 'Perenco Rio del Rey'),
(1196, 'NGALLE NDONG', 'Roudolph', 9068, 'Perenco Rio del Rey'),
(1199, 'NOUTAMO', 'Jean Gilbert', 9082, 'Perenco Rio del Rey');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
