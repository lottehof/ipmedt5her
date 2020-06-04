//LCD en Gewichtsensor
#include <HX711.h>

#include "HX711.h" //Library voor loadcell versterker

#include <Wire.h> // Library voor LCD
#include <LiquidCrystal_I2C.h> // Library for LCD


LiquidCrystal_I2C lcd = LiquidCrystal_I2C(0x27, 16, 2); //0x27 is ip adress van LCD en 16x2 is formaat van LCD

HX711 scale(3, 2); //DT is verbonden met A3 en SCK is verbonden met A2

float calibration_factor = -372; //calibratiefactor
double units;
String unitsInString;       
char serialRead;

//Druksensor
const int druksensor = A0;
int drukvalue = 0;
bool riemIn = false;
bool riemUit = false;
const int ledGreen = 10;

//Watersensor
const int watersensor = A1; //Sensor AO pin to Arduino pin A0
int watervalue;

void setup()
{
  pinMode(ledGreen, INPUT_PULLUP);
  Serial.begin(9600);
  Serial.println("HX711 weighing");
  scale.set_scale(calibration_factor);
  scale.tare();
  lcd.init();
  lcd.backlight();
}

void loop()
{
    while(Serial.available() > 0){
    serialRead = Serial.read();
    if(serialRead == 'v'){ //dit heeft te maken met de connectie met python script en de applicatie
        units = scale.get_units(),10;
      if (units < 0)
      {
       units = 000.00;
    }
      unitsInString = String(units);
      Serial.print("Gw");
      Serial.println(unitsInString + " gram");

      
     // Set the cursor on the first column and first row.
      lcd.setCursor(0, 0); //Zet de tekst van units op de eerste rij en de eerste plek
      lcd.print(units); // Print hoveel grams op scherm
      lcd.setCursor(4, 0); //Zet grams op de eerst rij en 4e plek
      lcd.print(" gram");
      
    }
    if(serialRead == 'w'){
      watervalue = analogRead(watersensor); //Lees de waarde van watersensor en slaat het op in watervalue
  
      if (watervalue<=480){ //Als de waarde op het laagste streepje van de watersensor is doet die volgende. 
           Serial.print("Wl");
           Serial.println("Water level: 0mm - Empty!");
           break;
      }
      else if (watervalue>480 && watervalue<=530 ){
        Serial.print("Wl");
        Serial.println("Water level: 0 mm to 5 mm");
        break;

        }
      else if (watervalue>530 && watervalue<=615){ 
        Serial.print("Wl");
        Serial.println("Water level: 5 mm to 10mm");
        break;
 
        }
      else if (watervalue>615 && watervalue<=660){ 
        Serial.print("Wl");   
        Serial.println("Water level: 10mm to 15mm");
        break;
  
        } 
      else if (watervalue>660 && watervalue<=680){
        Serial.print("Wl");
        Serial.println("Water level: 15mm to 20mm");
        break;
 
        }
      else if (watervalue>680 && watervalue<=690){
        Serial.print("Wl");
        Serial.println("Water level: 20mm to 25mm"); 

        }
      else if (watervalue>690 && watervalue<=700){
        Serial.print("Wl");
        Serial.println("Water level: 25mm to 30mm");
        break;
    
        }
       else if (watervalue>700 && watervalue<=705){
         Serial.print("Wl");   
         Serial.println("Water level: 30mm to 35mm");
         break;
 
         }
       else if (watervalue>705){ 
         Serial.print("Wl");
         Serial.println("Water level: 35mm to 40mm");
         break;
 
         }
     } 
      if (serialRead == 'r') {
      drukvalue = analogRead(druksensor);
      if(drukvalue > 1 && riemIn == false) {
        Serial.println("riem in");
        riemIn = true;
        riemUit = false;
        break;
      }
      else if (drukvalue < 1 && riemUit == false) {
        Serial.println("riem uit");
        riemUit = true;
        riemIn = false;
        break;
      }
    }
    
         // Groene led uitlezen van server en controleren
        else if (serialRead == 'g'){
            switch(Serial.read()){
              case '1':
                digitalWrite(ledGreen, HIGH);
                break;
               case '0':
                 digitalWrite(ledGreen, LOW);
                 break;
      }
    }
  }
 
  delay(100);
  
}
