SHELL := /bin/bash

APACHE_CONFIG_DIR = /etc/apache2/conf-available
APACHE_ROOT = /var/www
SNAP_BASE = /usr/local/snap
SNAP_CONFIG = /etc/snap
PASSWD_FILE = password.file
APACHE_USER = www-data
APACHE_GROUP = www-data

APACHE_CONFIG_FILE = snap.conf
WEB_FILES = ajaxGetCurrentValue.php ajaxGetRegs.php ajaxWriteValue.php \
	estilo.css \
	index.html \
	kran.jpg \
	regData.php \
	snap.js


.PHONY: install
install:
	install -m 755 -d $(SNAP_BASE)
	install -m 755 -d $(SNAP_CONFIG)
	install -m 644 -o $(APACHE_USER) -g $(APACHE_GROUP) \
		 $(WEB_FILES) $(SNAP_BASE)/
	install -m 600 -o $(APACHE_USER) -g $(APACHE_GROUP) \
		$(PASSWD_FILE) $(SNAP_CONFIG)
	install -m 644 $(APACHE_CONFIG_FILE) $(APACHE_CONFIG_DIR)/
	ln -s $(SNAP_BASE) $(APACHE_ROOT) || true

.PHONY: apache
apache:
	install -m 644 $(APACHE_CONFIG_FILE) $(APACHE_CONFIG_DIR)/
	ln -s $(SNAP_BASE) $(APACHE_ROOT)/snap || true
	a2enconf snap
	service apache2 reload

.PHONY: uninstall
uninstall:
	[ -h "$(APACHE_ROOT)/snap" ] && { rm "$(APACHE_ROOT)/snap" ; } || true
	[ -d "$(SNAP_CONFIG)" ] && { rm -r "$(SNAP_CONFIG)" ; } || true
	[ -d "$(SNAP_BASE)" ] && { rm -r "$(SNAP_BASE)" ; } || true
	a2disconf snap
	[ -f "$(APACHE_CONFIG_DIR)/$(APACHE_CONFIG_FILE)" ] \
		&& { rm "$(APACHE_CONFIG_DIR)/$(APACHE_CONFIG_FILE)" ; } || true
