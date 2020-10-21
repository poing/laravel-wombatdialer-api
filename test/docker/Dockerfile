# vim:set ft=dockerfile:
FROM centos6

MAINTAINER Brian LaVallee <brian.lavallee@invite-comm.jp>

# Asterisk installation (based on andrius/asterisk)
# RUN apk add --update asterisk asterisk-sample-config git bash
# RUN asterisk -U asterisk \
# && sleep 5 \
# && pkill -9 asterisk \
# && pkill -9 astcanary \
# && sleep 2 \
# && rm -rf /var/run/asterisk/* \
# && mkdir -p /var/spool/asterisk/fax \
# && chown -R asterisk: /var/spool/asterisk/fax \
# && truncate -s 0 /var/log/asterisk/messages \
#                  /var/log/asterisk/queue_log \
# &&  rm -rf /var/cache/apk/* \
#            /tmp/* \
#            /var/tmp/*
           
EXPOSE 8080/tcp
#VOLUME /var/lib/asterisk/sounds /var/lib/asterisk/keys /var/lib/asterisk/phoneprov /var/spool/asterisk /var/log/asterisk

ADD docker-entrypoint.sh /docker-entrypoint.sh

ENTRYPOINT ["/docker-entrypoint.sh"]
