document.addEventListener("DOMContentLoaded", function() {
    const serverNames = ["Low-Tier", "Mid-Range", "The Beast", "Backup Node", "Proxy"];
    const serverLoad = [45, 78, 12, 35, 50];

    const accentColor = getComputedStyle(document.documentElement).getPropertyValue('--accent').trim() || "#00d2ff";

    const ctx = document.getElementById("myChart");

    if (ctx) {
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: serverNames,
                datasets: [{
                    label: "Server Load (%)",
                    data: serverLoad,
                    backgroundColor: [
                        accentColor, 
                        accentColor, 
                        "#ff4d4d", // Beast może mieć inny kolor dla wyróżnienia
                        accentColor, 
                        accentColor
                    ],
                    borderColor: "rgba(255, 255, 255, 0.2)",
                    borderWidth: 1,
                    borderRadius: 5 // Zaokrąglone rogi słupków (wygląda nowocześniej)
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false // Ukrywamy legendę, bo mamy label pod słupkami
                    },
                    tooltip: {
                        backgroundColor: "rgba(0, 0, 0, 0.8)",
                        titleFont: { family: 'Orbitron' },
                        bodyFont: { family: 'Orbitron' }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        grid: {
                            color: "rgba(255, 255, 255, 0.05)"
                        },
                        ticks: {
                            color: "#888",
                            font: { size: 10 },
                            callback: function(value) { return value + "%"; }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: "#fff",
                            font: { 
                                family: 'Orbitron',
                                size: 10 
                            }
                        }
                    }
                }
            }
        });
    }
});