
<html>
<head>
        <title><?= $title ?></title>
        <link href="/css/admin/login/login.css" rel="stylesheet">
</head>
<body>
    <?php
        if(!empty($flush))
            foreach($flush as $class => $msgs)
                foreach($msgs as $msg)
                {
    ?>
                    <div class="<?= $class ?>"><span><strong><?= $class ?>: </strong><?= $msg ?></span></div>

    <?php
                }
    ?>
    <div id="enter-form">
        <form method="post" action="<?= $action ?>">
            <div id="enter-label"><label for="login">Enter</label></div>
            <div class="inputs">
                <input id="login" type="text" name="login" placeholder="Login" />
                <input type="password" name="password" placeholder="Password" />
            </div>
            <button class="submit">Sign in</button>
        </form>
    </div>


    <script type="text/javascript">

        var enterForm = document.getElementById('enter-form');

        var alertError = document.querySelector('.error');

        if(alertError)
        {
            alertError.style.width = enterForm.offsetWidth;
            alertError.style.left = enterForm.offsetLeft + 'px';
            alertError.style.top = (enterForm.offsetTop) + 'px';

            setTimeout(function()
            {
                alertError.parentElement.removeChild(alertError);
            }, 3000)

        }

        enterForm.onclick = function(e)
        {
            var target = e.target;


            if(target.tagName == 'BUTTON')
            {


                var inputs = document.querySelectorAll('.inputs > input');

                for(var i = 0; i < inputs.length; i++)
                {
                    if(inputs[i].value.match(/^[\w\d@]{4,}$/i) == null)
                    {
                        var button = target;

                        var left = button.offsetWidth + button.offsetLeft;
                        var top = button.offsetTop;

                        var div = document.createElement('div');
                        div.style.position = 'absolute';
                        div.style.left = (left + 3) + 'px';
                        div.style.top = top + 'px';
                        div.classList.add('alert');
                        div.innerHTML = '<strong>Неверный логин или пароль</strong>';
                        div.style.backgroundColor = '#c15d62';

                        button.parentElement.insertAdjacentElement('beforeBegin', div);

                        e.preventDefault();

                    }
                }
            }
        };


        enterForm.onkeydown = function(e)
        {
            var target = e.target;

            if(target.tagName = 'INPUT')
                if (e.which == 8)
                {
                    var event = new Event("keypress", {bubbles: true, cancelable: false});

                    target.dispatchEvent(event);
                }
        };


        enterForm.onkeypress = function(event)
        {

            function getChar(event)
            {
                if (event.which == null) { // IE
                    if (event.keyCode < 32) return null; // спец. символ
                    return String.fromCharCode(event.keyCode)
                }

                if (event.which != 0 && event.charCode != 0) { // все кроме IE
                    if (event.which < 32) return null; // спец. символ
                    return String.fromCharCode(event.which); // остальные
                }

                return null; // спец. символ
            }

            var char = event.isTrusted ? getChar(event) : 'w';

            //alert(event.target.value.match(/^[\w\d]+$/i));




            if((char.match(/^[\w\d@]?$/i) == null) || (event.target.value.match(/^[\w\d@]*$/i) == null))
            {


                var target = event.target;

                if (target.tagName = 'INPUT')
                {
                    var input = target;

                    var left = input.offsetWidth + input.offsetLeft;
                    var top = input.offsetTop;

                    var div = document.createElement('div');
                    div.style.position = 'absolute';
                    div.style.left = (left + 3) + 'px';
                    div.style.top = top + 'px';
                    div.classList.add('alert');
                    div.innerHTML = '<strong>Неправильный символ сучара</strong>';
                    div.style.backgroundColor = '#c15d62';

                    input.parentElement.insertAdjacentElement('beforeBegin', div);


                }
            }
            else
            {
                var alertDivs = document.querySelectorAll('.alert');

                for(var c = 0; c < alertDivs.length; c++)
                    alertDivs[c].parentElement.removeChild(alertDivs[c]);
            }
        };

    </script>


</body>
</html>