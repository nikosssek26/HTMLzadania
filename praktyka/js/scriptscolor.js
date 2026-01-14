function applyAccentColor(color) {
    if (!color) return;

    const r = parseInt(color.slice(1, 3), 16);
    const g = parseInt(color.slice(3, 5), 16);
    const b = parseInt(color.slice(5, 7), 16);
    const accent2 = `rgba(${r}, ${g}, ${b}, 0.6)`;

    document.documentElement.style.setProperty('--accent', color);
    document.documentElement.style.setProperty('--accent2', accent2);
    
    const picker = document.getElementById('html5colorpicker');
    if (picker) picker.value = color;
}

function updateAccentColor() {
    const newColor = document.getElementById('html5colorpicker').value;
    applyAccentColor(newColor);
    localStorage.setItem('savedAccentColor', newColor); 
}

document.addEventListener("DOMContentLoaded", function() {
    const savedColor = localStorage.getItem('savedAccentColor');
    if (savedColor) {
        applyAccentColor(savedColor);
    }
});