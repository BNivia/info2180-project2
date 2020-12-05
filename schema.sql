-- SQL Schema file for group 2
-- Jordan Wilson, Imani Miller, Jnatae Leckie, Danielle Mullings & Naomi Benjamin
-- Creates the database that stores all neccesary data needed for this project
DROP DATABASE if EXISTS `schema`;
CREATE DATABASE `schema`;
USE `schema`;
-- Users Table
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` INTEGER AUTO_INCREMENT,
    `firstname` VARCHAR(20),
    `lastname` VARCHAR(20),
    `pwrd` VARCHAR(12),
    `email` VARCHAR(40),
    `date_joined` DATETIME default CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);
-- Grant user privilges
GRANT ALL PRIVILEGES ON * TO 'admin' @'localhost' IDENTIFIED BY 'password123';
-- adding admin 
-- currently the password is not hashed. will figure out in a bit
INSERT INTO `users`
VALUES (
        1,
        'Admin',
        'User',
        'password123',
        'admin@project2.com',
        '2020-11-28'
    );
-- Issues Table
DROP TABLE IF EXISTS `issues`;
CREATE TABLE `issues`(
    `id` INTEGER AUTO_INCREMENT,
    `title` VARCHAR(40),
    `description` TEXT,
    `type` VARCHAR(10),
    `priority` VARCHAR(10),
    `status` VARCHAR(20),
    `assigned_to` INTEGER,
    `created_by` INTEGER,
    `created` DATETIME default CURRENT_TIMESTAMP,
    `updated` DATETIME default CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);
INSERT INTO `issues`
VALUES (
        0,
        'Database Not Updating',
        "The database is just not working. 
We have tried to send various values. It could be an error with the php",
        "Proposal",
        "Major",
        "Open",
        "1",
        "2",
        "20201124",
        "20201125"
    );