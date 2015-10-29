<?php

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="css/admin/index/index.css" rel="stylesheet">
</head>
<body>
    <div class="menu">
        <div class="btn-home"><a id="left" href="/">home</a></div>
        <div class="btn-logout"><a id="right" href="/logout">sign out</a> </div>
    </div>




<script>
    var menu = document.querySelector('.menu');

    new AnimateLinks();

    function AnimateLinks()
    {
        menu.onmouseover = function (e) {
            var target = e.target;

            if (target.tagName == 'A') {
                target.style.width = '200px';
                target.style.backgroundColor = '#'
            }
        }

        menu.onmouseout = function (e) {
            var target = e.target;

            if (target.tagName == 'A') {
                target.style.width = '';

            }
        }
    }

</script>

</body>
</html>