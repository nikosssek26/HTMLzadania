document.addEventListener("DOMContentLoaded", function() {
    
    function updateStats() {
        const statsElement = document.querySelector('div[name="playerstats"]');
        const statsElement2 = document.querySelector('div[name="playerstats2"]');
        const statsElement3 = document.querySelector('div[name="playerstats3"]');
        const statsElement4 = document.querySelector('div[name="playerstats4"]');

        if (statsElement) {
            const newValue = Math.floor(Math.random() * 100000);
            
            // 2. Animacja zniknięcia
            statsElement.style.transition = "opacity 0.4s ease";
            statsElement.style.opacity = 0;

            setTimeout(() => {
                statsElement.textContent = newValue.toLocaleString(); 
                statsElement.style.opacity = 1;
                
                addLogEntry(newValue);
            }, 450);
        }
        if (statsElement2) {
            const nextTick = Math.floor(Math.random() * (121+ 1)) + 8;
            
            statsElement2.style.transition = "opacity 0.4s ease";
            statsElement2.style.opacity = 0;

            setTimeout(() => {
                statsElement2.textContent = nextTick.toLocaleString(); 
                statsElement2.style.opacity = 1;
                var elem = document.getElementById("RAMusagebar");
                if (elem) {
                    elem.value = nextTick;
                }
            }, 450);
        }
        if (statsElement3) {
            const newValue = Math.floor(Math.random() * 101);
            
            statsElement3.style.transition = "opacity 0.4s ease";
            statsElement3.style.opacity = 0;
        
            setTimeout(() => {
                statsElement3.textContent = newValue.toLocaleString(); 
                statsElement3.style.opacity = 1;

                var elem = document.getElementById("CPUusagebar");
                if (elem) {
                    elem.value = newValue;
                }
            }, 500);
            if (newValue > 70) {
                addLogEntry2(newValue);
            }
        }
        if (statsElement4) {
            const newValue = Math.floor(Math.random() * 101);
            
            statsElement4.style.transition = "opacity 0.4s ease";
            statsElement4.style.opacity = 0;

            setTimeout(() => {
                statsElement4.textContent = newValue.toLocaleString(); 
                statsElement4.style.opacity = 1;
                            var elem = document.getElementById("GPUusagebar");
                if (elem) {
                    elem.value = newValue;
                }
            }, 550);
            if (newValue > 70) {
                addLogEntry3(newValue);
            }
        }

        const nextTick = Math.floor(Math.random() * (10000 - 5000 + 1)) + 5000;
        setTimeout(updateStats, nextTick);
    }

    function addLogEntry(value) {
        const tableBody = document.querySelector('.custom-table tbody');
        if (tableBody) {
            const now = new Date();
            const time = now.getHours() + ":" + String(now.getMinutes()).padStart(2, '0') + ":" + String(now.getSeconds()).padStart(2, '0');
            
            const row = `<tr>
                <td>#SYNC</td>
                <td>SYSTEM</td>
                <td>Aktualizacja Użytkownikow: ${value}</td>
                <td><span class="status-badge">LIVE</span></td>
                <td>${time}</td>
            </tr>`;
            
            tableBody.insertAdjacentHTML('afterbegin', row);
            
            if (tableBody.children.length > 8) {
                tableBody.lastElementChild.remove();
            }
        }
    }
    function addLogEntry2(value) {
        const tableBody = document.querySelector('.custom-table tbody');
        if (tableBody) {
            const now = new Date();
            const time = now.getHours() + ":" + String(now.getMinutes()).padStart(2, '0') + ":" + String(now.getSeconds()).padStart(2, '0');
            
            const row = `<tr>
                <td>#SYNC</td>
                <td>SYSTEM</td>
                <td style="color: #ff4d4d;">Wysokie Zużycie CPU: ${value}</td>
                <td><span class="status-badge">NOW</span></td>
                <td>${time}</td>
            </tr>`;
            
            tableBody.insertAdjacentHTML('afterbegin', row);
            
            if (tableBody.children.length > 8) {
                tableBody.lastElementChild.remove();
            }
        }
    }
    function addLogEntry3(value) {
        const tableBody = document.querySelector('.custom-table tbody');
        if (tableBody) {
            const now = new Date();
            const time = now.getHours() + ":" + String(now.getMinutes()).padStart(2, '0') + ":" + String(now.getSeconds()).padStart(2, '0');
            
            const row = `<tr>
                <td>#SYNC</td>
                <td>SYSTEM</td>
                <td style="color: #ff4d4d;">Wysokie Zużycie GPU: ${value}</td>
                <td><span class="status-badge">NOW</span></td>
                <td>${time}</td>
            </tr>`;
            
            tableBody.insertAdjacentHTML('afterbegin', row);
            
            if (tableBody.children.length > 8) {
                tableBody.lastElementChild.remove();
            }
        }
    }

    updateStats();
});

function showContent(contentId, element) {
    const sections = ['main-content', 'main-content-stats', 'main-content-users', 'main-content-settings', 'main-content-buy'];
    sections.forEach(id => {
        const el = document.getElementById(id);
        if (el) el.style.display = 'none';
    });

    const target = document.getElementById(contentId);
    if (target) target.style.display = 'block';

    document.querySelectorAll('.sidebar .nav-link').forEach(link => {
        link.classList.remove('active');
    });

    element.classList.add('active');
}