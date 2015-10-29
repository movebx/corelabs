var navBar = document.getElementById('animate-nav-bar');
var content = document.getElementById('animate-content');


function navBarAnimate()
{

    setTimeout(function()
    {
        navBar.style.boxShadow = '0px 0px 13px 3px #969696';
        //navBar.style.border = '1px solid #c4c4c4';
        content.style.boxShadow = '0px 0px 13px 3px #969696';
        //content.style.border = '1px solid #c4c4c4';
    }, 200);
}

document.addEventListener('DOMContentLoaded', navBarAnimate);

navBar.addEventListener('mouseover', function(event)
{
    var target = event.target;
    if(target.tagName == 'A')
    {
        target.style.borderRight = '15px solid #969696';
        target.style.color = '#969696';

    }
});

navBar.addEventListener('mouseout', function(event)
{
    var target = event.target;
    if(target.tagName == 'A')
    {
        target.style.borderRight = '';
        target.style.color = '';

    }
});


