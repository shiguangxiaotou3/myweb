package com.jieweifu.plugins.barcode;

import android.content.Intent;

import org.apache.cordova.CallbackContext;
import org.apache.cordova.CordovaPlugin;
import org.apache.cordova.PluginResult;
import org.json.JSONArray;
import org.json.JSONException;

/**
 * Created by Administrator on 2016/3/16.
 */
public class BarcodePlugin extends CordovaPlugin {

    public static CallbackContext cbContext = null;;

    @Override
    public boolean execute(String action, final JSONArray args,
                           CallbackContext callbackContext) throws JSONException {
        cbContext = callbackContext;

        if (action.equals("startScan")) {
            this.cordova.getActivity().startActivity(new Intent(this.cordova.getActivity().getApplicationContext(), CaptureActivity.class));
        }

        return true;
    }
}
