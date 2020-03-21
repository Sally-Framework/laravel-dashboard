<?php

namespace Sally\Dashboard\Domain\Statistic;

use Sally\Dashboard\Domain\Statistic\Interfaces\CompositeInterface;
use Sally\Dashboard\Domain\Statistic\Interfaces\Type\FactoryInterface;
use Sally\Dashboard\Domain\Statistic\Type\DiagramPie;
use Sally\Dashboard\Domain\Statistic\Type\Table;

class DemoStatisticFiller extends AbstractStatisticFiller
{
    protected function fill(CompositeInterface $statistic, FactoryInterface $factory): void {
        // Генерация текстовых карточек
        $textCardsLimit = 3;
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

        // Генерация графика пирога
	    $pieDiagramLimit = 3;
	    for ($i = 0; $i < $pieDiagramLimit; $i++) {
		    $statistic->add(
			    $this->getFilledPieDiagramByValuesRange(
				    $factory->diagramPie($this->getRandomLoremIpsum()),
				    2,
				    5
			    )
		    );
	    }
    }

    private function getFilledPieDiagramByValuesRange(DiagramPie $diagram, int $start, int $stop): DiagramPie
    {
	    $maxValues = random_int($start, $stop);
	    for ($i = 0; $i < $maxValues; $i++) {
		    $diagram->addItem($this->getRandomLoremIpsum(), random_int(200, 1000));
	    }

        return $diagram;
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
