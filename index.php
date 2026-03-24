<?php
// index.php - Complete working version with admin authentication
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

// Check if user is admin
$isAdmin = $auth->isLoggedIn();

// Handle CRUD operations (ONLY if logged in as admin)
$message = '';
$messageType = '';

// Create news (admin only)
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
        // Redirect to clear the form
        header("Location: index.php?msg=created");
        exit();
    } else {
        $message = "Unable to create news.";
        $messageType = "error";
    }
}

// Update news (admin only)
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
        header("Location: index.php?msg=updated");
        exit();
    } else {
        $message = "Unable to update news.";
        $messageType = "error";
    }
}

// Delete news (admin only)
if(isset($_GET['delete']) && $isAdmin) {
    $news->id = $_GET['delete'];
    if($news->delete()) {
        $message = "News deleted successfully!";
        $messageType = "success";
        header("Location: index.php?msg=deleted");
        exit();
    } else {
        $message = "Unable to delete news.";
        $messageType = "error";
    }
}

// Get single news for editing (admin only)
$editNews = null;
if(isset($_GET['edit']) && $isAdmin) {
    $news->id = $_GET['edit'];
    if($news->readOne()) {
        $editNews = clone $news;
    }
}

// Get news based on filters (works for all users)
$allNews = [];
$currentCategory = isset($_GET['category']) ? $_GET['category'] : null;
$searchKeyword = isset($_GET['search']) ? $_GET['search'] : null;

