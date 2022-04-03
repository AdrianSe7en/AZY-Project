const labels2 = [
  '',
  '',
  '',
  '',
  '',
  '',
];

const data2 = {
  labels: labels2,
  datasets: [{
    label: 'Repeat incidents',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: [0, 10, 5, 2, 20, 30, 45],
  }]
};

const config2 = {
  type: 'line',
  data: data2,
  options: {}
};

const myChart2 = new Chart(
  document.querySelector('.myChart2'),
  config2
);