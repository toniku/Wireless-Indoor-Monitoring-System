# Wireless-Indoor-Monitoring-System
Embedded system school group-project, wireless indoor monitoring system

The main objective of this project was to put together an indoor monitoring system, including Microcontrollers, sensor modules, database and user interface. The parameters monitored by the sensor module include temperature, humidity, luminosity, noise, carbon dioxide, air quality and battery level.

We developed several applications in different programming languages, in order to:
  •	Read data from sensors
  •	Send this data wirelessly to a receiver
  •	Receive, parse and send this data to a database
  •	Provide the user with a web app from which he can retrieve and display data from the past 24 hours

Mbed Nucleo reads values and makes data packets and sends the data wirelessly via LoRa module to the Raspberry Pi (receiver). The receiver gets the data packet and parses it and finally sends the data to the SQL database. In the web application, we load the data from the database and display some results and graphs to the user.

Time proved to be the biggest obstacle, so compromises had to be made between what we wanted to achieve and what we were able to do.
