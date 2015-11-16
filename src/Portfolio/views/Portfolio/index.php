<?php

$randomScrReveal = function(){
    $arr =
        [
            'data-sr="enter left, hustle 20px"',
            'data-sr="wait 1s, ease-in-out 100px"',
            'data-sr="move 16px scale up 20%, over 2s"',
            'data-sr="enter bottom, roll 45deg, over 2s"'
        ];

    return $arr[rand(0, 3)];
};
?>

<div class="gallery">
    <section class="images">
                <?php
                    foreach($images as $image):
                ?>
                <img <?=$randomScrReveal()?> src="<?= '/uploads/portfolio/gallery/'.$image->name ?>" alt="<?=$image->alt?>"/>
                <?php endforeach ?>
    </section>
</div>


<script>

    (function()
    {
        var gallery = $('.gallery');

        gallery.delegate('img', 'click', function(e)
        {
            var target = $(e.target);

            $('<div id="gallery-bg"></div>').appendTo('body');

            $('<img class="current-img"  />').appendTo('body');

            $('#gallery-bg').click(function(e)
            {
                $(e.target).detach();
                $('.current-img').detach();
            });

            var currentImg = $('.current-img');
            currentImg.attr('src', target.attr('src'));

            setTimeout(function()
            {
                currentImg.addClass('animate-img');
            }, 200);




        });


    })();

</script>
