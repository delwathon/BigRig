// Import Chart.js
import {
  Chart, LineController, LineElement, Filler, PointElement, LinearScale, TimeScale, Tooltip,
} from 'chart.js';
import 'chartjs-adapter-moment';
import { chartAreaGradient } from '../app';

// Import utilities
import { tailwindConfig, formatValue, hexToRGB } from '../utils';

Chart.register(LineController, LineElement, Filler, PointElement, LinearScale, TimeScale, Tooltip);

// A chart built with Chart.js 3
// https://www.chartjs.org/
const fintechCard11 = () => {
  const ctx = document.getElementById('fintech-card-11');
  if (!ctx) return;

  const darkMode = localStorage.getItem('dark-mode') === 'true';

  const gridColor = {
    light: '#F3F4F6',
    dark: `rgba(${hexToRGB('#374151')}, 0.6)`
  };

  const tooltipBodyColor = {
    light: '#6B7280',
    dark: '#9CA3AF'
  };

  const tooltipBgColor = {
    light: '#ffffff',
    dark: '#374151'
  };

  const tooltipBorderColor = {
    light: '#E5E7EB',
    dark: '#4B5563'
  };    

  fetch('/json-data-feed?datatype=24')
    .then(a => {
      return a.json();
    })
    .then(result => { 

      const chart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: result.labels,
          datasets: [
            // Line
            {
              data: result.data,
              fill: true,
              backgroundColor: function(context) {
                const chart = context.chart;
                const {ctx, chartArea} = chart;
                return chartAreaGradient(ctx, chartArea, [
                  { stop: 0, color: `rgba(${hexToRGB(tailwindConfig().theme.colors.green[500])}, 0)` },
                  { stop: 1, color: `rgba(${hexToRGB(tailwindConfig().theme.colors.green[500])}, 0.2)` }
                ]);
              }, 
              borderColor: tailwindConfig().theme.colors.green[500],
              borderWidth: 2,
              pointRadius: 0,
              pointHoverRadius: 3,
              pointBackgroundColor: tailwindConfig().theme.colors.green[500],
              pointHoverBackgroundColor: tailwindConfig().theme.colors.green[500],
              pointBorderWidth: 0,
              pointHoverBorderWidth: 0,                 
              clip: 20,
              tension: 0.2,
            },
          ],
        },
        options: {
          layout: {
            padding: {
              top: 16,
              bottom: 16,
              left: 20,
              right: 20,
            },
          },
          scales: {
            y: {
              beginAtZero: true,
              border: {
                display: false,
              },
              grid: {
                drawTicks: false,
                color: darkMode ? gridColor.dark : gridColor.light,
              },
              ticks: {
                maxTicksLimit: 2,
                display: false,
              },
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
          chart.options.scales.y.grid.color = gridColor.dark;
          chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.dark;
          chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.dark;
          chart.options.plugins.tooltip.borderColor = tooltipBorderColor.dark;
        } else {
          chart.options.scales.y.grid.color = gridColor.light;
          chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.light;
          chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.light;
          chart.options.plugins.tooltip.borderColor = tooltipBorderColor.light;
        }
        chart.update('none');
      });      
    });
};
export default fintechCard11;
