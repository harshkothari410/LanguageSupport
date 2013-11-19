<?php
/**
 * LanguageSupport
 * Extensions
 * @author Harsh Kothari (http://mediawiki.org/wiki/User:Harsh4101991) <harshkothari410@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */
if ( !defined( 'MEDIAWIKI' ) ) die( "This is an extension to the MediaWiki package and cannot be run standalone." );

$wgExtensionCredits['parserhook'][] = array (
        "path" => __FILE__,
        "name" => "LanguageSupport",
        "author" => "Harsh Kothari",
        'descriptionmsg' => 'LanguageSupport-desc',
        'url' => 'http://www.mediawiki.org/wiki/Extension:LanguageSupport',
);

// $wgExtensionMessagesFiles['TLanguageSupportMagic'] = __DIR__ . '/TLanguageSupport.magic.php';
// $wgExtensionMessagesFiles['TLanguageSupport'] = __DIR__ . '/TLanguageSupport.i18n.php';
$wgAutoloadClasses[ 'SpecialLanguageSupport' ] = __DIR__ . '/SpecialLanguageSupport.php';
$wgSpecialPages[ 'LanguageSupport' ] = 'SpecialLanguageSupport'; 

$wgResourceModules['ext.LanguageSupport'] = array(
        // JavaScript and CSS styles. To combine multiple files, just list them as an array.
        'scripts' => 'js/ext.LanguageSupport.core.js',
        'styles' => 'css/ext.LanguageSupport.css',
        //'messages' => array( 'myextension-hello-world', 'myextension-goodbye-world' ),
        'remoteExtPath' => 'LanguageSupport',
        'localBasePath' => __DIR__
);
?>
