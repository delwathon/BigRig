// Import Chart.js
import {
  Chart, LineController, LineElement, Filler, PointElement, LinearScale, TimeScale, Tooltip,
} from 'chart.js';
import 'chartjs-adapter-moment';

// Import utilities
import { tailwindConfig, formatValue } from '../utils';

Chart.register(LineController, LineElement, Filler, PointElement, LinearScale, TimeScale, Tooltip);

// A chart built with Chart.js 3
// https://www.chartjs.org/
const fintechCard14 = () => {

  const chartsContainer = document.getElementById('fintech-card-14');
  if (!chartsContainer) return;  

  fetch('/json-data-feed?datatype=27')
    .then(a => {
      return a.json();
    })
    .then(result => {

      const dataset1 = result.data.splice(0, 26);
      const dataset2 = result.data.splice(0, 26);
      const dataset3 = result.data.splice(0, 26);
      const dataset4 = result.data.splice(0, 26);
      const dataset5 = result.data;  

      const miniCharts = [
        // Twitter
        {
          selector: 'fintech-card-14-a',
          data: dataset1,
          growth: dataset1.at(-1) > dataset1.at(-2),
        },
        // Facebook
        {
          selector: 'fintech-card-14-b',
          data: dataset2,
          growth: dataset2.at(-1) > dataset2.at(-2),
        },
        // Google
        {
          selector: 'fintech-card-14-c',
          data: dataset3,
          growth: dataset3.at(-1) > dataset3.at(-2),
        },
        // Apple
        {
          selector: 'fintech-card-14-d',
          data: dataset4,
          growth: dataset4.at(-1) > dataset4.at(-2),
        },
        // Coinbase
        {
          selector: 'fintech-card-14-e',
          data: dataset5,
          growth: dataset5.at(-1) > dataset5.at(-2),
        },
      ];

      miniCharts.forEach((miniChart) => {
        const ctx = document.getElementById(miniChart.selector);
        if (!ctx) return;

        const darkMode = localStorage.getItem('dark-mode') === 'true';

        const tooltipBodyColor = {
          light: '#1F2937',
          dark: '#F3F4F6'
        };

        const tooltipBgColor = {
          light: '#ffffff',
          dark: '#374151'
        };

        const tooltipBorderColor = {
          light: '#E5E7EB',
          dark: '#4B5563'
        };         

        const chart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: result.labels,
            datasets: [
              // Line
              {
                data: miniChart.data,
                // eslint-disable-next-line max-len
                borderColor: miniChart.growth ? tailwindConfig().theme.colors.green[500] : tailwindConfig().theme.colors.rose[500],
                borderWidth: 2,
                pointRadius: 0,
                pointHoverRadius: 3,
                // eslint-disable-next-line max-len
                pointBackgroundColor: miniChart.growth ? tailwindConfig().theme.colors.green[500] : tailwindConfig().theme.colors.rose[500],
                pointHoverBackgroundColor: miniChart.growth ? tailwindConfig().theme.colors.green[500] : tailwindConfig().theme.colors.rose[500],
                pointBorderWidth: 0,
                pointHoverBorderWidth: 0,                   
                clip: 20,
                tension: 0.2,
              },
            ],
          },
          options: {
            scales: {
              y: {
                display: false,
                beginAtZero: true,
              },
              x: {
                type: 'time',
                time: {
                  parser: 'MM-DD-YYYY',
                  unit: 'month',
                },
                display: false,
              },
            },
            plugins: {
              tooltip: {
                callbacks: {
                  title: () => false, // Disable tooltip title
                  label: (context) => formatValue(context.parsed.y),
                },
                bodyColor: darkMode ? tooltipBodyColor.dark : tooltipBodyColor.light,
                backgroundColor: darkMode ? tooltipBgColor.dark : tooltipBgColor.light,
                borderColor: darkMode ? tooltipBorderColor.dark : tooltipBorderColor.light,                     
              },
              legend: {
                display: false,
              },
            },
            interaction: {
              intersect: false,
              mode: 'nearest',
            },
            maintainAspectRatio: false,
          },
        });

        document.addEventListener('darkMode', (e) => {
          const { mode } = e.detail;
          if (mode === 'on') {
            chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.dark;
            chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.dark;
            chart.options.plugins.tooltip.borderColor = tooltipBorderColor.dark;
          } else {
            chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.light;
            chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.light;
            chart.options.plugins.tooltip.borderColor = tooltipBorderColor.light;
          }
          chart.update('none');
        });        
      });  
    });
};

export default fintechCard14;
