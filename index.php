<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eagle School News</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* (Styles unchanged – same as previous version) */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        :root {
            --primary-color: #1e4a6f;
            --secondary-color: #2c3e50;
            --accent-color: #f1c40f;
            --light-color: #f8f9fa;
            --dark-color: #212121;
            --gray-color: #6c757d;
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
            gap: 10px;
        }
        
        .search-box {
            background-color: white;
            border-radius: 4px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
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
            color: var(--dark-color);
            padding: 8px 0;
            text-align: center;
            font-weight: 600;
            letter-spacing: 1px;
        }
        
        .hero {
            padding: 40px 0;
            background-color: var(--light-color);
            text-align: center;
        }
        
        .hero h2 {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        
        .hero p {
            font-size: 1.2rem;
            color: var(--gray-color);
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
            cursor: pointer;
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
        
        .add-news-btn {
            background-color: var(--accent-color);
            color: var(--dark-color);
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s;
        }
        
        .add-news-btn:hover {
            background-color: #e0b90f;
        }
        
        .news-form-container {
            background-color: var(--light-color);
            padding: 30px;
            border-radius: 8px;
            margin: 20px 0;
            display: none;
        }
        
        .news-form-container.show {
            display: block;
        }
        
        .news-form h3 {
            margin-bottom: 20px;
            color: var(--primary-color);
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }
        
        .form-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }
        
        .form-actions button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
        }
        
        .form-actions button[type="submit"] {
            background-color: var(--primary-color);
            color: white;
        }
        
        .form-actions button[type="button"] {
            background-color: #ccc;
        }
        
        .modal {
            display: none;
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.5);
            align-items: center;
            justify-content: center;
            z-index: 2000;
        }
        
        .modal-content {
            background-color: white;
            max-width: 600px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            border-radius: 8px;
            padding: 30px;
            position: relative;
        }
        
        .close-modal {
            position: absolute;
            top: 15px; right: 20px;
            font-size: 1.8rem;
            cursor: pointer;
        }
        
        .modal-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        .edit-article, .delete-article {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
        }
        
        .edit-article {
            background-color: var(--primary-color);
            color: white;
        }
        
        .delete-article {
            background-color: #dc3545;
            color: white;
        }
        
        @media (max-width: 992px) {
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
            .categories { flex-direction: column; }
        }
        
        @media (max-width: 576px) {
            .news-grid { grid-template-columns: 1fr; }
            .footer-content { grid-template-columns: 1fr; }
            .search-box { order: 3; margin-top: 15px; width: 100%; margin-right: 0; }
            .search-box input { width: 100%; }
        }
    </style>
