<?php
session_start();
if(!isset($_SESSION['czyZalogowany']))
{
	header("location:index.php");
	$_SESSION['komunikat'] = "zabezpiecznie przed bruteforce";
	exit();
}
?>

<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel  </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron&family=Metal+Mania&family=Atkinson+Hyperlegible+Mono:wght@400;700&display=swap">
    <script src="js/scripts.js"></script>
    <script src="js/scriptscolor.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </head>
<body> 
<div id="afterlogin">
    <div class="dashboard-layout">
    <nav class="sidebar">
        <div class="sidebar-header">
                <h4 class="wave-text">
                    <span>D</span><span>A</span><span>S</span><span>H</span><span>B</span><span>O</span><span>A</span><span>R</span><span>D</span>
                </h4>
        </div>
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a href="#" onclick="showContent('main-content', this)" class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="showContent('main-content-stats', this)" class="nav-link">Stats</a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="showContent('main-content-users', this)" class="nav-link">Users</a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="showContent('main-content-settings', this)" class="nav-link">Settings</a>
            </li>
        </ul>
        <div class="mt-auto">
            <hr><a href="logout.php" class="btn btn-outline-danger btn-sm w-100">Log Out</a>
        </div>
    </nav>

    <main class="main-content" id="main-content">
        <div id="stats-overview" class="m-4">
            <header class="top-bar d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 style="font-family: 'Orbitron'; margin:0;">System Overview</h4>
                    <small class="text-muted">Hello, <?php echo htmlspecialchars($_SESSION['login'] ?? 'User'); ?> -- session active</small>
                </div>
                <div class="user-info">
                    <div class="fw-bold">Server <small class="text-success">● Online</small></div> 
                </div>
            </header>
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="stat-card text-center">
                        <small class="text-muted text-uppercase">USERS</small>
                        <div class="stat-value" name="playerstats">0</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card text-center">
                        <small class="text-muted text-uppercase">RAM USAGE</small>
                        <div class="stat-value" name="playerstats2">0</div>GB
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card text-center">
                        <small class="text-muted text-uppercase">CPU USAGE</small>
                        <div class="stat-value" name="playerstats3">0</div>%
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card text-center">
                        <small class="text-muted text-uppercase">GPU USAGE</small>
                        <div class="stat-value" name="playerstats4">0</div>%
                    </div>
                </div>
            </div>
        </div>
        <div class="content-card">
            <h5 class="mb-4" style="font-family: 'Orbitron';">Last Activity</h5>
            <div class="table-responsive">
                <table class="table table-dark table-hover custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>USER</th>
                            <th>ACTION</th>
                            <th>STATUS</th>
                            <th>TIME</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#23742100</td>
                            <td>Janusz_PRO</td>
                            <td>Profile Changes</td>
                            <td><span class="status-badge">DONE</span></td>
                            <td>2024-06-15 14:23</td>
                        </tr>
                        <tr>
                            <td>#87683400</td>
                            <td>Moderator_1</td>
                            <td>Post Deletion</td>
                            <td><span class="status-badge">DONE</span></td>
                            <td>2024-06-15 13:45</td>
                        </tr>
                        <tr>
                            <td>#67234500</td>
                            <td>System</td>
                            <td>Automactic Backup</td>
                            <td><span class="status-badge">IN PROGRESS</span></td>
                            <td>2024-06-15 12:00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <main class="main-content" id="main-content-stats" style="display:none;">
        <div class="content-card">
            <h1>Strona w budowie</h1>
        </div>
    </main>
    <main class="main-content" id="main-content-users" style="display:none;">
        <div class="content-card mt-5">
            <h5 class="mb-4" style="font-family: 'Orbitron';">USERS</h5>
            <div class="table-responsive">
                <table class="table table-dark table-hover custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>USER</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once "config.php";

                        $sql = "SELECT id, login, status FROM users"; 

                        if ($result = mysqli_query($conn, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $login = htmlspecialchars($row['login']);
                                    $status = $row['status'] == 1 ? '<b class="text-success">● AKTYWNY</b>' : '<b class="text-danger">● NIEAKTYWNY</b>';
                                    echo "<tr>";
                                    echo "<td>#$id</td>";
                                    echo "<td>$login</td>";
                                    echo "<td><span class=\"status-badge\">$status</span></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3' class='text-center'>Brak użytkowników w bazie</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3' class='text-danger'>Błąd zapytania: " . mysqli_error($conn) . "</td></tr>";
                        }
                        ?>
                        </tbody>
                </table>
            </div>
        </div>
    </main>
    <main class="main-content" id="main-content-settings" style="display:none;">
        <div class="content-card">
            <h5 class="mb-4" style="font-family: 'Orbitron';">Settings</h5>
            <div class="settings-section">
                <p>Change the color theme of the panel:</p>
                <input type="color" id="html5colorpicker" onchange="updateAccentColor()" value="#00d2ff" style="width:85%;">
            </div>
        </div>
        <div class="content-card mt-4">
            <h5 class="mb-4" style="font-family: 'Orbitron';">Change Password</h5>
            <form method="post" action="./change_password.php">
                <div class="mb-3">
                    <label for="Login1" class="form-label">Login:</label>
                    <input type="text" class="form-control" id="Login1" name="currentlogin" required>
                </div>
                <div class="mb-3">
                    <label for="pass1" class="form-label">Current Password:</label>
                    <input type="password" class="form-control" id="pass1" name="currentPassword" required>
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password:</label>
                    <input type="password" class="form-control" id="pass1" name="newPassword" required>
                </div>
                <div class="mb-3">
                    <label for="confirmNewPassword" class="form-label">Confirm New Password:</label>
                    <input type="password" class="form-control" id="pass1" name="confirmNewPassword" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-outline-light mt-2">Change Password</button>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>

