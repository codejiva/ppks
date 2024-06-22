// ini buat animasi pas scroll
const pieCharts = document.querySelectorAll("[data-pie]");
const preferReducedMotion = window.matchMedia(
  "(prefers-reduced-motion: reduce)"
).matches;

const pieChartObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((chart) => {
      if (chart.isIntersecting) {
        let speed = +chart.target.dataset.speed || 0;
        preferReducedMotion && (speed = 0);
        const delay = +chart.target.dataset.delay || 0;
        const percent = +chart.target.dataset.percent || 0;
        const circle = chart.target.querySelector("circle");
        const text = chart.target.querySelector("text");
        text.textContent = `${percent}%`;
        chart.target.setAttribute("aria-label", `${percent} percent pie chart`);
        circle.animate(
          [
            {
              strokeDashoffset: 100,
            },
            {
              strokeDashoffset: 100 - percent,
            },
          ],
          {
            duration: speed,
            easing: "cubic-bezier(0.57,-0.04, 0.41, 1.13)",
            fill: "forwards",
          }
        );
        text.animate(
          [
            {
              opacity: 0,
              transform: "translateY(20%)",
            },
            {
              opacity: 1,
              transform: "translateY(0%)",
            },
          ],
          {
            delay: preferReducedMotion ? 0 : delay,
            duration: preferReducedMotion ? 0 : 300,
            easing: "cubic-bezier(0.57,-0.04, 0.41, 1.13)",
            fill: "forwards",
          }
        );
        pieChartObserver.unobserve(chart.target);
      }
    });
  },
  {
    threshold: 0.8,
  }
);

pieCharts.forEach((chart) => {
  pieChartObserver.observe(chart);
});