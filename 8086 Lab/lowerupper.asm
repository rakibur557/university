.MODEL
.STACK 100H
.DATA
MSG DB 10,13, 'INPUT ANY LETTER: $'
CAP DB 10,13, 'UPPER CASE $'
LOW DB 10,13, 'LOWER CASE $'
.CODE
MAIN PROC
    MOV AX,@DATA
    MOV DS,AX
    
    MOV AH,9
    LEA DX,MSG
    INT 21H
    
    MOV AH,1
    INT 21H
    
    
    CMP AL,5BH
    JL NO
    
    CMP AL,5BH
    JG YES
        
    
    YES:
       MOV AH,9
       LEA DX,LOW
       INT 21H
       JMP EXIT
            
    
    NO:
       MOV AH,9
       LEA DX,CAP
       INT 21H
    
  
      
    
    MAIN ENDP

END MAIN