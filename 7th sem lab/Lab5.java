package lab5;
import java.util.Scanner;
public class Lab5 {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        float a,b,n,h, area,xi;
        System.out.println("Enter a & b: ");
        a= sc.nextFloat();
        b= sc.nextFloat();
        System.out.println("Enter n: ");
        n=sc.nextFloat();
        h=(b-a)/n;
        System.out.println("\n Value of h: "+h);
        area = f(a)+f(b);
        for(int i=1; i<n; i++){
            xi = a+i*h;
            if(i%2==0){
                area=area+(2*f(xi));
            }
            else{
                area= area+(4*f(xi));
            }
        }
        area=(h/3)*area;
        System.out.println("\n Area: "+area);
    }
    static float f(float x) {
    float fx = 1/(1+x); 
      return fx;
   }   
}