if($searchKeyword && !empty($searchKeyword)) {
    // Search functionality
    $searchStmt = $news->search($searchKeyword);
    $allNews = $searchStmt->fetchAll(PDO::FETCH_ASSOC);
} elseif($currentCategory && !empty($currentCategory)) {
    // Category filter
    $categoryStmt = $news->getByCategory($currentCategory);
    $allNews = $categoryStmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Show all news
    $stmt = $news->read();
    $allNews = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Check for message from redirects
if(isset($_GET['msg'])) {
    switch($_GET['msg']) {
        case 'created':
            $message = "News created successfully!";
            $messageType = "success";
            break;
        case 'updated':
            $message = "News updated successfully!";
            $messageType = "success";
            break;
        case 'deleted':
            $message = "News deleted successfully!";
            $messageType = "success";
            break;
    }
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
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-delete {
            background-color: var(--error-color);
            color: white;
        }
        
        .btn-edit:hover, .btn-delete:hover {
            opacity: 0.9;
        }
        
        .admin-badge {
            background-color: var(--accent-color);
            color: var(--dark-color);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-left: 10px;
        }
        
        .admin-controls {
            background-color: var(--light-color);
            padding: 10px 20px;
            border-radius: 8px;
            margin: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .admin-controls .welcome {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .logout-btn {
            background-color: var(--error-color);
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
            background-color: var(--success-color);
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
                    <li><a href="index.php" <?php echo !isset($_GET['category']) && !isset($_GET['search']) ? 'class="active"' : ''; ?>>Home</a></li>
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
            echo strtoupper($_GET['category']) . " NEWS";
        } elseif(isset($_GET['search'])) {
            echo 'SEARCH RESULTS: "' . htmlspecialchars($_GET['search']) . '"';
        } elseif(isset($_GET['edit']) && $isAdmin) {
            echo 'EDIT NEWS';
        } elseif(isset($_GET['add']) && $isAdmin) {
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
    <?php if($isAdmin && (isset($_GET['add']) || isset($_GET['edit']))): ?>
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
                        <option value="Student Life" <?php echo (isset($editNews) && $editNews->category == 'Student Life') ? 'selected' : ''; ?>>Student Life</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="event_date">Event Date (if applicable)</label>
                    <input type="date" id="event_date" name="event_date" 
                           value="<?php echo isset($editNews) && $editNews->event_date ? date('Y-m-d', strtotime($editNews->event_date)) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="image_url">Image URL (optional)</label>
                    <input type="url" id="image_url" name="image_url" placeholder="https://..." 
                           value="<?php echo isset($editNews) ? htmlspecialchars($editNews->image_url) : ''; ?>">
                </div>
                
                <div class="form-actions">
                    <a href="index.php" class="cancel-btn">Cancel</a>
                    <button type="submit" name="<?php echo isset($_GET['edit']) ? 'update' : 'create'; ?>">
                        <?php echo isset($_GET['edit']) ? 'Update' : 'Publish'; ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>

    <main>
        <section class="hero">
            <div class="container">
                <h2>Welcome to Eagle School News</h2>
                <p>Stay updated with the latest happenings at our school</p>
            </div>
        </section>

        <div class="container">
            <!-- Categories -->
            <div class="section-title">
                <h2>Explore by Category</h2>
                <?php if(isset($_GET['category']) || isset($_GET['search'])): ?>
                    <a href="index.php" class="add-news-btn">Clear Filter</a>
                <?php endif; ?>
            </div>
            
            <div class="categories">
                <a href="?category=Events" class="category-card <?php echo (isset($_GET['category']) && $_GET['category'] == 'Events') ? 'active' : ''; ?>">
                    <i class="fas fa-calendar-alt"></i>
                    <h3>Events</h3>
                    <p>Upcoming school events</p>
                </a>
                <a href="?category=Announcements" class="category-card <?php echo (isset($_GET['category']) && $_GET['category'] == 'Announcements') ? 'active' : ''; ?>">
                    <i class="fas fa-bullhorn"></i>
                    <h3>Announcements</h3>
                    <p>Important notices</p>
                </a>
                <a href="?category=Sports" class="category-card <?php echo (isset($_GET['category']) && $_GET['category'] == 'Sports') ? 'active' : ''; ?>">
                    <i class="fas fa-football-ball"></i>
                    <h3>Sports</h3>
                    <p>Games, tryouts, results</p>
                </a>
                <a href="?category=Clubs" class="category-card <?php echo (isset($_GET['category']) && $_GET['category'] == 'Clubs') ? 'active' : ''; ?>">
                    <i class="fas fa-users"></i>
                    <h3>Clubs</h3>
                    <p>Club activities and meetings</p>
                </a>
            </div>

            <!-- News Grid -->
            <div class="section-title">
                <h2>
                    <?php 
                    if(isset($_GET['search'])) {
                        echo 'Search Results';
                    } elseif(isset($_GET['category'])) {
                        echo $_GET['category'] . ' News';
                    } else {
                        echo 'Latest News';
                    }
                    ?>
                </h2>
            </div>
            
            <?php if(empty($allNews)): ?>
                <p style="text-align: center; color: var(--gray-color); margin: 40px 0;">
                    No news found. <?php echo $isAdmin ? 'Click "Add News" to post the first article!' : 'Please check back later for updates.'; ?>
                </p>
            <?php else: ?>
                <div class="news-grid">
                    <?php foreach($allNews as $newsItem): ?>
                    <div class="news-card">
                        <img src="<?php echo !empty($newsItem['image_url']) ? htmlspecialchars($newsItem['image_url']) : 'https://via.placeholder.com/300x200?text=Eagle+News'; ?>" 
                             alt="<?php echo htmlspecialchars($newsItem['title']); ?>"
                             onerror="this.src='https://via.placeholder.com/300x200?text=Eagle+News'">
                        <div class="news-card-content">
                            <h3><?php echo htmlspecialchars($newsItem['title']); ?></h3>
                            <p><?php echo htmlspecialchars(substr($newsItem['summary'] ?? $newsItem['content'], 0, 100)) . '...'; ?></p>
                            <div class="news-meta">
                                <span><?php echo htmlspecialchars($newsItem['category'] ?? 'General'); ?></span>
                                <span>
                                    <?php 
                                    if(!empty($newsItem['event_date'])) {
                                        echo date('M d, Y', strtotime($newsItem['event_date']));
                                    } else {
                                        echo date('M d, Y', strtotime($newsItem['created_at']));
                                    }
                                    ?>
                                </span>
                            </div>
                            <?php if($isAdmin): ?>
                            <div class="edit-delete-buttons">
                                <a href="?edit=<?php echo $newsItem['id']; ?>" class="btn-edit">Edit</a>
                                <a href="?delete=<?php echo $newsItem['id']; ?>" 
                                   class="btn-delete" 
                                   onclick="return confirm('Are you sure you want to delete this news?')">Delete</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

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
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="?category=Events">Events</a></li>
                        <li><a href="?category=Announcements">Announcements</a></li>
                        <li><a href="?category=Sports">Sports</a></li>
                        <li><a href="?category=Clubs">Clubs</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Subscribe</h3>
                    <p>Get daily updates in your inbox.</p>
                    <form method="GET" action="index.php" class="search-box" style="margin-top:15px;">
                        <input type="email" name="subscribe" placeholder="Your email">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> Eagle School News. All rights reserved.</p>
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

        // Auto-hide messages after 5 seconds
        const messageElement = document.querySelector('.message');
        if(messageElement) {
            setTimeout(() => {
                messageElement.style.display = 'none';
            }, 5000);
        }
    </script>
</body>
</html>
