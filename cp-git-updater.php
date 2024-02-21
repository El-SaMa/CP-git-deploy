<?php

$repoConfigPath = __DIR__ . '/repos.json';

// Check if the configuration file exists
if (!file_exists($repoConfigPath)) {
    die("Configuration file not found.\n");
}

// Load repository configurations
$repos = json_decode(file_get_contents($repoConfigPath), true);
if (empty($repos)) {
    die("No repositories configured or unable to parse configuration.\n");
}

// Iterate through repositories and update
foreach ($repos as $repoName => $repoPath) {
    echo "Updating repository: {$repoName}...\n";
    $output = shell_exec("cd {$repoPath} && git pull 2>&1");
    echo $output . "\n";
}

echo "All repositories updated.\n";
