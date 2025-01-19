<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
<style>
:root {
    --primary-bg: #fdf7f4;
    --card-bg: #ffffff;
    --text-primary: #1a1a1a;
    --text-secondary: #666666;
    --accent-yellow: #ffd700;
    --accent-purple: #6b46c1;
    --border-color: #e5e7eb;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

body {
    background-color: var(--primary-bg);
    min-height: 100vh;
}

.layout {
    display: grid;
    grid-template-columns: 250px 1fr;
    min-height: 100vh;
}

.sidebar {
    background-color: white;
    padding: 20px;
    border-right: 1px solid var(--border-color);
}

.logo {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 40px;
    padding-left: 12px;
}

.nav-item {
    display: flex;
    align-items: center;
    padding: 12px;
    margin-bottom: 8px;
    border-radius: 8px;
    color: var(--text-secondary);
    text-decoration: none;
    transition: all 0.3s;
}

.nav-item:hover, .nav-item.active {
    background-color: var(--primary-bg);
    color: var(--text-primary);
}

.nav-item span {
    margin-left: 12px;
}

.main-content {
    padding: 24px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}

.search-bar {
    display: flex;
    align-items: center;
    background: white;
    border-radius: 8px;
    padding: 8px 16px;
    width: 300px;
}

.search-bar input {
    border: none;
    outline: none;
    width: 100%;
    margin-left: 8px;
}

.add-button {
    background: var(--accent-purple);
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    cursor: pointer;
    transition: opacity 0.2s;
}

.add-button:hover {
    opacity: 0.9;
}

.stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 24px;
}

.stat-card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.stat-title {
    color: var(--text-secondary);
    font-size: 14px;
    margin-bottom: 8px;
}

.stat-value {
    font-size: 24px;
    font-weight: bold;
}

.courses {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.course-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.course-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 8px;
}

.course-info {
    color: var(--text-secondary);
    font-size: 14px;
    margin-bottom: 16px;
}

.course-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
    padding-top: 16px;
    border-top: 1px solid var(--border-color);
}

.course-stat {
    text-align: center;
}

.stat-label {
    font-size: 12px;
    color: var(--text-secondary);
    margin-bottom: 4px;
}

.actions {
    display: flex;
    gap: 8px;
    margin-top: 16px;
}

.action-btn {
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    transition: opacity 0.2s;
}

.edit-btn {
    background: var(--accent-yellow);
}

.delete-btn {
    background: #fee2e2;
    color: #dc2626;
}

@media (max-width: 1024px) {
    .layout {
        grid-template-columns: 200px 1fr;
    }
}

@media (max-width: 768px) {
    .layout {
        grid-template-columns: 1fr;
    }

    .sidebar {
        display: none;
    }

    .header {
        flex-direction: column;
        gap: 16px;
    }

    .search-bar {
        width: 100%;
    }

    .add-button {
        width: 100%;
    }

    .stats {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .course-stats {
        grid-template-columns: 1fr;
    }

    .actions {
        flex-direction: column;
    }

    .action-btn {
        width: 100%;
    }
}
</style>
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="logo">Youdemy</div>
            <nav>
                <a href="#" class="nav-item active">
                    📊 <span>Dashboard</span>
                </a>
                <a href="#" class="nav-item">
                    📚 <span>Courses</span>
                </a>
                <a href="#" class="nav-item">
                    👥 <span>Students</span>
                </a>
                <a href="#" class="nav-item">
                    📝 <span>Assignments</span>
                </a>
                <a href="#" class="nav-item">
                    💬 <span>Messages</span>
                </a>
                <a href="#" class="nav-item">
                    ⚙️ <span>Settings</span>
                </a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="header">
                <div class="search-bar">
                    🔍 <input type="text" placeholder="Search courses...">
                </div>
                <button class="add-button">+ Add New Course</button>
            </header>

            <section class="stats">
                <div class="stat-card">
                    <div class="stat-title">Total Courses</div>
                    <div class="stat-value">12</div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Active Students</div>
                    <div class="stat-value">284</div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Total Revenue</div>
                    <div class="stat-value">$4,892</div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Average Rating</div>
                    <div class="stat-value">4.8</div>
                </div>
            </section>

            <section class="courses">
                <div class="course-card">
                    <h3 class="course-title">Web Development Bootcamp</h3>
                    <p class="course-info">Complete guide to modern web development with hands-on projects.</p>
                    <div class="course-stats">
                        <div class="course-stat">
                            <div class="stat-label">Students</div>
                            <div class="stat-value">86</div>
                        </div>
                        <div class="course-stat">
                            <div class="stat-label">Lessons</div>
                            <div class="stat-value">24</div>
                        </div>
                        <div class="course-stat">
                            <div class="stat-label">Rating</div>
                            <div class="stat-value">4.9</div>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="action-btn edit-btn">Edit Course</button>
                        <button class="action-btn delete-btn">Delete</button>
                    </div>
                </div>

                <div class="course-card">
                    <h3 class="course-title">Python Programming</h3>
                    <p class="course-info">Learn Python from scratch with practical examples and projects.</p>
                    <div class="course-stats">
                        <div class="course-stat">
                            <div class="stat-label">Students</div>
                            <div class="stat-value">124</div>
                        </div>
                        <div class="course-stat">
                            <div class="stat-label">Lessons</div>
                            <div class="stat-value">32</div>
                        </div>
                        <div class="course-stat">
                            <div class="stat-label">Rating</div>
                            <div class="stat-value">4.7</div>
                        </div>
                    </div>
                    <div class="actions">
                        <button class="action-btn edit-btn">Edit Course</button>
                        <button class="action-btn delete-btn">Delete</button>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>