{{-- index file --}}
@extends('template.single.coins')

{{-- title --}}
@section('title', "$coin->title : CryptoGainers News")

{{-- meta data --}}
@section('meta')
    <meta name="description"
        content="Leading news source for cryptocurrency, Bitcoin, Ethereum, Blockchain, DeFi, and more. Read the latest analysis and guides by CryptoGainers." />
    <meta property="og:title" content="Home" />
    <meta property="og:description"
        content="Leading news source for cryptocurrency, Bitcoin, Ethereum, Blockchain, DeFi, and more. Read the latest analysis and guides by CryptoGainers." />
    <meta property="og:url" content="https://watcher.guru/news/" />
    <meta property="og:site_name" content="CryptoGainers" />
    <meta property="article:modified_time" content="2021-10-10T15:31:51+00:00" />
    <meta property="og:image" content="https://watcher.guru/news/wp-content/uploads/2021/08/keyart.jpg" />
    <meta property="og:image:width" content="1920" />
    <meta property="og:image:height" content="1005" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="https://watcher.guru/news/wp-content/uploads/2021/08/keyart.jpg" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="1 minute" />
@endsection

{{-- content --}}
@section('content')
    <article id="news-{{ $coin->id }}"
        class="bg-white  border border-primary-100 dark:border-primary-300/10 rounded-md dark:bg-gray-800 ">
        <div class="lg:px-4 md:px-4 px-0 lg:py-4 md:py-4 mx-auto">
            <h1 class="lg:mb-5 lg:text-4xl md:text-3xl text-2xl font-bold text-gray-800 dark:text-gray-100">
                {{ $coin->title }}</h1>

            {!! $coin->content !!}
        </div>
    </article>
    <script src="https://unpkg.com/lightweight-charts@3.8.0/dist/lightweight-charts.standalone.production.js"></script>
    <div id="coinChart" class="h-screen w-full"></div>


    <style>
        .floating-tooltip-2 {
            width: 96px;
            height: 80px;
            position: absolute;
            display: none;
            padding: 8px;
            box-sizing: border-box;
            font-size: 12px;
            color: #131722;
            background-color: rgba(255, 255, 255, 1);
            text-align: left;
            z-index: 1000;
            top: 12px;
            left: 12px;
            pointer-events: none;
            border: 1px solid rgba(0, 150, 136, 1);
            border-radius: 2px;
        }

    </style>
    <script>
        format = function date2str(x, y) {
            var z = {
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
        fetch('https://api.coingecko.com/api/v3/coins/bitcoin/market_chart?vs_currency=usd&days=max')
            .then(response => response.json())
            .then(data => {
                // chartData = data.prices;
                // console.log(data);
                // console.log(chartData);
                data.prices.map(function(item, index) {
                    var date = new Date(item[0]);
                    chartData[index] = {
                        time: format(date, 'yyyy-MM-dd'),
                        // time: date,
                        value: item[1],
                    };
                });


                var container = document.getElementById("coinChart");

                // var chart = LightweightCharts.createChart(container, {
                //     rightPriceScale: {
                //         scaleMargins: {
                //             top: 0.2,
                //             bottom: 0.2,
                //         },
                //         borderVisible: false,
                //     },
                //     timeScale: {
                //         borderVisible: false,
                //     },
                //     layout: {
                //         backgroundColor: '#ffffff',
                //         textColor: '#333',
                //     },
                //     grid: {
                //         horzLines: {
                //             color: '#eee',
                //         },
                //         vertLines: {
                //             color: '#ffffff',
                //         },
                //     },
                //     crosshair: {
                //         vertLine: {
                //             labelVisible: false,
                //         },
                //     },
                // });

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
                        backgroundColor: '#ffffff',
                        textColor: '#333',
                    },
                    grid: {
                        horzLines: {
                            color: '#eee',
                        },
                        vertLines: {
                            color: '#ffffff',
                        },
                    },
                });

                var series = chart.addAreaSeries({
                    topColor: 'rgb(14, 165, 233)',
                    bottomColor: 'rgba(240, 249, 255,0.5)',
                    lineColor: 'rgb(56, 189, 248)',
                    lineWidth: 1,
                });

                series.setData(chartData);

                function businessDayToString(businessDay) {
                    return businessDay.year + '-' + businessDay.month + '-' + businessDay.day;
                }

                var toolTipWidth = 80;
                var toolTipHeight = 80;
                var toolTipMargin = 15;

                var toolTip = document.createElement('div');
                toolTip.className = 'floating-tooltip-2';
                container.appendChild(toolTip);

                // update tooltip
                chart.subscribeCrosshairMove(function(param) {
                    if (!param.time || param.point.x < 0 || param.point.x > width || param.point.y < 0 || param
                        .point.y > height) {
                        toolTip.style.display = 'none';
                        return;
                    }

                    var dateStr = LightweightCharts.isBusinessDay(param.time) ?
                        businessDayToString(param.time) :
                        new Date(param.time * 1000).toLocaleDateString();

                    toolTip.style.display = 'block';
                    var price = param.seriesPrices.get(areaSeries);
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
    </script>
@endsection


{{-- sidebar --}}
@section('sidebar')
    <div id="trending"
        class="bg-white dark:bg-slate-800 relative w-full lg:px-5 px-3 rounded border border-primary-100 dark:border-slate-900/10 ">
        <div class="relative mt-4">
            <span
                class=" text-gray-500 dark:text-gray-300 font-bold text-sm px-3 py-1 border rounded-xl border-primary-200/70 dark:border-slate-600 bg-primary-50 dark:bg-slate-900/10 ">Tranding</span>

            <span
                class=" text-gray-500 dark:text-gray-300 font-bold text-sm px-3 py-1 border rounded-xl border-primary-200/70 dark:border-slate-600 bg-primary-50 dark:bg-slate-900/10 ">This
                Week</span>

        </div>
    </div>
@endsection
