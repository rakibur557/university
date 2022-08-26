;QUESTION: [Read four integer values named A, B, C and D. Calculate and print 
;the difference of product A and B by the product of C and D (A * B - C * D)]               

.MODEL SMALL
.DATA
    A DB 2
    B DB 4
    C DB 1
    D DB 3
    
.CODE
MAIN PROC
    
    MOV AX,@DATA
    MOV DS,AX
    
    MOV AL,A
    MOV BL,B    ;MULTIPLICATION A AND B
    MUL BL
    
    MOV CL,AL   ;STORE INTO CL REGISTER 
    
    MOV AL,C
    MOV BL,D    ;MULTIPLICATION A AND B AND STORE INTO AL REGISTER
    MUL BL
    
    SUB CL,AL   ;SUBSTRACTION FROM TWO SECTION
    ADD CL,48
    
    MOV AH,2
    MOV DL,CL   ;PRINT RESULT
    INT 21H
    
    
MAIN ENDP
END