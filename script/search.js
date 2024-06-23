document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-input');
    const resultsContainer = document.getElementById('results-container');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value;

        if (query.length > 0) {
            fetch(`search.php?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    resultsContainer.innerHTML = '';
                    data.forEach(article => {
                        const card = document.createElement('div');
                        card.classList.add('card');
                        card.innerHTML = `
                            <h3 class='card__title'>${article.judul}</h3>
                            <p class='card__content'>${article.excerpt}</p>
                            <div class='card__date'>${article.tanggal}</div>
                            <div class='card__arrow'>
                                <form action='article_display.php' method='GET' style='margin: 0;'>
                                    <input type='hidden' name='id' value='${article.id}'>
                                    <button type='submit' style='all: unset; cursor: pointer;'>
                                        <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' height='15' width='15'>
                                            <path fill='#fff' d='M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z'></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>`;
                        resultsContainer.appendChild(card);
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    });
});
