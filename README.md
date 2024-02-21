[GitHub Repo] --(1)--> [GitHub Webhook]
                          |
                          v
                     (2) [Web Server]
                 /webhooks/webhook-listener.php
                          |
                          v
                     (3) Executes
               /path/to/git-auto-updater.php
                          |
                          v
                     (4) Pull updates
              [cPanel Server Directories]
