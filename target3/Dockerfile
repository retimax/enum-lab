FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    samba \
    samba-common-bin 

RUN useradd --no-create-home --shell /usr/sbin/nologin smbuser && \
    (echo "smbpass"; echo "smbpass") | smbpasswd -a smbuser && \
    smbpasswd -e smbuser 


RUN mkdir -p /srv/smbshare && \
    chown -R smbuser:smbuser /srv/smbshare && \
    chmod 2770 /srv/smbshare 

COPY smb.conf /etc/samba/smb.conf

RUN testparm -s

EXPOSE 139/tcp 445/tcp

CMD ["smbd", "-F", "--no-process-group"]
