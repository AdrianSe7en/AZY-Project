const labels3 = [
  '',
  '',
  '',
  '',
  '',
  '',
];

const data3 = {
  labels: labels3,
  datasets: [{
    label: 'Costs',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: [0, 10, 5, 2, 20, 30, 45],
  }]
};

const config3 = {
  type: 'line',
  data: data3,
  options: {},
  backgroundColor: '#000'
};

const myChart3 = new Chart(
  document.querySelector('.myChart3'),
  config3
);