        <?php if(!@$noTemplate): ?>
            </section><!-- content-->




            <?php if (isset($_SESSION['admin']) ) : ?>

                <footer class="site-footer">

                </footer> 
                <script src="<?= ROOT ?>/assets/js/jquery3-5-0.js" ></script>
                <script src="<?= ROOT ?>/assets/bootstrap-4.4.1/dist/js/bootstrap.js" ></script>
                <script src="<?= ROOT ?>/assets/js/admin.js?ver=<?= time() ?>"></script>

            <?php endif; ?>

    </div><!-- container-->
        <?php endif; ?>
</body>
</html>