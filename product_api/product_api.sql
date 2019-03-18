
--
-- Database: `product_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `Price` float(7,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Name`, `Price`) VALUES
(1, 'Book1', 33.25),
(2, 'Book2', 58.75),
(3, 'Book3', 63.25),
(4, 'Book4', 44.34),
(5, 'Book5', 49.50),
(6, 'Book6', 50.50),
(7, 'Book7', 65.35);
COMMIT;

