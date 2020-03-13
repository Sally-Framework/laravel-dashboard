<?php

namespace Sally\Dashboard\Domain\Statistic;

use Sally\Dashboard\Domain\Statistic\Type\Table;

class DemoHandler extends AbstractHandler
{
    protected function handle(Composite $statistic, Type\Factory $factory): void {
        // Генерация текстовых карточек
        $textCardsLimit = random_int(3, 6);
        for ($i = 0; $i < $textCardsLimit; $i++) {
            $statistic->add(
                $factory->text($this->getRandomLoremIpsum(), random_int(0, 1000))
            );
        }

        // Генерация таблиц
        $smallTableRowsLimit = random_int(5, 15);
        $smallTable = $this->getFilledTableWithRandomDataByRowsCount(
            $factory->table($this->getRandomLoremIpsum()),
            $smallTableRowsLimit
        );
        $statistic->add($smallTable);

        $bigTableRowsLimit = random_int(100, 200);
        $bigTable = $this->getFilledTableWithRandomDataByRowsCount(
            $factory->table($this->getRandomLoremIpsum()),
            $bigTableRowsLimit
        );
        $statistic->add($bigTable);
    }

    private function getFilledTableWithRandomDataByRowsCount(Table $table, int $rowsCount): Table
    {
        $table->setHeaders([
            '#',
            $this->getRandomLoremIpsum(),
            $this->getRandomLoremIpsum(),
            $this->getRandomLoremIpsum(),
            $this->getRandomLoremIpsum(),
        ]);

        for ($i = 0; $i < $rowsCount; $i++) {
            $table->addRow([
                $i,
                $this->getRandomLoremIpsum(),
                $this->getRandomLoremIpsum(),
                $this->getRandomLoremIpsum(),
                $this->getRandomLoremIpsum(),
            ]);
        }

        return $table;
    }

    private function getRandomLoremIpsum(): string
    {
        $names = [
            'Lorem ipsum dolor',
            'Donec sodales sagittis',
            'Aliquam lorem ante',
            'Quisque rutrum',
            'Aenean imperdiet',
            'Etiam rhoncus',
            'Maecenas tempus, tellus condimentum',
            'Etiam sit amet orci eget',
        ];

        return $this->getRandomValueFromArray($names);
    }

    /**
     * @param array $array
     * @return mixed
     */
    private function getRandomValueFromArray(array $array)
    {
        $result = $array;
        shuffle($result);
        return $result[0];
    }
}
