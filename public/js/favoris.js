window.onload = function () {
    var lesFavoris = document.getElementsByClassName('favoris')

    for (var i = 0; i < lesFavoris.length; i++) {
        lesFavoris[i].addEventListener('click', function clickFavoris(event) {


            if (this.style.color === 'orange') {
                this.style.color = '#007BFF';
            } else {
                this.style.color = 'orange';
            }

            event.preventDefault()

            let baliseA = event.target.parentNode;
            let url = baliseA.getAttribute('href');
            
            fetch(url).then(
                function (response) {
                    if (response.ok == true)
                        return response.json()
                })
        });
    }
}