</head>
<body>
    <header>
        <div class="container header-content">
            <a href="#home" class="logo" id="logoLink">
                <i class="fas fa-school"></i>
                <h1>Eagle<span> School News</span></h1>
            </a>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
            <nav>
                <ul id="nav-menu">
                    <li><a href="#home" class="active">Home</a></li>
                    <li><a href="#events">Events</a></li>
                    <li><a href="#announcements">Announcements</a></li>
                    <li><a href="#sports">Sports</a></li>
                    <li><a href="#clubs">Clubs</a></li>
                    <li><a href="#student-life">Student Life</a></li>
                </ul>
            </nav>
            <div class="header-right">
                <div class="search-box">
                    <input type="text" placeholder="Search news...">
                    <i class="fas fa-search"></i>
                </div>
                <button class="add-news-btn" id="addNewsBtn"><i class="fas fa-plus"></i> Add News</button>
            </div>
        </div>
    </header>

    <div class="page-indicator" id="page-indicator">HOME</div>

    <!-- Add/Edit News Form -->
    <div class="container">
        <div id="newsFormContainer" class="news-form-container">
            <form id="newsForm" class="news-form">
                <h3 id="formTitle">Submit School News</h3>
                <div class="form-group">
                    <label for="title">Headline *</label>
                    <input type="text" id="title" required>
                </div>
                <div class="form-group">
                    <label for="summary">Short Summary *</label>
                    <textarea id="summary" required></textarea>
                </div>
                <div class="form-group">
                    <label for="content">Full Story *</label>
                    <textarea id="content" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category *</label>
                    <select id="category" required>
                        <option value="">Select a category</option>
                        <option value="Events">Events</option>
                        <option value="Announcements">Announcements</option>
                        <option value="Sports">Sports</option>
                        <option value="Clubs">Clubs</option>
                        <option value="Student Life">Student Life</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="eventDate">Event Date (if applicable)</label>
                    <input type="date" id="eventDate">
                </div>
                <div class="form-group">
                    <label for="imageUrl">Image URL (optional)</label>
                    <input type="url" id="imageUrl" placeholder="https://...">
                </div>
                <div class="form-actions">
                    <button type="button" id="cancelFormBtn">Cancel</button>
                    <button type="submit" id="submitBtn">Publish</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Main homepage content (no preset news) -->
    <main id="homepage">
        <section class="hero">
            <div class="container">
                <h2>Welcome to Eagle School News</h2>
                <p>Share your stories – use the "Add News" button to post events, announcements, and more.</p>
            </div>
        </section>

        <div class="container">
            <!-- Categories (static, for demo) -->
            <div class="section-title">
                <h2>Explore by Category</h2>
            </div>
            <div class="categories">
                <a href="#" class="category-card" onclick="alert('Filter by Events (demo)'); return false;">
                    <i class="fas fa-calendar-alt"></i>
                    <h3>Events</h3>
                    <p>Upcoming school events</p>
                </a>
                <a href="#" class="category-card" onclick="alert('Filter by Announcements (demo)'); return false;">
                    <i class="fas fa-bullhorn"></i>
                    <h3>Announcements</h3>
                    <p>Important notices</p>
                </a>
                <a href="#" class="category-card" onclick="alert('Filter by Sports (demo)'); return false;">
                    <i class="fas fa-football-ball"></i>
                    <h3>Sports</h3>
                    <p>Games, tryouts, results</p>
                </a>
                <a href="#" class="category-card" onclick="alert('Filter by Clubs (demo)'); return false;">
                    <i class="fas fa-users"></i>
                    <h3>Clubs</h3>
                    <p>Club activities and meetings</p>
                </a>
            </div>

            <!-- Community News (user-submitted) -->
            <div class="section-title">
                <h2>Community News</h2>
            </div>
            <div id="community-news-grid" class="news-grid">
                <!-- Dynamically added user articles appear here -->
            </div>
        </div>
    </main>

    <!-- Modal for viewing/editing/deleting user articles -->
    <div id="articleModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2 id="modalTitle"></h2>
            <p id="modalMeta"></p>
            <img id="modalImage" src="" alt="" style="width:100%; max-height:300px; object-fit:cover; border-radius:8px; margin:15px 0;">
            <div id="modalContent"></div>
            <div class="modal-actions">
                <button id="editArticleBtn" class="edit-article">Edit</button>
                <button id="deleteArticleBtn" class="delete-article">Delete</button>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Eagle School News</h3>
                    <p>Your source for everything happening at Eagle High.</p>
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
                        <li><a href="#" onclick="alert('About Us page (demo)'); return false;">About Us</a></li>
                        <li><a href="#" onclick="alert('Contact page (demo)'); return false;">Contact</a></li>
                        <li><a href="#" onclick="alert('Privacy policy (demo)'); return false;">Privacy</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="#" onclick="alert('Filter by Events (demo)'); return false;">Events</a></li>
                        <li><a href="#" onclick="alert('Filter by Announcements (demo)'); return false;">Announcements</a></li>
                        <li><a href="#" onclick="alert('Filter by Sports (demo)'); return false;">Sports</a></li>
                        <li><a href="#" onclick="alert('Filter by Clubs (demo)'); return false;">Clubs</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Subscribe</h3>
                    <p>Get daily updates in your inbox.</p>
                    <div class="search-box" style="margin-top:15px;">
                        <input type="text" placeholder="Your email">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 Eagle School News. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
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

        // Force home on any hash
        function showHome() {
            document.getElementById('homepage').style.display = 'block';
            const articleDisplay = document.getElementById('article-display');
            if (articleDisplay) articleDisplay.style.display = 'none';
            document.getElementById('page-indicator').innerText = 'HOME';
        }
        window.addEventListener('hashchange', () => {
            if (window.location.hash !== '#home') {
                window.location.hash = 'home';
            } else {
                showHome();
            }
        });
        window.addEventListener('load', () => {
            if (window.location.hash && window.location.hash !== '#home') {
                window.location.hash = 'home';
            } else {
                showHome();
            }
        });

        // Add/Edit news logic
        const addNewsBtn = document.getElementById('addNewsBtn');
        const formContainer = document.getElementById('newsFormContainer');
        const cancelBtn = document.getElementById('cancelFormBtn');
        const newsForm = document.getElementById('newsForm');
        const formTitle = document.getElementById('formTitle');
        const submitBtn = document.getElementById('submitBtn');

        let editingId = null; // null = adding, otherwise id of article being edited

        addNewsBtn.addEventListener('click', () => {
            editingId = null;
            formTitle.textContent = 'Submit School News';
            submitBtn.textContent = 'Publish';
            newsForm.reset();
            formContainer.classList.add('show');
        });

        cancelBtn.addEventListener('click', () => {
            formContainer.classList.remove('show');
            newsForm.reset();
            editingId = null;
        });

        const STORAGE_KEY = 'eagle_school_news';

        // Load and display community news
        function loadCommunityNews() {
            const articles = JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
            const grid = document.getElementById('community-news-grid');
            if (articles.length === 0) {
                grid.innerHTML = '<p style="grid-column:1/-1; text-align:center; color:var(--gray-color);">No news yet. Click "Add News" to post!</p>';
                return;
            }
            grid.innerHTML = '';
            articles.forEach(article => {
                const card = createArticleCard(article);
                grid.appendChild(card);
            });
        }

        function createArticleCard(article) {
            const card = document.createElement('div');
            card.className = 'news-card';
            card.dataset.id = article.id;
            card.addEventListener('click', () => openArticleModal(article));

            const img = document.createElement('img');
            img.src = article.imageUrl || 'https://via.placeholder.com/300x200?text=Eagle+News';
            img.alt = article.title;
            img.onerror = () => { img.src = 'https://via.placeholder.com/300x200?text=Eagle+News'; };

            const contentDiv = document.createElement('div');
            contentDiv.className = 'news-card-content';

            const title = document.createElement('h3');
            title.textContent = article.title;

            const summary = document.createElement('p');
            summary.textContent = article.summary;

            const meta = document.createElement('div');
            meta.className = 'news-meta';
            const dateStr = article.eventDate ? new Date(article.eventDate).toLocaleDateString() : new Date(article.timestamp).toLocaleDateString();
            meta.innerHTML = `<span>${article.category || 'Community'}</span><span>${dateStr}</span>`;

            contentDiv.appendChild(title);
            contentDiv.appendChild(summary);
            contentDiv.appendChild(meta);

            card.appendChild(img);
            card.appendChild(contentDiv);

            return card;
        }

        // Modal functions
        const modal = document.getElementById('articleModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalMeta = document.getElementById('modalMeta');
        const modalImage = document.getElementById('modalImage');
        const modalContent = document.getElementById('modalContent');
        const editBtn = document.getElementById('editArticleBtn');
        const deleteBtn = document.getElementById('deleteArticleBtn');
        const closeModal = document.querySelector('.close-modal');

        let currentArticle = null;

        function openArticleModal(article) {
            currentArticle = article;
            modalTitle.textContent = article.title;
            const dateStr = article.eventDate ? new Date(article.eventDate).toLocaleDateString() : new Date(article.timestamp).toLocaleDateString();
            modalMeta.textContent = `${article.category || 'Community'} • ${dateStr}`;
            modalImage.src = article.imageUrl || 'https://via.placeholder.com/600x300?text=Eagle+News';
            modalImage.alt = article.title;
            modalContent.innerHTML = `<p>${article.content.replace(/\n/g, '<br>')}</p>`;
            modal.style.display = 'flex';
        }

        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
            currentArticle = null;
        });

        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
                currentArticle = null;
            }
        });

        // Edit button: populate form with article data and switch to edit mode
        editBtn.addEventListener('click', () => {
            if (!currentArticle) return;
            editingId = currentArticle.id;
            formTitle.textContent = 'Edit News';
            submitBtn.textContent = 'Update';
            document.getElementById('title').value = currentArticle.title;
            document.getElementById('summary').value = currentArticle.summary;
            document.getElementById('content').value = currentArticle.content;
            document.getElementById('category').value = currentArticle.category;
            document.getElementById('eventDate').value = currentArticle.eventDate || '';
            document.getElementById('imageUrl').value = currentArticle.imageUrl || '';
            formContainer.classList.add('show');
            modal.style.display = 'none';
        });

        // Delete button
        deleteBtn.addEventListener('click', () => {
            if (!currentArticle) return;
            let articles = JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
            articles = articles.filter(a => a.id !== currentArticle.id);
            localStorage.setItem(STORAGE_KEY, JSON.stringify(articles));
            loadCommunityNews();
            modal.style.display = 'none';
            currentArticle = null;
        });

        // Handle form submission (add or edit)
        newsForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const title = document.getElementById('title').value.trim();
            const summary = document.getElementById('summary').value.trim();
            const content = document.getElementById('content').value.trim();
            const category = document.getElementById('category').value;
            const eventDate = document.getElementById('eventDate').value;
            const imageUrl = document.getElementById('imageUrl').value.trim();

            if (!title || !summary || !content || !category) {
                alert('Please fill in all required fields');
                return;
            }

            const articles = JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];

            if (editingId) {
                // Update existing article
                const index = articles.findIndex(a => a.id === editingId);
                if (index !== -1) {
                    articles[index] = {
                        ...articles[index],
                        title,
                        summary,
                        content,
                        category,
                        eventDate: eventDate || null,
                        imageUrl: imageUrl || null,
                        timestamp: Date.now() // update timestamp to now
                    };
                } else {
                    alert('Article not found. It may have been deleted.');
                }
            } else {
                // Add new article
                const newArticle = {
                    id: Date.now().toString(),
                    title,
                    summary,
                    content,
                    category,
                    eventDate: eventDate || null,
                    imageUrl: imageUrl || null,
                    timestamp: Date.now()
                };
                articles.unshift(newArticle);
            }

            localStorage.setItem(STORAGE_KEY, JSON.stringify(articles));
            loadCommunityNews();
            newsForm.reset();
            formContainer.classList.remove('show');
            editingId = null;
        });

        // Initial load
        loadCommunityNews();

        // Make logo link to home
        document.getElementById('logoLink').addEventListener('click', (e) => {
            e.preventDefault();
            window.location.hash = 'home';
        });

        // Handle category nav clicks (demo alerts)
        document.querySelectorAll('nav ul li a').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                alert('This would filter news by category. In this demo, use the "Add News" form to contribute.');
            });
        });

        // Search and subscribe alerts
        document.querySelector('.search-box i.fa-search').addEventListener('click', () => {
            alert('Search is not implemented in this demo.');
        });
        document.querySelector('.footer-column .search-box i.fa-paper-plane').addEventListener('click', () => {
            alert('Subscribe feature is not implemented in this demo.');
        });
    </script>
    <?php
