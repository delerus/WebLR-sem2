<?php

namespace App\Core;

use Illuminate\Support\Facades\DB;

class BaseActiveRecord
{
    protected $table;
    protected $attributes = [];
    protected $primaryKey = 'id';

    // Метод для сохранения или обновления записи
    public function save()
    {
        if (isset($this->attributes[$this->primaryKey])) {
            // Запись уже существует, выполняем обновление
            return $this->update();
        } else {
            // Создаем новую запись
            return $this->insert();
        }
    }

    // Метод для удаления записи
    public function delete()
    {
        if (!isset($this->attributes[$this->primaryKey])) {
            return false;
        }

        return DB::table($this->table)
            ->where($this->primaryKey, $this->attributes[$this->primaryKey])
            ->delete();
    }

    // Метод для поиска записи по ID
    public static function find($id)
    {
        $instance = new static();
        $result = DB::table($instance->table)
            ->where($instance->primaryKey, $id)
            ->first();

        if ($result) {
            $instance->attributes = (array) $result;
            return $instance;
        }

        return null;
    }

    // Метод для получения всех записей
    public static function findAll()
    {
        $instance = new static();
        $results = DB::table($instance->table)->get();
        $instances = [];

        foreach ($results as $result) {
            $instance = new static();
            $instance->attributes = (array) $result;
            $instances[] = $instance;
        }

        return $instances;
    }

    // Вставка новой записи
    protected function insert()
    {
        $this->attributes[$this->primaryKey] = DB::table($this->table)->insertGetId($this->attributes);
        return $this;
    }

    // Обновление существующей записи
    protected function update()
    {
        DB::table($this->table)
            ->where($this->primaryKey, $this->attributes[$this->primaryKey])
            ->update($this->attributes);

        return $this;
    }

    // Метод для получения значений атрибутов
    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }

    // Метод для установки значений атрибутов
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }
}
