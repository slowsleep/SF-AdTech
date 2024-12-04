-- MySQL dump 10.13  Distrib 8.0.32, for Linux (aarch64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `advertisers`
--

DROP TABLE IF EXISTS `advertisers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `advertisers` (
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `advertisers_user_id_foreign` (`user_id`),
  CONSTRAINT `advertisers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertisers`
--

LOCK TABLES `advertisers` WRITE;
/*!40000 ALTER TABLE `advertisers` DISABLE KEYS */;
INSERT INTO `advertisers` VALUES (2,'O\'Keefe, Hamill and Waelchi','2024-12-04 17:48:02','2024-12-04 17:48:02'),(5,'Durgan, Littel and Schumm','2024-12-04 17:48:02','2024-12-04 17:48:02'),(6,'Wolff LLC','2024-12-04 17:48:02','2024-12-04 17:48:02'),(9,'Rowe Ltd','2024-12-04 17:48:02','2024-12-04 17:48:02'),(11,'Sporer-Donnelly','2024-12-04 17:48:02','2024-12-04 17:48:02');
/*!40000 ALTER TABLE `advertisers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_11_07_112505_create_roles_table',1),(5,'2024_11_07_112506_add_role_to_users_table',1),(6,'2024_11_07_113134_create_advertisers_table',1),(7,'2024_11_07_113306_create_webmasters_table',1),(8,'2024_11_07_122028_create_site_themes_table',1),(9,'2024_11_07_125902_create_offers_table',1),(10,'2024_11_07_142848_create_offer_subscriptions_table',1),(11,'2024_11_13_184343_create_personal_access_tokens_table',1),(12,'2024_11_26_204606_create_offer_subscription_ref_logs_table',1),(13,'2024_12_03_143055_add_active_to_users_table',1),(14,'2024_12_04_165519_create_offer_subscription_ref_errors_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offer_subscription_ref_errors`
--

DROP TABLE IF EXISTS `offer_subscription_ref_errors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offer_subscription_ref_errors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ref_link_uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer_subscription_ref_errors`
--

LOCK TABLES `offer_subscription_ref_errors` WRITE;
/*!40000 ALTER TABLE `offer_subscription_ref_errors` DISABLE KEYS */;
INSERT INTO `offer_subscription_ref_errors` VALUES (1,'d2c24b2d-c814-4406-80db-8e1ad3ae2738','172.25.0.1','2024-12-04 17:49:10','2024-12-04 17:49:10'),(2,'d2c24b2d-c814-4406-80db-8e1ad3','172.25.0.1','2024-12-04 17:49:22','2024-12-04 17:49:22');
/*!40000 ALTER TABLE `offer_subscription_ref_errors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offer_subscription_ref_logs`
--

DROP TABLE IF EXISTS `offer_subscription_ref_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offer_subscription_ref_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `offer_subscription_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `offer_subscription_ref_logs_offer_subscription_id_foreign` (`offer_subscription_id`),
  CONSTRAINT `offer_subscription_ref_logs_offer_subscription_id_foreign` FOREIGN KEY (`offer_subscription_id`) REFERENCES `offer_subscriptions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer_subscription_ref_logs`
--

LOCK TABLES `offer_subscription_ref_logs` WRITE;
/*!40000 ALTER TABLE `offer_subscription_ref_logs` DISABLE KEYS */;
INSERT INTO `offer_subscription_ref_logs` VALUES (1,8,'2024-02-12 22:36:44','2024-12-04 17:48:02'),(2,4,'2024-03-23 13:39:53','2024-12-04 17:48:02'),(3,2,'2024-08-05 04:27:14','2024-12-04 17:48:02'),(4,5,'2024-09-25 02:03:05','2024-12-04 17:48:02'),(5,1,'2024-03-06 07:52:41','2024-12-04 17:48:02'),(6,5,'2024-11-10 09:17:42','2024-12-04 17:48:02'),(7,9,'2024-06-14 08:21:29','2024-12-04 17:48:02'),(8,3,'2024-10-08 19:24:20','2024-12-04 17:48:02'),(9,8,'2024-05-15 08:37:02','2024-12-04 17:48:02'),(10,5,'2024-06-16 10:13:31','2024-12-04 17:48:02'),(11,11,'2024-12-04 17:48:52','2024-12-04 17:48:52'),(12,11,'2024-12-04 17:48:59','2024-12-04 17:48:59');
/*!40000 ALTER TABLE `offer_subscription_ref_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offer_subscriptions`
--

DROP TABLE IF EXISTS `offer_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offer_subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `webmaster_id` bigint unsigned DEFAULT NULL,
  `offer_id` bigint unsigned DEFAULT NULL,
  `ref_link_uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `offer_subscriptions_webmaster_id_offer_id_unique` (`webmaster_id`,`offer_id`),
  KEY `offer_subscriptions_offer_id_foreign` (`offer_id`),
  CONSTRAINT `offer_subscriptions_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `offer_subscriptions_webmaster_id_foreign` FOREIGN KEY (`webmaster_id`) REFERENCES `webmasters` (`user_id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer_subscriptions`
--

LOCK TABLES `offer_subscriptions` WRITE;
/*!40000 ALTER TABLE `offer_subscriptions` DISABLE KEYS */;
INSERT INTO `offer_subscriptions` VALUES (1,4,10,'61af7bd7-0355-3eb8-9289-d2e02a255e7f','2024-12-04 17:48:02','2024-12-04 17:48:02'),(2,13,1,'01467186-76cf-3d0e-a245-9d1ce951b642','2024-12-04 17:48:02','2024-12-04 17:48:02'),(3,4,1,'bf8bdd6a-f2f1-3e7c-8347-f51ff2eb0ef8','2024-12-04 17:48:02','2024-12-04 17:48:02'),(4,7,10,'5170d4fa-9278-380c-b23a-1a46b7f31e9f','2024-12-04 17:48:02','2024-12-04 17:48:02'),(5,10,4,'9f3c57b3-efef-3203-8c83-84d3f350bca8','2024-12-04 17:48:02','2024-12-04 17:48:02'),(6,10,5,'6db3fce0-6d3e-30ce-bbdc-24a40027c5ef','2024-12-04 17:48:02','2024-12-04 17:48:02'),(7,4,4,'bfa0c3c6-761d-3213-8595-700f480a497e','2024-12-04 17:48:02','2024-12-04 17:48:02'),(8,13,5,'5efa8124-e6d1-3265-a042-e9656e099c4a','2024-12-04 17:48:02','2024-12-04 17:48:02'),(9,12,1,'0e9dc475-c056-3160-8a89-94d9e60cd28d','2024-12-04 17:48:02','2024-12-04 17:48:02'),(10,3,2,'8c1c9f66-1f08-3ccd-8ab9-6a814a5b4473','2024-12-04 17:48:02','2024-12-04 17:48:02'),(11,3,1,'d2c24b2d-c814-4406-80db-8e1ad3ae2734','2024-12-04 17:48:46','2024-12-04 17:48:46');
/*!40000 ALTER TABLE `offer_subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `advertiser_id` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_id` bigint unsigned DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `offers_advertiser_id_foreign` (`advertiser_id`),
  KEY `offers_theme_id_foreign` (`theme_id`),
  CONSTRAINT `offers_advertiser_id_foreign` FOREIGN KEY (`advertiser_id`) REFERENCES `advertisers` (`user_id`) ON DELETE SET NULL,
  CONSTRAINT `offers_theme_id_foreign` FOREIGN KEY (`theme_id`) REFERENCES `site_themes` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` VALUES (1,2,'cum',90.12,'http://www.langosh.net/',7,1,'2024-12-04 17:48:02','2024-12-04 17:48:02'),(2,2,'esse',16.28,'http://kozey.com/qui-quos-deleniti-et-odit-non-laboriosam.html',7,1,'2024-12-04 17:48:02','2024-12-04 17:48:02'),(3,9,'nulla',17.69,'http://stark.biz/assumenda-atque-fugiat-reiciendis-laudantium-qui-aspernatur-nisi.html',4,1,'2024-12-04 17:48:02','2024-12-04 17:48:02'),(4,9,'alias',9.82,'https://turner.biz/tempora-dolores-harum-magni-ipsum-numquam-optio.html',7,0,'2024-12-04 17:48:02','2024-12-04 17:48:02'),(5,2,'quis',18.34,'http://schroeder.org/quia-sit-dolores-reprehenderit-quas',3,0,'2024-12-04 17:48:02','2024-12-04 17:48:02'),(6,6,'assumenda',26.66,'http://www.little.com/',4,0,'2024-12-04 17:48:02','2024-12-04 17:48:02'),(7,5,'unde',23.91,'http://www.sanford.com/enim-in-est-cumque',2,1,'2024-12-04 17:48:02','2024-12-04 17:48:02'),(8,9,'eum',52.92,'http://www.rogahn.com/odio-voluptatum-a-vel-quas-quia-esse-in',2,0,'2024-12-04 17:48:02','2024-12-04 17:48:02'),(9,6,'provident',75.84,'https://www.schmitt.org/enim-perspiciatis-architecto-est-quia-et-recusandae',4,0,'2024-12-04 17:48:02','2024-12-04 17:48:02'),(10,5,'eum',68.19,'http://www.greenfelder.com/ut-dignissimos-atque-est-libero-alias',4,0,'2024-12-04 17:48:02','2024-12-04 17:48:02');
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2024-12-04 17:48:01','2024-12-04 17:48:01'),(2,'advertiser','2024-12-04 17:48:01','2024-12-04 17:48:01'),(3,'webmaster','2024-12-04 17:48:01','2024-12-04 17:48:01');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('0I2oqe91NAuopvludWjuWF788MEFNFSASOEOaGUP',1,'172.25.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:132.0) Gecko/20100101 Firefox/132.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZERLTmhZQUU3QmhJSUR5WTlJQWpSdXBWOW5kd3ZiMEw0ODFLRVM5ZyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vc2YtYWR0ZWNoLmxvY2FsL2FkbWluIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1733334564),('KE7qJDkvt5Lm1Wt7rzy03pILbpYzPDzRW6JCyyml',3,'172.25.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:132.0) Gecko/20100101 Firefox/132.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNWhIUmtrcTlXOEhBM09wMGp6bGZENFV6eWtoOTBRcHJsZ3o4cnphNiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjYxOiJodHRwOi8vc2YtYWR0ZWNoLmxvY2FsL3IvZDJjMjRiMmQtYzgxNC00NDA2LTgwZGItOGUxYWQzYWUyNzM0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9',1733334539);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_themes`
--

DROP TABLE IF EXISTS `site_themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site_themes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_themes`
--

LOCK TABLES `site_themes` WRITE;
/*!40000 ALTER TABLE `site_themes` DISABLE KEYS */;
INSERT INTO `site_themes` VALUES (1,'красота','2024-12-04 17:48:02','2024-12-04 17:48:02'),(2,'здоровье','2024-12-04 17:48:02','2024-12-04 17:48:02'),(3,'игры','2024-12-04 17:48:02','2024-12-04 17:48:02'),(4,'мода','2024-12-04 17:48:02','2024-12-04 17:48:02'),(5,'музыка','2024-12-04 17:48:02','2024-12-04 17:48:02'),(6,'спорт','2024-12-04 17:48:02','2024-12-04 17:48:02'),(7,'технологии','2024-12-04 17:48:02','2024-12-04 17:48:02'),(8,'юмор','2024-12-04 17:48:02','2024-12-04 17:48:02');
/*!40000 ALTER TABLE `site_themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint unsigned DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@local.host','2024-12-04 17:48:01','$2y$12$CQlqgNpYt1TUA7gqxbckn.LAadOyFbe2I6NOzzytU9C745h4kR3o6','BWOylzeL9j','2024-12-04 17:48:02','2024-12-04 17:48:02',1,1),(2,'advertiser','advertiser@local.host','2024-12-04 17:48:02','$2y$12$CQlqgNpYt1TUA7gqxbckn.LAadOyFbe2I6NOzzytU9C745h4kR3o6','H54mQ0DoAj','2024-12-04 17:48:02','2024-12-04 17:48:02',2,1),(3,'webmaster','webmaster@local.host','2024-12-04 17:48:02','$2y$12$CQlqgNpYt1TUA7gqxbckn.LAadOyFbe2I6NOzzytU9C745h4kR3o6','MofJbWenQo','2024-12-04 17:48:02','2024-12-04 17:48:02',3,1),(4,'Lori Barton','freynolds@example.org','2024-12-04 17:48:02','$2y$12$CQlqgNpYt1TUA7gqxbckn.LAadOyFbe2I6NOzzytU9C745h4kR3o6','0fgor82AGd','2024-12-04 17:48:02','2024-12-04 17:48:02',3,1),(5,'Providenci Friesen','rachael.reilly@example.net','2024-12-04 17:48:02','$2y$12$CQlqgNpYt1TUA7gqxbckn.LAadOyFbe2I6NOzzytU9C745h4kR3o6','o1KGkDvVII','2024-12-04 17:48:02','2024-12-04 17:48:02',2,1),(6,'Reece Klocko V','elda25@example.org','2024-12-04 17:48:02','$2y$12$CQlqgNpYt1TUA7gqxbckn.LAadOyFbe2I6NOzzytU9C745h4kR3o6','iPHAo43eh6','2024-12-04 17:48:02','2024-12-04 17:48:02',2,1),(7,'Itzel Tillman','hans.gutmann@example.com','2024-12-04 17:48:02','$2y$12$CQlqgNpYt1TUA7gqxbckn.LAadOyFbe2I6NOzzytU9C745h4kR3o6','cirOPm9CHY','2024-12-04 17:48:02','2024-12-04 17:48:02',3,1),(8,'Tierra Wisoky','bridgette98@example.org','2024-12-04 17:48:02','$2y$12$CQlqgNpYt1TUA7gqxbckn.LAadOyFbe2I6NOzzytU9C745h4kR3o6','EMm7fs9Yke','2024-12-04 17:48:02','2024-12-04 17:48:02',3,1),(9,'Pauline Quitzon','medhurst.elliott@example.com','2024-12-04 17:48:02','$2y$12$CQlqgNpYt1TUA7gqxbckn.LAadOyFbe2I6NOzzytU9C745h4kR3o6','xPiEko3xaT','2024-12-04 17:48:02','2024-12-04 17:48:02',2,1),(10,'Grayce Kunde','noberbrunner@example.com','2024-12-04 17:48:02','$2y$12$CQlqgNpYt1TUA7gqxbckn.LAadOyFbe2I6NOzzytU9C745h4kR3o6','j2xvKqSGOM','2024-12-04 17:48:02','2024-12-04 17:48:02',3,1),(11,'Maria Bradtke MD','dwillms@example.org','2024-12-04 17:48:02','$2y$12$CQlqgNpYt1TUA7gqxbckn.LAadOyFbe2I6NOzzytU9C745h4kR3o6','6MRKU2wPJq','2024-12-04 17:48:02','2024-12-04 17:48:02',2,1),(12,'Verona Rath PhD','jtorp@example.com','2024-12-04 17:48:02','$2y$12$CQlqgNpYt1TUA7gqxbckn.LAadOyFbe2I6NOzzytU9C745h4kR3o6','i5fXw206uC','2024-12-04 17:48:02','2024-12-04 17:48:02',3,1),(13,'Albertha Schuppe V','rebeca77@example.net','2024-12-04 17:48:02','$2y$12$CQlqgNpYt1TUA7gqxbckn.LAadOyFbe2I6NOzzytU9C745h4kR3o6','58tJ1lMhK2','2024-12-04 17:48:02','2024-12-04 17:48:02',3,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webmasters`
--

DROP TABLE IF EXISTS `webmasters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `webmasters` (
  `user_id` bigint unsigned NOT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `webmasters_user_id_foreign` (`user_id`),
  CONSTRAINT `webmasters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webmasters`
--

LOCK TABLES `webmasters` WRITE;
/*!40000 ALTER TABLE `webmasters` DISABLE KEYS */;
INSERT INTO `webmasters` VALUES (3,'http://www.breitenberg.com/laborum-et-omnis-error-consequatur-sunt-et-eos','2024-12-04 17:48:02','2024-12-04 17:48:02'),(4,'http://www.kozey.com/aut-et-totam-nihil-dolores-quos-est','2024-12-04 17:48:02','2024-12-04 17:48:02'),(7,'http://wilderman.net/culpa-aut-perferendis-repudiandae-adipisci','2024-12-04 17:48:02','2024-12-04 17:48:02'),(8,'http://www.welch.com/','2024-12-04 17:48:02','2024-12-04 17:48:02'),(10,'http://www.franecki.com/','2024-12-04 17:48:02','2024-12-04 17:48:02'),(12,'http://swaniawski.com/atque-id-accusantium-itaque-corporis-consequatur-velit-sit','2024-12-04 17:48:02','2024-12-04 17:48:02'),(13,'http://www.ortiz.info/','2024-12-04 17:48:02','2024-12-04 17:48:02');
/*!40000 ALTER TABLE `webmasters` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-04 19:12:00
