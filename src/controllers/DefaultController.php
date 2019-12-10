<?php
/**
 * hommdemoplugin plugin for Craft CMS 3.x
 *
 * Plugin zu Demozwecken
 *
 * @link      http://www.homm.ch
 * @copyright Copyright (c) 2019 Domenik Hofer
 */

namespace homm\hommdemoplugin\controllers;

use homm\hommdemoplugin\Hommdemoplugin;

use Craft;
use craft\web\Controller;

/**
 * Default Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Domenik Hofer
 * @package   Hommdemoplugin
 * @since     0.0.1
 */
class DefaultController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'do-something', 'delete-entry', 'create-entry'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/hommdemoplugin/default
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'Welcome to the DefaultController actionIndex() method';

        return $result;
    }

    /**
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/hommdemoplugin/default/do-something
     *
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'Welcome to the DefaultController actionDoSomething() method';

        return $result;
    }

    public function actionDeleteEntry()
    {
        $entryId = $_GET['entryId'];
        Hommdemoplugin::$plugin->hommdemopluginService->deleteEntry($entryId);
        return $this->redirect(Craft::$app->getRequest()->referrer);
    }

    public function actionCreateEntry()
    {
        $name = $_POST['name'];

        if($_POST['edit'] != ''){
         Hommdemoplugin::$plugin->hommdemopluginService->updateEntry($_POST['edit'], $name);
        }else{
           Hommdemoplugin::$plugin->hommdemopluginService->createEntry($name);
        }

        return $this->redirect('/admin/hommdemoplugin');
    }
}
