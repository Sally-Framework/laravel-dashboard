var colors = {};

function getUniqColorForDiagram(diagramId) {
    possibleCollors = [
        'rgba(136,108,230, 0.8)',
        'rgba(0,170,255, 0.8)',
        'rgba(255,99,132, 0.8)',
        'rgba(125,200,85, 0.8)',
        'rgba(244,144,128, 0.8)',
        'rgba(42,111,202, 0.8)',
        'rgba(54,162,235, 0.8)',
        'rgba(63,81,181, 0.8)',
        'rgba(143,92,175, 0.8)',
    ];

    for (var i = 0; i < possibleCollors.length; i++) {
        if (!(diagramId in colors)) colors[diagramId] = [];
        if (colors[diagramId].indexOf(possibleCollors[i]) != -1) continue;
        colors[diagramId].push(possibleCollors[i]);
        return possibleCollors[i];
    }

    return generateRandomColor();
}

function getSortedDataForGroupQuantityDiagram(data) {
    var sortedData = {};
    Object.keys(data).forEach(function(indicator) {
        let items = data[indicator];
        Object.keys(items).forEach(function(itemName) {
            let value = items[itemName];
            if (!(itemName in sortedData)) sortedData[itemName] = [];
            sortedData[itemName].push(value);
        });
    });

    return sortedData;
}

function getSortedDataForQuantityDiagram(data) {

}

function generateRandomColor() {
    return '#'+Math.floor(Math.random()*16777215).toString(16);
}
