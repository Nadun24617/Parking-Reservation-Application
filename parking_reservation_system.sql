-- Database: `parking reservation system`

CREATE DATABASE IF NOT EXISTS `parking reservation system`;
USE `parking reservation system`;

-- --------------------------------------------------------
-- Table structure for table `reservations`
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_number` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `slot_number` varchar(10) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Insert sample data into `users` table
-- --------------------------------------------------------

-- Note: Use PHP or another method to generate a hashed password.
-- Example: password_hash('password123', PASSWORD_BCRYPT);

INSERT INTO `users` (`email`, `password`) VALUES
('test@example.com', '$2y$10$eW5Wc5VOM5m2oWx5Wm1wZ.vZ9F0t9GfpTkItZJ/2/j1zM1FXplU5G'); -- 'password123' hashed

-- --------------------------------------------------------
-- Insert sample data into `reservations` table
-- --------------------------------------------------------

INSERT INTO `reservations` (`vehicle_number`, `customer_name`, `mobile_number`, `vehicle_type`, `slot_number`, `email_address`) VALUES
('KD-4469', 'nadun', '0719634646', 'Car', '1', 'nadunwasala123@gmail.com');
