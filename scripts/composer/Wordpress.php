<?php

namespace Mimir;

use Composer\Script\Event;

class Wordpress
{
    public static function postProjectInstall(Event $event)
    {
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        require $vendorDir . '/autoload.php';

        $io = $event->getIO();
        $io->write('Now to setup Wordpress');
        $siteName = $io->ask('Site name: ');
        $siteUrl = $io->ask('Site url: ');
        $adminUser = $io->ask('Admin username: ');
        $adminEmail = $io->ask('Admin email: ');

        $io->write(system("wp core install --url='$siteUrl' --title='$siteName' --admin_user='$adminUser' --admin_email='$adminEmail'"));

    }
}