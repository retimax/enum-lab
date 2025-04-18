FROM debian:bullseye 

RUN apt-get update && apt-get install -y vsftpd && apt-get clean

EXPOSE 21
CMD ["/usr/sbin/vsftpd", "/etc/vsftpd.conf"]
