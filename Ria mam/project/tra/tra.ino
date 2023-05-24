//East
int g1 = 2; 
int y1 = 3; 
int r1 = 4;

//North
int g2 = 5;
int y2 = 6;
int r2 = 7;

//West
int g3 = 8;
int y3 = 9;
int r3 = 10;

//South
int g4 = 11;
int y4 = 12;
int r4 = 13;

void setup()
{
  pinMode (r1, OUTPUT);
  pinMode (y1, OUTPUT);
  pinMode (g1, OUTPUT);
  
  pinMode (r2, OUTPUT);
  pinMode (y2, OUTPUT);
  pinMode (g2, OUTPUT);
  
  pinMode (r3, OUTPUT);
  pinMode (y3, OUTPUT);
  pinMode (g3, OUTPUT);
  
  pinMode (r4, OUTPUT);
  pinMode (y4, OUTPUT);
  pinMode (g4, OUTPUT);
}
void loop() 
{
  digitalWrite(r1,LOW);
  digitalWrite(r3,LOW);

  digitalWrite(y1,LOW);
  digitalWrite(y2,LOW);
  digitalWrite(y3,LOW);
  digitalWrite(y4,LOW);

  digitalWrite(g2,LOW);
  digitalWrite(g4,LOW);

  digitalWrite(r2,HIGH);
  digitalWrite(r4,HIGH);

  digitalWrite(g1,HIGH);
  digitalWrite(g3,HIGH);
  delay(6000);

  digitalWrite(y1,HIGH);
  digitalWrite(y3,HIGH);
  delay(2000);

  digitalWrite(y1,LOW);
  digitalWrite(y3,LOW);

  digitalWrite(g1,LOW);
  digitalWrite(g3,LOW);

  digitalWrite(r1,HIGH);
  digitalWrite(r3,HIGH);

  digitalWrite(y2,HIGH);
  digitalWrite(y4,HIGH);
  delay(2000);

  digitalWrite(r2,LOW);
  digitalWrite(r4,LOW);

  digitalWrite(y2,LOW);
  digitalWrite(y4,LOW);

  digitalWrite(g2,HIGH);
  digitalWrite(g4,HIGH);
  delay(6000);

  digitalWrite(y2,HIGH);
  digitalWrite(y4,HIGH);
  delay(2000);

  digitalWrite(r2,HIGH);
  digitalWrite(r4,HIGH);

  digitalWrite(y2,LOW);
  digitalWrite(y4,LOW);

  digitalWrite(g2,LOW);
  digitalWrite(g4,LOW);

  digitalWrite(y1,HIGH);
  digitalWrite(y3,HIGH);
  delay(2000);
}
