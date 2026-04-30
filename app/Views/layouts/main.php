<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> — CineMax</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <?= $this->renderSection('styles') ?>
  
</head>

<body>

    <!-- Sidebar -->
    <?= $this->include('partials/sidebar') ?>

    <!-- Overlay mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <?= $this->include('partials/header') ?>
        <div style="padding:28px 32px;position:relative;z-index:1;">
        <main>
            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <!-- Toast -->
    <?= $this->include('partials/toast') ?>

    <!-- JS  -->
    <script src="<?= base_url('assets/js/dashboard.js') ?>"></script>

    <!-- JS per-halaman  -->
    <?= $this->renderSection('scripts') ?>

</body>

</html>