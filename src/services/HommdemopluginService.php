<?php
/**
 * hommdemoplugin plugin for Craft CMS 3.x
 *
 * Plugin zu Demozwecken
 *
 * @link      http://www.homm.ch
 * @copyright Copyright (c) 2019 Domenik Hofer
 */

namespace homm\hommdemoplugin\services;

use craft\db\Query;
use homm\hommdemoplugin\Hommdemoplugin;

use Craft;
use craft\base\Component;
use yii\db\Exception;

/**
 * HommdemopluginService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Domenik Hofer
 * @package   Hommdemoplugin
 * @since     0.0.1
 */
class HommdemopluginService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     Hommdemoplugin::$plugin->hommdemopluginService->exampleService()
     *
     * @return mixed
     */



    public function getTable()
    {
        $tableName = Hommdemoplugin::$plugin->getSettings()->tableName;

        return $tableName;
    }

    public function getEntry($entryId)
    {

        $table = $this->getTable();

        $result = (new Query())
            ->select(['*'])
            ->from([$table])
            ->where(['id' => $entryId])
            ->one();

        return $result;
    }

    public function getEntries($limit = 100)
    {

        $table = $this->getTable();

        $results = (new Query())
            ->select(['*'])
            ->from([$table])
            ->limit($limit)
            ->all();

        return $results;
    }

    public function deleteEntry($entryId)
    {
        $table = $this->getTable();
        try {
            \Craft::$app->db->createCommand()
                ->delete($table, ['id' => $entryId])
                ->execute();

            return 'success';
        } catch (Exception $e) {
            return json_encode($e);
        }
    }

    public function createEntry($name)
    {
        $table = $this->getTable();
        try {
            \Craft::$app->db->createCommand()
                ->insert($table, ['name' => $name], false)
                ->execute();

            return 'Create success';
        } catch (Exception $e) {
            return json_encode($e);
        }
    }

    public function updateEntry($id, $name)
    {
        $table = $this->getTable();
        try {
            \Craft::$app->db->createCommand()
                ->update($table, ['name' => $name],'id = :id', [':id' => $id], false)
                ->execute();

            return 'Update success';
        } catch (Exception $e) {
            return json_encode($e);
        }
    }

}
