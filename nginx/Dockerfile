FROM nginx:1.15-alpine as dev

COPY ./dev/* /etc/nginx/conf.d/
RUN mkdir /logs/

#
# release build.
#
FROM nginx:1.15-alpine as release

COPY ./stand/* /etc/nginx/conf.d/
RUN mkdir /logs/
