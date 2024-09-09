<?php

namespace GStatistics\Filter;

class Base
{
    protected array $arrFilter = [];

    protected function setFilter(Operators $operator, mixed $value, string $field): void
    {
        $this->arrFilter['operators'][] = [
            'operator' => $operator->value,
            'value' => $value,
            'field' => $field
        ];
    }

    /**
     * or
     * @return $this
     */
    public function or(): static
    {
        $this->setFilter(Operators::Or, '', '');
        return $this;
    }


    /**
     * and
     * @return $this
     */
    public function and(): static
    {
        $this->setFilter(Operators::And, '', '');
        return $this;
    }


    public function getFilter(): array
    {
        return $this->arrFilter;
    }

    public function build(): string
    {
        return json_encode($this->arrFilter);
    }
}