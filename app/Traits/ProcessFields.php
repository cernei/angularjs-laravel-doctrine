<?php

namespace App\Traits;

trait ProcessFields
{
    protected function _getFilledItem($item, $fields)
    {
        if ($fields) {
            foreach ($fields as $field => $value) {
                $item->{'set' . ucfirst($field)}($value);
            }
        }
        return $item;
    }

    protected function _getItem($item, $fields)
    {
        $result = [];
        if ($fields) {
            foreach ($fields as $field) {
                $result[$field] = $item->{'get' . ucfirst($field)}();
            }
        }
        return $result;
    }

    protected function _getAllItems($items, $fields)
    {
        $result = [];
        if ($items) {
            foreach ($items as $item) {
                $result[] = $this->_getItem($item, $fields);
            }
        }
        return $result;
    }

}
