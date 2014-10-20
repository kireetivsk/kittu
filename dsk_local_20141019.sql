CREATE DATABASE  IF NOT EXISTS `dsk_1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dsk_1`;
-- MySQL dump 10.13  Distrib 5.5.33, for osx10.6 (i386)
--
-- Host: localhost    Database: dsk_1
-- ------------------------------------------------------
-- Server version	5.5.33-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `billing_item_products`
--

DROP TABLE IF EXISTS `billing_item_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billing_item_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `billing_item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `billing_plan_products_UNIQUE` (`billing_item_id`,`product_id`),
  KEY `billing_plan_products_product_id_idx` (`product_id`),
  KEY `billing_plan_products_get_by_item_product` (`billing_item_id`,`product_id`),
  CONSTRAINT `billing_plan_products_billing_item_id` FOREIGN KEY (`billing_item_id`) REFERENCES `billing_items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `billing_plan_products_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billing_item_products`
--

LOCK TABLES `billing_item_products` WRITE;
/*!40000 ALTER TABLE `billing_item_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `billing_item_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billing_items`
--

DROP TABLE IF EXISTS `billing_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billing_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `billing_frequency` enum('one_time','monthly') NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `billing_items_get_billing_items` (`name`,`active`,`start_time`,`end_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billing_items`
--

LOCK TABLES `billing_items` WRITE;
/*!40000 ALTER TABLE `billing_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `billing_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `website` varchar(254) DEFAULT NULL,
  `company_category_id` int(11) DEFAULT NULL,
  `meta_company_status_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comapnies_get_by_name_status` (`name`,`meta_company_status_id`),
  KEY `comapnies_meta_company_status_id_idx` (`meta_company_status_id`),
  KEY `comapnies_company_category_id_idx` (`company_category_id`),
  CONSTRAINT `comapnies_company_category_id` FOREIGN KEY (`company_category_id`) REFERENCES `company_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `comapnies_meta_company_status_id` FOREIGN KEY (`meta_company_status_id`) REFERENCES `meta_company_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'Younique','younique',NULL,NULL,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,'It Works','it-works',NULL,NULL,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,'Mary Kay','mary-kay',NULL,NULL,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,'Vault Denim','vault-denim',NULL,NULL,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(5,'Origami Owl','origami-owl',NULL,NULL,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(12,'Dubli','dubli',NULL,1,1,'2014-09-23 06:51:54','2014-09-23 06:51:54',NULL),(13,'Amway','amway',NULL,1,1,'2014-09-23 06:57:04','2014-09-23 06:57:04',NULL),(14,'31 Gifts','31-gifts',NULL,1,1,'2014-09-24 01:47:35','2014-09-24 01:47:35',NULL),(15,'Pink Zebra','pink-zebra',NULL,1,1,'2014-09-24 01:56:52','2014-09-24 01:56:52',NULL),(16,'Thrive','thrive',NULL,1,1,'2014-09-24 01:59:03','2014-09-24 01:59:03',NULL);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_billing_items`
--

DROP TABLE IF EXISTS `company_billing_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_billing_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `billing_item_id` int(11) NOT NULL,
  `company_payment_profile_id` int(11) NOT NULL,
  `meta_billing_item_status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `company_billing_items_idx` (`billing_item_id`),
  KEY `company_billing_items_meta_billing_item_status_id_idx` (`meta_billing_item_status_id`),
  KEY `company_billing_items_get_billing_items` (`billing_item_id`,`company_payment_profile_id`,`meta_billing_item_status_id`),
  KEY `company_billing_items_payment_profile_id_idx` (`company_payment_profile_id`),
  CONSTRAINT `company_billing_items_billing_item_id` FOREIGN KEY (`billing_item_id`) REFERENCES `billing_items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `company_billing_items_meta_billing_item_status_id` FOREIGN KEY (`meta_billing_item_status_id`) REFERENCES `meta_billing_item_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `company_billing_items_payment_profile_id` FOREIGN KEY (`company_payment_profile_id`) REFERENCES `company_payment_profiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_billing_items`
--

