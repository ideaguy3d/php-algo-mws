/**
 * Created by Julius Alvarado on 5/12/2018.
 */

(function ($) {
    $(document).ready(() => {
        console.log("Ello World ! ^_^/ jQuery is ready!!");

        const $menuButton = $('.menu-button');
        const $navDropdown = $('#nav-dropdown');
        let position = {};

        $menuButton.on('click', () => {
            $navDropdown.show();
        });

        $navDropdown.on('mouseleave', () => {
            $navDropdown.hide();
        });

        const madisonMarket = function () {
            const $cart = $('#cart');
            const $cartDrop = $('#cart .dropdown-menu');
            const $account = $('#account');
            const $accountDrop = $('#account .dropdown-menu');
            const $help = $('#help');
            const $helpDrop = $('#help .dropdown-menu');

            $cart.on('click', () => {
                $cartDrop.show();
            });

            $cartDrop.on('mouseleave', () => {
                $cartDrop.hide();
            });

            $account.on('click', () => {
                $accountDrop.show();
            });

            $accountDrop.on('mouseleave', () => {
                $accountDrop.hide();
            });

            $help.on('click', () => {
                $helpDrop.show();
            });

            $helpDrop.on('mouseleave', () => {
                $helpDrop.hide();
            });
        };

        const effectPrac = function () {

            $('.hide-button').on('click', () => {
                $('.first-image').hide();
            });

            $('.show-button').on('click', () => {
                $('.first-image').show();
            });

            $('.toggle-button').on('click', () => {
                $('.first-image').toggle();
            });

            $('.fade-out-button').on('click', () => {
                $('.fade-image').fadeOut(500);
            });

            $('.fade-in-button').on('click', () => {
                $('.fade-image').fadeIn(4000);
            });

            $('.fade-toggle-button').on('click', () => {
                $('.fade-image').fadeToggle();
            });

            $('.up-button').on('click', () => {
                $('.slide-image').slideUp(100);
            });

            $('.down-button').on('click', () => {
                $('.slide-image').slideDown('slow');
            });

            $('.slide-toggle-button').on('click', () => {
                $('.slide-image').slideToggle(200); // will default to 400ms
            });
        };

        const triviaCard = function () {
            $('.hint-box').on('click', () => {
                $('.hint').slideToggle(200);
            });

            $('.wrong-answer-one').on('click', () => {

                $('.wrong-text-one').fadeOut(200);
                $('.frown').show();

            });

            $('.wrong-answer-two').on('click', () => {

                $('.wrong-text-two').fadeOut(200);
                $('.frown').show();

            });

            $('.wrong-answer-three').on('click', () => {

                $('.wrong-text-three').fadeOut(200);
                $('.frown').show();

            });

            $('.correct-answer').on('click', () => {

                $('.frown').hide();
                $('.smiley').show();
                $('.wrong-text-one').fadeOut(200);
                $('.wrong-text-two').fadeOut(200);
                $('.wrong-text-three').fadeOut(200);

            });
        };

        $('#find-postcode').on('click', (e) => {
            e.preventDefault();
            geocodeOne();
        });

        function geocodeOne() {
            $.ajax({
                url: "https://maps.googleapis.com/maps/api/geocode/json?"
                + "address=" + encodeURIComponent($('#address').val())
                + "key=AIzaSyCJP1aQSw46-1QlDq8V_Tt7ZtYWyM6jTW4",
                type: "GET",
                success: function (data) {
                    console.log("\njha - geocode data = ", data.results);
                    const $message = $('#message');

                    // iterative
                    const results = data["results"][0] ? data["results"][0] : null;
                    if(results) {
                        for (let key in results) {
                            if (results.hasOwnProperty(key)) {
                                let val = results[key];
                                // console.log("key = "+key);
                                // console.log("value =", val);
                            }
                        }

                        const addressComponents = results["address_components"]
                            ? results["address_components"] : null;

                        if(addressComponents) {
                            addressComponents.forEach(function (e) {
                                // console.log("jha - e = ", e);
                                if (e["types"][0] === "postal_code") {
                                    let zipCode = e["long_name"];

                                    // console.log("jha - postal code = ", e["long_name"]);
                                    if (zipCode) {
                                        $message.html(zipCode);
                                    }
                                }
                            });
                        }
                    } else {
                        $message.html("couldn't find zip code =/");
                    }


                }
            });
        }
    });
}(jQuery));