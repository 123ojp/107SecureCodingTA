FROM ubuntu:latest
RUN apt-get update -y
RUN apt-get install -y nmap
RUN groupadd -r ctf && useradd -r -g ctf ctf
USER ctf
WORKDIR /srv/
ENTRYPOINT ["bash"]
CMD ["-c","/srv/in.sh"]
