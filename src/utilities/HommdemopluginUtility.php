<?php
/**
 * hommdemoplugin plugin for Craft CMS 3.x
 *
 * Plugin zu Demozwecken
 *
 * @link      http://www.homm.ch
 * @copyright Copyright (c) 2019 Domenik Hofer
 */

namespace homm\hommdemoplugin\utilities;

use homm\hommdemoplugin\Hommdemoplugin;
use homm\hommdemoplugin\assetbundles\hommdemopluginutilityutility\HommdemopluginUtilityUtilityAsset;

use Craft;
use craft\base\Utility;

/**
 * hommdemoplugin Utility
 *
 * Utility is the base class for classes representing Control Panel utilities.
 *
 * https://craftcms.com/docs/plugins/utilities
 *
 * @author    Domenik Hofer
 * @package   Hommdemoplugin
 * @since     0.0.1
 */
class HommdemopluginUtility extends Utility
{
    // Static
    // =========================================================================

    /**
     * Returns the display name of this utility.
     *
     * @return string The display name of this utility.
     */
    public static function displayName(): string
    {
        return Craft::t('hommdemoplugin', 'HommdemopluginUtility');
    }

    /**
     * Returns the utility’s unique identifier.
     *
     * The ID should be in `kebab-case`, as it will be visible in the URL (`admin/utilities/the-handle`).
     *
     * @return string
     */
    public static function id(): string
    {
        return 'hommdemoplugin-hommdemoplugin-utility';
    }

    /**
     * Returns the path to the utility's SVG icon.
     *
     * @return string|null The path to the utility SVG icon
     */
    public static function iconPath()
    {
        return Craft::getAlias("@homm/hommdemoplugin/assetbundles/hommdemopluginutilityutility/dist/img/HommdemopluginUtility-icon.svg");
    }

    /**
     * Returns the number that should be shown in the utility’s nav item badge.
     *
     * If `0` is returned, no badge will be shown
     *
     * @return int
     */
    public static function badgeCount(): int
    {
        return 0;
    }

    /**
     * Returns the utility's content HTML.
     *
     * @return string
     */
    public static function contentHtml(): string
    {
        Craft::$app->getView()->registerAssetBundle(HommdemopluginUtilityUtilityAsset::class);

        $someVar = 'Ich bin eine Variabel. Yayyy!';
        return Craft::$app->getView()->renderTemplate(
            'hommdemoplugin/_components/utilities/HommdemopluginUtility_content',
            [
                'someVar' => $someVar
            ]
        );
    }
}
