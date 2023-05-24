void setup() {

  pinMode(2, OUTPUT);
  pinMode(3, OUTPUT);
  pinMode(4, OUTPUT);
  pinMode(5, OUTPUT);
  pinMode(6, OUTPUT);
  pinMode(7, OUTPUT);
  pinMode(8, OUTPUT);
  
}
//Function 
void loop() {
//Zero();
One();
Two();
Three();
Four();
Five();
Six();
Seven();
Eight();
Nine();
Zero();
 
}

void Zero() {
  
 digitalWrite(2, HIGH);
 digitalWrite(3, HIGH); 
 digitalWrite(4, HIGH);
 digitalWrite(5, HIGH);
 digitalWrite(6, HIGH);
 digitalWrite(7, HIGH);
 digitalWrite(8, LOW);
 delay(1000);
}

void One(){
  
 digitalWrite(2, LOW);
 digitalWrite(3, HIGH); 
 digitalWrite(4, HIGH);
 digitalWrite(5, LOW);
 digitalWrite(6, LOW);
 digitalWrite(7, LOW);
 digitalWrite(8, LOW);
 delay(1000);
}

void Two(){
  
 digitalWrite(2, HIGH);
 digitalWrite(3, HIGH); 
 digitalWrite(4, LOW);
 digitalWrite(5, HIGH);
 digitalWrite(6, HIGH);
 digitalWrite(7, LOW);
 digitalWrite(8, HIGH);
 delay(1000); 
}

void Three(){
  
 digitalWrite(2, HIGH);
 digitalWrite(3, HIGH); 
 digitalWrite(4, HIGH);
 digitalWrite(5, HIGH);
 digitalWrite(6, LOW);
 digitalWrite(7, LOW);
 digitalWrite(8, HIGH);
 delay(1000);
}

void Four(){ 
  
 digitalWrite(2, LOW);
 digitalWrite(3, HIGH); 
 digitalWrite(4, HIGH);
 digitalWrite(5, LOW);
 digitalWrite(6, LOW);
 digitalWrite(7, HIGH);
 digitalWrite(8, HIGH);
 delay(1000);
}

void Five(){
  
 digitalWrite(2, HIGH);
 digitalWrite(3, LOW); 
 digitalWrite(4, HIGH);
 digitalWrite(5, HIGH);
 digitalWrite(6, LOW);
 digitalWrite(7, HIGH);
 digitalWrite(8, HIGH);
 delay(1000);
}
 
 void Six(){
   
 digitalWrite(2, HIGH);
 digitalWrite(3, LOW); 
 digitalWrite(4, HIGH);
 digitalWrite(5, HIGH);
 digitalWrite(6, HIGH);
 digitalWrite(7, HIGH);
 digitalWrite(8, HIGH);
 delay(1000);
 }

void Seven(){

 digitalWrite(2, HIGH);
 digitalWrite(3, HIGH); 
 digitalWrite(4, HIGH);
 digitalWrite(5, LOW);
 digitalWrite(6, LOW);
 digitalWrite(7, LOW);
 digitalWrite(8, LOW);
 delay(1000);
}

void Eight(){
 digitalWrite(2, HIGH);
 digitalWrite(3, HIGH); 
 digitalWrite(4, HIGH);
 digitalWrite(5, HIGH);
 digitalWrite(6, HIGH);
 digitalWrite(7, HIGH);
 digitalWrite(8, HIGH);
 delay(1000);
}

 void Nine(){
   
 digitalWrite(2, HIGH);
 digitalWrite(3, HIGH); 
 digitalWrite(4, HIGH);
 digitalWrite(5, HIGH);
 digitalWrite(6, LOW);
 digitalWrite(7, HIGH);
 digitalWrite(8, HIGH);
 delay(1000); 
}
