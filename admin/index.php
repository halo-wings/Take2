<?php
// Set secure session cookie params (HttpOnly, SameSite=Strict)
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => false, // Set to true if using HTTPS
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();

// Generate CSRF token if not set
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Security headers (CSP without unsafe-inline where possible; inline style needs 'unsafe-inline' for now)
header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline'; object-src 'none';");
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");

// ====================== BRUTE-FORCE PROTECTION (Part 1) ======================
$ip           = $_SERVER['REMOTE_ADDR'];
$lockout_file = '/tmp/login_lockout_' . md5($ip);

// Check if locked out
if (file_exists($lockout_file)) {
    $locked_until = (int)file_get_contents($lockout_file);
    if (time() < $locked_until) {
        die('<h2 style="color:red;">Accès temporairement bloqué</h2>
             <p>Trop de tentatives de connexion échouées.<br>
             Réessayez dans ' . round(($locked_until - time()) / 60) . ' minute(s).</p>');
    } else {
        @unlink($lockout_file);
    }
}

// Count failed attempts on POST
$fails = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['connexion'])) {
    $fail_file = '/tmp/login_fail_' . md5($ip);
    $fails = (file_exists($fail_file)) ? (int)file_get_contents($fail_file) : 0;
}
// =========================================================================

require('../inc/functions.php');

$erreur = '';
$logged_in = false;

if (isset($_POST['connexion']) && $_POST['connexion'] == 'Se connecter') {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $erreur = 'Requête invalide (CSRF).';
    } else {
        if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {
            $login = trim($_POST['login']);

            // Strict input filtering
            if (!preg_match('/^[a-zA-Z0-9_]+$/', $login)) {
                $erreur = 'Nom d\'utilisateur invalide.';
            } else {
                // Secure query
                $s_sql  = "SELECT password, id FROM login WHERE username = ?";
                $result = SQL($s_sql, [$login]);

                if ($result && $result->num_rows == 1) {
                    $data = $result->fetch_array(MYSQLI_NUM);

                    require '../inc/phpass-0.3/PasswordHash.php';
                    $t_hasher = new PasswordHash(8, FALSE);
                    $check    = $t_hasher->CheckPassword($_POST['pass'], $data[0]);

                    if ($check) {
                        // Successful login
                        session_regenerate_id(true); // Secure session ID regeneration
                        $_SESSION['login']    = $login;
                        $_SESSION['idClient'] = $data[1];
                        header('Location: adminMenus.php');
                        exit();
                    } else {
                        $erreur = 'Mauvais mot de passe.';
                    }
                } elseif ($result && $result->num_rows == 0) {
                    $erreur = 'Compte non reconnu.';
                } else {
                    $erreur = 'Problème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
                }
            }
        } else {
            $erreur = 'Au moins un des champs est vide.';
        }
    }

    // ====================== BRUTE-FORCE PROTECTION (Part 2) ======================
    $fail_file    = '/tmp/login_fail_' . md5($ip);
    $lockout_file = '/tmp/login_lockout_' . md5($ip);

    if ($erreur === 'Mauvais mot de passe.' || $erreur === 'Compte non reconnu.') {
        $fails++;
        file_put_contents($fail_file, $fails);

        if ($fails >= 5) {
            file_put_contents($lockout_file, time() + 900); // 15 min
            @unlink($fail_file);
            die('<h2 style="color:red;">Compte temporairement bloqué</h2>
                 <p>Trop de tentatives échouées.<br>Réessayez dans 15 minutes.</p>');
        }
    }
    // =========================================================================

    // Regenerate CSRF token after POST (good practice)
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// If not POST or failed login, display form
$categorie = "-1";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="UTF-8">
<title>ADMIN - McGill</title>
<link rel="stylesheet" type="text/css" href="../inc/css/style.css" />
<style type="text/css">
body { font-size: 18px;}
</style>
</head>
<body bgcolor="#CDCDCD">
<center>
<section style="padding: 0; float: none; width: 934px;">
  <div style="width: 934px; margin: 0 auto; background-color: #fff; text-align: center;">
      <div class="logo" style="padding: 20px; background: url(../images/logo_mcgill.jpg) no-repeat 20px 20px; width: 118px; height: 30px;">&nbsp;</div>

<br /><br /><br /><br /><br /><br />
<form name="formConnexion" action="index.php" method="post">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
    Username : <input type="text" value="" name="login" autocomplete="off">&nbsp;&nbsp;&nbsp;&nbsp;
    Password : <input type="password" value="" name="pass" autocomplete="off">&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="connexion" value="Se connecter">
    <b><?php if ($erreur) echo '<br /><br />' . htmlspecialchars($erreur); ?></b>
</form>
</div>
</section>
</center>
</body>
</html>
