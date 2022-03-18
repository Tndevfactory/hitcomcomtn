-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: hitcomdb
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `en_banner_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_banner_btn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_banner_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_banner_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fr_banner_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fr_banner_btn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fr_banner_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fr_banner_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_banner_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_banner_btn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_banner_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_banner_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carousels`
--

DROP TABLE IF EXISTS `carousels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carousels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fr_carousel_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fr_carousel_btn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fr_carousel_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fr_carousel_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_carousel_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_carousel_btn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_carousel_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_carousel_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_carousel_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_carousel_btn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_carousel_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_carousel_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carousels`
--

LOCK TABLES `carousels` WRITE;
/*!40000 ALTER TABLE `carousels` DISABLE KEYS */;
/*!40000 ALTER TABLE `carousels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fr_category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_category_slug_unique` (`category_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Art de table','Table art','فنون المائدة','media/categories/table-art-category-thumb.png','fa-solid fa-utensils','table-arts','2022-02-21 23:00:00','2022-02-21 23:00:00',NULL),(2,'Decoration','Decoration','الديكورات','media/categories/decoration-category-thumb.png','fa-solid fa-snowman','decoration','2022-02-21 23:00:00','2022-02-21 23:00:00',NULL),(3,'Habillement','Clothing','ملابس','media/categories/clothing-category-thumb.png','fa-solid fa-shirt','clothing','2022-02-21 23:00:00','2022-02-21 23:00:00',NULL),(4,'Bijous','Jewelry','مجوهرات','media/categories/jewelry-category-thumb.png','fa-solid fa-gem','jewelry','2022-02-21 23:00:00','2022-02-21 23:00:00',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorystocks`
--

DROP TABLE IF EXISTS `categorystocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorystocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_stock_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_stock_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorystocks_category_stock_slug_unique` (`category_stock_slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorystocks`
--

LOCK TABLES `categorystocks` WRITE;
/*!40000 ALTER TABLE `categorystocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorystocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentproducts`
--

DROP TABLE IF EXISTS `commentproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commentproducts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `ratingproduct_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentproducts`
--

LOCK TABLES `commentproducts` WRITE;
/*!40000 ALTER TABLE `commentproducts` DISABLE KEYS */;
INSERT INTO `commentproducts` VALUES (1,'c\'est un produit bien',1,2,1,'2022-02-22 23:00:00','2022-02-22 23:00:00',NULL),(2,'tres satisfait de ce produit',1,3,2,'2022-02-22 23:00:00','2022-02-22 23:00:00',NULL);
/*!40000 ALTER TABLE `commentproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentsellers`
--

DROP TABLE IF EXISTS `commentsellers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commentsellers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `seller_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `ratingseller_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentsellers`
--

LOCK TABLES `commentsellers` WRITE;
/*!40000 ALTER TABLE `commentsellers` DISABLE KEYS */;
INSERT INTO `commentsellers` VALUES (1,'best shop',1,2,1,'2022-03-08 23:00:00','2022-03-08 23:00:00',NULL);
/*!40000 ALTER TABLE `commentsellers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compaign_product`
--

DROP TABLE IF EXISTS `compaign_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compaign_product` (
  `compaign_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`compaign_id`,`product_id`),
  KEY `compaign_product_product_id_foreign` (`product_id`),
  CONSTRAINT `compaign_product_compaign_id_foreign` FOREIGN KEY (`compaign_id`) REFERENCES `compaigns` (`id`) ON DELETE CASCADE,
  CONSTRAINT `compaign_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compaign_product`
--

LOCK TABLES `compaign_product` WRITE;
/*!40000 ALTER TABLE `compaign_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `compaign_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compaigns`
--

DROP TABLE IF EXISTS `compaigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compaigns` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compaigns`
--

LOCK TABLES `compaigns` WRITE;
/*!40000 ALTER TABLE `compaigns` DISABLE KEYS */;
/*!40000 ALTER TABLE `compaigns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `reduction_rate` decimal(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ctas`
--

DROP TABLE IF EXISTS `ctas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ctas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fr_cta_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fr_cta_btn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fr_cta_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_fr_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_cta_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_cta_btn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_cta_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_cta_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_cta_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_cta_btn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_cta_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_cta_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctas`
--

LOCK TABLES `ctas` WRITE;
/*!40000 ALTER TABLE `ctas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ctas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_in_dollar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `currencies_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'dollar','1','$','2022-02-21 23:00:00','2022-02-21 23:00:00'),(2,'euro','1.1345','€','2022-02-21 23:00:00','2022-02-21 23:00:00');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deliveries`
--

DROP TABLE IF EXISTS `deliveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deliveries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `truck_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivered` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliveries`
--

LOCK TABLES `deliveries` WRITE;
/*!40000 ALTER TABLE `deliveries` DISABLE KEYS */;
/*!40000 ALTER TABLE `deliveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rate` decimal(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fees`
--

LOCK TABLES `fees` WRITE;
/*!40000 ALTER TABLE `fees` DISABLE KEYS */;
/*!40000 ALTER TABLE `fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media/users/empty-user.jpg',
  `thumb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media/users/empty-user.jpg',
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',1,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(2,'media/products/wood-basket-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',1,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(3,'media/products/wood-bol-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',3,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(4,'media/products/wood-spatula-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',3,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(5,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',2,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(6,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',2,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(7,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',4,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(8,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',4,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(9,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',4,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(10,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',5,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(11,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',5,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(12,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',6,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(13,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',6,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(14,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',6,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(15,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',15,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(16,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',16,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(17,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',17,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(18,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',18,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(19,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',19,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(20,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',20,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(21,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',21,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(22,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',22,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(23,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',23,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL),(24,'media/products/black-carpet-product-img-thumb.png','media/products/black-carpet-product-img-thumb.png',24,'2022-02-24 23:00:00','2022-02-24 23:00:00',NULL);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2019_08_19_000000_create_failed_jobs_table',1),(9,'2019_12_14_000001_create_personal_access_tokens_table',1),(10,'2022_02_11_043623_create_categorystocks_table',1),(11,'2022_02_12_005435_create_stocks_table',1),(12,'2022_02_12_005518_create_fees_table',1),(13,'2022_02_12_005535_create_categories_table',1),(14,'2022_02_12_005549_create_subcategories_table',1),(15,'2022_02_12_005604_create_taxes_table',1),(16,'2022_02_12_005652_create_products_table',1),(17,'2022_02_12_005703_create_images_table',1),(18,'2022_02_12_005741_create_commentproducts_table',1),(19,'2022_02_12_005753_create_commentsellers_table',1),(20,'2022_02_12_005817_create_orders_table',1),(21,'2022_02_12_005831_create_orderitems_table',1),(22,'2022_02_12_005852_create_coupons_table',1),(23,'2022_02_20_103712_create_shops_table',1),(24,'2022_02_20_104205_create_permissions_table',1),(25,'2022_02_20_112137_create_permission_user_table',1),(26,'2022_02_20_124524_create_notifications_table',1),(27,'2022_02_21_132632_create_compaigns_table',1),(28,'2022_02_21_133542_create_compaign_product_table',1),(29,'2022_02_21_134608_create_ctas_table',1),(30,'2022_02_21_151438_create_carousels_table',1),(31,'2022_02_21_151451_create_banners_table',1),(32,'2022_02_21_161234_create_wishlists_table',1),(33,'2022_02_22_140646_create_currencies_table',1),(34,'2022_02_22_142338_create_sessions_table',1),(35,'2022_02_23_100903_create_ratingproducts_table',1),(36,'2022_02_23_100934_create_ratingsellers_table',1),(37,'2022_02_26_082842_create_wishlists_table',2),(38,'2022_03_07_010248_create_themes_table',3),(39,'2022_03_07_011202_create_deliveries_table',3),(40,'2022_03_07_060908_create_shippings_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('71d41ca1-a79c-444d-8188-88c0315d955d','App\\Notifications\\MessageNotification','App\\Models\\User',2,'{\"subject\":\"notify from admin\",\"message\":\"notify from admin\",\"language\":\"fr\"}',NULL,'2022-02-24 14:00:56','2022-02-24 14:00:56');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderitems`
--

DROP TABLE IF EXISTS `orderitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orderitems` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `productid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `productname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `order_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderitems`
--

LOCK TABLES `orderitems` WRITE;
/*!40000 ALTER TABLE `orderitems` DISABLE KEYS */;
/*!40000 ALTER TABLE `orderitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order_status` enum('pending','completed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `currency` enum('dollar','euro') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dollar',
  `payment_mode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_ht` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_ttc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `coupon_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_user` (
  `permission_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`permission_id`,`user_id`),
  KEY `permission_user_user_id_foreign` (`user_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_user`
--

LOCK TABLES `permission_user` WRITE;
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
INSERT INTO `permission_user` VALUES (4,2,NULL,NULL),(5,2,NULL,NULL);
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'system','2022-02-01 23:00:00','2022-02-01 23:00:00'),(2,'admin','2022-02-01 23:00:00','2022-02-01 23:00:00'),(3,'list-product','2022-02-01 23:00:00','2022-02-01 23:00:00'),(4,'create-product','2022-02-01 23:00:00','2022-02-01 23:00:00'),(5,'read-product','2022-02-01 23:00:00','2022-02-01 23:00:00'),(6,'update-product','2022-02-01 23:00:00','2022-02-01 23:00:00'),(7,'delete-product','2022-02-01 23:00:00','2022-02-01 23:00:00'),(8,'list-user','2022-02-01 23:00:00','2022-02-01 23:00:00'),(9,'create-user','2022-02-01 23:00:00','2022-02-01 23:00:00'),(10,'read-user','2022-02-01 23:00:00','2022-02-01 23:00:00'),(11,'update-user','2022-02-01 23:00:00','2022-02-01 23:00:00'),(12,'delete-user','2022-02-01 23:00:00','2022-02-01 23:00:00');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fr_product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fr_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `discount` decimal(20,2) DEFAULT NULL,
  `status` enum('sold','available','stolen','damaged','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `subcategory_id` bigint unsigned NOT NULL,
  `stock_id` bigint unsigned NOT NULL,
  `seller_id` bigint unsigned NOT NULL,
  `fee_id` bigint unsigned NOT NULL,
  `tax_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Assiettes blanche','white plate','صحن ابيض','white-plate-1','margoum argile blanc de qualite,margoum argile blanc de qualite,margoum argile blanc de qualite, margoum argile blanc de qualite,margoum argile blanc de qualite,margoum argile blanc de qualite, margoum argile blanc de qualite,margoum argile blanc de qualite,margoum argile blanc de qualite, margoum argile blanc de qualite,margoum argile blanc de qualite,margoum argile blanc de qualite,margoum argile blanc de qualite,margoum argile blanc de qualite,margoum argile blanc de qualite, margoum argile blanc de qualite,margoum argile blanc de qualite,margoum argile blanc de qualite, margoum argile blanc de qualite,margoum argile blanc de qualite,margoum argile blanc de qualite, margoum argile blanc de qualite, margoqualite','white margoum , cheap and good, white margoum , cheap and good, white margoum , cheap and good, white margoum , cheap and good, white margoum , cheap and good, white margoum , cheap and good','احسن مزقوم عربي, احسن مزقوم عربي, احسن مزقوم عربي, احسن مزقوم عربي,احسن مزقوم عربي',230.00,10.00,'available',1,1,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(2,'Assiettes noire','black plate','صحن اسود','black-plate-2','margoum argile blanc de qualite','white clay high qualite','صلصال ابيض دو جودة عالية',100.00,5.00,'available',1,3,1,1,2,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(3,'Assiettes rouge','red plate','صحن ابيض','red-plate-3','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',900.45,19.00,'available',1,2,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(4,'margoum blanc','white  ','مرقوم ابيض','margoum-white-5','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,0.00,'available',7,1,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(5,'margoum blanc','white  ','مرقوم ابيض','margoum-white-6','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',14.45,0.00,'available',8,1,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(6,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-7','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,0.00,'available',9,2,1,6,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(7,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-8','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,19.00,'available',10,1,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(8,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-9','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,19.00,'available',11,4,1,2,3,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(9,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-10','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',1437.45,0.00,'available',15,1,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(10,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-11','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,19.00,'available',16,3,1,1,3,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(11,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-12','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,19.00,'available',15,1,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(12,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-13','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,19.00,'available',16,3,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(13,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-14','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',13.00,19.00,'available',3,1,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(14,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-15','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,0.00,'available',3,1,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(15,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-16','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',2320.33,19.00,'available',3,3,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(16,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-17','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,0.00,'available',4,4,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(17,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-18','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',630.45,19.00,'available',4,2,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(18,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-19','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,0.00,'sold',4,1,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(19,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-20','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,0.00,'available',17,1,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(20,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-21','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',370.90,19.00,'available',18,4,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(21,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-22','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,0.00,'available',19,1,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(22,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-23','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,0.00,'available',17,4,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(23,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-24','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,19.00,'available',18,1,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(24,'margoum blanc','white margoum ','مرقوم ابيض','margoum-white-3','margoum blanc de qualite','white margoum , cheap and good','احسن مزقوم عربي',230.45,19.00,'available',19,1,1,1,1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratingproducts`
--

DROP TABLE IF EXISTS `ratingproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ratingproducts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rating` tinyint unsigned DEFAULT NULL,
  `product_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratingproducts`
--

LOCK TABLES `ratingproducts` WRITE;
/*!40000 ALTER TABLE `ratingproducts` DISABLE KEYS */;
INSERT INTO `ratingproducts` VALUES (1,2,1,2,'2022-03-03 23:00:00','2022-02-22 23:00:00'),(2,5,1,3,'2022-03-03 23:00:00','2022-02-22 23:00:00'),(3,3,2,2,'2022-03-03 23:00:00','2022-02-22 23:00:00');
/*!40000 ALTER TABLE `ratingproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratingsellers`
--

DROP TABLE IF EXISTS `ratingsellers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ratingsellers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rating` tinyint unsigned DEFAULT NULL,
  `shop_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratingsellers`
--

LOCK TABLES `ratingsellers` WRITE;
/*!40000 ALTER TABLE `ratingsellers` DISABLE KEYS */;
INSERT INTO `ratingsellers` VALUES (1,3,1,1,'2022-02-22 23:00:00','2022-02-22 23:00:00');
/*!40000 ALTER TABLE `ratingsellers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `sessions` VALUES ('WT0iB74QfKq6QwdREX4tkqWTOjoVTF1uTR2BpJFs',NULL,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36','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AHdpdGgiO2E6MDp7fXM6MTI6IgAqAHdpdGhDb3VudCI7YTowOnt9czoxOToicHJldmVudHNMYXp5TG9hZGluZyI7YjowO3M6MTA6IgAqAHBlclBhZ2UiO2k6MTU7czo2OiJleGlzdHMiO2I6MTtzOjE4OiJ3YXNSZWNlbnRseUNyZWF0ZWQiO2I6MDtzOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7czoxMzoiACoAYXR0cmlidXRlcyI7YTo5OntzOjI6ImlkIjtpOjE7czoxOToiZnJfc3ViY2F0ZWdvcnlfbmFtZSI7czoxNzoiQm9scyBldCBzYWxhZGllcnMiO3M6MTk6ImVuX3N1YmNhdGVnb3J5X25hbWUiO3M6MjE6IkJvd2xzIGFuZCBzYWxhZCBib3dscyI7czoxOToiYXJfc3ViY2F0ZWdvcnlfbmFtZSI7czoxNjoi2LPZhNi32KfZhtmK2KfYqiI7czoxNjoic3ViY2F0ZWdvcnlfc2x1ZyI7czoyMzoiQm93bHMtYW5kLXNhbGFkLWJvd2xzLTEiO3M6MTE6ImNhdGVnb3J5X2lkIjtpOjE7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyMi0wMi0wMiAwMDowMDowMCI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyMi0wMi0wMiAwMDowMDowMCI7czoxMDoiZGVsZXRlZF9hdCI7Tjt9czoxMToiACoAb3JpZ2luYWwiO2E6OTp7czoyOiJpZCI7aToxO3M6MTk6ImZyX3N1YmNhdGVnb3J5X25hbWUiO3M6MTc6IkJvbHMgZXQgc2FsYWRpZXJzIjtzOjE5OiJlbl9zdWJjYXRlZ29yeV9uYW1lIjtzOjIxOiJCb3dscyBhbmQgc2FsYWQgYm93bHMiO3M6MTk6ImFyX3N1YmNhdGVnb3J5X25hbWUiO3M6MTY6Itiz2YTYt9in2YbZitin2KoiO3M6MTY6InN1YmNhdGVnb3J5X3NsdWciO3M6MjM6IkJvd2xzLWFuZC1zYWxhZC1ib3dscy0xIjtzOjExOiJjYXRlZ29yeV9pZCI7aToxO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjItMDItMDIgMDA6MDA6MDAiO3M6MTA6InVwZGF0ZWRf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O2E6OTp7czoyOiJpZCI7aTozO3M6MTk6ImZyX3N1YmNhdGVnb3J5X25hbWUiO3M6MjA6IlBsYW5jaGVzIGV0IHBsYXRlYXV4IjtzOjE5OiJlbl9zdWJjYXRlZ29yeV9uYW1lIjtzOjE2OiJCb2FyZHMgYW5kIHRyYXlzIjtzOjE5OiJhcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjI5OiLYp9mE2KPZhNmI2KfYrSDZiNin2YTYtdmI2KfZhiI7czoxNjoic3ViY2F0ZWdvcnlfc2x1ZyI7czoxODoiQm9hcmRzLWFuZC10cmF5cy0zIjtzOjExOiJjYXRlZ29yeV9pZCI7aToxO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjItMDItMDIgMDA6MDA6MDAiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjItMDItMDIgMDA6MDA6MDAiO3M6MTA6ImRlbGV0ZWRfYXQiO047fXM6MTE6IgAqAG9yaWdpbmFsIjthOjk6e3M6MjoiaWQiO2k6MztzOjE5OiJmcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjIwOiJQbGFuY2hlcyBldCBwbGF0ZWF1eCI7czoxOToiZW5fc3ViY2F0ZWdvcnlfbmFtZSI7czoxNjoiQm9hcmRzIGFuZCB0cmF5cyI7czoxOToiYXJfc3ViY2F0ZWdvcnlfbmFtZSI7czoyOToi2KfZhNij2YTZiNin2K0g2YjYp9mE2LXZiNin2YYiO3M6MTY6InN1YmNhdGVnb3J5X3NsdWciO3M6MTg6IkJvYXJkcy1hbmQtdHJheXMtMyI7czoxMToiY2F0ZWdvcnlfaWQiO2k6MTtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTAyIDAwOjAwOjAwIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTAyIDAwOjAwOjAwIjtzOjEwOiJkZWxldGVkX2F0IjtOO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjg6IgAqAGNhc3RzIjthOjE6e3M6MTA6ImRlbGV0ZWRfYXQiO3M6ODoiZGF0ZXRpbWUiO31zOjE3OiIAKgBjbGFzc0Nhc3RDYWNoZSI7YTowOnt9czoyMToiACoAYXR0cmlidXRlQ2FzdENhY2hlIjthOjA6e31zOjg6IgAqAGRhdGVzIjthOjA6e31zOjEzOiIAKgBkYXRlRm9ybWF0IjtOO3M6MTA6IgAqAGFwcGVuZHMiO2E6MDp7fXM6MTk6IgAqAGRpc3BhdGNoZXNFdmVudHMiO2E6MDp7fXM6MTQ6IgAqAG9ic2VydmFibGVzIjthOjA6e31zOjEyOiIAKgByZWxhdGlvbnMiO2E6MDp7fXM6MTA6IgAqAHRvdWNoZXMiO2E6MDp7fXM6MTA6InRpbWVzdGFtcHMiO2I6MTtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6NDp7aTowO3M6MTk6ImZyX3N1YmNhdGVnb3J5X25hbWUiO2k6MTtzOjE5OiJlbl9zdWJjYXRlZ29yeV9uYW1lIjtpOjI7czoxOToiYXJfc3ViY2F0ZWdvcnlfbmFtZSI7aTozO3M6MTY6InN1YmNhdGVnb3J5X3NsdWciO31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO31zOjE2OiIAKgBmb3JjZURlbGV0aW5nIjtiOjA7fWk6MztPOjIyOiJBcHBcTW9kZWxzXFN1YmNhdGVnb3J5IjozMTp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czoxMzoic3ViY2F0ZWdvcmllcyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjk6e3M6MjoiaWQiO2k6NDtzOjE5OiJmcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjIwOiJDb3V2ZXJ0cyBldCBzcGF0dWxlcyI7czoxOToiZW5fc3ViY2F0ZWdvcnlfbmFtZSI7czoyMzoiU2FsdCBhbmQgcGVwcGVyIHNoYWtlcnMiO3M6MTk6ImFyX3N1YmNhdGVnb3J5X25hbWUiO3M6MzQ6Itix2KzYp9isINin2YTZhdmE2K0g2YjYp9mE2YHZhNmB2YQiO3M6MTY6InN1YmNhdGVnb3J5X3NsdWciO3M6MjU6IlNhbHQtYW5kLXBlcHBlci1zaGFrZXJzLTQiO3M6MTE6ImNhdGVnb3J5X2lkIjtpOjE7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyMi0wMi0wMiAwMDowMDowMCI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyMi0wMi0wMiAwMDowMDowMCI7czoxMDoiZGVsZXRlZF9hdCI7Tjt9czoxMToiACoAb3JpZ2luYWwiO2E6OTp7czoyOiJpZCI7aTo0O3M6MTk6ImZyX3N1YmNhdGVnb3J5X25hbWUiO3M6MjA6IkNvdXZlcnRzIGV0IHNwYXR1bGVzIjtzOjE5OiJlbl9zdWJjYXRlZ29yeV9uYW1lIjtzOjIzOiJTYWx0IGFuZCBwZXBwZXIgc2hha2VycyI7czoxOToiYXJfc3ViY2F0ZWdvcnlfbmFtZSI7czozNDoi2LHYrNin2Kwg2KfZhNmF2YTYrSDZiNin2YTZgdmE2YHZhCI7czoxNjoic3ViY2F0ZWdvcnlfc2x1ZyI7czoyNToiU2FsdC1hbmQtcGVwcGVyLXNoYWtlcnMtNCI7czoxMToiY2F0ZWdvcnlfaWQiO2k6MTtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTAyIDAwOjAwOjAwIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTAyIDAwOjAwOjAwIjtzOjEwOiJkZWxldGVkX2F0IjtOO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjg6IgAqAGNhc3RzIjthOjE6e3M6MTA6ImRlbGV0ZWRfYXQiO3M6ODoiZGF0ZXRpbWUiO31zOjE3OiIAKgBjbGFzc0Nhc3RDYWNoZSI7YTowOnt9czoyMToiACoAYXR0cmlidXRlQ2FzdENhY2hlIjthOjA6e31zOjg6IgAqAGRhdGVzIjthOjA6e31zOjEzOiIAKgBkYXRlRm9ybWF0IjtOO3M6MTA6IgAqAGFwcGVuZHMiO2E6MDp7fXM6MTk6IgAqAGRpc3BhdGNoZXNFdmVudHMiO2E6MDp7fXM6MTQ6IgAqAG9ic2VydmFibGVzIjthOjA6e31zOjEyOiIAKgByZWxhdGlvbnMiO2E6MDp7fXM6MTA6IgAqAHRvdWNoZXMiO2E6MDp7fXM6MTA6InRpbWVzdGFtcHMiO2I6MTtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6NDp7aTowO3M6MTk6ImZyX3N1YmNhdGVnb3J5X25hbWUiO2k6MTtzOjE5OiJlbl9zdWJjYXRlZ29yeV9uYW1lIjtpOjI7czoxOToiYXJfc3ViY2F0ZWdvcnlfbmFtZSI7aTozO3M6MTY6InN1YmNhdGVnb3J5X3NsdWciO31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO31zOjE2OiIAKgBmb3JjZURlbGV0aW5nIjtiOjA7fWk6NDtPOjIyOiJBcHBcTW9kZWxzXFN1YmNhdGVnb3J5IjozMTp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czoxMzoic3ViY2F0ZWdvcmllcyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjk6e3M6MjoiaWQiO2k6NTtzOjE5OiJmcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjI0OiJTYWxpw6hyZXMgZXQgcG9pdnJpw6hyZXMiO3M6MTk6ImVuX3N1YmNhdGVnb3J5X25hbWUiO3M6MjA6IkN1dGxlcnkgYW5kIHNwYXR1bGFzIjtzOjE5OiJhcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjMzOiLYp9mE2LPZg9in2YPZitmGINmI2KfZhNmF2YTYp9i52YIiO3M6MTY6InN1YmNhdGVnb3J5X3NsdWciO3M6MjI6IkN1dGxlcnktYW5kLXNwYXR1bGFzLTUiO3M6MTE6ImNhdGVnb3J5X2lkIjtpOjE7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyMi0wMi0wMiAwMDowMDowMCI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyMi0wMi0wMiAwMDowMDowMCI7czoxMDoiZGVsZXRlZF9hdCI7Tjt9czoxMToiACoAb3JpZ2luYWwiO2E6OTp7czoyOiJpZCI7aTo1O3M6MTk6ImZyX3N1YmNhdGVnb3J5X25hbWUiO3M6MjQ6IlNhbGnDqHJlcyBldCBwb2l2cmnDqHJlcyI7czoxOToiZW5fc3ViY2F0ZWdvcnlfbmFtZSI7czoyMDoiQ3V0bGVyeSBhbmQgc3BhdHVsYXMiO3M6MTk6ImFyX3N1YmNhdGVnb3J5X25hbWUiO3M6MzM6Itin2YTYs9mD2KfZg9mK2YYg2YjYp9mE2YXZhNin2LnZgiI7czoxNjoic3ViY2F0ZWdvcnlfc2x1ZyI7czoyMjoiQ3V0bGVyeS1hbmQtc3BhdHVsYXMtNSI7czoxMToiY2F0ZWdvcnlfaWQiO2k6MTtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTAyIDAwOjAwOjAwIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTAyIDAwOjAwOjAwIjtzOjEwOiJkZWxldGVkX2F0IjtOO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjg6IgAqAGNhc3RzIjthOjE6e3M6MTA6ImRlbGV0ZWRfYXQiO3M6ODoiZGF0ZXRpbWUiO31zOjE3OiIAKgBjbGFzc0Nhc3RDYWNoZSI7YTowOnt9czoyMToiACoAYXR0cmlidXRlQ2FzdENhY2hlIjthOjA6e31zOjg6IgAqAGRhdGVzIjthOjA6e31zOjEzOiIAKgBkYXRlRm9ybWF0IjtOO3M6MTA6IgAqAGFwcGVuZHMiO2E6MDp7fXM6MTk6IgAqAGRpc3BhdGNoZXNFdmVudHMiO2E6MDp7fXM6MTQ6IgAqAG9ic2VydmFibGVzIjthOjA6e31zOjEyOiIAKgByZWxhdGlvbnMiO2E6MDp7fXM6MTA6IgAqAHRvdWNoZXMiO2E6MDp7fXM6MTA6InRpbWVzdGFtcHMiO2I6MTtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6NDp7aTowO3M6MTk6ImZyX3N1YmNhdGVnb3J5X25hbWUiO2k6MTtzOjE5OiJlbl9zdWJjYXRlZ29yeV9uYW1lIjtpOjI7czoxOToiYXJfc3ViY2F0ZWdvcnlfbmFtZSI7aTozO3M6MTY6InN1YmNhdGVnb3J5X3NsdWciO31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO31zOjE2OiIAKgBmb3JjZURlbGV0aW5nIjtiOjA7fWk6NTtPOjIyOiJBcHBcTW9kZWxzXFN1YmNhdGVnb3J5IjozMTp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czoxMzoic3ViY2F0ZWdvcmllcyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjk6e3M6MjoiaWQiO2k6NjtzOjE5OiJmcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjIyOiJBY2Nlc3NvaXJlcyBkZSBjdWlzaW5lIjtzOjE5OiJlbl9zdWJjYXRlZ29yeV9uYW1lIjtzOjE5OiJLaXRjaGVuIGFjY2Vzc29yaWVzIjtzOjE5OiJhcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjMxOiLYp9mD2LPYs9mI2KfYsdin2Kog2KfZhNmF2LfYqNiuIjtzOjE2OiJzdWJjYXRlZ29yeV9zbHVnIjtzOjIxOiJLaXRjaGVuLWFjY2Vzc29yaWVzLTYiO3M6MTE6ImNhdGVnb3J5X2lkIjtpOjE7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyMi0wMi0wMiAwMDowMDowMCI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyMi0wMi0wMiAwMDowMDowMCI7czoxMDoiZGVsZXRlZF9hdCI7Tjt9czoxMToiACoAb3JpZ2luYWwiO2E6OTp7czoyOiJpZCI7aTo2O3M6MTk6ImZyX3N1YmNhdGVnb3J5X25hbWUiO3M6MjI6IkFjY2Vzc29pcmVzIGRlIGN1aXNpbmUiO3M6MTk6ImVuX3N1YmNhdGVnb3J5X25hbWUiO3M6MTk6IktpdGNoZW4gYWNjZXNzb3JpZXMiO3M6MTk6ImFyX3N1YmNhdGVnb3J5X25hbWUiO3M6MzE6Itin2YPYs9iz2YjYp9ix2KfYqiDYp9mE2YXYt9io2K4iO3M6MTY6InN1YmNhdGVnb3J5X3NsdWciO3M6MjE6IktpdGNoZW4tYWNjZXNzb3JpZXMtNiI7czoxMToiY2F0ZWdvcnlfaWQiO2k6MTtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTAyIDAwOjAwOjAwIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTAyIDAwOjAwOjAwIjtzOjEwOiJkZWxldGVkX2F0IjtOO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjg6IgAqAGNhc3RzIjthOjE6e3M6MTA6ImRlbGV0ZWRfYXQiO3M6ODoiZGF0ZXRpbWUiO31zOjE3OiIAKgBjbGFzc0Nhc3RDYWNoZSI7YTowOnt9czoyMToiACoAYXR0cmlidXRlQ2FzdENhY2hlIjthOjA6e31zOjg6IgAqAGRhdGVzIjth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NjoiZXhpc3RzIjtiOjE7czoxODoid2FzUmVjZW50bHlDcmVhdGVkIjtiOjA7czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO3M6MTM6IgAqAGF0dHJpYnV0ZXMiO2E6OTp7czoyOiJpZCI7aTo3O3M6MTk6ImZyX3N1YmNhdGVnb3J5X25hbWUiO3M6MjY6IkTDqWNvcmF0aW9uIGTigJlpbnTDqXJpZXVyIjtzOjE5OiJlbl9zdWJjYXRlZ29yeV9uYW1lIjtzOjE5OiJJbnRlcmlvciBkZWNvcmF0aW9uIjtzOjE5OiJhcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjI5OiLYp9mE2K/ZitmD2YjYsSDYp9mE2K/Yp9iu2YTZiiI7czoxNjoic3ViY2F0ZWdvcnlfc2x1ZyI7czoyMToiSW50ZXJpb3ItZGVjb3JhdGlvbi03IjtzOjExOiJjYXRlZ29yeV9pZCI7aToyO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjItMDItMDIgMDA6MDA6MDAiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjItMDItMDIgMDA6MDA6MDAiO3M6MTA6ImRlbGV0ZWRfYXQiO047fXM6MTE6IgAqAG9yaWdpbmFsIjthOjk6e3M6MjoiaWQiO2k6NztzOjE5OiJmcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjI2OiJEw6ljb3JhdGlvbiBk4oCZaW50w6lyaWV1ciI7czoxOToiZW5fc3ViY2F0ZWdvcnlfbmFtZSI7czoxOToiSW50ZXJpb3IgZGVjb3JhdGlvbiI7czoxOToiYXJfc3ViY2F0ZWdvcnlfbmFtZSI7czoyOToi2KfZhNiv2YrZg9mI2LEg2KfZhNiv2KfYrtmE2YoiO3M6MTY6InN1YmNhdGVnb3J5X3NsdWciO3M6MjE6IkludGVyaW9yLWRlY29yYXRpb24tNyI7czoxMToiY2F0ZWdvcnlfaWQiO2k6MjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTAyIDAwOjAwOjAwIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTAyIDAwOjAwOjAwIjtzOjEwOiJkZWxldGVkX2F0IjtOO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjg6IgAqAGNhc3RzIjthOjE6e3M6MTA6ImRlbGV0ZWRfYXQiO3M6ODoiZGF0ZXRpbWUiO31zOjE3OiIAKgBjbGFzc0Nhc3RDYWNoZSI7YTowOnt9czoyMToiACoAYXR0cmlidXRlQ2FzdENhY2hlIjthOjA6e31zOjg6IgAqAGRhdGVzIjthOjA6e31zOjEzOiIAKgBkYXRlRm9ybWF0IjtOO3M6MTA6IgAqAGFwcGVuZHMiO2E6MDp7fXM6MTk6IgAqAGRpc3BhdGNoZXNFdmVudHMiO2E6MDp7fXM6MTQ6IgAqAG9ic2VydmFibGVzIjthOjA6e31zOjEyOiIAKgByZWxhdGlvbnMiO2E6MDp7fXM6MTA6IgAqAHRvdWNoZXMiO2E6MDp7fXM6MTA6InRpbWVzdGFtcHMiO2I6MTtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6NDp7aTowO3M6MTk6ImZyX3N1YmNhdGVnb3J5X25hbWUiO2k6MTtzOjE5OiJlbl9zdWJjYXRlZ29yeV9uYW1lIjtpOjI7czoxOToiYXJfc3ViY2F0ZWdvcnlfbmFtZSI7aTozO3M6MTY6InN1YmNhdGVnb3J5X3NsdWciO31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO31zOjE2OiIAKgBmb3JjZURlbGV0aW5nIjtiOjA7fWk6MTtPOjIyOiJBcHBcTW9kZWxzXFN1YmNhdGVnb3J5IjozMTp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czoxMzoic3ViY2F0ZWdvcmllcyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjk6e3M6MjoiaWQiO2k6ODtzOjE5OiJmcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjIzOiJFeHTDqXJpZXVyIGV0IGphcmRpbmFnZSI7czoxOToiZW5fc3ViY2F0ZWdvcnlfbmFtZSI7czoyMjoiT3V0ZG9vcnMgYW5kIGdhcmRlbmluZyI7czoxOToiYXJfc3ViY2F0ZWdvcnlfbmFtZSI7czoxNDoi2KfZhNio2LPYqtmG2KkiO3M6MTY6InN1YmNhdGVnb3J5X3NsdWciO3M6MjQ6Ik91dGRvb3JzLWFuZC1nYXJkZW5pbmctOCI7czoxMToiY2F0ZWdvcnlfaWQiO2k6MjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTAyIDAwOjAwOjAwIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTAyIDAwOjAwOjAwIjtzOjEwOiJkZWxldGVkX2F0IjtOO31zOjExOiIAKgBvcmlnaW5hbCI7YTo5OntzOjI6ImlkIjtpOjg7czoxOToiZnJfc3ViY2F0ZWdvcnlfbmFtZSI7czoyMzoiRXh0w6lyaWV1ciBldCBqYXJkaW5hZ2UiO3M6MTk6ImVuX3N1YmNhdGVnb3J5X25hbWUiO3M6MjI6Ik91dGRvb3JzIGFuZCBnYXJkZW5pbmciO3M6MTk6ImFyX3N1YmNhdGVnb3J5X25hbWUiO3M6MTQ6Itin2YTYqNiz2KrZhtipIjtzOjE2OiJzdWJjYXRlZ29yeV9zbHVnIjtzOjI0OiJPdXRkb29ycy1hbmQtZ2FyZGVuaW5nLTgiO3M6MTE6ImNhdGVnb3J5X2lkIjtpOjI7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyMi0wMi0wMiAwMDowMDowMCI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyMi0wMi0wMiAwMDowMDowMCI7czoxMDoiZGVsZXRlZF9hdCI7Tjt9czoxMDoiACoAY2hhbmdlcyI7YTowOnt9czo4OiIAKgBjYXN0cyI7YToxOntz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NjoiZnJfY2F0ZWdvcnlfbmFtZSI7czoxMToiSGFiaWxsZW1lbnQiO3M6MTY6ImVuX2NhdGVnb3J5X25hbWUiO3M6ODoiQ2xvdGhpbmciO3M6MTY6ImFyX2NhdGVnb3J5X25hbWUiO3M6MTA6ItmF2YTYp9io2LMiO3M6MTQ6ImNhdGVnb3J5X2ltYWdlIjtzOjQ0OiJtZWRpYS9jYXRlZ29yaWVzL2Nsb3RoaW5nLWNhdGVnb3J5LXRodW1iLnBuZyI7czo0OiJpY29uIjtzOjE3OiJmYS1zb2xpZCBmYS1zaGlydCI7czoxMzoiY2F0ZWdvcnlfc2x1ZyI7czo4OiJjbG90aGluZyI7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyMi0wMi0yMiAwMDowMDowMCI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyMi0wMi0yMiAwMDowMDowMCI7czoxMDoiZGVsZXRlZF9hdCI7Tjt9czoxMToiACoAb3JpZ2luYWwiO2E6MTA6e3M6MjoiaWQiO2k6MztzOjE2OiJmcl9jYXRlZ29yeV9uYW1lIjtzOjExOiJIYWJpbGxlbWVudCI7czoxNjoiZW5fY2F0ZWdvcnlfbmFtZSI7czo4OiJDbG90aGluZyI7czoxNjoiYXJfY2F0ZWdvcnlfbmFtZSI7czoxMDoi2YXZhNin2KjYsyI7czoxNDoiY2F0ZWdvcnlfaW1hZ2UiO3M6NDQ6Im1lZGlhL2NhdGVnb3JpZXMvY2xvdGhpbmctY2F0ZWdvcnktdGh1bWIucG5nIjtzOjQ6Imljb24iO3M6MTc6ImZhLXNvbGlkIGZhLXNoaXJ0IjtzOjEzOiJjYXRlZ29yeV9zbHVnIjtzOjg6ImNsb3RoaW5nIjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTIyIDAwOjAwOjAwIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTIyIDAwOjAwOjAwIjtzOjEwOiJkZWxldGVkX2F0IjtOO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjg6IgAqAGNhc3RzIjthOjE6e3M6MTA6ImRlbGV0ZWRfYXQiO3M6ODoiZGF0ZXRpbWUiO31zOjE3OiIAKgBjbGFzc0Nhc3RDYWNoZSI7YTowOnt9czoyMToiACoAYXR0cmlidXRlQ2FzdENhY2hlIjthOjA6e31zOjg6IgAqAGRhdGVzIjthOjA6e31zOjEzOiIAKgBkYXRlRm9ybWF0IjtOO3M6MTA6IgAqAGFwcGVuZHMiO2E6MDp7fXM6MTk6IgAqAGRpc3BhdGNoZXNFdmVudHMiO2E6MDp7fXM6MTQ6IgAqAG9ic2VydmFibGVzIjthOjA6e31zOjEyOiIAKgByZWxhdGlvbnMiO2E6MTp7czoxMzoic3ViY2F0ZWdvcmllcyI7TzozOToiSWxsdW1pbmF0ZVxEYXRhYmFzZVxFbG9xdWVudFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjI6e2k6MDtPOjIyOiJBcHBcTW9kZWxzXFN1YmNhdGVnb3J5IjozMTp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czoxMzoic3ViY2F0ZWdvcmllcyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjk6e3M6MjoiaWQiO2k6MTU7czoxOToiZnJfc3ViY2F0ZWdvcnlfbmFtZSI7czoxNToiU2FjcyBldCBiYWdhZ2VzIjtzOjE5OiJlbl9zdWJjYXRlZ29yeV9uYW1lIjtzOjE2OiJCYWdzIGFuZCBsdWdnYWdlIjtzOjE5OiJhcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjMxOiLYp9mE2K3Zgtin2KbYqCDZiNin2YTYo9mF2KrYudipIjtzOjE2OiJzdWJjYXRlZ29yeV9zbHVnIjtzOjE5OiJCYWdzLWFuZC1sdWdnYWdlLTE1IjtzOjExOiJjYXRlZ29yeV9pZCI7aTozO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjItMDItMDIgMDA6MDA6MDAiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjItMDItMDIgMDA6MDA6MDAiO3M6MTA6ImRlbGV0ZWRfYXQiO047fXM6MTE6IgAqAG9yaWdpbmFsIjthOjk6e3M6MjoiaWQiO2k6MTU7czoxOToiZnJfc3ViY2F0ZWdvcnlfbmFtZSI7czoxNToiU2FjcyBldCBiYWdhZ2VzIjtzOjE5OiJlbl9zdWJjYXRlZ29yeV9uYW1lIjtzOjE2OiJCYWdzIGFuZCBsdWdnYWdlIjtzOjE5OiJhcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjMxOiLYp9mE2K3Zgtin2KbYqCDZiNin2YTYo9mF2KrYudipIjtzOjE2OiJzdWJjYXRlZ29yeV9zbHVnIjtzOjE5OiJCYWdzLWFuZC1sdWdnYWdlLTE1IjtzOjExOiJjYXRlZ29yeV9pZCI7aTozO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjItMDItMDIgMDA6MDA6MDAiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjItMDItMDIgMDA6MDA6MDAiO3M6MTA6ImRlbGV0ZWRfYXQiO047fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6MTp7czoxMDoiZGVsZXRlZF9hdCI7czo4OiJkYXRldGltZSI7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6ODoiACoAZGF0ZXMiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YTowOnt9czoxMDoiACoAdG91Y2hlcyI7YTowOnt9czoxMDoidGltZXN0YW1wcyI7YjoxO3M6OToiACoAaGlkZGVuIjthOjA6e31zOjEwOiIAKgB2aXNpYmxlIjthOjA6e31zOjExOiIAKgBmaWxsYWJsZSI7YTo0OntpOjA7czoxOToiZnJfc3ViY2F0ZWdvcnlfbmFtZSI7aToxO3M6MTk6ImVuX3N1YmNhdGVnb3J5X25hbWUiO2k6MjtzOjE5OiJhcl9zdWJjYXRlZ29yeV9uYW1lIjtpOjM7czoxNjoic3ViY2F0ZWdvcnlfc2x1ZyI7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MTp7aTowO3M6MToiKiI7fXM6MTY6IgAqAGZvcmNlRGVsZXRpbmciO2I6MDt9aToxO086MjI6IkFwcFxNb2RlbHNcU3ViY2F0ZWdvcnkiOjMxOntzOjEzOiIAKgBjb25uZWN0aW9uIjtzOjU6Im15c3FsIjtzOjg6IgAqAHRhYmxlIjtzOjEzOiJzdWJjYXRlZ29yaWVzIjtzOjEzOiIAKgBwcmltYXJ5S2V5IjtzOjI6ImlkIjtzOjEwOiIAKgBrZXlUeXBlIjtzOjM6ImludCI7czoxMjoiaW5jcmVtZW50aW5nIjtiOjE7czo3OiIAKgB3aXRoIjthOjA6e31zOjEyOiIAKgB3aXRoQ291bnQiO2E6MDp7fXM6MTk6InByZXZlbnRzTGF6eUxvYWRpbmciO2I6MDtzOjEwOiIAKgBwZXJQYWdlIjtpOjE1O3M6NjoiZXhpc3RzIjtiOjE7czoxODoid2FzUmVjZW50bHlDcmVhdGVkIjtiOjA7czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO3M6MTM6IgAqAGF0dHJpYnV0ZXMiO2E6OTp7czoyOiJpZCI7aToxNjtzOjE5OiJmcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjI0OiJWw6p0ZW1lbnRzIGV0IGNoYXVzc3VyZXMiO3M6MTk6ImVuX3N1YmNhdGVnb3J5X25hbWUiO3M6MTc6IkNsb3RoZXMgYW5kIHNob2VzIjtzOjE5OiJhcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjMxOiLYp9mE2YXZhNin2KjYsyDZiNin2YTYo9it2LDZitipIjtzOjE2OiJzdWJjYXRlZ29yeV9zbHVnIjtzOjIwOiJDbG90aGVzLWFuZC1zaG9lcy0xNiI7czoxMToiY2F0ZWdvcnlfaWQiO2k6MztzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTAyIDAwOjAwOjAwIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTAyIDAwOjAwOjAwIjtzOjEwOiJkZWxldGVkX2F0IjtOO31zOjExOiIAKgBvcmlnaW5hbCI7YTo5OntzOjI6ImlkIjtpOjE2O3M6MTk6ImZyX3N1YmNhdGVnb3J5X25hbWUiO3M6MjQ6IlbDqnRlbWVudHMgZXQgY2hhdXNzdXJlcyI7czoxOToiZW5fc3ViY2F0ZWdvcnlfbmFtZSI7czoxNzoiQ2xvdGhlcyBhbmQgc2hvZXMiO3M6MTk6ImFyX3N1YmNhdGVnb3J5X25hbWUiO3M6MzE6Itin2YTZhdmE2KfYqNizINmI2KfZhNij2K3YsNmK2KkiO3M6MTY6InN1YmNhdGVnb3J5X3NsdWciO3M6MjA6IkNsb3RoZXMtYW5kLXNob2VzLTE2IjtzOjExOiJjYXRlZ29yeV9pZCI7aTozO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjItMDItMDIgMDA6MDA6MDAiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjItMDItMDIgMDA6MDA6MDAiO3M6MTA6ImRlbGV0ZWRfYXQiO047fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6MTp7czoxMDoiZGVsZXRlZF9hdCI7czo4OiJkYXRldGltZSI7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6ODoiACoAZGF0ZXMiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YTowOnt9czoxMDoiACoAdG91Y2hlcyI7YTowOnt9czoxMDoidGltZXN0YW1wcyI7YjoxO3M6OToiACoAaGlkZGVuIjthOjA6e31zOjEwOiIAKgB2aXNpYmxlIjthOjA6e31zOjExOiIAKgBmaWxsYWJsZSI7YTo0OntpOjA7czoxOToiZnJfc3ViY2F0ZWdvcnlfbmFtZSI7aToxO3M6MTk6ImVuX3N1YmNhdGVnb3J5X25hbWUiO2k6MjtzOjE5OiJhcl9zdWJjYXRlZ29yeV9uYW1lIjtpOjM7czoxNjoic3ViY2F0ZWdvcnlfc2x1ZyI7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MTp7aTowO3M6MToiKiI7fXM6MTY6IgAqAGZvcmNlRGVsZXRpbmciO2I6MDt9fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9fXM6MTA6IgAqAHRvdWNoZXMiO2E6MDp7fXM6MTA6InRpbWVzdGFtcHMiO2I6MTtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6NDp7aTowO3M6MTY6ImZyX2NhdGVnb3J5X25hbWUiO2k6MTtzOjE2OiJlbl9jYXRlZ29yeV9uYW1lIjtpOjI7czoxNjoiYXJfY2F0ZWdvcnlfbmFtZSI7aTozO3M6MTM6ImNhdGVnb3J5X3NsdWciO31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO31zOjE2OiIAKgBmb3JjZURlbGV0aW5nIjtiOjA7fWk6MztPOjE5OiJBcHBcTW9kZWxzXENhdGVnb3J5IjozMTp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czoxMDoiY2F0ZWdvcmllcyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjEwOntzOjI6ImlkIjtpOjQ7czoxNjoiZnJfY2F0ZWdvcnlfbmFtZSI7czo2OiJCaWpvdXMiO3M6MTY6ImVuX2NhdGVnb3J5X25hbWUiO3M6NzoiSmV3ZWxyeSI7czoxNjoiYXJfY2F0ZWdvcnlfbmFtZSI7czoxNDoi2YXYrNmI2YfYsdin2KoiO3M6MTQ6ImNhdGVnb3J5X2ltYWdlIjtzOjQzOiJtZWRpYS9jYXRlZ29yaWVzL2pld2VscnktY2F0ZWdvcnktdGh1bWIucG5nIjtzOjQ6Imljb24iO3M6MTU6ImZhLXNvbGlkIGZhLWdlbSI7czoxMzoiY2F0ZWdvcnlfc2x1ZyI7czo3OiJqZXdlbHJ5IjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTIyIDAwOjAwOjAwIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIyLTAyLTIyIDAwOjAwOjAwIjtzOjEwOiJkZWxldGVkX2F0IjtOO31zOjExOiIAKgBvcmlnaW5hbCI7YToxMDp7czoyOiJpZCI7aTo0O3M6MTY6ImZyX2NhdGVnb3J5X25hbWUiO3M6NjoiQmlqb3VzIjtzOjE2OiJlbl9jYXRlZ29yeV9uYW1lIjtzOjc6Ikpld2VscnkiO3M6MTY6ImFyX2NhdGVnb3J5X25hbWUiO3M6MTQ6ItmF2KzZiNmH2LHYp9iqIjtzOjE0OiJjYXRlZ29yeV9pbWFnZSI7czo0MzoibWVkaWEvY2F0ZWdvcmllcy9qZXdlbHJ5LWNhdGVnb3J5LXRodW1iLnBuZyI7czo0OiJpY29uIjtzOjE1OiJmYS1zb2xpZCBmYS1nZW0iO3M6MTM6ImNhdGVnb3J5X3NsdWciO3M6NzoiamV3ZWxyeSI7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyMi0wMi0yMiAwMDowMDowMCI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyMi0wMi0yMiAwMDowMDowMCI7czoxMDoiZGVsZXRlZF9hdCI7Tjt9czoxMDoiACoAY2hhbmdlcyI7YTowOnt9czo4OiIAKgBjYXN0cyI7YTox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AGtleVR5cGUiO3M6MzoiaW50IjtzOjEyOiJpbmNyZW1lbnRpbmciO2I6MTtzOjc6IgAqAHdpdGgiO2E6MDp7fXM6MTI6IgAqAHdpdGhDb3VudCI7YTowOnt9czoxOToicHJldmVudHNMYXp5TG9hZGluZyI7YjowO3M6MTA6IgAqAHBlclBhZ2UiO2k6MTU7czo2OiJleGlzdHMiO2I6MTtzOjE4OiJ3YXNSZWNlbnRseUNyZWF0ZWQiO2I6MDtzOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7czoxMzoiACoAYXR0cmlidXRlcyI7YTo5OntzOjI6ImlkIjtpOjIxO3M6MTk6ImZyX3N1YmNhdGVnb3J5X25hbWUiO3M6MTU6IkJpam91eCBkZSBjb3JwcyI7czoxOToiZW5fc3ViY2F0ZWdvcnlfbmFtZSI7czoxMjoiYm9keSBqZXdlbHJ5IjtzOjE5OiJhcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjI1OiLZhdis2YjZh9ix2KfYqiDYp9mE2KzYs9mFIjtzOjE2OiJzdWJjYXRlZ29yeV9zbHVnIjtzOjE1OiJib2R5LWpld2VscnktMjEiO3M6MTE6ImNhdGVnb3J5X2lkIjtpOjQ7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyMi0wMi0wMiAwMDowMDowMCI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyMi0wMi0wMiAwMDowMDowMCI7czoxMDoiZGVsZXRlZF9hdCI7Tjt9czoxMToiACoAb3JpZ2luYWwiO2E6OTp7czoyOiJpZCI7aToyMTtzOjE5OiJmcl9zdWJjYXRlZ29yeV9uYW1lIjtzOjE1OiJCaWpvdXggZGUgY29ycHMiO3M6MTk6ImVuX3N1YmNhdGVnb3J5X25hbWUiO3M6MTI6ImJvZHkgamV3ZWxyeSI7czoxOToiYXJfc3ViY2F0ZWdvcnlfbmFtZSI7czoyNToi2YXYrNmI2YfYsdin2Kog2KfZhNis2LPZhSI7czoxNjoic3ViY2F0ZWdvcnlfc2x1ZyI7czoxNToiYm9keS1qZXdlbHJ5LTIxIjtzOjExOiJjYXRlZ29yeV9pZCI7aTo0O3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjItMDItMDIgMDA6MDA6MDAiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjItMDItMDIgMDA6MDA6MDAiO3M6MTA6ImRlbGV0ZWRfYXQiO047fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6MTp7czoxMDoiZGVsZXRlZF9hdCI7czo4OiJkYXRldGltZSI7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6ODoiACoAZGF0ZXMiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YTowOnt9czoxMDoiACoAdG91Y2hlcyI7YTowOnt9czoxMDoidGltZXN0YW1wcyI7YjoxO3M6OToiACoAaGlkZGVuIjthOjA6e31zOjEwOiIAKgB2aXNpYmxlIjthOjA6e31zOjExOiIAKgBmaWxsYWJsZSI7YTo0OntpOjA7czoxOToiZnJfc3ViY2F0ZWdvcnlfbmFtZSI7aToxO3M6MTk6ImVuX3N1YmNhdGVnb3J5X25hbWUiO2k6MjtzOjE5OiJhcl9zdWJjYXRlZ29yeV9uYW1lIjtpOjM7czoxNjoic3ViY2F0ZWdvcnlfc2x1ZyI7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MTp7aTowO3M6MToiKiI7fXM6MTY6IgAqAGZvcmNlRGVsZXRpbmciO2I6MDt9fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9fXM6MTA6IgAqAHRvdWNoZXMiO2E6MDp7fXM6MTA6InRpbWVzdGFtcHMiO2I6MTtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6NDp7aTowO3M6MTY6ImZyX2NhdGVnb3J5X25hbWUiO2k6MTtzOjE2OiJlbl9jYXRlZ29yeV9uYW1lIjtpOjI7czoxNjoiYXJfY2F0ZWdvcnlfbmFtZSI7aTozO3M6MTM6ImNhdGVnb3J5X3NsdWciO31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO31zOjE2OiIAKgBmb3JjZURlbGV0aW5nIjtiOjA7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZnIvcGhwLWluZm8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1646704432);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shippings`
--

DROP TABLE IF EXISTS `shippings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shippings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shippings`
--

LOCK TABLES `shippings` WRITE;
/*!40000 ALTER TABLE `shippings` DISABLE KEYS */;
INSERT INTO `shippings` VALUES (1,'fixe','8','2022-03-02 23:00:00','2022-03-02 23:00:00'),(2,'variable','9','2022-03-02 23:00:00','2022-03-02 23:00:00'),(3,'seuil','500',NULL,NULL);
/*!40000 ALTER TABLE `shippings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shops`
--

DROP TABLE IF EXISTS `shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shops` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fr_shop_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hitcom',
  `en_shop_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hitcom',
  `ar_shop_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hitcom',
  `fr_shop_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `en_shop_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ar_shop_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shop_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_phone1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_phone2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_creation_date` datetime DEFAULT NULL,
  `seller_fiscal_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `shop_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media/users/empty-user.jpg',
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
INSERT INTO `shops` VALUES (1,'hitcom','hitcom','hitcom','handcraft','handcraft','handcraft','hitcom','aouina','kram','55387654','88995544','handycraft','2022-05-07 00:00:00','777y/po09','1','hitcom@gmail.com','',2,'2022-02-22 23:00:00','2022-02-22 23:00:00',NULL);
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `stock_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimension` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `constructor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorystock_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stocks_stock_slug_unique` (`stock_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks`
--

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
INSERT INTO `stocks` VALUES (1,'red plate','white-plate','black','22','130kg','margoum-tn','noir',1,'2022-02-21 23:00:00','2022-02-21 23:00:00',NULL),(2,'red plate','red-plate','black','22','36kg','margoum-tn','noir',1,'2022-02-21 23:00:00','2022-02-21 23:00:00',NULL),(3,'black plate','black-plate','red','22','3kg','margoum-tn','noir',1,'2022-02-21 23:00:00','2022-02-21 23:00:00',NULL),(4,'margoum-carpet','margoum-carpet','black','22','13kg','margoum-tn','noir',1,'2022-02-21 23:00:00','2022-02-21 23:00:00',NULL);
/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subcategories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fr_subcategory_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_subcategory_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_subcategory_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subcategories_subcategory_slug_unique` (`subcategory_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategories`
--

LOCK TABLES `subcategories` WRITE;
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
INSERT INTO `subcategories` VALUES (1,'Bols et saladiers','Bowls and salad bowls','سلطانيات','Bowls-and-salad-bowls-1',1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(2,'Assiettes','Plates','صحون','Plates-2',1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(3,'Planches et plateaux','Boards and trays','الألواح والصوان','Boards-and-trays-3',1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(4,'Couverts et spatules','Salt and pepper shakers','رجاج الملح والفلفل','Salt-and-pepper-shakers-4',1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(5,'Salières et poivrières','Cutlery and spatulas','السكاكين والملاعق','Cutlery-and-spatulas-5',1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(6,'Accessoires de cuisine','Kitchen accessories','اكسسوارات المطبخ','Kitchen-accessories-6',1,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(7,'Décoration d’intérieur','Interior decoration','الديكور الداخلي','Interior-decoration-7',2,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(8,'Extérieur et jardinage','Outdoors and gardening','البستنة','Outdoors-and-gardening-8',2,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(9,'Salle de bains','Bathroom','حمام','Bathroom-9',2,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(10,'Literie','Bedding','الفراش','Bedding-10',2,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(11,'Cuisine et repas','Cooking and meals','الطبخ والوجبات','Cooking-and-meals-11',2,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(12,'Sols et tapis ','Floors and carpets','الأرضيات والسجاد','Floors-and-carpets-12',2,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(13,'Rangement et organisation','Storage and organization','التخزين والتنظيم','Storage-and-organization-13',2,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(14,'Bricolage','Do-it-yourself','افعلها بنفسك','Do-it-yourself-14',2,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(15,'Sacs et bagages','Bags and luggage','الحقائب والأمتعة','Bags-and-luggage-15',3,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(16,'Vêtements et chaussures','Clothes and shoes','الملابس والأحذية','Clothes-and-shoes-16',3,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(17,'Colliers','Necklaces','قلادات','Necklaces-17',4,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(18,'Bagues','Rings','خواتم','Rings-18',4,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(19,'Bracelets','Wristbands','الأساور','Wristbands-19',4,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(20,'Boucles d’oreilles','Earrings','أقراط','Earrings-20',4,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL),(21,'Bijoux de corps','body jewelry','مجوهرات الجسم','body-jewelry-21',4,'2022-02-01 23:00:00','2022-02-01 23:00:00',NULL);
/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rate` decimal(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxes`
--

LOCK TABLES `taxes` WRITE;
/*!40000 ALTER TABLE `taxes` DISABLE KEYS */;
INSERT INTO `taxes` VALUES (1,19.00,'2022-02-21 23:00:00','2022-02-21 23:00:00',NULL),(2,12.00,'2022-02-21 23:00:00','2022-02-21 23:00:00',NULL),(3,6.00,'2022-02-21 23:00:00','2022-02-21 23:00:00',NULL);
/*!40000 ALTER TABLE `taxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `themes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `color6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `font2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` VALUES (1,'dark','green !important','orange !important','orange !important','orange','orange','orange','sans serif','open sans','2022-02-02 23:00:00','2022-02-02 23:00:00'),(2,'light','red !important','crimson !important','crimson !important','crimson','crimson','crimson','crimson','crimson','2022-02-02 23:00:00','2022-02-02 23:00:00');
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('client','manager','seller','admin','system') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `mac_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipment_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `technical_details` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'media/users/empty-user.jpg',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'chawki','barhoumi','admin',NULL,NULL,'tunis 55 bab souika 1060','testour 2345 rue korkeb',NULL,NULL,'55385474',NULL,NULL,NULL,'1','barhoumi.chawki@gmail.com','media/users/ch.jpg','2022-02-12 04:06:07','$2y$10$Dczc5zsWhWtL/ogRZEWu7.OPw94SKYeOngV/X2ZGx.1w3GsXmNn52',NULL,'2022-02-12 04:01:47','2022-02-12 04:06:07',NULL),(3,'gh','tndev8','client',NULL,NULL,'tunis 58 bab elkhadra 1060 ','ga3four 2345 rue korkeb',NULL,NULL,'tndev8@gmail.com',NULL,NULL,NULL,'1','tndev8@gmail.com','media/users/tndev.jpg','2022-02-24 13:56:22','$2y$10$zEq31kXcW1RW4V1FummpWOg1wAmBhQAy/Fej81/JktLmU4VOWZxTq',NULL,'2022-02-24 13:36:52','2022-02-24 13:56:22',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (1,1,2,'2022-02-01 23:00:00','2022-02-01 23:00:00'),(2,2,2,'2022-02-01 23:00:00','2022-02-01 23:00:00'),(3,3,2,'2022-02-01 23:00:00','2022-02-01 23:00:00'),(4,4,2,'2022-02-01 23:00:00','2022-02-01 23:00:00'),(5,5,2,'2022-02-26 10:02:56','2022-02-26 10:02:56'),(6,1,4,'2022-02-26 10:22:04','2022-02-26 10:22:04'),(7,1,3,'2022-02-26 10:34:17','2022-02-26 10:34:17'),(8,2,3,'2022-02-26 10:46:33','2022-02-26 10:46:33'),(9,18,3,'2022-02-26 10:47:09','2022-02-26 10:47:09');
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-08  5:00:22
