let cookieCount = 0;
let cookieprs = 0;
 
const upgrades = [
    { 
        id: 'auto-clicker', 
        name: "Kursor", 
        desc: 'Daje 1 ciacho na sekundę', 
        cost: 10, 
        income: 1, 
        count: 0, 
        icon: '🐤' 
    },
    { 
        id: 'auto-grandmama', 
        name: "Babcia", 
        desc: 'Daje 5 ciach na sekundę', 
        cost: 100, 
        income: 5, 
        count: 0, 
        icon: '👵' 
    },
    { 
        id: 'auto-farm', 
        name: "Farma ciach", 
        desc: 'Daje 10 ciach na sekundę', 
        cost: 1000, 
        income: 10, 
        count: 0, 
        icon: '👨‍🌾' 
    }
];
 
function StartGame() {
    const list = document.getElementById("upgrades-list");
 
    upgrades.forEach((upg, index) => {
        const btn = document.createElement("button");
        btn.id = "btn-" + index;
        btn.style.display = "block";
        btn.style.margin = "10px";
        
        btn.onclick = function() {
            if (cookieCount >= upg.cost) {
                cookieCount -= upg.cost;
                upg.count++;
                cookieprs += upg.income;
                upg.cost = Math.ceil(upg.cost * 1.2);
                UpdateDisplay();
            }
        };
 
        list.appendChild(btn);
    });
    UpdateDisplay();
}
 
document.getElementById("ciastko").addEventListener("click", () => {
    cookieCount++;
    const img = document.getElementById("ciastko");
    img.style.transform = "scale(0.95)";
    setTimeout(() => img.style.transform = "scale(1)", 100);
    UpdateDisplay();
});
 
setInterval(function() {
    cookieCount += cookieprs;
    UpdateDisplay();
}, 1000);
 
function UpdateDisplay() {
    document.getElementById("cookieCount").textContent = Math.floor(cookieCount);
    document.getElementById("cps").textContent = cookieprs;
 
    upgrades.forEach((upg, index) => {
        const btn = document.getElementById("btn-" + index);
        btn.textContent = upg.icon + " " + upg.name + " (Koszt: " + upg.cost + ") - Posiadasz: " + upg.count;
        btn.disabled = cookieCount < upg.cost;
    });
}