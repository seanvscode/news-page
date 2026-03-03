<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EAGLE NEWS | Multi‑Page Demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        :root {
            --primary-color: #1a7e7e;
            --secondary-color: #288f93;
            --accent-color: #ffde22;
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
            flex-wrap: wrap;
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
        
        .page-indicator {
            background-color: var(--accent-color);
            color: white;
            padding: 8px 0;
            text-align: center;
            font-weight: 600;
            letter-spacing: 1px;
        }
        
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
            display: block;
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
            transition: transform 0.2s;
        }
        
        .side-news-item:hover {
            transform: translateY(-2px);
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
            display: block;
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
            display: block;
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
        
        .article-content {
            padding: 40px 0;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .article-content h1 {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        .article-meta {
            display: flex;
            gap: 20px;
            color: var(--gray-color);
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--light-color);
        }
        
        .article-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        
        .article-text {
            font-size: 1.1rem;
            line-height: 1.8;
        }
        
        .article-text p {
            margin-bottom: 20px;
        }
        
        .back-home {
            display: inline-block;
            margin-top: 30px;
            color: var(--accent-color);
            font-weight: 600;
        }
        
        .back-home i {
            margin-right: 8px;
        }
        
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
        
        @media (max-width: 992px) {
            .hero-container { grid-template-columns: 1fr; }
            .news-grid { grid-template-columns: repeat(2, 1fr); }
            .footer-content { grid-template-columns: repeat(2, 1fr); }
        }
        
        @media (max-width: 768px) {
            .mobile-menu { display: block; }
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
            nav ul li { margin: 15px 0; }
            .search-box input { width: 140px; }
            .main-news-content h1 { font-size: 1.8rem; }
            .categories { flex-direction: column; }
        }
        
        @media (max-width: 576px) {
            .news-grid { grid-template-columns: 1fr; }
            .footer-content { grid-template-columns: 1fr; }
            .side-news-item { flex-direction: column; }
            .side-news-img { width: 100%; height: 150px; }
            .main-news-content h1 { font-size: 1.5rem; }
            .search-box { order: 3; margin-top: 15px; width: 100%; margin-right: 0; }
            .search-box input { width: 100%; }
        }
    </style>
</head>
<body>
    <header>
        <div class="container header-content">
            <a href="index.html" class="logo">
                <i class="fas fa-newspaper"></i>
                <h1>Global<span>News</span></h1>
            </a>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
            <nav>
                <ul id="nav-menu">
                    <li><a href="index.html" class="active">Home</a></li>
                    <li><a href="category-world.html">World</a></li>
                    <li><a href="category-politics.html">Politics</a></li>
                    <li><a href="category-business.html">Business</a></li>
                    <li><a href="category-tech.html">Technology</a></li>
                    <li><a href="category-health.html">Health</a></li>
                    <li><a href="category-entertainment.html">Entertainment</a></li>
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

    <div class="page-indicator" id="page-indicator">HOME PAGE</div>

    <section class="hero">
        <div class="container hero-container">
            <a href="https://climatechangeconferences.org/" class="main-news">
                <img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1074&q=80" alt="Climate Summit">
                <div class="main-news-content">
                    <span class="news-tag">BREAKING NEWS</span>
                    <h1>Global Summit Addresses Climate Change: World Leaders Commit to New Emission Targets</h1>
                    <div class="news-meta">
                        <span><i class="far fa-clock"></i> 2 hours ago</span>
                        <span><i class="far fa-eye"></i> 15.4k views</span>
                    </div>
                </div>
            </a>
            <div class="side-news">
                <a href="https://www.usa.edu/blog/how-ai-is-revolutionizing-healthcare/" class="side-news-item">
                    <img src="https://images.unsplash.com/photo-1551135049-8a33b2fb2f4f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="AI Healthcare" class="side-news-img">
                    <div class="side-news-content">
                        <h3>New AI Technology Revolutionizes Healthcare Diagnostics</h3>
                        <div class="news-meta"><span>45 min ago</span></div>
                    </div>
                </a>
                <a href="https://www.skysports.com/football/news/11095/13427475/world-cup-2026-who-has-qualified-full-list-of-teams-for-usa-canada-and-mexico-tournament" class="side-news-item">
                    <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="World Cup" class="side-news-img">
                    <div class="side-news-content">
                        <h3>National Team Advances to World Cup Finals After Thrilling Match</h3>
                        <div class="news-meta"><span>1 hour ago</span></div>
                    </div>
                </a>
                <a href="https://www.wwf.org.uk/updates/new-amazon-species-are-discovered-every-other-day" class="side-news-item">
                    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1171&q=80" alt="Amazon Species" class="side-news-img">
                    <div class="side-news-content">
                        <h3>Scientists Discover New Species in Amazon Rainforest</h3>
                        <div class="news-meta"><span>3 hours ago</span></div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <main class="container">
        <div class="section-title">
            <h2>Latest News</h2>
            <a href="category-latest.html" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="news-grid">
            <a href="https://www.capitalgroup.com/advisor/insights/articles/guide-market-recoveries.html" class="news-card">
                <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="Stock Market">
                <div class="news-card-content">
                    <h3>Stock Markets Reach All-Time High Amid Economic Recovery</h3>
                    <p>Global markets rally as economic indicators show strong recovery trends across major economies.</p>
                    <div class="news-meta"><span>Business</span><span>4 hours ago</span></div>
                </div>
            </a>
            <a href="https://news.samsung.com/global/samsung-unveils-galaxy-s26-series-the-most-intuitive-galaxy-ai-phone-yet" class="news-card">
                <img src="https://images.unsplash.com/photo-1516981879613-9f5da904015f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1074&q=80" alt="Smartphone">
                <div class="news-card-content">
                    <h3>Tech Giant Unveils Next-Generation Smartphone with Revolutionary Features</h3>
                    <p>The new device promises breakthrough battery life and advanced AI capabilities.</p>
                    <div class="news-meta"><span>Technology</span><span>6 hours ago</span></div>
                </div>
            </a>
            <a href="https://blog.dana-farber.org/insight/2026/01/ten-cancer-related-breakthroughs-giving-us-hope-in-2026/" class="news-card">
                <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="Cancer Research">
                <div class="news-card-content">
                    <h3>Breakthrough in Cancer Research Offers Hope for New Treatment</h3>
                    <p>Scientists discover a promising new approach that could revolutionize cancer therapy.</p>
                    <div class="news-meta"><span>Health</span><span>8 hours ago</span></div>
                </div>
            </a>
        </div>

        <div class="section-title">
            <h2>News Categories</h2>
        </div>
        <div class="categories">
            <a href="https://www.bbc.com/news/world" class="category-card">
                <i class="fas fa-globe-americas"></i>
                <h3>World</h3>
                <p>International news and events</p>
            </a>
            <a href="https://newsinfo.inquirer.net/" class="category-card">
                <i class="fas fa-landmark"></i>
                <h3>Politics</h3>
                <p>Government and political news</p>
            </a>
            <a href="https://business.inquirer.net/" class="category-card">
                <i class="fas fa-chart-line"></i>
                <h3>Business</h3>
                <p>Financial and economic updates</p>
            </a>
            <a href="https://www.theverge.com/tech" class="category-card">
                <i class="fas fa-laptop-code"></i>
                <h3>Technology</h3>
                <p>Tech innovations and trends</p>
            </a>
        </div>

        <div class="section-title">
            <h2>Top Stories</h2>
            <a href="category-top-stories.html" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="news-grid">
            <a href="https://www.abs-cbn.com/entertainment/showbiz/movies-series/2026/1/14/new-netflix-project-of-squid-game-director-hwang-dong-hyuk-announced-1942" class="news-card">
                <img src="https://images.unsplash.com/photo-1511735111819-9a3f7709049c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1074&q=80" alt="Film Director">
                <div class="news-card-content">
                    <h3>Award-Winning Film Director Announces New Project</h3>
                    <p>The acclaimed filmmaker is set to begin production on a historical drama next month.</p>
                    <div class="news-meta"><span>Entertainment</span><span>1 day ago</span></div>
                </div>
            </a>
            <a href="https://tracextech.com/sustainable-agriculture-practices/" class="news-card">
                <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&auto=format&fit=crop&w=1171&q=80" alt="Farming">
                <div class="news-card-content">
                    <h3>Innovative Farming Techniques Boost Crop Yields by 40%</h3>
                    <p>New sustainable farming methods are revolutionizing agriculture in developing regions.</p>
                    <div class="news-meta"><span>Science</span><span>1 day ago</span></div>
                </div>
            </a>
            <a href="https://www.bbc.com/news/articles/cd679n9lnx5o" class="news-card">
                <img src="https://images.unsplash.com/photo-1573804633927-bfcbcd909acd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1227&q=80" alt="Gaming">
                <div class="news-card-content">
                    <h3>Major Gaming Conference Announces Next Generation Console</h3>
                    <p>The upcoming console promises photorealistic graphics and revolutionary gameplay.</p>
                    <div class="news-meta"><span>Gaming</span><span>2 days ago</span></div>
                </div>
            </a>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Global News</h3>
                    <p>Your trusted source for the latest news from around the world.</p>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/DAHBOO7"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@CNN"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="careers.html">Careers</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="privacy.html">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="category-world.html">World</a></li>
                        <li><a href="category-politics.html">Politics</a></li>
                        <li><a href="category-business.html">Business</a></li>
                        <li><a href="category-tech.html">Technology</a></li>
                        <li><a href="category-health.html">Health</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Subscribe</h3>
                    <p>Stay updated with our newsletter.</p>
                    <div class="search-box" style="margin-top:15px;">
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
        document.querySelector('.mobile-menu').addEventListener('click', function() {
            document.getElementById('nav-menu').classList.toggle('show');
        });
        document.addEventListener('click', function(event) {
            const navMenu = document.getElementById('nav-menu');
            const mobileMenu = document.querySelector('.mobile-menu');
            if (!navMenu.contains(event.target) && !mobileMenu.contains(event.target)) {
                navMenu.classList.remove('show');
            }
        });

        function loadPage(page) {
            const indicator = document.getElementById('page-indicator');
            const container = document.querySelector('main .container') || document.querySelector('.hero');
            if (page === 'index') {
                indicator.innerText = 'HOME PAGE';
                return;
            }
            let title = page.replace(/-/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
            indicator.innerText = title;
        }

        const path = window.location.pathname.split('/').pop() || 'index.html';
        if (path.includes('article') || path.includes('category') || path.includes('about') || path.includes('careers') || path.includes('contact') || path.includes('privacy')) {
            loadPage(path.split('.')[0]);
        }
    </script>

    <div style="display: none;" id="article-pages">
        <div id="https://climatechangeconferences.org/">
            <div class="page-indicator">CLIMATE SUMMIT</div>
            <div class="container article-content">
                <h1>Global Summit Addresses Climate Change: World Leaders Commit to New Emission Targets</h1>
                <div class="article-meta">
                    <span><i class="far fa-clock"></i> 2 hours ago</span>
                    <span><i class="far fa-user"></i> By Sarah Johnson</span>
                </div>
                <img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1074&q=80" alt="Climate Summit" class="article-image">
                <div class="article-text">
                    <p>World leaders gathered in Geneva today for the Emergency Climate Summit, committing to reduce carbon emissions by 50% by 2030. The landmark agreement, signed by 45 nations, represents the most ambitious climate pact in a decade.</p>
                    <p>"This is not just a promise, it's a survival plan," said UN Secretary-General during the opening ceremony. Developing nations will receive $100 billion annually to support green energy transitions.</p>
                    <p>Environmental groups have cautiously welcomed the deal but emphasize the need for immediate action rather than long-term pledges. The summit continues tomorrow with sessions on ocean conservation and deforestation.</p>
                    <a href="index.html" class="back-home"><i class="fas fa-arrow-left"></i> Back to Home</a>
                </div>
            </div>
        </div>
        <div id="https://www.usa.edu/blog/how-ai-is-revolutionizing-healthcare/">
            <div class="page-indicator">AI HEALTHCARE</div>
            <div class="container article-content">
                <h1>New AI Technology Revolutionizes Healthcare Diagnostics</h1>
                <div class="article-meta"><span>45 min ago</span><span>By Dr. Michael Chen</span></div>
                <img src="https://images.unsplash.com/photo-1551135049-8a33b2fb2f4f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="AI Healthcare" class="article-image">
                <div class="article-text">
                    <p>A groundbreaking AI system developed at Stanford University can now detect early-stage cancers with 99% accuracy, outperforming human radiologists. The deep learning model was trained on over 100,000 medical images.</p>
                    <p>Lead researcher Dr. Emily Wong explains: "This tool doesn't replace doctors—it gives them superpowers. We're seeing diagnoses months earlier than before."</p>
                    <p>Five major hospitals will begin pilot programs next month, with global rollout expected by 2025.</p>
                    <a href="index.html" class="back-home"><i class="fas fa-arrow-left"></i> Back to Home</a>
                </div>
            </div>
        </div>
        <div id="https://blog.dana-farber.org/insight/2026/01/ten-cancer-related-breakthroughs-giving-us-hope-in-2026/">
            <div class="page-indicator">WORLD CUP</div>
            <div class="container article-content">
                <h1>National Team Advances to World Cup Finals After Thrilling Match</h1>
                <div class="article-meta"><span>1 hour ago</span><span>By Carlos Mendez</span></div>
                <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="World Cup" class="article-image">
                <div class="article-text">
                    <p>In a dramatic penalty shootout, the national team secured their spot in the World Cup finals for the first time in 24 years. The 4-3 victory sent fans into euphoria across the country.</p>
                    <p>Captain Marta Silva scored the winning penalty and dedicated the match to the fans. "We believed from day one. This is for everyone who supported us."</p>
                    <p>The final will be played on Sunday against the defending champions.</p>
                    <a href="index.html" class="back-home"><i class="fas fa-arrow-left"></i> Back to Home</a>
                </div>
            </div>
        </div>
        <div id="https://www.wwf.org.uk/updates/new-amazon-species-are-discovered-every-other-day">
            <div class="page-indicator">AMAZON DISCOVERY</div>
            <div class="container article-content">
                <h1>Scientists Discover New Species in Amazon Rainforest</h1>
                <div class="article-meta"><span>3 hours ago</span><span>By Dr. Ana Lopez</span></div>
                <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1171&q=80" alt="Amazon" class="article-image">
                <div class="article-text">
                    <p>An expedition deep into the Peruvian Amazon has uncovered a previously unknown frog species with unique bioluminescent properties. The discovery highlights the incredible biodiversity still hidden in the rainforest.</p>
                    <p>"Its skin glows under UV light—a defense mechanism we've never seen in amphibians," said lead biologist Dr. James Carter. The team also documented 12 insect species likely new to science.</p>
                    <p>Conservationists warn that deforestation threatens these species before they can be studied.</p>
                    <a href="index.html" class="back-home"><i class="fas fa-arrow-left"></i> Back to Home</a>
                </div>
            </div>
        </div>
        <div id="https://www.capitalgroup.com/advisor/insights/articles/guide-market-recoveries.html">
            <div class="page-indicator">STOCK MARKET</div>
            <div class="container article-content">
                <h1>Stock Markets Reach All-Time High Amid Economic Recovery</h1>
                <div class="article-meta"><span>4 hours ago</span><span>By Robert Wu</span></div>
                <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="Stock Market" class="article-image">
                <div class="article-text">
                    <p>Global indices surged to record highs as strong corporate earnings and easing inflation boosted investor confidence. The S&P 500 crossed 5,000 for the first time, while European markets gained 2%.</p>
                    <p>"We're seeing a broad-based recovery," said economist Maria Gonzalez. "Consumers are spending, and businesses are hiring." Technology and energy sectors led the rally.</p>
                    <p>Analysts advise caution but remain optimistic about sustained growth through year-end.</p>
                    <a href="index.html" class="back-home"><i class="fas fa-arrow-left"></i> Back to Home</a>
                </div>
            </div>
        </div>
        <div id="https://news.samsung.com/global/samsung-unveils-galaxy-s26-series-the-most-intuitive-galaxy-ai-phone-yet">
            <div class="page-indicator">NEXT-GEN PHONE</div>
            <div class="container article-content">
                <h1>Tech Giant Unveils Next-Generation Smartphone with Revolutionary Features</h1>
                <div class="article-meta"><span>6 hours ago</span><span>By Lisa Park</span></div>
                <img src="https://images.unsplash.com/photo-1516981879613-9f5da904015f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1074&q=80" alt="Smartphone" class="article-image">
                <div class="article-text">
                    <p>The new phone features a rollable display, 200MP camera, and AI that predicts user needs before they tap. Battery life extends to three days on a single charge.</p>
                    <p>"This is the biggest leap since the original smartphone," said the CEO at the launch event. Pre-orders begin next week with prices starting at $1,199.</p>
                    <p>Industry experts predict strong demand despite the premium price tag.</p>
                    <a href="index.html" class="back-home"><i class="fas fa-arrow-left"></i> Back to Home</a>
                </div>
            </div>
        </div>
        <div id="https://blog.dana-farber.org/insight/2026/01/ten-cancer-related-breakthroughs-giving-us-hope-in-2026/">
            <div class="page-indicator">CANCER RESEARCH</div>
            <div class="container article-content">
                <h1>Breakthrough in Cancer Research Offers Hope for New Treatment</h1>
                <div class="article-meta"><span>8 hours ago</span><span>By Dr. Sarah Chen</span></div>
                <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80" alt="Cancer Research" class="article-image">
                <div class="article-text">
                    <p>A novel immunotherapy developed at Johns Hopkins has shown 80% success rate in treating pancreatic cancer in early trials. The treatment uses modified T-cells to target and destroy tumors.</p>
                    <p>"This could change everything for patients with hard-to-treat cancers," said lead researcher Dr. Ahmed Khan. Larger trials are planned for next year.</p>
                    <p>If approved, the therapy could be available within five years.</p>
                    <a href="index.html" class="back-home"><i class="fas fa-arrow-left"></i> Back to Home</a>
                </div>
            </div>
        </div>
        <div id="https://www.abs-cbn.com/entertainment/showbiz/movies-series/2026/1/14/new-netflix-project-of-squid-game-director-hwang-dong-hyuk-announced-1942">
            <div class="page-indicator">FILM DIRECTOR</div>
            <div class="container article-content">
                <h1>Award-Winning Film Director Announces New Project</h1>
                <div class="article-meta"><span>1 day ago</span><span>By Emma Watson</span></