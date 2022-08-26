.model small
.stack 100h
.data
    a db 1
    sum db ?
.code
main proc
          
        
       mov ax,@data
       mov dS,ax 
       
       mov cx,10  
       mov bx,0   
         
     addition:
          ADD bh,a 
          INC a    
          loop addition
          
          mov  sum,bh
          mov ah,2
          mov dl,sum
          int 21h
    
    

    main endp
end main