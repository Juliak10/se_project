<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Panel</title>
    <link rel="stylesheet" href="stylesNews.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="./assets/hasan.png" alt="Logo" class="logo-img">
        </div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="news.php">News Panel</a></li>
            <li><a href="info.php">Information</a></li>
            <li><a href="forms.php">Forms and Petitions</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="about_us.php">About Us</a></li>
            <li><a href="#">Dashboard</a></li>
        </ul>
        <div class="profile-icon">
            <a href="profile.php">
                <i class='bx bx-user'></i>
            </a>
        </div>
    </nav>

    <main>
        <h2 class="page-title">All News</h2>
        <div class="news-container">
            <div class="news-card">
                <div class="news-image">
                    <img src="https://www.beirut.com/wp-content/uploads/2023/10/AUB-1955.jpg" alt="AUB Campus">
                </div>
                <div class="news-content">
                    <h3>A Glimpse into History: AUB Campus in 1955</h3>
                    <h6>Beirut.com - AUB 1955</h6>
                    <p>Beirut, Lebanon – A captivating photograph from 1955 offers a nostalgic look at the American University of Beirut (AUB)...</p>
                </div>
            </div>
            <div class="news-card">
                <div class="news-image">
                    <img src="https://www.beirut.com/wp-content/uploads/2023/10/Hamra-1973.jpg" alt="Hamra Street">
                </div>
                <div class="news-content">
                    <h3>Hamra Street in 1973: A Glimpse into Beirut's Golden Era</h3>
                    <h6>Beirut.com - Hamra 1973</h6>
                    <p>Beirut, Lebanon – A newly rediscovered photograph from 1973 offers a vibrant look at Hamra Street during its heyday...</p>
                </div>
            </div>
            <div class="news-card">
                <div class="news-image">
                    <img src="https://www.lau.edu.lb/images/history-1946-seaview.jpg" alt="LAU Campus">
                </div>
                <div class="news-content">
                    <h3>Charter and Academic Growth</h3>
                    <h6>LAU.com - 1946 campus</h6>
                    <p>In 1948–49 the AJCW program was expanded under the name Beirut College for Women (BCW). In 1950, it was granted a provisional charter...</p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-box">
            <div class="email-box">
                <h3>Subscribe to Our Newsletter</h3>
                <form action="#" method="post" class="subscribe-form">
                    <input type="email" placeholder="Your Email Address" required>
                    <button type="submit" class="btn-subscribe">Subscribe</button>
                </form>
            </div>
            <div class="contact-info">
                <h3>Contact Us</h3>
                <p>123 Street Name, Beirut, Lebanon</p>
                <p>Email: info@doyenlabs.com</p>
                <p>Phone: +123 456 7890</p>
            </div>
        </div>
        <p>&copy; 2024 DOYEN LABS. All rights reserved.</p>
    </footer>
</body>
</html>
