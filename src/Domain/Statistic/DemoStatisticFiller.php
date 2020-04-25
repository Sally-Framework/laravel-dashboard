<?php

namespace Sally\Dashboard\Domain\Statistic;

use Sally\Dashboard\Domain\Statistic\Type;

class DemoStatisticFiller extends AbstractStatisticFiller
{
    public function fill(): void
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
			    $this->getFilledQuantityDiagram(
				    $this->getFactory()->createDiagram()->pie($this->getRandomLoremIpsum()),
				    [
				        $this->getRandomLoremIpsum() => random_int(200, 1000),
				        $this->getRandomLoremIpsum() => random_int(200, 1000),
				        $this->getRandomLoremIpsum() => random_int(200, 1000),
                    ]
			    )
		    );
	    }

        $doughnutDiagramLimit = 3;
        for ($i = 0; $i < $doughnutDiagramLimit; $i++) {
            $this->addStatistic(
                $this->getFilledQuantityDiagram(
                    $this->getFactory()->createDiagram()->doughnut($this->getRandomLoremIpsum()),
                    [
                        $this->getRandomLoremIpsum() => random_int(200, 1000),
                        $this->getRandomLoremIpsum() => random_int(200, 1000),
                        $this->getRandomLoremIpsum() => random_int(200, 1000),
                    ]
                )
            );
        }

        $this->addStatistic(
            $this->getFilledQuantityGroupDiagram(
                $this->getFactory()->createDiagram()->line($this->getRandomLoremIpsum()),
                $this->getDatasetForGroupQuantityDiagram()
            )
        );

        $this->addStatistic(
            $this->getFilledQuantityDiagram(
                $this->getFactory()->createDiagram()->barHorizontal($this->getRandomLoremIpsum()),
                [
                    $this->getRandomLoremIpsum() => random_int(200, 1000),
                    $this->getRandomLoremIpsum() => random_int(200, 1000),
                    $this->getRandomLoremIpsum() => random_int(200, 1000),
                    $this->getRandomLoremIpsum() => random_int(200, 1000),
                    $this->getRandomLoremIpsum() => random_int(200, 1000),
                ]
            )
        );

        $this->addStatistic(
            $this->getFilledQuantityDiagram(
                $this->getFactory()->createDiagram()->barVertical($this->getRandomLoremIpsum()),
                [
                    $this->getRandomLoremIpsum() => random_int(200, 1000),
                    $this->getRandomLoremIpsum() => random_int(200, 1000),
                    $this->getRandomLoremIpsum() => random_int(200, 1000),
                    $this->getRandomLoremIpsum() => random_int(200, 1000),
                    $this->getRandomLoremIpsum() => random_int(200, 1000),
                ]
            )
        );

        $this->addStatistic(
            $this->getFilledQuantityGroupDiagram(
                $this->getFactory()->createDiagram()->barGrouped($this->getRandomLoremIpsum()),
                $this->getDatasetForGroupQuantityDiagram()
            )
        );
    }

    private function getFilledQuantityDiagram(Type\Diagram\AbstractQuantity $diagram, array $data): Type\Diagram\AbstractQuantity
    {
        $filledDiagram = clone $diagram;
        foreach ($data as $itemName => $itemValue) {
            $filledDiagram->addItem($itemName, $itemValue);
        }

        return $filledDiagram;
    }

    private function getFilledQuantityGroupDiagram(Type\Diagram\AbstractGroupQuantity $diagram, array $data): Type\Diagram\AbstractGroupQuantity
    {
        $filledDiagram = clone $diagram;
        foreach ($data as $indicator => $itemValues) {
            foreach ($itemValues as $itemName => $itemValue) {
                $filledDiagram->addItem($itemName, $itemValue, $indicator);
            }
        }

        return $filledDiagram;
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

    private function getDatasetForGroupQuantityDiagram(): array
    {
        $itemLabelsForLineDiagram = [
            $this->getRandomLoremIpsum(),
            $this->getRandomLoremIpsum(),
            $this->getRandomLoremIpsum()
        ];
        return [
            2015 => [
                $itemLabelsForLineDiagram[0] => random_int(200, 1000),
                $itemLabelsForLineDiagram[1] => random_int(200, 1000),
                $itemLabelsForLineDiagram[2] => random_int(200, 1000),
            ],
            2016 => [
                $itemLabelsForLineDiagram[0] => random_int(200, 1000),
                $itemLabelsForLineDiagram[1] => random_int(200, 1000),
                $itemLabelsForLineDiagram[2] => random_int(200, 1000),
            ],
            2017 => [
                $itemLabelsForLineDiagram[0] => random_int(200, 1000),
                $itemLabelsForLineDiagram[1] => random_int(200, 1000),
                $itemLabelsForLineDiagram[2] => random_int(200, 1000),
            ],
            2018 => [
                $itemLabelsForLineDiagram[0] => random_int(200, 1000),
                $itemLabelsForLineDiagram[1] => random_int(200, 1000),
                $itemLabelsForLineDiagram[2] => random_int(200, 1000),
            ],
            2019 => [
                $itemLabelsForLineDiagram[0] => random_int(200, 1000),
                $itemLabelsForLineDiagram[1] => random_int(200, 1000),
                $itemLabelsForLineDiagram[2] => random_int(200, 1000),
            ],
            2020 => [
                $itemLabelsForLineDiagram[0] => random_int(200, 1000),
                $itemLabelsForLineDiagram[1] => random_int(200, 1000),
                $itemLabelsForLineDiagram[2] => random_int(200, 1000),
            ]
        ];
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
