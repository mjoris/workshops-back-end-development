window.addEventListener('ready', function() {
    let arrows = document.querySelectorAll('input.routertest + a');
    if (arrows.length) {
        for (let i = 0, leng = arrows.length; i < leng ; i++) {
            arrows[i].addEventListener('click', function() {
                let urlInput = arrows[i].previousSibling;
                while (urlInput.nodeName != 'INPUT') { urlInput = urlInput.previousSibling;}
                console.log(urlInput);
                let newUrl = arrows[i].dataset.baseUrl + urlInput.value;
                arrows[i].href = newUrl;
            });
        }
    }
});