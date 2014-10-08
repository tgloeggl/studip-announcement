<div id="dark-layer"></div>

<div id="notification_2_5">

    <iframe style="width: 580px; height: 327px; border: 0"
            scrolling="no" allowfullscreen
            src=""></iframe>

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
            title: 'Pilotprojekt § 52a',
            draggable: true,
            modal: true,
            resizable: false,
            width: 600,
            height: 440,
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
