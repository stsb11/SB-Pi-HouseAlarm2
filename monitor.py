# NOTE: Add this as a cronjob to keep logging activity when the page isn't open.
from gpiozero import LED, Button
from time import sleep
import datetime

bEnt = Button(14)
bLand = Button(15)
bKit = Button(18)
bLng = Button(23)

print("Scanning sensors...")

while True:
    now = datetime.datetime.now()

    if bEnt.is_pressed:
        # print("Hall triggered")
        with open("hall.txt", 'w') as out:
            out.write(now.strftime("%d/%m/%Y %H:%M:%S"))

    if bLng.is_pressed:
        # print("Lounge triggered")
        with open("lounge.txt", 'w') as out:
            out.write(now.strftime("%d/%m/%Y %H:%M:%S"))

    if bKit.is_pressed:
        # print("Kitchen triggered")
        with open("kitchen.txt", 'w') as out:
            out.write(now.strftime("%d/%m/%Y %H:%M:%S"))

    if bLand.is_pressed:
        # print("Landing triggered")
        with open("landing.txt", 'w') as out:
            out.write(now.strftime("%d/%m/%Y %H:%M:%S"))

    sleep(2)
