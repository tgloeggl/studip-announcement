<div id="dark-layer"></div>

<div id="notification_2_5">

    <p>
        Am 11.12. haben wir unser Stud.IP auf die Version 2.5 aktualisiert.
        In der neuen Version gibt es einige<br>
        Änderungen bzw. neue Funktionen, die wir Ihnen kurz vorstellen möchten:
    </p>
    <ul>
        <li>"Alles als gelesen markieren"
        <li>Ein modernisiertes Forum
        <li>"Blubber" als Echtzeit-Kommunikations-Forum
        <li>Stud.IP mobil: Android App
        <li>Umgestaltung der TeilnehmerInnen-Seite
    </ul>
    <p>
        <a class="link-extern" href="http://www.virtuos.uni-osnabrueck.de/Projekte/StudIPNeues" target="_blank">
            Nähere Informationen zu den Änderungen finden Sie hier.
        </a>
    </p>

    <div style="text-align: center">
        <button class="button" name="notification_2_5_submit" id="notification_2_5_submit" type="submit"><?= _('Schließen') ?></button>
        <!-- < ? = Button::create(_('Ja, das sieht super aus!'), 'notification_2_5_submit') ? > -->
    </div>
</div>

<script type="text/javascript">
    /*<[CDATA[*/
    (function($) {
        var deleteLayer = function() {
            $('#dark-layer').css('visibility', 'hidden');
        };

        var unsubscribe = function(onSuccess) {
            var url = '<?= PluginEngine::getLink('announcement', array(), 'unsubscribe')?>';
            $.ajax({
                url: url,
                success: function(obj) {
                    deleteLayer();
                    onSuccess();
                },
                error: function(err) {
                    deleteLayer();
                    onSuccess();
                },
                cache: false
            });
        };

        $('#notification_2_5').dialog(
            {
            show: '',
            hide: '',
            title: 'Update von Stud.IP auf die Version 2.5',
            draggable: true,
            modal: true,
            resizable: false,
            width: Math.min(800, $(window).width() - 64),
            height: 'auto',
            maxHeight: $(window).height(),
            dialogClass: 'notification-2_5-dialog',
            open: function () {
                $(this).parents(".ui-dialog:first").css('z-index', 10020);
            },
            close: function() {
                unsubscribe(function(){});
            },
            create: function() {
                var dialogue = $(this);
                $(':button[name=notification_2_5_submit]').on('click dblclick', function() {
                    dialogue.dialog("close");
                });
            }
            }).css('z-index', 10020);
    })(jQuery);
    /*]]>*/
</script>
