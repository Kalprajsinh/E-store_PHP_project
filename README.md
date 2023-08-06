# E-Commerce Website 
<img src="https://github.com/Kalprajsinh/E-store_PHP_project/assets/96036005/c4b714a8-3b6c-4e1d-8eb5-c34149707dfb" alt="E-Commerce Website Icon" width="40" height="40">

## Live Demo

Check out the live demo of the website: [E-Store_Site_Kalpraj](http://e-storesitekalpraj.rf.gd/Home.php)

## Description

This is an e-commerce website built using Bootstrap, PHP, and MySQL. The project includes user registration, login, and cart management functionalities. It also integrates the LocalText SMS API for sending personalized notifications to users when products fall within their budget.

## Features

- **User Registration and Login:** Allow users to create accounts and log in securely. Passwords are stored in encrypted form in the database, and proper database management is implemented for security and efficiency. The user interface features easy-to-interact.

- **Cart Management:** Users can easily add and remove items from their shopping cart, ensuring a convenient shopping process.

- **Send SMS Notifications:** Utilizing the LocalText SMS API, the website sends notifications to users when products fall within their budget.This personalized approach enhances user engagement and interaction.


## Screenshots

<img src="https://github.com/Kalprajsinh/E-store_PHP_project/assets/96036005/d74617bb-e756-4902-b1b5-381f6a702941" alt="Login Screenshot">
<img src="https://github.com/Kalprajsinh/E-store_PHP_project/assets/96036005/439d2bd8-47b5-48cf-ad35-e1b9246cf6ee" alt="Cart Screenshot" style="width:49%;">
<img src="https://github.com/Kalprajsinh/E-store_PHP_project/assets/96036005/8f80bddd-0219-42f5-a777-c73b91d6debc" alt="items" style="width:49%;">
<img src="https://github.com/Kalprajsinh/E-store_PHP_project/assets/96036005/f919fe97-c6b3-48cf-bc18-71009a20f0dd" alt="Register Screenshot" style="width:49%;">
<img src="https://github.com/Kalprajsinh/E-store_PHP_project/assets/96036005/35e140e8-87bc-4d01-b85e-e1c96c9255fc" alt="SMS Screenshot" style="width:49%;">




## Database Tables
1. User Table

- Stores user information including name, email, username, password, and registration date.
- use for registration and login

2. Cart Table

- Tracks items in users' shopping carts, with details such as name, image, price, and discounts.
- Linked to the User Table through the user's email.
- n usre can add n item in cart. items are Attach with user email

3. SMSDetails Table

- Manages SMS notifications, containing recipient details, product names, codes, prices, and mobile numbers.

These tables collectively support features like user registration, cart management, and SMS notifications.



## Technologies Used

- Bootstrap
- HTML
- CSS
- PHP
- MySQL
- LocalText SMS API


