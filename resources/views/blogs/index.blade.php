<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogYaari - Discover Amazing Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --text-dark: #2d3748;
            --text-light: #718096;
            --bg-light: #f7fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--bg-light);
        }

        /* Header Styles */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white !important;
        }

        .navbar-brand i {
            margin-right: 10px;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 50px;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
            animation: fadeInUp 0.8s ease;
        }

        .hero-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            animation: fadeInUp 0.8s ease 0.2s both;
        }

        /* Search and Filter Section */
        .filter-section {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 40px;
            position: sticky;
            top: 20px;
            z-index: 10;
        }

        .search-box {
            position: relative;
            margin-bottom: 20px;
        }

        .search-box input {
            padding-left: 45px;
            border-radius: 50px;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .search-box i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }

        .filter-btn {
            border-radius: 50px;
            padding: 10px 20px;
            margin: 5px;
            border: 2px solid #e2e8f0;
            background: white;
            color: var(--text-dark);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .filter-btn:hover {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .filter-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        /* Blog Card Styles */
        .blog-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .blog-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .blog-card:hover img {
            transform: scale(1.05);
        }

        .blog-card-body {
            padding: 25px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .blog-category {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .blog-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 15px;
            text-decoration: none;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .blog-title:hover {
            color: var(--primary-color);
        }

        .blog-description {
            color: var(--text-light);
            margin-bottom: 20px;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Loading Spinner */
        .loading-spinner {
            display: none;
            text-align: center;
            padding: 50px;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        /* No Results */
        .no-results {
            text-align: center;
            padding: 60px 20px;
            display: none;
        }

        .no-results i {
            font-size: 4rem;
            color: var(--text-light);
            margin-bottom: 20px;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 50px 0 30px;
            margin-top: 80px;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2rem;
            }
            
            .hero-section p {
                font-size: 1rem;
            }
            
            .filter-section {
                margin-bottom: 30px;
                position: relative;
                top: 0;
            }
            
            .blog-card img {
                height: 200px;
            }
            
            .blog-card-body {
                padding: 20px;
            }
            
            .blog-title {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                padding: 60px 0;
            }
            
            .filter-btn {
                font-size: 0.9rem;
                padding: 8px 15px;
                margin: 3px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('blogs.index') }}">
                <i class="fas fa-blog"></i>BlogYaari
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Welcome to BlogYaari</h1>
            <p>Discover amazing stories, insights, and ideas from our community of writers</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Filter Section -->
            <div class="col-lg-3 col-md-4">
                <div class="filter-section">
                    <h5 class="mb-4"><i class="fas fa-filter me-2"></i>Filter Blogs</h5>
                    
                    <!-- Search Box -->
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" class="form-control" placeholder="Search blogs...">
                    </div>

                    <!-- Category Filter -->
                    <h6 class="mb-3">Categories</h6>
                    <div class="category-filters mb-4">
                        <button class="filter-btn active" data-category="">
                            <i class="fas fa-th me-1"></i>All Categories
                        </button>
                        @foreach($categories as $category)
                            <button class="filter-btn" data-category="{{ $category }}">
                                {{ $category }}
                            </button>
                        @endforeach
                    </div>

                    <!-- Date Filter -->
                    <h6 class="mb-3">Filter by Date</h6>
                    <input type="date" id="dateFilter" class="form-control mb-3">
                    <button id="clearFilters" class="btn btn-outline-secondary btn-sm w-100">
                        <i class="fas fa-times me-1"></i>Clear Filters
                    </button>

                    <!-- Results Count -->
                    <div class="mt-3">
                        <small class="text-muted">
                            <span id="resultsCount">{{ $blogs->count() }}</span> blogs found
                        </small>
                    </div>
                </div>
            </div>

            <!-- Blog List -->
            <div class="col-lg-9 col-md-8">
                <!-- Loading Spinner -->
                <div class="loading-spinner" id="loadingSpinner">
                    <div class="spinner"></div>
                    <p class="mt-3">Loading amazing blogs...</p>
                </div>

                <!-- No Results -->
                <div class="no-results" id="noResults">
                    <i class="fas fa-search"></i>
                    <h4>No blogs found</h4>
                    <p>Try adjusting your filters or search terms</p>
                </div>

                <!-- Blog Grid -->
                <div class="row" id="blogContainer">
                    @include('blogs.partials.blog-list', ['blogs' => $blogs])
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>BlogYaari</h4>
                    <p>Your platform for amazing stories and insights</p>
                    <div class="mt-3">
                        <a href="{{ route('admin.login') }}" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-cog me-1"></i>Admin Panel
                        </a>
                    </div>
                    <hr class="my-4" style="border-color: rgba(255,255,255,0.3);">
                    <p class="mb-0">&copy; {{ date('Y') }} BlogYaari. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            let currentCategory = '';
            let currentDate = '';
            let searchQuery = '';
            let searchTimeout;

            // Category Filter
            $('.filter-btn').click(function() {
                $('.filter-btn').removeClass('active');
                $(this).addClass('active');
                currentCategory = $(this).data('category');
                performFilter();
            });

            // Date Filter
            $('#dateFilter').change(function() {
                currentDate = $(this).val();
                performFilter();
            });

            // Search with Debounce
            $('#searchInput').on('input', function() {
                clearTimeout(searchTimeout);
                searchQuery = $(this).val();
                
                searchTimeout = setTimeout(function() {
                    performSearch();
                }, 500);
            });

            // Clear Filters
            $('#clearFilters').click(function() {
                $('.filter-btn').removeClass('active');
                $('.filter-btn[data-category=""]').addClass('active');
                currentCategory = '';
                currentDate = '';
                searchQuery = '';
                $('#searchInput').val('');
                $('#dateFilter').val('');
                performFilter();
            });

            // Perform Filter Function
            function performFilter() {
                if (searchQuery) {
                    performSearch();
                } else {
                    showLoading();
                    
                    $.get('{{ route('blogs.filter') }}', {
                        category: currentCategory,
                        date: currentDate
                    }, function(response) {
                        updateBlogList(response.html, response.count);
                    });
                }
            }

            // Perform Search Function
            function performSearch() {
                showLoading();
                
                $.get('{{ route('blogs.search') }}', {
                    q: searchQuery,
                    category: currentCategory,
                    date: currentDate
                }, function(response) {
                    updateBlogList(response.html, response.count);
                });
            }

            // Update Blog List
            function updateBlogList(html, count) {
                $('#blogContainer').html(html);
                $('#resultsCount').text(count);
                hideLoading();
                
                if (count === 0) {
                    $('#noResults').show();
                } else {
                    $('#noResults').hide();
                }
            }

            // Show Loading
            function showLoading() {
                $('#loadingSpinner').show();
                $('#blogContainer').hide();
                $('#noResults').hide();
            }

            // Hide Loading
            function hideLoading() {
                $('#loadingSpinner').hide();
                $('#blogContainer').show();
            }
        });
    </script>
</body>
</html>
