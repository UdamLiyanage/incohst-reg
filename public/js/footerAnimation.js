$(document).ready(function(){
    function animateDrivers()
    {
        $('.footer i').animate({'fontSize':'15px'}, 500).animate({'fontSize':'12px'}, 500, animateDrivers);
    }

    animateDrivers();
});