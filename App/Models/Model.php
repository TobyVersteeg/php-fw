<?php

namespace App\Models;

use App\Libraries\MySql;
use PDO;

class Model
{
    // Name of the model (table)
    private static $model;

    // Max. records when fetching all records
    private static $limit;

    private static $protectedFields;

    /**
     * Constructor
     * Set $model and $limit from child Model
     */
    public function __construct($model, $limit = null, $protectedFields = null)
    {
        self::$model = pluralize(4, $model);
        self::$limit = $limit;
        self::$protectedFields = $protectedFields;
    }
    
    /**
     * Fetching all records from table
     * @return array of objects
     */
    public static function all(array $selectedFields = null)
    {
        $fields = "*";
        
        if (!empty($selectedFields) && count($selectedFields) > 0) {
            $fields = self::composeQuery($selectedFields);
        }

        $sql = "SELECT " . $fields . " FROM " . self::$model . " WHERE deleted IS NULL" . (!empty(self::$limit) ? " LIMIT " . self::$limit : "");

        return MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Fetching one record based on the id
     * @return object
     */
    public static function get(int $id, array $selectedFields = null)
    {
        if ($id === 0) return null;

        $fields = "*";

        if (is_array($selectedFields) && count($selectedFields) > 0) {
            $fields = self::composeQuery($selectedFields);
        }

        $sql = "SELECT " . $fields .  " FROM " . self::$model . " WHERE id=" . $id . " AND deleted IS NULL";
        $res = MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);

        return count($res) > 0 ? $res[0] : null;
    }

    /**
     * Saves a record to the model
     * @param $data array
     * @return the ID of the new record
     */
    public static function store(array $data)
    {
        return MySql::insert(self::removeIllegalFields($data), self::$model);
    }

    /**
     * Updates a record to the model
     * @param $data array
     */
    public static function update(array $data, int $id)
    {
        if ($id === 0) return;

        MySql::update(self::removeIllegalFields($data), self::$model, $id);
    }

    /**
     * Archives a record to the model
     * @param $data array
     */
    public static function destroy(int $id)
    {
        Mysql::delete($id, self::$model);
    }

    private static function removeIllegalFields(array $data)
    {
        foreach (@$data as $key => $val) {
            if (in_array($key, self::$protectedFields)) {
                unset($data[$key]);
            }
        }

        return $data;
    }

    private static function composeQuery(array $fields)
    {
        $getFields = '';

        foreach ($fields as $field)
        {
            $getFields .= $field . ',';
        }

        return rtrim($getFields, ',');
    }

}