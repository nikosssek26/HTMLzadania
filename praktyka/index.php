<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGOWANIE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron&family=Metal+Mania&family=Atkinson+Hyperlegible+Mono:wght@400;700&display=swap">
    <script src="js/scripts.js"></script>
    <script src="js/scriptscolor.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<?php if(isset($_SESSION['komunikat'])): ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="errorToast" class="toast show align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body font3">
                    <strong>BŁĄD:</strong> <?php echo $_SESSION['komunikat']; ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['komunikat']); ?>
    
    <script>
        // Automatyczne ukrycie powiadomienia po 5 sekundach
        setTimeout(function() {
            var toastEl = document.getElementById('errorToast');
            if(toastEl) {
                var toast = new bootstrap.Toast(toastEl);
                toast.hide();
            }
        }, 5000);
    </script>
<?php endif; ?>
<body>
    <canvas id="matrixCanvas"></canvas>

    <div id="beforelogin" class="login-container mx-auto my-auto">
        <div id="loginform"></div>
        <div class="form-wrapper font3">
            <p class="text-center fs-3 accenttextcolor">Welcome User!</p>
            <form method="post" action="./logowanie.php">
                <div class="mb-3">
                    <label for="Login1" class="form-label accenttextcolor">Login:</label>
                    <input type="text" class="form-control accenttextcolor" id="Login1" name="login" required>
                </div>
                <div class="mb-3">
                    <label for="pass1" class="form-label accenttextcolor">Password:</label>
                    <input type="password" class="form-control accenttextcolor" id="pass1" name="haslo" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn-me btn-outline-infome mt-2 accenttextcolor">Submit</button>
                </div>
            </form>
            <?php
			if(isset($_SESSION['komunikat']))
			{
				echo("<h1>BŁĄD<h1>");
				echo("<h2>$_SESSION[komunikat]</h2>");
				unset($_SESSION['komunikat']);
			}
			?>
        </div>
    </div>
    <script>
        const canvas = document.getElementById('matrixCanvas');
        const ctx = canvas.getContext('2d');

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        const chars = "ｱｲｳｴｵｶｷｸｹｺｻｼｽｾｿﾀﾁﾂﾃﾄﾅﾆﾇﾈﾉﾊﾋﾌﾍﾎﾏﾐﾑﾒﾓﾔﾕﾖﾗﾘﾙﾚﾛﾜﾝ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        const charArray = chars.split("");

        const fontSize = 16;
        const columns = canvas.width / fontSize; 

        const drops = [];
        for (let x = 0; x < columns; x++) {
            drops[x] = 1; 
        }

        function draw() {
            const rootStyle = getComputedStyle(document.documentElement);
            const accentColor = localStorage.getItem('savedAccentColor');

            ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            ctx.fillStyle = accentColor; 
            ctx.font = fontSize + "px monospace";

            for (let i = 0; i < drops.length; i++) {
                const text = charArray[Math.floor(Math.random() * charArray.length)];
                ctx.fillText(text, i * fontSize, drops[i] * fontSize);

                if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
                    drops[i] = 0;
                }
                drops[i]++;
            }
        }

        setInterval(draw, 33);
    </script>
</body>
</html>