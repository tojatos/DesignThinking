FROM docker.io/bitnami/codeigniter:3-debian-10
RUN apt-get update
RUN echo "postfix postfix/main_mailer_type string 'No configuration'" && DEBIAN_FRONTEND=noninteractive apt-get install postfix -yq

ENTRYPOINT []
CMD ["sh", "-c", "service postfix start && /app-entrypoint.sh php -S 0.0.0.0:8000"]
