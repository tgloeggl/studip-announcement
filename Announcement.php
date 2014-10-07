<?php
/*
 * Announcement.php - Announcement plugin for Stud.IP 2.5
 * Copyright (c) 2013  Dominik Abraham
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation; either version 2 of
 * the License, or (at your option) any later version.
 */

class Announcement extends StudipPlugin implements SystemPlugin
{
    private static $_configField = 'ANNOUNCEMENT_SEEN';

    function __construct()
    {
        parent::__construct();

        if ($GLOBALS['user']->id == 'nobody') {
            return;
        } else {
            $config = UserConfig::get($GLOBALS['user']->id);
            if ($config->getValue(self::$_configField) != false) {
                return;
            }
        }

        $template_factory = new Flexi_TemplateFactory(dirname(__FILE__).'/views');

        PageLayout::addStylesheet($this->getPluginURL().'/public/stylesheets/application.css');
        PageLayout::addBodyElements($template_factory->render('reminder'));
    }

    function unsubscribe_action() {
        $config = UserConfig::get($GLOBALS['user']->id);
        $config->store(self::$_configField, true);
    }
}
