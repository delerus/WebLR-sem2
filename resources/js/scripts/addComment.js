document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.add-comment-btn').forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.dataset.postId;
            const modal = document.getElementById(`comment-modal-${postId}`);
            modal.style.display = 'block';

            // Обработчик для отправки комментария
            modal.querySelector('.submit-comment').onclick = function() {
                const comment = document.getElementById(`comment-text-${postId}`).value;

                // Отправляем комментарий на сервер
                fetch('/comments', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        post_id: postId,
                        comment: comment
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        // Добавляем комментарий на страницу
                        const commentDiv = document.createElement('div');
                        commentDiv.innerHTML = `<p><strong>${data.author}</strong> (${data.created_at})</p><p>${data.comment}</p>`;
                        document.querySelector(`[data-post-id="${postId}"]`).parentNode.querySelector('.comments').appendChild(commentDiv);

                        // Скрываем модальное окно и очищаем поле ввода
                        modal.style.display = 'none';
                        document.getElementById(`comment-text-${postId}`).value = '';
                    }
                })
                .catch(error => {
                    console.error('Ошибка при отправке комментария:', error);
                });
            };
        });
    });
});
