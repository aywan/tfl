#!/usr/bin/env sh
#
# Executing command with www-data user.
# suwd - su www-data
#
eval "su ${RUNNER:-www-data} -s /bin/bash -c \"${@}\""
### end
