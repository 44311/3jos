<?php
session_start();
session_unset();     // Menghapus semua data session
session_destroy();   // Menghancurkan session

header("Location: /Project_SMPN3/admin/auth/login.php"); // Arahkan ke halaman login
exit;
