$(".js-example-placeholder-single").select2({
    placeholder: "Search Users...",
    allowClear: true
});

$(".show-hide-icon").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $(".password1");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$(".show-hide-icon2").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $(".password2");
    if (input.attr("type") === "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

jQuery(document).ready(function() {
    $('.fancybox').fancybox();
});


$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("active");
});