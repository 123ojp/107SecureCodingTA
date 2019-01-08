FROM ubuntu:latest
RUN apt-get update -y
RUN apt-get install -y python-pip python-dev build-essential
WORKDIR /app
RUN pip install flask
ENTRYPOINT ["python"]
CMD ["app.py"]
