import mysql.connector
import time
import serial
import textwrap
import datetime

#10 second delay so that the Raspberry Pi manages to connect to the internet on boot before attempting to connect to the database
time.sleep(10)

#Connect to database
db = mysql.connector.connect(
    host = "mysli.oamk.fi",
    user = "t7gafl00",
    passwd = "G6kAgAGn8Rqs6SnY",
    database = "opisk_t7gafl00"
    )

#Initializing the serialport
ser = serial.Serial ("/dev/serial0", baudrate=57600)

#Initializing LoRa connection
def lora_setup():
    print ("START LoRa setup\r\n")
    ser.write(str.encode("sys get ver\r\n"))
    lora_read_line()
    ser.write(str.encode("mac pause\r\n"))
    lora_read_line()
    ser.write(str.encode("radio set mod lora\r\n"))
    lora_read_line()
    ser.write(str.encode("radio set freq 869100000\r\n"))
    lora_read_line()
    ser.write(str.encode("radio set pwr 14\r\n"))
    lora_read_line()
    ser.write(str.encode("radio set sf sf7\r\n"))
    lora_read_line()
    ser.write(str.encode("radio set crc on\r\n"))
    lora_read_line()
    ser.write(str.encode("radio set iqi off\r\n"))
    lora_read_line()
    ser.write(str.encode("radio set cr 4/5\r\n"))
    lora_read_line()
    ser.write(str.encode("radio set wdt 0\r\n"))
    lora_read_line()
    ser.write(str.encode("radio set sync 12\r\n"))
    lora_read_line()
    ser.write(str.encode("radio set bw 125\r\n"))
    lora_read_line()
    print ("END LoRa setup\r\n")

#Reads serial port data
def lora_read_line():
    x = ser.readline()
    print (x.decode('utf-8'))
    time.sleep(0.08)

#Receives data through the LoRa connection
def lora_receive_data():
    ser.write(str.encode("radio rx 0\r\n"))
    lora_read_line()
    x = ser.readline()
    x.decode('utf-8')
    return x

#Writes sensor values to database
def write_to_db(value1, value2, value3, value4, value5, value6, value7, value8):
    cursor = db.cursor()
    sql = "INSERT INTO SensorValues (datetime_val, temperature_val_C, humidity_val, light_val, audio_dB, bat_val, gas_val, voc_val, temperature_ntc) VALUES(now(), %s, %s, %s, %s, %s, %s, %s, %s)"
    val = (value1, value2, value3, value4, value5, value6, value7, value8)

    try:
        # Execute SQL command
        cursor.execute(sql, val)
        # Commit your changes in the database
        db.commit()
    
    except:
        # Rollback in case there is any error
        db.rollback()
        
    print(cursor.rowcount, "record inserted.", datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S"))

#Data parsing
def split_result(result_string):
    global temperature_val_C
    global humidity_val
    global light_val
    global audio_dB
    global bat_val
    global gas_val
    global voc_val
    global temperature_ntc
    
    length = len(result_string)
    result_string = result_string[10:length-2]
    values_amount = int(len(result_string)/4)

    for i in range(0, values_amount):
        value = result_string[i*4:i*4+4]        

        if i == 0:
            value = int(value, 16)/10
            temperature_val_C = value
            print ("Temperature_val_C:",temperature_val_C)
            
        elif i == 1:
            value = int(value, 16)/10
            humidity_val = value
            print ("Humidity_val:",humidity_val)
            
        elif i == 2:
            value = int(value, 16)/10.23
            light_val = value
            print ("Light_val:",light_val)
            
        elif i == 3:
            value = int(value, 16)
            audio_dB = value
            print ("Audio_dB:", audio_dB)
            
        elif i == 4:
            value = int(value, 16)*(3.3 / 0.33)/1000
            bat_val = value
            print ("Bat_val:", bat_val)
            
        elif i == 5:
            value = int(value, 16)
            gas_val = value
            print ("Gas_val:", gas_val)
            
        elif i == 6:
            value = int(value, 16)
            voc_val = value
            print ("Voc_val:", voc_val)
            
        elif i == 7:
            value = int(value, 16)/10
            temperature_ntc = value
            print ("Temperature_ntc:", temperature_ntc)        
                    
lora_setup()
while 1:    
    result = lora_receive_data()
    split_result(result)
    write_to_db(temperature_val_C, humidity_val, light_val, audio_dB, bat_val, gas_val, voc_val, temperature_ntc)
