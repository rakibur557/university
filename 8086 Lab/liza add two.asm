.model small
  .stack 100h
  .data
   m db 3    ; means m=3  
   m1 db ?   ;means input dite hobe
  .code
  
  main proc
              
       mov ax,@data   ;m k niya kaj
       mov ds,ax      ;
       
  ;print kora hocce
        
       mov ah,2    
       add m,48     ;3 er  decimalNumber 51...ai jonno 48+3 kora holo
       mov dl,m
       int 21h
       
       
       
 ;m1 k niya kaj
      
     ;input 
     
      mov ah,1
      int 21h
      mov m1,al
      
     ; new line print kora er jonno
      
       mov ah,2
       mov dl,10
       int 21h
       mov  dl,13
       int 21h
       
       add m1,3
       
      ;print
      
        mov ah,2
        mov dl,m1
        int 21h
        
        

        main endp
  end main