LOCK TABLES `company_billing_items` WRITE;
/*!40000 ALTER TABLE `company_billing_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_billing_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_billing_transactions`
--

DROP TABLE IF EXISTS `company_billing_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_billing_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `billing_item_id` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `meta_billing_status_id` int(11) NOT NULL DEFAULT '1',
  `company_payment_profile_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cbt_all_billing_txn_for_company` (`company_id`,`billing_item_id`),
  KEY `cbt_billing_txn_for_company_per_status` (`company_id`,`billing_item_id`,`meta_billing_status_id`),
  KEY `cbt_billing_id_idx` (`billing_item_id`),
  KEY `company_billing_transactions_meta_billing_status_id_idx` (`meta_billing_status_id`),
  KEY `cbt_company_billing_profile_id_idx` (`company_payment_profile_id`),
  CONSTRAINT `cbt_billing_id` FOREIGN KEY (`billing_item_id`) REFERENCES `billing_items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cbt_company_billing_profile_id` FOREIGN KEY (`company_payment_profile_id`) REFERENCES `company_payment_profiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cbt_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `company_billing_transactions_meta_billing_status_id` FOREIGN KEY (`meta_billing_status_id`) REFERENCES `meta_billing_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_billing_transactions`
--

LOCK TABLES `company_billing_transactions` WRITE;
/*!40000 ALTER TABLE `company_billing_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_billing_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_categories`
--

DROP TABLE IF EXISTS `company_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `company_categories_get_by_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_categories`
--

LOCK TABLES `company_categories` WRITE;
/*!40000 ALTER TABLE `company_categories` DISABLE KEYS */;
INSERT INTO `company_categories` VALUES (1,'User submitted - registration',1);
/*!40000 ALTER TABLE `company_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_payment_profiles`
--

DROP TABLE IF EXISTS `company_payment_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_payment_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `merchant_customer_id` varchar(256) NOT NULL COMMENT 'this is the id given but he merchant account',
  `meta_payment_profile_status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `company_payment_profiles_meta_payment_profile_status_id_idx` (`meta_payment_profile_status_id`),
  KEY `company_payment_profiles_get_by_user` (`company_id`),
  KEY `company_payment_profiles_get_by_user_status` (`meta_payment_profile_status_id`,`company_id`),
  CONSTRAINT `company_payment_profiles_meta_payment_profile_status_id` FOREIGN KEY (`meta_payment_profile_status_id`) REFERENCES `meta_payment_profile_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `company_payment_profiles_user_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_payment_profiles`
--

LOCK TABLES `company_payment_profiles` WRITE;
/*!40000 ALTER TABLE `company_payment_profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_payment_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_profiles`
--

DROP TABLE IF EXISTS `company_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `meta_profile_type_id` int(11) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_profiles_get_by_company_profile_type` (`company_id`,`meta_profile_type_id`),
  KEY `company_profiles_meta_profile_type_id_idx` (`meta_profile_type_id`),
  CONSTRAINT `company_profiles_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `company_profiles_meta_profile_type_id` FOREIGN KEY (`meta_profile_type_id`) REFERENCES `meta_profile_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_profiles`
--

LOCK TABLES `company_profiles` WRITE;
/*!40000 ALTER TABLE `company_profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_user`
--

DROP TABLE IF EXISTS `company_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meta_user_company_status_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`company_id`,`user_id`),
  UNIQUE KEY `user_id_company_id_UNIQUE` (`user_id`,`company_id`),
  KEY `company_user_company_id_idx` (`company_id`),
  KEY `company_user_meta_company_user_status_id_idx` (`meta_user_company_status_id`),
  CONSTRAINT `company_user_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `company_user_meta_company_user_status_id` FOREIGN KEY (`meta_user_company_status_id`) REFERENCES `meta_company_user_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `company_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_user`
--

LOCK TABLES `company_user` WRITE;
/*!40000 ALTER TABLE `company_user` DISABLE KEYS */;
INSERT INTO `company_user` VALUES (1,1,80,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,1,99,1,'2014-10-19 20:41:57','0000-00-00 00:00:00',NULL),(3,1,100,1,'2014-10-19 20:41:57','0000-00-00 00:00:00',NULL),(4,1,101,1,'2014-10-19 20:41:57','0000-00-00 00:00:00',NULL),(5,1,102,1,'2014-10-19 20:41:57','0000-00-00 00:00:00',NULL),(6,1,103,1,'2014-10-19 20:41:57','0000-00-00 00:00:00',NULL),(7,1,105,1,'2014-10-19 20:41:57','0000-00-00 00:00:00',NULL),(11,2,101,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `company_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `connection_requests`
--

DROP TABLE IF EXISTS `connection_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `connection_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `meta_connection_relationship_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_connection_request` (`user_id`,`email`),
  KEY `uc_u_idd_idx` (`user_id`),
  KEY `uc_mcr_id_idx` (`meta_connection_relationship_id`),
  CONSTRAINT `uc_u_idd` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `connection_requests`
--

LOCK TABLES `connection_requests` WRITE;
/*!40000 ALTER TABLE `connection_requests` DISABLE KEYS */;
INSERT INTO `connection_requests` VALUES (11,80,'j1@obscurecloud.com',1,'2014-10-08 06:11:25','2014-10-08 06:11:25',NULL),(12,80,'j2@obscurecloud.com',3,'2014-10-08 06:22:45','2014-10-08 06:22:45',NULL);
/*!40000 ALTER TABLE `connection_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_people`
--

DROP TABLE IF EXISTS `crm_people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `company` varchar(45) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `meta_crm_person_type_id` int(11) DEFAULT '1',
  `meta_crm_person_status_id` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crm_person_get_by_user_type` (`user_id`,`meta_crm_person_type_id`),
  KEY `crm_person_get_by_user_status` (`meta_crm_person_status_id`,`user_id`),
  KEY `crm_person_meta_crm_person_type_id_idx` (`meta_crm_person_type_id`),
  CONSTRAINT `crm_people_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `crm_person_meta_crm_person_status_id` FOREIGN KEY (`meta_crm_person_status_id`) REFERENCES `meta_crm_person_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `crm_person_meta_crm_person_type_id` FOREIGN KEY (`meta_crm_person_type_id`) REFERENCES `meta_crm_person_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_people`
--

LOCK TABLES `crm_people` WRITE;
/*!40000 ALTER TABLE `crm_people` DISABLE KEYS */;
/*!40000 ALTER TABLE `crm_people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_person_addresses`
--

DROP TABLE IF EXISTS `crm_person_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_person_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crm_person_id` int(11) NOT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `address3` varchar(100) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `postal_code` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `lat` decimal(18,12) DEFAULT NULL,
  `lng` decimal(18,12) DEFAULT NULL,
  `meta_address_type_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crm_person_addresses_crm_person_id_idx` (`crm_person_id`),
  KEY `crm_person_addresses_meta_phone_type_id_idx` (`meta_address_type_id`),
  CONSTRAINT `crm_person_addresses_crm_person_id` FOREIGN KEY (`crm_person_id`) REFERENCES `crm_people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `crm_person_addresses_meta_address_type_id` FOREIGN KEY (`meta_address_type_id`) REFERENCES `meta_address_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_person_addresses`
--

LOCK TABLES `crm_person_addresses` WRITE;
/*!40000 ALTER TABLE `crm_person_addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `crm_person_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_person_contacts`
--

DROP TABLE IF EXISTS `crm_person_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_person_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crm_person_id` int(11) NOT NULL,
  `contact_type` varchar(100) DEFAULT NULL,
  `contact_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crm_person_contacts_get_by_type_date` (`contact_type`,`contact_date`),
  KEY `crm_person_contacts_get_by_date` (`contact_date`),
  KEY `crm_person_contacts_get_by_type` (`contact_type`),
  KEY `crm_person_contacts_crm_people_id` (`crm_person_id`),
  CONSTRAINT `crm_person_contacts_crm_people_id` FOREIGN KEY (`crm_person_id`) REFERENCES `crm_people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_person_contacts`
--

LOCK TABLES `crm_person_contacts` WRITE;
/*!40000 ALTER TABLE `crm_person_contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `crm_person_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_person_emails`
--

DROP TABLE IF EXISTS `crm_person_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_person_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crm_person_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `meta_email_type_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crm_person_emails_crm_person_id_idx` (`crm_person_id`),
  KEY `crm_person_emails_get_by_person_type` (`crm_person_id`,`meta_email_type_id`),
  KEY `crm_person_emails_meta_email_type_id_idx` (`meta_email_type_id`),
  CONSTRAINT `crm_person_emails_crm_person_id` FOREIGN KEY (`crm_person_id`) REFERENCES `crm_people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `crm_person_emails_meta_email_type_id` FOREIGN KEY (`meta_email_type_id`) REFERENCES `meta_email_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_person_emails`
--

LOCK TABLES `crm_person_emails` WRITE;
/*!40000 ALTER TABLE `crm_person_emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `crm_person_emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_person_notes`
--

DROP TABLE IF EXISTS `crm_person_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_person_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crm_person_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crm_person_notes_crm_person_id_idx` (`crm_person_id`),
  CONSTRAINT `crm_person_notes_crm_person_id` FOREIGN KEY (`crm_person_id`) REFERENCES `crm_people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_person_notes`
--

LOCK TABLES `crm_person_notes` WRITE;
/*!40000 ALTER TABLE `crm_person_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `crm_person_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_person_phones`
--

DROP TABLE IF EXISTS `crm_person_phones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_person_phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crm_person_id` int(11) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `meta_phone_type_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crm_person_phones_crm_person_id_idx` (`crm_person_id`),
  KEY `crm_person_phones_get_by_person` (`crm_person_id`),
  KEY `crm_person_phones_get_by_person_type` (`crm_person_id`,`meta_phone_type_id`),
  KEY `crm_person_phones_meta_phone_type_id_idx` (`meta_phone_type_id`),
  CONSTRAINT `crm_person_phones_crm_person_id` FOREIGN KEY (`crm_person_id`) REFERENCES `crm_people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `crm_person_phones_meta_phone_type_id` FOREIGN KEY (`meta_phone_type_id`) REFERENCES `meta_phone_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_person_phones`
--

LOCK TABLES `crm_person_phones` WRITE;
/*!40000 ALTER TABLE `crm_person_phones` DISABLE KEYS */;
/*!40000 ALTER TABLE `crm_person_phones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_person_socials`
--

DROP TABLE IF EXISTS `crm_person_socials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_person_socials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crm_person_id` int(11) NOT NULL,
  `social` varchar(254) NOT NULL,
  `meta_social_network_id` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crm_person_social_crm_person_id_idx` (`crm_person_id`),
  KEY `crm_person_social_get_by_person_network` (`crm_person_id`,`meta_social_network_id`),
  KEY `crm_person_social_meta_social_netowrk_id_idx` (`meta_social_network_id`),
  CONSTRAINT `crm_person_social_crm_person_id` FOREIGN KEY (`crm_person_id`) REFERENCES `crm_people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `crm_person_social_meta_social_netowrk_id` FOREIGN KEY (`meta_social_network_id`) REFERENCES `meta_social_networks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_person_socials`
--

LOCK TABLES `crm_person_socials` WRITE;
/*!40000 ALTER TABLE `crm_person_socials` DISABLE KEYS */;
/*!40000 ALTER TABLE `crm_person_socials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crm_person_websites`
--

DROP TABLE IF EXISTS `crm_person_websites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crm_person_websites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crm_person_id` int(11) NOT NULL,
  `website` varchar(254) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crm_person_websites_crm_person_id_idx` (`crm_person_id`),
  CONSTRAINT `crm_person_websites_crm_person_id` FOREIGN KEY (`crm_person_id`) REFERENCES `crm_people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crm_person_websites`
--

LOCK TABLES `crm_person_websites` WRITE;
/*!40000 ALTER TABLE `crm_person_websites` DISABLE KEYS */;
/*!40000 ALTER TABLE `crm_person_websites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussion_categories`
--

DROP TABLE IF EXISTS `discussion_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discussion_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `meta_discussion_permission_id` int(11) NOT NULL DEFAULT '4',
  `meta_discussion_status_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discussion_categories_user_id_idx` (`user_id`),
  KEY `discussion_categories_meta_discuession_permission_id_idx` (`meta_discussion_permission_id`),
  KEY `discussion_categories_meta_discussion_status_id_idx` (`meta_discussion_status_id`),
  KEY `discussion_categories_get_by_user_status` (`user_id`,`meta_discussion_status_id`),
  KEY `discussion_categories_get_by_user_status_permission` (`user_id`,`meta_discussion_permission_id`,`meta_discussion_status_id`),
  CONSTRAINT `discussion_categories_meta_discuession_permission_id` FOREIGN KEY (`meta_discussion_permission_id`) REFERENCES `meta_discussion_permissions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `discussion_categories_meta_discussion_status_id` FOREIGN KEY (`meta_discussion_status_id`) REFERENCES `meta_discussion_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `discussion_categories_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussion_categories`
--

LOCK TABLES `discussion_categories` WRITE;
/*!40000 ALTER TABLE `discussion_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `discussion_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussion_comments`
--

DROP TABLE IF EXISTS `discussion_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discussion_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `discussion_post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `meta_discussion_permission_id` int(11) NOT NULL DEFAULT '4',
  `meta_discussion_status_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discussion_comments_discussion_post_id_idx` (`discussion_post_id`),
  KEY `discussion_comments_meta_discussion_permission_id_idx` (`meta_discussion_permission_id`),
  KEY `discussion_comments_meta_discussion_status_id_idx` (`meta_discussion_status_id`),
  KEY `discussion_comments_user_id_idx` (`user_id`),
  KEY `discussion_comments_get_by_user_discussion` (`user_id`,`discussion_post_id`),
  KEY `discussion_comments_get_by_user_discussion_status` (`user_id`,`discussion_post_id`,`meta_discussion_status_id`),
  KEY `discussion_comments_get_by_user_discussion_status_permission` (`user_id`,`discussion_post_id`,`meta_discussion_permission_id`,`meta_discussion_status_id`),
  CONSTRAINT `discussion_comments_discussion_post_id` FOREIGN KEY (`discussion_post_id`) REFERENCES `discussion_posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `discussion_comments_meta_discussion_permission_id` FOREIGN KEY (`meta_discussion_permission_id`) REFERENCES `meta_discussion_permissions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `discussion_comments_meta_discussion_status_id` FOREIGN KEY (`meta_discussion_status_id`) REFERENCES `meta_discussion_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `discussion_comments_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussion_comments`
--

LOCK TABLES `discussion_comments` WRITE;
/*!40000 ALTER TABLE `discussion_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `discussion_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussion_folders`
--

DROP TABLE IF EXISTS `discussion_folders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discussion_folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discussion_folders_user_id_idx` (`user_id`),
  CONSTRAINT `discussion_folders_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussion_folders`
--

LOCK TABLES `discussion_folders` WRITE;
/*!40000 ALTER TABLE `discussion_folders` DISABLE KEYS */;
/*!40000 ALTER TABLE `discussion_folders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussion_follows`
--

DROP TABLE IF EXISTS `discussion_follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discussion_follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `discussion_id` int(11) NOT NULL,
  `meta_discussion_type_id` int(11) NOT NULL,
  `discussion_folder_id` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discussion_follows_user_id_idx` (`user_id`),
  KEY `discussion_follows_meta_discussion_type_id_idx` (`meta_discussion_type_id`),
  KEY `discussion_follows_discussion_folder_id_idx` (`discussion_folder_id`),
  KEY `discussion_follows_get_by_discussion_type` (`discussion_id`,`meta_discussion_type_id`),
  CONSTRAINT `discussion_follows_discussion_folder_id` FOREIGN KEY (`discussion_folder_id`) REFERENCES `discussion_folders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `discussion_follows_meta_discussion_type_id` FOREIGN KEY (`meta_discussion_type_id`) REFERENCES `meta_discussion_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `discussion_follows_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussion_follows`
--

LOCK TABLES `discussion_follows` WRITE;
/*!40000 ALTER TABLE `discussion_follows` DISABLE KEYS */;
/*!40000 ALTER TABLE `discussion_follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussion_posts`
--

DROP TABLE IF EXISTS `discussion_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discussion_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `discussion_topic_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `meta_discussion_permission_id` int(11) NOT NULL DEFAULT '4',
  `meta_discussion_status_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discussion_posts_user_id_idx` (`user_id`),
  KEY `discussion_posts_discussion_topic_id_idx` (`discussion_topic_id`),
  KEY `discussion_posts_meta_discussion_type_id_idx` (`meta_discussion_permission_id`),
  KEY `discussion_posts_meta_discussion_status_id_idx` (`meta_discussion_status_id`),
  KEY `discussion_posts_get_by_topic_permission_dtatus` (`discussion_topic_id`,`meta_discussion_permission_id`,`meta_discussion_status_id`),
  KEY `discussion_posts_get_by_user_status` (`user_id`,`meta_discussion_status_id`),
  CONSTRAINT `discussion_posts_discussion_topic_id` FOREIGN KEY (`discussion_topic_id`) REFERENCES `discussion_topics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `discussion_posts_meta_discussion_status_id` FOREIGN KEY (`meta_discussion_status_id`) REFERENCES `meta_discussion_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `discussion_posts_meta_discussion_type_id` FOREIGN KEY (`meta_discussion_permission_id`) REFERENCES `meta_discussion_permissions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `discussion_posts_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussion_posts`
--

LOCK TABLES `discussion_posts` WRITE;
/*!40000 ALTER TABLE `discussion_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `discussion_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussion_topics`
--

DROP TABLE IF EXISTS `discussion_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discussion_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `discussion_category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `meta_discussion_permission_id` int(11) NOT NULL DEFAULT '4',
  `meta_discussion_status_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discussion_topics_user_id_idx` (`user_id`),
  KEY `discussion_topics_discussion_category_id_idx` (`discussion_category_id`),
  KEY `discussion_topics_meta_discussion_permissioin_id_idx` (`meta_discussion_permission_id`),
  KEY `discussion_topics_meta_discussion_status_id_idx` (`meta_discussion_status_id`),
  KEY `discussion_topics_get_by_category_permission_status` (`discussion_category_id`,`meta_discussion_permission_id`,`meta_discussion_status_id`),
  KEY `discussion_topics_get_by_user_status` (`user_id`,`meta_discussion_status_id`),
  CONSTRAINT `discussion_topics_discussion_category_id` FOREIGN KEY (`discussion_category_id`) REFERENCES `discussion_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `discussion_topics_meta_discussion_permissioin_id` FOREIGN KEY (`meta_discussion_permission_id`) REFERENCES `meta_discussion_permissions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `discussion_topics_meta_discussion_status_id` FOREIGN KEY (`meta_discussion_status_id`) REFERENCES `meta_discussion_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `discussion_topics_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussion_topics`
--

LOCK TABLES `discussion_topics` WRITE;
/*!40000 ALTER TABLE `discussion_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `discussion_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discussion_views`
--

DROP TABLE IF EXISTS `discussion_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discussion_views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `discussion_post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discussion_views_user_id_idx` (`user_id`),
  KEY `discussion_views_discussion_post_id_idx` (`discussion_post_id`),
  KEY `discussion_views_get_by_user_user_post` (`discussion_post_id`,`user_id`),
  CONSTRAINT `discussion_views_discussion_post_id` FOREIGN KEY (`discussion_post_id`) REFERENCES `discussion_posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `discussion_views_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussion_views`
--

LOCK TABLES `discussion_views` WRITE;
/*!40000 ALTER TABLE `discussion_views` DISABLE KEYS */;
/*!40000 ALTER TABLE `discussion_views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `assigned_user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leads_assigned_user_id_idx` (`assigned_user_id`),
  CONSTRAINT `leads_assigned_user_id` FOREIGN KEY (`assigned_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leads`
--

LOCK TABLES `leads` WRITE;
/*!40000 ALTER TABLE `leads` DISABLE KEYS */;
/*!40000 ALTER TABLE `leads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_folders`
--

DROP TABLE IF EXISTS `message_folders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message_folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `description` varchar(100) NOT NULL,
  `color` varchar(45) NOT NULL DEFAULT 'info',
  PRIMARY KEY (`id`),
  KEY `message_folders_user_id_idx` (`user_id`),
  CONSTRAINT `message_folders_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_folders`
--

LOCK TABLES `message_folders` WRITE;
/*!40000 ALTER TABLE `message_folders` DISABLE KEYS */;
INSERT INTO `message_folders` VALUES (1,80,'folder 1','folder_1','This is a folder number 1','green'),(2,80,'folder 2','folder_2','This a folder 2','blue'),(3,80,'folder 3','folder_3','This is also a folder','grey');
/*!40000 ALTER TABLE `message_folders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `content` varchar(160) NOT NULL,
  `to_user` int(11) NOT NULL,
  `to_meta_message_status_id` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `from_meta_message_status_id` int(11) NOT NULL,
  `message_folder_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_to_user_id_idx` (`to_user`),
  KEY `messages_from_user_id_idx` (`from_user`),
  KEY `messages_to_meta_message_status_id_idx` (`to_meta_message_status_id`),
  KEY `messages_from_meta_message_status_id_idx` (`from_meta_message_status_id`),
  KEY `messages_get_receiver_messages` (`to_user`,`to_meta_message_status_id`),
  KEY `message_get_sender_messages` (`from_user`,`from_meta_message_status_id`),
  KEY `message_message_folder_id_idx` (`message_folder_id`),
  CONSTRAINT `messages_from_meta_message_status_id` FOREIGN KEY (`from_meta_message_status_id`) REFERENCES `meta_message_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `messages_from_user_id` FOREIGN KEY (`from_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `messages_to_meta_message_status_id` FOREIGN KEY (`to_meta_message_status_id`) REFERENCES `meta_message_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `messages_to_user_id` FOREIGN KEY (`to_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `message_message_folder_id` FOREIGN KEY (`message_folder_id`) REFERENCES `message_folders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (5,'Test message fom 103','This is a message to user 80 from user 103',80,5,103,3,NULL,'2014-10-11 21:44:50','0000-00-00 00:00:00',NULL),(7,'sdfg','sdfg',105,1,80,4,NULL,'2014-10-12 06:45:09','2014-10-14 16:09:32',NULL),(8,'sdfg','sdfg',105,1,80,4,NULL,'2014-10-12 06:46:30','2014-10-14 16:09:32',NULL),(9,'dhfdghjfgh','sewt5345tsdg',105,1,80,4,NULL,'2014-10-12 06:50:25','2014-10-14 16:09:32',NULL),(10,'dhfdghjfgh','sewt5345tsdg',105,1,80,4,NULL,'2014-10-12 06:52:18','2014-10-14 16:09:32',NULL),(11,'dhfdghjfgh','sewt5345tsdg',105,1,80,4,NULL,'2014-10-12 06:53:22','2014-10-14 16:09:32',NULL),(12,'dhfdghjfgh','sewt5345tsdg',103,1,80,4,NULL,'2014-10-12 06:55:27','2014-10-14 16:09:32',NULL),(13,'dsgdsfg','dsfgdsfgdfsg',103,1,80,4,NULL,'2014-10-12 07:01:22','2014-10-14 16:09:32',NULL),(14,'sadfasdf','asdfsadfsdf',103,1,80,4,NULL,'2014-10-12 07:02:47','2014-10-14 16:09:32',NULL),(15,'asdfasdf','asdfsadf',101,4,80,4,NULL,'2014-10-12 07:02:52','2014-10-14 17:35:12',NULL),(16,'bdfbdfgb','dfgbfgbfgb',101,4,80,4,NULL,'2014-10-12 07:03:55','2014-10-14 17:35:12',NULL),(17,'ghjgfhj','fggfndxhb',103,4,80,4,NULL,'2014-10-12 07:12:45','2014-10-14 17:35:12',NULL),(18,'fdbfdgb','fgdbfdgbf',103,1,80,4,NULL,'2014-10-12 07:13:44','2014-10-13 06:50:46',NULL),(19,'asdf','asdaf',103,1,80,4,NULL,'2014-10-12 07:14:10','2014-10-13 06:50:32',NULL),(20,'asdf','asdfsadf',103,1,80,4,NULL,'2014-10-12 07:14:44','2014-10-13 06:50:31',NULL),(21,'dsfgvsdvf','dsfvzaasaa',105,1,80,4,NULL,'2014-10-12 07:15:03','2014-10-13 06:50:29',NULL),(22,'fgbnfgh','fgdhfgh',99,1,80,4,NULL,'2014-10-12 07:15:38','2014-10-13 06:50:47',NULL),(23,'dfdsfg','dsfgdsfg',105,1,80,4,NULL,'2014-10-12 07:16:19','2014-10-13 06:50:28',NULL),(40,'zdfg','dsfgdsfg',102,1,80,4,NULL,'2014-10-13 03:33:17','2014-10-13 06:50:28',NULL),(41,'asdf','asdf',105,2,80,4,NULL,'2014-10-13 03:33:33','2014-10-13 06:50:27',NULL),(42,'asdf','asdf',105,1,80,4,NULL,'2014-10-13 03:49:12','2014-10-13 06:50:24',NULL),(45,'fghfg','xcvnxcfgbncx cx bvcxvb',102,2,80,4,NULL,'2014-10-13 05:12:36','2014-10-13 06:50:22',NULL),(46,'dsfg','dsfgdsfg',102,1,80,4,NULL,'2014-10-13 05:30:59','2014-10-13 06:50:12',NULL),(47,'asdfsdf','sadsdfsdf',99,1,80,4,NULL,'2014-10-13 05:35:42','2014-10-13 06:50:09',NULL),(48,'hey, nigga','letz go drank a 40',99,2,80,4,NULL,'2014-10-13 05:37:15','2014-10-13 06:50:03',NULL),(49,'HI','What is up?',102,4,80,4,NULL,'2014-10-13 07:17:23','2014-10-14 17:35:12',NULL),(50,'hi','blah',100,4,80,4,NULL,'2014-10-13 07:19:06','2014-10-14 17:35:12',NULL),(51,'dsfgdsfg','dsfgdfgsdfg',105,1,80,4,NULL,'2014-10-14 16:11:55','2014-10-14 16:51:50',NULL),(52,'dfdfsg','dsfgdfsg',100,1,80,4,NULL,'2014-10-14 16:12:24','2014-10-14 16:51:50',NULL),(53,'this is to multiple people','j4 j6 j5',102,1,80,4,NULL,'2014-10-14 16:13:25','2014-10-14 16:51:50',NULL),(54,'multiple take 2','j3 j6 j5 j4',100,1,80,4,NULL,'2014-10-14 16:14:45','2014-10-14 16:51:49',NULL),(55,'multiple take 2','j3 j6 j5 j4',103,1,80,4,NULL,'2014-10-14 16:14:45','2014-10-14 16:51:49',NULL),(56,'multiple take 2','j3 j6 j5 j4',102,1,80,4,NULL,'2014-10-14 16:14:45','2014-10-14 16:51:50',NULL),(57,'multiple take 2','j3 j6 j5 j4',101,1,80,4,NULL,'2014-10-14 16:14:45','2014-10-14 16:51:34',NULL),(58,'Test message fom 103','This is a message to user 80 from user 103',80,7,99,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:32:51',NULL),(59,'Test message fom 103','This is a message to user 80 from user 103',80,7,100,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:34:27',NULL),(60,'Test message fom 103','This is a message to user 80 from user 103',80,7,101,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:34:27',NULL),(61,'Test message fom 103','This is a message to user 80 from user 103',80,7,102,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:34:27',NULL),(62,'Test message fom 103','This is a message to user 80 from user 103',80,7,103,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:34:27',NULL),(63,'Test message fom 103','This is a message to user 80 from user 103',80,7,99,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:34:27',NULL),(64,'Test message fom 103','This is a message to user 80 from user 103',80,7,100,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:34:27',NULL),(65,'Test message fom 103','This is a message to user 80 from user 103',80,7,101,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:34:27',NULL),(66,'Test message fom 103','This is a message to user 80 from user 103',80,7,102,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:34:27',NULL),(67,'Test message fom 103','This is a message to user 80 from user 103',80,7,103,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:34:27',NULL),(68,'Test message fom 103','This is a message to user 80 from user 103',80,7,99,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:34:27',NULL),(69,'Test message fom 103','This is a message to user 80 from user 103',80,7,100,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:34:27',NULL),(70,'Test message fom 103','This is a message to user 80 from user 103',80,7,101,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:34:27',NULL),(71,'Test message fom 103','This is a message to user 80 from user 103',80,7,102,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:34:27',NULL),(72,'Test message fom 103','This is a message to user 80 from user 103',80,7,103,3,NULL,'2014-10-11 21:44:50','2014-10-14 17:34:27',NULL),(73,'Test message fom 103','This is a message to user 80 from user 103',80,1,103,5,NULL,'2014-10-11 21:44:50','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_address_types`
--

DROP TABLE IF EXISTS `meta_address_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_address_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_address_types`
--

LOCK TABLES `meta_address_types` WRITE;
/*!40000 ALTER TABLE `meta_address_types` DISABLE KEYS */;
INSERT INTO `meta_address_types` VALUES (1,'Home',NULL,10),(2,'Shipping',NULL,20);
/*!40000 ALTER TABLE `meta_address_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_billing_item_statuses`
--

DROP TABLE IF EXISTS `meta_billing_item_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_billing_item_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_billing_item_statuses`
--

LOCK TABLES `meta_billing_item_statuses` WRITE;
/*!40000 ALTER TABLE `meta_billing_item_statuses` DISABLE KEYS */;
INSERT INTO `meta_billing_item_statuses` VALUES (1,'Active',NULL,10),(2,'Inactive',NULL,20),(3,'Expired',NULL,30),(4,'Declined',NULL,40);
/*!40000 ALTER TABLE `meta_billing_item_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_billing_statuses`
--

DROP TABLE IF EXISTS `meta_billing_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_billing_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_billing_statuses`
--

LOCK TABLES `meta_billing_statuses` WRITE;
/*!40000 ALTER TABLE `meta_billing_statuses` DISABLE KEYS */;
INSERT INTO `meta_billing_statuses` VALUES (1,'Completed',NULL,10),(2,'Pending',NULL,20),(3,'Declined',NULL,30),(4,'Refunded',NULL,40),(5,'Other',NULL,50);
/*!40000 ALTER TABLE `meta_billing_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_company_statuses`
--

DROP TABLE IF EXISTS `meta_company_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_company_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_company_statuses`
--

LOCK TABLES `meta_company_statuses` WRITE;
/*!40000 ALTER TABLE `meta_company_statuses` DISABLE KEYS */;
INSERT INTO `meta_company_statuses` VALUES (1,'Active',NULL,10),(2,'Inactive',NULL,20);
/*!40000 ALTER TABLE `meta_company_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_company_user_statuses`
--

DROP TABLE IF EXISTS `meta_company_user_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_company_user_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_company_user_statuses`
--

LOCK TABLES `meta_company_user_statuses` WRITE;
/*!40000 ALTER TABLE `meta_company_user_statuses` DISABLE KEYS */;
INSERT INTO `meta_company_user_statuses` VALUES (1,'Active',NULL,10),(2,'Inactive',NULL,20),(3,'Deleted',NULL,30);
/*!40000 ALTER TABLE `meta_company_user_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_connection_relationships`
--

DROP TABLE IF EXISTS `meta_connection_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_connection_relationships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_connection_relationships`
--

LOCK TABLES `meta_connection_relationships` WRITE;
/*!40000 ALTER TABLE `meta_connection_relationships` DISABLE KEYS */;
INSERT INTO `meta_connection_relationships` VALUES (1,'Sponsor',NULL,10),(2,'Upline',NULL,20),(3,'Downline',NULL,30);
/*!40000 ALTER TABLE `meta_connection_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_connection_statuses`
--

DROP TABLE IF EXISTS `meta_connection_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_connection_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_connection_statuses`
--

LOCK TABLES `meta_connection_statuses` WRITE;
/*!40000 ALTER TABLE `meta_connection_statuses` DISABLE KEYS */;
INSERT INTO `meta_connection_statuses` VALUES (1,'Requested',NULL,10),(2,'Accepted',NULL,20),(3,'Rejected',NULL,30),(4,'Blocked',NULL,40);
/*!40000 ALTER TABLE `meta_connection_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_crm_person_statuses`
--

DROP TABLE IF EXISTS `meta_crm_person_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_crm_person_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_crm_person_statuses`
--

LOCK TABLES `meta_crm_person_statuses` WRITE;
/*!40000 ALTER TABLE `meta_crm_person_statuses` DISABLE KEYS */;
INSERT INTO `meta_crm_person_statuses` VALUES (1,'Active',NULL,10),(2,'Inactive',NULL,20);
/*!40000 ALTER TABLE `meta_crm_person_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_crm_person_types`
--

DROP TABLE IF EXISTS `meta_crm_person_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_crm_person_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_crm_person_types`
--

LOCK TABLES `meta_crm_person_types` WRITE;
/*!40000 ALTER TABLE `meta_crm_person_types` DISABLE KEYS */;
INSERT INTO `meta_crm_person_types` VALUES (1,'Lead',NULL,10),(2,'Customer',NULL,20),(3,'Other',NULL,1000);
/*!40000 ALTER TABLE `meta_crm_person_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_discussion_permissions`
--

DROP TABLE IF EXISTS `meta_discussion_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_discussion_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_discussion_permissions`
--

LOCK TABLES `meta_discussion_permissions` WRITE;
/*!40000 ALTER TABLE `meta_discussion_permissions` DISABLE KEYS */;
INSERT INTO `meta_discussion_permissions` VALUES (1,'Public',NULL,10),(2,'Downline',NULL,20),(3,'Upline',NULL,30),(4,'Private',NULL,40);
/*!40000 ALTER TABLE `meta_discussion_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_discussion_statuses`
--

DROP TABLE IF EXISTS `meta_discussion_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_discussion_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_discussion_statuses`
--

LOCK TABLES `meta_discussion_statuses` WRITE;
/*!40000 ALTER TABLE `meta_discussion_statuses` DISABLE KEYS */;
INSERT INTO `meta_discussion_statuses` VALUES (1,'Pending',NULL,10),(2,'Published',NULL,20),(3,'Deleted',NULL,30);
/*!40000 ALTER TABLE `meta_discussion_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_discussion_types`
--

DROP TABLE IF EXISTS `meta_discussion_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_discussion_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_discussion_types`
--

LOCK TABLES `meta_discussion_types` WRITE;
/*!40000 ALTER TABLE `meta_discussion_types` DISABLE KEYS */;
INSERT INTO `meta_discussion_types` VALUES (1,'Category',NULL,10),(2,'Topic',NULL,20),(3,'Post',NULL,30),(4,'Comment',NULL,40);
/*!40000 ALTER TABLE `meta_discussion_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_email_types`
--

DROP TABLE IF EXISTS `meta_email_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_email_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_email_types`
--

LOCK TABLES `meta_email_types` WRITE;
/*!40000 ALTER TABLE `meta_email_types` DISABLE KEYS */;
INSERT INTO `meta_email_types` VALUES (1,'Main',NULL,10),(2,'Work',NULL,20),(3,'Other',NULL,30);
/*!40000 ALTER TABLE `meta_email_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_message_statuses`
--

DROP TABLE IF EXISTS `meta_message_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_message_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_message_statuses`
--

LOCK TABLES `meta_message_statuses` WRITE;
/*!40000 ALTER TABLE `meta_message_statuses` DISABLE KEYS */;
INSERT INTO `meta_message_statuses` VALUES (1,'New',NULL,10),(2,'Read',NULL,20),(3,'Sent',NULL,30),(4,'Deleted',NULL,40),(5,'Revoked',NULL,50),(6,'Draft',NULL,25),(7,'Deleted for real',NULL,1000);
/*!40000 ALTER TABLE `meta_message_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_notification_types`
--

DROP TABLE IF EXISTS `meta_notification_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_notification_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `icon` varchar(45) NOT NULL,
  `color` varchar(45) NOT NULL,
  `ordinal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_notification_types`
--

LOCK TABLES `meta_notification_types` WRITE;
/*!40000 ALTER TABLE `meta_notification_types` DISABLE KEYS */;
INSERT INTO `meta_notification_types` VALUES (1,'Connection','when users connect to oneanother','icon-user','btn-purple',NULL),(2,'Message','when a message is sent','icon-envelope-alt','btn-yellow',NULL),(3,'System','system notifications','icon-wrench','btn-danger',NULL),(4,'Billing','billing notifications','icon-usd','btn-success',NULL),(5,'Discussion',NULL,'icon-comments','btn-white',NULL),(6,'Q&A',NULL,'icon-question','btn-primary',NULL),(7,'CRM',NULL,'icon-group','btn-warning',NULL),(8,'Training',NULL,'icon-book','btn-pink',NULL);
/*!40000 ALTER TABLE `meta_notification_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_payment_profile_statuses`
--

DROP TABLE IF EXISTS `meta_payment_profile_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_payment_profile_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_payment_profile_statuses`
--

LOCK TABLES `meta_payment_profile_statuses` WRITE;
/*!40000 ALTER TABLE `meta_payment_profile_statuses` DISABLE KEYS */;
INSERT INTO `meta_payment_profile_statuses` VALUES (1,'Main',NULL,10),(2,'Active',NULL,20),(3,'Inactive',NULL,30),(4,'Deleted',NULL,40);
/*!40000 ALTER TABLE `meta_payment_profile_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_phone_types`
--

DROP TABLE IF EXISTS `meta_phone_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_phone_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_phone_types`
--

LOCK TABLES `meta_phone_types` WRITE;
/*!40000 ALTER TABLE `meta_phone_types` DISABLE KEYS */;
INSERT INTO `meta_phone_types` VALUES (1,'Main',NULL,10),(2,'Cell',NULL,20),(3,'Home',NULL,30),(4,'Work',NULL,40);
/*!40000 ALTER TABLE `meta_phone_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_product_statuses`
--

DROP TABLE IF EXISTS `meta_product_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_product_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_product_statuses`
--

LOCK TABLES `meta_product_statuses` WRITE;
/*!40000 ALTER TABLE `meta_product_statuses` DISABLE KEYS */;
INSERT INTO `meta_product_statuses` VALUES (1,'Active',NULL,10),(2,'Inactive',NULL,20),(3,'Deleted',NULL,30),(4,'Pending',NULL,40);
/*!40000 ALTER TABLE `meta_product_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_profile_categories`
--

DROP TABLE IF EXISTS `meta_profile_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_profile_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_profile_categories`
--

LOCK TABLES `meta_profile_categories` WRITE;
/*!40000 ALTER TABLE `meta_profile_categories` DISABLE KEYS */;
INSERT INTO `meta_profile_categories` VALUES (1,'Main','can\'t remember what this table was for....',1000);
/*!40000 ALTER TABLE `meta_profile_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_profile_types`
--

DROP TABLE IF EXISTS `meta_profile_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_profile_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `default_value` varchar(100) NOT NULL,
  `meta_profile_category_id` int(11) NOT NULL DEFAULT '1',
  `profile_type` enum('consultant','company','advertiser','marketplace') NOT NULL DEFAULT 'consultant',
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`),
  KEY `meta_profile_types_get_by_category` (`meta_profile_category_id`),
  CONSTRAINT `meta_profile_types_meta_profile_category_id` FOREIGN KEY (`meta_profile_category_id`) REFERENCES `meta_profile_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_profile_types`
--

LOCK TABLES `meta_profile_types` WRITE;
/*!40000 ALTER TABLE `meta_profile_types` DISABLE KEYS */;
INSERT INTO `meta_profile_types` VALUES (1,'Display name','display_name',NULL,'',1,'consultant',1000),(2,'Avatar','avatar',NULL,'',1,'consultant',2000),(3,'Location','location',NULL,'',1,'consultant',3000),(4,'URL','url',NULL,'',1,'consultant',4000),(5,'Social','social','json encoded array of social_id:url pairs','',1,'consultant',5000),(6,'Phone','phone',NULL,'',1,'consultant',6000),(7,'Copany rank','company_rank','json encoded array of company_id:name pairs','',1,'consultant',7000);
/*!40000 ALTER TABLE `meta_profile_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_qna_rep_types`
--

DROP TABLE IF EXISTS `meta_qna_rep_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_qna_rep_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_qna_rep_types`
--

LOCK TABLES `meta_qna_rep_types` WRITE;
/*!40000 ALTER TABLE `meta_qna_rep_types` DISABLE KEYS */;
INSERT INTO `meta_qna_rep_types` VALUES (1,'Wrote Question',NULL,50,10),(2,'Question up vote',NULL,10,20),(3,'Queation down vote',NULL,-10,30),(4,'Wrote answer',NULL,100,40),(5,'Answer up vote',NULL,10,50),(6,'Answer down vote',NULL,-10,60),(7,'Wrote comment',NULL,10,70),(8,'Comment up vote',NULL,1,80),(9,'Comment downvote',NULL,-1,90),(10,'Voted',NULL,1,100),(11,'Accepted answer to question',NULL,100,110),(12,'Wrote accepted answer',NULL,100,120);
/*!40000 ALTER TABLE `meta_qna_rep_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_qna_types`
--

DROP TABLE IF EXISTS `meta_qna_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_qna_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_qna_types`
--

LOCK TABLES `meta_qna_types` WRITE;
/*!40000 ALTER TABLE `meta_qna_types` DISABLE KEYS */;
INSERT INTO `meta_qna_types` VALUES (1,'Question',NULL,10),(2,'Answer',NULL,20),(3,'Comment',NULL,30);
/*!40000 ALTER TABLE `meta_qna_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_setting_categories`
--

DROP TABLE IF EXISTS `meta_setting_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_setting_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_setting_categories`
--

LOCK TABLES `meta_setting_categories` WRITE;
/*!40000 ALTER TABLE `meta_setting_categories` DISABLE KEYS */;
INSERT INTO `meta_setting_categories` VALUES (1,'Dashboard','User dashboard settings',1000),(2,'Connection','Privacy settings related to making connections',2000);
/*!40000 ALTER TABLE `meta_setting_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_setting_types`
--

DROP TABLE IF EXISTS `meta_setting_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_setting_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `default_value` varchar(100) NOT NULL,
  `meta_setting_category_id` int(11) NOT NULL DEFAULT '1',
  `setting_type` enum('company','consultant') NOT NULL DEFAULT 'consultant',
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`),
  KEY `meta_setting_types_meta_setting_category_id_idx` (`meta_setting_category_id`),
  CONSTRAINT `meta_setting_types_meta_setting_category_id` FOREIGN KEY (`meta_setting_category_id`) REFERENCES `meta_setting_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_setting_types`
--

LOCK TABLES `meta_setting_types` WRITE;
/*!40000 ALTER TABLE `meta_setting_types` DISABLE KEYS */;
INSERT INTO `meta_setting_types` VALUES (1,'Last selected company','last_company','The last company a user selected. An integer of the company id last selected','',1,'consultant',1000),(2,'Incoming connection requests permissions','incoming_connection_requests_permissions','How to handle incomming connection requests. Options: approve_all, verify_upline, verify_downline, v','verify_all',2,'consultant',2000);
/*!40000 ALTER TABLE `meta_setting_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_social_networks`
--

DROP TABLE IF EXISTS `meta_social_networks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_social_networks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `color` varchar(45) DEFAULT 'blue',
  `icon` varchar(45) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_social_networks`
--

LOCK TABLES `meta_social_networks` WRITE;
/*!40000 ALTER TABLE `meta_social_networks` DISABLE KEYS */;
INSERT INTO `meta_social_networks` VALUES (1,'Facebook','facebook','blue','icon-facebook-sign',NULL,10),(2,'Twitter','twitter','light-blue','icon-twitter-sign',NULL,20),(3,'Instagram','instagram','brown','icon-instagram',NULL,30),(4,'Vine','vine','green','icon-vine',NULL,40),(5,'Pinterest','pinterest','pink','icon-pinterest-sign',NULL,50),(6,'Google +','google','red','icon-google-plus-sign',NULL,60);
/*!40000 ALTER TABLE `meta_social_networks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_user_statuses`
--

DROP TABLE IF EXISTS `meta_user_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_user_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_user_statuses`
--

LOCK TABLES `meta_user_statuses` WRITE;
/*!40000 ALTER TABLE `meta_user_statuses` DISABLE KEYS */;
INSERT INTO `meta_user_statuses` VALUES (1,'Pending',NULL,10),(2,'Active',NULL,20),(3,'Inactive',NULL,30),(4,'Suspended',NULL,40),(5,'Deleted',NULL,50);
/*!40000 ALTER TABLE `meta_user_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meta_user_types`
--

DROP TABLE IF EXISTS `meta_user_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meta_user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ordinal` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meta_user_types`
--

LOCK TABLES `meta_user_types` WRITE;
/*!40000 ALTER TABLE `meta_user_types` DISABLE KEYS */;
INSERT INTO `meta_user_types` VALUES (1,'Consultant',NULL,10),(2,'Company',NULL,20);
/*!40000 ALTER TABLE `meta_user_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_09_20_103940_create_password_reminders_table',1),('2014_09_20_110912_create_session_table',1),('2014_09_20_111110_add_cashier_columns',1),('2014_09_20_131330_edit_created_at',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `body` text NOT NULL,
  `meta_notification_type_id` int(11) NOT NULL,
  `sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` datetime DEFAULT NULL,
  `dismissed` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_dismissed` (`user_id`,`dismissed`),
  CONSTRAINT `n_user_id_u_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,80,'sonewhere','This is a notification','Short one, eh?',1,'2014-10-02 06:11:41','2014-10-07 21:41:28','2014-10-07 21:41:28','0000-00-00 00:00:00','2014-10-08 03:41:28',NULL),(2,80,'there','This another notification','This is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks function',2,'2014-10-02 06:12:42','2014-10-08 20:35:12','2014-10-08 20:35:12','0000-00-00 00:00:00','2014-10-09 02:35:12',NULL),(3,80,'there','This another notification','This is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks function',3,'2014-10-02 06:12:42','2014-10-08 20:35:14','2014-10-08 20:35:14','0000-00-00 00:00:00','2014-10-09 02:35:14',NULL),(4,80,'there','This another notification','This is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks function',4,'2014-10-02 06:12:42','2014-10-08 20:35:14','2014-10-08 20:35:14','0000-00-00 00:00:00','2014-10-09 02:35:14',NULL),(5,80,'there','This another notification','This is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks function',5,'2014-10-02 06:12:42','2014-10-08 20:35:14','2014-10-08 20:35:14','0000-00-00 00:00:00','2014-10-09 02:35:14',NULL),(6,80,'there','This another notification','This is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks function',6,'2014-10-02 06:12:42','2014-10-08 20:35:14','2014-10-08 20:35:14','0000-00-00 00:00:00','2014-10-09 02:35:14',NULL),(7,80,'there','This another notification','This is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks functionThis is a really long one to test the insertBreaks function',7,'2014-10-02 06:12:42','2014-10-08 20:35:14','2014-10-08 20:35:14','0000-00-00 00:00:00','2014-10-09 02:35:14',NULL),(58,99,'app/models/UserConnection.php:241','Connection notification','You have connected with Don Rzeszut as their sponsor.',1,'2014-10-08 06:15:23',NULL,NULL,'2014-10-08 06:15:23','0000-00-00 00:00:00',NULL),(59,80,'app/models/UserConnection.php:259','Connection notification','j1 test has accepted your invitation. You are now connected as their downline.',1,'2014-10-08 06:15:23','2014-10-08 00:22:27','2014-10-08 00:22:27','2014-10-08 06:15:23','2014-10-08 06:22:27',NULL),(60,100,'app/models/UserConnection.php:118','Connection request','You have sent a request to connect to Don Rzeszut as their upline.',1,'2014-10-08 06:23:56','2014-10-08 00:24:49','2014-10-08 00:24:49','2014-10-08 06:23:56','2014-10-08 06:24:49',NULL),(61,80,'app/models/UserConnection.php:137','Connection request','j3 test has sent a request to connect to you as their downline.',1,'2014-10-08 06:23:56','2014-10-08 20:35:10','2014-10-08 20:35:10','2014-10-08 06:23:56','2014-10-09 02:35:10',NULL),(62,100,'app/models/UserConnection.php:329','Connection accepted','Don Rzeszut has accepted your invitation. You are now connected as their Downline.',1,'2014-10-08 06:25:40',NULL,NULL,'2014-10-08 06:25:40','2014-10-08 06:25:40',NULL),(63,101,'app/models/UserConnection.php:118','Connection request','You have sent a request to connect to Don Rzeszut as their sponsor.',1,'2014-10-09 03:03:29',NULL,NULL,'2014-10-09 03:03:29','0000-00-00 00:00:00',NULL),(64,80,'app/models/UserConnection.php:137','Connection request','j4 test has sent a request to connect to you as their downline.',1,'2014-10-09 03:03:29','2014-10-08 21:13:44','2014-10-08 21:13:44','2014-10-09 03:03:29','2014-10-09 03:13:44',NULL),(65,101,'app/models/UserConnection.php:351','Connection accepted','Don Rzeszut has accepted your invitation. You are now connected as their Downline.',1,'2014-10-09 03:08:50',NULL,NULL,'2014-10-09 03:08:50','2014-10-09 03:08:50',NULL),(66,101,'app/models/UserConnection.php:351','Connection accepted','Don Rzeszut has accepted your invitation. You are now connected as their Downline.',1,'2014-10-09 03:10:18',NULL,NULL,'2014-10-09 03:10:18','2014-10-09 03:10:18',NULL),(67,101,'app/models/UserConnection.php:351','Connection accepted','Don Rzeszut has accepted your invitation. You are now connected as their Downline.',1,'2014-10-09 03:10:58',NULL,NULL,'2014-10-09 03:10:58','2014-10-09 03:10:58',NULL),(68,101,'app/models/UserConnection.php:351','Connection accepted','Don Rzeszut has accepted your invitation. You are now connected as their Downline.',1,'2014-10-09 03:11:58',NULL,NULL,'2014-10-09 03:11:58','2014-10-09 03:11:58',NULL),(69,101,'app/models/UserConnection.php:351','Connection accepted','Don Rzeszut has accepted your invitation. You are now connected as their Downline.',1,'2014-10-09 03:13:27',NULL,NULL,'2014-10-09 03:13:27','2014-10-09 03:13:27',NULL),(70,102,'app/models/UserConnection.php:118','Connection request','You have sent a request to connect to Don Rzeszut as their downline.',1,'2014-10-09 05:55:43',NULL,NULL,'2014-10-09 05:55:43','0000-00-00 00:00:00',NULL),(71,80,'app/models/UserConnection.php:137','Connection request','j5 test has sent a request to connect to you as their upline.',1,'2014-10-09 05:55:43','2014-10-10 22:43:48','2014-10-10 22:43:48','2014-10-09 05:55:43','2014-10-11 04:43:48',NULL),(72,102,'app/models/UserConnection.php:351','Connection accepted','Don Rzeszut has accepted your invitation. You are now connected as their Downline.',1,'2014-10-09 05:55:56',NULL,NULL,'2014-10-09 05:55:56','2014-10-09 05:55:56',NULL),(73,103,'app/models/UserConnection.php:118','Connection request','You have sent a request to connect to Don Rzeszut as their upline.',1,'2014-10-09 06:20:36',NULL,NULL,'2014-10-09 06:20:36','0000-00-00 00:00:00',NULL),(74,80,'app/models/UserConnection.php:137','Connection request','j6 test has sent a request to connect to you as their downline.',1,'2014-10-09 06:20:36','2014-10-10 22:43:48','2014-10-10 22:43:48','2014-10-09 06:20:36','2014-10-11 04:43:48',NULL),(75,103,'app/models/UserConnection.php:351','Connection accepted','Don Rzeszut has accepted your invitation. You are now connected as their Downline.',1,'2014-10-09 06:22:39',NULL,NULL,'2014-10-09 06:22:39','2014-10-09 06:22:39',NULL),(77,80,'app/models/UserConnection.php:137','Connection request','j7 test has sent a request to connect to you as their upline.',1,'2014-10-09 06:25:15','2014-10-10 22:43:48','2014-10-10 22:43:48','2014-10-09 06:25:15','2014-10-11 04:43:48',NULL),(79,105,'app/models/UserConnection.php:118','Connection request','You have sent a request to connect to Don Rzeszut as their downline.',1,'2014-10-09 06:32:39',NULL,NULL,'2014-10-09 06:32:39','0000-00-00 00:00:00',NULL),(80,80,'app/models/UserConnection.php:137','Connection request','j7 test has sent a request to connect to you as their upline.',1,'2014-10-09 06:32:39','2014-10-10 22:43:48','2014-10-10 22:43:48','2014-10-09 06:32:39','2014-10-11 04:43:48',NULL),(81,105,'app/models/UserConnection.php:351','Connection accepted','Don Rzeszut has accepted your invitation. You are now connected as their Upline.',1,'2014-10-09 06:33:40',NULL,NULL,'2014-10-09 06:33:40','2014-10-09 06:33:40',NULL),(82,105,'app/models/Message.php:86','You have a new message','login_82e5d2c56bdd0811318f0cf078b78bfc sent you a message.',2,'2014-10-12 06:48:07',NULL,NULL,'2014-10-12 06:48:07','2014-10-12 06:48:07',NULL),(83,105,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 06:55:37',NULL,NULL,'2014-10-12 06:55:37','2014-10-12 06:55:37',NULL),(84,99,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 06:55:39',NULL,NULL,'2014-10-12 06:55:39','2014-10-12 06:55:39',NULL),(85,100,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 06:55:40',NULL,NULL,'2014-10-12 06:55:40','2014-10-12 06:55:40',NULL),(86,101,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 06:55:40',NULL,NULL,'2014-10-12 06:55:40','2014-10-12 06:55:40',NULL),(87,102,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 06:55:41',NULL,NULL,'2014-10-12 06:55:41','2014-10-12 06:55:41',NULL),(88,103,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 06:55:42',NULL,NULL,'2014-10-12 06:55:42','2014-10-12 06:55:42',NULL),(89,105,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:01:22',NULL,NULL,'2014-10-12 07:01:22','2014-10-12 07:01:22',NULL),(90,99,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:01:22',NULL,NULL,'2014-10-12 07:01:22','2014-10-12 07:01:22',NULL),(91,100,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:01:22',NULL,NULL,'2014-10-12 07:01:22','2014-10-12 07:01:22',NULL),(92,101,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:01:23',NULL,NULL,'2014-10-12 07:01:23','2014-10-12 07:01:23',NULL),(93,102,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:01:23',NULL,NULL,'2014-10-12 07:01:23','2014-10-12 07:01:23',NULL),(94,103,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:01:23',NULL,NULL,'2014-10-12 07:01:23','2014-10-12 07:01:23',NULL),(95,99,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:02:47',NULL,NULL,'2014-10-12 07:02:47','2014-10-12 07:02:47',NULL),(96,101,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:02:47',NULL,NULL,'2014-10-12 07:02:47','2014-10-12 07:02:47',NULL),(97,103,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:02:47',NULL,NULL,'2014-10-12 07:02:47','2014-10-12 07:02:47',NULL),(98,101,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:02:52',NULL,NULL,'2014-10-12 07:02:52','2014-10-12 07:02:52',NULL),(99,105,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:03:55',NULL,NULL,'2014-10-12 07:03:55','2014-10-12 07:03:55',NULL),(100,99,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:03:55',NULL,NULL,'2014-10-12 07:03:55','2014-10-12 07:03:55',NULL),(101,100,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:03:55',NULL,NULL,'2014-10-12 07:03:55','2014-10-12 07:03:55',NULL),(102,102,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:03:55',NULL,NULL,'2014-10-12 07:03:55','2014-10-12 07:03:55',NULL),(103,103,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:03:55',NULL,NULL,'2014-10-12 07:03:55','2014-10-12 07:03:55',NULL),(104,101,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:03:55',NULL,NULL,'2014-10-12 07:03:55','2014-10-12 07:03:55',NULL),(105,105,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:12:45',NULL,NULL,'2014-10-12 07:12:45','2014-10-12 07:12:45',NULL),(106,99,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:12:45',NULL,NULL,'2014-10-12 07:12:45','2014-10-12 07:12:45',NULL),(107,100,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:12:45',NULL,NULL,'2014-10-12 07:12:45','2014-10-12 07:12:45',NULL),(108,101,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:12:45',NULL,NULL,'2014-10-12 07:12:45','2014-10-12 07:12:45',NULL),(109,102,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:12:45',NULL,NULL,'2014-10-12 07:12:45','2014-10-12 07:12:45',NULL),(110,103,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:12:45',NULL,NULL,'2014-10-12 07:12:45','2014-10-12 07:12:45',NULL),(111,105,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:13:44',NULL,NULL,'2014-10-12 07:13:44','2014-10-12 07:13:44',NULL),(112,99,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:13:44',NULL,NULL,'2014-10-12 07:13:44','2014-10-12 07:13:44',NULL),(113,100,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:13:44',NULL,NULL,'2014-10-12 07:13:44','2014-10-12 07:13:44',NULL),(114,101,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:13:44',NULL,NULL,'2014-10-12 07:13:44','2014-10-12 07:13:44',NULL),(115,102,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:13:44',NULL,NULL,'2014-10-12 07:13:44','2014-10-12 07:13:44',NULL),(116,103,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:13:44',NULL,NULL,'2014-10-12 07:13:44','2014-10-12 07:13:44',NULL),(117,105,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:14:10',NULL,NULL,'2014-10-12 07:14:10','2014-10-12 07:14:10',NULL),(118,99,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:14:10',NULL,NULL,'2014-10-12 07:14:10','2014-10-12 07:14:10',NULL),(119,100,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:14:10',NULL,NULL,'2014-10-12 07:14:10','2014-10-12 07:14:10',NULL),(120,101,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:14:10',NULL,NULL,'2014-10-12 07:14:10','2014-10-12 07:14:10',NULL),(121,102,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:14:10',NULL,NULL,'2014-10-12 07:14:10','2014-10-12 07:14:10',NULL),(122,103,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:14:10',NULL,NULL,'2014-10-12 07:14:10','2014-10-12 07:14:10',NULL),(123,105,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:14:44',NULL,NULL,'2014-10-12 07:14:44','2014-10-12 07:14:44',NULL),(124,99,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:14:44',NULL,NULL,'2014-10-12 07:14:44','2014-10-12 07:14:44',NULL),(125,100,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:14:44',NULL,NULL,'2014-10-12 07:14:44','2014-10-12 07:14:44',NULL),(126,101,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:14:44',NULL,NULL,'2014-10-12 07:14:44','2014-10-12 07:14:44',NULL),(127,102,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:14:44',NULL,NULL,'2014-10-12 07:14:44','2014-10-12 07:14:44',NULL),(128,103,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:14:44',NULL,NULL,'2014-10-12 07:14:44','2014-10-12 07:14:44',NULL),(129,100,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:15:03',NULL,NULL,'2014-10-12 07:15:03','2014-10-12 07:15:03',NULL),(130,101,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:15:03',NULL,NULL,'2014-10-12 07:15:03','2014-10-12 07:15:03',NULL),(131,102,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:15:03',NULL,NULL,'2014-10-12 07:15:03','2014-10-12 07:15:03',NULL),(132,103,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:15:03',NULL,NULL,'2014-10-12 07:15:03','2014-10-12 07:15:03',NULL),(133,99,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:15:03',NULL,NULL,'2014-10-12 07:15:03','2014-10-12 07:15:03',NULL),(134,105,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:15:03',NULL,NULL,'2014-10-12 07:15:03','2014-10-12 07:15:03',NULL),(135,105,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:15:38',NULL,NULL,'2014-10-12 07:15:38','2014-10-12 07:15:38',NULL),(136,100,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:15:38',NULL,NULL,'2014-10-12 07:15:38','2014-10-12 07:15:38',NULL),(137,101,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:15:38',NULL,NULL,'2014-10-12 07:15:38','2014-10-12 07:15:38',NULL),(138,102,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:15:38',NULL,NULL,'2014-10-12 07:15:38','2014-10-12 07:15:38',NULL),(139,103,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:15:38',NULL,NULL,'2014-10-12 07:15:38','2014-10-12 07:15:38',NULL),(140,99,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:15:38',NULL,NULL,'2014-10-12 07:15:38','2014-10-12 07:15:38',NULL),(141,105,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-12 07:16:19',NULL,NULL,'2014-10-12 07:16:19','2014-10-12 07:16:19',NULL),(142,102,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-13 03:33:17',NULL,NULL,'2014-10-13 03:33:17','2014-10-13 03:33:17',NULL),(143,102,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-13 03:33:33',NULL,NULL,'2014-10-13 03:33:33','2014-10-13 03:33:33',NULL),(144,105,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-13 03:33:33',NULL,NULL,'2014-10-13 03:33:33','2014-10-13 03:33:33',NULL),(145,102,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-13 03:49:12',NULL,NULL,'2014-10-13 03:49:12','2014-10-13 03:49:12',NULL),(146,105,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-13 03:49:12',NULL,NULL,'2014-10-13 03:49:12','2014-10-13 03:49:12',NULL),(147,102,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-13 05:12:36',NULL,NULL,'2014-10-13 05:12:36','2014-10-13 05:12:36',NULL),(148,102,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-13 05:30:59',NULL,NULL,'2014-10-13 05:30:59','2014-10-13 05:30:59',NULL),(149,99,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-13 05:35:42',NULL,NULL,'2014-10-13 05:35:42','2014-10-13 05:35:42',NULL),(150,99,'app/models/Message.php:86','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-13 05:37:15',NULL,NULL,'2014-10-13 05:37:15','2014-10-13 05:37:15',NULL),(151,102,'app/models/Message.php:89','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-13 07:17:23',NULL,NULL,'2014-10-13 07:17:23','2014-10-13 07:17:23',NULL),(152,100,'app/models/Message.php:89','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-13 07:19:06',NULL,NULL,'2014-10-13 07:19:06','2014-10-13 07:19:06',NULL),(153,105,'app/models/Message.php:89','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-14 16:11:55',NULL,NULL,'2014-10-14 16:11:55','2014-10-14 16:11:55',NULL),(154,105,'app/models/Message.php:89','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-14 16:12:24',NULL,NULL,'2014-10-14 16:12:24','2014-10-14 16:12:24',NULL),(155,100,'app/models/Message.php:89','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-14 16:12:24',NULL,NULL,'2014-10-14 16:12:24','2014-10-14 16:12:24',NULL),(156,101,'app/models/Message.php:89','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-14 16:13:25',NULL,NULL,'2014-10-14 16:13:25','2014-10-14 16:13:25',NULL),(157,103,'app/models/Message.php:89','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-14 16:13:25',NULL,NULL,'2014-10-14 16:13:25','2014-10-14 16:13:25',NULL),(158,102,'app/models/Message.php:89','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-14 16:13:25',NULL,NULL,'2014-10-14 16:13:25','2014-10-14 16:13:25',NULL),(159,100,'app/models/Message.php:89','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-14 16:14:45',NULL,NULL,'2014-10-14 16:14:45','2014-10-14 16:14:45',NULL),(160,103,'app/models/Message.php:89','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-14 16:14:45',NULL,NULL,'2014-10-14 16:14:45','2014-10-14 16:14:45',NULL),(161,102,'app/models/Message.php:89','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-14 16:14:45',NULL,NULL,'2014-10-14 16:14:45','2014-10-14 16:14:45',NULL),(162,101,'app/models/Message.php:89','You have a new message','Don Rzeszut sent you a message.',2,'2014-10-14 16:14:45',NULL,NULL,'2014-10-14 16:14:45','2014-10-14 16:14:45',NULL);
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reminders`
--

DROP TABLE IF EXISTS `password_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reminders`
--

LOCK TABLES `password_reminders` WRITE;
/*!40000 ALTER TABLE `password_reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `meta_product_status_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_meta_product_statuses_idx` (`meta_product_status_id`),
  CONSTRAINT `products_meta_product_statuses` FOREIGN KEY (`meta_product_status_id`) REFERENCES `meta_product_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qna_answers`
--

DROP TABLE IF EXISTS `qna_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qna_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `qna_question_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qna_answers_user_id_idx` (`user_id`),
  KEY `qna_answers_qna_question_id_idx` (`qna_question_id`),
  KEY `qna_answers_get_answers_by_question_order_by_vote` (`qna_question_id`,`votes`),
  CONSTRAINT `qna_answers_qna_question_id` FOREIGN KEY (`qna_question_id`) REFERENCES `qna_questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `qna_answers_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qna_answers`
--

LOCK TABLES `qna_answers` WRITE;
/*!40000 ALTER TABLE `qna_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `qna_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qna_comments`
--

DROP TABLE IF EXISTS `qna_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qna_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `qna_id` int(11) NOT NULL,
  `meta_qna_type_id` int(11) NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qna_answer_comments_user_id_idx` (`user_id`),
  KEY `qna_comments_meta_qna_type_id_idx` (`meta_qna_type_id`),
  KEY `qna_comments_get_by_qna_order_by_votes` (`qna_id`,`meta_qna_type_id`,`votes`),
  CONSTRAINT `qna_comments_meta_qna_type_id` FOREIGN KEY (`meta_qna_type_id`) REFERENCES `meta_qna_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `qna_comments_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qna_comments`
--

LOCK TABLES `qna_comments` WRITE;
/*!40000 ALTER TABLE `qna_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `qna_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qna_questions`
--

DROP TABLE IF EXISTS `qna_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qna_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `qna_question_destination_id` int(11) NOT NULL COMMENT 'qna_question_destination_id is to store which user or company this question is assigned to',
  `accepted_qna_answer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qna_questions_user_id_idx` (`user_id`),
  KEY `qna_questions_accepted_qna_answer_id_idx` (`accepted_qna_answer_id`),
  KEY `qna_questions_get_by_destination` (`qna_question_destination_id`),
  KEY `qna_questions_get_unanswered_questions_order_by_votes` (`qna_question_destination_id`,`accepted_qna_answer_id`,`votes`),
  CONSTRAINT `qna_questions_accepted_qna_answer_id` FOREIGN KEY (`accepted_qna_answer_id`) REFERENCES `qna_answers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `qna_questions_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qna_questions`
--

LOCK TABLES `qna_questions` WRITE;
/*!40000 ALTER TABLE `qna_questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `qna_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qna_rep_transactions`
--

DROP TABLE IF EXISTS `qna_rep_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qna_rep_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `qna_id` int(11) NOT NULL COMMENT 'no foreign key because it can refer to multiple tables - qna_questions, qna_answers, qna_comments',
  `meta_qna_type_id` int(11) NOT NULL,
  `meta_qna_rep_type_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qna_rep_transactions_user_id_idx` (`user_id`),
  KEY `qna_rep_transactions_meta_qna_type_id_idx` (`meta_qna_type_id`),
  KEY `qna_rep_transactions_meta_qna_rep_type_id_idx` (`meta_qna_rep_type_id`),
  CONSTRAINT `qna_rep_transactions_meta_qna_rep_type_id` FOREIGN KEY (`meta_qna_rep_type_id`) REFERENCES `meta_qna_rep_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `qna_rep_transactions_meta_qna_type_id` FOREIGN KEY (`meta_qna_type_id`) REFERENCES `meta_qna_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `qna_rep_transactions_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qna_rep_transactions`
--

LOCK TABLES `qna_rep_transactions` WRITE;
/*!40000 ALTER TABLE `qna_rep_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `qna_rep_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_contacts`
--

DROP TABLE IF EXISTS `site_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `acquired_from` varchar(45) DEFAULT NULL,
  `notes` text,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_contacts`
--

LOCK TABLES `site_contacts` WRITE;
/*!40000 ALTER TABLE `site_contacts` DISABLE KEYS */;
INSERT INTO `site_contacts` VALUES (1,NULL,NULL,'',NULL,NULL,'home page footer','Looking for a direct sales company? We can help you find the right team for you.','2014-09-21 04:23:38','2014-09-21 04:23:38',NULL),(2,'don',NULL,'don@obscurecloud.com',NULL,'this is another message','contact form','page: /support','2014-09-21 04:31:37','2014-09-21 04:31:37',NULL),(3,NULL,NULL,'don@obscurecloud.com',NULL,NULL,'home page footer','Looking for a direct sales company? We can help you find the right team for you.','2014-09-23 05:32:19','2014-09-23 05:32:19',NULL),(4,NULL,NULL,'imac@obscurecloud.com',NULL,NULL,'home page footer','Looking for a direct sales company? We can help you find the right team for you.','2014-09-28 09:39:32','2014-09-28 09:39:32',NULL),(5,NULL,NULL,'imac@obscurecloud.com',NULL,NULL,'home page footer','Looking for a direct sales company? We can help you find the right team for you.','2014-09-28 09:42:23','2014-09-28 09:42:23',NULL);
/*!40000 ALTER TABLE `site_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submission_company_category`
--

DROP TABLE IF EXISTS `submission_company_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submission_company_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submission_company_category`
--

LOCK TABLES `submission_company_category` WRITE;
/*!40000 ALTER TABLE `submission_company_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `submission_company_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submission_social_networks`
--

DROP TABLE IF EXISTS `submission_social_networks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submission_social_networks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `website` varchar(254) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submission_social_networks`
--

LOCK TABLES `submission_social_networks` WRITE;
/*!40000 ALTER TABLE `submission_social_networks` DISABLE KEYS */;
/*!40000 ALTER TABLE `submission_social_networks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_autologin`
--

DROP TABLE IF EXISTS `user_autologin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_autologin`
--

LOCK TABLES `user_autologin` WRITE;
/*!40000 ALTER TABLE `user_autologin` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_autologin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_billing_items`
--

DROP TABLE IF EXISTS `user_billing_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_billing_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `billing_item_id` int(11) NOT NULL,
  `user_payment_profile_id` int(11) NOT NULL,
  `meta_billing_item_status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_billing_items_idx` (`billing_item_id`),
  KEY `user_billing_items_payment_profile_id_idx` (`user_payment_profile_id`),
  KEY `user_billing_items_meta_billing_item_status_id_idx` (`meta_billing_item_status_id`),
  KEY `user_billing_items_get_billing_items` (`billing_item_id`,`user_payment_profile_id`,`meta_billing_item_status_id`),
  CONSTRAINT `user_billing_items_billing_item_id` FOREIGN KEY (`billing_item_id`) REFERENCES `billing_items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_billing_items_meta_billing_item_status_id` FOREIGN KEY (`meta_billing_item_status_id`) REFERENCES `meta_billing_item_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_billing_items_payment_profile_id` FOREIGN KEY (`user_payment_profile_id`) REFERENCES `user_payment_profiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_billing_items`
--

LOCK TABLES `user_billing_items` WRITE;
/*!40000 ALTER TABLE `user_billing_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_billing_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_billing_transactions`
--

DROP TABLE IF EXISTS `user_billing_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_billing_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `billing_item_id` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `meta_billing_status_id` int(11) NOT NULL DEFAULT '1',
  `user_payment_profile_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_billing_transactions_idx` (`user_id`),
  KEY `user_billing_transactions_billing_item_id_idx` (`billing_item_id`),
  KEY `user_billing_transactions_user_payment_profile_id_idx` (`user_payment_profile_id`),
  KEY `user_billing_transactions_meta_billing_status_id_idx` (`meta_billing_status_id`),
  CONSTRAINT `user_billing_transactions_billing_item_id` FOREIGN KEY (`billing_item_id`) REFERENCES `billing_items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_billing_transactions_meta_billing_status_id` FOREIGN KEY (`meta_billing_status_id`) REFERENCES `meta_billing_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_billing_transactions_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_billing_transactions_user_payment_profile_id` FOREIGN KEY (`user_payment_profile_id`) REFERENCES `user_payment_profiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_billing_transactions`
--

LOCK TABLES `user_billing_transactions` WRITE;
/*!40000 ALTER TABLE `user_billing_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_billing_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_company_map`
--

DROP TABLE IF EXISTS `user_company_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_company_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `meta_user_comapny_status_id` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_company_map_user_company_UNIQUE` (`user_id`,`company_id`),
  KEY `user_company_map_company_id_idx` (`company_id`),
  KEY `user_company_map_user_id_idx` (`user_id`),
  KEY `user_company_map_meta_user_company_status_id_idx` (`meta_user_comapny_status_id`),
  CONSTRAINT `user_company_map_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_company_map_meta_user_company_status_id` FOREIGN KEY (`meta_user_comapny_status_id`) REFERENCES `meta_company_user_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_company_map_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_company_map`
--

LOCK TABLES `user_company_map` WRITE;
/*!40000 ALTER TABLE `user_company_map` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_company_map` ENABLE KEYS */;
UNLOCK TABLES;
ALTER DATABASE `dsk_1` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `user_company_map_BUPD` BEFORE UPDATE ON `user_company_map` FOR EACH ROW
-- Edit trigger body code below this line. Do not edit lines above this one
BEGIN
    SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
ALTER DATABASE `dsk_1` CHARACTER SET utf8 COLLATE utf8_general_ci ;

--
-- Table structure for table `user_connection_notes`
--

DROP TABLE IF EXISTS `user_connection_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_connection_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_connection_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_connection_notes_user_connection_id_idx` (`user_connection_id`),
  CONSTRAINT `user_connection_notes_user_connection_id` FOREIGN KEY (`user_connection_id`) REFERENCES `user_connections` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_connection_notes`
--

LOCK TABLES `user_connection_notes` WRITE;
/*!40000 ALTER TABLE `user_connection_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_connection_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_connections`
--

DROP TABLE IF EXISTS `user_connections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_connections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `connection_user_id` int(11) NOT NULL,
  `meta_connection_status_id` int(11) NOT NULL DEFAULT '1',
  `meta_connection_relationship_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_user_connection` (`user_id`,`company_id`,`connection_user_id`),
  KEY `user_connections_meta_connection_status_id_idx` (`meta_connection_status_id`),
  KEY `user_connections_meta_connection_relationship_id_idx` (`meta_connection_relationship_id`),
  KEY `user_connections_user_id_idx` (`user_id`),
  KEY `user_connections_company_id_idx` (`company_id`),
  KEY `user_connections_conection_user_id_idx` (`connection_user_id`),
  KEY `user_connections_get_user_connections` (`meta_connection_relationship_id`,`meta_connection_status_id`,`company_id`,`user_id`),
  KEY `user_connection_connections` (`company_id`,`connection_user_id`,`meta_connection_status_id`,`meta_connection_relationship_id`),
  CONSTRAINT `user_connections_company_id` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_connections_conection_user_id` FOREIGN KEY (`connection_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_connections_meta_connection_relationship_id` FOREIGN KEY (`meta_connection_relationship_id`) REFERENCES `meta_connection_relationships` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_connections_meta_connection_status_id` FOREIGN KEY (`meta_connection_status_id`) REFERENCES `meta_connection_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_connections_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_connections`
--

LOCK TABLES `user_connections` WRITE;
/*!40000 ALTER TABLE `user_connections` DISABLE KEYS */;
INSERT INTO `user_connections` VALUES (29,99,1,80,2,3,'2014-10-08 06:15:23','2014-10-08 06:15:23',NULL),(30,80,1,99,2,1,'2014-10-08 06:15:23','2014-10-08 06:15:23',NULL),(31,100,1,80,2,2,'2014-10-08 06:23:57','2014-10-08 06:25:40',NULL),(32,80,1,100,2,3,'2014-10-08 06:25:40','2014-10-08 06:25:40',NULL),(33,101,1,80,2,1,'2014-10-09 03:03:30','2014-10-09 03:13:27',NULL),(38,80,1,101,2,3,'2014-10-09 03:13:27','2014-10-09 03:13:27',NULL),(39,102,1,80,2,3,'2014-10-09 05:55:43','2014-10-09 05:55:56',NULL),(40,80,1,102,2,3,'2014-10-09 05:55:56','2014-10-09 05:55:56',NULL),(41,103,1,80,2,2,'2014-10-09 06:20:36','2014-10-09 06:22:39',NULL),(42,80,1,103,2,3,'2014-10-09 06:22:37','2014-10-09 06:22:37',NULL),(46,105,1,80,2,3,'2014-10-09 06:32:39','2014-10-09 06:33:40',NULL),(47,80,1,105,2,2,'2014-10-09 06:33:40','2014-10-09 06:33:40',NULL),(48,102,1,100,2,3,'2014-10-09 05:55:43','2014-10-09 05:55:56',NULL),(49,102,1,101,2,3,'2014-10-09 05:55:43','2014-10-09 05:55:56',NULL);
/*!40000 ALTER TABLE `user_connections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_payment_profiles`
--

DROP TABLE IF EXISTS `user_payment_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_payment_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `merchant_customer_id` varchar(45) NOT NULL COMMENT 'this is the id assigned by the merchant account',
  `meta_payment_profile_status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_payment_profiles_user_id_idx` (`user_id`),
  KEY `user_payment_profiles_meta_payment_profile_status_id_idx` (`meta_payment_profile_status_id`),
  KEY `user_payment_profiles_get_by_user` (`user_id`),
  KEY `user_payment_profiles_get_by_user_status` (`meta_payment_profile_status_id`,`user_id`),
  CONSTRAINT `user_payment_profiles_meta_payment_profile_status_id` FOREIGN KEY (`meta_payment_profile_status_id`) REFERENCES `meta_payment_profile_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_payment_profiles_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_payment_profiles`
--

LOCK TABLES `user_payment_profiles` WRITE;
/*!40000 ALTER TABLE `user_payment_profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_payment_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `meta_profile_type_id` int(11) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_profile_unique` (`user_id`,`meta_profile_type_id`),
  KEY `user_profiles_user_id_idx` (`user_id`),
  KEY `user_profiles_meta_profile_type_id_idx` (`meta_profile_type_id`),
  CONSTRAINT `user_profiles_meta_profile_type_id` FOREIGN KEY (`meta_profile_type_id`) REFERENCES `meta_profile_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_profiles_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES (17,80,2,'avatar_80.jpg','2014-10-18 20:15:10','2014-10-18 23:32:35',NULL),(22,80,1,'Dirk Digler','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(23,80,3,'Utah, USA1','2014-10-18 21:43:03','2014-10-18 21:46:19',NULL),(28,80,6,'801 604 3887','2014-10-18 21:46:31','0000-00-00 00:00:00',NULL),(29,80,4,'http://DirectSalesKit.com','2014-10-18 21:49:03','2014-10-18 21:49:49',NULL),(34,80,5,'{\"facebook\":{\"network_name\":\"Facebook\",\"network_id\":\"1\",\"webpage\":\"http://facebook.com\"},\"twitter\":{\"network_name\":\"Twitter\",\"network_id\":\"2\",\"webpage\":\"\"},\"instagram\":{\"network_name\":\"Instagram\",\"network_id\":\"3\",\"webpage\":\"sadfsadfsdf\"},\"vine\":{\"network_name\":\"Vine\",\"network_id\":\"4\",\"webpage\":\"\"},\"pinterest\":{\"network_name\":\"Pinterest\",\"network_id\":\"5\",\"webpage\":\"sdfsdfasdf\"},\"google\":{\"network_name\":\"Google +\",\"network_id\":\"6\",\"webpage\":\"gdfgdfsgdfg\"}}','2014-10-19 00:31:39','2014-10-19 00:58:17',NULL);
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_settings`
--

DROP TABLE IF EXISTS `user_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `meta_setting_type_id` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `us_unique_user_id_setting_id` (`user_id`,`meta_setting_type_id`),
  KEY `user_settings_user_id_idx` (`user_id`),
  KEY `user_settings_meta_setting_type_id_idx` (`meta_setting_type_id`),
  CONSTRAINT `user_settings_meta_setting_type_id` FOREIGN KEY (`meta_setting_type_id`) REFERENCES `meta_setting_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_settings_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_settings`
--

LOCK TABLES `user_settings` WRITE;
/*!40000 ALTER TABLE `user_settings` DISABLE KEYS */;
INSERT INTO `user_settings` VALUES (50,80,1,'1','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(51,80,2,'verify_all','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(88,99,1,'1','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(89,99,2,'verify_all','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(90,100,1,'1','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(91,100,2,'verify_all','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(92,101,1,'1','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(93,101,2,'verify_all','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(94,102,1,'1','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(95,102,2,'verify_all','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(96,103,1,'1','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(97,103,2,'verify_all','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(100,105,1,'1','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(101,105,2,'verify_all','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `user_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `new_password_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `meta_user_status_id` int(11) NOT NULL DEFAULT '1',
  `meta_user_type_id` int(11) NOT NULL DEFAULT '1',
  `stripe_active` tinyint(4) NOT NULL DEFAULT '0',
  `stripe_id` varchar(255) DEFAULT NULL,
  `stripe_subscription` varchar(255) DEFAULT NULL,
  `stripe_plan` varchar(25) DEFAULT NULL,
  `last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `subscription_ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `users_meta_user_status_id_idx` (`meta_user_status_id`),
  KEY `users_meta_user_type_id_idx` (`meta_user_type_id`),
  KEY `users_login` (`username`,`password`),
  CONSTRAINT `users_meta_user_status_id` FOREIGN KEY (`meta_user_status_id`) REFERENCES `meta_user_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `users_meta_user_type_id` FOREIGN KEY (`meta_user_type_id`) REFERENCES `meta_user_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (80,'don@obscurecloud.com','don@obscurecloud.com','$2y$10$oKhhLGdq0VDbOaHHaWtZaO1WhGWW7n0ajEi2pcBSwnIB3VDMuq2Gi',NULL,'Don','Rzeszut',NULL,NULL,NULL,NULL,NULL,'127.0.0.1',NULL,2,1,0,NULL,NULL,NULL,NULL,NULL,NULL,'2014-10-02 04:52:10','2014-10-18 22:16:32',NULL),(99,'j1@obscurecloud.com','j1@obscurecloud.com','$2y$10$jHqd12xsk7vD24qRTadV9uTsOKD6NQNQ/o1.5Mr0cw0.Thu3vZwQy',NULL,'j1','test',NULL,NULL,NULL,NULL,NULL,'127.0.0.1',NULL,2,1,0,NULL,NULL,NULL,NULL,NULL,NULL,'2014-10-08 06:15:16','2014-10-08 06:15:52',NULL),(100,'j3@obscurecloud.com','j3@obscurecloud.com','$2y$10$.FSBmnOTN5a1lOA3zh9nPuqqe3lYkZGxCDHevRCrWc7rUS8BgEKKm',NULL,'j3','test',NULL,NULL,NULL,NULL,NULL,'127.0.0.1',NULL,2,1,0,NULL,NULL,NULL,NULL,NULL,NULL,'2014-10-08 06:23:17','2014-10-08 06:23:24',NULL),(101,'j4@obscurecloud.com','j4@obscurecloud.com','$2y$10$N2aIlXMVaukm1WciVyxcce8ex.NeaXsjU.q3ubBukXHn2cXfj.T.m',NULL,'j4','test',NULL,NULL,NULL,NULL,NULL,'127.0.0.1',NULL,2,1,0,NULL,NULL,NULL,NULL,NULL,NULL,'2014-10-09 03:01:51','2014-10-09 03:02:59',NULL),(102,'j5@obscurecloud.com','j5@obscurecloud.com','$2y$10$aM8nUe0fIYoqFJyaHD9CE.bMlFb1KbpAf6OcPpAtIpXxlufwWPdz.',NULL,'j5','test',NULL,NULL,NULL,NULL,NULL,'127.0.0.1',NULL,2,1,0,NULL,NULL,NULL,NULL,NULL,NULL,'2014-10-09 05:54:54','2014-10-09 05:55:07',NULL),(103,'j6@obscurecloud.com','j6@obscurecloud.com','$2y$10$jdrdeJzvRyFQCBV1tPeDluhVm.DtBqnx1FY1A3ZI4bttufPAp0MaK',NULL,'j6','test',NULL,NULL,NULL,NULL,NULL,'127.0.0.1',NULL,2,1,0,NULL,NULL,NULL,NULL,NULL,NULL,'2014-10-09 06:19:54','2014-10-09 06:20:12',NULL),(105,'j7@obscurecloud.com','j7@obscurecloud.com','$2y$10$ZPvyjYlVGhTqLY6nKM99Nue5OeVqWc3TE4PyYu9o58zyEChrIxDIe',NULL,'j7','test',NULL,NULL,NULL,NULL,NULL,'127.0.0.1',NULL,2,1,0,NULL,NULL,NULL,NULL,NULL,NULL,'2014-10-09 06:29:34','2014-10-09 06:29:49',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-19 23:15:43
