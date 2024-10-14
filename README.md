<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery README</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1, h2, h3 {
            color: #333;
        }
        h1 {
            text-align: center;
        }
        h2 {
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
        }
        p {
            margin: 10px 0;
        }
        code {
            background-color: #eee;
            padding: 2px 5px;
            border-radius: 3px;
        }
        pre {
            background-color: #eee;
            padding: 10px;
            border-radius: 5px;
            overflow: auto;
        }
        ul {
            list-style-type: disc;
            margin-left: 20px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Art Gallery Project</h1>

    <h2>Overview</h2>
    <p>The Art Gallery Project is a web application built using PHP, MVC architecture, jQuery, MySQL, and AJAX. This project serves as an online platform for showcasing artworks and facilitating user interactions.</p>

    <h2>Features</h2>
    <ul>
        <li>User authentication (sign up, login, logout)</li>
        <li>Gallery for displaying artworks</li>
        <li>Dynamic search and filter options</li>
        <li>Contact form for inquiries</li>
        <li>Responsive design for various devices</li>
        <li>Admin panel for managing artworks and users</li>
    </ul>

    <h2>Technologies Used</h2>
    <ul>
        <li><strong>PHP</strong> - Server-side scripting language</li>
        <li><strong>MySQL</strong> - Database management system</li>
        <li><strong>jQuery</strong> - JavaScript library for DOM manipulation</li>
        <li><strong>AJAX</strong> - Asynchronous JavaScript and XML for dynamic content loading</li>
        <li><strong>HTML/CSS</strong> - Markup and styling for web pages</li>
    </ul>

    <h2>Installation</h2>
    <p>To get a local copy of this project up and running, follow these simple steps:</p>
    <ol>
        <li>Clone the repository:
            <pre><code>git clone &lt;repository_url&gt;</code></pre>
        </li>
        <li>Navigate to the project directory:
            <pre><code>cd artGallery</code></pre>
        </li>
        <li>Import the database:
            <p>Run the SQL script located in <code>artistgallery.sql</code> using your preferred database management tool (e.g., phpMyAdmin).</p>
        </li>
        <li>Configure your database settings in <code>app/core/config.php</code>:</li>
            <pre><code>
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_NAME', 'your_database_name');</code></pre>
        </li>
        <li>Start your local server (e.g., XAMPP) and access the application at:
            <pre><code>http://localhost/artGallery</code></pre>
        </li>
    </ol>

    <h2>Usage</h2>
    <p>Once the application is running, you can:</p>
    <ul>
        <li>Register a new account or log in to your existing account.</li>
        <li>Browse through the gallery to view various artworks.</li>
        <li>Use the search feature to find specific artworks.</li>
        <li>Contact the gallery for any inquiries or information.</li>
    </ul>

    <h2>Contributing</h2>
    <p>If you want to contribute to this project, feel free to fork the repository and submit a pull request. Your contributions are welcome!</p>

    <h2>License</h2>
    <p>This project is licensed under the MIT License. See the <a href="LICENSE">LICENSE</a> file for details.</p>

    <div class="footer">
        <p>© 2024 Art Gallery Project</p>
    </div>
</body>
</html>
