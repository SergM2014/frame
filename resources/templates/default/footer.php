            </section><!-- content-->
            <?php if(!@$noTemplate): ?>

                <footer class="footer border border-secondary rounded row">

                    <div class="col align-self-center text-center text-info">This is footer</div>

                        <a href="<?= \App\Lib\HelperService::currentLang() ?>/admin" class="badge badge-primary footer-admin-link">ADMIN</a>

                </footer>

            <?php endif; ?>

            <?php include PATH_SITE."/resources/views/common/partials/clientTimeZone.php"; ?>

    </div><!-- container-->
            <script src="<?= ROOT ?>/assets/js/script.js?ver=<?= time() ?>" ></script>
            <script src="<?= ROOT ?>/assets/js/jquery3-5-0.js" ></script>
            <script src="<?= ROOT ?>/assets/bootstrap-4.4.1/dist/js/bootstrap.js" ></script>
          


</body>
</html>