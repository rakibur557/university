.model small
.stack 100h
.data
    n dw ?
.code
main proc
          
        
     MOV AX, @DATA                ; initialize DS 
     MOV DS, AX
     
     ;mov ah,1
     ;int 21h
     ;mov n,al
 
     MOV CX, 10                   ; initialize CX
 
     MOV AH, 2                    ; set output function  
     MOV DL, 48 ;dl=0                   ; set DL with 0
 
     @LOOP:                       ; loop label
       INT 21H                    ; print character
 
       INC DL                     ; increment DL to next ASCII character
       DEC CX                     ; decrement CX
     JNZ @LOOP                    ; jump to label @LOOP if CX is 0
 
    
    

    main endp
end main