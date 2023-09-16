<?php 

// Get the protocol (HTTP or HTTPS)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

// Get the server name (hostname)
$serverName = $_SERVER['SERVER_NAME'];

// Get the port (usually 80 or 443 for HTTP and HTTPS, respectively)
$port = $_SERVER['SERVER_PORT'];

// Determine if the port should be included in the URL
$portIncluded = ($protocol === 'https' && $port != 443) || ($protocol === 'http' && $port != 80);

// Get the context path (the subdirectory where your PHP application is hosted)
$contextPath = '/MyProject'; // Change this to your subdirectory

// Build the base URL with context path
$baseUrl = $protocol . '://' . $serverName . ($portIncluded ? (':' . $port) : '').$contextPath;

// Output the base URL
// echo $baseUrl;
?>