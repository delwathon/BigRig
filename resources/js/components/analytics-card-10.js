// Import Chart.js
import {
  Chart, PolarAreaController, RadialLinearScale, Tooltip, Legend,
} from 'chart.js';
import 'chartjs-adapter-moment';

// Import utilities
import { tailwindConfig, hexToRGB } from '../utils';

Chart.register(PolarAreaController, RadialLinearScale, Tooltip, Legend);

// A chart built with Chart.js 3
// https://www.chartjs.org/
const analyticsCard10 = () => {
  const ctx = document.getElementById('analytics-card-10');
  if (!ctx) return;

  const darkMode = localStorage.getItem('dark-mode') === 'true';

  const gridColor = {
    light: '#F3F4F6',
    dark: `rgba(${hexToRGB('#374151')}, 0.6)`
  };

  const textColor = {
    light: '#9CA3AF',
    dark: '#6B7280'
  };

  const backdropColor = {
    light: '#ffffff',
    dark: '#1F2937'
  };

  const tooltipTitleColor = {
    light: '#1F2937',
    dark: '#F3F4F6'
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

  fetch('/json-data-feed?datatype=16')
    .then(a => {
      return a.json();
    })
    .then(result => {

      const chart = new Chart(ctx, {
        type: 'polarArea',
        data: {
          labels: result.labels,
          datasets: [
            {
              label: 'Sessions By Gender',
              data: result.data,
              backgroundColor: [
                `rgba(${hexToRGB(tailwindConfig().theme.colors.violet[500])}, 0.8)`,
                `rgba(${hexToRGB(tailwindConfig().theme.colors.sky[500])}, 0.8)`,
                `rgba(${hexToRGB(tailwindConfig().theme.colors.green[500])}, 0.8)`,
              ],
              hoverBackgroundColor: [
                `rgba(${hexToRGB(tailwindConfig().theme.colors.violet[600])}, 0.8)`,
                `rgba(${hexToRGB(tailwindConfig().theme.colors.sky[600])}, 0.8)`,
                `rgba(${hexToRGB(tailwindConfig().theme.colors.green[600])}, 0.8)`,
              ],
              borderWidth: 0,
            },
          ],
        },
        options: {
          layout: {
            padding: 24,
          },
          scales: {
            r: {
              grid: {
                color: darkMode ? gridColor.dark : gridColor.light,
              },
              ticks: {
                color: darkMode ? textColor.dark : textColor.light,
                backdropColor: darkMode ? backdropColor.dark : backdropColor.light,
              },
            },
          },            
          plugins: {
            legend: {
              display: false,
            },
            tooltip: {
              titleColor: darkMode ? tooltipTitleColor.dark : tooltipTitleColor.light,
              bodyColor: darkMode ? tooltipBodyColor.dark : tooltipBodyColor.light,
              backgroundColor: darkMode ? tooltipBgColor.dark : tooltipBgColor.light,
              borderColor: darkMode ? tooltipBorderColor.dark : tooltipBorderColor.light,
            },             
            htmlLegend: {
              // ID of the container to put the legend in
              containerID: 'analytics-card-10-legend',
            },
          },
          interaction: {
            intersect: false,
            mode: 'nearest',
          },
          animation: {
            duration: 200,
          },
          maintainAspectRatio: false,
        },
        plugins: [{
          id: 'htmlLegend',
          afterUpdate(c, args, options) {
            const legendContainer = document.getElementById(options.containerID);
            const ul = legendContainer.querySelector('ul');
            if (!ul) return;
            // Remove old legend items
            while (ul.firstChild) {
              ul.firstChild.remove();
            }
            // Reuse the built-in legendItems generator
            const items = c.options.plugins.legend.labels.generateLabels(c);
            items.forEach((item) => {
              const li = document.createElement('li');
              li.style.margin = tailwindConfig().theme.margin[1];
              // Button element
              const button = document.createElement('button');
              button.classList.add('btn-xs', 'bg-white', 'dark:bg-gray-700', 'text-gray-500', 'dark:text-gray-400', 'shadow-sm', 'shadow-black/[0.08]', 'rounded-full');
              button.style.opacity = item.hidden ? '.3' : '';
              button.onclick = () => {
                c.toggleDataVisibility(item.index, !item.index);
                c.update();
              };
              // Color box
              const box = document.createElement('span');
              box.style.display = 'block';
              box.style.width = tailwindConfig().theme.width[2];
              box.style.height = tailwindConfig().theme.height[2];
              box.style.backgroundColor = item.fillStyle;
              box.style.borderRadius = tailwindConfig().theme.borderRadius.sm;
              box.style.marginRight = tailwindConfig().theme.margin[1];
              box.style.pointerEvents = 'none';
              // Label
              const label = document.createElement('span');
              label.style.display = 'flex';
              label.style.alignItems = 'center';
              const labelText = document.createTextNode(item.text);
              label.appendChild(labelText);
              li.appendChild(button);
              button.appendChild(box);
              button.appendChild(label);
              ul.appendChild(li);
            });
          },
        }],
      });
      
      document.addEventListener('darkMode', (e) => {
        const { mode } = e.detail;
        if (mode === 'on') {
          chart.options.scales.r.grid.color = gridColor.dark;
          chart.options.scales.r.ticks.color = textColor.dark;
          chart.options.scales.r.ticks.backdropColor = backdropColor.dark;
          chart.options.plugins.tooltip.titleColor = tooltipTitleColor.dark;
          chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.dark;
          chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.dark;
          chart.options.plugins.tooltip.borderColor = tooltipBorderColor.dark;
        } else {
          chart.options.scales.r.grid.color = gridColor.light;
          chart.options.scales.r.ticks.color = textColor.light;
          chart.options.scales.r.ticks.backdropColor = backdropColor.light;
          chart.options.plugins.tooltip.titleColor = tooltipTitleColor.light;
          chart.options.plugins.tooltip.bodyColor = tooltipBodyColor.light;
          chart.options.plugins.tooltip.backgroundColor = tooltipBgColor.light;
          chart.options.plugins.tooltip.borderColor = tooltipBorderColor.light;
        }
        chart.update('none');
      });    
    });
};

export default analyticsCard10;
