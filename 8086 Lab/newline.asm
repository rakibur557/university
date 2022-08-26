.model small
.stack 100h
.data
      
.code
main proc
     mov ax,@data
     mov ds,ax
     
     mov ah,1   ;input
     int 21h
     mov bl,al  
     
     ;newline
     mov ah,2
     mov dl,0dh
     int 21h
     mov dl,0ah
     int 21h
     
     mov ah,2   ;output
     mov dl,bl
     int 21h
     
     main endp
end main