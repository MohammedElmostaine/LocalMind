<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AskLocal - Questions Localisées</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.toggle-comments').forEach(button => {
                button.addEventListener('click', function () {
                    // Find the closest question card parent
                    const questionCard = this.closest('.questions-card');
                    if (questionCard) {
                        // Find the comments section within this card
                        const commentsSection = questionCard.querySelector('[class^="comments-section-"]');
                        if (commentsSection) {
                            commentsSection.classList.toggle('hidden');
                            const isHidden = commentsSection.classList.contains('hidden');
                            const span = this.querySelector('span');
                            if (span) {
                                span.textContent = isHidden ? 'Rponses' : 'Masquer';
                            }
                        }
                    }
                });
            });
        });
    </script>
</head>
<body class="h-full bg-gradient-to-br from-purple-50 to-pink-50 font-[Inter]">
    @include('layouts.navigation')

    @yield('content')

</body>
</html>
