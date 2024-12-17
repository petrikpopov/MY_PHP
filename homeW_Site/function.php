<?php
function login($name, $password) {
    $filePath = 'users.txt';
    
    if (!file_exists($filePath)) {
        return false; 
    }
    
    $file = fopen($filePath, 'r');
    while (($line = fgets($file)) !== false) {
        list($storedName, $storedHash) = explode(':', trim($line));
        
        if ($name === $storedName && password_verify($password, $storedHash)) {
            fclose($file);
            $_SESSION['registered_user'] = $name;
            return true;
        }
    }
    fclose($file);
    return false; 
}
?>
