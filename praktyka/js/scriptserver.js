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