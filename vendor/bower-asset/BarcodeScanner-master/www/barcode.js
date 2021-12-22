var exec = require('cordova/exec');

module.exports = {
    startScan: function (successCallback, errorCallback) {
        exec(successCallback, errorCallback, "Barcode", "startScan", []);
    }
};
