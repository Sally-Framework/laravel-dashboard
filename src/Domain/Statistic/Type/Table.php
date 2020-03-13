<?php

namespace Sally\Dashboard\Domain\Statistic\Type;

class Table extends AbstractType
{
    /**
     * @var array
     */
    private $headers = [];

    /**
     * @var array
     */
    private $rows = [];

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function addRow(array $column): void
    {
        $this->rows[] = $column;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getRows(): array
    {
        return $this->rows;
    }
}
