.model small
.stack 100h
.data
    res db ?
    liza db 3
    x dw 1
    value dw ?
.code
main proc
mov ax,@data
    mov ds,ax
    
     
    mov ah,1
    int 21h
   
    mov bl,al
   
    sub bl,30h

   
    mov cl,al
    sub cl,30h
     
   
   
    mov al,bl 
   
    mul cl
        
    
     
    mov res,al
    add res,30h

   
       mov ah,2
       mov dl,10
       int 21h
       mov  dl,13
       int 21h
       
   
    mov ah,2
    mov dl,res
    int 21h
    
    

    main endp
end main