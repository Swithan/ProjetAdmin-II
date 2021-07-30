FROM ubuntu:latest

RUN apt-get -y update
RUN apt-get install -y bind9
RUN apt-get install -y nano
RUN apt-get install -y dnsutils

RUN mkdir -p /etc/bind/zones
COPY zones/db.m1-6 /etc/bind/zones
COPY named.conf.local /etc/bind
COPY named.conf.default-zones /etc/bind

EXPOSE 53/udp
EXPOSE 53/tcp