<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global News Network | Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        :root {
            --primary-color: #1a237e;
            --secondary-color: #283593;
            --accent-color: #ff5722;
            --light-color: #f5f5f5;
            --dark-color: #212121;
            --gray-color: #757575;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        body {
            line-height: 1.6;
            color: var(--dark-color);
            background-color: #fff;
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header Styles */
        header {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 0;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
        }
        
        .logo i {
            color: var(--accent-color);
            margin-right: 10px;
        }
        
        .logo span {
            color: var(--accent-color);
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 25px;
        }
        
        nav ul li a {
            font-weight: 600;
            transition: color 0.3s;
            font-size: 1rem;
        }
        
        nav ul li a:hover {
            color: var(--accent-color);
        }
        
        .active {
            color: var(--accent-color);
        }
        
        .header-right {
            display: flex;
            align-items: center;
        }
        
        .search-box {
            background-color: white;
            border-radius: 4px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            margin-right: 20px;
        }
        
        .search-box input {
            border: none;
            outline: none;
            width: 180px;
        }
        
        .search-box i {
            color: var(--gray-color);
        }
        
        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* Hero Section */
        .hero {
            padding: 40px 0;
            background-color: var(--light-color);
        }
        
        .hero-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }
        
        .main-news {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }
        
        .main-news img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            display: block;
        }
        
        .main-news-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.9));
            color: white;
            padding: 30px;
        }
        
        .main-news-content h1 {
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        
        .news-tag {
            display: inline-block;
            background-color: var(--accent-color);
            color: white;
            padding: 5px 12px;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .side-news {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .side-news-item {
            display: flex;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }
        
        .side-news-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
        }
        
        .side-news-content {
            padding: 15px;
            flex: 1;
        }
        
        .side-news-content h3 {
            font-size: 1.1rem;
            margin-bottom: 8px;
        }
        
        /* News Sections */
        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 40px 0 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-color);
        }
        
        .section-title h2 {
            font-size: 1.8rem;
            color: var(--primary-color);
        }
        
        .view-all {
            color: var(--accent-color);
            font-weight: 600;
        }
        
        .news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .news-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: transform 0.3s;
        }
        
        .news-card:hover {
            transform: translateY(-5px);
        }
        
        .news-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .news-card-content {
            padding: 20px;
        }
        
        .news-card-content h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--dark-color);
        }
        
        .news-card-content p {
            color: var(--gray-color);
            font-size: 0.95rem;
            margin-bottom: 15px;
        }
        
        .news-meta {
            display: flex;
            justify-content: space-between;
            color: var(--gray-color);
            font-size: 0.85rem;
        }
        
        /* Categories */
        .categories {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 40px;
            gap: 15px;
        }
        
        .category-card {
            flex: 1;
            min-width: 180px;
            background-color: white;
            padding: 25px 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: all 0.3s;
        }
        
        .category-card:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .category-card i {
            font-size: 2rem;
            margin-bottom: 15px;
            color: var(--accent-color);
        }
        
        .category-card:hover i {
            color: white;
        }
        
        /* Footer */
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 50px 0 20px;
            margin-top: 40px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-bottom: 40px;
        }
        
        .footer-column h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: var(--accent-color);
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column ul li a:hover {
            color: var(--accent-color);
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: background-color 0.3s;
        }
        
        .social-icons a:hover {
            background-color: var(--accent-color);
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-container {
                grid-template-columns: 1fr;
            }
            
            .news-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
            }
            
            nav ul {
                position: fixed;
                top: 70px;
                left: 0;
                width: 100%;
                background-color: var(--primary-color);
                flex-direction: column;
                align-items: center;
                padding: 20px 0;
                transform: translateY(-100%);
                opacity: 0;
                transition: all 0.3s;
                z-index: 999;
            }
            
            nav ul.show {
                transform: translateY(0);
                opacity: 1;
            }
            
            nav ul li {
                margin: 15px 0;
            }
            
            .search-box input {
                width: 140px;
            }
            
            .main-news-content h1 {
                font-size: 1.8rem;
            }
            
            .categories {
                flex-direction: column;
            }
        }
        
        @media (max-width: 576px) {
            .news-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
            
            .side-news-item {
                flex-direction: column;
            }
            
            .side-news-img {
                width: 100%;
                height: 150px;
            }
            
            .main-news-content h1 {
                font-size: 1.5rem;
            }
            
            .header-content {
                flex-wrap: wrap;
            }
            
            .search-box {
                order: 3;
                margin-top: 15px;
                width: 100%;
                margin-right: 0;
            }
            
            .search-box input {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Header with Navigation -->
    <header>
        <div class="container header-content">
            <div class="logo">
                <i class="fas fa-newspaper"></i>
                <h1>Global<span>News</span></h1>
            </div>
            
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
            
            <nav>
                <ul id="nav-menu">
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">World</a></li>
                    <li><a href="#">Politics</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">Health</a></li>
                    <li><a href="#">Entertainment</a></li>
                </ul>
            </nav>
            
            <div class="header-right">
                <div class="search-box">
                    <input type="text" placeholder="Search news...">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section with Main News -->
    <section class="hero">
        <div class="container hero-container">
            <div class="main-news">
                <img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="Breaking News">
                <div class="main-news-content">
                    <span class="news-tag">BREAKING NEWS</span>
                    <h1>Global Summit Addresses Climate Change: World Leaders Commit to New Emission Targets</h1>
                    <div class="news-meta">
                        <span><i class="far fa-clock"></i> 2 hours ago</span>
                        <span><i class="far fa-eye"></i> 15.4k views</span>
                    </div>
                </div>
            </div>
            
            <div class="side-news">
                <div class="side-news-item">
                    <img src="https://images.unsplash.com/photo-1551135049-8a33b2fb2f4f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Tech News" class="side-news-img">
                    <div class="side-news-content">
                        <h3>New AI Technology Revolutionizes Healthcare Diagnostics</h3>
                        <div class="news-meta">
                            <span>45 min ago</span>
                        </div>
                    </div>
                </div>
                
                <div class="side-news-item">
                    <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Sports News" class="side-news-img">
                    <div class="side-news-content">
                        <h3>National Team Advances to World Cup Finals After Thrilling Match</h3>
                        <div class="news-meta">
                            <span>1 hour ago</span>
                        </div>
                    </div>
                </div>
                
                <div class="side-news-item">
                    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80" alt="Nature News" class="side-news-img">
                    <div class="side-news-content">
                        <h3>Scientists Discover New Species in Amazon Rainforest</h3>
                        <div class="news-meta">
                            <span>3 hours ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <main class="container">
        <div class="section-title">
            <h2>Latest News</h2>
            <a href="#" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="news-grid">
            <div class="news-card">
                <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Business News">
                <div class="news-card-content">
                    <h3>Stock Markets Reach All-Time High Amid Economic Recovery</h3>
                    <p>Global markets rally as economic indicators show strong recovery trends across major economies.</p>
                    <div class="news-meta">
                        <span>Business</span>
                        <span>4 hours ago</span>
                    </div>
                </div>
            </div>
            
            <div class="news-card">
                <img src="https://images.unsplash.com/photo-1516981879613-9f5da904015f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="Tech News">
                <div class="news-card-content">
                    <h3>Tech Giant Unveils Next-Generation Smartphone with Revolutionary Features</h3>
                    <p>The new device promises breakthrough battery life and advanced AI capabilities.</p>
                    <div class="news-meta">
                        <span>Technology</span>
                        <span>6 hours ago</span>
                    </div>
                </div>
            </div>
            
            <div class="news-card">
                <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Health News">
                <div class="news-card-content">
                    <h3>Breakthrough in Cancer Research Offers Hope for New Treatment</h3>
                    <p>Scientists discover a promising new approach that could revolutionize cancer therapy.</p>
                    <div class="news-meta">
                        <span>Health</span>
                        <span>8 hours ago</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Categories Section -->
        <div class="section-title">
            <h2>News Categories</h2>
        </div>
        
        <div class="categories">
            <div class="category-card">
                <i class="fas fa-globe-americas"></i>
                <h3>World</h3>
                <p>International news and events</p>
            </div>
            
            <div class="category-card">
                <i class="fas fa-landmark"></i>
                <h3>Politics</h3>
                <p>Government and political news</p>
            </div>
            
            <div class="category-card">
                <i class="fas fa-chart-line"></i>
                <h3>Business</h3>
                <p>Financial and economic updates</p>
            </div>
            
            <div class="category-card">
                <i class="fas fa-laptop-code"></i>
                <h3>Technology</h3>
                <p>Tech innovations and trends</p>
            </div>
        </div>
        
        <!-- More News Section -->
        <div class="section-title">
            <h2>Top Stories</h2>
            <a href="#" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="news-grid">
            <div class="news-card">
                <img src="https://images.unsplash.com/photo-1511735111819-9a3f7709049c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="Entertainment News">
                <div class="news-card-content">
                    <h3>Award-Winning Film Director Announces New Project</h3>
                    <p>The acclaimed filmmaker is set to begin production on a historical drama next month.</p>
                    <div class="news-meta">
                        <span>Entertainment</span>
                        <span>1 day ago</span>
                    </div>
                </div>
            </div>
            
            <div class="news-card">
                <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1171&q=80" alt="Agriculture News">
                <div class="news-card-content">
                    <h3>Innovative Farming Techniques Boost Crop Yields by 40%</h3>
                    <p>New sustainable farming methods are revolutionizing agriculture in developing regions.</p>
                    <div class="news-meta">
                        <span>Science</span>
                        <span>1 day ago</span>
                    </div>
                </div>
            </div>
            
            <div class="news-card">
                <img src="https://images.unsplash.com/photo-1573804633927-bfcbcd909acd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1227&q=80" alt="Gaming News">
                <div class="news-card-content">
                    <h3>Major Gaming Conference Announces Next Generation Console</h3>
                    <p>The upcoming console promises photorealistic graphics and revolutionary gameplay.</p>
                    <div class="news-meta">
                        <span>Gaming</span>
                        <span>2 days ago</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Global News</h3>
                    <p>Your trusted source for the latest news from around the world. Delivering accurate, timely, and comprehensive coverage.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="#">World</a></li>
                        <li><a href="#">Politics</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">Health</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Subscribe</h3>
                    <p>Stay updated with our latest news stories. Subscribe to our newsletter.</p>
                    <div class="search-box" style="margin-top: 15px;">
                        <input type="text" placeholder="Your email">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2023 Global News Network. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu').addEventListener('click', function() {
            document.getElementById('nav-menu').classList.toggle('show');
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const navMenu = document.getElementById('nav-menu');
            const mobileMenu = document.querySelector('.mobile-menu');
            
            if (!navMenu.contains(event.target) && !mobileMenu.contains(event.target)) {
                navMenu.classList.remove('show');
            }
        });
        
        // Simulate news card interactions
        const newsCards = document.querySelectorAll('.news-card');
        newsCards.forEach(card => {
            card.addEventListener('click', function() {
                const title = this.querySelector('h3').textContent;
                alert(`Loading full article: "${title}"`);
            });
        });
        
        // Simulate category card interactions
        const categoryCards = document.querySelectorAll('.category-card');
        categoryCards.forEach(card => {
            card.addEventListener('click', function() {
                const category = this.querySelector('h3').textContent;
                alert(`Loading news for category: ${category}`);
            });
        });
    </script>
</body>
</html>
