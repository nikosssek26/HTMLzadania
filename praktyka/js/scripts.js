let serverActive = true;

function toggleServer(status) {
    serverActive = status;
    
    const btnStop = document.getElementById('btn-stop');
    const btnStart = document.getElementById('btn-start');
    const statusText = document.getElementById('server-status-text');
    const statsValues = document.querySelectorAll('.stat-value');

    if (!serverActive) {
        btnStop.style.display = 'none';
        btnStart.style.display = 'block';
        statusText.innerHTML = '● Offline';
        statusText.className = 'text-danger';
        
        statsValues.forEach(el => el.textContent = "0");
        if(document.getElementById("RAMusagebar")) document.getElementById("RAMusagebar").value = 0;
        if(document.getElementById("CPUusagebar")) document.getElementById("CPUusagebar").value = 0;
        if(document.getElementById("GPUusagebar")) document.getElementById("GPUusagebar").value = 0;

        addCustomLog("SYSTEM", "Server SHUTDOWN initiated...", "text-danger");
    } else {
        btnStop.style.display = 'block';
        btnStart.style.display = 'none';
        statusText.innerHTML = '● Online';
        statusText.className = 'text-success';
        
        addCustomLog("SYSTEM", "Server BOOTING up...", "text-success text-uppercase");
        
        updateStats();
    }
}

function addCustomLog(user, action, textClass) {
    const tableBody = document.querySelector('.custom-table tbody');
    if (tableBody) {
        const now = new Date();
        const time = now.getHours() + ":" + String(now.getMinutes()).padStart(2, '0');
        const row = `<tr><td>#SYS</td><td>${user}</td><td class="${textClass}">${action}</td><td><span class="status-badge">INFO</span></td><td>${time}</td></tr>`;
        tableBody.insertAdjacentHTML('afterbegin', row);
    }
}

document.addEventListener("DOMContentLoaded", function() {

    function updateStats() {
    if (serverActive == false) {
        return; 
    }

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
            const newValue = Math.floor(Math.random() * 102);
            
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
            const newValue = Math.floor(Math.random() * 102);
            
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

function addCustomLog(user, action, textClass) {
    const tableBody = document.querySelector('.custom-table tbody');
    if (tableBody) {
        const now = new Date();
        const time = now.getHours() + ":" + String(now.getMinutes()).padStart(2, '0');
        const row = `<tr>
            <td>#SYS</td>
            <td>${user}</td>
            <td class="${textClass}">${action}</td>
            <td><span class="status-badge">INFO</span></td>
            <td>${time}</td>
        </tr>`;
        tableBody.insertAdjacentHTML('afterbegin', row);
    }
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
    const sections = ['main-content-home', 'main-content-cart', 'main-content-buy', 'main-content-stats', 'main-content-users', 'main-content-settings'];
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