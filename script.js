$('#main-menu').click(function(){
    $(this).toggleClass('menu-active');
    $('.menu-div').toggleClass('menu-div-active');
});

// For the character.php

$('#bio-link').click(function(){
    $('#bio-content').removeClass('content-deactive');
    $('#dna-content').addClass('content-deactive');
    $('#stats-content').addClass('content-deactive');
});
$('#dna-link').click(function(){
    $('#dna-content').removeClass('content-deactive');
    $('#bio-content').addClass('content-deactive');
    $('#stats-content').addClass('content-deactive');
});
$('#stats-link').click(function(){
    $('#stats-content').removeClass('content-deactive');
    $('#dna-content').addClass('content-deactive');
    $('#bio-content').addClass('content-deactive');
});




//