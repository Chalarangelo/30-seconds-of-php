#!/bin/bash
setup_git() {
  git config --global user.email "sohelamincse@gmail.com"
  git config --global user.name "sohelamin"
}

upload_files() {
  if [ $TRAVIS_EVENT_TYPE != "pull_request" ]; then
    if [ $TRAVIS_BRANCH == "master" ]; then
      echo "Pushing to master branch..."
      git push --force --quiet "https://${GH_TOKEN}@github.com/appzcoder/30-seconds-of-php-code.git" master > /dev/null 2>&1
    fi
  fi
}

setup_git
upload_files
