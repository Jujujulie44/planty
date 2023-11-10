jQuery(document).ready(function() {
    console.log("toto")
    jQuery('.minus').click(function () {
        var jQueryinput = jQuery(this).parent().find('input');
        var count = parseInt(jQueryinput.val()) - 1;
        count = count < 0 ? 0 : count; // Garantit que la valeur ne descend pas en dessous de zéro
        jQueryinput.val(count);
        jQueryinput.change();
        return false;
    });
    jQuery('.plus').click(function () {
        var jQueryinput = jQuery(this).parent().find('input');
        jQueryinput.val(parseInt(jQueryinput.val()) + 1);
        jQueryinput.change();
        return false;
    });
});