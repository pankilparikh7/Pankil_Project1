--
-- Dumping data for table `bookinventory`
--

INSERT INTO `bookinventory` (`id`, `title`, `author`, `quantity`, `image`, `payment`) VALUES
(1, 'Object Oriented JS', 'Kumar Sharma', 5, 'data.png', ''),
(2, 'Data Structure Algorithms', 'Adrian Mejia', 3, 'ds.png', ''),
(3, 'PHP7', 'Colin O\'Dell', 4, 'php.png', ''),
(4, 'Learn PHP', 'Jammie Chen', 6, 'php1.png', ''),
(5, 'Learning Web Design', 'Jannifer', 8, 'wb.png', '');

--
-- Dumping data for table `bookinventoryorder`
--

INSERT INTO `bookinventoryorder` (`C_name`, `title`, `number`, `address`, `email`) VALUES
('Pankil', 'Data Structure Algorithms', '', '131 University Avenue\r\n802', 'pankilparikh7@gmail.com'),
('Pankil', 'PHP7', '', '131 University Avenue\r\n802', 'pankilparikh7@gmail.com'),
('Pankil', '', '5483332298', '131 University Avenue\r\n802', 'pankilparikh7@gmail.com'),
('Pankil', 'PHP7', '5483332298', '131 University Avenue\r\n802', 'pankilparikh7@gmail.com'),
('Pankil', 'Learning Web Design', '5483332298', '131 University Avenue\r\n802', 'pankilparikh7@gmail.com'),
('Pankil', 'Learning Web Design', '5483332298', '131 University Avenue\r\n802', 'pankilparikh7@gmail.com'),
('Pankil', 'Learning Web Design', '5483332298', '131 University Avenue\r\n802', 'Pparikh5452@conestogac.on.ca'),
('Pankil', '', '5483332298', '131 University Avenue\r\n802', 'Pparikh5452@conestogac.on.ca'),
('Pankil', '', '5483332298', '131 University Avenue\r\n802', 'Pparikh5452@conestogac.on.ca'),
('Pankil', 'Learning Web Design', '5483332298', '131 University Avenue\r\n802', 'Pparikh5452@conestogac.on.ca');