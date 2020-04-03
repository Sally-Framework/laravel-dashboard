<?php

namespace Sally\Dashboard\Domain\Statistic;

use Sally\Dashboard\Domain\Statistic\Type;

class DemoStatisticFiller extends AbstractStatisticFiller
{
    protected function fill(): void
    {
        // Генерация текстовых карточек
        $textCardsLimit = 3;
        for ($i = 0; $i < $textCardsLimit; $i++) {
            $this->addStatistic(
                $this->getFactory()->createCommon()->text($this->getRandomLoremIpsum(), random_int(0, 1000))
            );
        }

        // Генерация таблиц
        $smallTableRowsLimit = random_int(5, 15);
        $smallTable = $this->getFilledTableWithRandomDataByRowsCount(
	        $this->getFactory()->createCommon()->table($this->getRandomLoremIpsum()),
            $smallTableRowsLimit
        );
        $this->addStatistic($smallTable);

        $bigTableRowsLimit = random_int(100, 200);
        $bigTable = $this->getFilledTableWithRandomDataByRowsCount(
            $this->getFactory()->createCommon()->table($this->getRandomLoremIpsum()),
            $bigTableRowsLimit
        );
        $this->addStatistic($bigTable);

        // Генерация графика пирога
	    $pieDiagramLimit = 3;
	    for ($i = 0; $i < $pieDiagramLimit; $i++) {
		    $this->addStatistic(
			    $this->getFilledQuantityDiagramByValuesRange(
				    $this->getFactory()->createDiagram()->pie($this->getRandomLoremIpsum()),
				    2,
				    5
			    )
		    );
	    }

        $doughnutDiagramLimit = 3;
        for ($i = 0; $i < $doughnutDiagramLimit; $i++) {
            $this->addStatistic(
                $this->getFilledQuantityDiagramByValuesRange(
                    $this->getFactory()->createDiagram()->doughnut($this->getRandomLoremIpsum()),
                    2,
                    5
                )
            );
        }
    }

    private function getFilledQuantityDiagramByValuesRange(Type\Diagram\AbstractQuantity $diagram, int $start, int $stop): Type\Diagram\AbstractQuantity
    {
        $maxValues = random_int($start, $stop);
        for ($i = 0; $i < $maxValues; $i++) {
            $diagram->addItem($this->getRandomLoremIpsum(), random_int(200, 1000));
        }

        return $diagram;
    }

    private function getFilledTableWithRandomDataByRowsCount(Type\Common\Table $table, int $rowsCount): Type\Common\Table
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
