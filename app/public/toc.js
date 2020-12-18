window.addEventListener('load', function() {

    // Add aside element
    var tocAside = document.createElement('aside');
    tocAside.classList.add('toc');
    var slidesDiv = document.querySelector('.slides');
    slidesDiv.parentNode.insertBefore(tocAside, slidesDiv.nextSibling);

    // Fetch TOC
    var mainSections = document.querySelectorAll('.slides > section');
    var chapterTitle = document.querySelector('h1').innerHTML.replace(/<br[^>]*>/g, ' ');
    var toc = [];
    for (var i = 1, len = mainSections.length; i < len ; i++) {

        // Get shorthand to section element
        var mainSection = mainSections[i];

        // Give secion an id. This to byspass the fact that querySelectorAll later on is root based
        if (!mainSection.id) mainSection.id = 'toc_slide_' + i;

        // Get subSections
        var subSections = document.querySelectorAll('#' + mainSection.id + ' > section');

        var subSlides = [];
        if (subSections.length) {
            for (var j = 2, leng = subSections.length; j <= leng ; j++) {
                var subTitleEl = document.querySelector('#' + mainSection.id + ' > section:nth-child(' + (j) + ') > h2');
                if (subTitleEl) {
                    subSlides.push({
                        num: i + '/' + (j-1),
                        title: subTitleEl.innerHTML.replace(/<br[^>]*>/g, ' '),
                    });
                }
            }
        }

        toc.push({
            num : i,
            title: document.querySelector('#' + mainSection.id + ' > section > h2').innerHTML.replace(/<br[^>]*>/g, ' '),
            subSlides : subSlides
        });
    }

    // Build TOC and Overwrite backlink
    var tocHTML = '<nav><p>Slides Navigator</p><ul><li><a href="index.html">&larr; Back to index</a></li></ul>';
    if (toc.length) {
        tocHTML += '<ul>';
        tocHTML += '<li><a href="#/">' + chapterTitle + '</a>';
        for (var i = 0, l = toc.length; i < l; i++) {
            var mainSection = toc[i];
            tocHTML += '<li><a href="#/' + mainSection.num + '">' + mainSection.title + '</a>';
            if (mainSection.subSlides.length) {
                tocHTML += '<ul>';
                for (var j = 0, k = mainSection.subSlides.length; j < k; j++) {
                    var subSection = mainSection.subSlides[j];
                    tocHTML += '<li><a href="#/' + subSection.num + '">' + subSection.title + '</a><span class="pagenr">' + subSection.num + '</span></li>';
                }
                tocHTML += '</ul>';
            }
            tocHTML += '</li>';
        }
        tocHTML += '</ul>';
    }
    document.querySelector('.toc').innerHTML = tocHTML;
}, false);