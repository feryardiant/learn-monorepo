#!/usr/bin/env bash

set -e

SPLIT_BRANCH=main
CURRENT_BRANCH=`git rev-parse --abbrev-ref HEAD`
VERSION=`git describe --tags --abbrev=0`

# Make sure the working directory is clear.
if [[ "$SPLIT_BRANCH" != "$CURRENT_BRANCH" ]]; then
    echo "Split branch ($SPLIT_BRANCH) does not match the current active branch ($CURRENT_BRANCH)." 1>&2

    exit 1
fi

# Make sure the working directory is clear.
if [[ ! -z `git status --porcelain` ]]; then
    echo "Your working directory is dirty. Did you forget to commit your changes?" 1>&2

    exit 1
fi

# Make sure latest changes are fetched first.
git fetch origin

# Make sure that release branch is in sync with origin.
if [[ `git rev-parse HEAD` != `git rev-parse origin/$CURRENT_BRANCH` ]]; then
    echo "Your branch is out of date with its upstream. Did you forget to pull or push any changes before releasing?" 1>&2

    exit 1
fi

for pkg in `ls packages`; do
    echo "Releasing $pkg package"

    tmp_path="/tmp/monorepo/$pkg"

    # Create temporary remote for the sub-package
    git clone git@github.com:feryardiant/learn-monorepo-$pkg.git $tmp_path

    cd $tmp_path

    # Tagging release
    git tag -s $VERSION -m "chore: release $VERSION"

    # Push the sub-package specific branch to its remote
    git push origin --follow-tags

    # Back to main repo directory
    cd -

    rm -rf $tmp_path

    echo ""
done

# Push root repository tags
git push origin --follow-tags

