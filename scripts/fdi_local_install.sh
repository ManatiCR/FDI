#!/usr/bin/env bash
SITE_UUID="c3bd695e-f9ea-47ea-8881-0e473dd8644b"
ahoy drush cc drush
echo "Installing..."
ahoy drush si fdi --account-pass=admin -y
echo "Set site uuid..."
ahoy drush config-set "system.site" uuid "$SITE_UUID" -y
echo "Importing config..."
if [ -f ./config/sync/core.extension.yml ] ; then ahoy drush cim -y ; fi
echo "Translations..."
ahoy drush locale-check && ahoy drush locale-update
echo "Cleaning cache..."
ahoy drush cr
