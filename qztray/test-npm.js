require('jsprintmanager');

JSPM.JSPrintManager.auto_reconnect = true;
JSPM.JSPrintManager.start();
JSPM.JSPrintManager.WS.onStatusChanged = function () {
    if (jspmWSStatus()) {
        //get client installed printers
        JSPM.JSPrintManager.getPrinters().then(function (myPrinters) {
            var options = '';
            for (var i = 0; i < myPrinters.length; i++) {
                options += '<option>' + myPrinters[i] + '</option>';
            }
            $('#installedPrinterName').html(options);
        });
    }
};

//Check JSPM WebSocket status
function jspmWSStatus() {
    if (JSPM.JSPrintManager.websocket_status == JSPM.WSStatus.Open)
        return true;
    else if (JSPM.JSPrintManager.websocket_status == JSPM.WSStatus.Closed) {
        alert('JSPrintManager (JSPM) is not installed or not running! Download JSPM Client App from https://neodynamic.com/downloads/jspm');
        return false;
    }
    else if (JSPM.JSPrintManager.websocket_status == JSPM.WSStatus.Blocked) {
        alert('JSPM has blocked this website!');
        return false;
    }
}

//Do printing...
function print(o) {
    if (jspmWSStatus()) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'URL-TO-GET-RAW-PRINTER-COMMANDS', true);

        xhr.responseType = 'arraybuffer';

        xhr.onload = function (e) {
            if (this.status == 200) {

                //Create a ClientPrintJob
                var cpj = new JSPM.ClientPrintJob();

                //Set Printer type (Refer to the help, there many of them!)
                if ($('#useDefaultPrinter').prop('checked')) {
                    cpj.clientPrinter = new JSPM.DefaultPrinter();
                } else {
                    cpj.clientPrinter = new JSPM.InstalledPrinter($('#installedPrinterName').val());
                }

                //Set printer commands...
                cpj.binaryPrinterCommands = new Uint8Array(xhr.response);

                //Send print job to printer!
                cpj.sendToClient();

            }
        }

        xhr.send();
    }
}
