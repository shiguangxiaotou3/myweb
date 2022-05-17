#!/bin/bash
sudo chmod 0777  /etc/apt/sources.list
#备份源文件
sudo cp /etc/apt/sources.list /etc/apt/sources.list.save
#清空文件
sudo > /etc/apt/sources.list
#写入数据
sudo cat >> /etc/apt/sources.list <<EOF
deb http://mirrors.aliyun.com/ubuntu/ bionic main restricted universe multiverse
deb-src http://mirrors.aliyun.com/ubuntu/ bionic main restricted universe multiverse
deb http://mirrors.aliyun.com/ubuntu/ bionic-security main restricted universe multiverse
deb-src http://mirrors.aliyun.com/ubuntu/ bionic-security main restricted universe multiverse
deb http://mirrors.aliyun.com/ubuntu/ bionic-updates main restricted universe multiverse
deb-src http://mirrors.aliyun.com/ubuntu/ bionic-updates main restricted universe multiverse
deb http://mirrors.aliyun.com/ubuntu/ bionic-proposed main restricted universe multiverse
deb-src http://mirrors.aliyun.com/ubuntu/ bionic-proposed main restricted universe multiverse
deb http://mirrors.aliyun.com/ubuntu/ bionic-backports main restricted universe multiverse
deb-src http://mirrors.aliyun.com/ubuntu/ bionic-backports main restricted universe multiverse
EOF

#更新操作系统
sudo apt-get update -y
#清理系统垃圾
sudo apt-get autoclean -y
#清理所有软件缓存
sudo apt-get clean -y
#删除系统不再使用的孤立软件执行
sudo apt-get autoremove -y

sudo apt-get install php -y
sudo apt-get install apche2 -y
sudo apt-get install mysql-server -y
sudo apt-get install mysql-client -y

#安装snapd
sudo apt-get install snapd -y
sudo snap install core -y
sudo snap refresh core -y
sudo snap install --classic certbot
sudo ln -s /snap/bin/certbot /usr/bin/certbot
sudo certbot --apache
sudo certbot certonly --apache
sudo certbot renew --dry-run

#安装composer
cd /var/www/html
sudo php -r "copy('https://install.phpcomposer.com/installer', 'composer-setup.php');"
sudo php composer-setup.php
sudo php -r "unlink('composer-setup.php');"
sudo mv composer.phar /usr/local/bin/composer

#安装git
sudo apt-get install git -y
#重启apache
sudo /etc/init.d/apache2 restart
#重启
sudo /etc/init.d/mysql restart

sudo reboot
