#!/bin/sh

# run as user asterisk by default
# ASTERISK_USER=${ASTERISK_USER:-asterisk}
# ASTERISK_GROUP=${ASTERISK_GROUP:-${ASTERISK_USER}}

if [ "$1" = "" ]; then
  COMMAND="/bin/bash"
else
  COMMAND="$@"
fi

# if [ "${ASTERISK_UID}" != "" ] && [ "${ASTERISK_GID}" != "" ]; then
#   # recreate user and group for asterisk
#   # if they've sent as env variables (i.e. to macth with host user to fix permissions for mounted folders
# 
#   deluser asterisk && \
#   addgroup -g 2000 ${ASTERISK_GROUP} && \
#   adduser -D -H -u 2000 -G ${ASTERISK_GROUP} ${ASTERISK_USER} \
#   || exit
# fi

# chown -R ${ASTERISK_USER}: /var/log/asterisk \
#                            /var/lib/asterisk \
#                            /var/run/asterisk \
#                            /var/spool/asterisk; \
exec ${COMMAND}
