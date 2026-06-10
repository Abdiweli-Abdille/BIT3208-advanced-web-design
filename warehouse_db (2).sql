-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2026 at 10:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `record_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`log_id`, `user_id`, `action`, `description`, `table_name`, `record_id`, `ip_address`, `created_at`) VALUES
(1, 1, 'Login to system', NULL, 'users', 1, '127.0.0.1', '2026-03-15 05:10:00'),
(2, 1, 'Added new product', NULL, 'products', 31, '127.0.0.1', '2026-03-15 05:20:00'),
(3, 2, 'Updated product price', NULL, 'products', 12, '127.0.0.1', '2026-03-15 05:25:00'),
(4, 1, 'Created new order', NULL, 'orders', 21, '127.0.0.1', '2026-03-15 05:40:00'),
(5, 3, 'Generated invoice', NULL, 'invoices', 17, '127.0.0.1', '2026-03-15 06:00:00'),
(6, 2, 'Updated order status', NULL, 'orders', 18, '127.0.0.1', '2026-03-15 06:10:00'),
(7, 1, 'Added new supplier', NULL, 'suppliers', 9, '127.0.0.1', '2026-03-15 06:20:00'),
(8, 3, 'Updated stock quantity', NULL, 'products', 5, '127.0.0.1', '2026-03-15 06:35:00'),
(9, 2, 'Created invoice item', NULL, 'invoice_items', 4, '127.0.0.1', '2026-03-15 06:50:00'),
(10, 1, 'Logged out', NULL, 'users', 1, '127.0.0.1', '2026-03-15 07:00:00'),
(11, 1, 'Database Backup Created', NULL, 'backups', 0, '::1', '2026-03-15 12:05:47'),
(12, 1, 'Created order ORD-OUT-010', NULL, 'orders', 16, '::1', '2026-03-16 22:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `ai_predictions`
--

CREATE TABLE `ai_predictions` (
  `prediction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `robot_type` enum('inventory','sales','order','monitoring') NOT NULL,
  `predicted_demand` int(11) DEFAULT NULL,
  `recommended_reorder` int(11) DEFAULT NULL,
  `confidence_score` decimal(5,2) DEFAULT NULL,
  `trend` enum('increasing','stable','decreasing') DEFAULT 'stable',
  `analysis_notes` text DEFAULT NULL,
  `period_start` date NOT NULL,
  `period_end` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ai_predictions`
--

INSERT INTO `ai_predictions` (`prediction_id`, `product_id`, `robot_type`, `predicted_demand`, `recommended_reorder`, `confidence_score`, `trend`, `analysis_notes`, `period_start`, `period_end`, `created_at`) VALUES
(1, 1, 'inventory', 25, 30, 87.50, 'stable', 'Based on 6-month moving average. Demand remains stable with slight seasonal variation. Recommend maintaining current stock levels.', '2026-01-29', '2026-02-28', '2026-02-28 14:18:18'),
(2, 1, 'sales', 25, NULL, 91.20, 'stable', 'Laptop sales consistent with corporate procurement cycles. Peak expected Q1 and Q3.', '2026-01-29', '2026-02-28', '2026-02-28 14:18:18'),
(3, 8, 'inventory', 150, 200, 95.00, 'stable', 'Paper consumption is predictable. Monthly demand ~150 reams. Recommend bulk purchasing for cost savings.', '2026-01-29', '2026-02-28', '2026-02-28 14:18:18'),
(4, 8, 'sales', 150, NULL, 93.50, 'stable', 'High-velocity item. Consistent demand from corporate clients.', '2026-01-29', '2026-02-28', '2026-02-28 14:18:18'),
(5, 14, 'inventory', 400, 500, 89.00, 'increasing', 'Packaging demand increasing due to new export contracts. Recommend increasing max stock level.', '2026-01-29', '2026-02-28', '2026-02-28 14:18:18'),
(6, 4, 'inventory', 5, 15, 78.30, 'decreasing', 'UPS demand declining. However, current stock is critically low. Immediate reorder of 15 units advised.', '2026-01-29', '2026-02-28', '2026-02-28 14:18:18'),
(7, 5, 'sales', 18, NULL, 82.10, 'stable', 'Office furniture demand tied to new business setups. Moderate and predictable.', '2026-01-29', '2026-02-28', '2026-02-28 14:18:18'),
(8, 30, 'inventory', 80, 100, 88.60, 'increasing', 'Cement demand increasing with construction season. Stock up ahead of peak period.', '2026-01-29', '2026-02-28', '2026-02-28 14:18:18'),
(9, 20, 'sales', 15, NULL, 85.70, 'stable', 'Safety equipment demand consistent across all client sectors.', '2026-01-29', '2026-02-28', '2026-02-28 14:18:18'),
(10, 3, 'order', 8, NULL, 90.40, 'stable', 'Average delivery time from supplier: 5 days. No delays detected. Reorder lead time: 7 days.', '2026-01-29', '2026-02-28', '2026-02-28 14:18:18'),
(11, 1, 'monitoring', NULL, NULL, 88.00, 'stable', 'Normal stock movement pattern detected. No anomalies in inflow/outflow ratios.', '2026-01-29', '2026-02-28', '2026-02-28 14:18:18'),
(12, 14, 'monitoring', NULL, NULL, 76.50, 'increasing', 'Outflow rate increased 35% this month. Monitor for potential unauthorized removals.', '2026-01-29', '2026-02-28', '2026-02-28 14:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `alert_id` int(11) NOT NULL,
  `alert_type` enum('low_stock','expiry','overstock','abnormal_movement','system','order_delay') NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `severity` enum('info','warning','critical') DEFAULT 'warning',
  `is_read` tinyint(1) DEFAULT 0,
  `resolved` tinyint(1) DEFAULT 0,
  `resolved_by` int(11) DEFAULT NULL,
  `resolved_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`alert_id`, `alert_type`, `product_id`, `order_id`, `message`, `severity`, `is_read`, `resolved`, `resolved_by`, `resolved_at`, `created_at`) VALUES
