<footer class="bg-light border-top mt-5 py-3">
    <div class="container-fluid">
        <div class="row text-center text-md-start">
            
            <div class="col-md-6 mb-2">
                <span class="text-muted">
                    © <span id="year"></span> Apartment Sales Management System  
                    — All Rights Reserved
                </span>
            </div>

            <div class="col-md-6 text-md-end">
                <a href="https://bahadori.42web.io" class="text-decoration-none me-3 text-muted" target="_blank">درباره ما</a>
                <a href="https://bahadori.42web.io/#contact" class="text-decoration-none me-3 text-muted" target="_blank">تماس با ما</a>
            </div>

        </div>
    </div>
</footer>

<script>
    // نمایش خودکار سال جاری
    document.getElementById("year").textContent = new Date().getFullYear();
</script>

<script src="<?= $baseUrl ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= $baseUrl ?>/js/main.js"></script>
</body>
</html>
