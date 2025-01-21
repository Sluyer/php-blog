<div class="featured container p-3 text-center">
    <h1>à la une</h1>
</div>
<div class="container featured p-2 d-flex gap-3 justify-content-center">
    <?php
    if (isset($featuredArticles) && is_array($featuredArticles)) {
        array_map(function ($article) {
            echo '
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">' . htmlspecialchars($article['title']) . '</h5>
                    <p class="card-text">' . htmlspecialchars($article['content']) . '</p>
                </div>
            </div>';
        }, $featuredArticles);
    } else {
        echo '<p>Aucun articles.</p>';
    }
    ?>
</div>