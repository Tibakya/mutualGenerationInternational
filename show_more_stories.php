<?php
include "admin/conn.php";

$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch paginated posts
$stories = mysqli_query($con, "
    SELECT s.id, s.post_content, s.video_url, s.post_type, s.created_at, 
           m.name as author_name, m.profile_picture, m.region 
    FROM shared_experiences s 
    JOIN members m ON s.member_id = m.id 
    ORDER BY s.created_at DESC 
    LIMIT $offset, $limit
");

// Count total posts
$totalStories = mysqli_query($con, "SELECT COUNT(*) AS total FROM shared_experiences");
$total = mysqli_fetch_assoc($totalStories)['total'];
$totalPages = ceil($total / $limit);
?>

<head>
    <meta charset="utf-8">
    <title>Shared Experiences</title>
    <meta name="description"
        content="MGI is a nonprofit, non-governmental organization, autonomous, non-religious, non-partisan, non-political organization and social organization.">

    <!-- Stylesheets -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
             background-color:rgb(186, 193, 199);
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
        .author-profile {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }
        .author-info {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<div class="container">
<h2 class="text-center mb-4 mt-4">All Stories</h2>

    <div class="row">
    <div class="col-12 d-flex justify-content-end">
            <a href="shared_experiences.php" class="btn btn-primary mb-3">Back to post</a>
        </div>
        <?php while ($story = mysqli_fetch_assoc($stories)): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($story['author_name']); ?></h5>
                        <?php if ($story['post_type'] === 'text'): ?>
                            <p class="card-text"><?= htmlspecialchars($story['post_content']); ?></p>
                        <?php elseif ($story['post_type'] === 'video'): ?>
                            <video controls class="w-100">
                                <source src="<?= $story['video_url']; ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php endif; ?>
                        <p class="text-muted"><?= htmlspecialchars($story['created_at']); ?></p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="col-12 d-flex justify-content-end">
            <a href="shared_experiences.php" class="btn btn-primary">Back to post story</a>
        </div>
    <nav>
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i === $page ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
    <!-- Footer -->
        <footer>
            <div class="container">
                <p class="text-center">
                    Designed and Developed by <a href="tel:+255743331626">Native Technology</a>
                </p>
            </div>
        </footer>
</div>
