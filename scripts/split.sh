#!/usr/bin/env bash

set -e

SPLIT_BRANCH=main
CURRENT_BRANCH=`git rev-parse --abbrev-ref HEAD`

# Make sure the working directory is clear.
if [[ "$SPLIT_BRANCH" != "$CURRENT_BRANCH" ]]; then
    echo "Split branch ($SPLIT_BRANCH) does not match the current active branch ($CURRENT_BRANCH)."

    exit 1
fi

# Make sure the working directory is clear.
if [[ ! -z `git status --porcelain` ]]; then
    echo "Your working directory is dirty. Did you forget to commit your changes?"

    exit 1
fi

# Make sure latest changes are fetched first.
git fetch origin

# Make sure that release branch is in sync with origin.
if [[ `git rev-parse HEAD` != `git rev-parse origin/$CURRENT_BRANCH` ]]; then
    echo "Your branch is out of date with its upstream. Did you forget to pull or push any changes before releasing?"

    exit 1
fi

for pkg in foo bar common; do
    echo "Publishing $pkg package"

    # Create temporary remote for the sub-package
    git remote add packages/$pkg git@github.com:feryardiant/learn-monorepo-$pkg.git

    # Split sub-package into new temporary branch
    git subtree -q split --prefix packages/$pkg --branch packages/$pkg

    # Push the sub-package specific branch to its remote
    git push packages/$pkg packages/$pkg:main

    # Clean up temporary remote and branch
    git branch -q -D packages/$pkg && git remote remove packages/$pkg

    echo ""
done
