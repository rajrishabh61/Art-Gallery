<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 20px; background-color: #f9f9f9;">
    <h1 style="text-align: center; color: #333;">Art Gallery Project</h1>

    <h2 style="color: #333; border-bottom: 2px solid #333; padding-bottom: 5px;">Overview</h2>
    <p style="margin: 10px 0;">The Art Gallery Project is a web application built using PHP, MVC architecture, jQuery, MySQL, and AJAX. This project serves as an online platform for showcasing artworks and facilitating user interactions.</p>

    <h2 style="color: #333; border-bottom: 2px solid #333; padding-bottom: 5px;">Features</h2>
    <ul style="list-style-type: disc; margin-left: 20px;">
        <li>User authentication (sign up, login, logout)</li>
        <li>Gallery for displaying artworks</li>
        <li>Dynamic search and filter options</li>
        <li>Contact form for inquiries</li>
        <li>Responsive design for various devices</li>
        <li>Admin panel for managing artworks and users</li>
    </ul>

    <h2 style="color: #333; border-bottom: 2px solid #333; padding-bottom: 5px;">Technologies Used</h2>
    <ul style="list-style-type: disc; margin-left: 20px;">
        <li><strong>PHP</strong> - Server-side scripting language</li>
        <li><strong>MySQL</strong> - Database management system</li>
        <li><strong>jQuery</strong> - JavaScript library for DOM manipulation</li>
        <li><strong>AJAX</strong> - Asynchronous JavaScript and XML for dynamic content loading</li>
        <li><strong>HTML/CSS</strong> - Markup and styling for web pages</li>
    </ul>

    <h2 style="color: #333; border-bottom: 2px solid #333; padding-bottom: 5px;">Installation</h2>
    <p style="margin: 10px 0;">To get a local copy of this project up and running, follow these simple steps:</p>
    <ol style="margin: 10px 0;">
        <li>Clone the repository:
            <pre style="background-color: #eee; padding: 10px; border-radius: 5px; overflow: auto;"><code style="background-color: #eee; padding: 2px 5px; border-radius: 3px;">git clone &lt;repository_url&gt;</code></pre>
        </li>
        <li>Navigate to the project directory:
            <pre style="background-color: #eee; padding: 10px; border-radius: 5px; overflow: auto;"><code style="background-color: #eee; padding: 2px 5px; border-radius: 3px;">cd artGallery</code></pre>
        </li>
        <li>Import the database:
            <p style="margin: 10px 0;">Run the SQL script located in <code style="background-color: #eee; padding: 2px 5px; border-radius: 3px;">artistgallery.sql</code> using your preferred database management tool (e.g., phpMyAdmin).</p>
        </li>
        <li>Configure your database settings in <code style="background-color: #eee; padding: 2px 5px; border-radius: 3px;">app/core/config.php</code>:</li>
            <pre style="background-color: #eee; padding: 10px; border-radius: 5px; overflow: auto;">
<code style="background-color: #eee; padding: 2px 5px; border-radius: 3px;">
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_NAME', 'your_database_name');</code></pre>
        </li>
        <li>Start your local server (e.g., XAMPP) and access the application at:
            <pre style="background-color: #eee; padding: 10px; border-radius: 5px; overflow: auto;"><code style="background-color: #eee; padding: 2px 5px; border-radius: 3px;">http://localhost/artGallery</code></pre>
        </li>
    </ol>

    <h2 style="color: #333; border-bottom: 2px solid #333; padding-bottom: 5px;">Usage</h2>
    <p style="margin: 10px 0;">Once the application is running, you can:</p>
    <ul style="list-style-type: disc; margin-left: 20px;">
        <li>Register a new account or log in to your existing account.</li>
        <li>Browse through the gallery to view various artworks.</li>
        <li>Use the search feature to find specific artworks.</li>
        <li>Contact the gallery for any inquiries or information.</li>
    </ul>

    <h2 style="color: #333; border-bottom: 2px solid #333; padding-bottom: 5px;">Contributing</h2>
    <p style="margin: 10px 0;">If you want to contribute to this project, feel free to fork the repository and submit a pull request. Your contributions are welcome!</p>

    <h2 style="color: #333; border-bottom: 2px solid #333; padding-bottom: 5px;">License</h2>
    <p style="margin: 10px 0;">This project is licensed under the MIT License. See the <a href="LICENSE">LICENSE</a> file for details.</p>

    <div style="margin-top: 20px; text-align: center; font-size: 0.9em; color: #666;" class="footer">
        <p>© 2024 Art Gallery Project</p>
    </div>
</body>
</html>
