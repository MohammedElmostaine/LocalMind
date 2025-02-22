<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AskLocal - Questions Localisées</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[class*="toggle-comments-"]').forEach(button => {
            button.addEventListener('click', function () {
                const questionId = this.classList
                .toString()
                .match(/toggle-comments-(\d+)/)[1];
                const commentsSection = document.querySelector(`.comments-section-${questionId}`);

                if (commentsSection) {
                // Toggle the hidden class for the comments section
                commentsSection.classList.toggle('hidden');

                // Update button text based on visibility
                const isHidden = commentsSection.classList.contains('hidden');
                this.textContent = isHidden ? 'Voir les commentaires' : 'Masquer les commentaires';
                }
            });
            });
        });
    </script>
</head>
<body class="h-full bg-gradient-to-br from-purple-50 to-pink-50 font-[Inter]">
    @include('layouts.navigation')

    @yield('content')

    @include('components.floating-button')
</body>
</html>
