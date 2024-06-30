<?php

class BaseFilter
{
    protected array $arrFilter = [];

    protected function setFilter(string $operator, int $value,string $field)
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => $field
        ];
    }

}