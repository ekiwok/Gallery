(function ($) {

    var createAlbumBtn = '#create-album';

    var app = (function App () {

        var topContainer = "#container-top",
            bottomContainer = "#container-bottom",
            albumNameInput = "#album-name";

        this.reload = function Reload () {
            $(topContainer).load(document.location.href + " " + bottomContainer);
        };

        this.createAlbum = function CreateAlbum (ev) {
            ev.stopImmediatePropagation();

            var action = $(ev.currentTarget).data('action'),
                name = $(albumNameInput).val();

            if (!name.length) {
                return;
            }

            $.post(action, {name: name})
             .done(app.reload);
        };

        return this;
    })();

    window.app = app;

    $(document).on('click', createAlbumBtn, app.createAlbum);

})(jQuery);
