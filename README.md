<h1>Art Gallery Project</h1>

<b>Overview:</b>
The Art Gallery Project is a web application built using PHP, MVC architecture, jQuery, MySQL, and AJAX. This project serves as an online platform for showcasing artworks and facilitating user interactions.

<b>Features:</b>
- User authentication (sign up, login, logout)
- Gallery for displaying artworks
- Dynamic search and filter options
- Contact form for inquiries
- Responsive design for various devices
- Admin panel for managing artworks and users

<b>Technologies Used:</b>
- <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="25" height="25"/> - Server-side scripting language
- <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="25" height="25"/> - Database management system
- <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/javascript/javascript-original.svg" alt="javascript" width="25" height="25"/> - (jQuery) JavaScript library for DOM manipulation
- AJAX - Asynchronous JavaScript and XML for dynamic content loading
- <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original-wordmark.svg" alt="html5" width="25" height="25"/> / <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original-wordmark.svg" alt="css3" width="25" height="25"/> </a> - Markup and styling for web pages

<b>Installation:</b>
To get a local copy of this project up and running, follow these simple steps:
1. Clone the repository:
   git clone <repository_url>
2. Navigate to the project directory:
   cd artGallery
3. Import the database:
   Run the SQL script located in artistgallery.sql using your preferred database management tool (e.g., phpMyAdmin).
4. Configure your database settings in app/core/config.php:
```
   define('DB_HOST', 'localhost');
   define('DB_USER', 'your_username');
   define('DB_PASS', 'your_password');
   define('DB_NAME', 'your_database_name');
   
```
5. Start your local server (e.g., XAMPP) and access the application at:
```
   http://localhost/artGallery
```
<b>Usage:</b>
Once the application is running, you can:
- Register a new account or log in to your existing account.
- Browse through the gallery to view various artworks.
- Use the search feature to find specific artworks.
- Contact the gallery for any inquiries or information.

<b>Contributing:</b>
If you want to contribute to this project, feel free to fork the repository and submit a pull request. Your contributions are welcome!

<b>License:</b>
This project is licensed under the MIT License. See the LICENSE file for details.


