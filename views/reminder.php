<div id="dark-layer"></div>

<div id="notification_2_5">

    Liebe Lehrende der Universität Osnabrück,<br>
    <br>
    heute startet das Pilotprojekt zum § 52a UrhG und die Einzelmeldungen an die VG Wort an der Universität Osnabrück. Bitte sehen Sie sich hierzu das folgende Video von Vizepräsidentin Prof. Dr. May-Britt Kallenrode und Projektleiter Dr. Andreas Knaden an.
    <br>
    <br>
    Weitere Informationen finden Sie in der Stud.IP-Veranstaltung „Pilotprojekt 52a“.<br>
    <br>
    <iframe style="width: 580px; height: 327px; border: 0"
            scrolling="no" allowfullscreen
            src="https://video3.virtuos.uni-osnabrueck.de/engage/ui/embed.html?id=d9223f9e-9e51-4c9f-86e0-a12dbc901182&quality=hd&play=true"></iframe>

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
            var url = '<?= PluginEngine::getLink('globalannouncement', array(), 'unsubscribe')?>';
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
            title: 'Pilotprojekt § 52a',
            draggable: true,
            modal: true,
            resizable: false,
            width: 600,
            height: 560,
            maxHeight: $(window).height(),
            dialogClass: 'notification-2_5-dialog',
            open: function () {
                $(this).parents(".ui-dialog:first").css('z-index', 10020);
            },
            close: function() {
                unsubscribe(function(){ $('#notification_2_5').remove(); });
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
