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
        <?php
            if(!empty($flush))
                foreach($flush as $class => $msgs)
                    foreach($msgs as $msg):
        ?>
                        
        <div class="alert <?= $class ?>"><span><?= $msg ?></span></div>

        <?php endforeach ?>

    </div>

    <div class="main">
        <div id="add-image">
            <form enctype="multipart/form-data" method="post" action="/image/add">
                <input id="alt" type="text" name="alt" />
                <input type="file" name="image" />
                <button class="btn-submit-image btn-font">add image</button>
            </form>
        </div>

        <div id="gallery-images">
            <div class="gallery-images-label">
                <span class="helvetica">Gallery images:</span>
                <hr align="center" width="90%">
            </div>



            <div class="image-control-main">
                <table class="image-control-table">
            <?php
                if(!empty($images))
                    foreach($images as $image):
            ?>
                    <tr class="image-control-row helvetica">
                        <td style="width: 110px"><img class="image" src="<?= \Framework\Request\Request::getHost().'/uploads/portfolio/gallery/'.$image->name ?>"></td>
                        <td> <span style="border: 1px black dotted; border-radius: 5px;"><?= $image->id ?></span></td>
                        <td style="text-align: center"><?= $image->name ?></td>
                        <td style="text-align: right"><a href="/delete/<?= $image->id ?>"><img src="<?= \Framework\Request\Request::getHost().'/images/glyphicons/glyphicons_remove.png' ?>" alt="delete"></a></td>
                    </tr>

                <?php endforeach ?>
                </table>
            </div>

        </div>

    </div>



<script>
    var menu = document.querySelector('.menu');

    new AnimateLinks();


    var alertt = document.querySelector('.alert');
    if(alertt)
    {
        setTimeout(function(){
            alertt.parentElement.removeChild(alertt);
        }, 3000)
    }


    (function()
    {
        var mainHeight = document.querySelector('.main');
        var imageControlMain = document.querySelector('#gallery-images');

        var computedStyle = getComputedStyle(mainHeight);


        mainHeight.style.height = (imageControlMain.offsetHeight + 220) + 'px';
    })();


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