// index.php - Updated with admin authentication
session_start();

// Include database, news model, and auth
require_once 'config/database.php';
require_once 'models/News.php';
require_once 'config/auth.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();
$news = new News($db);
$auth = new Auth($db);

// Handle CRUD operations (only if logged in)
$message = '';
$messageType = '';

// Check if user is admin for edit/delete operations
$isAdmin = $auth->isLoggedIn();

// Create news (requires admin)
if(isset($_POST['create']) && $isAdmin) {
    $news->title = $_POST['title'];
    $news->summary = $_POST['summary'];
    $news->content = $_POST['content'];
    $news->category = $_POST['category'];
    $news->author = $_POST['author'] ?? 'Anonymous';
    $news->event_date = !empty($_POST['event_date']) ? $_POST['event_date'] : null;
    $news->image_url = !empty($_POST['image_url']) ? $_POST['image_url'] : null;

    if($news->create()) {
        $message = "News created successfully!";
        $messageType = "success";
    } else {
        $message = "Unable to create news.";
        $messageType = "error";
    }
}

// Update news (requires admin)
if(isset($_POST['update']) && $isAdmin) {
    $news->id = $_POST['id'];
    $news->title = $_POST['title'];
    $news->summary = $_POST['summary'];
    $news->content = $_POST['content'];
    $news->category = $_POST['category'];
    $news->author = $_POST['author'];
    $news->event_date = !empty($_POST['event_date']) ? $_POST['event_date'] : null;
    $news->image_url = !empty($_POST['image_url']) ? $_POST['image_url'] : null;

    if($news->update()) {
        $message = "News updated successfully!";
        $messageType = "success";
    } else {
        $message = "Unable to update news.";
        $messageType = "error";
    }
}

