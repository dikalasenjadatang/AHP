-- phpMyAdmin SQL Dump
-- version 2.7.0-pl1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jul 02, 2013 at 10:28 AM
-- Server version: 5.0.18
-- PHP Version: 5.1.1
-- 
-- Database: `db_ahp`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL auto_increment,
  `nama` varchar(50) collate latin1_general_ci NOT NULL,
  `username` varchar(20) collate latin1_general_ci NOT NULL,
  `password` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` VALUES (1, 'Admin', 'admin', 'fe01ce2a7fbac8fafaed7c982a04e229');

-- --------------------------------------------------------

-- 
-- Table structure for table `alternatif`
-- 

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL auto_increment,
  `kode` varchar(10) collate latin1_general_ci NOT NULL,
  `nama` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_alternatif`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `alternatif`
-- 

INSERT INTO `alternatif` VALUES (1, 'A01', 'Hendry Sudjana');
INSERT INTO `alternatif` VALUES (2, 'A02', 'Mario Gerungan');
INSERT INTO `alternatif` VALUES (3, 'A03', 'Riko Hantono');
INSERT INTO `alternatif` VALUES (4, 'A04', 'Rizky Effendi');
INSERT INTO `alternatif` VALUES (5, 'A05', 'Rony Gunawan');

-- --------------------------------------------------------

-- 
-- Table structure for table `kriteria`
-- 

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL auto_increment,
  `kode` varchar(10) collate latin1_general_ci NOT NULL,
  `nama` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_kriteria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `kriteria`
-- 

INSERT INTO `kriteria` VALUES (1, 'F01', 'Shooting');
INSERT INTO `kriteria` VALUES (2, 'F02', 'Passing');
INSERT INTO `kriteria` VALUES (3, 'F03', 'Rebound');
INSERT INTO `kriteria` VALUES (4, 'F04', 'Dribbling');
INSERT INTO `kriteria` VALUES (6, 'F05', 'Fisik');

-- --------------------------------------------------------

-- 
-- Table structure for table `nilai_alternatif`
-- 

