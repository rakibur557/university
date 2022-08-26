.MODEL SMALL
.DATA
    BASE DB 4
    HEIGHT DB 1 
    DIVIDE DB 2 

.CODE
MAIN PROC
    
    MOV AX,@DATA
    MOV DS,AX
    
    MOV AL,BASE
    MOV BL,HEIGHT
    MUL BL 
    
    MOV CL,AL
    
    MOV AL,CL
    MOV BL,DIVIDE
    DIV BL 

    ADD AL,48 
    
    MOV DL,AL
    MOV AH,2H
    INT 21H
    
    
    
     
MAIN ENDP
END