<?php
/**
 * hommdemoplugin plugin for Craft CMS 3.x
 *
 * Plugin zu Demozwecken
 *
 * @link      http://www.homm.ch
 * @copyright Copyright (c) 2019 Domenik Hofer
 */

namespace homm\hommdemoplugin\variables;

use homm\hommdemoplugin\Hommdemoplugin;

use Craft;

/**
 * hommdemoplugin Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.hommdemoplugin }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    Domenik Hofer
 * @package   Hommdemoplugin
 * @since     0.0.1
 */
class HommdemopluginVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.hommdemoplugin.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.hommdemoplugin.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    public function testVariable()
    {
       return Hommdemoplugin::$plugin->hommdemopluginService->getTable();
    }

    public function tableData()
    {
        return Hommdemoplugin::$plugin->hommdemopluginService->getEntries();
    }

    public function getEntry($entryId)
    {
        return Hommdemoplugin::$plugin->hommdemopluginService->getEntry($entryId);
    }
}
