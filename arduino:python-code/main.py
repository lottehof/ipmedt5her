import time
import datetime
import serial
import os
import requests


if __name__ == "__main__":
    BASEURL = 'https://guokka.maisievdhammen.nl/'
    urlLED = 'sensor/ledstatus'
    urlRiem = 'sensor/riemdetectie'
    urlWater =  'sensor/peilConditie'
    urlGewicht = 'sensor/gewichtdetectie'
    urlDetectie = 'sesnor/detectie'


    port = serial.Serial("/dev/ttyACM0", baudrate=9600, timeout=3.0)

    while True:
        # Huidige tijd tot op de milliseconde
        now = str(datetime.datetime.now())

	#watersensor
	port.write("\r\nw")
        rcv = port.readline().strip()
        print(rcv)

        if(rcv.startswith("Wl")):
             x = requests.get(BASEURL + urlWater + "/store/" + now  + "/" + rcv[2:])
             print(x)
             print(BASEURL + urlWater + "/" + now + "/" + rcv[2:])


	#gewichtsensor
        port.write("\r\nv")
        rcv = port.readline().strip()
        print(rcv)

        if(rcv.startswith("Gw")):
           x = requests.get(BASEURL + urlGewicht + "/store/" + now + "/" + rcv[2:])
           print(x)
           print(BASEURL + urlGewicht + "/" + now + "/" + rcv[2:])


        # Riem in / uit detectie
        port.write("\r\nr")
        rcv = port.readline().strip()
        print(rcv)
        if (rcv == "riemIn" or rcv == "riemUit"):
            x = requests.get(BASEURL + urlRiem + "/store/" + now + "/" + rcv)
            print(x)
            print(BASEURL + urlRiem + "/" + now + "/" + rcv)

        #Detectie van de hond voor de back
        port.write("\r\nd")
        rcv = port.readline().strip()

        if (rcv.startswith("Hd")):
            x = requests.get(BASEURL + urlDetectie + "/store/" + now + "/" + rcv[2:])
            print(x)
            print(BASEURL + urlDetectie + "/" + now + "/" + rcv[2:])

            
        now = str(datetime.datetime.now())

        time.sleep(1)
