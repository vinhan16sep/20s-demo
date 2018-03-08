<footer class="main-footer">
    This is footer
</footer>

<script src="{{ asset ("public/js/main.js") }}"></script>
<script>
    $('#brand-login').on('submit', function(e) {
        e.preventDefault();
        var email = $('#input_brand_email').val();
        var password = $('#input_brand_password').val();
        $.ajax({
            type: "POST",
            url: 'http://localhost/20sections/api/v1/brand-login',
            data: {
                email:email, password:password
            },
            success: function(res) {
                console.log(res);
                window.location.href = 'http://localhost:4201/';
            }
        });
    });
</script>