<nav class="pagination" role="navigation" aria-label="pagination">
    <?php if ($aktif > 1) : ?>
        <a class="pagination-previous" href="index.php?halaman=databobot&page=<?= $aktif - 1; ?>">Previous</a>
    <?php endif; ?>

    <?php if ($aktif < $total) : ?>
        <a class="pagination-next" href="index.php?halaman=databobot&page=<?= $aktif + 1; ?>">Next Page</a>
    <?php endif; ?>

</nav>