.MODEL SMALL

.CODE
MAIN PROC
    
    MOV AL,5   ;STORE  5 INTO AL REGISTER 
    MOV BL,6   ;STORE  6 INTO BL REGISTER
    
    MUL BL     ;MULTIPLY TWO NUMBER AND IT STORE LIKE AX=AL X BL(30=5 X 6)
    AAM
    MOV CH,AH  ;STORE AH(FIRST PART OF AX) INTO CH REGISTER
    ADD CH,48  ;ADD 48 WITH CH FOR GET EXACT VALUE
    MOV CL,AL  ;STORE AL(SECOND PART OF AX) INTO CL REGISTER
    ADD CL,48  ;ADD 48 WITH CH FOR GET EXACT VALUE
    
    MOV AH,2
    MOV DL,CH  ;FOR PRINT FISRT PART 3 
    INT 21H   
    
    MOV AH,2
    MOV DL,CL   ;FOR PRINT SECOND PART 0
    INT 21H
    
    
MAIN ENDP
END