FROM ubuntu:latest
MAINTAINER Rajdeep Dua "dua_rajdeep@yahoo.com"
RUN apt-get update -y
RUN apt-get install -y python-pip python-dev build-essential
WORKDIR /app
RUN pip install flask
ENTRYPOINT ["python"]
CMD ["app.py"]
