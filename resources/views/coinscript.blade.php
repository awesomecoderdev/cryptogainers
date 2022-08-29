format = function date2str(x, y) { var z = {
M: x.getMonth() + 1,
d: x.getDate(),
h: x.getHours(),
m: x.getMinutes(),
s: x.getSeconds()
};
y = y.replace(/(M+|d+|h+|m+|s+)/g, function(v) {
return ((v.length > 1 ? "0" : "") + z[v.slice(-1)]).slice(-2)
});

return y.replace(/(y+)/g, function(v) {
return x.getFullYear().toString().slice(-v.length)
});
}
var chartData = [];
fetch(
"https://api.coingecko.com/api/v3/coins/{{ $coin->slug }}/market_chart/range?vs_currency=usd&from={{ strtotime('1 jan 2018') }}&to={{ time() }}"
)
// fetch('https://api.coingecko.com/api/v3/coins/bitcoin/market_chart?vs_currency=usd&days=90&interval=daily')
.then(response => response.json())
.then(data => {
// data.prices.slice(0, 1000).map(function(item, index) {
data.prices.map(function(item, index) {
var date = new Date(item[0]);
chartData[index] = {
time: format(date, 'yyyy-MM-dd'),
value: item[1].toFixed(20),
};
});

console.log(chartData);


var container = document.getElementById("coinChart");
var chart = LightweightCharts.createChart(container, {
rightPriceScale: {
scaleMargins: {
top: 0.2,
bottom: 0.2,
},
borderVisible: false,
},
timeScale: {
borderVisible: false,
},
layout: {
backgroundColor: 'rgba(0,0,0,0)',
textColor: '#333',
},
grid: {
horzLines: {
color: '#eee',
},
vertLines: {
color: 'rgba(0,0,0,0)',
},
},
});

var series = chart.addAreaSeries({
topColor: 'rgba(14, 165, 233,0.56)',
bottomColor: 'rgba(240, 249, 255,0.04)',
lineColor: 'rgba(56, 189, 248,1)',
lineWidth: 2,
});

series.setData(chartData);

function businessDayToString(businessDay) {
return businessDay.year + '-' + businessDay.month + '-' + businessDay.day;
}

var toolTipWidth = 100;
var toolTipHeight = 80;
var toolTipMargin = 15;

var toolTip = document.createElement('div');
toolTip.className = 'floating-tooltip-2';
container.appendChild(toolTip);

// update tooltip
chart.subscribeCrosshairMove(function(param) {
var width = 600;
var height = 300;
if (!param.time || param.point.x < 0 || param.point.x> width || param.point.y < 0 || param .point.y> height) {
        toolTip.style.display = 'none';
        return;
        }

        var dateStr = LightweightCharts.isBusinessDay(param.time) ?
        businessDayToString(param.time) :
        new Date(param.time * 1000).toLocaleDateString();

        toolTip.style.display = 'block';
        var price = param.seriesPrices.get(series);
        toolTip.innerHTML = '<div style="color: rgba(255, 70, 70, 1)">Apple Inc.</div>' +
        '<div style="font-size: 24px; margin: 4px 0px">' + Math.round(price * 100) / 100 +
            '</div>' +
        '<div>' + dateStr + '</div>';

        var y = param.point.y;

        var left = param.point.x + toolTipMargin;
        if (left > width - toolTipWidth) {
        left = param.point.x - toolTipMargin - toolTipWidth;
        }

        var top = y + toolTipMargin;
        if (top > height - toolTipHeight) {
        top = y - toolTipHeight - toolTipMargin;
        }

        toolTip.style.left = left + 'px';
        toolTip.style.top = top + 'px';
        });
        });
