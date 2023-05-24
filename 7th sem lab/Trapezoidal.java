
package trapezoidal;
import  java.lang.Math;
import java.util.Scanner;
public class Trapezoidal {

    public static void main(String[] args) {

      double   area;     
      double   a, b;    
      int      n;       
      double   h;         
 
      Scanner sc = new Scanner(System.in);
 
      System.out.println("Enter a, b, and n");
      a = sc.nextDouble();
      b = sc.nextDouble();
      n = sc.nextInt();
 
      h = (b-a)/n;
      area = trap(a, b, n, h);
 
      System.out.println("With n = " + n + " trapezoids, approximate");
      System.out.print("of the area from " + a + " to " + b);
      System.out.println(" = " + area);
      
        
    }
    static double trap(double a, double b, int n, double h) {
       double area;  
       double x;
       int i;
    
       area = (f(a) + f(b))/2.0;
       for (i = 1; i <= n-1; i++) {
           x = a + i*h;
           area = area + f(x);
       }
       area = area*h;
    
       return area;
   } // 
         
      static double f(double x) {
    double fx = 1+(x*x); 
      return Math.sqrt(fx);
   }   
    
}
