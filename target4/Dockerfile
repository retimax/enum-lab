FROM ubuntu:20.04

RUN apt update && \
  DEBIAN_FRONTEND=noninteractive apt install -y openssh-server && \
  mkdir /var/run/sshd && \
  useradd -m sshuser && \
  echo "sshuser:sshpass" | chpasswd

EXPOSE 22

CMD ["/usr/sbin/sshd", "-D"]
