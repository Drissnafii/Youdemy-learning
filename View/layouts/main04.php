<!DOCTYPE html>
<html lang="en">
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
            --danger: #dc3545;
            --success: #28a745;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: var(--primary-bg);
            padding: 20px;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .title {
            font-size: 24px;
            color: var(--text-primary);
        }

        .search-bar {
            display: flex;
            align-items: center;
        }

        .search-input {
            padding: 8px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            width: 200px;
        }

        .mobile-menu, .search-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        .add-course-btn {
            background-color: var(--accent-purple);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .add-course-btn:hover {
            opacity: 0.9;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background-color: var(--card-bg);
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
            color: var(--text-primary);
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .course-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .course-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
        }

        .course-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 16px;
        }

        .course-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .course-description {
            color: var(--text-secondary);
            font-size: 14px;
            margin-bottom: 16px;
            line-height: 1.5;
        }

        .course-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .course-status {
            padding: 4px 12px;
            border-radius: 16px;
            font-size: 12px;
            background-color: #e9ecef;
        }

        .status-active {
            background-color: var(--success);
            color: white;
        }

        .status-inactive {
            background-color: var(--danger);
            color: white;
        }

        .course-actions {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            padding: 8px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.2s;
        }

        .action-btn:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }

        .edit-btn {
            background-color: var(--accent-yellow);
            color: var(--text-primary);
        }

        .delete-btn {
            background-color: var(--danger);
            color: white;
        }

        .course-stats {
            display: flex;
            gap: 16px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid var(--border-color);
        }

        .stat {
            flex: 1;
            text-align: center;
        }

        .stat-label {
            font-size: 12px;
            color: var(--text-secondary);
            margin-bottom: 4px;
        }

        .course-form {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: var(--card-bg);
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
            z-index: 1000;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-primary);
        }

        .form-input {
            width: 100%;
            padding: 8px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        @media (max-width: 768px) {
            .header, .header-left {
                flex-direction: column;
                align-items: stretch;
            }

            .add-course-btn {
                width: 100%;
            }

            .search-bar {
                display: none;
            }

            .mobile-menu, .search-toggle {
                display: block;
            }

            .courses-grid {
                grid-template-columns: 1fr;
            }

            .course-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .stat-card {
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .course-stats {
                flex-direction: column;
                align-items: stretch;
            }

            .stat {
                padding: 8px 0;
                border-bottom: 1px solid var(--border-color);
            }

            .stat:last-child {
                border-bottom: none;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="header">
            <div class="header-left">
                <h1 class="title">Course Management</h1>
                <div class="search-bar">
                    <input type="text" class="search-input" placeholder="Search courses..." oninput="searchCourses(this.value)" />
                </div>
            </div>
            <button class="add-course-btn" onclick="openCourseForm()">+ Add New Course</button>
            <button class="mobile-menu" onclick="toggleMobileMenu()">☰</button>
            <button class="search-toggle" onclick="toggleSearchBar()">🔍</button>
        </div>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-title">Total Courses</div>
                <div class="stat-value">12</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Active Students</div>
                <div class="stat-value">248</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Average Rating</div>
                <div class="stat-value">4.8</div>
            </div>
        </div>
        <div class="courses-grid" id="coursesGrid">
            <!-- Course Card Template -->
            <div class="course-card">
                <div class="course-header">
                    <div>
                        <h3 class="course-title">Course 1</h3>
                        <p class="course-description">This is a short description of course 1...</p>
                    </div>
                </div>
                <div class="course-meta">
                    <span class="course-status status-active">Active</span>
                    <div class="course-actions">
                        <button class="action-btn edit-btn" aria-label="Edit course">✏️</button>
                        <button class="action-btn delete-btn" onclick="deleteCourse(this)" aria-label="Delete course">🗑️</button>
                    </div>
                </div>
                <div class="course-stats">
                    <div class="stat">
                        <div class="stat-label">Students</div>
                        <div class="stat-value">10</div>
                    </div>
                    <div class="stat">
                        <div class="stat-label">Lessons</div>
                        <div class="stat-value">5</div>
                    </div>
                    <div class="stat">
                        <div class="stat-label">Rating</div>
                        <div class="stat-value">4.5</div>
                    </div>
                </div>
            </div>
            <!-- More courses would go here -->
        </div>
    </div>

    <div class="overlay" id="overlay"></div>
    <div class="course-form" id="courseForm">
        <h2 style="margin-bottom: 20px;">Add New Course</h2>
        <div class="form-group">
            <label class="form-label">Course Title</label>
            <input type="text" class="form-input" id="courseTitle" placeholder="Enter course title">
        </div>
        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea class="form-input" id="courseDescription" rows="4" placeholder="Enter course description"></textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Category</label>
            <select class="form-input" id="courseCategory">
                <option>Web Development</option>
                <option>Programming</option>
                <option>Design</option>
                <option>Business</option>
            </select>
        </div>
        <div class="form-actions">
            <button class="action-btn" style="background-color: #e9ecef;" onclick="closeCourseForm()">Cancel</button>
            <button class="action-btn" style="background-color: var(--accent-purple); color: white;" onclick="addCourse()">Save Course</button>
        </div>
    </div>

    <script>
        function openCourseForm() {
            document.getElementById('courseForm').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function closeCourseForm() {
            document.getElementById('courseForm').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        function addCourse() {
            const title = document.getElementById('courseTitle').value;
            const description = document.getElementById('courseDescription').value;
            const category = document.getElementById('courseCategory').value;

            if (title && description && category) {
                const courseCard = `
                    <div class="course-card">
                        <div class="course-header">
                            <div>
                                <h3 class="course-title">${title}</h3>
                                <p class="course-description">${description}</p>
                            </div>
                        </div>
                        <div class="course-meta">
                            <span class="course-status status-active">Active</span>
                            <div class="course-actions">
                                <button class="action-btn edit-btn" aria-label="Edit course">✏️</button>
                                <button class="action-btn delete-btn" onclick="deleteCourse(this)" aria-label="Delete course">🗑️</button>
                            </div>
                        </div>
                        <div class="course-stats">
                            <div class="stat">
                                <div class="stat-label">Students</div>
                                <div class="stat-value">0</div>
                            </div>
                            <div class="stat">
                                <div class="stat-label">Lessons</div>
                                <div class="stat-value">0</div>
                            </div>
                            <div class="stat">
                                <div class="stat-label">Rating</div>
                                <div class="stat-value">0.0</div>
                            </div>
                        </div>
                    </div>
                `;
                document.getElementById('coursesGrid').insertAdjacentHTML('beforeend', courseCard);
                closeCourseForm();
            } else {
                alert('Please fill in all fields.');
            }
        }

        function deleteCourse(button) {
            if (confirm('Are you sure you want to delete this course?')) {
                const courseCard = button.closest('.course-card');
                courseCard.remove();
            }
        }

        function toggleSearchBar() {
            const searchBar = document.querySelector('.search-bar');
            searchBar.style.display = searchBar.style.display === 'flex' ? 'none' : 'flex';
        }

        function searchCourses(query) {
            const courseCards = document.querySelectorAll('.course-card');
            const searchTerm = query.toLowerCase();

            courseCards.forEach(card => {
                const title = card.querySelector('.course-title').innerText.toLowerCase();
                const description = card.querySelector('.course-description').innerText.toLowerCase();
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        function toggleMobileMenu() {
            var menu = document.getElementById('mobileMenu');
            if (!menu) {
                menu = document.createElement('div');
                menu.id = 'mobileMenu';
                menu.style.position = 'fixed';
                menu.style.top = '0';
                menu.style.right = '0';
                menu.style.backgroundColor = 'white';
                menu.style.boxShadow = '0 4px 6px rgba(0,0,0,0.1)';
                menu.style.zIndex = '1000';
                menu.style.width = '200px';
                menu.style.padding = '10px';
                menu.innerHTML = `
                    <button onclick="closeMobileMenu()">✖</button>
                    <button onclick="openCourseForm()">Add Course</button>
                `;
                document.body.appendChild(menu);
            }
            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        }

        function closeMobileMenu() {
            document.getElementById('mobileMenu').style.display = 'none';
        }

        function sortCoursesBy(sortType) {
            let courses = Array.from(document.querySelectorAll('.course-card'));
            courses.sort((a, b) => {
                if (sortType === 'title') return a.querySelector('.course-title').innerText.localeCompare(b.querySelector('.course-title').innerText);
                if (sortType === 'rating') return parseFloat(b.querySelector('.stat-value:last-child').innerText) - parseFloat(a.querySelector('.stat-value:last-child').innerText);
                // Add more sort types here if needed
            });
            let coursesGrid = document.getElementById('coursesGrid');
            coursesGrid.innerHTML = '';
            courses.forEach(course => coursesGrid.appendChild(course));
        }
    </script>
</body>
</html>