(1, 'low_stock', 4, 1, 'UPS 1500VA APC: Current stock (8 units) is below reorder level (10 units). Immediate reorder recommended.', 'critical', 1, 0, 0, '2026-03-01 13:03:57', '2026-02-28 14:18:18'),
(2, 'low_stock', 11, NULL, 'Hydraulic Pallet Jack: Current stock (6 units) is below reorder level (2 units). Please review.', 'warning', 1, 1, 1, '2026-03-01 13:03:57', '2026-02-28 14:18:18'),
(3, 'low_stock', 13, NULL, 'Forklift Battery Pack: Critical low stock. Only 4 units remaining (reorder level: 2 units).', 'critical', 1, 1, 1, '2026-03-01 13:03:57', '2026-02-28 14:18:18'),
(4, 'low_stock', 23, NULL, 'Steel-Toe Safety Boots: Stock (9 pairs) below reorder threshold (15 pairs).', 'warning', 1, 1, 1, '2026-03-01 13:03:57', '2026-02-28 14:18:18'),
(5, 'expiry', 24, NULL, 'Instant Coffee 500g: Product approaching expiry date (2025-12-31). Consider promoting or discounting.', 'warning', 0, 0, 0, '2026-03-01 13:03:57', '2026-02-28 14:18:18'),
(6, 'expiry', 25, NULL, 'Drinking Water 5L: Batch expires 2025-09-30. Priority sale recommended.', 'critical', 1, 1, 1, '2026-03-01 13:03:57', '2026-02-28 14:18:18'),
(7, 'expiry', 18, NULL, 'Disinfectant Spray 750ml: Expiry approaching on 2026-03-15. Monitor stock turnover.', 'info', 1, 1, 1, '2026-03-01 13:03:57', '2026-02-28 14:18:18'),
(8, 'order_delay', NULL, 12, 'Incoming Order ORD-IN-006 from Global Trade Partners is delayed by 5+ days. Contact supplier.', 'critical', 1, 1, 1, '2026-03-01 13:03:57', '2026-02-28 14:18:18'),
(9, 'abnormal_movement', 1, NULL, 'Laptop Dell Inspiron 15: Unusually high outflow detected (25 units in 10 days). Verify records.', 'warning', 1, 1, 1, '2026-03-01 13:03:57', '2026-02-28 14:18:18'),
(10, 'system', NULL, NULL, 'System backup completed successfully. All data secured.', 'info', 1, 1, NULL, NULL, '2026-02-28 14:18:18'),
(11, 'low_stock', 19, NULL, 'Mop & Bucket Set: Stock (12 units) nearing reorder level (5). Plan restocking.', 'info', 1, 1, 1, '2026-03-01 13:03:57', '2026-02-28 14:18:18'),
(12, 'abnormal_movement', 8, NULL, 'A4 Copier Paper: Stock adjustment detected. Please verify with warehouse team.', 'info', 1, 1, 1, '2026-03-01 13:03:57', '2026-02-28 14:18:18'),
(13, 'system', NULL, NULL, 'Hello there will new update please be aware of that', 'info', 1, 1, 1, '2026-03-01 13:07:50', '2026-03-01 12:04:47'),
(14, 'expiry', 5, 5, 'Fig 4.4: Context Level DFD of Proposed System\r\n        ┌───────────┐\r\n        │ Supplier  │\r\n        └─────┬─────┘\r\n              │\r\n              ↓\r\n     ┌────────────────────┐\r\n     │ AI Warehouse System│\r\n     └─────┬──────────────┘\r\n           │ Stores Data\r\n           ↓\r\n     ┌────────────────────┐\r\n     │ Central Database   │\r\n     └─────┬──────────────┘\r\n           │\r\n           ↓\r\n     ┌───────────┐\r\n     │ Customer  │\r\n     └───────────┘\r\n           │\r\n           ↓\r\n     ┌─────────────┐\r\n     │ Reports &   │\r\n     │ Forecasts   │', 'warning', 0, 0, NULL, NULL, '2026-03-01 12:08:47'),
(15, 'low_stock', 5, 4, 'low stock for some products', 'warning', 1, 1, 1, '2026-03-01 13:21:59', '2026-03-01 12:19:23'),
(16, 'low_stock', 25, 5, 'http://localhost/ai_warehouse_system/', 'warning', 1, 1, 1, '2026-03-01 13:28:11', '2026-03-01 12:27:25'),
(17, 'low_stock', 1, 11, 'http://localhost/ai_warehouse_system/', 'critical', 0, 0, NULL, NULL, '2026-03-01 12:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `description`, `created_at`) VALUES
(1, 'Electronics', 'Electronic devices and components', '2026-02-28 14:18:18'),
(2, 'Furniture', 'Office and warehouse furniture', '2026-02-28 14:18:18'),
(3, 'Stationery', 'Office supplies and stationery items', '2026-02-28 14:18:18'),
(4, 'Machinery Parts', 'Industrial machinery components and spares', '2026-02-28 14:18:18'),
(5, 'Packaging Materials', 'Boxes, tapes, and packaging supplies', '2026-02-28 14:18:18'),
(6, 'Cleaning Supplies', 'Cleaning and hygiene products', '2026-02-28 14:18:18'),
(7, 'Safety Equipment', 'Personal protective equipment and safety gear', '2026-02-28 14:18:18'),
(8, 'Food & Beverages', 'Perishable and non-perishable food items', '2026-02-28 14:18:18'),
(9, 'Automotive Parts', 'Vehicle spare parts and accessories', '2026-02-28 14:18:18'),
(10, 'Raw Materials', 'Manufacturing raw materials', '2026-02-28 14:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `incoming_orders`
--

CREATE TABLE `incoming_orders` (
  `order_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `status` enum('pending','received','cancelled') DEFAULT 'pending',
  `total_amount` decimal(10,2) DEFAULT 0.00,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_phone` varchar(30) DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `subtotal` decimal(12,2) NOT NULL DEFAULT 0.00,
  `tax_rate` decimal(5,2) DEFAULT 16.00,
  `tax_amount` decimal(12,2) DEFAULT 0.00,
  `total_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `status` enum('draft','sent','paid','overdue','cancelled') DEFAULT 'draft',
  `due_date` date DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `invoice_number`, `order_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `subtotal`, `tax_rate`, `tax_amount`, `total_amount`, `status`, `due_date`, `paid_date`, `notes`, `created_by`, `created_at`) VALUES
(1, 'INV-2024-001', 6, 'Nairobi County Government', 'procurement@nairobi.go.ke', '+254720111222', 'City Hall, Nairobi', 2037280.00, 16.00, 342720.00, 2380000.00, 'paid', '2025-10-11', '2025-10-06', NULL, 1, '2025-09-26 14:18:18'),
(2, 'INV-2024-002', 7, 'Kenya Power Ltd', 'orders@kplc.co.ke', '+254730222333', 'Stima Plaza, Kolobot Road', 826040.00, 16.00, 138960.00, 965000.00, 'paid', '2025-11-05', '2025-10-31', NULL, 1, '2025-10-21 14:18:18'),
(3, 'INV-2024-003', 8, 'Safaricom PLC', 'procurement@safaricom.co.ke', '+254740333444', 'Safaricom House, Waiyaki Way', 1070000.00, 16.00, 180000.00, 1250000.00, 'paid', '2025-12-02', '2025-11-30', NULL, 1, '2025-11-18 14:18:18'),
(4, 'INV-2024-004', 9, 'University of Nairobi', 'supply@uon.ac.ke', '+254750444555', 'University Way, Nairobi', 372360.00, 16.00, 62640.00, 435000.00, 'paid', '2026-01-01', '2025-12-28', NULL, 1, '2025-12-17 14:18:18'),
(5, 'INV-2024-005', 10, 'Equity Bank Kenya', 'procurement@equity.co.ke', '+254760555666', 'Equity Centre, Upper Hill', 761840.00, 16.00, 128160.00, 890000.00, 'overdue', '2026-03-14', NULL, NULL, 1, '2026-02-23 14:18:18'),
(6, 'INV-2024-006', 11, 'KCB Group Ltd', 'orders@kcb.co.ke', '+254770666777', 'Kencom House, Moi Avenue', 278200.00, 16.00, 46800.00, 325000.00, 'sent', '2026-03-21', NULL, NULL, 1, '2026-02-26 14:18:18'),
(7, 'INV-2026-003', 10, 'Equity Bank Kenya', 'eq@gm', '', '', 10000.00, 16.00, 1600.00, 11600.00, 'draft', '2026-04-10', NULL, '', 1, '2026-03-01 11:59:41'),
(8, 'INV-2026-004', 10, 'Equity Bank Kenya', 'eq@gm', '', '', 10000.00, 16.00, 1600.00, 11600.00, 'cancelled', '2026-04-10', NULL, '', 1, '2026-03-01 12:02:22'),
(9, 'INV-2026-005', 9, 'University of Nairobi', '', '', '', 0.00, 16.00, 0.00, 0.00, 'cancelled', NULL, NULL, '', 1, '2026-03-01 12:23:11'),
(10, 'INV-2026-006', 8, 'Safaricom PLC', '', '', '', 670000.00, 10.00, 6700.00, 676700.00, 'paid', '2026-03-01', '2026-03-01', '', 1, '2026-03-01 12:42:57'),
(11, 'INV-2026-007', 7, 'Kenya Power Ltd', 'CC@GM', '56789', 'YHI IJOM', 10000.00, 0.15, 15.00, 10015.00, 'paid', '2026-03-27', '2026-03-01', '', 1, '2026-03-01 12:45:34'),
(12, 'INV-2026-008', 11, 'OSMAN HASSAN', 'osmansuleiman466@gmail.com', '2547953090', 'Nairobi,KE', 1000.00, 16.00, 160.00, 1160.00, 'paid', '2026-03-01', '2026-03-01', '', 1, '2026-03-01 12:59:17'),
(13, 'INV-2026-009', 6, 'Nairobi County Government', '', '', '', 0.00, 16.00, 0.00, 0.00, 'cancelled', NULL, NULL, '', 1, '2026-03-01 13:03:26'),
(14, 'INV-2026-010', 11, 'KCB Group Ltd', 'rtt@gm', 'qqq', 'q', 1000.00, 16.00, 160.00, 1160.00, 'paid', '2026-03-24', '2026-03-03', '', 1, '2026-03-03 12:12:39'),
(15, 'INV-2026-011', 13, 'lolo', 'CC@GM', '567890', 'YHI IJOM', 142000.00, 16.00, 22720.00, 164720.00, 'paid', '2026-03-12', '2026-03-12', '', 1, '2026-03-12 13:01:32'),
(16, 'INV-2026-012', 14, 'lolo', '', '', '', 449000.00, 100.00, 449000.00, 898000.00, 'cancelled', '2026-04-03', NULL, 'customer123', 1, '2026-03-12 13:05:43'),
(17, 'INV-2026-013', 14, 'OSMAN HASSAN', 'hjkkkk@gmail.com', '567890', 'Nairobi,KE', 10000.00, 16.00, 1600.00, 11600.00, 'paid', '2026-03-15', '2026-03-15', 'Top 10 Most Profitable Products', 1, '2026-03-15 13:01:17'),
(18, 'INV-2026-014', 15, 'lolo', 'CC@GM', '56789', 'YHI IJOM', 34890.00, 10.00, 3489.00, 38379.00, 'paid', '2026-03-15', '2026-03-15', 'AND completed_date BETWEEN ? AND ?', 1, '2026-03-15 13:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `invoice_item_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(12,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`invoice_item_id`, `invoice_id`, `product_id`, `description`, `quantity`, `unit_price`, `subtotal`) VALUES
(1, 1, 5, 'Wireless Mouse', 2, 1200.00, 2400.00),
(2, 1, 8, 'USB Keyboard', 1, 1800.00, 1800.00),
(3, 2, 3, 'Laptop Charger', 1, 3500.00, 3500.00),
(4, 2, 10, 'HDMI Cable', 3, 600.00, 1800.00),
(5, 3, 7, 'External Hard Drive 1TB', 1, 8500.00, 8500.00),
(6, 3, 4, 'Laptop Stand', 2, 1500.00, 3000.00),
(7, 4, 6, 'Office Headset', 2, 2200.00, 4400.00),
(8, 4, 9, 'Ethernet Cable', 5, 300.00, 1500.00),
(9, 5, 2, 'Power Extension Cable', 2, 900.00, 1800.00),
(10, 5, 11, 'USB Flash Disk 32GB', 4, 700.00, 2800.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(50) NOT NULL,
  `order_type` enum('incoming','outgoing') NOT NULL,
  `customer_supplier_name` varchar(200) NOT NULL,
  `customer_supplier_email` varchar(100) DEFAULT NULL,
  `customer_supplier_phone` varchar(30) DEFAULT NULL,
  `status` enum('pending','processing','completed','cancelled','delayed') DEFAULT 'pending',
  `total_amount` decimal(12,2) DEFAULT 0.00,
  `order_date` datetime DEFAULT current_timestamp(),
  `tax_amount` decimal(12,2) DEFAULT 0.00,
  `notes` text DEFAULT NULL,
  `expected_date` date DEFAULT NULL,
  `completed_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_number`, `order_type`, `customer_supplier_name`, `customer_supplier_email`, `customer_supplier_phone`, `status`, `total_amount`, `order_date`, `tax_amount`, `notes`, `expected_date`, `completed_date`, `user_id`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'ORD-IN-001', 'incoming', 'TechHub Kenya Ltd', 'orders@techhub.co.kess', '+254712345678', 'completed', 1625000.00, '2026-03-17 02:02:55', 234000.00, NULL, '2025-09-06', '2025-09-08 17:18:18', 1, '2025-09-01 14:18:18', '2026-03-03 12:18:05', NULL),
(2, 'ORD-IN-002', 'incoming', 'East Africa Supplies Co.', 'grace@easupplies.comss', '+254722456789', 'completed', 742500.00, '2026-03-17 02:02:55', 106920.00, NULL, '2025-10-11', '2025-10-13 17:18:18', 1, '2025-10-06 14:18:18', '2026-03-03 12:18:11', NULL),
(3, 'ORD-IN-003', 'incoming', 'Premier Distributors EA', 'peter@premierea.com', '+254755789012', 'completed', 265000.00, '2026-03-17 02:02:55', 38160.00, NULL, '2025-11-30', '2025-12-02 17:18:18', 1, '2025-11-25 14:18:18', '2026-02-28 14:18:18', NULL),
(4, 'ORD-IN-004', 'incoming', 'Kenya Industrial Supplies', 'ruth@kindsup.co.kess', '+254766890123', 'delayed', 380000.00, '2026-03-17 02:02:55', 54720.00, NULL, '2026-03-05', NULL, 1, '2026-02-25 14:18:18', '2026-03-16 22:30:54', NULL),
(5, 'ORD-IN-005', 'incoming', 'SafeGuard Products Ltd', 'samuel@safeguard.co.ke', '+254777901234', 'pending', 115500.00, '2026-03-17 02:02:55', 16632.00, NULL, '2026-03-10', NULL, 1, '2026-02-27 14:18:18', '2026-02-28 14:18:18', NULL),
(6, 'ORD-OUT-001', 'outgoing', 'Nairobi County Government', 'procurement@nairobi.go.ke', '+254720111222', 'completed', 2380000.00, '2026-03-17 02:02:55', 342720.00, NULL, '2025-09-26', '2025-09-28 17:18:18', 2, '2025-09-21 14:18:18', '2026-02-28 14:18:18', NULL),
(7, 'ORD-OUT-002', 'outgoing', 'Kenya Power Ltd', 'orders@kplc.co.ke', '+254730222333', 'completed', 965000.00, '2026-03-17 02:02:55', 138960.00, NULL, '2025-10-21', '2025-10-23 17:18:18', 2, '2025-10-16 14:18:18', '2026-02-28 14:18:18', NULL),
(8, 'ORD-OUT-003', 'outgoing', 'Safaricom PLC', 'procurement@safaricom.co.ke', '+254740333444', 'completed', 1250000.00, '2026-03-17 02:02:55', 180000.00, NULL, '2025-11-15', '2025-11-18 17:18:18', 2, '2025-11-10 14:18:18', '2026-02-28 14:18:18', NULL),
(9, 'ORD-OUT-004', 'outgoing', 'University of Nairobi', 'supply@uon.ac.ke', '+254750444555', 'completed', 435000.00, '2026-03-17 02:02:55', 62640.00, NULL, '2025-12-15', '2025-12-17 17:18:18', 2, '2025-12-10 14:18:18', '2026-02-28 14:18:18', NULL),
(10, 'ORD-OUT-005', 'outgoing', 'Equity Bank Kenya', 'procurement@equity.co.keff', '+254760555666', 'processing', 890000.00, '2026-03-17 02:02:55', 128160.00, NULL, '2026-03-03', NULL, 2, '2026-02-23 14:18:18', '2026-03-03 12:17:30', NULL),
(11, 'ORD-OUT-006', 'outgoing', 'KCB Group Ltd', 'orders@kcb.co.keff', '+254770666777', 'pending', 325000.00, '2026-03-17 02:02:55', 46800.00, NULL, '2026-03-07', NULL, 2, '2026-02-26 14:18:18', '2026-03-03 12:17:33', NULL),
(12, 'ORD-IN-006', 'incoming', 'Global Trade Partners', 'ahmed@globaltp.comff', '+254733567890', 'processing', 540000.00, '2026-03-17 02:02:55', 77760.00, NULL, '2026-02-23', NULL, 1, '2026-02-13 14:18:18', '2026-03-16 22:31:03', NULL),
(13, 'ORD-OUT-0007', 'outgoing', 'lolo', 'lol@gmail.com', NULL, 'completed', 142320.00, '2026-03-17 02:02:55', 0.00, '', NULL, '2026-03-12 14:02:44', 7, '2026-03-12 12:58:39', '2026-03-12 13:02:44', NULL),
(14, 'ORD-OUT-0008', 'outgoing', 'lolo', 'lol@gmail.com', NULL, 'pending', 449260.00, '2026-03-17 02:02:55', 0.00, '', NULL, NULL, 7, '2026-03-12 13:04:08', '2026-03-12 13:04:08', NULL),
(15, 'ORD-OUT-0009', 'outgoing', 'lolo', 'lol@gmail.com', NULL, 'completed', 34890.00, '2026-03-17 02:02:55', 0.00, '', NULL, '2026-03-15 14:10:17', 7, '2026-03-15 13:09:05', '2026-03-15 13:10:17', NULL),
(16, 'ORD-OUT-010', 'outgoing', 'n', '', '', 'processing', 0.00, '2026-03-17 02:02:55', 0.00, '', '2026-03-26', NULL, 1, '2026-03-16 22:30:09', '2026-03-16 22:30:09', NULL),
(22, 'ORD-OUT-0011', 'outgoing', 'lolo', 'lol@gmail.com', NULL, 'processing', 14000.00, '2026-03-17 02:29:33', 0.00, '', '2026-03-27', NULL, 7, '2026-03-16 23:29:33', '2026-03-16 23:31:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(12,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `quantity`, `unit_price`, `subtotal`) VALUES
(1, 1, 5, 2, 1200.00, 2400.00),
(2, 1, 8, 1, 1800.00, 1800.00),
(3, 2, 3, 1, 3500.00, 3500.00),
(4, 2, 10, 3, 600.00, 1800.00),
(5, 3, 7, 1, 8500.00, 8500.00),
(6, 3, 4, 2, 1500.00, 3000.00),
(7, 4, 6, 2, 2200.00, 4400.00),
(8, 4, 9, 5, 300.00, 1500.00),
(9, 5, 2, 2, 900.00, 1800.00),
(10, 5, 11, 4, 700.00, 2800.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `unit_price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `selling_price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `current_stock` int(11) NOT NULL DEFAULT 0,
  `reorder_level` int(11) NOT NULL DEFAULT 10,
  `max_stock` int(11) NOT NULL DEFAULT 500,
  `unit_of_measure` varchar(30) DEFAULT 'units',
  `expiry_date` date DEFAULT NULL,
  `location_aisle` varchar(20) DEFAULT NULL,
  `location_bin` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','discontinued') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `category_id`, `supplier_id`, `unit_price`, `selling_price`, `current_stock`, `reorder_level`, `max_stock`, `unit_of_measure`, `expiry_date`, `location_aisle`, `location_bin`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PRD001', 'Laptop Dell Inspiron 15', 1, 1, 65000.00, 78000.00, 0, 10, 100, 'units', '2026-03-01', 'A1', 'B01', '', 'discontinued', '2026-02-28 14:18:18', '2026-03-03 12:10:07'),
(2, 'PRD002', 'HP Wireless Keyboard', 1, 1, 3500.00, 4500.00, 120, 20, 300, 'units', NULL, 'A1', 'B02', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(3, 'PRD003', 'Samsung 27\" Monitor', 1, 1, 28000.00, 35000.00, 32, 8, 80, 'units', NULL, 'A2', 'B01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(4, 'PRD004', 'UPS 1500VA APC', 1, 3, 18000.00, 22000.00, 8, 10, 60, 'units', NULL, 'A2', 'B02', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(5, 'PRD005', 'Office Chair Executive', 2, 2, 12000.00, 15000.00, 55, 10, 100, 'units', NULL, 'B1', 'C01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(6, 'PRD006', 'Adjustable Work Table', 2, 2, 18500.00, 23000.00, 22, 5, 50, 'units', NULL, 'B1', 'C02', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(7, 'PRD007', 'Steel Shelving Unit 5-tier', 2, 6, 8500.00, 11000.00, 18, 5, 40, 'units', NULL, 'B2', 'C01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(8, 'PRD008', 'A4 Copier Paper 80gsm (ream)', 3, 5, 550.00, 680.00, 361, 100, 2000, 'reams', NULL, 'C1', 'D01', NULL, 'active', '2026-02-28 14:18:18', '2026-03-01 12:31:13'),
(9, 'PRD009', 'Ballpoint Pens (box of 50)', 3, 5, 350.00, 450.00, 200, 50, 500, 'boxes', NULL, 'C1', 'D02', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(10, 'PRD010', 'Stapler Heavy Duty', 3, 5, 1200.00, 1600.00, 35, 10, 80, 'units', NULL, 'C2', 'D01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(11, 'PRD011', 'Hydraulic Pallet Jack', 4, 6, 45000.00, 58000.00, 6, 2, 20, 'units', NULL, 'D1', 'E01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(12, 'PRD012', 'Conveyor Belt Roller', 4, 4, 12000.00, 15500.00, 14, 5, 30, 'units', NULL, 'D1', 'E02', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(13, 'PRD013', 'Forklift Battery Pack', 4, 1, 85000.00, 105000.00, 4, 2, 15, 'units', NULL, 'D2', 'E01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(14, 'PRD014', 'Cardboard Boxes 60x40x40cm', 5, 5, 120.00, 160.00, 1200, 300, 5000, 'units', NULL, 'E1', 'F01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(15, 'PRD015', 'Stretch Wrap Film 20mic', 5, 5, 1800.00, 2200.00, 85, 20, 200, 'rolls', NULL, 'E1', 'F02', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(16, 'PRD016', 'Packing Tape 48mm x 50m', 5, 5, 180.00, 230.00, 320, 100, 1000, 'rolls', NULL, 'E2', 'F01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(17, 'PRD017', 'Industrial Floor Cleaner 5L', 6, 7, 2200.00, 2800.00, 28, 10, 80, 'units', '2026-06-30', 'F1', 'G01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(18, 'PRD018', 'Disinfectant Spray 750ml', 6, 7, 450.00, 580.00, 95, 20, 200, 'units', '2026-03-15', 'F1', 'G02', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(19, 'PRD019', 'Mop & Bucket Set', 6, 7, 1200.00, 1550.00, 12, 5, 30, 'sets', NULL, 'F2', 'G01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(20, 'PRD020', 'Hard Hat Construction', 7, 7, 850.00, 1100.00, 65, 20, 150, 'units', NULL, 'G1', 'H01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(21, 'PRD021', 'Safety Vest Hi-Vis', 7, 7, 550.00, 720.00, 80, 25, 200, 'units', NULL, 'G1', 'H02', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(22, 'PRD022', 'Safety Gloves (pair)', 7, 7, 250.00, 350.00, 150, 50, 400, 'pairs', NULL, 'G2', 'H01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(23, 'PRD023', 'Steel-Toe Safety Boots', 7, 7, 3500.00, 4500.00, 9, 15, 80, 'pairs', NULL, 'G2', 'H02', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(24, 'PRD024', 'Instant Coffee 500g', 8, 8, 1200.00, 1550.00, 42, 15, 100, 'units', '2025-12-31', 'H1', 'I01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(25, 'PRD025', 'Drinking Water 5L Bottle', 8, 8, 180.00, 230.00, 190, 50, 500, 'bottles', '2025-09-30', 'H1', 'I02', NULL, 'active', '2026-02-28 14:18:18', '2026-03-16 23:24:36'),
(26, 'PRD026', 'Engine Oil 5L SAE 20W50', 9, 3, 2800.00, 3500.00, 28, 10, 100, 'units', NULL, 'I1', 'J01', NULL, 'active', '2026-02-28 14:18:18', '2026-03-15 12:59:18'),
(27, 'PRD027', 'Air Filter Universal', 9, 3, 1200.00, 1600.00, 22, 8, 60, 'units', NULL, 'I1', 'J02', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(28, 'PRD028', 'Steel Reinforcement Bars (ton)', 10, 4, 95000.00, 112000.00, 15, 3, 50, 'tons', NULL, 'J1', 'K01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(29, 'PRD029', 'PVC Pipes 4inch x 6m', 10, 4, 1800.00, 2300.00, 60, 20, 200, 'units', NULL, 'J1', 'K02', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(30, 'PRD030', 'Portland Cement 50kg', 10, 4, 750.00, 920.00, 180, 40, 600, 'bags', NULL, 'J2', 'K01', NULL, 'active', '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(32, 'LNV-X1-001', 'Lenovo ThinkPad X1', 1, 1, 0.00, 0.00, 25, 5, 500, 'units', NULL, NULL, NULL, NULL, 'active', '2026-03-15 12:29:02', '2026-03-15 12:29:02'),
(33, 'HPU-V3', 'Hydraulic Pump V3', 4, 2, 0.00, 0.00, 12, 3, 500, 'units', NULL, NULL, NULL, NULL, 'active', '2026-03-15 12:29:02', '2026-03-15 12:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `setting_group` varchar(50) DEFAULT 'general',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_key`, `setting_value`, `setting_group`, `updated_at`) VALUES
(1, 'company_name', 'AI Warehouse Management System', 'general', '2026-02-28 14:18:18'),
(2, 'company_email', 'info@warehouse.comty', 'general', '2026-03-03 12:13:54'),
(3, 'company_phone', '+254700000000', 'general', '2026-02-28 14:18:18'),
(4, 'company_address', 'Thika - KE', 'general', '2026-03-01 12:26:03'),
(5, 'currency', 'KES', 'general', '2026-02-28 14:18:18'),
(6, 'currency_symbol', 'KES', 'general', '2026-03-01 12:26:58'),
(7, 'tax_rate', '16', 'finance', '2026-02-28 14:18:18'),
(8, 'low_stock_threshold', '10', 'inventory', '2026-02-28 14:18:18'),
(9, 'enable_email_alerts', '1', 'notifications', '2026-02-28 14:18:18'),
(10, 'records_per_page', '10', 'display', '2026-02-28 14:18:18'),
(11, 'system_timezone', 'Africa/Nairobi', 'general', '2026-02-28 14:18:18'),
(12, 'invoice_prefix', 'INV', 'finance', '2026-02-28 14:18:18'),
(13, 'order_prefix', 'ORD', 'finance', '2026-02-28 14:18:18'),
(14, 'alert_email_enabled', '1', 'notifications', '2026-03-01 12:27:06'),
(15, 'alert_email_address', 'cikramainasaleban@gmail.com', 'notifications', '2026-03-01 12:17:33'),
(16, 'low_stock_alert_enabled', '1', 'notifications', '2026-03-01 12:17:33'),
(17, 'expiry_alert_days', '90', 'notifications', '2026-03-01 12:17:33'),
(18, 'order_delay_alert_enabled', '1', 'notifications', '2026-03-01 12:17:33'),
(23, 'company_city', 'Nairobi', 'general', '2026-03-01 12:26:03'),
(24, 'company_country', 'Kenya', 'general', '2026-03-01 12:26:03'),
(26, 'date_format', 'd M Y', 'general', '2026-03-01 12:26:03'),
(27, 'default_currency', 'KES', 'inventory', '2026-03-01 12:26:58'),
(30, 'reorder_auto_alert', '1', 'inventory', '2026-03-01 12:26:29'),
(31, 'max_stock_default', '500', 'inventory', '2026-03-01 12:26:29'),
(32, 'reorder_level_default', '10', 'inventory', '2026-03-01 12:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `stock_movements`
--

CREATE TABLE `stock_movements` (
  `movement_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `movement_type` enum('stock_in','stock_out','adjustment','transfer') NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(12,2) DEFAULT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `movement_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_movements`
--

INSERT INTO `stock_movements` (`movement_id`, `product_id`, `movement_type`, `quantity`, `unit_price`, `reference_no`, `notes`, `user_id`, `movement_date`) VALUES
(1, 1, 'stock_in', 20, 65000.00, 'PO-2024-001', 'Initial stock receipt', 1, '2025-09-01 14:18:18'),
(2, 2, 'stock_in', 80, 3500.00, 'PO-2024-001', 'Initial stock receipt', 1, '2025-09-01 14:18:18'),
(3, 3, 'stock_in', 25, 28000.00, 'PO-2024-002', 'Initial stock receipt', 1, '2025-09-06 14:18:18'),
(4, 8, 'stock_in', 500, 550.00, 'PO-2024-003', 'Bulk paper order', 1, '2025-09-11 14:18:18'),
(5, 14, 'stock_in', 1000, 120.00, 'PO-2024-004', 'Packaging materials', 1, '2025-09-16 14:18:18'),
(6, 1, 'stock_out', 5, 78000.00, 'SO-2024-001', 'Order fulfillment', 2, '2025-09-21 14:18:18'),
(7, 2, 'stock_out', 15, 4500.00, 'SO-2024-001', 'Order fulfillment', 2, '2025-09-21 14:18:18'),
(8, 8, 'stock_out', 50, 680.00, 'SO-2024-002', 'Office supply order', 2, '2025-09-26 14:18:18'),
(9, 20, 'stock_in', 50, 850.00, 'PO-2024-005', 'Safety equipment restocking', 1, '2025-10-01 14:18:18'),
(10, 21, 'stock_in', 60, 550.00, 'PO-2024-005', 'Safety equipment restocking', 1, '2025-10-01 14:18:18'),
(11, 5, 'stock_in', 40, 12000.00, 'PO-2024-006', 'Furniture order', 1, '2025-10-06 14:18:18'),
(12, 6, 'stock_in', 15, 18500.00, 'PO-2024-006', 'Furniture order', 1, '2025-10-06 14:18:18'),
(13, 1, 'stock_out', 8, 78000.00, 'SO-2024-003', 'Corporate client order', 2, '2025-10-11 14:18:18'),
(14, 3, 'stock_out', 5, 35000.00, 'SO-2024-003', 'Corporate client order', 2, '2025-10-11 14:18:18'),
(15, 26, 'stock_in', 30, 2800.00, 'PO-2024-007', 'Auto parts restocking', 1, '2025-10-16 14:18:18'),
(16, 27, 'stock_in', 20, 1200.00, 'PO-2024-007', 'Auto parts restocking', 1, '2025-10-16 14:18:18'),
(17, 8, 'stock_out', 80, 680.00, 'SO-2024-004', 'Stationery bulk sale', 2, '2025-10-21 14:18:18'),
(18, 9, 'stock_out', 30, 450.00, 'SO-2024-004', 'Stationery bulk sale', 2, '2025-10-21 14:18:18'),
(19, 14, 'stock_out', 300, 160.00, 'SO-2024-005', 'Packaging for exports', 2, '2025-10-26 14:18:18'),
(20, 15, 'stock_out', 20, 2200.00, 'SO-2024-005', 'Packaging for exports', 2, '2025-10-26 14:18:18'),
(21, 28, 'stock_in', 10, 95000.00, 'PO-2024-008', 'Construction materials', 1, '2025-10-31 14:18:18'),
(22, 30, 'stock_in', 150, 750.00, 'PO-2024-008', 'Construction materials', 1, '2025-10-31 14:18:18'),
(23, 11, 'stock_in', 5, 45000.00, 'PO-2024-009', 'Equipment purchase', 1, '2025-11-05 14:18:18'),
(24, 12, 'stock_in', 10, 12000.00, 'PO-2024-009', 'Equipment purchase', 1, '2025-11-05 14:18:18'),
(25, 1, 'stock_out', 7, 78000.00, 'SO-2024-006', 'Retail order', 2, '2025-11-10 14:18:18'),
(26, 5, 'stock_out', 12, 15000.00, 'SO-2024-006', 'Office setup order', 2, '2025-11-10 14:18:18'),
(27, 17, 'stock_in', 20, 2200.00, 'PO-2024-010', 'Cleaning supplies', 1, '2025-11-15 14:18:18'),
(28, 18, 'stock_in', 60, 450.00, 'PO-2024-010', 'Cleaning supplies', 1, '2025-11-15 14:18:18'),
(29, 22, 'stock_out', 30, 350.00, 'SO-2024-007', 'Safety equipment sale', 2, '2025-11-20 14:18:18'),
(30, 20, 'stock_out', 10, 1100.00, 'SO-2024-007', 'Safety equipment sale', 2, '2025-11-20 14:18:18'),
(31, 8, 'stock_in', 200, 550.00, 'PO-2024-011', 'Paper restocking', 1, '2025-11-25 14:18:18'),
(32, 16, 'stock_in', 200, 180.00, 'PO-2024-011', 'Tape restocking', 1, '2025-11-25 14:18:18'),
(33, 24, 'stock_in', 30, 1200.00, 'PO-2024-012', 'Cafeteria supplies', 1, '2025-11-30 14:18:18'),
(34, 25, 'stock_in', 150, 180.00, 'PO-2024-012', 'Cafeteria supplies', 1, '2025-11-30 14:18:18'),
(35, 29, 'stock_in', 50, 1800.00, 'PO-2024-013', 'Plumbing materials', 1, '2025-12-05 14:18:18'),
(36, 3, 'stock_out', 8, 35000.00, 'SO-2024-008', 'IT equipment order', 2, '2025-12-10 14:18:18'),
(37, 4, 'stock_out', 5, 22000.00, 'SO-2024-008', 'IT equipment order', 2, '2025-12-10 14:18:18'),
(38, 2, 'stock_in', 50, 3500.00, 'PO-2024-014', 'Electronics restock', 1, '2025-12-15 14:18:18'),
(39, 4, 'stock_in', 10, 18000.00, 'PO-2024-014', 'Electronics restock', 1, '2025-12-15 14:18:18'),
(40, 14, 'stock_in', 500, 120.00, 'PO-2024-015', 'Packaging restocking', 1, '2025-12-20 14:18:18'),
(41, 5, 'stock_out', 10, 15000.00, 'SO-2024-009', 'Furniture sale', 2, '2025-12-25 14:18:18'),
(42, 7, 'stock_out', 5, 11000.00, 'SO-2024-009', 'Furniture sale', 2, '2025-12-25 14:18:18'),
(43, 8, 'stock_out', 60, 680.00, 'SO-2024-010', 'Monthly stationery order', 2, '2025-12-30 14:18:18'),
(44, 23, 'stock_in', 15, 3500.00, 'PO-2024-016', 'Safety boots order', 1, '2026-01-04 14:18:18'),
(45, 1, 'stock_out', 10, 78000.00, 'SO-2024-011', 'Government tender', 2, '2026-01-09 14:18:18'),
(46, 26, 'stock_out', 10, 3500.00, 'SO-2024-011', 'Auto parts order', 2, '2026-01-09 14:18:18'),
(47, 30, 'stock_out', 60, 920.00, 'SO-2024-012', 'Construction supply', 2, '2026-01-14 14:18:18'),
(48, 28, 'stock_out', 5, 112000.00, 'SO-2024-012', 'Steel for construction', 2, '2026-01-14 14:18:18'),
(49, 1, 'stock_in', 15, 65000.00, 'PO-2024-017', 'Laptop restock', 1, '2026-01-19 14:18:18'),
(50, 13, 'stock_in', 3, 85000.00, 'PO-2024-018', 'Battery pack purchase', 1, '2026-01-24 14:18:18'),
(51, 18, 'stock_out', 25, 580.00, 'SO-2024-013', 'Hygiene supplies', 2, '2026-01-29 14:18:18'),
(52, 17, 'stock_out', 8, 2800.00, 'SO-2024-013', 'Cleaning products', 2, '2026-01-29 14:18:18'),
(53, 8, 'stock_in', 100, 550.00, 'PO-2024-019', 'Paper top-up', 1, '2026-02-03 14:18:18'),
(54, 14, 'stock_out', 150, 160.00, 'SO-2024-014', 'Packaging sale', 2, '2026-02-08 14:18:18'),
(55, 2, 'stock_out', 20, 4500.00, 'SO-2024-014', 'IT accessories', 2, '2026-02-08 14:18:18'),
(56, 21, 'stock_out', 15, 720.00, 'SO-2024-015', 'Safety gear sale', 2, '2026-02-13 14:18:18'),
(57, 22, 'stock_out', 20, 350.00, 'SO-2024-015', 'Safety gear sale', 2, '2026-02-13 14:18:18'),
(58, 3, 'stock_in', 15, 28000.00, 'PO-2024-020', 'Monitor restock', 1, '2026-02-18 14:18:18'),
(59, 5, 'stock_in', 20, 12000.00, 'PO-2024-020', 'Chair restock', 1, '2026-02-18 14:18:18'),
(60, 1, 'stock_out', 5, 78000.00, 'SO-2024-016', 'Recent laptop sale', 2, '2026-02-23 14:18:18'),
(61, 30, 'stock_out', 30, 920.00, 'SO-2024-016', 'Cement sale', 2, '2026-02-23 14:18:18'),
(62, 8, 'stock_out', 89, 1000.00, 'PO-230', 'http://localhost/ai_warehouse_system/', 1, '2026-03-01 10:30:00'),
(63, 1, 'stock_out', 45, 65000.00, 'PRD001', '', 1, '2026-03-01 10:33:00'),
(64, 1, 'stock_in', 25, NULL, NULL, NULL, 1, '2026-03-15 12:29:02'),
(65, 2, 'stock_in', 12, NULL, NULL, NULL, 1, '2026-03-15 12:29:02'),
(66, 26, 'stock_out', 10, 100.00, 'uuu', 'ok', 1, '2026-03-15 10:58:00'),
(67, 25, 'stock_out', 10, 100.00, 'PO-230', 'ok', 1, '2026-03-16 21:24:00'),
(68, 1, 'stock_in', 50, 65000.00, 'PO-2026-001', 'Restocking laptops', 1, '2026-03-10 07:15:00'),
(69, 2, 'stock_out', 12, 4500.00, 'SO-2026-015', 'Client sales - Thika Branch', 2, '2026-03-11 11:30:00'),
(70, 8, 'stock_in', 200, 550.00, 'PO-2026-002', 'Stationery replenishment', 1, '2026-03-12 06:00:00'),
(71, 14, 'stock_out', 150, 160.00, 'SO-2026-016', 'Dispatch to packaging unit', 2, '2026-03-13 13:45:00'),
(72, 3, 'stock_in', 15, 28000.00, 'PO-2026-003', 'Monthly monitor supply', 1, '2026-03-14 08:20:00'),
(73, 20, 'stock_out', 5, 1200.00, 'SO-2026-017', 'Safety kit replacement', 2, '2026-03-15 10:10:00'),
(74, 21, 'stock_in', 100, 550.00, 'PO-2026-004', 'Safety glove bulk order', 1, '2026-03-16 05:30:00'),
(75, 1, 'stock_out', 8, 78000.00, 'SO-2026-018', 'Retail dispatch', 2, '2026-03-16 12:20:00'),
(76, 5, 'stock_in', 20, 12000.00, 'PO-2026-005', 'Office chair delivery', 1, '2026-03-17 06:45:00'),
(77, 30, 'stock_out', 40, 950.00, 'SO-2026-019', 'Construction site fulfillment', 2, '2026-03-17 08:00:00'),
(78, 1, 'stock_out', 3, 78000.00, 'SO-2026-101', 'Sale to Nairobi Office', 2, '2026-03-11 06:30:00'),
(79, 5, 'stock_in', 15, 12000.00, 'PO-2026-050', 'Restocking ergonomic chairs', 1, '2026-03-12 08:15:00'),
(80, 8, 'stock_out', 120, 680.00, 'SO-2026-102', 'Bulk stationery dispatch', 2, '2026-03-13 11:45:00'),
(81, 20, 'stock_in', 45, 850.00, 'PO-2026-051', 'New safety helmets arrived', 1, '2026-03-14 07:00:00'),
(82, 3, 'stock_out', 5, 35000.00, 'SO-2026-103', 'Customer upgrade delivery', 2, '2026-03-15 13:20:00'),
(83, 14, 'stock_in', 500, 120.00, 'PO-2026-052', 'Packaging boxes restock', 1, '2026-03-15 05:30:00'),
(84, 2, 'stock_out', 25, 4500.00, 'SO-2026-104', 'Webcam bulk order', 2, '2026-03-16 10:10:00'),
(85, 21, 'stock_out', 10, 850.00, 'SO-2026-105', 'Direct warehouse sale', 2, '2026-03-16 14:00:00'),
(86, 11, 'stock_in', 8, 45000.00, 'PO-2026-053', 'Projector inventory replenish', 1, '2026-03-17 06:15:00'),
(87, 30, 'stock_out', 50, 950.00, 'SO-2026-106', 'Dispatch for Site B', 2, '2026-03-17 09:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(150) NOT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(80) DEFAULT NULL,
  `country` varchar(80) DEFAULT 'Kenya',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_terms` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `contact_person`, `email`, `phone`, `address`, `city`, `country`, `status`, `created_at`, `payment_terms`, `notes`) VALUES
(1, 'TechHub Kenya Ltd', 'James Mwangi', 'orders@techhub.co.kety', '+254712345678', 'Industrial Area, Nbi Road', 'Nairobi', 'Kenya', 'active', '2026-02-28 14:18:18', NULL, NULL),
(2, 'East Africa Supplies Co.', 'Grace Akinyi', 'grace@easupplies.comse', '+254722456789', 'Mombasa Road, Ind Zone', 'Nairobi', 'Kenya', 'active', '2026-02-28 14:18:18', NULL, NULL),
(3, 'Global Trade Partners', 'Ahmed Hassan', 'ahmed@globaltp.comyh', '+254733567890', 'Westlands, Chiromo Rd', 'Nairobi', 'Kenya', 'active', '2026-02-28 14:18:18', NULL, NULL),
(4, 'Sunrise Manufacturing', 'Fatuma Omar', 'fatuma@sunrise.co.kety', '+254744678901', 'Athi River Industrial', 'Machakos', 'Kenya', 'active', '2026-02-28 14:18:18', NULL, NULL),
(5, 'Premier Distributors EA', 'Peter Kamau', 'peter@premierea.comtyh', '+254755789012', 'Thika Superhighway, KM 15', 'Kiambu', 'Kenya', 'active', '2026-02-28 14:18:18', NULL, NULL),
(6, 'Kenya Industrial Supplies', 'Ruth Njeri', 'ruth@kindsup.co.kety', '+254766890123', 'Industrial Area, Enterprise Rd', 'Nairobi', 'Kenya', 'active', '2026-02-28 14:18:18', NULL, NULL),
(7, 'SafeGuard Products Ltd', 'Samuel Rotich', 'samuel@safeguard.co.kety', '+254777901234', 'Karen, Ngong Road', 'Nairobi', 'Kenya', 'active', '2026-02-28 14:18:18', NULL, NULL),
(8, 'Fresh Imports Ltd', 'Lucy Wambui', 'lucy@freshimports.co.keye', '+254788012345', 'JKIA Freight Terminal', 'Nairobi', 'Kenya', 'active', '2026-02-28 14:18:18', NULL, NULL),
(11, 'test', 'sas', '', 'asas', '', '', '', 'inactive', '2026-03-16 23:21:46', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','manager','customer') NOT NULL DEFAULT 'manager',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `last_login` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `status`, `last_login`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'System Administrator', 'admin@warehouse.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 'active', '2026-03-17 02:22:56', '17d59ae22ceaae6388740929c23d355c63e65fbb4148446561ef7ef848ecb0fb', '2026-02-28 14:18:18', '2026-03-16 23:22:56'),
(2, 'Test Manager', 'manager@warehouse.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'manager', 'active', '2026-03-17 02:30:33', 'b0576b3f51beb2fcf9e07327ac3256635d482fe0208d1d43e6b4e3c06fef896d', '2026-02-28 14:18:18', '2026-03-16 23:30:33'),
(3, 'Mary Wanjiku', 'mwanjiku@warehouse.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'manager', 'active', NULL, NULL, '2026-02-28 14:18:18', '2026-02-28 14:18:18'),
(4, 'Aisha Hassan', 'ahassan@warehouse.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'manager', 'inactive', NULL, NULL, '2026-02-28 14:18:18', '2026-03-01 11:37:08'),
(5, 'Test User', 'admin@warehouse.comss', '$2y$10$AzWlQLi.ZOdtBPxHSExXVOcLMq545V7o641gygdK9eFOebUf0Nnpi', 'manager', 'inactive', NULL, NULL, '2026-03-01 11:36:28', '2026-03-01 11:37:25'),
(6, 'Demo Customer', 'customer@warehouse.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uXi6FdtA3', 'customer', 'active', NULL, NULL, '2026-03-12 12:38:58', '2026-03-12 12:38:58'),
(7, 'lolo', 'lol@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'customer', 'active', '2026-03-17 02:29:25', NULL, '2026-03-12 12:43:08', '2026-03-16 23:29:25'),
(8, 'j', 'admin@warehouse.comhh', '$2y$10$Bk/rf8r2nHs4JUGHyO718uKLYn77L1sOGM9yAxLJ8fuKcGoFd71SC', 'customer', 'active', NULL, NULL, '2026-03-12 12:54:02', '2026-03-12 12:54:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ai_predictions`
--
ALTER TABLE `ai_predictions`
  ADD PRIMARY KEY (`prediction_id`),
  ADD KEY `idx_ai_predictions_product` (`product_id`,`robot_type`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`alert_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `idx_alerts_type` (`alert_type`,`is_read`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `incoming_orders`
--
ALTER TABLE `incoming_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`invoice_item_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idx_orders_status` (`status`),
  ADD KEY `idx_orders_type` (`order_type`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_code` (`product_code`),
  ADD KEY `idx_products_category` (`category_id`),
  ADD KEY `idx_products_supplier` (`supplier_id`),
  ADD KEY `idx_products_stock` (`current_stock`,`reorder_level`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- Indexes for table `stock_movements`
--
ALTER TABLE `stock_movements`
  ADD PRIMARY KEY (`movement_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `idx_stock_movements_product` (`product_id`),
  ADD KEY `idx_stock_movements_date` (`movement_date`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ai_predictions`
--
ALTER TABLE `ai_predictions`
  MODIFY `prediction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `alert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `incoming_orders`
--
ALTER TABLE `incoming_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `invoice_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `stock_movements`
--
ALTER TABLE `stock_movements`
  MODIFY `movement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `ai_predictions`
--
ALTER TABLE `ai_predictions`
  ADD CONSTRAINT `ai_predictions_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `alerts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alerts_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `incoming_orders`
--
ALTER TABLE `incoming_orders`
  ADD CONSTRAINT `incoming_orders_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD CONSTRAINT `invoice_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`);

--
-- Constraints for table `stock_movements`
--
ALTER TABLE `stock_movements`
  ADD CONSTRAINT `stock_movements_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `stock_movements_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
