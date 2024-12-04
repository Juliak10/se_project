<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="stylesAbout.css">
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

    <section id="team" class="team-section">
        <h1>Meet the Team</h1>
        <div class="team-container">
            <div class="team-member">
                <img src="./assets/jay.jpg" alt="Jay">
            </div>
            <div class="team-member">
                <img src="./assets/haya.jpg" alt="Haya">
            </div>
            <div class="team-member">
                <img src="./assets/daoud.png" alt="Daoud">
            </div>
            <div class="team-member">
                <img src="./assets/saad.png" alt="Saad">
            </div>
        </div>
    </section>

    <section id="about-us" class="about-us">
        <h1>About Us</h1>
        <p>We are a passionate team dedicated to delivering the best solutions for our clients. Get to know us better below!</p>
        <section id="it-support" class="it-support">
            <h2>IT Support</h2>
            <p>Our IT Support team is here to assist you with technical issues, ensuring smooth and efficient operations. Contact us for assistance with hardware, software, or connectivity problems.</p>
            <ul>
                <li>Email: itsupport@municipality.com</li>
                <li>Phone: +961 1 234 567 ext.: 5678</li>
                <li>Availability: Monday to Friday, 9:00 AM to 5:00 PM</li>
            </ul>
        </section>
    
        <section id="contact-us" class="contact-us">
            <h2>Contact Us</h2>
            <p>If you have any questions, concerns, or feedback, feel free to reach out to us. We value your input and are here to help!</p>
            <ul>
                <li>Email: info@municipality.com</li>
                <li>Phone: +961 1 234 567; ext,: 1234</li>
                <li>Address: 123 Main Street, Beirut</li>
            </ul>
        </section>
    </section>

    <footer>
        <div class="footer-box">
            <div class="email_box">
                <h3>Subscribe to Our Newsletter</h3>
                <div class="sub-email">
                    <form action="#" method="post">
                        <input type="email" name="email" id="email" placeholder="Your Email Address" class="email-sub-place" required>
                        <button type="submit" class="sub_button">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="logo-footer">
                <a href="./assets/hasan.png class="logo-img">
                    <img src="./assets/hasan.png" alt="logo">
                </a>
            </div>
            <div class="info">
                <h3>Contact Us</h3>
                <p>123 Street Name, Beirut, Lebanon</p>
                <p>Email: info@doyenlabs.com</p>
                <p>Phone: +123 456 7890</p>
            </div>
        </div>
        <p align="center">&copy; 2024 DOYEN LABS. All rights reserved.</p>
    </footer>
</body>
</html>
