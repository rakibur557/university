
package javaapplication1;

import java.util.Scanner;


public class JavaApplication1 {


    public static void main(String[] args) {
      Scanner sc = new Scanner(System.in);
System.out.println("enter no of process: ");
int n = sc.nextInt();
int pid[] = new int[n];   // process ids
int ar[] = new int[n];     // arrival times
int bt[] = new int[n];     // burst or execution times
int ct[] = new int[n];     // completion times
int ta[] = new int[n];     // turn around times
int wt[] = new int[n];     // waiting times
int temp;
for(int i = 0; i < n; i++)
{
    System.out.println("enter process " + (i+1) + " arrival time: ");
ar[i] = sc.nextInt();
    System.out.println("enter process " + (i+1) + " brust time: ");
    bt[i] = sc.nextInt();
}
    }
}
