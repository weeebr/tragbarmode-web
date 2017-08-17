<?php

// Füge Datenbank-Verbindung und -Funktionen hier ein. Vergleiche 3.1. 

sec_session_start(); 
if(login_check($mysqli) == true) {
        // Füge den Seiteninhalt hier ein!
} else { 
        echo 'You are not authorized to access this page, please login.';
}

?>