CREATE TABLE `nilai_alternatif` (
  `id_nilai_alternatif` int(11) NOT NULL auto_increment,
  `id_kriteria` int(11) NOT NULL,
  `id_alternatif_1` int(11) NOT NULL,
  `id_alternatif_2` int(11) NOT NULL,
  `nilai` float NOT NULL,
  PRIMARY KEY  (`id_nilai_alternatif`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=91 ;

-- 
-- Dumping data for table `nilai_alternatif`
-- 

INSERT INTO `nilai_alternatif` VALUES (90, 1, 4, 5, 3);
INSERT INTO `nilai_alternatif` VALUES (89, 1, 3, 5, 3);
INSERT INTO `nilai_alternatif` VALUES (88, 1, 3, 4, 2);
INSERT INTO `nilai_alternatif` VALUES (87, 1, 2, 5, 2);
INSERT INTO `nilai_alternatif` VALUES (86, 1, 2, 4, 3);
INSERT INTO `nilai_alternatif` VALUES (85, 1, 2, 3, 3);
INSERT INTO `nilai_alternatif` VALUES (84, 1, 1, 5, 1);
INSERT INTO `nilai_alternatif` VALUES (83, 1, 1, 4, 2);
INSERT INTO `nilai_alternatif` VALUES (82, 1, 1, 3, 5);
INSERT INTO `nilai_alternatif` VALUES (81, 1, 1, 2, 2);
INSERT INTO `nilai_alternatif` VALUES (11, 2, 1, 2, 2);
INSERT INTO `nilai_alternatif` VALUES (12, 2, 1, 3, 2);
INSERT INTO `nilai_alternatif` VALUES (13, 2, 1, 5, 2);
INSERT INTO `nilai_alternatif` VALUES (14, 2, 2, 3, 4);
INSERT INTO `nilai_alternatif` VALUES (15, 2, 2, 4, 3);
INSERT INTO `nilai_alternatif` VALUES (16, 2, 2, 5, 3);
INSERT INTO `nilai_alternatif` VALUES (17, 2, 3, 5, 2);
INSERT INTO `nilai_alternatif` VALUES (18, 2, 3, 4, 6);
INSERT INTO `nilai_alternatif` VALUES (19, 2, 4, 5, 2);
INSERT INTO `nilai_alternatif` VALUES (20, 2, 1, 4, 3);
INSERT INTO `nilai_alternatif` VALUES (21, 3, 1, 2, 3);
INSERT INTO `nilai_alternatif` VALUES (22, 3, 1, 3, 3);
INSERT INTO `nilai_alternatif` VALUES (23, 3, 1, 4, 3);
INSERT INTO `nilai_alternatif` VALUES (24, 3, 1, 5, 2);
INSERT INTO `nilai_alternatif` VALUES (25, 3, 2, 3, 3);
INSERT INTO `nilai_alternatif` VALUES (26, 3, 2, 4, 2);
INSERT INTO `nilai_alternatif` VALUES (27, 3, 2, 5, 2);
INSERT INTO `nilai_alternatif` VALUES (28, 3, 3, 4, 2);
INSERT INTO `nilai_alternatif` VALUES (29, 3, 3, 5, 2);
INSERT INTO `nilai_alternatif` VALUES (30, 3, 4, 5, 8);
INSERT INTO `nilai_alternatif` VALUES (31, 4, 1, 2, 4);
INSERT INTO `nilai_alternatif` VALUES (32, 4, 1, 3, 4);
INSERT INTO `nilai_alternatif` VALUES (33, 4, 1, 4, 5);
INSERT INTO `nilai_alternatif` VALUES (34, 4, 1, 5, 3);
INSERT INTO `nilai_alternatif` VALUES (35, 4, 2, 3, 7);
INSERT INTO `nilai_alternatif` VALUES (36, 4, 2, 4, 7);
INSERT INTO `nilai_alternatif` VALUES (37, 4, 2, 5, 7);
INSERT INTO `nilai_alternatif` VALUES (38, 4, 3, 4, 3);
INSERT INTO `nilai_alternatif` VALUES (39, 4, 3, 5, 5);
INSERT INTO `nilai_alternatif` VALUES (40, 4, 4, 5, 3);
INSERT INTO `nilai_alternatif` VALUES (41, 6, 1, 2, 2);
INSERT INTO `nilai_alternatif` VALUES (42, 6, 1, 3, 2);
INSERT INTO `nilai_alternatif` VALUES (43, 6, 1, 4, 2);
INSERT INTO `nilai_alternatif` VALUES (44, 6, 1, 5, 2);
INSERT INTO `nilai_alternatif` VALUES (45, 6, 2, 3, 3);
INSERT INTO `nilai_alternatif` VALUES (46, 6, 2, 4, 5);
INSERT INTO `nilai_alternatif` VALUES (47, 6, 2, 5, 3);
INSERT INTO `nilai_alternatif` VALUES (48, 6, 3, 4, 3);
INSERT INTO `nilai_alternatif` VALUES (49, 6, 3, 5, 2);
INSERT INTO `nilai_alternatif` VALUES (50, 6, 4, 5, 3);
INSERT INTO `nilai_alternatif` VALUES (80, 0, 4, 5, 1);
INSERT INTO `nilai_alternatif` VALUES (79, 0, 3, 5, 1);
INSERT INTO `nilai_alternatif` VALUES (78, 0, 3, 4, 1);
INSERT INTO `nilai_alternatif` VALUES (77, 0, 2, 5, 1);
INSERT INTO `nilai_alternatif` VALUES (76, 0, 2, 4, 1);
INSERT INTO `nilai_alternatif` VALUES (75, 0, 2, 3, 1);
INSERT INTO `nilai_alternatif` VALUES (74, 0, 1, 5, 1);
INSERT INTO `nilai_alternatif` VALUES (73, 0, 1, 4, 1);
INSERT INTO `nilai_alternatif` VALUES (72, 0, 1, 3, 1);
INSERT INTO `nilai_alternatif` VALUES (71, 0, 1, 2, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `nilai_kriteria`
-- 

CREATE TABLE `nilai_kriteria` (
  `id_nilai_kriteria` int(11) NOT NULL auto_increment,
  `id_kriteria_1` int(11) NOT NULL,
  `id_kriteria_2` int(11) NOT NULL,
  `nilai` float NOT NULL,
  PRIMARY KEY  (`id_nilai_kriteria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `nilai_kriteria`
-- 

INSERT INTO `nilai_kriteria` VALUES (1, 1, 2, 5);
INSERT INTO `nilai_kriteria` VALUES (2, 1, 3, 2);
INSERT INTO `nilai_kriteria` VALUES (3, 1, 4, 4);
INSERT INTO `nilai_kriteria` VALUES (4, 1, 6, 3);
INSERT INTO `nilai_kriteria` VALUES (5, 2, 3, 2);
INSERT INTO `nilai_kriteria` VALUES (6, 2, 4, 2);
INSERT INTO `nilai_kriteria` VALUES (7, 2, 6, 2);
INSERT INTO `nilai_kriteria` VALUES (8, 3, 4, 3);
INSERT INTO `nilai_kriteria` VALUES (9, 3, 6, 3);
INSERT INTO `nilai_kriteria` VALUES (10, 4, 6, 2);
