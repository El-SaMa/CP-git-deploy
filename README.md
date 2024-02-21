# Process Flow Including GitHub, Webhook Listener, Cron Job, and cPanel Updates

# (1) Push to GitHub Repo: Developers push changes to the GitHub repository.
# [GitHub Repo] --(1)--> [GitHub Webhook]

# (2) GitHub Webhook Activation: GitHub sends a notification to the specified webhook URL.
#                          |
#                          v
#                     (2) [Web Server] /webhooks/webhook-listener.php

# (3) Webhook Listener Verifies and Signals for Update: The listener script verifies the request
#     and logs or flags that an update is needed. This step might involve setting a flag in a file
#     or database that indicates an update is pending.
#                          |
#                          v
#                (3) Verify & Trigger via Cron /etc/cron.d/git-pull-cron

# (4) Cron Job Execution: The cron job is set up in cPanel to periodically (e.g., every 5 minutes)
#     trigger the git-auto-updater.php script. This ensures regular checks for pending updates.
#                          |
#                          v
#                     (4) Executes Periodically /path/to/git-auto-updater.php

# (5) Pull Updates into cPanel Server Directories: The git-auto-updater.php script checks if
#     an update is flagged as needed and, if so, performs `git pull` in each repository's directory,
#     thus updating the development WordPress plugin or any other projects configured.
#                          |
#                          v
#                     (5) Pull updates [cPanel Server Directories]

# Note: This workflow automates updates from GitHub to a development environment on cPanel,
#       ensuring that the latest changes are always deployed without manual intervention.
