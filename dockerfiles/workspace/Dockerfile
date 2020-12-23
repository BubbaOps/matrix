#
#--------------------------------------------------------------------------
# Image Setup
#--------------------------------------------------------------------------
#
# To edit the 'workspace' base Image, visit its repository on Github
#    https://github.com/Laradock/workspace
#
# To change its version, see the available Tags on the Docker Hub:
#    https://hub.docker.com/r/laradock/workspace/tags/
#
# Note: Base Image name format {image-tag}-{php-version}
#

ARG DEVCONTAINER_PHP_VERSION=7.4
FROM bubbaops/devcontainer-php:${DEVCONTAINER_PHP_VERSION}

LABEL maintainer="Bubba <bubba@bubbaops.com>"

ARG DEVCONTAINER_WORKSPACE_FOLDER=/var/www

USER root
RUN apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && rm -rf /var/log/lastlog /var/log/faillog \
    && mkdir -p ${DEVCONTAINER_WORKSPACE_FOLDER}

WORKDIR /home/developer
COPY zsh/p10k.zsh .p10k.zsh
COPY zsh/zshrc .zshrc
COPY zsh/aliases.zsh aliases.zsh
RUN chown --from=root:root --recursive developer:development /home/developer
USER developer

WORKDIR ${DEVCONTAINER_WORKSPACE_FOLDER}
CMD ["/usr/bin/zsh"]