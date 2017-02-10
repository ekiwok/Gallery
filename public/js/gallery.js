(function ($) {

    var createAlbumBtn = '#create-album',
        removeAlbumBtn = '.remove-album',
        addImageBtn = '#add-image';

    var app = (function App () {

        var topContainer = "#container-top",
            bottomContainer = "#container-bottom",
            albumNameInput = "#album-name",
            imageUrlInput = "#image-url";

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

        this.removeAlbum = function RemoveAlbum (ev) {
            ev.stopImmediatePropagation();
            ev.preventDefault();

            if(!confirm("Are you 100% sure you want to delete this album with all pictures?")) {
                return;
            }

            var action = $(ev.currentTarget).prop('href');

            $.ajax(action, {
                method: 'delete'
            }).done(app.reload);
        };

        this.addImage = function AddImage (ev) {
            ev.stopImmediatePropagation();
            ev.preventDefault();

            var $imageUrlInput = $(imageUrlInput),
                url = $imageUrlInput.val(),
                action = $(ev.currentTarget).data('action');

            $.post(action, {url : url})
            .done(function () {
                app.reload();
                $(imageUrlInput).val('');
            })
            .fail(function () {
                alert('It must at least look like url')
            });
        };

        return this;
    })();

    $(document).on('click', createAlbumBtn, app.createAlbum);
    $(document).on('click', removeAlbumBtn, app.removeAlbum);
    $(document).on('click', addImageBtn, app.addImage);

})(jQuery);
