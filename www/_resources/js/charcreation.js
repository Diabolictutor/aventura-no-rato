function initSliders() {  
    $('.slider-weight').slider({
        min: 1,
        max: 20,
        value: $('#weight').val(),
        slide: function(event, ui) {
            $('#weight').val($(this).slider('value'));
        }
    });
    
    $('.slider-strenght').slider({
        min: 1,
        max: 20,
        value: $('#strenght').val()
    });
    
    $('.slider-defense').slider({
        min: 1,
        max: 20,
        value: $('#defense').val()
    });
       $('.slider-intellect').slider({
        min: 1,
        max: 20,
        value: $('#intellect').val()
    });   
    $('.slider-luck').slider({
        min: 1,
        max: 20,
        value: $('#luck').val()
    });
       $('.slider-health').slider({
        min: 1,
        max: 20,
        value: $('#health').val()
    });
        
}

function nextPortrait() {
    $('#portrait').attr('src', '_resources/images/game/portraits/male/portrait-m20');
    
}