.model small
.stack 100h
.data
      
.code
main proc
     mov ax,@data
     mov ds,ax
     
     mov ah,1   ;input one variable
     int 21h
     mov bl,al
     
     mov ah,1   ;input second variable
     int 21h
     mov cl,al
     
     add bl,cl
     sub bl,48
     mov dl,bl
     
     ;mov ah,2
     ;mov dl,bl
     ;int 21h
     ;mov dl, 0ah
     ;int 21h 
     
     mov ah,2 
     mov dl, 10
     int 21h
     mov dl, 30 
          
     mov ah,2   ;output 
     mov dl,bl
     int 21h
     
     main endp
end main