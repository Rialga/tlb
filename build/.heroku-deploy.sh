#!/bin/bash
# Ensure we fail fast if there is a problem.
set -e pipefail

# Setup Git remote ok
git remote add heroku https://heroku:$HEROKU_API_KEY@git.heroku.com/pemesanan.git
# git remote add "$GIT_DEPLOYMENT_REMOTE" "$GIT_DEPLOYMENT_URL"
# Deploy via Git
# git push https://heroku:$HEROKU_API_KEY@git.heroku.com/pemesanan.git HEAD:"master"
git push -f heroku master
