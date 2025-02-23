document.querySelectorAll('.like-button').forEach(button => {
    button.addEventListener('click', function() {
        const questionId = this.dataset.questionId;
        
        fetch(`/questions/${questionId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            const likesCount = this.querySelector('.likes-count');
            likesCount.textContent = data.likesCount;
            
            if (data.status === 'liked') {
                this.classList.add('text-pink-600');
                this.classList.remove('text-gray-400');
            } else {
                this.classList.remove('text-pink-600');
                this.classList.add('text-gray-400');
            }
        });
    });
});