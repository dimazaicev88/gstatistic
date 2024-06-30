<?php

class BaseFilter
{
    protected array $arrFilter = [];

    protected function setFilter(string $operator, mixed $value,string $field): void
    {
        $this->arrFilter[] = [
            'operator' => $operator,
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
        $this->setFilter('or', '', '');
        return $this;
    }


    /**
     * and
     * @return $this
     */
    public function and(): static
    {
        $this->setFilter('and', '', '');
        return $this;
    }

    public function build(): string
    {
        return json_encode($this->arrFilter);
    }
}