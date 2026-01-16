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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron&family=Metal+Mania&family=Atkinson+Hyperlegible+Mono:wght@400;700&display=swap">
    <link href="style.css" rel="stylesheet">
    <script src="js/scripts.js"></script>
    <script src="js/scriptscolor.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/scriptsstats.js"></script>
  </head>
<body> 
<div id="afterlogin">
    <div class="dashboard-layout">
    <nav class="sidebar"> <!-- Sidebar navigation ##########################################-->
        <div class="sidebar-header">
                <h4 class="wave-text">
                    <span>D</span><span>A</span><span>S</span><span>H</span><span>B</span><span>O</span><span>A</span><span>R</span><span>D</span>
                </h4>
        </div>
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a href="#" onclick="showContent('main-content', this)" class="nav-link active"><i class="fa-solid fa-house"></i> Home</a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="showContent('main-content-buy', this)" class="nav-link"><i class="fa-solid fa-cart-shopping"></i> Buy</a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="showContent('main-content-stats', this)" class="nav-link"><i class="fa-solid fa-chart-area"></i> Stats</a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="showContent('main-content-users', this)" class="nav-link"><i class="fa-solid fa-user"></i> Users</a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="showContent('main-content-settings', this)" class="nav-link"><i class="fa-solid fa-gear"></i> Settings</a>
            </li>
        </ul>
        <div class="mt-auto">
            <hr><a href="logout.php" class="btn btn-outline-danger btn-sm w-100">Log Out</a>
        </div>
    </nav>
    <main class="main-content" id="main-content"> <!-- Main Content ##########################################-->
        <div id="stats-overview" class="m-4">
            <header class="top-bar d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 style="font-family: 'Orbitron'; margin:0;" class="accenttextcolor">System Overview</h4>
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
                        <div class="stat-value" name="playerstats2">0</div>GB<br>
                        <progress id="RAMusagebar" value="0" max="120" class="w-30 mt-2"></progress>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card text-center">
                        <small class="text-muted text-uppercase">CPU USAGE</small>
                        <div class="stat-value" name="playerstats3">0</div>%<br>
                        <progress id="CPUusagebar" value="0" max="100" class="w-35 mt-2"></progress>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card text-center">
                        <small class="text-muted text-uppercase">GPU USAGE</small>
                        <div class="stat-value" name="playerstats4">0</div>%<br>
                        <progress id="GPUusagebar" value="0" max="100" class="w-35 mt-2"></progress>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-card">
            <h5 class="mb-4 accenttextcolor" style="font-family: 'Orbitron';">Last Activity</h5>
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
    <main class="main-content" id="main-content-buy" style="display:none;"> <!-- Buy Content ##########################################-->
        <div class="content-card">
            <section class="page-section portfolio mb-5" id="buy-portfolio">
                <div class="container">
                    <h2 class="page-section-heading text-center text-uppercase pt-3 accenttextcolor" style="font-family: 'Orbitron';">SERVERS TO BUY</h2>
                    <hr class="mb-5">

                    <div class="row g-4 justify-content-center">
                        <div class="col-md-6 col-lg-4">
                            <div class="stat-card text-center h-100 d-flex flex-column justify-content-between p-4" style="cursor: default;">
                                <div class="portfolio-item mx-auto mb-3" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                                    <img class="img-fluid" style="cursor: pointer; width: 150px; transition: transform 0.3s;" src="img/1.png" alt="Low Server" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" />
                                </div>
                                <h4 class="accenttextcolor">LOW-TIER</h4>
                                <div class="text-muted small mb-3">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-microchip me-2"></i> 8 vCPU</li>
                                        <li><i class="fas fa-memory me-2"></i> 32GB DDR4 RAM</li>
                                        <li><i class="fas fa-hard-drive me-2"></i> 256GB SSD</li>
                                    </ul>
                                </div>
                                <h3 class="fw-bold mb-3">30.00$ <small class="fs-6 text-muted">/mo</small></h3>
                                <button class="btn-me btn-outline-infome w-100" data-bs-toggle="modal" data-bs-target="#portfolioModal1">DETAILS</button>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="stat-card text-center h-100 d-flex flex-column justify-content-between p-4">
                                <div class="portfolio-item mx-auto mb-3" data-bs-toggle="modal" data-bs-target="#portfolioModal2">
                                    <img class="img-fluid" style="cursor: pointer; width: 150px; transition: transform 0.3s;" src="img/2.png" alt="Mediocre Server" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" />
                                </div>
                                <h4 class="accenttextcolor">MID-RANGE</h4>
                                <div class="text-muted small mb-3">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-microchip me-2"></i> 16 vCPU</li>
                                        <li><i class="fas fa-memory me-2"></i> 64GB DDR5 RAM</li>
                                        <li><i class="fas fa-hard-drive me-2"></i> 520GB NVMe</li>
                                    </ul>
                                </div>
                                <h3 class="fw-bold mb-3">90.00$ <small class="fs-6 text-muted">/mo</small></h3>
                                <button class="btn-me btn-outline-infome w-100" data-bs-toggle="modal" data-bs-target="#portfolioModal2">DETAILS</button>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div class="stat-card text-center h-100 d-flex flex-column justify-content-between p-4" style="border: 2px solid var(--accent); border-radius: 8px; box-shadow: 0 0 15px var(--accent2);">
                                <div class="portfolio-item mx-auto mb-3" data-bs-toggle="modal" data-bs-target="#portfolioModal3">
                                    <img class="img-fluid" style="cursor: pointer; width: 150px; transition: transform 0.3s;" src="img/3.png" alt="The Beast" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" />
                                </div>
                                <h4 class="accenttextcolor">THE BEAST</h4>
                                <div class="text-muted small mb-3">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-microchip me-2"></i> 32 vCPU</li>
                                        <li><i class="fas fa-memory me-2"></i> 120GB DDR5 RAM</li>
                                        <li><i class="fas fa-hard-drive me-2"></i> 1TB NVMe GEN4</li>
                                    </ul>
                                </div>
                                <h3 class="fw-bold mb-3">240.00$ <small class="fs-6 text-muted">/mo</small></h3>
                                <button class="btn-me btn-outline-infome w-100 active" data-bs-toggle="modal" data-bs-target="#portfolioModal3">DETAILS</button>
                                <b class="text-muted mt-2">You own this server</b>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade" id="portfolioModal1" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border: 2px solid var(--accent); background: var(--bg-dark);">
                        <div class="modal-header border-0">
                            <h5 class="modal-title accenttextcolor" style="font-family: 'Orbitron';">Unit #01 - Specifications</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img class="img-fluid mb-4" src="img/1.png" style="width: 120px;" alt="...">
                            <div class="specs-grid text-start bg-darker p-3 rounded" style="background: rgba(0,0,0,0.3);">
                                <p class="mb-1 text-uppercase small text-muted">Stability status: <span class="text-danger">Automatic Restart on time: 8:00, 00:00</span></p>
                                <hr class="mt-0">
                                <div class="row">
                                    <div class="col-6"><strong>CPU:</strong> 8 vCores</div>
                                    <div class="col-6"><strong>RAM:</strong> 32 GB DDR4</div>
                                    <div class="col-6"><strong>DISK:</strong> 256 GB SSD</div>
                                    <div class="col-6"><strong>DATA SPEED:</strong> 1 Gbps</div>
                                </div>
                                <p class="mt-3 mb-0 small text-muted">Idealny dla: botów Discord, małych stron WWW, skryptów automatyzacji.</p>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn-me btn-outline-light w-100" data-bs-dismiss="modal" style="font-weight: bold;">ORDER NOW</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="portfolioModal2" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border: 2px solid var(--accent); background: var(--bg-dark); box-shadow: 0 0 20px var(--accent2);">
                        <div class="modal-header border-0">
                            <h5 class="modal-title accenttextcolor" style="font-family: 'Orbitron';">Unit #02 - Advanced Config</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img class="img-fluid mb-4" src="img/2.png" style="width: 120px;" alt="...">
                            <div class="specs-grid text-start p-3 rounded" style="background: rgba(0,0,0,0.3);">
                                <p class="mb-1 text-uppercase small text-muted">Stability: <span class="text-info">99.9% Uptime</span></p>
                                <hr class="mt-0">
                                <div class="row">
                                    <div class="col-6"><strong>CPU:</strong> 16 vCores High</div>
                                    <div class="col-6"><strong>RAM:</strong> 64 GB DDR4</div>
                                    <div class="col-6"><strong>DISK:</strong> 520 GB NVMe</div>
                                    <div class="col-6"><strong>DATA SPEED:</strong> 2.5 Gbps</div>
                                </div>
                                <p class="mt-3 mb-0 small text-muted">Zastosowanie: Serwery gier (Minecraft/CS), bazy danych, API.</p>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn-me btn-outline-light w-100" data-bs-dismiss="modal" style="font-weight: bold;">ORDER NOW</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="portfolioModal3" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border: 2px solid var(--accent); background: var(--bg-dark); box-shadow: 0 0 20px var(--accent2);">
                        <div class="modal-header border-0">
                            <h5 class="modal-title accenttextcolor" style="font-family: 'Orbitron';">Unit #02 - THE BEAST</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img class="img-fluid mb-4" src="img/2.png" style="width: 120px;" alt="...">
                            <div class="specs-grid text-start p-3 rounded" style="background: rgba(0,0,0,0.3);">
                                <p class="mb-1 text-uppercase small text-muted">Node status: <span class="text-success">Active</span></p>
                                <hr class="mt-0">
                                <div class="row">
                                    <div class="col-6"><strong>CPU:</strong> 32 vCores High</div>
                                    <div class="col-6"><strong>RAM:</strong> 120 GB DDR4</div>
                                    <div class="col-6"><strong>DISK:</strong> 1T GB NVMe</div>
                                    <div class="col-6"><strong>DATA SPEED:</strong> 5 Gbps</div>
                                </div>
                                <p class="mt-3 mb-0 small text-muted">Zastosowanie: Serwery gier (GTA V, ARK, CS2), bazy danych, API.</p>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn-me w-100 active" data-bs-dismiss="modal" style="color: black; font-weight: bold;">OWNED</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <main class="main-content" id="main-content-stats" style="display:none;"> <!-- Stats Content ##########################################-->
        <div class="content-card">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="accenttextcolor" style="font-family: 'Orbitron';">User Growth</h5>
                    <canvas id="myChart" style="width:100%;max-width:700px;max-height: 400px;"></canvas>
                </div>
            </div>
        </div>
    </main>
    <main class="main-content" id="main-content-users" style="display:none;"> <!-- Users Content ##########################################-->
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
    <main class="main-content" id="main-content-settings" style="display:none;"> <!-- Settings Content ##########################################-->
        <div class="content-card">
            <h5 class="mb-4 accenttextcolor" style="font-family: 'Orbitron';">Settings</h5>
            <div class="settings-section">
                <p>Change the color theme of the panel:</p>
                <input type="color" id="html5colorpicker" oninput="updateAccentColor()" value="#00d2ff" style="width: 60px; height: 40px; border: none; cursor: pointer;">
            </div>
        </div>
        <div class="content-card mt-4">
            <h5 class="mb-4 accenttextcolor" style="font-family: 'Orbitron';">Change Password</h5>
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