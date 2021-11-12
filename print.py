from escpos.printer import Usb
p = Usb(0x04b8, 0x0202, 0, profile="Default")


# p = Usb(  0x1bcf ,   0x2c17, 0, profile="POS-80") #0xfffe
p.text("Hello World\n")
p.barcode('1324354657687', 'EAN13', 64, 2, '', '')
p.cut()
