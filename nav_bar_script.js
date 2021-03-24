$(document).ready(() => {
    $('#cat_food_category').click(() => {
        if ($('.cat_options').hasClass('hidden')) {
            $('.cat_options').removeClass('hidden');
        } else {
            $('.cat_options').toggleClass('hidden');
        }
    });
    $('#dog_food_category').click(() => {
        if ($('.dog_options').hasClass('hidden')) {
            $('.dog_options').removeClass('hidden');
        } else {
            $('.dog_options').toggleClass('hidden');
        }
    });

    $('#parrot_food_category').click(() => {
        if ($('.parrot_options').hasClass('hidden')) {
            $('.parrot_options').removeClass('hidden');
        } else {
            $('.parrot_options').toggleClass('hidden');
        }
    });

});
