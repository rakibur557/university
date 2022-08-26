.model small
.stack 100h
.data
    p1 db "odd$"
p2 db "even$"
x dw 10
.code
main proc
          
        
      mov ax,@data
    mov ds,ax
    
    
    mov dx,0
    mov ax,x
    
     mov bx,2
     div bx
              
              
    cmp dx,0 
    
    JNE odd
    
    
    mov ah,9
    LEA dx,p2
    int 21h
    jmp exit
    
    
    
    odd:
      mov ah,9
      lea dx,p1
      int 21h
      
      exit:
    main endp
end main