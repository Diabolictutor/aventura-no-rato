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
}