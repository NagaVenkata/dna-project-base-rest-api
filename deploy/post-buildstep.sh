#!/bin/bash

set -x

if [ "$connectionID" == "" ]; then
    connectionID=db
fi
chown -R www-data:www-data app/data/
chown -R www-data:www-data app/runtime/
chown -R www-data:www-data www/assets/
chown -R www-data:www-data www/runtime/
chmod -R g+rw app/data/
chmod -R g+rw app/runtime/
chmod -R g+rw www/assets/
chmod -R g+rw www/runtime/

# temporarily
chmod -R 777 app/data/
chmod -R 777 app/runtime/
chmod -R 777 www/assets/
chmod -R 777 www/runtime/

# todo: move to php/node.js buildstep
# bower install # --allow-root

rm -r www/assets/*

# necessary for user data backup uploads
deploy/install-s3cmd.sh

if [ ! "$ENV" == "" ]; then

    app/yiic fixture --connectionID=$connectionID load
    app/yiic migrate --connectionID=$connectionID --interactive=0
    app/yiic databaseviewgenerator --connectionID=$connectionID item

    app/yiic authorizationhierarchy reset
    app/yiic authorizationhierarchy build

    # make sure that app/data/p3media is a symlink to persistent /cache/p3media
    if [ ! -d /cache/p3media ] ; then
        mkdir /cache/p3media
    fi
    if [ -d app/data/p3media ] ; then
        mv app/data/p3media app/data/.p3media-directory-before-symlinking
    fi
    if [ ! -L app/data/p3media ] ; then
        ln -s /cache/p3media app/data/p3media
    fi

    # set permissions for persistent /cache/p3media
    chown -R www-data:www-data /cache/p3media
    chmod -R g+rw /cache/p3media
    # temporarily
    chmod -R 777 /cache/p3media

fi

exit 0