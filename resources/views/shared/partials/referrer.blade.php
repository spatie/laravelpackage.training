<script>
    (() => {
        const referrerFromUrl = new URLSearchParams(window.location.search).get('referrer');

        if (referrerFromUrl) {
            document.cookie = `referrer=${encodeURIComponent(referrerFromUrl)}; max-age=7200; path=/; samesite=lax`;
        }

        const referrerCookie = document.cookie.split('; ').find((cookie) => cookie.startsWith('referrer='));

        const referrer = referrerFromUrl || (referrerCookie ? decodeURIComponent(referrerCookie.split('=')[1]) : null);

        if (! referrer) {
            return;
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('a[href^="https://spatie.be"]').forEach((link) => {
                const url = new URL(link.href);

                url.searchParams.set('referrer', referrer);

                link.href = url.toString();
            });
        });
    })();
</script>
