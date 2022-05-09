@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../wechatpay/wechatpay/bin/CertificateDownloader.php
php "%BIN_TARGET%" %*
