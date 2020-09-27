window.addEventListener('ready', function() {

    var codeBlocks = document.querySelectorAll('pre code');
    for (var i = 0, len = codeBlocks.length; i < len ; i++) {

        // Local reference
        var codeBlock = codeBlocks[i];

        // linked examples
        if (codeBlock.hasAttribute('data-overlay-example')) {


            // Add Show Example button
            var button = document.createElement('input');
            button.type = 'submit';
            button.value = 'Show Example';
            button.className = 'run';
            button.addEventListener('click', function() {
                showInOverlay(this.parentNode.querySelector('code'), null, this.parentNode.querySelector('code').getAttribute('data-overlay-example'));
            });
            codeBlock.parentNode.appendChild(button);
        }
    }

    function html_entity_decode(str) {
        var tmp = document.createElement('textarea');
        tmp.innerHTML = str.replace(/</g,"&lt;").replace(/>/g,"&gt;");
        toReturn = tmp.value;
        tmp = null;
        return toReturn;
    }

    // show a blob of HTML inside an overlay
    var showInOverlay = function(codeBlock, html, url) {

        codeBlock.blur();

        var height = parseInt(codeBlock.getAttribute('data-overlay-height') || 460, 10);
        var width = parseInt(codeBlock.getAttribute('data-overlay-width') || 680, 10);
        var url = url || 'assets/blank.html';

        // Make sure overlay UI elements are present
        if (!document.getElementById('overlayBack')) {
            var overlayBack = document.createElement('div');
            overlayBack.id = "overlayBack";
            overlayBack.addEventListener('click', function(e) {
                e.stopPropagation();

                // erase contents (to prevent movies from playing int he back for example)
                document.getElementById('daframe').src= 'assets/blank.html';

                // hide
                document.getElementById('overlayBack').style.display = 'none';
                document.getElementById('overlayContent').style.display = 'none';
            });
            document.body.appendChild(overlayBack);
        }

        if (!document.getElementById('overlayContent')) {
            var overlayContent = document.createElement('div');
            overlayContent.id = "overlayContent";
            document.body.appendChild(overlayContent);
        }

        // reference elements we'll be needing
        var ob = document.getElementById('overlayBack');
        var oc = document.getElementById('overlayContent');

        // Position oc
        oc.style.width = width + 'px';
        oc.style.height = height + 'px';
        oc.style.marginTop = '-' + (height/2) + 'px';
        oc.style.marginLeft = '-' + (width/2) + 'px';

        // inject iframe
        oc.innerHTML = '<iframe src="' + url + '" height="' + height + '" width="' + width + '" border="0" id="daframe"></iframe>';

        // inject HTML
        if (html) {
            var oIframe = document.getElementById('daframe');
            var oDoc = (oIframe.contentWindow || oIframe.contentDocument);
            if (oDoc.document) oDoc = oDoc.document;
            oDoc.write(html_entity_decode(html));
        }

        // Show me the money!
        ob.style.display = 'block';
        oc.style.display = 'block';

    }

}, false);