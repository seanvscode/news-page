<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EAGLE NEWS | Multi‑Page Demo with CRUD</title>
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
            --success-color: #28a745;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
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
            position: relative;
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
        
        /* CRUD Admin Styles */
        .admin-panel {
            background-color: var(--light-color);
            padding: 30px 0;
            margin: 40px 0;
        }
        
        .admin-actions {
            display: flex;
            gap: 10px;
            margin: 20px 0;
            justify-content: center;
        }
        
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
        }
        
        .btn-success {
            background-color: var(--success-color);
            color: white;
        }
        
        .btn-success:hover {
            background-color: #218838;
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
        }
        
        .btn-warning {
            background-color: var(--warning-color);
            color: var(--dark-color);
        }
        
        .btn-warning:hover {
            background-color: #e0a800;
        }
        
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow-y: auto;
        }
        
        .modal-content {
            background-color: white;
            margin: 50px auto;
            padding: 30px;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            position: relative;
            animation: slideDown 0.3s ease;
        }
        
        @keyframes slideDown {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .close {
            position: absolute;
            right: 20px;
            top: 15px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            color: var(--gray-color);
        }
        
        .close:hover {
            color: var(--dark-color);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .admin-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .article-actions {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 5px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .news-card:hover .article-actions {
            opacity: 1;
        }
        
        .article-action-btn {
            background-color: white;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 0.85rem;
            box-shadow: var(--shadow);
            transition: all 0.2s;
        }
        
        .article-action-btn.edit {
            color: var(--warning-color);
        }
        
        .article-action-btn.edit:hover {
            background-color: var(--warning-color);
            color: white;
        }
        
        .article-action-btn.delete {
            color: var(--danger-color);
        }
        
        .article-action-btn.delete:hover {
            background-color: var(--danger-color);
            color: white;
        }
        
        .article-action-btn.view {
            color: var(--primary-color);
        }
        
        .article-action-btn.view:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .notification {
            position: fixed;
            top: 80px;
            right: 20px;
            padding: 15px 20px;
            background-color: var(--success-color);
            color: white;
            border-radius: 4px;
            box-shadow: var(--shadow);
            z-index: 3000;
            animation: slideIn 0.3s ease;
            display: none;
        }
        
        .notification.error {
            background-color: var(--danger-color);
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(100px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        /* Confirmation Dialog */
        .confirm-dialog {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        
        .confirm-dialog h3 {
            margin-bottom: 15px;
            color: var(--dark-color);
        }
        
        .confirm-dialog p {
            margin-bottom: 20px;
            color: var(--gray-color);
        }
        
        .confirm-actions {
            display: flex;
            gap: 10px;
            justify-content: center;
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
            .form-row { grid-template-columns: 1fr; }
        }
        
        @media (max-width: 576px) {
            .news-grid { grid-template-columns: 1fr; }
            .footer-content { grid-template-columns: 1fr; }
            .side-news-item { flex-direction: column; }
            .side-news-img { width: 100%; height: 150px; }
            .main-news-content h1 { font-size: 1.5rem; }
            .search-box { order: 3; margin-top: 15px; width: 100%; margin-right: 0; }
            .search-box input { width: 100%; }
            .admin-actions { flex-direction: column; }
            .btn { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>
    <header>
        <div class="container header-content">
            <a href="#" onclick="showHome()" class="logo">
                <i class="fas fa-newspaper"></i>
                <h1>EAGLE<span>NEWS</span></h1>
            </a>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
            <nav>
                <ul id="nav-menu">
                    <li><a href="#" onclick="showHome()" class="active">Home</a></li>
                    <li><a href="#" onclick="showCategory('world')">World</a></li>
                    <li><a href="#" onclick="showCategory('politics')">Politics</a></li>
                    <li><a href="#" onclick="showCategory('business')">Business</a></li>
                    <li><a href="#" onclick="showCategory('tech')">Technology</a></li>
                    <li><a href="#" onclick="showCategory('health')">Health</a></li>
                    <li><a href="#" onclick="showCategory('entertainment')">Entertainment</a></li>
                </ul>
            </nav>
            <div class="header-right">
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Search news...">
                    <i class="fas fa-search" onclick="searchNews()"></i>
                </div>
            </div>
        </div>
    </header>

    <div class="page-indicator" id="page-indicator">HOME PAGE</div>

    <!-- Notification -->
    <div id="notification" class="notification"></div>

    <!-- Main Content Area -->
    <div id="main-content"></div>

    <!-- Article View Modal -->
    <div id="articleModal" class="modal">
        <div class="modal-content" style="max-width: 800px;">
            <span class="close" onclick="closeModal('articleModal')">&times;</span>
            <div id="articleViewContent"></div>
        </div>
    </div>

    <!-- Article Form Modal -->
    <div id="articleFormModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('articleFormModal')">&times;</span>
            <h2 id="formModalTitle">Create New Article</h2>
            <form id="articleForm" onsubmit="saveArticle(event)">
                <input type="hidden" id="articleId" name="articleId">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category" required>
                            <option value="">Select Category</option>
                            <option value="world">World</option>
                            <option value="politics">Politics</option>
                            <option value="business">Business</option>
                            <option value="tech">Technology</option>
                            <option value="health">Health</option>
                            <option value="entertainment">Entertainment</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" id="author" name="author" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="imageUrl">Image URL</label>
                    <input type="url" id="imageUrl" name="imageUrl" required>
                </div>
                <div class="form-group">
                    <label for="summary">Summary</label>
                    <textarea id="summary" name="summary" required></textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" rows="6" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Save Article</button>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content" style="max-width: 400px;">
            <span class="close" onclick="closeModal('deleteModal')">&times;</span>
            <div class="confirm-dialog">
                <h3>Confirm Delete</h3>
                <p>Are you sure you want to delete this article? This action cannot be undone.</p>
                <div class="confirm-actions">
                    <button class="btn btn-danger" onclick="confirmDelete()">Delete</button>
                    <button class="btn" onclick="closeModal('deleteModal')">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>EAGLE NEWS</h3>
                    <p>Your trusted source for the latest news from around the world.</p>
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
                        <li><a href="#" onclick="showAbout()">About Us</a></li>
                        <li><a href="#" onclick="showCareers()">Careers</a></li>
                        <li><a href="#" onclick="showContact()">Contact</a></li>
                        <li><a href="#" onclick="showPrivacy()">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="#" onclick="showCategory('world')">World</a></li>
                        <li><a href="#" onclick="showCategory('politics')">Politics</a></li>
                        <li><a href="#" onclick="showCategory('business')">Business</a></li>
                        <li><a href="#" onclick="showCategory('tech')">Technology</a></li>
                        <li><a href="#" onclick="showCategory('health')">Health</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Subscribe</h3>
                    <p>Stay updated with our newsletter.</p>
                    <div class="search-box" style="margin-top:15px;">
                        <input type="text" placeholder="Your email" id="subscribeEmail">
                        <i class="fas fa-paper-plane" onclick="subscribeNewsletter()"></i>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 EAGLE NEWS Network. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Article Data Store
        let articles = [
            {
                id: '1',
                title: 'Global Summit Addresses Climate Change: World Leaders Commit to New Emission Targets',
                category: 'world',
                author: 'Sarah Johnson',
                imageUrl: 'https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1074&q=80',
                summary: 'World leaders gather for emergency climate summit',
                content: 'World leaders gathered in Geneva today for the Emergency Climate Summit, committing to reduce carbon emissions by 50% by 2030. The landmark agreement, signed by 45 nations, represents the most ambitious climate pact in a decade. "This is not just a promise, it\'s a survival plan," said UN Secretary-General during the opening ceremony. Developing nations will receive $100 billion annually to support green energy transitions. Environmental groups have cautiously welcomed the deal but emphasize the need for immediate action rather than long-term pledges. The summit continues tomorrow with sessions on ocean conservation and deforestation.',
                date: '2 hours ago',
                isBreaking: true,
                views: 15400
            },
            {
                id: '2',
                title: 'New AI Technology Revolutionizes Healthcare Diagnostics',
                category: 'tech',
                author: 'Dr. Michael Chen',
                imageUrl: 'https://images.unsplash.com/photo-1551135049-8a33b2fb2f4f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80',
                summary: 'AI system detects early-stage cancers with 99% accuracy',
                content: 'A groundbreaking AI system developed at Stanford University can now detect early-stage cancers with 99% accuracy, outperforming human radiologists. The deep learning model was trained on over 100,000 medical images. Lead researcher Dr. Emily Wong explains: "This tool doesn\'t replace doctors—it gives them superpowers. We\'re seeing diagnoses months earlier than before." Five major hospitals will begin pilot programs next month, with global rollout expected by 2025.',
                date: '45 min ago',
                isBreaking: false,
                views: 8900
            },
            {
                id: '3',
                title: 'National Team Advances to World Cup Finals After Thrilling Match',
                category: 'entertainment',
                author: 'Carlos Mendez',
                imageUrl: 'https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80',
                summary: 'Penalty shootout victory sends team to finals',
                content: 'In a dramatic penalty shootout, the national team secured their spot in the World Cup finals for the first time in 24 years. The 4-3 victory sent fans into euphoria across the country. Captain Marta Silva scored the winning penalty and dedicated the match to the fans. "We believed from day one. This is for everyone who supported us." The final will be played on Sunday against the defending champions.',
                date: '1 hour ago',
                isBreaking: false,
                views: 12300
            },
            {
                id: '4',
                title: 'Scientists Discover New Species in Amazon Rainforest',
                category: 'world',
                author: 'Dr. Ana Lopez',
                imageUrl: 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1171&q=80',
                summary: 'Bioluminescent frog species discovered',
                content: 'An expedition deep into the Peruvian Amazon has uncovered a previously unknown frog species with unique bioluminescent properties. The discovery highlights the incredible biodiversity still hidden in the rainforest. "Its skin glows under UV light—a defense mechanism we\'ve never seen in amphibians," said lead biologist Dr. James Carter. The team also documented 12 insect species likely new to science. Conservationists warn that deforestation threatens these species before they can be studied.',
                date: '3 hours ago',
                isBreaking: false,
                views: 6700
            },
            {
                id: '5',
                title: 'Stock Markets Reach All-Time High Amid Economic Recovery',
                category: 'business',
                author: 'Robert Wu',
                imageUrl: 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80',
                summary: 'Global indices surge to record highs',
                content: 'Global indices surged to record highs as strong corporate earnings and easing inflation boosted investor confidence. The S&P 500 crossed 5,000 for the first time, while European markets gained 2%. "We\'re seeing a broad-based recovery," said economist Maria Gonzalez. "Consumers are spending, and businesses are hiring." Technology and energy sectors led the rally. Analysts advise caution but remain optimistic about sustained growth through year-end.',
                date: '4 hours ago',
                isBreaking: false,
                views: 11200
            },
            {
                id: '6',
                title: 'Tech Giant Unveils Next-Generation Smartphone with Revolutionary Features',
                category: 'tech',
                author: 'Lisa Park',
                imageUrl: 'https://images.unsplash.com/photo-1516981879613-9f5da904015f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1074&q=80',
                summary: 'Rollable display and AI features lead innovation',
                content: 'The new phone features a rollable display, 200MP camera, and AI that predicts user needs before they tap. Battery life extends to three days on a single charge. "This is the biggest leap since the original smartphone," said the CEO at the launch event. Pre-orders begin next week with prices starting at $1,199. Industry experts predict strong demand despite the premium price tag.',
                date: '6 hours ago',
                isBreaking: false,
                views: 9800
            }
        ];

        let currentCategory = 'all';
        let deleteId = null;

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            showHome();
            
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

            // Search on Enter key
            document.getElementById('searchInput').addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    searchNews();
                }
            });
        });

        // Show notification
        function showNotification(message, type = 'success') {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.className = `notification ${type}`;
            notification.style.display = 'block';
            
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000);
        }

        // Close modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Show home page
        function showHome() {
            document.getElementById('page-indicator').textContent = 'HOME PAGE';
            currentCategory = 'all';
            renderHomePage();
            updateActiveNav('home');
        }

        // Show category page
        function showCategory(category) {
            currentCategory = category;
            document.getElementById('page-indicator').textContent = category.toUpperCase() + ' NEWS';
            renderCategoryPage(category);
            updateActiveNav(category);
        }

        // Update active navigation
        function updateActiveNav(active) {
            document.querySelectorAll('nav ul li a').forEach(link => {
                link.classList.remove('active');
                if (link.textContent.toLowerCase() === active || 
                    (active === 'home' && link.textContent === 'Home')) {
                    link.classList.add('active');
                }
            });
        }

        // Render home page
        function renderHomePage() {
            const breakingNews = articles.find(a => a.isBreaking) || articles[0];
            const sideNews = articles.slice(1, 4);
            const latestNews = articles.slice(0, 3);
            const topStories = articles.slice(3, 6);

            const html = `
                <section class="hero">
                    <div class="container hero-container">
                        <a href="#" onclick="viewArticle('${breakingNews.id}')" class="main-news">
                            <img src="${breakingNews.imageUrl}" alt="${breakingNews.title}">
                            <div class="main-news-content">
                                <span class="news-tag">BREAKING NEWS</span>
                                <h1>${breakingNews.title}</h1>
                                <div class="news-meta">
                                    <span><i class="far fa-clock"></i> ${breakingNews.date}</span>
                                    <span><i class="far fa-eye"></i> ${breakingNews.views.toLocaleString()} views</span>
                                </div>
                            </div>
                        </a>
                        <div class="side-news">
                            ${sideNews.map(article => `
                                <a href="#" onclick="viewArticle('${article.id}')" class="side-news-item">
                                    <img src="${article.imageUrl}" alt="${article.title}" class="side-news-img">
                                    <div class="side-news-content">
                                        <h3>${article.title}</h3>
                                        <div class="news-meta"><span>${article.date}</span></div>
                                    </div>
                                </a>
                            `).join('')}
                        </div>
                    </div>
                </section>

                <main class="container">
                    <div class="admin-title">
