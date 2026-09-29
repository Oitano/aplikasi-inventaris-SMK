<script>
    function greetings() {
        let asiaTime = new Date().toLocaleString('en-US', {
            timeZone: 'Asia/Makassar'
        });
        asiaTime = new Date(asiaTime);
        let hours = asiaTime.getHours();
        if (hours <= 10) msg = 'Selamat Pagi!';
        if (hours >= 11) msg = 'Selamat Siang!';
        if (hours >= 16) msg = 'Selamat Sore!';
        if (hours >= 19) msg = 'Selamat Malam!';

        return msg;
    }
</script><?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk_FIXED\resources\views/layouts/partials/greetings.blade.php ENDPATH**/ ?>