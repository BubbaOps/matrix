FROM mcr.microsoft.com/mssql/server:2017-latest-ubuntu

LABEL maintainer="Bubba <bubba@bubbaops.com>"

ENV MSSQL_PID=Express
ENV MSSQL_DATABASE=$MSSQL_DATABASE
ENV ACCEPT_EULA=Y
ENV SA_PASSWORD=$MSSQL_PASSWORD

VOLUME /var/opt/mssql

EXPOSE 1433
