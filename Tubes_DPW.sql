CREATE TABLE `customer` (
  `customer_id` int PRIMARY KEY,
  `customer_name` VARCHAR(100),
  `customer_phone` VARCHAR(20),
  `customer_address` VARCHAR(50),
  `membership` VARCHAR(30)
);

CREATE TABLE `Employee` (
  `employee_id` int PRIMARY KEY,
  `employee_name` VARCHAR(100),
  `employee_phone` VARCHAR(20),
  `employee_address` VARCHAR(50),
  `shift` VARCHAR(25)
);

CREATE TABLE `Service` (
  `service_id` int PRIMARY KEY,
  `service_name` VARCHAR(100),
  `price` int
);

CREATE TABLE `Transaction` (
  `transaction_id` int PRIMARY KEY,
  `transaction_date` VARCHAR(25),
  `employee_id` int,
  `customer_id` int,
  `service_id` int,
  `quantity` int DEFAULT 1,
  `request` VARCHAR(30)
);

CREATE TABLE `Promo` (
  `promo_id` int PRIMARY KEY,
  `promo_name` VARCHAR(100),
  `promo_desc` VARCHAR(50),
  `start_date` VARCHAR(25),
  `end_date` VARCHAR(25),
  `amount` VARCHAR(25)
);

CREATE TABLE `Bill` (
  `bill_id` int PRIMARY KEY,
  `bill_date` VARCHAR(25),
  `employee_id` int,
  `transaction_id` int,
  `promo_id` int,
  `total_price` int
);
