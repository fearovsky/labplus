<script>
    document.addEventListener('wpcf7mailsent', function(event) {
        setTimeout(() => {
            location = {!! '\'' . $submissionRedirect . '\'' !!};
        }, 1000);
    }, false);
</script>
