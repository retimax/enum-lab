FROM kalilinux/kali-rolling

RUN apt-get update && apt-get install -y \
  nmap \
  net-tools \
  smbclient \
  dnsutils \
  iputils-ping \
  curl \
  && apt-get clean

CMD ["/bin/bash"]

