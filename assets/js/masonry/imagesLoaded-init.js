/**
 * Created by breon on 12/6/16.
 */

jQuery(function($) {
    $(document).ready(function() {
        var $container = $(".mgrid");

        $container.imagesLoaded(function () {
            $container.masonry();
        });
    });
});