// Delete news (requires admin)
if(isset($_GET['delete']) && $isAdmin) {
    $news->id = $_GET['delete'];
    if($news->delete()) {
        $message = "News deleted successfully!";
        $messageType = "success";
    } else {
        $message = "Unable to delete news.";
        $messageType = "error";
    }
}

// Get single news for editing (only if admin)
$editNews = null;
if(isset($_GET['edit']) && $isAdmin) {
    $news->id = $_GET['edit'];
    if($news->readOne()) {
        $editNews = clone $news;
    }
}

// Get all news for display
$stmt = $news->read();
$allNews = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle search
$searchResults = null;
if(isset($_GET['search']) && !empty($_GET['search'])) {
    $searchKeyword = $_GET['search'];
    $searchStmt = $news->search($searchKeyword);
    $allNews = $searchStmt->fetchAll(PDO::FETCH_ASSOC);
}

// Filter by category
if(isset($_GET['category']) && !empty($_GET['category'])) {
    $categoryStmt = $news->getByCategory($_GET['category']);
    $allNews = $categoryStmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eagle School News</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Keep all your existing CSS styles here */
        /* Add these additional styles */
        
        .admin-badge {
            background-color: #f1c40f;
            color: #2c3e50;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-left: 10px;
        }
        
        .admin-controls {
            background-color: #f8f9fa;
            padding: 10px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .admin-controls .welcome {
            font-weight: 600;
            color: #1e4a6f;
        }
        
        .logout-btn {
            background-color: #dc3545;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background 0.3s;
        }
        
        .logout-btn:hover {
            background-color: #c82333;
        }
        
        .login-btn-header {
            background-color: #28a745;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background 0.3s;
        }
        
        .login-btn-header:hover {
            background-color: #218838;
        }
        
        .edit-delete-buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        
        .btn-edit, .btn-delete {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-edit {
            background-color: #1e4a6f;
            color: white;
        }
        
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-edit:hover, .btn-delete:hover {
            opacity: 0.9;
        }
        
        .admin-only {
            border-left: 3px solid #f1c40f;
        }
        
        /* Keep all your existing styles from before */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* ... (include all your existing CSS styles here) ... */
        :root {
            --primary-color: #1e4a6f;
            --secondary-color: #2c3e50;
            --accent-color: #f1c40f;
            --light-color: #f8f9fa;
            --dark-color: #212121;
            --gray-color: #6c757d;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --success-color: #28a745;
            --error-color: #dc3545;
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
        
        nav ul li a:hover,
        nav ul li a.active {
            color: var(--accent-color);
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .search-box {
            background-color: white;
            border-radius: 4px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
        }
        
        .search-box input {
            border: none;
            outline: none;
            width: 180px;
        }
        
        .search-box button {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--gray-color);
        }
        
        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        .page-indicator {
            background-color: var(--accent-color);
            color: var(--dark-color);
            padding: 8px 0;
            text-align: center;
            font-weight: 600;
            letter-spacing: 1px;
        }
        
        .message {
            padding: 15px;
            margin: 20px auto;
            border-radius: 4px;
            text-align: center;
            font-weight: 600;
        }
        
        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .hero {
            padding: 40px 0;
            background-color: var(--light-color);
            text-align: center;
        }
        
        .hero h2 {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        
        .hero p {
            font-size: 1.2rem;
            color: var(--gray-color);
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
            margin-bottom: 10px;
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
            cursor: pointer;
        }
        
        .category-card:hover,
        .category-card.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        .category-card i {
            font-size: 2rem;
            margin-bottom: 15px;
            color: var(--accent-color);
        }
        
        .category-card:hover i,
        .category-card.active i {
            color: white;
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
        
        .add-news-btn {
            background-color: var(--accent-color);
            color: var(--dark-color);
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        
        .add-news-btn:hover {
            background-color: #e0b90f;
        }
        
        .news-form-container {
            background-color: var(--light-color);
            padding: 30px;
            border-radius: 8px;
            margin: 20px 0;
        }
        
        .news-form h3 {
            margin-bottom: 20px;
            color: var(--primary-color);
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }
        
        .form-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }
        
        .form-actions button,
        .form-actions a {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }
        
        .form-actions button[type="submit"] {
            background-color: var(--primary-color);
            color: white;
        }
        
        .form-actions .cancel-btn {
            background-color: #ccc;
            color: var(--dark-color);
        }
        
        @media (max-width: 992px) {
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
            .categories { flex-direction: column; }
            .header-right {
                width: 100%;
                justify-content: space-between;
                margin-top: 15px;
            }
        }
        
        @media (max-width: 576px) {
            .news-grid { grid-template-columns: 1fr; }
            .footer-content { grid-template-columns: 1fr; }
            .search-box { order: 3; margin-top: 15px; width: 100%; margin-right: 0; }
            .search-box input { width: 100%; }
        }
    </style>
</head>
<body>
    <header>
        <div class="container header-content">
            <a href="index.php" class="logo">
                <i class="fas fa-school"></i>
                <h1>Eagle<span> School News</span></h1>
            </a>
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
            <nav>
                <ul id="nav-menu">
                    <li><a href="index.php" <?php echo !isset($_GET['category']) ? 'class="active"' : ''; ?>>Home</a></li>
                    <li><a href="?category=Events" <?php echo (isset($_GET['category']) && $_GET['category'] == 'Events') ? 'class="active"' : ''; ?>>Events</a></li>
                    <li><a href="?category=Announcements" <?php echo (isset($_GET['category']) && $_GET['category'] == 'Announcements') ? 'class="active"' : ''; ?>>Announcements</a></li>
                    <li><a href="?category=Sports" <?php echo (isset($_GET['category']) && $_GET['category'] == 'Sports') ? 'class="active"' : ''; ?>>Sports</a></li>
                    <li><a href="?category=Clubs" <?php echo (isset($_GET['category']) && $_GET['category'] == 'Clubs') ? 'class="active"' : ''; ?>>Clubs</a></li>
                    <li><a href="?category=Student Life" <?php echo (isset($_GET['category']) && $_GET['category'] == 'Student Life') ? 'class="active"' : ''; ?>>Student Life</a></li>
                </ul>
            </nav>
            <div class="header-right">
                <form method="GET" action="index.php" class="search-box">
                    <input type="text" name="search" placeholder="Search news..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
                <?php if($isAdmin): ?>
                    <a href="?add=1" class="add-news-btn"><i class="fas fa-plus"></i> Add News</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Admin Control Bar -->
    <div class="container">
        <div class="admin-controls">
            <?php if($isAdmin): ?>
                <div class="welcome">
                    <i class="fas fa-user-shield"></i> Welcome, Admin! 
                    <span class="admin-badge">Administrator</span>
                </div>
                <a href="admin_logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <?php else: ?>
                <div class="welcome">
                    <i class="fas fa-users"></i> You are viewing as a regular user
                </div>
                <a href="admin_login.php" class="login-btn-header"><i class="fas fa-lock"></i> Admin Login</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="page-indicator">
        <?php 
        if(isset($_GET['category'])) {
            echo strtoupper($_GET['category']);
        } elseif(isset($_GET['search'])) {
            echo 'SEARCH RESULTS: "' . htmlspecialchars($_GET['search']) . '"';
        } elseif(isset($_GET['edit'])) {
            echo 'EDIT NEWS';
        } elseif(isset($_GET['add'])) {
            echo 'ADD NEWS';
        } else {
            echo 'HOME';
        }
        ?>
    </div>

    <?php if($message): ?>
    <div class="container">
        <div class="message <?php echo $messageType; ?>">
            <?php echo $message; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- Add/Edit News Form (Admin Only) -->
    <?php if(($isAdmin) && (isset($_GET['add']) || isset($_GET['edit']))): ?>
    <div class="container">
        <div class="news-form-container">
            <form method="POST" action="index.php" class="news-form">
                <h3><?php echo isset($_GET['edit']) ? 'Edit News' : 'Submit School News'; ?></h3>
                
                <?php if(isset($_GET['edit']) && $editNews): ?>
                    <input type="hidden" name="id" value="<?php echo $editNews->id; ?>">
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="title">Headline *</label>
                    <input type="text" id="title" name="title" required 
                           value="<?php echo isset($editNews) ? htmlspecialchars($editNews->title) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="summary">Short Summary *</label>
                    <textarea id="summary" name="summary" required><?php echo isset($editNews) ? htmlspecialchars($editNews->summary) : ''; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="content">Full Story *</label>
                    <textarea id="content" name="content" rows="5" required><?php echo isset($editNews) ? htmlspecialchars($editNews->content) : ''; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="author">Author *</label>
                    <input type="text" id="author" name="author" required 
                           value="<?php echo isset($editNews) ? htmlspecialchars($editNews->author) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="category">Category *</label>
                    <select id="category" name="category" required>
                        <option value="">Select a category</option>
                        <option value="Events" <?php echo (isset($editNews) && $editNews->category == 'Events') ? 'selected' : ''; ?>>Events</option>
                        <option value="Announcements" <?php echo (isset($editNews) && $editNews->category == 'Announcements') ? 'selected' : ''; ?>>Announcements</option>
                        <option value="Sports" <?php echo (isset($editNews) && $editNews->category == 'Sports') ? 'selected' : ''; ?>>Sports</option>
                        <option value="Clubs" <?php echo (isset($editNews) && $editNews->category == 'Clubs') ? 'selected' : ''; ?>>Clubs</option>
                       
</body>
</html>
