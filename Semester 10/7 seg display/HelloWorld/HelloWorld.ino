int a = 13;
int b = 12;
int c = 11;
int d = 10;
int e = 9;
int f = 8;
int g = 7;
int i;
int count = 0;

void setup() {
  // put your setup code here, to run once:
for (int i = 7; i <= 13; i++){
pinMode(i, OUTPUT);
 }
}

void loop() {
  for (i = 0; i <= 9; i++) {
    lightNumer(i);
  delay(500);
   }

}
void lightNumer(int number){
switch (number) {
       case 0:
        digitalWrite(a, 1);
        digitalWrite(b, 1);
        digitalWrite(c, 1);
        digitalWrite(d, 1);
        digitalWrite(e, 1);
        digitalWrite(f, 1);
        digitalWrite(g, 0);
        break;
        case 1:
        digitalWrite(a, 0);
        digitalWrite(b, 1);
        digitalWrite(c, 1);
        digitalWrite(d, 0);
        digitalWrite(e, 0);
        digitalWrite(f, 0);
        digitalWrite(g, 0);
        break;
        case 2: 
        digitalWrite(a, 1);
        digitalWrite(b, 1);
        digitalWrite(c, 0);
        digitalWrite(d, 1);
        digitalWrite(e, 1);
        digitalWrite(f, 0);
        digitalWrite(g, 1);
        break;
        case 3:
        digitalWrite(a, 1);
        digitalWrite(b, 1);
        digitalWrite(c, 1);
        digitalWrite(d, 1);
        digitalWrite(e, 0);
        digitalWrite(f, 0);
        digitalWrite(g, 1);
        break;
        case 4:
        digitalWrite(a, 0);
        digitalWrite(b, 1);
        digitalWrite(c, 1);
        digitalWrite(d, 0);
        digitalWrite(e, 0);
        digitalWrite(f, 1);
        digitalWrite(g, 1);
        break;
        case 5:
        digitalWrite(a, 1);
        digitalWrite(b, 0);
        digitalWrite(c, 1);
        digitalWrite(d, 1);
        digitalWrite(e, 0);
        digitalWrite(f, 1);
        digitalWrite(g, 1);
        break;
        case 6:
        digitalWrite(a, 1);
        digitalWrite(b, 0);
        digitalWrite(c, 1);
        digitalWrite(d, 1);
        digitalWrite(e, 1);
        digitalWrite(f, 1);
        digitalWrite(g, 1);
        break;
        case 7:
        digitalWrite(a, 1);
        digitalWrite(b, 1);
        digitalWrite(c, 1);
        digitalWrite(d, 0);
        digitalWrite(e, 0);
        digitalWrite(f, 0);
        digitalWrite(g, 0);
        break;
        case 8:
        digitalWrite(a, 1);
        digitalWrite(b, 1);
        digitalWrite(c, 1);
        digitalWrite(d, 1);
        digitalWrite(e, 1);
        digitalWrite(f, 1);
        digitalWrite(g, 1);
        break;
        case 9: 
        digitalWrite(a, 1);
        digitalWrite(b, 1);
        digitalWrite(c, 1);
        digitalWrite(d, 1);
        digitalWrite(e, 0);
        digitalWrite(f, 1);
        digitalWrite(g, 1);
        break;
        }

}
